<?php

$hostname = 'localhost'; // Nom du serveur de la base de donn�es. 
$username = 'root'; // nom d'utilisateur de la base (login). 
$password = ''; // Mot de passe pour acc�der � la base de donn�es.
$dbName = 'quiz2'; // Nom de la base de donn�es. 

MYSQL_CONNECT($hostname, $username, $password) or die('DB connection unavailable');
mysql_select_db($dbName) or die('Unable to select database'); 

?>