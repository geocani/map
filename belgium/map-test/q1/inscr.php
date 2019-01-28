<html>
<head>
<LINK rel="stylesheet" type="text/css" href="graphismes.css">
</head>
<body background="fond.jpg"><br><br><br>
<center><font color="red" size="5">s'inscrire dans la liste des gagnants</font></center>
<br><br>
<?php
$et=$_GET['et'];
$no=$_GET['no'];

if($et==1)
{
print("
<form action=\"inscr.php\" method=\"get\">
<input type=\"hidden\" name=\"et\" value=\"2\">
<input type=\"hidden\" name=\"no\" value=\"$no\">
Votre nom ou pseudo:<input type=\"text\" name=\"nom\"><br>
Votre adresse mail :<input type=\"text\" name=\"mail\">(facultatif)<br>
<input type=\"submit\" value=\"s incrire\">
</form>");
}

if($et==2)
{
$nom=$_GET['nom'];
$mail=$_GET['mail'];
$fp = fopen("gagnants/$no".".txt","a");
fputs($fp,"<a href=\"mailto:$mail\">$nom</a><br>
");
fclose($fp);
print("votre nom a bien été ajouté à la liste des gagnants.<br><a href=\"tests.php?cat=ind\">revenir à la page des quizz</a>
");
}
?>