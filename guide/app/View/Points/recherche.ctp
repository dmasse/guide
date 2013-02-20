<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.js"></script>
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false"></script>
<script type="text/javascript">

$(function(){

 var latlng=new google.maps.LatLng(43.57317363820925,3.863909667968759);	
 var map=new google.maps.Map(document.getElementById('gmap'),{
	zoom:4,
	center:latlng,
	mapTypeId:google.maps.MapTypeId.ROADMAP
 });


 var positions =[];
 var iterator=0;
 var descriptions=[];


<?php foreach ($points as $k=>$v): $v=current($v);?>

positions.push({
	"idPoint":"<?php echo $points[$k]['Point']['id'];?>",
	"lat":"<?php echo $points[$k]['Point']['lat'];?>",
	"lng":"<?php echo $points[$k]['Point']['lng'];?>",
	"name":"<?php echo $points[$k]['Point']['name'];?>",		

		
	});


<?php endforeach;?>
for (var i=0;i<positions.length;i++){
	setTimeout(addMarker,(i+1)*1000)
}


function addMarker(){
	var marker = new google.maps.Marker({
		position:new google.maps.LatLng(positions[iterator].lat,positions[iterator].lng),
		map:map,
		draggable:false,
		animation:google.maps.Animation.DROP


		});

	 var contentString =positions[iterator].name;
    


     var infowindow = new google.maps.InfoWindow({
         content: contentString
     });  	
google.maps.event.addListener(marker,'click',function(){

	 infowindow.open(map,marker);

	
});
	
iterator++;
	
}
});

</script>
<div id="gmap" style="width:800px; height:350px; margin:0 auto;"></div>

<?php foreach ($points as $k=>$v): $v=current($v);?>


<?php endforeach;?>