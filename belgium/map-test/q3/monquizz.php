<?php


//$nomcandidatquizz = 'Evangun';		//si la variable $nomcandidatquizz n'existe pas, le quizz est en mode "ouvert � tous les internautes"
						//vous devriez lui attribuer vous-m�me la valeur souhait�e (une identit� - unique pour chaque joueur de pr�f�rence sinon il y aura des conflits - authentifi�e par vos soins!)
						//pour plus de d�tails, consultez le lisez-moi.txt





include 'connect.php';

if(isset($_POST['numeroquizz'])){		//partie ex�cut�e si on a s�lectionn� un quizz pour y r�pondre

	$numeroquizz = $_POST['numeroquizz'];

	if(isset($nomcandidatquizz)){
		$query = mysql_query("select count(*) FROM `quizz_reponses` where qcm_nom = '$nomcandidatquizz' and qcm_id = '$numeroquizz'");
		while ($row = mysql_fetch_row($query)) { $nb = $row[0]; }
	}
	else {
		$query = mysql_query("select qcm_public, qcm_enregistrer_resultats_invites from `quizz_index` where qcm_id = '$numeroquizz'");
		while ($row = mysql_fetch_row($query)) {
			$public = $row[0];
			$enregistrerinvite = $row[1];
		}
	}

	

	if((!isset($nomcandidatquizz) and $public == 'oui') or (isset($nb) and $nb == '0')){

		echo '<form method="post" action="monquizzb.php">';

		$numeroquestion = '0';
		$query = mysql_query("SELECT qcm_question, qcm_propa, qcm_propb, qcm_propc, qcm_propd  FROM `quizz_questions` where qcm_id = '$numeroquizz' order by qcm_question_id ASC");
		while ($row = mysql_fetch_row($query)) {
			$enonce=$row[0];
			$proposition1=$row[1];
			$proposition2=$row[2];
			$proposition3=$row[3];
			$proposition4=$row[4]; 

			echo ($numeroquestion+1).') '.$enonce.'<br />
			<input type="radio" name='.$numeroquestion.' value="1" />'.$proposition1.'<br />
			<input type="radio" name='.$numeroquestion.' value="2" />'.$proposition2.'<br />
			<input type="radio" name='.$numeroquestion.' value="3" />'.$proposition3.'<br />
			<input type="radio" name='.$numeroquestion.' value="4" />'.$proposition4.'<br /><br />';

			$numeroquestion++;

		}

		if(!isset($nomcandidatquizz) and $enregistrerinvite == 'oui'){
			echo '<br />Votre nom : <input type="text" size="15" name="nominvitequizz" /><br /><br />';
		}

		echo '<input type="hidden" name="numeroquizz" value="'.$numeroquizz.'" />
		      <input type="submit" value="Envoyer les r�ponses!" /></form>';
	}
	else {
		echo 'Vous avez d�j� r�pondu � ce questionnaire !<br /><br />
			<a href="monquizzc.php?quizz='.$numeroquizz.'">Cliquez ici pour voir le classement</a>';
	}
}

else {						
	echo 'A quel questionnaire voulez-vous r�pondre ?
		<form method="post" action="monquizz.php">
		<select name="numeroquizz">';

	if(!isset($nomcandidatquizz)){ $restriction = "and qcm_public = 'oui'"; }
	else { $restriction = ''; }

	$query = mysql_query("select qcm_id, qcm_nom from `quizz_index` where qcm_id > '0' $restriction order by qcm_id");		//les QCM ayant une ID nulle ou n�gative sont "en attente d'�tre publi�s"
	while ($row = mysql_fetch_row($query)) {
		echo '	<option value="'.$row[0].'">'.$row[1].'</option>';
	}

	echo'	</select>
		<input type="submit" value="Commencer!" />
		</form>';
}

mysql_close();

?>



