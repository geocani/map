<?php

include 'connect.php';

if(isset($_POST['nouveauquizz'])){ $nouveauquizz = $_POST['nouveauquizz']; }
if(isset($_POST['supprimerquizz'])){ $supprimerquizz = $_POST['supprimerquizz']; }
if(isset($_POST['modifierquizz'])){ $modifierquizz = $_POST['modifierquizz']; }
if(isset($_POST['publierquizz'])){ $publierquizz = $_POST['publierquizz']; }
if(isset($_POST['numeroquizz'])){ $numeroquizz = $_POST['numeroquizz']; }
if(isset($_POST['quizzenattente'])){ $quizzenattente = $_POST['quizzenattente']; }

if(isset($_POST['enonce'])){ $enonce = $_POST['enonce']; }
if(isset($_POST['propa'])){ $propa = $_POST['propa']; }
if(isset($_POST['propb'])){ $propb = $_POST['propb']; }
if(isset($_POST['propc'])){ $propc = $_POST['propc']; }
if(isset($_POST['propd'])){ $propd = $_POST['propd']; }
if(isset($_POST['coeff'])){ $coeff = $_POST['coeff']; }
if(isset($_POST['soluce'])){ $soluce = $_POST['soluce']; }

if(isset($_POST['modifieroptionsquizz'])){ $modifieroptionsquizz = $_POST['modifieroptionsquizz']; }
if(isset($_POST['public'])){ $public = $_POST['public']; }
if(isset($_POST['enregistrermembre'])){ $enregistrermembre = $_POST['enregistrermembre']; }
if(isset($_POST['enregistrerinvite'])){ $enregistrerinvite = $_POST['enregistrerinvite']; }
if(isset($_POST['afficherclassement'])){ $afficherclassement = $_POST['afficherclassement']; }
if(isset($_POST['afficherreponses'])){ $afficherreponses = $_POST['afficherreponses']; }

if(isset($_POST['modifierquestion'])){ $modifierquestion = $_POST['modifierquestion']; }
if(isset($_POST['supprimerquestion'])){ $supprimerquestion = $_POST['supprimerquestion']; }
if(isset($_POST['modifierenonce'])){ $modifierenonce = $_POST['modifierenonce']; }
if(isset($_POST['numeroquestion'])){ $numeroquestion = $_POST['numeroquestion']; }

$pageprincipale = 'oui';



if(isset($nouveauquizz)){
	if($nouveauquizz != ''){

		$query = mysql_query("select min(qcm_id) from quizz_index;");
		while ($row = mysql_fetch_row($query)) {
			$minquizzid = $row[0]-1;
			if($minquizzid > '0') { $minquizzid = '0'; }
		}

		mysql_query("insert into `quizz_index` (`qcm_id`, `qcm_nom`) values ('$minquizzid', '$nouveauquizz');");

		$numeroquizz = $minquizzid;
		$modifierquizz = 'oui';
	}
	else { $messagedecreation = 'Vous devez donner un nom à votre quizz !<br /><br />'; }
}




if(isset($supprimerquizz)){

	mysql_query("delete from `quizz_index` where `qcm_id` = $numeroquizz ;");
	mysql_query("delete from `quizz_questions` where `qcm_id` = $numeroquizz ;");
	mysql_query("delete from `quizz_reponses` where `qcm_id` = $numeroquizz ;");

	$messagedesuppression = '<br /><br />Le quizz a été supprimé.<br /><br />';
}





