<?php  


require "config/ConfigAutoloader.php";
ConfigAutoloader::register();



$db = new ConnectBd ();




$db->query("SELECT * FROM Random WHERE id_Random =(SELECT Max(id_Random) FROM Random) ");
$r=$db->single();
$rand=$r['Num_Q'];

$db->query("select * from questionnaire where id_Questionnaire='".$rand."'");
$id_Q=$db->single();
$id_R=$id_Q['Reponse'];


//$db->query('select*from questionnaire');



$db->query("SELECT * FROM joueur WHERE id_Joueur =(SELECT Max(id_Joueur) FROM joueur)");
$joueur2=$db->single();
$j2=$joueur2['Nom_Joueur'];

//var_dump($_SESSION);

$id=$joueur2['id_Joueur'];
$id1=$id-1;


$db->query("select * from joueur where id_Joueur='".$id1."'");
$joueur1=$db->single();
$j1=$joueur1['Nom_Joueur'];


//var_dump($_SESSION);


$db->query("SELECT * FROM reponses1 WHERE id_Reponse1 =(SELECT Max(id_Reponse1) FROM reponses1)");
$rep1=$db->single();
$RepJ1=$rep1['Rep_Joueur1'];

$db->query("SELECT * FROM reponses2 WHERE id_Reponse2 =(SELECT Max(id_Reponse2) FROM reponses2)");
$rep2=$db->single();
$RepJ2=$rep2['Rep_Joueur2'];



$db->query("SELECT * FROM joueur WHERE id_Joueur =(SELECT Max(id_Joueur) FROM joueur)");
$s2=$db->single();
$score2=$s2['Score_Joueur'];


$db->query("select * from joueur where id_Joueur='".$id1."'");
$s1=$db->single();
$score1=$s1['Score_Joueur'];



	



if ($RepJ1==$id_R) 
{
	$rep1="juste";
	$score1=$s1['Score_Joueur'];
	$score1=$score1+1;
	$db->query("UPDATE joueur set Score_Joueur='".$score1."' WHERE id_Joueur='".$id1."'");
	$db->execute();
}
else{
	$rep1="faux";
	$score1=$s1['Score_Joueur'];
	$score1=$score1;
	$db->query("UPDATE joueur set Score_Joueur='".$score1."'  WHERE id_Joueur='".$id1."'");
	$db->execute();
}

if ($RepJ2==$id_R) 
{
	$rep2="juste";
	$score2=$s2['Score_Joueur'];
	$score2=$score2+1;
	$db->query("UPDATE joueur set Score_Joueur='".$score2."'  WHERE id_Joueur='".$id."'");
	$db->execute();
}
else{
	$rep2="faux";
	$score2=$s2['Score_Joueur'];
	$score2=$score2;
	$db->query("UPDATE joueur set Score_Joueur='".$score2."'  WHERE id_Joueur= '".$id."'");
	$db->execute();
}

if ($score1==3 || $score2==3) {
	 echo "partie terminee";
}



?>

<!DOCTYPE html>
<html>
			<head>
				<meta http-equiv="Content-Type" content="text/html;charset=ISO-8859-1">
				<meta name="Content-Language" content="fr" />
				<meta name="Description" content="" />

				<meta name="Subject" content="" />
				<meta name="Content-Type" content="utf-8" />
				<meta name="viewport" content="width=device-width, initial-scale=1">
				<link rel="stylesheet" href="css/bootstrap.min.css">
				<link rel="stylesheet" href="css/bootstrap-theme.min.css">

				<title>Scores</title>
			</head>

			<body class="my_background">

				<div class="container">

					<div class="row">
					<div class="col-md-offset-2 col-md-8">
					<h1> Scores <br/> <small> Scores des Joueurs </small></h1>
					</div>
					</div>

					<div class="row">
						<div class="col-md-offset-2 col-md-3">
							<div class="form-group">
								<label for="Nom">Joueur 1</label>
								<input type="button" class="form-control" value="<?=$joueur1['Nom_Joueur']?>"><br/>
								<input type="button" class="form-control" value="<?=$RepJ1?>"><br/>
								<input type="button" class="form-control" value="<?=$rep1?>"><br/>
								<input type="button" class="form-control" value="<?=$score1?>">
							</div>
						</div>
						

						<div class="col-md-offset-1 col-md-3">
							<div class="form-group">
								<label for="Prenom">Joueur 2</label>
								<input type="button" class="form-control" value="<?=$joueur2['Nom_Joueur']?>"><br/>
								<input type="button" class="form-control" value="<?=$RepJ2?>"><br/>
								<input type="button" class="form-control" value="<?=$rep2?>"><br/>
								<input type="button" class="form-control" value="<?=$score2?>">
							</div>
						</div>
					</div>


				</div>

				<br/>
				<div class="row">
					<div class="col-md-offset-5 col-md-1">
				<center><a href="environnement_serveur.php" class="btn btn-primary btn-light">Suivant</a></center>
					</div>
				</div>

				
			</body>
</html>