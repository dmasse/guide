
<?php 
	$this->set('title_for_layout',"Resumer du profil guide");
	echo $this->Form->create('User');


	function affiche ($view,$texte,$data,&$error)
	{
		if (!$data == '')
		{
			echo $view->Form->input('nom',array('type'=>'label','label'=> "<h4>{$texte} :</h4> {$data}"));
		}else
		{
			$error[] = $texte;
		}
	}//*/


	function afficheLangue ($id_langue, $langues)
	{
		$trouve = 0;
		foreach ($langues as $currentLangue)
		{
			if($currentLangue['Langue']['id']==$id_langue){
				echo($currentLangue['Langue']['nom_langue']);
				$trouve = 1;
			}
		}
		if(!$trouve)
		{
			echo('Langue non trouvée');
		}
	}

	echo $this->Form->input('GuideSelectionne',array (
		'type' => 'select',
		'options' => $ListGuide,'label'=>'Choisissez le Guide')); 

	echo $this->Form->end('Valider');

	if ($valider)
	{
		if ($Guide['photo_guide'] =='')
		{
			echo $this->Html->image('profil/Profil.jpg', array('alt'=>'CakePHP', true)); 
			$champsManquant[] = "Photo de profil";
		}else 
		{
			echo $this->Html->image($Guide['photo_guide'], array('alt'=>'CakePHP', true)); 
		}

		echo "<br><br><h3>Données personelles :<br></h3>";
		affiche($this,'Civilité',$User['civilite'],$champsManquant);
		affiche($this,'Nom',$User['nom_user'],$champsManquant);
		affiche($this,'Prénom',$User['prenom_user'],$champsManquant);
		affiche($this,'Identifiant',$User['identifiant'],$champsManquant);
		affiche($this,'Langue de préférence',$Langue['nom_langue'],$champsManquant);
		affiche($this,'Date de naissance',$User['date_naissance_user'],$champsManquant);
		affiche($this,'Email',$User['mail_user'],$champsManquant);
		affiche($this,'Téléphone',$User['telephone_user'],$champsManquant);
		affiche($this,'Votre photo',$Guide['photo_guide'],$champsManquant);
		echo "<br><br><h3>Données société :<br></h3>";
		affiche($this,'Société',$Societe['nom_societe'],$champsManquant);
		affiche($this,'Téléphone société',$Societe['telephone_societe'],$champsManquant);
		affiche($this,'Email société',$Societe['mail_societe'],$champsManquant);
		affiche($this,'N° SIRET',$Societe['siret'],$champsManquant);
		echo "<br><br><h3>Données RIB :<br></h3>";
		affiche($this,'Banque',$Rib_guide['banque'],$champsManquant);
		affiche($this,'Guichet',$Rib_guide['guichet'],$champsManquant);
		affiche($this,'N° compte',$Rib_guide['num_compte'],$champsManquant);
		affiche($this,'Titulaire',$Rib_guide['nom_titulaire'],$champsManquant);
		affiche($this,'Domiciliation',$Rib_guide['domiciliation'],$champsManquant);
		affiche($this,'IBAN',$Rib_guide['num_iban'],$champsManquant);
		affiche($this,'BIC',$Rib_guide['bic'],$champsManquant);
		
		
		echo('<br><br><h3>Visites physiques :</h3>');
		$compteur=1;
		foreach ($visites_physique as $currentVisitePhysique):

			//debug($currentVisitePhysique);
			echo('<br><br><br>' . $compteur++. ' # ');

			foreach ($currentVisitePhysique['Trad_titre_desc_visite'] as $currentTrad) {
				echo ('<br>Titre en ');
				afficheLangue($currentTrad['langue_id'],$langues_list);
				echo( ' : ' . $currentTrad['titre_visite_trad']);
			}

			foreach ($currentVisitePhysique['Trad_titre_desc_visite'] as $currentTrad) {
				echo ('<br>Description en ');
				afficheLangue($currentTrad['langue_id'],$langues_list);
				echo( ' : ' . $currentTrad['desc_visite_trad']);
			}

			echo ('<br>Date d\'ajout : '. $currentVisitePhysique['Visite']['date_ajout']);
			echo('<br>Nombre de personne maximum : '.$currentVisitePhysique['Visite_physique']['nb_personne']);
			echo('<br>Durée de la visite (minutes) : '.$currentVisitePhysique['Visite_physique']['duree_physique']);
			echo('<br>Prix de la visite : '.$currentVisitePhysique['Visite_physique']['prix_physique']);
			if ($currentVisitePhysique['Visite_physique']['acces_handicap'])
			{
				echo('<br>accés handicapés');
			}

		endforeach;


		echo('<br><br><h3>Visites audios :</h3>');
		$compteur=1;
		foreach ($visites_audio as $currentVisiteAudio):

			//debug($currentVisiteAudio);
			echo('<br><br><br>' . $compteur++. ' # ');

			foreach ($currentVisiteAudio['Trad_titre_desc_visite'] as $currentTrad) {
				echo ('<br>Titre en ');
				afficheLangue($currentTrad['langue_id'],$langues_list);
				echo( ' : ' . $currentTrad['titre_visite_trad']);
			}

			foreach ($currentVisiteAudio['Trad_titre_desc_visite'] as $currentTrad) {
				echo ('<br>Description en ');
				afficheLangue($currentTrad['langue_id'],$langues_list);
				echo( ' : ' . $currentTrad['desc_visite_trad']);
			}

			echo ('<br>Date d\'ajout : '. $currentVisiteAudio['Visite']['date_ajout']);
			echo('<br>Durée de la visite (minutes) : '.$currentVisiteAudio['Visite_audio']['duree_audio']);
			echo('<br>Prix de la visite : '.$currentVisiteAudio['Visite_audio']['prix_audio']);


		endforeach; 

		echo('<br><br><h3>Visites papiers :</h3>');
		$compteur=1;
		foreach ($visites_papier as $currentVisitePapier):

			//debug($currentVisitePapier);
			echo('<br><br><br>' . $compteur++. ' # ');

			foreach ($currentVisitePapier['Trad_titre_desc_visite'] as $currentTrad) {
				echo ('<br>Titre en ');
				afficheLangue($currentTrad['langue_id'],$langues_list);
				echo( ' : ' . $currentTrad['titre_visite_trad']);
			}

			foreach ($currentVisitePapier['Trad_titre_desc_visite'] as $currentTrad) {
				echo ('<br>Description en ');
				afficheLangue($currentTrad['langue_id'],$langues_list);
				echo( ' : ' . $currentTrad['desc_visite_trad']);
			}

			echo ('<br>Date d\'ajout : '. $currentVisitePapier['Visite']['date_ajout']);
			echo('<br>Durée de la visite (minutes) : '.$currentVisitePapier['Visite_papier']['duree_papier']);
			echo('<br>Prix de la visite : '.$currentVisitePapier['Visite_papier']['prix_papier']);

		endforeach; 
	}

?>




