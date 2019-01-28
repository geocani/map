<html>
<head>
<LINK rel="stylesheet" type="text/css" href="graphismes.css">
</head>


<?php
include('variables.php');

$quiz=$_POST['quiz'];
$no=$_POST['no'];
$score=$_POST['score'];
$essai=$_POST['essai'];
$reponse=$_POST['reponse'];

$score--;
$reponse=strtolower($reponse);
$lol1="ÀÁÂÃÄÅàáâãäåÒÓÔÕÖØòóôõöøÈÉÊËèéêëÌÍÎÏìíîïÙÚÛÜùúûüÿÑñÇç'";
$lol2="AAAAAAaaaaaaOOOOOOooooooEEEEeeeeIIIIiiiiUUUUuuuuyNnCc ";
$reponse = strtr($reponse,$lol1,$lol2);

$db = mysql_connect($serveur, $name, $pass) or die('Erreur de connexion '.mysql_error());
mysql_select_db($base,$db) or die('Erreur de selection '.mysql_error()); 

$sql = "SELECT * FROM `$quiz` LIMIT 10,1";
$req = mysql_query($sql);
$data = mysql_fetch_assoc($req);
$fond = $data['qu'];
$couleur = $data['rep'];

$lol=$no-1;
$sql = "SELECT * FROM `$quiz`  LIMIT $lol , 1";
$req = mysql_query($sql);
$data = mysql_fetch_assoc($req) or die('Erreur de lol '.mysql_error());
$rep=$data['rep'];
$rep=strtolower($rep);
$rep = strtr($rep,$lol1,$lol2);
if(ereg("$rep","$reponse"))
{
$no++;
$lol++;
$essai=1;
}
elseif($essai==3)
{
$essai=1;
$no++;
$score--;
$lol++;
}
else
{
$essai++;
}


if($no<=10)
{
$sql = "SELECT * FROM `$quiz`  LIMIT $lol , 1";
$req = mysql_query($sql);
$data = mysql_fetch_assoc($req);
$question=$data['qu'];

print("<body background=\"$fond\" text=\"$couleur\">");

print("<center><BR><BR><BR><BR><BR><font size=\"6\">Question $no"."<br><br><small><small><small>
$question"."<br><br>");

print("<form action=\"quiz.php\" method=\"post\">
<input type=\"hidden\" name=\"no\" value=\"$no\">
<input type=\"hidden\" name=\"score\" value=\"$score\">
<input type=\"test\" name=\"reponse\" size=\"15\">
<input type=\"hidden\" name=\"essai\" value=\"$essai\">
<input type=\"hidden\" name=\"quiz\" value=\"$quiz\">
<input type=\"submit\" value=\"valider\">
</form>");

print("</small></small></small></font></center></body></html>");
}
if($no==11)
{
include("gagne.php");
}

?>