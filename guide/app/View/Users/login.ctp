<link rel="stylesheet" type="text/css" href="/css/bootstrap-responsive.css" />
<link rel="stylesheet" type="text/css" href="/css/bootstrap.css" />
<link rel="stylesheet" type="text/css" href="/css/docs.css" />

<?php echo $this->Html->css(array('bootstrap-responsive','bootstrap','docs')); ?>

<body>

<?php $this->set('title_for_layout',"Se connecter");?>
<?php echo $this->Session->flash('auth');?>
<?php echo $this->Form->create('User',array('action'=>'login'));?>

<div class="container">
      <form class="form-box">
        <legend>Veuillez vous identifier</legend>   
        <div class="controls controls-row">
          <?php echo $this->Form->input('identifiant',array('label'=>"Identifiant"));?>
          <?php echo $this->Form->input('mdp',array('type'=>'password','label'=>"Mot de passe"));?>
          <?php echo $this->Form->end("Connexion");?>
          <?php echo $this->Html->link("Mot de passe oublié ?",array('action'=>'password','controller'=>'users'));?>
        </div>
        <label class="checkbox">
            <input type="checkbox" value="remember-me"> Se souvenir de moi
          </label>
      </form>

    </div>
  </body>

