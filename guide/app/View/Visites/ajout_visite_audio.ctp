
 <?php $this->set('title_for_layout',"Ajouter Visite Audio");
  
 echo $this->Form->create('Visite',array('type'=>'file'));
 
 echo $this->Form->input('Visite_audio',array('type'=>'label','label'=>"Remplissez les informations correspondants à la viste audio que vous souhaitez proposer : "));
 echo $this->Form->input('trad_titre_desc_visites.titre_visite_trad',array('label'=>"Titre de la visite"));
 echo $this->Form->input('trad_titre_desc_visites.desc_visite_trad',array('label'=>"Description de la visite"));
 echo $this->Form->input('trad_mot_cle_pt_ints.mot_cle_francais_id',array('label'=>"Points d'intérêt proposé au cours de cette visite : "));
 echo $this->Form->input('Visite_audio.prix_audio',array('label'=>"Prix de la visite Audio"));
 echo $this->Form->input('Visite_audio.duree_audio',array('label'=>"Durée de la visite Audio"));


 echo $this->Form->end('Modifier');?>
