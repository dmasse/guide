<?php
/** * Classe implémentant le singleton pour PDO * @author Savageman */
class PDO_JO extends PDO {
 private static $host;
 private static $user;
 private static $pw;
 
 
 
 public function __construct( ) {
 	$this->host = 'mysql:host=mysql51-68.perso;dbname=monguide';
 	$this->user = 'monguide';
 	$this->pw = 'LzzLPKPr';
 	parent::__construct(self::$host,self::$user,self::$pw);
 }
 
 
 
 
 /* Singleton */ public static function getInstance() { 
  if (!isset(self::$_instance)) {     
  	try {      
  		self::$_instance = new PDO(SQL_DSN, SQL_USERNAME, SQL_PASSWORD);      } 
  		catch (PDOException $e) {       echo $e;   }  }   return self::$_instance; 
  }
}
?>
