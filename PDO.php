<?php

//Classe permettant de récuperer une instance de connexion vers la base de données du site
//Version : 1.0
//Crée le 20 novembre 2012
//Développeurs : ML & JD
//Commentaire : Données statique a changer lors de l'upload du site. 
//(Garder ces données pour les tests locaux)

	class PDO2 extends PDO 
	{
		private static $connection;
		private static $hote='mysql:host=127.0.0.1;dbname=test';
		private static $Username='root';
		private static $Password='';
		 
		/* Constructeur : héritage public obligatoire par héritage de PDO */
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
  
