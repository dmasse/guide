  <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.js"></script>
  <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false"></script>
<script type="text/javascript">
$(function(){

 var latlng=new google.maps.LatLng(
		 <?php echo isset($this->data['Point']['lat'])? $this->data['Point']['lat']:43.57317363820925;?>,
		 <?php echo isset($this->data['Point']['lng'])? $this->data['Point']['lng']:3.863909667968759;?>);	
 var map=new google.maps.Map(document.getElementById('gmap'),{
zoom:8,
center:latlng,
mapTypeId:google.maps.MapTypeId.ROADMAP
 });

 var marker= new google.maps.Marker({

	 position:latlng,
	 map:map,
	 title:'Bougez ce curseur',
	 draggable:true

	 
 });
 var geocoder = new google.maps.Geocoder(); 

google.maps.event.addListener(marker,'drag',function(){
		setPosition(marker);

});



 
 $('#PointAdresse').keypress(function(e){
	if(e.keyCode==13){

 
var request ={
		address:$(this).val()
			
}
		
		geocoder.geocode(request,function(results,status){
	if(status==google.maps.GeocoderStatus.OK){
var pos = results[0].geometry.location;
map.setCenter(pos);
marker.setPosition(pos);	
setPosition(marker);
	}

});

 return false; 
	}
	
 });

	
});

function setPosition(marker){

	var pos =marker.getPosition();//retourne un objet de type latitude longitude
	$('#PointLat').val(pos.lat());
	$('#PointLng').val(pos.lng());
}


  </script>

		 



 <?php $this->set('title_for_layout',"définir le lieu de la visite");
 
 
 
 echo $this->Form->create('Point',array('type'=>'file'));
 echo(" Veuillez sélectionner une localisation sur la carte en déplaçant le curseur rouge ");
 echo $this->Form->input('Point.name',array('label'=>"nom"));
 echo $this->Form->input('Point.lat',array('label'=>"Latitude"));
 echo $this->Form->input('Point.lng',array('label'=>"Longitude"));
 echo $this->Form->input('Adresse');
  echo $this->Form->button('retour au formulaire d ajout d une visite',array('name'=>'bouton', 'value' => 'retour'));
?>
 
 <div id="gmap" style="width:100%;height:350px;""></div>
  <?php

 echo $this->Form->end('ajouter une nouvelle localisation');?>