if(isset($modifierquestion)){

	$query = mysql_query("SELECT qcm_question, qcm_propa, qcm_propb, qcm_propc, qcm_propd, qcm_soluce, qcm_coeff_question  FROM `quizz_questions` where qcm_id = '$numeroquizz' and qcm_question_id = '$numeroquestion' order by qcm_question_id ASC");
	while ($row = mysql_fetch_row($query)) {
		$enonce=$row[0];
		$proposition1=$row[1];
		$proposition2=$row[2];
		$proposition3=$row[3];
		$proposition4=$row[4];
		$soluce=$row[5];
		$coeff=$row[6];
	}

	for ($i = '1'; $i < '5'; $i++) {
	if($soluce == $i) { $selected[$i] = 'selected="selected"'; }
		else { $selected[$i] = ''; }
	}

	echo '<form method="post" action="'.$_SERVER['PHP_SELF'].'"><u>Modifier la question :</u><br /><br />
		Enoncé de la question :	<input type="text" name="modifierenonce" size="40" value="'.$enonce.'" /><br />
		Proposition a : <input type="text" name="propa" size="20" value="'.$proposition1.'" /><br />
		Proposition b : <input type="text" name="propb" size="20" value="'.$proposition2.'" /><br />
		Proposition c : <input type="text" name="propc" size="20" value="'.$proposition3.'" /><br />
		Proposition d : <input type="text" name="propd" size="20" value="'.$proposition4.'" /><br />
		La bonne réponse est la :
		<select name="soluce">
			<option value="1" '.$selected[1].'>a</option>
			<option value="2" '.$selected[2].'>b</option>
			<option value="3" '.$selected[3].'>c</option>
			<option value="4" '.$selected[4].'>d</option>
		</select><br />
		Points accordés à la bonne réponse :';

	$select = '<select name="coeff">
			<option value="0">0</option>
			<option value="1">1</option>
			<option value="2">2</option>
			<option value="3">3</option>
			<option value="4">4</option>
			<option value="5">5</option>
			<option value="6">6</option>
			<option value="7">7</option>
			<option value="8">8</option>
			<option value="9">9</option>
			<option value="10">10</option>';

	echo str_replace($coeff.'">', $coeff.'" selected="selected">', $select);

	echo '	</select><br />
		<input type="hidden" name="modifierquizz" value="oui" />
		<input type="hidden" name="numeroquizz" value="'.$numeroquizz.'" />
		<input type="hidden" name="numeroquestion" value="'.$numeroquestion.'" />
		<input type="submit" value="Modifier" />
		</form>';

		unset($modifierquizz);
		unset($pageprincipale);
}




