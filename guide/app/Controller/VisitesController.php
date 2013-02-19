<?php 


class VisitesController extends AppController{

	
	var $components = array('Auth');
	//var $primaryKey = 'IdUser';//changement du nom de la clé primaire

	function Addvisit(){//renvoie à la vue registration
		if ($this->request->is('post')){
			$d= $this->request->data;//empeche le piratage stocker les données dans un tableau
			$d['User']['id'] = null;//permet d'etre sur d'avoir une insertion et non une modification attention à changer en fonction de la base de données
	
		//Gestion des boutons
			if($this->request->data['type'] == 'physique'){
				$d['Visite']['date_ajout']=date('Y-m-d H:i:s');
				$d['Visite']['guide_id']= $this->Auth->User('guide_id');
				$this->Visite->saveAssociated($d,true,array('deep' => true),array('Visite'=>array('id','date_ajout','guide_id')));	
				$idvisite= $this->Visite->field('id');
				debug($idvisite);
				$this->Session->write('idvisite',$idvisite);
				$this->Session->write('typevisite','physique');
				$this->redirect( array('controller' => 'Visites','action' => 'ajout_visite_physique'));
			}
			
				
			if($this->request->data['type'] == 'papier'){
				$d['Visite']['date_ajout']=date('Y-m-d H:i:s');
				$d['Visite']['guide_id']= $this->Auth->User('guide_id');
				$this->Visite->saveAssociated($d,true,array('deep' => true),array('Visite'=>array('id','date_ajout','guide_id')));
				$idvisite= $this->Visite->field('id');
				debug($idvisite);
				$this->Session->write('idvisite',$idvisite);
				$this->Session->write('typevisite','papier');
				$this->redirect( array('controller' => 'Visites','action' => 'ajout_visite_papier'));
			}
				
			if($this->request->data['type'] == 'audio'){
				$d['Visite']['date_ajout']=date('Y-m-d H:i:s');
				$d['Visite']['guide_id']= $this->Auth->User('guide_id');
				$this->Visite->saveAssociated($d,true,array('deep' => true),array('Visite'=>array('id','date_ajout','guide_id')));
				$idvisite= $this->Visite->field('id');
				debug($idvisite);
				$this->Session->write('idvisite',$idvisite);
				$this->Session->write('typevisite','audio');
				$this->redirect( array('controller' => 'Visites','action' => 'ajout_visite_audio'));
			}
	}
	}
	
