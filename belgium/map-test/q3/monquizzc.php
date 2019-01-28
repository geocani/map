<?php

include 'connect.php';

if(isset($_GET['quizz'])){ $quizz = $_GET['quizz']; }
else { $quizz = '0'; }

$query = mysql_query("select qcm_afficher_classement from `quizz_index` where `qcm_id` = '$quizz'");
while ($row = mysql_fetch_row($query)) { $afficherclassement = $row[0]; }

if(isset($afficherclassement) and $afficherclassement == 'oui'){
	$i = 0;
	$j = '-1';
	$query = mysql_query("select qcm_nom, qcm_points from `quizz_reponses` where `qcm_id` = '$quizz' order by qcm_points desc");
	while ($row = mysql_fetch_row($query)) {
		if($row[1] != $j) { $i++; }
		$row[0] = str_replace('<', '', $row[0]);			// empêche d'ouvrir d'éventuelles balises contenues dans le nom des candidats (invités), pour la sécurité
		echo $i.' = '.$row[0].' avec '.$row[1].' points<br />';
		$j = $row[1];
	}
}
else {
	echo 'Vous n\'êtes pas autorisé à consulter le classement de ce quizz';
}

mysql_close();

?>












