<html>
<head><title>Connexion</title>
<style type="text/css">
<!--
.Style1 {color: #000000}
-->
</style>
</head>

<body link="#FF0000" vlink="#FF0000" text="#FF0000" bgcolor="#000000" alink="#FF2227">
<div align="center"></div>
<center>
  <h1 class="Style1"><font color="#FF0000">Connexion </font></h1>
  <p align="left" class="Style1">&nbsp;</p>
</center>
<h3 align="left">



<?php
$lien = mysql_connect("localhost","root");
if ($lien ==0)
	exit("impossible d'etablir la connexion");
if(mysql_select_db("abase", $lien) == 0)
	exit("impossible de se connecter a la base");

$requete = mysql_query("select nom,prenom,login from membre where login = '".$_POST["vlogin"]."' 
	and motpass = '".$_POST["vmotp"]."' ");

$ligne = mysql_fetch_array($requete);
if($ligne)
{

$nom =  $ligne[0]; 
$prenom = $ligne[1]; 
$login = $ligne[2];
if ( $login=="administrateur")
{

printf("Bienvenue ");
printf("$nom\n");
echo' <A HREF="admin.php"> <center><h3>ZONE ADMINISTRATEUR</center></h3> </A>' ;
}
else
{
printf("Bienvenue ");
printf("$nom\n");
printf("\t<TD>$prenom</TD>\n\n");
printf("choisir entre quiz confirme : 30 questions de niveaux moyen \n quiz des meilleur:c'est le vrai test 50 question approfendu en informatique si vous faisez un score sup a 35 alors vous etez bien des informatiçiens ");


echo' <A HREF="Quiz des Meuilleur.php"> <center><h3>Quiz des meilleurs</center></h3> </A>' ;
echo' <A HREF="Quiz Confirme.php"> <center><h3>Quiz confirme</center></h3> </A>' ;
echo' <A HREF="index.php"> <center><h3>retour</center></h3> </A>';
}
}
else
{
	echo 'Login ou/et Mot de passe invalide';
	echo' <A HREF="index.php"> <center><h3>retour</center></h3> </A>' ;
	
			
}



if (mysql_close()==false)
	exit("Fermeture impossible de la base");

?>
</h3>
<p align="left" class="Style1">&nbsp;</p>
<h3 align="left">&nbsp; </h3>
</body>
</html>