	function ajout_visite_physique(){	
    $Sessionguide=$this->Auth->user('type_personne');
    $this->paginate = array(
    		'conditions' => array('Porter_sur.visite_id LIKE'=>$this->Session->read('idvisite')));
    
    $d['lieu']=	$this->paginate('Porter_sur');
    $this->set($d);
    //permet d'afficher la liste des langues existantes
   $this->set('langues',$this->Visite->Visite_physique->Trad_titre_desc_visite->Langue->find('list',array('field'=>'Langues.nom_langue')));
   //permet d'afficher la liste des types de visites existants
   $this->set('typesVisites',$this->Visite->Type_de_visite->Type_visite_francai->find('list',array('field'=>'Type_visite_francais.type_visite_francai')));
  
 
  	//Gestion des boutons
    $d= $this->request->data;
  	if($this->request->data['type'] == 'localisation'){
  		$this->redirect( array('controller' => 'Points','action' => 'lieu_visite'));
  	}
  		
 
  
   if($this->request->is('put')||$this->request->is('post')){
	$d=array();
	$d=$this->request->data;
	
	//$d['Visite_physique']['id']= $this->Visite->Visite_physique->field('id');

	//créer une nouvelle visite à chaque fois!!!!!
	$d['Visite']['id']= $this->Session->read('idvisite');
	$d['Visite_physique']['visite_id']= $this->Session->read('idvisite');

	
	if($this->Visite->saveAssociated($d,true,array('Visite_physique'=>array('Visite_physique.nb_personne','Visite_physique.duree_physique','Visite_physique.prix_physique','Visite_physique.acces_handicap','Visite_physique.visite_id'),'Type_de_visite'=>array('type_visite_francais_id')))){
	$d['Visite_physique']['id']= $this->Visite->Visite_physique->field('id');
	$d['Visite_physique']['visite_id']=$d['Visite']['id'];
	debug($d);
	($this->Visite->Visite_physique->saveAssociated($d,true,array('Date_visite_physique'=>array('id','date_visite_physique'),'Trad_titre_desc_visite'=>array('id','titre_visite_trad','desc_visite_trad','langue_id'))));
	$this->Session->setFlash("Une nouvelle visite physique a été créée","notif");
	$this->redirect('/visites/addvisit');
	}else {
	$this->Session->setFlash("Impossible de sauvegarder","notif",array('type'=>'error'));
	}
	
		}
		
		
		}		
		
		
	function ajout_visite_papier(){

		$Sessionguide=$this->Auth->user('type_personne');
		$this->paginate = array(
				'conditions' => array('Porter_sur.visite_id LIKE'=>$this->Session->read('idvisite')));
		
		$d['lieu']=	$this->paginate('Porter_sur');
		debug($d['lieu']);
		$this->set($d);
		//permet d'afficher la liste des langues existantes
		$this->set('langues',$this->Visite->Visite_papier->Trad_titre_desc_visite->Langue->find('list',array('field'=>'Langues.nom_langue')));
		//permet d'afficher la liste des types de visites existants
		$this->set('typesVisites',$this->Visite->Type_de_visite->Type_visite_francai->find('list',array('field'=>'Type_visite_francais.type_visite_francai')));
		
		//Gestion des boutons
		if($this->request->data['type'] == 'localisation'){
			$this->redirect( array('controller' => 'Points','action' => 'lieu_visite'));
		}
		
			
		
		if($this->request->is('put')||$this->request->is('post')){
			$d=array();
			$d=$this->request->data;
		
			//$d['Visite_physique']['id']= $this->Visite->Visite_physique->field('id');
		
			
		
//créer une nouvelle visite à chaque fois!!!!!

			
			
			
			/////////////////////////////
			// Gestion de l'upload pdf //
			/////////////////////////////
			
			if (!$this->request->data['Visite']['papier']['tmp_name']=='')
			{
				 
				debug($this->request->data['Visite']['papier']);
				//On récupére le fichier
				$tmp_name                  =$this->request->data['Visite']['papier']['tmp_name'];
				// Définition du poids maximal du fichiers
				$sizeMax = 52428800; // 50 Mo
				$size = $this->request->data['Visite']['papier']['size'];
				$type = $this->request->data['Visite']['papier']['type'];
			
				//Traitement selon le type du fichier
				if ($size<=$sizeMax)
				{
					if ($type == 'application/pdf')
					{
			
						//On définit le nom de la photo. ici : profil + 'identifiant'
						$nameInt        ='Visite Audio '.  $d['Visite']['id'].' '. $d['Visite']['date_ajout'].'.pdf';
						//On remplace les : par - sinon erreur à l'enregistrement
						$name       = str_replace(":", "-", $nameInt  );
						//On définit le chemin ou sera enregistré la photo
						$folder_url = 'visite/pdf/';
						$uploads_dir =WWW_ROOT. $folder_url;
			
						//Si le dossier n est pas encore présent sur le serveur on le créé
						if(!is_dir($folder_url))
						{
							mkdir($folder_url);
						}
			
			
						debug($uploads_dir);
						chmod($uploads_dir, 0777);
			
						move_uploaded_file($tmp_name, $uploads_dir.$name);
			
						$d['Visite_papier']['document_pdf'] = 'profil/'.$name;
					}else
					{
						//Le format n'est pas correct
						$erreur = 1;
						debug($type);
					}
				}else
				{
					debug($size);
					// Taille trop grande
					$format = 2;
				}
			}else
			{
				// Pas de fichiers
				$erreur = 3;
			}
			
			/////////////////////////
			// Fin de l'upload pdf //
			/////////////////////////
			
			
			
			
			//créer une nouvelle visite à chaque fois!!!!!
			$d['Visite']['id']= $this->Session->read('idvisite');
			$d['Visite_papier']['visite_id']= $this->Session->read('idvisite');
			debug($d['Visite']['id']);
			
			if($this->Visite->saveAssociated($d,true,array('Visite_papier'=>array('Visite_papier.nb_personne','Visite_papier.duree_physique','Visite_papier.prix_physique','Visite_papier.acces_handicap','Visite_papier.visite_id','visite_papier.document_pdf'),'Type_de_visite'=>array('type_visite_francais_id')))){
				$d['Visite_papier']['id']= $this->Visite->Visite_papier->field('id');
				$d['Visite_papier']['visite_id']=$d['Visite']['id'];
				debug($d);
				($this->Visite->Visite_papier->saveAssociated($d,true,array('Date_visite_physique'=>array('id','date_visite_physique'),'Trad_titre_desc_visite'=>array('id','titre_visite_trad','desc_visite_trad','langue_id'))));
				$this->Session->setFlash("Une nouvelle visite physique a été créée","notif");
				$this->redirect('/visites/addvisit');
			}else {
				$this->Session->setFlash("Impossible de sauvegarder","notif",array('type'=>'error'));
			}
			
			}
		
		}
				
	
	function ajout_visite_audio(){
		$Sessionguide=$this->Auth->user('type_personne');
		$this->paginate = array(
				'conditions' => array('Porter_sur.visite_id LIKE'=>$this->Session->read('idvisite')));
		
		$d['lieu']=	$this->paginate('Porter_sur');
		debug($d['lieu']);
		$this->set($d);
		//permet d'afficher la liste des langues existantes
		$this->set('langues',$this->Visite->Visite_audio->Trad_titre_desc_visite->Langue->find('list',array('field'=>'Langues.nom_langue')));
		//permet d'afficher la liste des types de visites existants
		$this->set('typesVisites',$this->Visite->Type_de_visite->Type_visite_francai->find('list',array('field'=>'Type_visite_francais.type_visite_francai')));
		
		//Gestion des boutons
		if($this->request->data['type'] == 'localisation'){
			$this->redirect( array('controller' => 'Points','action' => 'lieu_visite'));
		}
		
		
		

	  
   if($this->request->is('put')||$this->request->is('post')){
	$d=array();
	$d=$this->request->data;
	
	//$d['Visite_physique']['id']= $this->Visite->Visite_physique->field('id');


		
			
			/////////////////////////////
			//Gestion de l'upload pdf//
			/////////////////////////////
			
			if (!$this->request->data['Visite']['audio']['tmp_name']=='')
			{
				 
				debug($this->request->data['Visite']['audio']);
				//On récupére le fichier
				$tmp_name                  =$this->request->data['Visite']['audio']['tmp_name'];
				// Définition du poids maximal du fichiers
				$sizeMax = 52428800; // 50 Mo
				$size = $this->request->data['Visite']['audio']['size'];
				$type = $this->request->data['Visite']['audio']['type'];
			
				//Traitement selon le type du fichier
				if ($size<=$sizeMax)
				{
					if ($type == 'audio/mp3')
					{
			
						//On définit le nom de la photo. ici : profil + 'identifiant'
						$nameInt    ='Visite Audio '. $d['Visite']['id'] .' '. $d['Visite']['date_ajout']. '.mp3';
						//On remplace les : par - sinon erreur à l'enregistrement
						$name       = str_replace(":", "-", $nameInt  );
						//On définit le chemin ou sera enregistré le fichier
						$folder_url = 'visite/audio/';
						$uploads_dir =WWW_ROOT. $folder_url;
			
						//Si le dossier n est pas encore présent sur le serveur on le créé (ne marche pas en local Windows)
						if(!is_dir($folder_url))
						{
							mkdir($folder_url);
						}
			
			
						debug($uploads_dir);
						chmod($uploads_dir, 0777);
			
						move_uploaded_file($tmp_name, $uploads_dir.$name);
			
						$d['Visite_audio']['piste_audio'] = 'profil/'.$name;
					}else
					{
						//Le format n'est pas correct
						$erreur = 1;
						debug($type);
					}
				}else
				{
					debug($size);
					// Taille trop grande
					$format = 2;
				}
			}else
			{
				// Pas de fichiers
				$erreur = 3;
			}
			
			/////////////////////////
			//Fin de l'upload audio//
			/////////////////////////
			
					
   	//créer une nouvelle visite à chaque fois!!!!!
	$d['Visite']['id']= $this->Session->read('idvisite');
	$d['Visite_audio']['visite_id']= $this->Session->read('idvisite');
	debug($d['Visite']['id']);
	
	if($this->Visite->saveAssociated($d,true,array('Visite_audio'=>array('Visite_audio.nb_personne','Visite_audio.duree_audio','Visite_audio.prix_audio','Visite_audio.acces_handicap','Visite_audio.visite_id','visite_audio.piste_audio'),'Type_de_visite'=>array('type_visite_francais_id')))){
	$d['Visite_audio']['id']= $this->Visite->Visite_audio->field('id');
	$d['Visite_audio']['visite_id']=$d['Visite']['id'];
	debug($d);
	($this->Visite->Visite_physique->saveAssociated($d,true,array('Trad_titre_desc_visite'=>array('id','titre_visite_trad','desc_visite_trad','langue_id'))));
	$this->Session->setFlash("Une nouvelle visite audio a été créée","notif");
	$this->redirect('/visites/addvisit');
	}else {
	$this->Session->setFlash("Impossible de sauvegarder","notif",array('type'=>'error'));
	}
	
		}
		
	
				
		}
	
	 function edit($id){
			$this->Visite->Porter_sur->Point->id=$id;
		
			if($this->request->is('put')||$this->request->is('post')){
				$d=$this->request->data;
				debug($d);
				($this->Visite->Porter_sur->Point->save($d,true,array('id','lat','lng','name')));
				 
				//$this->redirect('/Points/lieu_visite');
			}
			$this->request->data=$this->Point->read();
		
		}
	 function delete($id){
			$this->Session->setFlash('la localisation a été supprimée');
			$this->Visite->Porter_sur->Point->delete($id);
			$this->redirect($this->referer());
		
		
		}



}	



?>
