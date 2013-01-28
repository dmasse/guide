<?php 
	$this->set('title_for_layout',"Editer mon profil");

	 echo $this->Form->create('User',array('type'=>'file'));
	 debug ($Guide);
	 if ($SessionTypePers==1)
	 {
		if ($Diplome['photo_diplome'] =='')
		{
			echo $this->Html->image('diplome/Diplome.jpg', array('alt'=>'CakePHP', true)); 
		}else 
		{
			echo $this->Html->image($Diplome['photo_diplome'], array('alt'=>'CakePHP', true)); 
		}
		 echo $this->Form->input('Diplome.photo_diplome', array(
		    'between' => '<br />',
		    'type' => 'file'
		));
	}

	 echo $this->Form->input('Societe',array('type'=>'label','label'=>"Si vous faites parti d'une société remplissez les champs suivants"));
	 echo $this->Form->input('Societe.nom_societe',array('label'=>"Nom de la société"));
	 echo $this->Form->input('Societe.telephone_societe',array('label'=>"Telephone de la société"));
	 echo $this->Form->input('Societe.mail_societe',array('label'=>"Adresse mail de la société"));
	 echo $this->Form->input('Societe.siret',array('label'=>"Numero de Siret de la société"));
	 
	 echo $this->Form->end('Modifier');
	 
 
 ?>
 