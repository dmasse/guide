<?php $this->set('title_for_layout',"Editer mon profil");?>

<?php echo $this->Form->create('User');?>
<?php echo $this->Form->input('Identifiant',array('label'=>"Votre Identifiant"));?>
<?php echo $this->Form->input('NomUser',array('label'=>"Nom"));?>
<?php echo $this->Form->input('PrenomUser',array('label'=>"Prenom"));?>
<?php echo $this->Form->input('MailUser',array('label'=>"Votre email"));?>
<?php echo $this->Form->input('TelephoneUser',array('label'=>"Telephone"));?>
<?php echo $this->Form->input('DateNaissanceUser',array('label'=>"Date de naissance"));?>
<?php echo $this->Form->input('pass1',array('type'=>'password','label'=>"Votre nouveau mot de passe"));?>
<?php echo $this->Form->input('pass2',array('type'=>'password','label'=>"Confirmer le mot de passe"));?>
<?php debug ($User.typePersonne);?>
<?php if ('User.TypePersonne'==1){
echo $this->Form->input('Guide.SexeGuide',array('label'=>("indiquer votre sexe")));} 





?>
<?php echo $this->Form->end('Modifier');?>