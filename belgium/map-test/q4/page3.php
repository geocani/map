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
<head><title>Inscription</title></head>
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
    //Initialise le score � 0
    $score=0;
    //conection � la base
    require ("connectdb.php");
    if(isset($_POST['nominvitequizz'])){ $nominvitequizz = $_POST['nominvitequizz']; }
    //pour tous les enregistrement dans la base de la table questionnaire
    for ($i = '1'; $i <11; $i++) {
        //on recupere toutes l'index de la r�ponse donn�es par le joueur pour toutes les questions
        $numrep=$_POST['rep'.$i];
        if(isset($_POST['rep'.$i])){
        //Requete SQL pour recup�r� la question et la r�ponse donn� par l'utilisateur dans la table questionnaire
        $reqsql="Select bareme,quest,prop".$numrep." from questionnaire where num=".$i;
        $resbasereputil=mysql_query($reqsql,$cnx) or die ("Echec de $reqsql");
        $quizzutil=mysql_fetch_array($resbasereputil);
        //$repexact correspond � la r�ponse du joueur
        $repexactutil=$quizzutil[2];
        //$question correspond � la question
        $question=$quizzutil[1];
        $bareme=$quizzutil[0];
        //affichage du numero de question et de la question
        echo $i.") ".$question."</br>";
        //affichage de la reponse donn� par l'utilisateur
        echo "Votre r�ponse : <h1>".$repexactutil."</h1>";
        
        //Requete SQL pour recup�r� la bonne r�ponse � la question dans la table questionnaire
        $reqrep="Select rep from questionnaire where num=".$i;
        $resbase=mysql_query($reqrep,$cnx) or die ("Echec de $reqrep");
        $quizz=mysql_fetch_array($resbase);
        //$repexact correspond � la bonne reponse
        $repexact=$quizz[0];
        
        //affichage de la reponse exact
        echo "La reponse exact : <h4>".$repexact."</h4>";
        echo'</br>';
        echo'</br>';
        
        //Si l'utilisateur trouve la bonne reponse, alors un point en plus
        if ($repexactutil==$repexact){
        $score=$score+$bareme;}
    }
    else{
        $score=$score;
        Echo "<h4>pas de r�ponse pour la question ".$i."</h4>";
        echo'</br>';
        echo'</br>';}    
    }
    echo'</br>';
    //affichage du score
	$s=$score;
    echo"<h1>".$_POST['nom']." votre score est ".$score." sur 10</h1>";
    
    //Affichage d'un commentaire selon la note obtenu
    if($score<=10&& $score>8){
                    echo"<br><h1>Bravo! vous etes un vrai informati�ien,Vous pouver essayer les quiz avancees(Quiz des meuilleur & Quiz Confirm�)... </h1>";}
    if($score<=8 && $score>4){
                    echo"<br><h1>pas mal,Vous pouver essayer les quiz avancees(Quiz des meuilleur & Quiz Confirm�)...</h1>";}
    if($score<=4 && $score>2){
                    echo"<br><h1>vous devez enrichir vos connaissances informatique...</h1>";}
    if($score<=2 && $score>0){
                    echo"<br><h1>Trop faible!!</h1>";}             
    if($score=0){
                    echo"<br><h1>c'est pas serieux,ZERO!!!</h1>";}

    //on recupere la valeur max de l'index de la table classement
    $reqclt="Select MAX(numclass) From classement";
    $resclt=mysql_query($reqclt,$cnx) or die ("Echec de $reqclt");
    $indexclt=mysql_fetch_array($resclt);
    //$num correspond � l'index le plus grand de la table classement
    $num=$indexclt[0];
    
    //si auccun enregistrement dans la table classement, alors l'index prend 1 sinon l'index augmente de 1   
    if ($num==''){
       $num=1;}
      else{
       $num=$num+1;}  
    
    //enregitrement du score avec le nom et l'index dans la table classement
    $insertscore="Insert Into classement Values (".$num.",'".$_POST['nom']."',".$s.");";
    $resclt=mysql_query($insertscore,$cnx) or die ("Echec de $insertscore");
    
    //Bouton pour voir le classement   
    echo "  <form method=get action =\"classement.php\">" ;
    echo "</br>";
    echo "</br>";
    echo "</br>";
    echo "  <input type=\"submit\" value=\"Classement\"><br />";
    //ferme la connection     
    mysql_close();
?>
  </div>
    
    </div>
  </body>
</html>
