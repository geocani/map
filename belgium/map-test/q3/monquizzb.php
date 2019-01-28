<?php


//$nomcandidatquizz = 'Evangun';		//si la variable $nomcandidatquizz n'existe pas, le quizz est en mode "ouvert � tous les internautes"
						//vous devriez lui attribuer vous-m�me la valeur souhait�e (une identit� - unique pour chaque joueur de pr�f�rence sinon il y aura des conflits - authentifi�e par vos soins!)
						//pour plus de d�tails, consultez le lisez-moi.txt



include 'connect.php';

if(isset($_POST['nominvitequizz'])){ $nominvitequizz = $_POST['nominvitequizz']; }
if(isset($_POST['numeroquizz'])){ $numeroquizz = $_POST['numeroquizz']; }
else { $numeroquizz = '0'; }



function pluriel($k){
	if($k > '1') return 's';
}

function ordinal($k){
	if($k > '1') return '�me';
	else return 'er(e)';
}




if(!isset($nomcandidatquizz)){
	$query = mysql_query("select qcm_public from `quizz_index` where qcm_id = '$numeroquizz'");
	while ($row = mysql_fetch_row($query)) { $public = $row[0]; }		//v�rification que le quizz est bien autoris� pour les invit�s (des fois qu'un invit� aurait ins�r� lui-m�me des variables POST pour s'infiltrer)
}
else {
	$query = mysql_query("select count(*) from `quizz_reponses` where qcm_nom = '$nomcandidatquizz' and qcm_id = '$numeroquizz'");
	while ($row = mysql_fetch_row($query)) { $nb = $row[0]; }		//v�rification que le membre n'a pas d�j� fait le quizz (ou du moins qu'il ne s'est pas class� dans les 30 premiers!)
}


