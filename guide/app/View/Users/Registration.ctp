<?php 
$this->set('title_for_layout',"Me contacter");
?>
<?php echo $this->Form->create('User');?>

<?php echo $this->Form->input('type_personne', array(
          'div' => false,
          'label' =>true,
          'type' => 'radio',
          'legend'=>'Je suis un :',//permet de choisir la legende
          'options' => array(2 => 'Guide', 3 => 'Touriste')));?>
          
<?php echo $this->Form->error('type_personne');?>
<?php echo $this->Form->input('Vide',array('type'=>'label','label'=>""));?>

<?php echo $this->Form->input('nom_user',array('label'=>"Votre nom"));?>
<?php echo $this->Form->input('prenom_user',array('label'=>"Votre prenom"));?>
<?php echo $this->Form->input('mail_user',array('label'=>"Votre adresse Mail"));?>
<?php echo $this->Form->input('identifiant',array('label'=>"Choississez un identifiant"));?>

<?php echo $this->Form->input('mdp',array('type'=>'password','label'=>"Choississez un mot de passe"));?>
<?php echo $this->Form->input('confmdp',array('type'=>'password','label'=>"Confirmez votre mot de passe"));?>

<?php echo $this->Form->input('cgu', array(
		 'type'=>'checkbox',
		 'checked'=>false,
		 'value' => "1",
		 'label'=>'Veuillez accepter les conditions générales d\'utilisation'));?>


<?php echo $this->Form->end("Je m'inscris");?>