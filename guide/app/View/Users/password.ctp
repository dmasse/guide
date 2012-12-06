<?php $this->set('title_for_layout',"Mot de passe oublié"); ?>

<?php echo $this->Form->create('User');?>
<?php echo $this->Form->input('MailUser',array('label'=>"Email utilisé lors de l'inscription"));?>
<?php echo $this->Form->end("Nouveau mot de passe");?>