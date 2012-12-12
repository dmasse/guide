<p>

<strong>Bonjour <?php echo $nom_user,$prenom_user; ?></strong>

</p>
<p>Pour activer ce compte suivez le lien : </p>
<p><?php echo $this->Html->link('Activer mon compte',$this->Html->url($link,true));?></p>

