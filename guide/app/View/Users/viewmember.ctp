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
<?php $this->set('title_for_layout','Mon profil'); ?>
<?php echo $this->Form->create('User'); ?>
	<?php
		$champsManquant = null;
		//affichage de l'image
		 echo $this->Html->image('ptibiscuit.jpg', array('alt'=>'voilou', true)); 
		affiche($this,'Civilité',$civilite,$champsManquant);
		affiche($this,'Nom',$nom_user,$champsManquant);
		affiche($this,'Prénom',$prenom_user,$champsManquant);
		affiche($this,'Identifiant',$identifiant,$champsManquant);
		affiche($this,'Langue de préférence',$langue_nom,$champsManquant);
		affiche($this,'Date de naissance',$date_naissance_user,$champsManquant);
		affiche($this,'Email',$mail_user,$champsManquant);
		affiche($this,'Téléphone',$telephone_user,$champsManquant);
		if ($type_personne)
		{
			affiche($this,'Votre photo',$photo_guide,$champsManquant);
			echo "<br><br>Données société :<br>";
			affiche($this,'Société',$nom_societe,$champsManquant);
			affiche($this,'Téléphone société',$telephone_societe,$champsManquant);
			affiche($this,'Email société',$mail_societe,$champsManquant);
			affiche($this,'N° SIRET',$siret,$champsManquant);
			echo "<br><br>Données RIB :<br>";
			affiche($this,'Banque',$banque,$champsManquant);
			affiche($this,'Guichet',$guichet,$champsManquant);
			affiche($this,'N° compte',$num_comptes,$champsManquant);
			affiche($this,'Titulaire',$nom_titulaires,$champsManquant);
			affiche($this,'Domiciliation',$domiciliation,$champsManquant);
			affiche($this,'IBAN',$num_iban,$champsManquant);
			affiche($this,'BIC',$bic,$champsManquant);
		}
		echo "<br><br>";
		//V?rification si le profil est complet
		$count = count($champsManquant);
		if ($count == 0)
		{
			echo 'Votre profil est complet.';
		}
		else
		{
			echo 'Votre profil est incomplet, vous ne pouvez pas prendre de réservation ou poster de commentaire. 
				  Veuillez completer les information suivantes pour acceder à ces fonctions : <br>';
			for ($i = 0; $i < $count; $i++) 
			{
				echo " - {$champsManquant[$i]}<br>" ;

			}
		}
		
		
echo $this->Form->button('Modifier les informations de mon profil', array('name' => 'type', 'value' => 'profil'));
if ($SessionTypePers==1){
	echo $this->Form->button('Modifier mes informations bancaires', array('name' => 'type', 'value' => 'banque'));
    echo $this->Form->button('Modifier mon cursus professionnel', array('name' => 'type', 'value' => 'cursus'));
		}
				
		
    ?>