if((!isset($nomcandidatquizz) and $public == 'oui') or (isset($nb) and $nb == '0')){	//si tout est ok on y go...


	$query = mysql_query("select count(*) from `quizz_questions` where qcm_id = '$numeroquizz'");
	while ($row = mysql_fetch_row($query)) {
		$nb = $row[0];
	}

	$query = mysql_query("select qcm_coeff_question, qcm_soluce, qcm_question, qcm_propa, qcm_propb, qcm_propc, qcm_propd from `quizz_questions` where `qcm_id` = '$numeroquizz' order by qcm_question_id ASC");
	$i = 0;
	while ($row = mysql_fetch_row($query)) {				//ce premier tableau enregistre les solutions et les coeffs des questions
		$tableausoluce[$i][0] = $row[0];
		$tableausoluce[$i][1] = $row[1];
		$tableausoluce[$i][2]= $row[2];					//ce champs et les 4 suivants ne serviront que si on affiche les r�ponses � la fin
		$tableausoluce[$i][3]= $row[3];
		$tableausoluce[$i][4]= $row[4];
		$tableausoluce[$i][5]= $row[5];
		$tableausoluce[$i][6]= $row[6];
		$i++;
	}


	$totalpoints = '0';
	$totalbonnesreponses = '0';

	for ($i = '0'; $i <= ($nb-1); $i++) {

		if(!isset($_POST[$i])){ $tableaureponse[$i] = '0'; }		//si pas de r�ponse : on met 0 dans la $i�me case  de notre deuxi�me tableau
		else { $tableaureponse[$i] = $_POST[$i];}			//sinon, on met la r�ponse (1, 2, 3 ou 4) du candidat dans cette case 

		if($tableausoluce [$i][1] == $tableaureponse[$i]){		//on compare avec le premier tableau; si la reponse est la bonne :
			$totalbonnesreponses++;					//�a fait une bonne r�ponse en plus
			$totalpoints += $tableausoluce [$i][0];			//et on ajoute le nombre de points d�sir�
		}
	}


	$query = mysql_query("select count(*) from `quizz_reponses` where `qcm_id` = '$numeroquizz' and qcm_points > $totalpoints");
	while ($row = mysql_fetch_row($query)) {
		$nombredemeilleurspoints = $row[0];				//nombre de personnes avec un meilleur score
	}

	$query = mysql_query("select count(*) from `quizz_reponses` where `qcm_id` = '$numeroquizz' and qcm_points = $totalpoints");
	while ($row = mysql_fetch_row($query)) {
		$nombredeexaequoenpoints = $row[0];				//nombre de personnes ex-aequo avec le candidat (on aurait sans doute pu faire un booleen mais bon)
	}

	$query = mysql_query("select qcm_afficher_classement, qcm_enregistrer_resultats_membres, qcm_enregistrer_resultats_invites, qcm_donner_reponses from `quizz_index` where qcm_id = '$numeroquizz'");
	while ($row = mysql_fetch_row($query)) {
		$afficherclassement = $row[0];
		$enregistrermembre = $row[1];
		$enregistrerinvite = $row[2];
		$donnerreponses = $row[3];					//r�cup�ration des diff�rentes options du quizz
	}

	if((isset($nomcandidatquizz) and $enregistrermembre == "oui") or (!isset($nomcandidatquizz) and isset($nominvitequizz) and $enregistrerinvite == "oui")){
		if($nombredemeilleurspoints + $nombredeexaequoenpoints < 30 ){	//enregistrement du r�sultat si parmi les 30 premiers et si les options le permettent
			if(isset($nomcandidatquizz)) { $nomcandidat = $nomcandidatquizz; }
			else { $nomcandidat = $nominvitequizz; }
			if(trim($nomcandidat) == ''){ $nomcandidat = 'Anonyme'; }
			mysql_query("insert into `quizz_reponses` (`qcm_id`, `qcm_nom`, `qcm_nombre_bonnes_reponses`, `qcm_points`) values ('$numeroquizz', '$nomcandidat', '$totalbonnesreponses', '$totalpoints');");
		}
		else {
			echo 'Vous ne figurez pas parmi les 30 premiers � ce quizz, vous ne serez donc malheureusement pas class� !<br />';
		}
	}

	echo 'Avec '.$totalbonnesreponses.' bonne'.pluriel($totalbonnesreponses).' r�ponse'.pluriel($totalbonnesreponses).',<br />vous totalisez '.$totalpoints.' point'.pluriel($totalpoints).'<br />';

	if( $afficherclassement == 'oui' ){
		if( $nombredeexaequoenpoints > 1 ) { $egaliteenpoints = 'ex-aequo '; }
		else { $egaliteenpoints = ''; }

		echo ' et vous vous classez '.($nombredemeilleurspoints+1).ordinal($nombredemeilleurspoints+1).' '.$egaliteenpoints.'<br /><br />';

		if(!isset($nomcandidatquizz) and $enregistrermembre == 'oui' and $enregistrerinvite == 'non'){
			echo 'N�anmoins, seuls les membres peuvent enregistrer leurs scores � ce quizz !<br /><br />';		//Si vous voulez rajouter un lien du genre "Devenir membre!", �a peut �tre pas mal ici
		}
		if((isset($nomcandidatquizz) and $enregistrermembre == 'non') or (!isset($nomcandidatquizz) and $enregistrermembre == 'non' and $enregistrerinvite == 'non')){
			echo 'N�anmoins, l\'enregistrement de nouveaux scores a �t� d�sactiv�.<br /><br />';
		}

		echo '<a href="monquizzc.php?quizz='.$numeroquizz.'">Cliquez ici pour voir le classement complet</a><br /><br /><br />';
	}
	else {
		echo 'Merci d\'avoir particip� !<br /><br /><br />';		//si on ne donne pas de classement, il faut au moins �tre poli ;)
	}

	echo '<a href="monquizz.php">Cliquez ici pour retourner � la page d\'accueil des quizz</a><br /><br /><br />';

	if($donnerreponses == 'oui'){						//affichage des r�ponses

		echo 'Les solutions :<br /><br />';

		for ($i = '0'; $i <= ($nb-1); $i++) {

			for ($j = '1'; $j < '5'; $j++) {

				if($tableaureponse[$i] == $j) { $checked[$j] = 'checked="checked"'; }
				else { $checked[$j] = ''; }

				if($tableausoluce[$i][1] == $j) {
					$highlight[$j][0] = '<u><font style="background-color: yellow">';	//les anciens navigateurs ne reconnaissent pas le surlignage alors je laisse le soulignement (vous pouvez am�liorer si vous voulez ;))
					$highlight[$j][1] = '</font></u>';
				}
				else {
					$highlight[$j][0] = '';
					$highlight[$j][1] = '';
				}
			}

				echo 	($i+1).') '.$tableausoluce[$i][2].'<br />
					<input type="checkbox" disabled '.$checked[1].' />'.$highlight[1][0].$tableausoluce[$i][3].$highlight[1][1].'<br />
					<input type="checkbox" disabled '.$checked[2].' />'.$highlight[2][0].$tableausoluce[$i][4].$highlight[2][1].'<br />
					<input type="checkbox" disabled '.$checked[3].' />'.$highlight[3][0].$tableausoluce[$i][5].$highlight[3][1].'<br />
					<input type="checkbox" disabled '.$checked[4].' />'.$highlight[4][0].$tableausoluce[$i][6].$highlight[4][1].'<br /><br />';
		}

	}
}
else {
	echo 'Vous �tes malin mais vous n\'arriverez pas � tricher, vous avez d�j� r�pondu au quizz !';
}

mysql_close();

?>












