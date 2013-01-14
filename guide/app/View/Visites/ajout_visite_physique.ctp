 <?php $this->set('title_for_layout',"Ajouter Visite Physique");
  
 echo $this->Form->create('Visite',array('type'=>'file'));
 echo $this->Form->input('Trad_titre_desc_visites.langue_id',array('label'=>'Choississez la langue de la visite :'));
 echo $this->Form->input('Visite_physique',array('type'=>'label','label'=>"Remplissez les informations correspondants à la visite physique que vous souhaitez proposer : "));
 echo $this->Form->input('Trad_titre_desc_visite.0.titre_visite_trad',array('label'=>"Titre de la visite"));
 echo $this->Form->input('Trad_titre_desc_visite.0.desc_visite_trad',array('label'=>"Description de la visite"));
 echo $this->Form->input('Visite_physique.0.nb_personne',array('label'=>"Nombre de personnes autorisés pour la visite :  "));
 echo $this->Form->input('Visite_physique.0.acces_handicap',array('label'=>"Accés aux personnes handicapées: "));
 echo $this->Form->input('Trad_mot_cle_pt_ints.mot_cle_francais_id',array('label'=>"Points d'intérêt proposé au cours de cette visite : "));
 echo $this->Form->input('Visite_physique.0.prix_physique',array('label'=>"Prix de la visite Physique : "));
 echo $this->Form->input('Visite_physique.0.duree_physique',array('label'=>"Durée de la visite Physique : "));
 echo $this->Form->input('Date_visite_physique.date_visite_physique',array('label'=>"Date de la visite Physique : "));

 echo $this->Form->end('Modifier');?>