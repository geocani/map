
<html>
<style type="text/css">
<!--
.Style1 {
	color: #FF0000;
	font-family: "Times New Roman", Times, serif;
	font-style: italic;
	font-weight: bold;
	font-size: 24px;
}
-->
</style>
<body link="#FF0000" vlink="#FF0000" text="#FF0000" bgcolor="#000000" alink="#FF2227">
<center>
  <h1 class="Style1">Quiz Debutant</h1>
  <hr></center>
<h3>
 <?php
 
     ?>
    </div>
    <div id="Menu_V">
    </div>
    <div id="content">
    <?php
        echo '<form method="post" action="page3.php">';    
        
            require ("connectdb.php");//connection à la base
            //Execution de la requete SQL
            //$reqsql="Select num,quest,prop1,prop2,prop3,rep,bareme from questionnaire where num=".$id;
            $reqsql="SELECT * FROM questionnaire WHERE num<11 limit 11";
            $resbase=mysql_query($reqsql,$cnx) or die ("Echec de $sqlquest");
            
                        
            while ($abase=mysql_fetch_assoc($resbase)){
            //$num prend la valeur trouvé dans le champs 0
            $num=$abase['num'];
            //$question prend la valeur trouvé dans le champs 1
            $question=$abase['quest'];
            //$reponse1 prend la valeur trouvé dans le champs 2
            $reponse1=$abase['prop1'];
            //$reponse2 prend la valeur trouvé dans le champs 3
            $reponse2=$abase['prop2'];
            //$reponse3 prend la valeur trouvé dans le champs 3
            $reponse3=$abase['prop3'];
            //$reponse4 prend la valeur trouvé dans le champs 4
            //$bareme=$abase['bareme'];
            //$repexact prend la valeur trouvé dans le champs 5
            $repexact=$abase['rep'];
            
            echo '<h1>';
            //Affichage à l'ecran du numero de la question et de la question       
            echo $num.") ".$question;
            echo "<br />";
            //Affichage du choix des réponses avec des radiobutton
            echo '<h2>';
            echo '<input type="radio" name="rep'.$num.'" value="1" />'.$reponse1.'<br />';
	        echo '<input type="radio" name="rep'.$num.'" value="2" / checked >'.$reponse2.'<br />';
			    
            echo "<br />";
            echo "<br />";
            echo '</h2>';
            echo '</h1>';}
            
        //ferme la connection à la base
        mysql_close();
    
    //Renseignement du nom pour enregistrement dans la base
    echo "  Quel est votre nom ?<br />";
    echo $nom="  <input type=\"text\" name=\"nom\" value=\"votre nom ici\" size=\"20\"><br /> ";
         echo '<input type="submit" value="Valider" /></form>';
    
?>

<form action="mailto:abidou09@yahoo.fr" method="post">
<pre>&nbsp; 
</pre>	   
</br>
</br>
<hr>
<h3 align="center"><a href="index.php" style="text-decoration: none">retour a la 
page d'acceuil </a>
</h3>
<hr>
</form>
</body>
</html>