<?php
 class ConnectBd {
//constructeur
	 private $host = 'localhost';
	 private $user = 'root';
	 private $pass = '';
	 private $dbname = 'game';

	 private $pdo;
	 private $error;
	 private $stmt;

	 public function __construct(){
		 $dsn ='mysql:host='.$this->host.';dbname='.$this->dbname;
		 
		 $options=array (
		 PDO::ATTR_PERSISTENT=>true ,
		 PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION);
		 
		 try {
			 $this->pdo=new PDO ($dsn,$this->user,$this->pass,$options);
		 	} 
		 
		 catch (PDOEception $e){
		     $this->error=$e->getMessage();
		 }
 	}

  //preparation d'une requete sql
	 public function query($query){
	     $this->stmt=$this->pdo->prepare($query);
	 }
	 //execution d'une requete (sans renvoie de donnée)
	 //par exemple requete de modification, insertion
	 
	 public function execute(){
	      $this->stmt->execute();
	 }
	 //execution d'une requete avec renvoie d'une liste de valeur
	 public function resultSet(){
	      $this->execute();
	      return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
}
	 
	 public function single(){
	     $this->execute();
	     return $this->stmt->fetch(PDO::FETCH_ASSOC);
	 }

}