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


$db->query("select * from joueur where id_Joueur='".$id1."'");
$joueur1=$db->single();
$j1=$joueur1['Nom_Joueur'];


//var_dump($rand);
//$db->query('select*from questionnaire');
$db->query("select * from Random where id_Random= last_insert_id()");
$r=$db->single();
$rand=$r['Num_Q'];

$db->query("select * from questionnaire where id_Questionnaire='".$rand."'");
$questionnaire =$db->resultSet();


$db->query("select * from joueur where id_Joueur='".$id1."'");
$i1=$db->single();
$ip1=$i1['Adresse_ip'];
var_dump($ip1);

$db->query("SELECT * FROM joueur WHERE id_Joueur =(SELECT Max(id_Joueur) FROM joueur)");
$i2=$db->single();
$ip2=$i2['Adresse_ip'];
var_dump($ip2);



?>

<html>
<head>
	<title>Bienvenue</title>
</head>
<body>
	<div>
<a href="Question.php"><?php

echo "<html>\n<head>\n<title>Game Quiz 1.0</title>\n</head>\n<body>\n</body>\n<html>";

echo "<center><h1>Bienvenu dans le jeu</h1></br></center>";


echo"veuillez patientez.......<br/>";
?></a>
<?php   
if(isset($_POST['Environnement_Joueur'] ))
{
	if($ip==$ip1){
	header('location: Environnement_Joueur1.php');
    }
elseif(isset($_POST['Environnement_Joueur'] ))
{
	if (($ip==$ip2)) {
		header('location: Environnement_Joueur2.php');
	}
	
}
}
?>
<form method="POST" id="Environnement_Joueur" name="Environnement_Joueur" action="#" class="form-horizontal">
<center><button type="submit"  id="Environnement_Joueur" name="Environnement_Joueur" class="btn btn-primary btn-light">Allons-y</button> </center>
</form>
</div>
</body>
</html>


