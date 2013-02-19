<?php 
	 function affiche ($view,$texte,$data,&$error)
	{
		if (!$data == '')
		{
			echo $view->Form->input('nom',array('type'=>'label','label'=> "{$texte} : {$data}"));
		}
		else
		{
			$error[] = $texte;
		}
	}//*/
 ?>

<?php 
	$this->set('title_for_layout','Mon profil');
	
	echo $this->Form->create('User');

	$champsManquant = null;
	//affichage de l'image
	debug($Guide);
	//$this->layout = 'image';
	if ($Guide['photo_guide'] =='')
	{
		echo $this->Html->image('profil/Profil.jpg', array('alt'=>'CakePHP', true)); 
		$champsManquant[] = "Photo de profil";
	}else 
	{
		echo $this->Html->image($Guide['photo_guide'], array('alt'=>'CakePHP', true)); 
	}//imagejpeg($image_p, null, 100);

	affiche($this,'Civilité',$User['civilite'],$champsManquant);
	affiche($this,'Nom',$User['nom_user'],$champsManquant);
	affiche($this,'Prénom',$User['prenom_user'],$champsManquant);
	affiche($this,'Identifiant',$User['identifiant'],$champsManquant);
	affiche($this,'Langue de préférence',$Langue['nom_langue'],$champsManquant);
	affiche($this,'Date de naissance',$User['date_naissance_user'],$champsManquant);
	affiche($this,'Email',$User['mail_user'],$champsManquant);
	affiche($this,'Téléphone',$User['telephone_user'],$champsManquant);
	
	if ($User['type_personne'])
	{
		echo "<br><br>Données société :<br>";
		affiche($this,'Société',$Societe['nom_societe'],$champsManquant);
		affiche($this,'Téléphone société',$Societe['telephone_societe'],$champsManquant);
		affiche($this,'Email société',$Societe['mail_societe'],$champsManquant);
		affiche($this,'N° SIRET',$Societe['siret'],$champsManquant);
		echo "<br><br>Données RIB :<br>";
		affiche($this,'Banque',$Rib_guide['banque'],$champsManquant);
		affiche($this,'Guichet',$Rib_guide['guichet'],$champsManquant);
		affiche($this,'N° compte',$Rib_guide['num_compte'],$champsManquant);
		affiche($this,'Titulaire',$Rib_guide['nom_titulaire'],$champsManquant);
		affiche($this,'Domiciliation',$Rib_guide['domiciliation'],$champsManquant);
		affiche($this,'IBAN',$Rib_guide['num_iban'],$champsManquant);
		affiche($this,'BIC',$Rib_guide['bic'],$champsManquant);
	}
	echo "<br><br>";
	//Vérification si le profil est complet
	$count = count($champsManquant);
	if ($count == 0)
	{
		echo 'Votre profil est complet.';
	}
	else
	{
		echo 'Votre profil est incomplet, vous ne pouvez pas prendre de réservation ou poster de commentaire. 
			  Veuillez completer les informations suivantes pour acceder à ces fonctions : <br>';
		for ($i = 0; $i < $count; $i++) 
		{
			echo " - {$champsManquant[$i]}<br>" ;
		}
	}
	

	//Affichage des boutons	
	echo $this->Form->button('Modifier les informations de mon profil', array('name' => 'type', 'value' => 'profil'));
	if ($SessionTypePers==1)
	{
		echo $this->Form->button('Modifier mes informations bancaires', array('name' => 'type', 'value' => 'banque'));
	    echo $this->Form->button('Modifier mon cursus professionnel', array('name' => 'type', 'value' => 'cursus'));
	}
				
	
?>
