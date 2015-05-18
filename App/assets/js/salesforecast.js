function displayLicences(code){
	licence = ($('#licenceDrop').val()).trim();
	theme = ($('#themeDrop').val()).trim();
	family = ($('#familyDrop').val()).trim();
	mounting = ($('#mountingDrop').val()).trim();
    var table = [];
    $.ajax({
    type: "POST",
    url: base_url + "index.php/coordinator_c/updateLicences/"+code+"/"+theme+"/"+family+"/"+mounting,
    success: function(res){
    	$('#licenceDrop').html('');
    	$('#licenceDrop').append("<option value='all'>"+all+"</option>");
    	var obj = jQuery.parseJSON(res);
    	$.each(obj, function(key,value) {
            if(table.indexOf(value.Licence) == -1){
    		if((value.Licence).trim() == licence){
    			$('#licenceDrop').append("<option value='"+value.Licence+"' selected='selected'>"+value.Licence+"</option>");
    		}else{
    			$('#licenceDrop').append("<option value='"+value.Licence+"'>"+value.Licence+"</option>");
    		}table.push(value.Licence);}
    	   
		});
    }});
}


function displayThemes(code){
    licence = ($('#licenceDrop').val()).trim();;
    theme = ($('#themeDrop').val()).trim();;
    family = ($('#familyDrop').val()).trim();;
    mounting = ($('#mountingDrop').val()).trim();;
    var table = [];
    $.ajax({
    type: "POST",
    url: base_url + "index.php/coordinator_c/updateThemes/"+code+"/"+licence+"/"+family+"/"+mounting,
    success: function(res){
        $('#themeDrop').html('');
        $('#themeDrop').append("<option value='all'>"+all+"</option>");
        var obj = jQuery.parseJSON(res);
        $.each(obj, function(key,value) {
            if(table.indexOf(value.Thème) == -1){
            if((value.Thème).trim() == theme){     
                $('#themeDrop').append("<option value='"+value.Thème+"' selected='selected'>"+value.Thème+"</option>");
            }else{
                $('#themeDrop').append("<option value='"+value.Thème+"'>"+value.Thème+"</option>");   
            }table.push(value.Thème);}
        
        });
    }});
}

function displayFamilies(code){
    licence = ($('#licenceDrop').val()).trim();;
    theme = ($('#themeDrop').val()).trim();;
    family = ($('#familyDrop').val()).trim();;
    mounting = ($('#mountingDrop').val()).trim();;
    var table = [];
    $.ajax({
    type: "POST",
    url: base_url + "index.php/coordinator_c/updateFamilies/"+code+"/"+theme+"/"+licence+"/"+mounting,
    success: function(res){
        $('#familyDrop').html('');
        $('#familyDrop').append("<option value='all'>"+all+"</option>");
        var obj = jQuery.parseJSON(res);
        $.each(obj, function(key,value) {
            if(table.indexOf(value.Famille) == -1){
            if((value.Famille).trim() == family){
                $('#familyDrop').append("<option value='"+value.Famille+"' selected='selected'>"+value.Famille+"</option>");
            }else{
                $('#familyDrop').append("<option value='"+value.Famille+"'>"+value.Famille+"</option>");
            }table.push(value.Famille);}
        
        });
    }});
}

function displayMounting(code){
    licence = ($('#licenceDrop').val()).trim();;
    theme = ($('#themeDrop').val()).trim();;
    family = ($('#familyDrop').val()).trim();;
    mounting = ($('#mountingDrop').val()).trim();;
    var table = [];
    $.ajax({
    type: "POST",
    url: base_url + "index.php/coordinator_c/updateMounting/"+code+"/"+theme+"/"+licence+"/"+family,
    success: function(res){
        $('#mountingDrop').html('');
        $('#mountingDrop').append("<option value='all'>"+all+"</option>");
        var obj = jQuery.parseJSON(res);
        $.each(obj, function(key,value) {
            if(table.indexOf(value.Montage) == -1){
            if((value.Montage).trim() == mounting){
                $('#mountingDrop').append("<option value='"+value.Montage+"' selected='selected'>"+value.Montage+"</option>");
            }else{
                $('#mountingDrop').append("<option value='"+value.Montage+"'>"+value.Montage+"</option>");
            }table.push(value.Montage);}
        
        });
    }});
}