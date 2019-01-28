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
<?php
$lien = mysql_connect("localhost", "root","");
if ($lien ==0)
exit("impossible d'etablir la connexion");
if(mysql_select_db("abase", $lien) == 0)
exit("impossible de se connecter a la base");
$num=$_POST['num'];
$quest=$_POST['quest'];
$prop1=$_POST['prop1'];
$prop2=$_POST['prop2'];
$prop3=$_POST['prop3'];
$rep=$_POST['rep'];
$bareme=$_POST['bareme'];
if(empty($num))
{print("champ incomplet");
print'<a href="javascript:history.back();">Cliquez ici pour entrer un login a effacer</a>';
}
else
{
$requete="INSERT INTO questionnaire ( `num` , `quest` , `prop1` , `prop2` , `prop3` , `rep` , `bareme` ) VALUES ('$num', '$quest', '$prop1', '$prop2', '$prop3', '$rep', '$bareme')";
if(mysql_query($requete) == 0)
  exit("impossible d'inserer ce question");  
else
 $requete="select * from questionnaire";
 $rep=mysql_query($requete);
 if($rep==0)
 print("table question vide<br>");
 else
 {
print("<pre>NUMERO                                                    QUESTION                             proposition_1                proposition_2              proposition_3               REPENSE       Bareme<br>");
print("++*************************************************************************************************************************************************************************************************************************************************++");
while($ligne=mysql_fetch_row($rep))
{ 
$var0=$ligne[0];
$var1=$ligne[1];
$var2=$ligne[2];
$var3=$ligne[3];
$var4=$ligne[4];
$var5=$ligne[5];
$var6=$ligne[6];
print("<pre>$var0      $var1                                                                           $var2               $var3    			 $var4        	     $var5               $var6</pre>");
print("-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------");
}
}
}

?>
