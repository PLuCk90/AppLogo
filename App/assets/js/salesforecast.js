

function displayLicences(code){
	licence = $('#licenceDrop').val();
	theme = $('#themeDrop').val();
	family = $('#familyDrop').val();
	mounting = $('#mountingDrop').val();
	$.ajax({
    type: "POST",
    url: base_url + "index.php/coordinator_c/updateLicences/"+code+"/"+theme+"/"+family+"/"+mounting,
    success: function(res){
    	$('#licenceDrop').html('');
    	$('#licenceDrop').append("<option value='all'>"+all+"</option>");
    	var obj = jQuery.parseJSON(res);
    	$.each(obj, function(key,value) {
    		if(value.Licence == licence){
    			$('#licenceDrop').append("<option value='"+value.Licence+"' selected='selected'>"+value.Licence+"</option>");
    		}else{
    			$('#licenceDrop').append("<option value='"+value.Licence+"'>"+value.Licence+"</option>");
    		}
    	
		});
    }});
}