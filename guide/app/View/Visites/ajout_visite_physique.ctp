 <?php $this->set('title_for_layout',"Ajouter Visite Physique");
 


 echo $this->Form->create('Visite',array('type'=>'file'));
 echo $this->Form->input('Trad_titre_desc_visite.0.langue_id',array('label'=>'Choisissez la langue de la visite :'));
 echo $this->Form->input('Type_de_visite.0.type_visite_francai_id', array ('type' => 'select',
 		'options' => $typesVisites,'label'=>'Choisissez le type de la visite'
 		));
 echo $this->Form->input('Mot_cle.mot_cle_francai_id', array ('type' => 'select',
 		'options' => $pointinteret,'label'=>'Points d\'intérêt proposés au cours de cette visite :'
 ));
 echo $this->Form->button('Soumettre un nouveau point d\'interet',array('name'=>'type', 'value' => 'soumission'));
 echo('<br> <br> <br>');
 echo $this->Form->input('Visite_physique',array('type'=>'label','label'=>"Remplissez les informations correspondants à la visite physique que vous souhaitez proposer : "));
 echo $this->Form->input('Trad_titre_desc_visite.0.titre_visite_trad',array('label'=>"Titre de la visite"));
 echo $this->Form->input('Trad_titre_desc_visite.0.desc_visite_trad',array('label'=>"Description de la visite"));
 echo $this->Form->input('Visite_physique.nb_personne',array('label'=>"Nombre de personnes autorisés pour la visite :  "));
 echo $this->Form->input('Visite_physique.acces_handicap',array('label'=>"Accés aux personnes handicapées: "));
 echo $this->Form->input('Visite_physique.prix_physique',array('label'=>"Prix de la visite Physique (par personne): "));
 echo $this->Form->input('Visite_physique.duree_physique',array('label'=>"Durée de la visite Physique (en heure) : "));
 echo $this->Form->input('Date_visite_physique.0.date_visite_physique',array('label'=>"Date de la visite Physique : "));
 
echo $this->Form->input('Vide',array('type'=>'label','label'=>"Liste des localisations afféctées à cette visite :"));?>
 
 </script>
 
 
 <table>
 <tr>
 
 <th>Nom</th>
 <th>Latitude</th>
 <th>Longitude</th>
 <th>Actions</th>
 
 </tr>
  <?php foreach ($lieu as $k=>$v): $v=current($v);?>
 
  <tr>
  
  <td><?php echo $lieu[$k]['Point']['name']?></td>
  <td><?php echo $lieu[$k]['Point']['lat']?></td>
  <td><?php echo $lieu[$k]['Point']['lng']?></td>
  <td>
  <?php  echo $this->Html->link("Editer ",array('action'=>'edit',$v['point_id']));?>-
  <?php  echo $this->Html->link("Supprimer",array('action'=>'delete',$v['point_id'],null,'voulez vous vraiment supprimer cette page ?'));?>
  
  </td>
  
  </tr>
  <?php endforeach;?>
  </table>	
 <?php 
 echo $this->Form->button('Ajouter une localisation',array('name'=>'type', 'value' => 'localisation'));
 
 echo $this->Form->end('Modifier');?>