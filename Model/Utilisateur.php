<?php
class Model_Utilisateur
{
    protected $selectById;
   

    public function __construct()
    //un utilisateur ne peut etre crée qu'aprés son inscription
    {
        parent::__construct();

        $sql = 'Select IdUser,IdLangue,IdConnexion,NomUser where IUser= ? ';
        $this->selectById = $pdo->prepare($sql);// a revoir
  
    }

    public function getById($id)
    {
        $this->selectById->execute(array($id));//permet de recuperer un utilisateur à partir de son Id
        $User = $this->selectById->fetchAll();
        if(empty($User[0]))//si la requete ne renvoie rien
        {
            return array();
        }
        else
        {
            $User[0]['text'] = utf8_decode($User[0]['text']);
            return $User[0];
        }
    }



public function ajouter_Utilisateur_dans_bdd($nom_utilisateur, $mdp, $adresse_email, $hash_validation) {
	$pdo = PDO::getInstance();
	$sql="INSERT INTO membres SET nom_utilisateur = :nom_utilisateur, mot_de_passe = :mot_de_passe, adresse_email = :adresse_email, hash_validation = :hash_validation, date_inscription = NOW()";
	$requete = $pdo->prepare($sql);
	$requete->bindValue(':nom_utilisateur', $nom_utilisateur); $requete->bindValue(':mot_de_passe',    $mdp); $requete->bindValue(':adresse_email',   $adresse_email); $requete->bindValue(':hash_validation', $hash_validation);
	if ($requete->execute()) {
		return $pdo->lastInsertId();
	} return $requete->errorInfo();
}