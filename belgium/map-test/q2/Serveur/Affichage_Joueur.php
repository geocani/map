<?php  


require "config/ConfigAutoloader.php";
ConfigAutoloader::register();

$db = new ConnectBd ();
$db2 = new ConnectBd ();

//var_dump($rand);
//$db->query('select*from questionnaire');

$db->query("SELECT * FROM joueur WHERE id_Joueur =(SELECT Max(id_Joueur) FROM joueur)");
$joueur2=$db->single();
$j2=$joueur2['Nom_Joueur'];
$_SESSION['Nom']=$j2;


$id=$joueur2['id_Joueur'];
$id1=$id-1;


$db->query("select * from joueur where id_Joueur='".$id1."'");
$joueur1=$db->single();
$j1=$joueur1['Nom_Joueur'];
$_SESSION['Nom']=$j1;






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

				<title>Joueurs</title>
			</head>

			<body class="my_background">

					<div class="container">

							<div class="row">
							<div class="col-md-offset-2 col-md-8">
							<h1> Joueurs <br/> <small> Joueurs inscrits a cette partie </small></h1>
							</div>
							</div>

							<div class="row">
								<div class="col-md-offset-2 col-md-3">
									<div class="form-group">
									<label for="Nom">Joueur 1</label>
									<input type="button" class="form-control" value="<?=$j1?>">
									</div>
								</div>
								

								<div class="col-md-offset-1 col-md-3">
									<div class="form-group">
									<label for="Prenom">Joueur 2</label>
									<input type="button" class="form-control" value="<?=$j2?>">
									</div>
								</div>
							</div>


					</div>

					<br/>
					<div class="row">
							<div class="col-md-offset-5 col-md-1">
								<center><a href="environnement_serveur.php" class="btn btn-primary btn-light">Commencer</a></center>
							</div>
					</div>

					</div>
			</body>
</html>