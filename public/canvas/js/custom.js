function report_data(platform, id_content,link){
	$.get( "/tracking/"+platform+"/visualizacion-seguimiento-reproduccion/"+id_content).done(function( data ) {
   		var reported = data;
   		
		if (reported == "true") {
			//alert('reportado y redirigiendo...');
			window.location.replace(link);
		}
	});
}

$('.tracking-btn').click(function(event) {
	if ( $(this).attr('data-action') != 'wallpapers' ) {
		event.preventDefault();
	}
	
	var id_content = $(this).attr('data-id');
	var platform   = $(this).attr('data-action');
	var link       = $(this).attr('href');
	
	report_data(platform, id_content, link);
});