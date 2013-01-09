
 <?php $this->set('title_for_layout',"Editer mon profil");
 
 
 
 echo $this->Form->create('User',array('type'=>'file'));
 echo $this->Form->input('Rib',array('type'=>'label','label'=>"Remplissez vous informations bancaires"));
 echo $this->Form->input('Rib_guide.banque',array('label'=>"Banque"));
 echo $this->Form->input('Rib_guide.guichet',array('label'=>"Guichet"));
 echo $this->Form->input('Rib_guide.num_compte',array('label'=>"Numéro de compte"));
 echo $this->Form->input('Rib_guide.nom_titulaire',array('label'=>"Nom du titulaire"));
 echo $this->Form->input('Rib_guide.domiciliation',array('label'=>"Adresse de la banque")); 
 echo $this->Form->input('Rib_guide.num_iban',array('label'=>"Numero Iban"));
 echo $this->Form->input('Rib_guide.bic',array('label'=>"Numero Bic"));

 echo $this->Form->end('Modifier');?>