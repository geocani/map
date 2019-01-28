<?php
  $userDB='root';//nom d'utilisateur (root par default)
  $passwdDB='';//mot de passe(aucun par default)
  $mysqlServerDB='localhost';//nom de votre server
  $dataBaseNameDB='abase';//nom de votre base de données

  //instancier la connection locale
  $cnx = mysql_connect($mysqlServerDB,$userDB,$passwdDB) or
        die("Echec de la connection");
        mysql_select_db($dataBaseNameDB) or die("Echec de la connection"); 