if(isset($modifierquizz)){

	if(isset($modifieroptionsquizz)){
		if(!isset($public)){ $public = 'non'; }
		if(!isset($enregistrermembre)){ $enregistrermembre = 'non'; }
		if(!isset($enregistrerinvite)){ $enregistrerinvite = 'non'; }
		if(!isset($afficherclassement)){ $afficherclassement = 'non'; }
		if(!isset($afficherreponses)){ $afficherreponses = 'non'; }

		mysql_query("update `quizz_index` set `qcm_public` = '$public', `qcm_enregistrer_resultats_membres` = '$enregistrermembre', `qcm_enregistrer_resultats_invites` = '$enregistrerinvite', `qcm_afficher_classement` = '$afficherclassement', `qcm_donner_reponses` = '$afficherreponses' where `qcm_id` = '$numeroquizz';");
	}

	if(isset($modifierenonce)){
		mysql_query("update `quizz_questions` set `qcm_question` = '$modifierenonce', `qcm_propa` = '$propa', `qcm_propb` = '$propb', `qcm_propc` = '$propc', `qcm_propd` = '$propd', `qcm_coeff_question` = '$coeff', `qcm_soluce` = '$soluce' where `qcm_id` = '$numeroquizz' and `qcm_question_id` = '$numeroquestion';");
		echo 'La question a été mise à jour.<br /><br />';
	}

	if(isset($enonce)){

		$query = mysql_query("select max(qcm_question_id) from quizz_questions where qcm_id = $numeroquizz;");
		$maxquestionid = '1';
		while ($row = mysql_fetch_row($query)) {
			$maxquestionid = $row[0]+1;
		}

		mysql_query("insert into `quizz_questions` (`qcm_id`, `qcm_question_id`, `qcm_question`, `qcm_propa`, `qcm_propb`, `qcm_propc`, `qcm_propd`, `qcm_coeff_question`, `qcm_soluce`) values ('$numeroquizz', '$maxquestionid', '$enonce', '$propa', '$propb', '$propc', '$propd', '$coeff', '$soluce');");
		echo 'La question a été ajoutée.<br /><br />';
	}

	if(isset($supprimerquestion)){
		mysql_query("delete from `quizz_questions` where `qcm_id` = $numeroquizz and `qcm_question_id` = $numeroquestion;");
		echo 'La question a été supprimée.<br /><br />';
	}

	echo '<a href="'.$_SERVER['PHP_SELF'].'">Retour à la page admin principale</a><br /><br />';

	$query = mysql_query("select qcm_public, qcm_enregistrer_resultats_membres, qcm_enregistrer_resultats_invites, qcm_afficher_classement, qcm_donner_reponses from `quizz_index` where qcm_id = '$numeroquizz'");
	while ($row = mysql_fetch_row($query)) {
		if($row[0] == 'oui'){$public = 'checked="checked"';} else {$public = '';}
		if($row[1] == 'oui'){$enregistrermembre= 'checked="checked"';} else {$enregistrermembre = '';}
		if($row[2] == 'oui'){$enregistrerinvite= 'checked="checked"';} else {$enregistrerinvite = '';}
		if($row[3] == 'oui'){$afficherclassement= 'checked="checked"';} else {$afficherclassement = '';}
		if($row[4] == 'oui'){$afficherreponses= 'checked="checked"';} else {$afficherreponses = '';}
	}

	echo '<form method="post" action="'.$_SERVER['PHP_SELF'].'"><u>Options de ce quizz :</u><br /><br />
		<input type="checkbox" name="public" value="oui" '.$public.' />Ce quizz doit être accessible en dehors de l\'espace membre (càd aux invités)<br />
		<input type="checkbox" name="enregistrermembre" value="oui" '.$enregistrermembre.' />Enregistrer les scores des membres<br />
		<input type="checkbox" name="enregistrerinvite" value="oui" '.$enregistrerinvite.' />Enregistrer les scores des invités<br />
		<input type="checkbox" name="afficherclassement" value="oui" '.$afficherclassement.' />Afficher le classement en fin de quizz<br />
		<input type="checkbox" name="afficherreponses" value="oui" '.$afficherreponses.' />Afficher les réponses en fin de quizz<br />
		<input type="hidden" name="modifierquizz" value="oui" />
		<input type="hidden" name="numeroquizz" value="'.$numeroquizz.'" />
		<input type="submit" name="modifieroptionsquizz" value="Modifier" /></form><br /><br />';

	echo '<form method="post" action="'.$_SERVER['PHP_SELF'].'"><u>Ajouter une question :</u><br /><br />
		Enoncé de la question :	<input type="text" name="enonce" size="40" /><br />
		Proposition a : <input type="text" name="propa" size="20" /><br />
		Proposition b : <input type="text" name="propb" size="20" /><br />
		Proposition c : <input type="text" name="propc" size="20" /><br />
		Proposition d : <input type="text" name="propd" size="20" /><br />
		La bonne réponse est la :
			<select name="soluce">
			<option value="1">a</option>
			<option value="2">b</option>
			<option value="3">c</option>
			<option value="4">d</option>
			</select><br />
		Points accordés à la bonne réponse :
			<select name="coeff">
			<option value="0">0</option>
			<option value="1" selected="selected">1</option>
			<option value="2">2</option>
			<option value="3">3</option>
			<option value="4">4</option>
			<option value="5">5</option>
			<option value="6">6</option>
			<option value="7">7</option>
			<option value="8">8</option>
			<option value="9">9</option>
			<option value="10">10</option>
			</select><br />
		<input type="hidden" name="modifierquizz" value="oui" />
		<input type="hidden" name="numeroquizz" value="'.$numeroquizz.'" />
		<input type="submit" value="Ajouter" />
		</form><br /><br />';

	echo '<u>Les questions actuelles :</u><br /><br />';

	$j = "0";

	$query = mysql_query("select qcm_question_id, qcm_question, qcm_propa, qcm_propb, qcm_propc, qcm_propd, qcm_soluce, qcm_coeff_question  from `quizz_questions` where qcm_id = '$numeroquizz' order by qcm_question_id ASC");
	while ($row = mysql_fetch_row($query)) {
		$numeroquestion=$row[0];
		$enonce=$row[1];
		$proposition1=$row[2];
		$proposition2=$row[3];
		$proposition3=$row[4];
		$proposition4=$row[5];
		$soluce=$row[6];
		$coeff=$row[7];

		for ($i = '1'; $i < '5'; $i++) {
			if($soluce == $i) { $checked[$i] = 'checked="checked"'; }
			else { $checked[$i] = ''; }
		}

		$j++;

		echo	$j.') '.$enonce.'<br />
			<input type="checkbox" disabled '.$checked[1].' />'.$proposition1.'<br />
			<input type="checkbox" disabled '.$checked[2].' />'.$proposition2.'<br />
			<input type="checkbox" disabled '.$checked[3].' />'.$proposition3.'<br />
			<input type="checkbox" disabled '.$checked[4].' />'.$proposition4.'<br />
			La bonne réponse vaut '.$coeff.' points.<br />
			<form method="post" action"'.$_SERVER['PHP_SELF'].'">
			<input type="hidden" name="modifierquizz" value="oui" />
			<input type="hidden" name ="numeroquizz" value="'.$numeroquizz.'" />
			<input type="hidden" name ="numeroquestion" value="'.$numeroquestion.'" />
			<input type="submit" name="modifierquestion" value="Modifier" />
			<input type="submit" name="supprimerquestion" value="Supprimer" onclick="return confirm(\'Etes-vous sûr(e) de vouloir supprimer cette question?\');" />
			</form><br /><br /><br />';
	}
	


	unset($pageprincipale);
}




