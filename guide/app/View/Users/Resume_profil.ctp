
 <?php $this->set('title_for_layout',"Resumer du profil guide");
 echo $this->Form->create('User');	 
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
 
 echo $this->Form->input('GuideSelectionne', array ('type' => 'select',
 		'options' => $ListGuide,'label'=>'Choisissez le Guide'
 )); 

 echo $this->Form->end('Valider'); 
 echo $this->Html->image('ptibiscuit.jpg', array('alt'=>'voilou', true));
 affiche($this,'Civilité',$User['civilite'],$champsManquant);
 affiche($this,'Nom',$User['nom_user'],$champsManquant);
 affiche($this,'Prénom',$User['prenom_user'],$champsManquant);
 affiche($this,'Identifiant',$User['identifiant'],$champsManquant);
 affiche($this,'Langue de préférence',$Langue['nom_langue'],$champsManquant);
 affiche($this,'Date de naissance',$User['date_naissance_user'],$champsManquant);
 affiche($this,'Email',$User['mail_user'],$champsManquant);
 affiche($this,'Téléphone',$User['telephone_user'],$champsManquant);
 affiche($this,'Votre photo',$Guide['photo_guide'],$champsManquant);
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
 
 
?>




