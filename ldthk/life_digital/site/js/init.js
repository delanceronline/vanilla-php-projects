$(window).load(function(){
	
	$('.loadingcover').fadeOut();
	
})
$(function(){
	
	console.log($('.menu').find('a[href="'+document.location.pathname.split('/').pop()+'"]').closest('li').addClass('current'));
		
	$("ul.news-list-tt li").hover(function(){
			$(this).stop().animate({
				backgroundColor: '#ececec'
			}, 1000);
		}, function(){
			$(this).stop().animate({
				backgroundColor: '#fff'
			}, 1000);
		});
	
	
	$('.clientcontainer').hover(
		   function(){ 
		   		$( this ).find( "img" ).css('border', '1px solid rgba(236, 0, 140, 0.5)');
				$( this ).find( "p" ).css('color', '#000');
			}, 
		   function(){ 
		   		$( this ).find( "img" ).css('border','1px #dfdfdf solid');
				$( this ).find( "p" ).css('color','#a5a5a5');
			}
	)
	
	

	//Cobtact Us Map
	if($('#main-content').length){
	var map;
		function initialize() {
		  var myLatlng = new google.maps.LatLng(22.372323,114.119164);
		  var myOptions = {
			zoom: 18,
			center: myLatlng,
			mapTypeId: google.maps.MapTypeId.ROADMAP
		  }
		  var map = new google.maps.Map(document.getElementById("map-canvas"), myOptions);
		
		  var image = 'img/ldt/mapIcon.png';
		  var myLatLng = new google.maps.LatLng(22.372323,114.119164);
		  var beachMarker = new google.maps.Marker({
			  position: myLatLng,
			  map: map,
			  icon: image
		  });
		}
	  
		google.maps.event.addDomListener(window, 'load', initialize);
	}
})