<?php
/** * Classe impl�mentant le singleton pour PDO * @author Savageman */
class PDO2 extends PDO {
 private static $_instance;
 /* Constructeur : h�ritage public obligatoire par h�ritage de PDO */ public function __construct( ) { 
 } // End of PDO2::__construct() */
 /* Singleton */ public static function getInstance() { 
  if (!isset(self::$_instance)) {     
  	try {      
  		self::$_instance = new PDO(SQL_DSN, SQL_USERNAME, SQL_PASSWORD);      } 
  		catch (PDOException $e) {       echo $e;   }  }   return self::$_instance; 
  }
}
?>