<?php


  require "config/ConnectBd.php";
  

  $db=new ConnectBd ();

  $db->query("select*from joueur");
  //$db->execute();
  $posts=$db->resultSet();
  //print_r($posts);
  	
 $ip=$_SERVER['REMOTE_ADDR'];
 

	 if(isset($_POST['Nom'])){

		 $Nom=$_POST['Nom'];
		 
		 	$db->query("INSERT INTO joueur (Nom_Joueur,Adresse_ip) VALUES ('".$Nom."','".$ip."');");
		 	$db->execute();
		 	header('location: Bienvenue.php');
			/*$result=$db->query($query) or die("erreur!!");
			$result->execute();*/

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

			<link rel="stylesheet" href="css/bootstrap.min.css">
			<link rel="stylesheet" href="css/bootstrap-theme.min.css">
			<link rel="stylesheet" href="style.css" />
		<title>Enregistrement</title>
</head>

<body class="my_background">


		<div class="container">

				<div class="row">
					<div class="col-md-offset-2 col-md-8">
						<h1> Enregistrement du Joueur <br/> <small>Merci d'entrer votre Nom</small></h1>
					</div>
				</div>
			<form method="POST" name="Enregistrement" action="#" class="form-horizontal">
				<div class="row">

					<div class="col-md-offset-2 col-md-3">
					
						<div class="form-group">
							<label for="Nom">Nom</label>
							<input id="Nom" type="text" class="form-control"  name="Nom" placeholder="Entrez votre nom"/>
						</div>
					
					</div>



				</div>
			

				<br/>
				<div class="row">
					<div class="col-md-offset-5 col-md-1">
					   <button type="submit" class="btn btn-primary btn-light">Enregistrer</button> 
					</div>
				</div>
			</form>
		</div>

			
</body>
</html>