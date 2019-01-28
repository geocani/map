<?php


require "config/ConfigAutoloader.php";
ConfigAutoloader::register();

$db = new ConnectBd ();

$ip=$_SERVER['REMOTE_ADDR'];


$db->query("SELECT * FROM joueur WHERE id_Joueur =(SELECT Max(id_Joueur) FROM joueur)");
$joueur2=$db->single();
$j2=$joueur2['Nom_Joueur'];
$id=$joueur2['id_Joueur'];

$id1=$id-1;


$db->query("SELECT * from joueur where id_Joueur='".$id1."'");
$joueur1=$db->single();
$j1=$joueur1['Nom_Joueur'];


//var_dump($rand);
//$db->query('select*from questionnaire');
$db->query("SELECT * from Random where id_Random= (SELECT Max(id_Random) FROM Random)");
$r=$db->single();
$rand=$r['Num_Q'];

$db->query("SELECT * from questionnaire where id_Questionnaire='".$rand."'");
$questionnaire =$db->resultSet();


$db->query("select * from joueur where id_Joueur='".$id1."'");
$i1=$db->single();
$ip1=$i1['Adresse_ip'];
var_dump($ip1);



//$question=$db->single();

//var_dump($questionnaire); //afficher le resultat
/*if (isset($_GET["page"]) && $_GET["page"] == "page") {
	//echo "Demande modif d'un article";
	$id = $_GET["id_Questionnaire"];
	$db->query("select*from posts where id_Questionnaire = '".$id."' ");
	$single = $db->single();
	//print_r($single);
}	*/
  
		 if($ip==$ip1){
 if(isset($_POST['A'])){
			$db->query("INSERT INTO reponses1 (Rep_Joueur1) VALUES ('A');");
		 	$db->execute();
		 	header('location: Bienvenue.php');
		 }

if(isset($_POST['B'] )){
			$db->query("INSERT INTO reponses1 (Rep_Joueur1) VALUES ('B');");
		 	$db->execute();
		 	header('location: Bienvenue.php');
		 }

if(isset($_POST['C'] )){
			$db->query("INSERT INTO reponses1 (Rep_Joueur1) VALUES ('C');");
		 	$db->execute();
		 	header('location: Bienvenue.php');
		 }

if(isset($_POST['D'] )){
			$db->query("INSERT INTO reponses1 (Rep_Joueur1) VALUES ('D');");
		 	$db->execute();
		 	header('location: Bienvenue.php');
		 }
}
		

		 

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
					<form method="POST" name="Reponse" action="" class="form-horizontal">
						<button id="A" name="A" type="submit" class="btn btn-lg btn-A-outline "><?= $questions["A"]; ?></button></a>
		          		<button id="B" name="B" type="submit" class="btn btn-lg btn-B-outline"><?= $questions["B"]; ?></button></a>
						<button id="C" name="C" type="submit" class="btn btn-lg btn-C-outline"><?= $questions["C"]; ?></button></a>
		          		<button id="D" name="D" type="submit" class="btn btn-lg btn-D-outline"><?= $questions["D"]; ?></button></a>
		      		</form>	
		      	</p>	
                        
	 			</div>
			</form>	

		<?php endforeach ?> 	

		        

	</center>

</body>
</html>