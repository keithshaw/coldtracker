<script>
	var loc = false;
	//get the coordinates of a visitor
	if ("geolocation" in navigator) {
	  // check if geolocation is supported/enabled on current browser
	  navigator.geolocation.getCurrentPosition(
	   function success(position) {
	   	if(loc == false){loc = position;}
	    console.log(position);
	    $.post('/visitor', position, function(data,status,xhr){
	    	console.log(status);
	    },"json")
	   },
	  function error(error_message) {
	    console.error('An error has occured while retrieving location', error_message);
	  });
		} else {
		  console.log('geolocation is not enabled on this browser')
		}
	
	$( "#symptomsForm" ).submit(function(event){
		event.preventDefault();
		console.log(event);
		$.post( "/symptoms", $( "#symptomsForm" ).serialize() );
   	$("#questionModal").modal('toggle');
	});
</script>


