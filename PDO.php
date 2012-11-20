<?php

class PDO2 extends PDO {
 private static $connection;
 private static $hote='mysql:host=127.0.0.1;dbname=test';
 private static $Username='root';
 private static $Password='';
 
 /* Constructeur : héritage public obligatoire par héritage de PDO */
  public function __construct( ) { 
 } // End of PDO2::__construct() */
 /* Singleton */ 
 public static function getInstance() { 
  if (!isset(self::$connection)) {     
  	try 
  	{       
  		self::$connection = new PDO(self::$hote, self::$Username,self::$Password);      
  	} 
  	catch (PDOException $e) 
  	{       
  		die ('Erreur : '.e->getMessage());  
  	 }  
  }  
   return self::$connection;  } // End of PDO2::getInstance() */ }
}

?>
  
