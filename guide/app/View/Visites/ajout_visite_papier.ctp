 <?php $this->set('title_for_layout',"Ajouter Visite Papier");
  
 echo $this->Form->create('Visite',array('type'=>'file'));
 
 echo $this->Form->input('Visite_papier',array('type'=>'label','label'=>"Remplissez les informations correspondants à la viste papier que vous souhaitez proposer : "));
 echo $this->Form->input('Trad_titre_desc_visite.0.titre_visite_trad',array('label'=>"Titre de la visite"));
 echo $this->Form->input('Trad_titre_desc_visite.0.desc_visite_trad',array('label'=>"Description de la visite"));
 echo $this->Form->input('Trad_titre_desc_visite.0.langue_id',array('label'=>'Choisissez la langue de la visite :'));
 echo $this->Form->input('Visite_papier.document_pdf',array('label'=>"Veuillez Charger ici le document pdf correspondant à la visite proposées :   "));
 echo $this->Form->input('Trad_mot_cle_pt_ints.mot_cle_francais_id',array('label'=>"Points d'intérêt proposés au cours de cette visite : ")); 
 echo $this->Form->input('Visite_audio.prix_audio',array('label'=>"Prix de la visite Audio"));
 echo $this->Form->input('Visite_papier.duree_papier',array('label'=>"Durée de la visite Audio : "));
 echo $this->Form->input('Type_de_visite.0.type_visite_francai_id', array ('type' => 'select',
 		'options' => $typesVisites,'label'=>'Choisissez le type de la visite'
 ));
 

 echo $this->Form->end('Modifier');?>
 
 




 
 