<!DOCTYPE HTML PUBLIC "-//W3C// DTD XHTML 4.01 Transmitional//EN"
"http://www.w3.org/TR/xhtml/DTD/xhtml-transmitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Quizz</title>
    <meta http-equiv="content-type" content="text/html; charset=iso-8859-15"/>
    <link media="screen" type="text/css" 
    href="templates\style.css" rel="stylesheet" />
</head>   

<html>
<head><title></title></head>
<body link="#FF0000" vlink="#FF0000" text="#FF0000" bgcolor="#000000" alink="#FF2227">

  <body>
    <div id="page">  
    <div id="header"></div>
    <div id="search">
    <?php
   
     ?>
    </div>
    
    <div id="Menu_V">
       <br>
    </div>
    <div id="content">
<?php
    //Initialise le score à 0
    $score=0;
    //conection à la base
    require ("connectdb.php");
    if(isset($_POST['nominvitequizz'])){ $nominvitequizz = $_POST['nominvitequizz']; }
    //pour tous les enregistrement dans la base de la table questionnaire
    for ($i = 41; $i <91; $i++) {
        //on recupere toutes l'index de la réponse données par le joueur pour toutes les questions
        $numrep=$_POST['rep'.$i];
		
        if(isset($_POST['rep'.$i])){
        //Requete SQL pour recupéré la question et la réponse donné par l'utilisateur dans la table questionnaire
        $reqsql="Select bareme,quest,prop".$numrep." from questionnaire where num=".$i;
        $resbasereputil=mysql_query($reqsql,$cnx) or die ("Echec de $reqsql");
        $quizzutil=mysql_fetch_array($resbasereputil);
        //$repexact correspond à la réponse du joueur
        $repexactutil=$quizzutil[2];
        //$question correspond à la question
        $question=$quizzutil[1];
		$bareme=$quizzutil[0];
        
        //affichage du numero de question et de la question
        echo $i-40 .")".$question."</br>" ;
        //affichage de la reponse donné par l'utilisateur
        echo "Votre réponse : <h1>".$repexactutil."</h1>";
        
        //Requete SQL pour recupéré la bonne réponse à la question dans la table questionnaire
        $reqrep="Select rep from questionnaire where num=".$i;
        $resbase=mysql_query($reqrep,$cnx) or die ("Echec de $reqrep");
        $quizz=mysql_fetch_array($resbase);
        //$repexact correspond à la bonne reponse
        $repexact=$quizz[0];
        
        //affichage de la reponse exact
        echo "La reponse exact : <h4>".$repexact."</h4>";
        echo'</br>';
        echo'</br>';
        
        //Si l'utilisateur trouve la bonne reponse, alors un point en plus
        if ($repexactutil==$repexact){
        $score=$score+1;
		$sc=$score+$bareme;}
    }
    else{
        $score=$score;
        Echo "<h4>pas de réponse pour la question ".$i."</h4>";
        echo'</br>';
        echo'</br>';}    
    }
    echo'</br>';
    //affichage du score
	$s=$score;
	$z=($score/144)*20;
    echo"<h1>".$_POST['nom']." votre score est ".$sc." sur 140 ce qui donne ".$z." sur 20</h1>";
    
    //Affichage d'un commentaire selon la note obtenu
    if($score<=50&& $score>40){
                    echo"<br><h1>Bravo! vous etes un vrai informatiçien... </h1>";}
    if($score<=40&& $score>30){
                    echo"<br><h1>pas mal...</h1>";}
    if($score<=30 && $score>20){
                    echo"<br><h1>Vous pouver faire mieux</h1>";}
					if($score<=15 && $score>10){
                    echo"<br><h1>vous devez enrichir vos connaissances informatique...</h1>";}
    if($score<=20 && $score>10){
                    echo"<br><h1>Trop faible!!</h1>";}             
    else
	{
                    echo"<br><h1>c'est pas serieux!!!</h1>";}
	$score=$z;
    //on recupere la valeur max de l'index de la table classement
    $reqclt="Select MAX(numclass) From classement2";
    $resclt=mysql_query($reqclt,$cnx) or die ("Echec de $reqclt");
    $indexclt=mysql_fetch_array($resclt);
    //$num correspond à l'index le plus grand de la table classement
    $num=$indexclt[0];
    
    //si auccun enregistrement dans la table classement1  
    if ($num==''){
       $num=1;}
      else{
       $num=$num+1;}  
    
    //enregitrement du score avec le nom et l'index dans la table classement1
    $insertscore="Insert Into classement2 Values (".$num.",'".$_POST['nom']."',".$s.");";
    $resclt=mysql_query($insertscore,$cnx) or die ("Echec de $insertscore");
    
    //Bouton pour voir le classement   
    echo "  <form method=get action =\"classement des meuilleur.php\">" ;
    echo "</br>";
    echo "</br>";
    echo "</br>";
    echo "  <input type=\"submit\" value=\"Classement quiz confirme\"><br />";
    //ferme la connection     
    mysql_close();
?>
  </div>
    
    </div>
  </body>
</html>
