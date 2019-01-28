<?php 
require "config/ConfigAutoloader.php";
ConfigAutoloader::register();

$db = new ConnectBd ();


$val_min=1;
$val_max=10;
$tab_result=array();


	$nombre=mt_rand($val_min,$val_max);
	
	if(in_array($nombre, $tab_result)){
		
		$nombre=mt_rand($val_min,$val_max);
	}
	else{

		$tab_result[] =$nombre;
		$db->query("INSERT INTO Random (Num_Q) VALUES ('".$nombre."');");
		$db->execute();
	}	


			
//var_dump($rand);
//$db->query('select*from questionnaire');
$db->query("select * from questionnaire where id_Questionnaire='".$nombre."'");
//$question=$db->single();
$id_Q=$db->single();
$id_R=$id_Q['Reponse'];
$questionnaire=$db->resultSet();
