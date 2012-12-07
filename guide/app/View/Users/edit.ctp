<?php $this->set('title_for_layout',"Editer mon profil");?>

<?php echo $this->Form->create('User');?>
<?php echo $this->Form->input('TelephoneUser',array('label'=>"telephone"));?>
<?php echo $this->Form->input('DateNaissanceUser',array('label'=>"Date de naissance"));?>
<?php echo $this->Form->input('pass1',array('label'=>"Mot de passe"));?>
<?php echo $this->Form->input('pass2',array('label'=>"Confirmrer le mot de passe"));?>
<?php echo $this->Form->end('Modifier');?>