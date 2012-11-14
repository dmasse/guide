<?php
 
  class Mysql
  {
    private
      $Serveur     = '',
      $Bdd         = '',
      $Identifiant = '',
      $Mdp         = '',
      $Lien        = '',  
      $Debogue     = true,  
      $NbRequetes  = 0;
 
    /**
    * Constructeur de la classe
    * Connexion aux serveur de base de donn�e et s�lection de la base
    *
    * $Serveur     = L'h�te (ordinateur sur lequel Mysql est install�)
    * $Bdd         = Le nom de la base de donn�es
    * $Identifiant = Le nom d'utilisateur
    * $Mdp         = Le mot de passe
    */ 
    public function __construct($Serveur = 'localhost', $Bdd = 'base', $Identifiant = 'root', $Mdp = '') 
    {
      $this->Serveur     = $Serveur;
      $this->Bdd         = $Bdd;
      $this->Identifiant = $Identifiant;
      $this->Mdp         = $Mdp;
      $this->Lien=mysql_connect($this->Serveur, $this->Identifiant, $this->Mdp);
 
      if(!$this->Lien && $this->Debogue) 
        throw new MySQLExeption('Erreur de connexion au serveur MySql!!!');        
 
      $Base = mysql_select_db($this->Bdd,$this->Lien);
 
      if (!$Base && $this->Debogue) 
        throw new MySQLExeption('Erreur de connexion � la base de donnees!!!');
    }
 
    /**
    * Retourne le nombre de requ�tes SQL effectu� par l'objet
    */     
    public function RetourneNbRequetes() 
    {
      return $this->NbRequetes;
    }
 
    /**
    * Envoie une requ�te SQL et r�cup�re le r�sult�t dans un tableau pr� format�
    *
    * $Requete = Requ�te SQL
    */ 
    public function TabResSQL($Requete)
    {
      $i = 0;
      $Ressource = mysql_query($Requete,$this->Lien);
      $TabResultat=array();
      if (!$Ressource and $this->Debogue) throw new MySQLExeption('Erreur de requ�te SQL!!!');
      while ($Ligne = mysql_fetch_assoc($Ressource))
      {
        foreach ($Ligne as $clef => $valeur) $TabResultat[$i][$clef] = $valeur;
        $i++;
      }
      mysql_free_result($Ressource);
      $this->NbRequetes++;
      return $TabResultat;
    }
 
    /**
    * Retourne le dernier identifiant g�n�r� par un champ de type AUTO_INCREMENT
    *
    */ 
    public function DernierId()
    {  
        return mysql_insert_id($this->Lien);
    }
 
    /**
    * Envoie une requ�te SQL et retourne le nombre de table affect�
    *
    * $Requete = Requ�te SQL
    */ 
    public function ExecuteSQL($Requete)
    {
      $Ressource = mysql_query($Requete,$this->Lien);
      if (!$Ressource and $this->Debogue) throw new MySQLExeption('Erreur de requ�te SQL!!!');
      $this->NbRequetes++;
      $NbAffectee = mysql_affected_rows();
      return $NbAffectee;      
    }    
  }
?>