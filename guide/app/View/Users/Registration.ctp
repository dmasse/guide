<?php 
$this->set('title_for_layout',"Me contacter");
?>
<?php echo $this->Form->create('User');?>

<?php echo $this->Form->input('TypePersonne', array(
          'div' => false,
          'label' =>true,
          'type' => 'radio',
          'legend'=>'Je suis un :',//permet de choisir la legende
          'options' => array(2 => 'Guide', 3 => 'Touriste')));?>
          
<?php echo $this->Form->error('TypePersonne');?>
<?php echo $this->Form->input('Vide',array('type'=>'label','label'=>""));?>

<?php echo $this->Form->input('NomUser',array('label'=>"Votre nom"));?>
<?php echo $this->Form->input('PrenomUser',array('label'=>"Votre prenom"));?>
<?php echo $this->Form->input('MailUser',array('label'=>"Votre adresse Mail"));?>
<?php echo $this->Form->input('Identifiant',array('label'=>"Choississez un identifiant"));?>

<?php echo $this->Form->input('Mdp',array('type'=>'password','label'=>"Choississez un mot de passe"));?>
<?php echo $this->Form->input('confmdp',array('type'=>'password','label'=>"Confirmez votre mot de passe"));?>
<?php echo $this->Form->end("Je m'inscris");?>