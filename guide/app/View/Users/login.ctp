<?php 
$this->set('title_for_layout',"Se connecter");
?>
<?php echo $this->Session->flash('auth');?>
<?php echo $this->Form->create('User',array('action'=>'login'));?>

<?php echo $this->Form->input('Identifiant',array('label'=>"Saississez votre identifiant"));?>
<?php echo $this->Form->input('Mdp',array('type'=>'password','label'=>"Saississez votre mot de passe"));?>
<?php echo $this->Html->link("Mot de passe oublié ?",array('action'=>'password','controller'=>'users'));?>
<?php echo $this->Form->end("Se connecter");?>

