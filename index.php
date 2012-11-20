<<<<<<< HEAD
<?php
/*
	require ('PDO_JO.php');

	try
	{
		$bdd = new PDO('mysql:host=mysql51-68.perso.ovh.net;dbname=monguide','md76148-ovh','LzzLPKPr');
	}
	catch(Exception $e)
	{
		echo 'test';
		// En cas d'erreur, on affiche un message et on arrête tout
	        die('Erreur : '.$e->getMessage());
	}
	
	// Si tout va bien, on peut continuer
	
	
	$reponse = $bdd->query('INSERT INTO test values (2)') or die(print_r($bdd->errorInfo()));
	//*/
	
	
	$db = mysql_connect('mysql51-68.perso.ovh.net', 'md76148-ovh', 'LzzLPKPr');
	
	mysql_select_db('monguide',$db);
	
	$sql ='INSERT INTO test values (2)';
	
	$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error()); 
	
	mysql_close();
	//*/
?>
=======
<?php 
require ('PDO.php');
$sql =PDO2::getInstance();
$sql->query("INSERT into test(attrtest) values (100)") or die (print_r($sql->errorInfo())) ; 

?>
>>>>>>> branch 'master' of http://github.com/dmasse/guide.git
