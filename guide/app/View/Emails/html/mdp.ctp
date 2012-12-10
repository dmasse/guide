<p>

<strong>Bonjour <?php echo $Identifiant; ?></strong>

</p>
<p>Vous avez fait une demande de rappel de mot de passe si c'est bien votre demande veuillez cliquez sur le lien ci dessous : </p>
<p><?php echo $this->Html->link('Me rappeller mon mot de passe',$this->Html->url($link,true));?></p>

