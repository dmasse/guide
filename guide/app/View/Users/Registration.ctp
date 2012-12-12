<?php 
$this->set('title_for_layout',"Me contacter");
?>
<?php echo $this->Form->create('User');?>

<?php echo $this->Form->input('Type_Personne', array(
          'div' => false,
          'label' =>true,
          'type' => 'radio',
          'legend'=>'Je suis un :',//permet de choisir la legende
          'options' => array(2 => 'Guide', 3 => 'Touriste')));?>
          
<?php echo $this->Form->error('Type_Personne');?>
<?php echo $this->Form->input('Vide',array('type'=>'label','label'=>""));?>

<?php echo $this->Form->input('Nom_User',array('label'=>"Votre nom"));?>
<?php echo $this->Form->input('Prenom_User',array('label'=>"Votre prenom"));?>
<?php echo $this->Form->input('Mail_User',array('label'=>"Votre adresse Mail"));?>
<?php echo $this->Form->input('Identifiant',array('label'=>"Choississez un identifiant"));?>

<?php echo $this->Form->input('Mdp',array('type'=>'password','label'=>"Choississez un mot de passe"));?>
<?php echo $this->Form->input('confmdp',array('type'=>'password','label'=>"Confirmez votre mot de passe"));?>
<?php echo $this->Form->end("Je m'inscris");?>