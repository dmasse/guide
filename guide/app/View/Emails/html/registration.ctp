<p>

<strong>Bonjour <?php echo $NOM_USER,$PRENOM_USER; ?></strong>

</p>
<p>Pour activer ce compte suivez le lien : </p>
<p><?php echo $this->Html->link('Activer mon compte',$this->Html->url($link,true));?></p>

