<?php

class ConfigAutoloader	{

	static function register(){
		spl_autoload_register(
			array(__CLASS__,'autoload'));
	}

	static function autoload($class_name){
		$file  ='config/'.$class_name.'.php';
		if(file_exists($file)) {
			require $file;
		}
	return false;
	}

}