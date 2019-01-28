<html>
<head>
<LINK rel="stylesheet" type="text/css" href="graphismes.css">
</head>
<body background="fond.jpg">
<br><br><center><font color="red" size="5">Créez votre quizz!!!</font><br><br><br>

<?php
include('variables.php');

$etape=$_POST['etape'];

if($etape==1)
{
print("
Cette interface va vous permettre de créer votre propre quizz, dans l'une des 4 catégories disponibles! Votre quizz sera 
immédiatement disponible sur le site.<br></center>
Etape 1/3: informations principales sur le quizz:
<br><br>
<form method=\"post\" action=\"creer.php\">
Titre de votre quizz: <input type=\"text\" size=\"35\" name=\"titre\"><br>
Niveau de votre quizz: <select name=\"niv\">
		<option>1
		<option>2
		<option>3
		<option>4
		<option>5
			</select><br>
Catégorie de votre quizz:
<select name=\"cat\">");
$nombre++;
for($a=1;$a!=$nombre;$a++)
{
$b="cat$a";
$categ=$$b;
print("<option>$categ</option>");
}

print("</select><br>
Code de la couleur du texte (6 caracteres):<input type=\"text\" size=\"7\" name=\"couleur\">
<a href=\"couleurs.htm\" target=\"lol\">voir les codes couleurs disponibles</a><br>
Url de la texture constituant le fond des pages du quizz:<input type=\"text\" size=\"50\" name=\"fond\"><br>
<a href=\"http://membres.lycos.fr/gondolinsql/texture/voir.htm\" target=\"lol\">Voir ma collection de textures (et leurs URLs, bien sur)</a>
<br>
<input type=\"hidden\" name=\"etape\" value=\"2\">
<input type=\"submit\" value=\"passer à l'étape 2\">
</form>
");
}

if($etape==2)
{
$db = mysql_connect($serveur, $name, $pass) or die('Erreur de connexion '.mysql_error());
mysql_select_db($base,$db) or die('Erreur de selection '.mysql_error()); 
$sql = "SELECT * FROM liste WHERE no=10000";
$req = mysql_query($sql);
$data = mysql_fetch_assoc($req);

$no=$data['nom']+1;
$cat=$_POST['cat'];
$titre=$_POST['titre'];	$titre=addslashes("$titre");
$niv=$_POST['niv'];
$fond=$_POST['fond'];
$couleur=$_POST['couleur'];

$sql="UPDATE `liste` SET `nom` = '$no' WHERE `no` = '10000'";
mysql_query($sql);

$sql="INSERT INTO `liste` ( `no` , `nom` , `cat` ) VALUES ('$no', '$titre', '$cat')";
mysql_query($sql);

$sql="CREATE TABLE `$no` (`no` INT NOT NULL ,`qu` TEXT NOT NULL ,`rep` TEXT NOT NULL )";
mysql_query($sql);

print("
Etape 2/3: les questions et réponses du quizz:
<br><br>
<form action=\"creer.php\" method=\"post\">
<input type=\"hidden\" name=\"etape\" value=\"3\">
<input type=\"hidden\" name=\"fond\" value=\"$fond\">
<input type=\"hidden\" name=\"niv\" value=\"$niv\">
<input type=\"hidden\" name=\"couleur\" value=\"$couleur\">
<input type=\"hidden\" name=\"no\" value=\"$no\">

Question1:<input type=\"text\" name=\"qu1\" size=\"50\"><br>
Réponse1:<input type=\"text\" name=\"rep1\" size=\"15\"><br><br>
Question2:<input type=\"text\" name=\"qu2\" size=\"50\"><br>
Réponse2:<input type=\"text\" name=\"rep2\" size=\"15\"><br><br>
Question3:<input type=\"text\" name=\"qu3\" size=\"50\"><br>
Réponse3:<input type=\"text\" name=\"rep3\" size=\"15\"><br><br>
Question4:<input type=\"text\" name=\"qu4\" size=\"50\"><br>
Réponse4:<input type=\"text\" name=\"rep4\" size=\"15\"><br><br>
Question5:<input type=\"text\" name=\"qu5\" size=\"50\"><br>
Réponse5:<input type=\"text\" name=\"rep5\" size=\"15\"><br><br>
Question6:<input type=\"text\" name=\"qu6\" size=\"50\"><br>
Réponse6:<input type=\"text\" name=\"rep6\" size=\"15\"><br><br>
Question7:<input type=\"text\" name=\"qu7\" size=\"50\"><br>
Réponse7:<input type=\"text\" name=\"rep7\" size=\"15\"><br><br>
Question8:<input type=\"text\" name=\"qu8\" size=\"50\"><br>
Réponse8:<input type=\"text\" name=\"rep8\" size=\"15\"><br><br>
Question9:<input type=\"text\" name=\"qu9\" size=\"50\"><br>
Réponse9:<input type=\"text\" name=\"rep9\" size=\"15\"><br><br>
Question10:<input type=\"text\" name=\"qu10\" size=\"50\"><br>
Réponse10:<input type=\"text\" name=\"rep10\" size=\"15\"><br><br>
<input type=\"submit\" value=\"passer à l'étape 3\">
</form>");
}

if($etape==3)
{
$db = mysql_connect($serveur, $name, $pass) or die('Erreur de connexion '.mysql_error());
mysql_select_db($base,$db) or die('Erreur de selection '.mysql_error()); 

$qu1=$_POST['qu1'];	$qu1=addslashes("$qu1");
$rep1=$_POST['rep1'];	$rep1=addslashes("$rep1");
$qu2=$_POST['qu2'];	$qu2=addslashes("$qu2");
$rep2=$_POST['rep2'];	$rep2=addslashes("$rep2");
$qu3=$_POST['qu3'];	$qu3=addslashes("$qu3");
$rep3=$_POST['rep3'];	$rep3=addslashes("$rep3");
$qu4=$_POST['qu4'];	$qu4=addslashes("$qu4");
$rep4=$_POST['rep4'];	$rep4=addslashes("$rep4");
$qu5=$_POST['qu5'];	$qu5=addslashes("$qu5");
$rep5=$_POST['rep5'];	$rep5=addslashes("$rep5");
$qu6=$_POST['qu6'];	$qu6=addslashes("$qu6");
$rep6=$_POST['rep6'];	$rep6=addslashes("$rep6");
$qu7=$_POST['qu7'];	$qu7=addslashes("$qu7");
$rep7=$_POST['rep7'];	$rep7=addslashes("$rep7");
$qu8=$_POST['qu8'];	$qu8=addslashes("$qu8");
$rep8=$_POST['rep8'];	$rep8=addslashes("$rep8");
$qu9=$_POST['qu9'];	$qu9=addslashes("$qu9");
$rep9=$_POST['rep9'];	$rep9=addslashes("$rep9");
$qu10=$_POST['qu10'];	$qu10=addslashes("$qu10");
$rep10=$_POST['rep10'];	$rep10=addslashes("$rep10");

$couleur=$_POST['couleur'];
$niv=$_POST['niv'];
$fond=$_POST['fond'];
$no=$_POST['no'];

$sql1="INSERT INTO `$no` VALUES (1, '$qu1', '$rep1')";
$sql2="INSERT INTO `$no` VALUES (2, '$qu2', '$rep2')";
$sql3="INSERT INTO `$no` VALUES (3, '$qu3', '$rep3')";
$sql4="INSERT INTO `$no` VALUES (4, '$qu4', '$rep4')";
$sql5="INSERT INTO `$no` VALUES (5, '$qu5', '$rep5')";
$sql6="INSERT INTO `$no` VALUES (6, '$qu6', '$rep6')";
$sql7="INSERT INTO `$no` VALUES (7, '$qu7', '$rep7')";
$sql8="INSERT INTO `$no` VALUES (8, '$qu8', '$rep8')";
$sql9="INSERT INTO `$no` VALUES (9, '$qu9', '$rep9')";
$sql10="INSERT INTO `$no` VALUES (10, '$qu10', '$rep10')";
$sql11="INSERT INTO `$no` VALUES (100, '$fond', '$couleur')";
$sql12="INSERT INTO `$no` VALUES (127, '', '$niv')";
mysql_query($sql1) or die('Erreur de insert1 '.mysql_error());
mysql_query($sql2) or die('Erreur de insert2 '.mysql_error());
mysql_query($sql3) or die('Erreur de insert3 '.mysql_error());
mysql_query($sql4) or die('Erreur de insert4 '.mysql_error());
mysql_query($sql5) or die('Erreur de insert5 '.mysql_error());
mysql_query($sql6) or die('Erreur de insert6 '.mysql_error());
mysql_query($sql7) or die('Erreur de insert7 '.mysql_error());
mysql_query($sql8) or die('Erreur de insert8 '.mysql_error());
mysql_query($sql9) or die('Erreur de insert9 '.mysql_error());
mysql_query($sql10) or die('Erreur de insert10 '.mysql_error());
mysql_query($sql11) or die('Erreur de insert11 '.mysql_error());
mysql_query($sql12) or die('Erreur de insert12 '.mysql_error());

print("etape 3/3 : création de votre quizz<br><br>
Votre quizz a bien été créé. ous pourvez des à présent le tester dans la catégorie quizz.<br>
<br><a href=\"tests.php?cat=ind\">Tester votre quizz</a>");

fopen("gagnants/$no".".txt","w");
}

?>
</body></html>