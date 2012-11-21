<?php

//Classe permettant de r�cuperer une instance de connexion vers la base de donn�es du site
//Version : 1.0
//Cr�e le 20 novembre 2012
//D�veloppeurs : ML & JD
//Commentaire : Donn�es statique a changer lors de l'upload du site. 
//(Garder ces donn�es pour les tests locaux)

	class PDO2 extends PDO 
	{
		private static $connection;
		private static $hote='mysql:host=127.0.0.1;dbname=test';
		private static $Username='root';
		private static $Password='';
		 
		/* Constructeur : h�ritage public obligatoire par h�ritage de PDO */
		public function __construct( ) 
		{ 
		}
		
		public static function getInstance() 
		{ 
			if (!isset(self::$connection)) 
			{     
				try 
				{       
					self::$connection = new PDO(self::$hote, self::$Username,self::$Password);      
				} 
				catch (PDOException $e) 
				{
					die ('Erreur : '.$e->getMessage());  
				}  
			}  
			return self::$connection;  
		}
	}
?>
  
