 <?php $this->set('title_for_layout',"Ajouter Visite Papier");
  
 echo $this->Form->create('Visite',array('type'=>'file'));
 
 echo $this->Form->input('Visite_papier',array('type'=>'label','label'=>"Remplissez les informations correspondants à la viste papier que vous souhaitez proposer : "));
 echo $this->Form->input('trad_titre_desc_visites.titre_visite_trad',array('label'=>"Titre de la visite"));
 echo $this->Form->input('trad_titre_desc_visites.desc_visite_trad',array('label'=>"Description de la visite"));
  echo $this->Form->input('Visite_papier.document_pdf',array('label'=>"Veuillez Charger ici le document pdf correspondant à la visite proposées :   "));
 echo $this->Form->input('trad_mot_cle_pt_ints.mot_cle_francais_id',array('label'=>"Points d'intérêt proposé au cours de cette visite : "));
 echo $this->Form->input('Visite_papier.prix_papier',array('label'=>"Prix de la visite Physique : "));
 echo $this->Form->input('Visite_papier.duree_papier',array('label'=>"Durée de la visite Physique : "));


 echo $this->Form->end('Modifier');?>