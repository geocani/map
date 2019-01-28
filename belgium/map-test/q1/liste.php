<html><body bgcolor="#ffffcc"><center><br><br><font size="5">Liste des quizz pr�sents sur le site</font></center><br><br><br>

<?php
include('variables.php');

$db = mysql_connect('localhost', $name, $pass) or die('Erreur de connexion '.mysql_error());
mysql_select_db($base,$db) or die('Erreur de selection '.mysql_error()); 

$sql = "SELECT * FROM `liste` WHERE no=10000";
$req = mysql_query($sql);
$data = mysql_fetch_assoc($req);
$nb=$data['nom'];

print("<table border=\"5\"><tr>");
$nb++;
for($a=1;$a!=$nb;$a++){print("<a href=\"#$a\"> $a </a>");}

print("<td valign=\"top\" rowspan=\"$nb\">");

$sql = "SELECT * FROM `liste` WHERE no!=10000";
$req = mysql_query($sql);
while($data = mysql_fetch_assoc($req))
{
$no=$data['no'];
$titre=$data['nom'];
$cat=$data['cat'];
print("$no:$titre ($cat)<br>");

}
print("</td>");
for($a=1;$a!=$nb;$a++)
{
print("<td name=\"td$a\" style=\"\">");
$sql = "SELECT * FROM `$a`";
$req = mysql_query($sql);
print("<a name=\"$a\">");
while($data = mysql_fetch_assoc($req))
{
$no=$data['no'];
$qu=$data['qu'];
$rep=$data['rep'];
print("qu$no:$qu<br>$rep<br><br>");
}

print("</td></tr><tr>
");
}

print("</tr></table>");

?>

</body></html>