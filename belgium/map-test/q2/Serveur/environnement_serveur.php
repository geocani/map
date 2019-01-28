<?php

include_once('random.php');

//$question=$db->single();

//var_dump($questionnaire); //afficher le resultat
/*if (isset($_GET["page"]) && $_GET["page"] == "page") {
	//echo "Demande modif d'un article";
	$id = $_GET["id_Questionnaire"];
	$db->query("select*from posts where id_Questionnaire = '".$id."' ");
	$single = $db->single();
	//print_r($single);
}*/
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">

	<title>AppliWeb</title>

	
	<link href="css/bootstrap.css" rel="stylesheet">
	<link href="css/bootstrap-theme.min.css" rel="stylesheet">
	
</head>
<body>
	<center>

		<h1>QUIZZ</h1>


		<?php foreach ($questionnaire as $questions): ?>

			<form method="post" name="Question" class="form-horizontal">

				<div class="Question">
					
					<p>

						<input type="button" class="btn btn-primary  " name="question" value="<?=$questions["Question"]?>">

					</p>
					<p>

		      			<button type="button" class="btn btn-lg btn-A-outline "><?= $questions["A"]; ?></button></a>
		          		<button type="button" class="btn btn-lg btn-B-outline"><?= $questions["B"]; ?></button></a>
		          		<button type="button" class="btn btn-lg btn-C-outline"><?= $questions["C"]; ?></button></a>
		      			<button type="button" class="btn btn-lg btn-D-outline"><?= $questions["D"]; ?></button></a>
		      		</p>	
                        <center><a href="Affichage_Reponses.php" class="btn btn-primary btn-light">Afficher</a></center>
	 			</div>
			</form>	

		<?php endforeach ?> 	

		        

	</center>

</body>
</html>