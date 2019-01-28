<html>
<head>
<LINK rel="stylesheet" type="text/css" href="graphismes.css">
</head>
<body background="fond.jpg">
<center>QUIZZ!
<br><br>
<?php

phpinfo();



include('variables.php');

$cat=$_GET['cat'];

if($cat=="ind")
{
$nombre++;
for($a=1;$a!=$nombre;$a++)
{
$b="cat$a";
$categ=$$b;
print("<a href=\"tests.php?cat=$categ\">$categ</a><br><br>");
}

echo'<br>
<form action="creer.php" method="post"><input type="hidden" name="etape" value="1">
<input type="submit" value="cr�ez votre propre quizz"></form>';
}
else{
$db = mysql_connect($serveur, $name, $pass) or die('Erreur de connexion '.mysql_error());
mysql_select_db($base,$db) or die('Erreur de selection '.mysql_error()); 
$sql = "SELECT no,nom,cat FROM liste WHERE cat='$cat'";
$req = mysql_query($sql);
while($data = mysql_fetch_assoc($req))
{
$table=$data['no'];
$sql1 = "SELECT * FROM `$table`  LIMIT 11 , 1";
$req1=mysql_query($sql1);
$data1 = mysql_fetch_assoc($req1) or die('Erreur de lol '.mysql_error());
$img=$data1['qu'];
$niv=$data1['rep'];
print("<table><tr><td rowspan=\"2\">");
if($cat=='sda'){
print("<img src=\"$img\" width=\"150\">");}
print("</td><td>");
$niv++;
for($a=1;$a!=$niv;$a++)
{print("<img src=\"niv.jpg\">");}
$quiz=$data['no'];
$titre=$data['nom'];
print("</td><td>
<form action=\"quiz.php\" method=\"post\">
<input type=\"hidden\" name=\"no\" value=\"1\">
<input type=\"hidden\" name=\"score\" value=\"41\">
<input type=\"hidden\" name=\"reponse\" value=\"looooooool\">
<input type=\"hidden\" name=\"essai\" value=\"0\">
<input type=\"hidden\" name=\"quiz\" value=\"$quiz\">
<input type=\"submit\" value=\"jouer\" style=\"BACKGROUND-COLOR: #9966ff; \">
</form></td></tr><tr><td colspan=\"2\">$titre"."</td></tr></table>");
}}
















?>
</body></html>