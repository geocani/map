<html>
<head><title>Inscription</title>
<style type="text/css">
<!--
.Style1 {color: #000000}
-->
</style>
</head>
<body link="#FF0000" vlink="#FF0000" text="#FF0000" bgcolor="#000000" alink="#FF2227">
<center>
  <h1 class="Style1">*** Inscription ***</h1>
</center>
<h3>

<?php 

if ((empty($_POST["login"])) || (empty($_POST["motp1"])) )  
{
echo" Il faut remplir les champs necessaires (Login et mot de passe)!!";
echo' <A HREF="inscrire.php"> <center><h3>retour</center></h3> </A>' ;
exit;
} 
if($_POST['motp1']!=$_POST['motp2'])
{
	echo"Svp verifier votre mot de passe!! ";
	echo' <A HREF="inscrire.php"> <center><h3>retour</center></h3> </A>' ;
}

else
{ 
$lien = mysql_connect("localhost","root");
if ($lien ==0)
	exit("impossible d'etablir la connexion");
if(mysql_select_db("abase", $lien) == 0)
	exit("impossible de se connecter a la base");


$login =  $_POST['login']; 
$motp = $_POST['motp1'] ; 
$nom =  $_POST['nom']; 
$prenom = $_POST['prenom'] ; 
$age =  $_POST['age']; 
$email=  $_POST['email']; 
$email1 =  $_POST['email1']; 
$email2=  $_POST['email2']; 
$email3 =  $_POST['email3']; 




if(mysql_query("insert into membre (login,motpass,nom,prenom,age,email,email1,email2,email3) 
		values ('$login','$motp','$nom','$prenom','$age','$email','$email1','$email2','$email3')")==0)
{
	echo "erreur d'insertion ,login existe deja";
	echo' <A HREF="inscrire.php"> <center><h3>retour</center></h3> </A>' ;
}
else
{
	echo ' votre inscription est faite correctement';
	echo' <A HREF="index.php"> <center><h3>retour</center></h3> </A>' ;
}


if (mysql_close()==false)
	exit("Fermeture impossible de la base");
 


 
}
?>
</h3>
</body>
</html>

