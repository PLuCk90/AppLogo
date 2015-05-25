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

function updateProducts(code){
    licence = ($('#licenceDrop').val()).trim();;
    theme = ($('#themeDrop').val()).trim();;
    family = ($('#familyDrop').val()).trim();;
    mounting = ($('#mountingDrop').val()).trim();;
    productsTab = [];
    if(licence == 'all' && theme =='all' && family=='all' && mounting == 'all')
    {
        $('#alert-filter').foundation('reveal', 'open');
    }
    else
    {
    var table = [];
    $.ajax({
    type: "POST",
    url: base_url + "index.php/coordinator_c/updateProductsByCoord/"+code+"/"+theme+"/"+licence+"/"+family+"/"+mounting,
    success: function(res){
        var obj = jQuery.parseJSON(res);
        $('#body').html('');
        if(obj.length > 300){
            $('#alert-filter2').foundation('reveal', 'open');
        }else{

         $.each(obj, function(key,value) {
            if((productsTab.indexOf(value.Référence.trim()) == -1))
            {
                productsTab.push(value.Référence.trim());
                var product = "<tr style=\"display:none;\"></tr>"+
                    "<tr class=\"line\">"+
                        "<td class=\"produit top-strong\" style=\"margin-bottom:0\" data-dropdown=\"drop"+value.Référence.trim()+"\" aria-controls=\"drop"+value.Référence.trim()+"\" aria-expanded=\"true\" >"+value.Désignation+"<br>"+value.Référence+""+
                        "<div id=\"drop"+value.Référence.trim()+"\" data-dropdown-content class=\"f-dropdown\" aria-hidden=\"true\">"+
                        "<li style=\"text-align:left;padding:5px;\" class=\"fi-info\"> "+value.Licence+"</li>"+
                        "<li style=\"text-align:left;padding:5px;\" class=\"fi-play\"> "+value.Famille+"</li>"+
                        "<li style=\"text-align:left;padding:5px;\" class=\"fi-play\"> "+value.Thème+"</li>"+
                        "<li style=\"text-align:left;padding:5px;\" class=\"fi-play\"> "+value.Montage+"</li>"+
                        "<li style=\"text-align:left;padding:5px;\" class=\"fi-play\"> "+value.Dépot+"</li>"+
                        "</div>"+
                        "</td>"+
                        "<td class=\"column2 top-strong\">rien</td>"+
                        "<td class=\"column1 top-strong\">"+parseInt(value.Qté_reste_à_facturer)+"</td>"+
                        "<td class=\"column2 top-strong\">"+parseInt(value.Qté_BO)+"</td>"+
                        "<td class=\"column1 top-strong\">"+dispDelay(String(parseInt(value.Période_livraison.trim())))+"</td>"+
                        "<td class=\"column2 top-strong\" >Rien</td>"+
                        "<td id=\"input"+value.Référence.trim()+"\" class=\"column1 top-strong forecast\" style=\"padding:0;\" onclick=\"displayInput('"+value.Référence.trim()+"')\"><input class=\"inputForecast\" id=\"forecast"+value.Référence.trim()+"\" onchange=\"saveForecast('"+M3_code+"','"+value.Référence.trim()+"')\" type=\"text\" style=\"margin:0;display:none;\"><span></span></td>"+

                        "<td class=\"column2 top-strong\">rien</td>"+
                        "<td class=\"column1 top-strong\">rien</td>"+
                        "<td class=\"column2 top-strong\">rien</td>"+
                        "<td class=\"column1 top-strong\">rien</td>"+
                        "<td class=\"column2 top-strong\">rien</td>"+
                        "<td class=\"column1 top-strong\">rien</td>"+

                        "<td class=\"column2 top-strong\">rien</td>"+
                        "<td class=\"column1 top-strong\">rien</td>"+
                        "<td class=\"column2 top-strong\">rien</td>"+
                        "<td class=\"column1 top-strong\">rien</td>"+
                        "<td class=\"column2 top-strong\">rien</td>"+
                        "<td class=\"column1 top-strong\">rien</td>"+
                        "<td style=\"display:none\"></td>"+
                     "</tr>";
                $('#body').append(product);
            }
            else{

            }
        });
        $(document).foundation();
        $('#body').height('100px');

        }  


    }});
    }
}

function dispDelay(date)
{
var year = date.substring(0,4);
var month = date.substring(4);
var date = month+"/"+year;
return date;
}


function saveForecast(user,product)
{
    forecast = $('#forecast'+product).val();
    $.ajax({
    type: "GET",
    url: base_url+"assets/js/saveForecast.php?forecast="+forecast+'&user='+M3_code+'&product='+product,
    success: function(res){
        data = jQuery.parseJSON(res);
        console.log(data);
        $('#forecast'+product).css("display","none");
        $('#input'+product+' span').html(data.forecast);
    }});
}

function displayInput(id)
{
    selector = 'forecast'+id;
    console.log('#forecast'+id);
    $('.inputForecast').css("display","none");
    $('#'+selector).css("display","");
    setTimeout(function(){$('#'+selector).focus(); },100);

}