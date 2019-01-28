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

 $requete="select * from membre ";
 $rep=mysql_query($requete);
 if($rep==0)
 print("table membre vide<br>");
 else
 {
 print("la liste des membre inscrit sont:");
 print("                                                              ");
 print("   																		");
print("<pre>NOM		  PRENOM		  	LOGIN			          PASSWORD			           E_MAIL<br>");
print("++**************************************************************************************************************************************++");
while($ligne=mysql_fetch_row($rep))
{ 
$var0=$ligne[0];
$var1=$ligne[1];
$var2=$ligne[3];
$var3=$ligne[4];
$var4=$ligne[5];
print("<pre>    $var0         	  $var1			  $var2			  $var3				 $var4        </pre>");
}
}


?>
