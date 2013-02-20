<?php
/**
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       Cake.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php //echo $cakeDescription ?>:
		<?php echo $title_for_layout; ?>
	</title>
	<?php
		echo $this->Html->meta('icon');

		echo $this->Html->css('cake.generic');

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
		?>
		
<link rel="stylesheet" type="text/css" href="/css/bootstrap-responsive.css" />
<link rel="stylesheet" type="text/css" href="/css/bootstrap.css" />
<link rel="stylesheet" type="text/css" href="/css/docs.css" />

<?php echo $this->Html->css(array('bootstrap-responsive','bootstrap','docs')); ?>
	
<head>
<body>
	<div id="container">
		<div id="header">
			<h1><?php //echo $this->Html->link($cakeDescription, 'http://cakephp.org'); ?></h1>
			
		 <ul class="account">
		 <?php if(AuthComponent::user('id')): ?>
		 <li><?php echo $this->Html->link("Se deconnecter",array('action'=>'logout','controller'=>'users')); ?></li>
		  <li><?php echo $this->Html->link("Gerer mon profil",array('action'=>'viewmember','controller'=>'users')); ?></li>
		   <li><?php echo $this->Html->link("Ajouter une nouvelle visite",array('action'=>'addvisit','controller'=>'visites')); ?></li>
		   	 <li><?php echo $this->Html->link("Afficher les visites d'un guide",array('action'=>'Resume_profil','controller'=>'users')); ?></li>
		   	    	 <li><?php echo $this->Html->link("rechercher une visite",array('action'=>'Recherche','controller'=>'points')); ?></li>
		 <?php else :?>
		 <li><?php echo $this->Html->link("Connexion",array('action'=>'login','controller'=>'users')); ?></li>
		  <li><?php echo $this->Html->link("Inscription",array('action'=>'registration','controller'=>'users')); ?></li>
		   	 <li><?php echo $this->Html->link("rechercher une visite",array('action'=>'Recherche','controller'=>'points')); ?></li>
		 <?php endif; ?>
		 </ul>
		</div>

		
<body>

    <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
          <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
          <a class="brand" href="#">Mon guide touristique</a>
          <div class="nav-collapse collapse">
            <ul class="nav">
              <li class="active"><a href="#">Home</a></li>
              <li><a href="#about">About</a></li>
              <li><a href="#contact">Contact</a></li>
            </ul>
          </div><!--/.nav-collapse -->
          <div class="nav-collapse collapse pull-right">
            <ul class="nav">
              
            </ul>
          </div>
        </div>
      </div>
    </div>	
    
 <div id="content">

			<?php // echo $this->Session->flash(); ?>
			<?php echo $this->fetch('content'); ?>
		</div>
		
	  <footer>
        <p>&copy; Mon guide touristique 2012</p>
      </footer>
</body>
</html>
    

		
		
		
		
		
		
		<div id="content">

			<?php echo $this->Session->flash(); ?>

			<?php echo $this->fetch('content'); ?>
		</div>
		
		<?php echo $this->element('debug');?>
		<div id="footer">
			<?php /*echo $this->Html->link(
					$this->Html->image('cake.power.gif', array('alt' => $cakeDescription, 'border' => '0')),
					'http://www.cakephp.org/',
					array('target' => '_blank', 'escape' => false)
				); */
			?>
		</div>
	</div>
	<?php echo $this->element('sql_dump'); ?>
</body>
</html>