if(isset($publierquizz)){

	$query = mysql_query("select max(qcm_id) from quizz_index;");
	while ($row = mysql_fetch_row($query)) {
		$maxquizzid = $row[0]+1;
		if($maxquizzid <= '0') { $maxquizzid = '1'; }
	}

	mysql_query("update `quizz_index` set `qcm_id` = '$maxquizzid' where `qcm_id` = '$numeroquizz';");
	mysql_query("update `quizz_questions` set `qcm_id` = '$maxquizzid' where `qcm_id` = '$numeroquizz';");
	mysql_query("update `quizz_reponses` set `qcm_id` = '$maxquizzid' where `qcm_id` = '$numeroquizz';");
}



if(isset($quizzenattente)){

	$query = mysql_query("select min(qcm_id) from quizz_index;");
	while ($row = mysql_fetch_row($query)) {
		$minquizzid = $row[0]-1;
		if($minquizzid > '0') { $minquizzid = '0'; }
	}

	mysql_query("update `quizz_index` set `qcm_id` = '$minquizzid' where `qcm_id` = '$numeroquizz';");
	mysql_query("update `quizz_questions` set `qcm_id` = '$minquizzid' where `qcm_id` = '$numeroquizz';");
	mysql_query("update `quizz_reponses` set `qcm_id` = '$minquizzid' where `qcm_id` = '$numeroquizz';");
}



if(isset($pageprincipale)){

	echo	'Ajouter un quizz :<br />
		Nom du quizz :
		<form method="post" action="'.$_SERVER['PHP_SELF'].'">
		<input type="text" size="10" name="nouveauquizz" />
		<input type="submit" value="Créer" />
		</form><br />';

	if(isset($messagedecreation)){ echo $messagedecreation; }

	$query = mysql_query("select qcm_id, qcm_nom FROM `quizz_index` where qcm_id <= '0' order by qcm_id");

	 if(mysql_num_rows($query) != '0'){

		echo 'Vous avez des quizz en attente d\'être publiés :<br />
		<form method="post" action="'.$_SERVER['PHP_SELF'].'">
		<select name="numeroquizz">';

		while ($row = mysql_fetch_row($query)) {
			echo '	<option value="'.$row[0].'">'.$row[1].'</option>';
		}

		echo '	</select>
		<input type="submit" name="modifierquizz" value="Modifier" />
		<input type="submit" name="supprimerquizz" value="Supprimer" onclick="return confirm(\'Etes-vous sûr(e) de vouloir supprimer ce quizz? Tous les classements associés seront effacés.\');" />
		<input type="submit" name="publierquizz" value="Publier" />
		</form>';		
	}

	echo   '<br /><br />Gérer les quizz déjà en ligne :<br />
		<form method="post" action="'.$_SERVER['PHP_SELF'].'">
		<select name="numeroquizz">';

	$query = mysql_query("select qcm_id, qcm_nom from `quizz_index` where qcm_id > '0' order by qcm_id desc");
	while ($row = mysql_fetch_row($query)) {
		echo '	<option value="'.$row[0].'">'.$row[1].'</option>';
	}

	echo'	</select>
		<input type="submit" name="modifierquizz" value="Modifier" />
		<input type="submit" name="supprimerquizz" value="Supprimer" onclick="return confirm(\'Etes-vous sûr(e) de vouloir supprimer ce quizz? Tous les classements associés seront effacés.\');" />
		<input type="submit" name="quizzenattente" value="Mettre en attente" />
		</form>';

	if(isset($messagedesuppression)){ echo $messagedesuppression; }

}

mysql_close();

?>