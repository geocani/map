
<!DOCTYPE HTML PUBLIC "-//W3C// DTD XHTML 4.01 Transmitional//EN"
"http://www.w3.org/TR/xhtml/DTD/xhtml-transmitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Quizz </title>
    <meta http-equiv="content-type" content="text/html; charset=iso-8859-15"/>
    <link media="screen" type="text/css" 
    href="templates\style.css" rel="stylesheet" />
<html>
<head><title>Inscription</title></head>
<body link="#FF0000" vlink="#FF0000" text="#FF0000" bgcolor="#000000" alink="#FF2227">

</head>   



  <body>
    <div id="page">  
    <div id="header">
      <p align="center">&nbsp; </p>
      </div>
    
    <div id="Menu_V">
       <p align="center">&nbsp;</p>
       <p align="center"><br>
            </p>
    </div>
    <div id="content">
<?php
        echo "<h4>Voici le classement final :</h4>";
        //connection à la base abase
        require ("connectdb.php");
        //On recupere les donné avec la requete dans la table classement
        $reqclt="SELECT *FROM `classement` ORDER BY `score` DESC LIMIT 0, 30 ";
        $resclt=mysql_query($reqclt,$cnx) or die ("Echec de $sqlquest");
        //Indice du classement
        $num=1;
        //On affiche toutes les données du classement
        while($indexclt=mysql_fetch_array($resclt)){
            
            $nom=$indexclt[1];  
            $score=$indexclt[2];
            echo "</br>";
            echo "</br>";
            echo "<h1>".$num.") ".$nom." avec ".$score." points </h1>";
            $num++;}
       
      //fermeture de la connection         
      mysql_close();
    echo "  <form method=get action =\"index.php\">" ;
    echo "</br>";
    echo "</br>";
    echo "</br>";
    echo "  <input type=\"submit\" value=\"Retour à l'acueil\"><br />";
?>
<p align="center">&nbsp;</p>
<p align="center">&nbsp;</p>
<p align="center">&nbsp;</p>
    </div>
    
    </div>
</body>
</html>
