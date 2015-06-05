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
    if((licence == 'all' && theme =='all' && family=='all' && mounting == 'all') || licence=='all')
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
        //console.log(obj);
        forecast = obj.forecast;
        obj = obj.products;
        $('#body').html('');
        if(obj.length > 300){
            $('#alert-filter2').foundation('reveal', 'open');
        }else{
         $.each(obj, function(key,value) {
            var thisProductForecast = [];
            $.each(forecast, function(index,element)
                {
                    if((element.product_forecast).trim() == (value.Référence).trim()){
                        thisProductForecast.push(element);       
                        }

            });
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
                        "</td>";
          //      console.log(thisProductForecast);
                
                forecastM1='-';forecastM2='-';forecastM3='-';forecastM4='-';
                if(thisProductForecast.length != 0)
                {
                        $.each(thisProductForecast,function(num,item){
                            // console.log(item.date_forecast);
                            // console.log(item.date_forecast == String(parseInt(mon)+0)+year);
                            // console.log(item.date_forecast == String(parseInt(mon)+1)+year);
                            // console.log(item.date_forecast == String(parseInt(mon)+2)+year);
                            // console.log(item.date_forecast == String(parseInt(mon)+3)+year);
                            if(item.date_forecast == String(parseInt(mon)+0)+year){
                                forecastM1 = item.amount_forecast;
                            }
                             if(item.date_forecast == String(parseInt(mon)+1)+year){
                                forecastM2 = item.amount_forecast;
                            }
                             if(item.date_forecast == String(parseInt(mon)+2)+year){
                                forecastM3 = item.amount_forecast;
                            }
                             if(item.date_forecast == String(parseInt(mon)+3)+year){
                                forecastM4 = item.amount_forecast;
                            }
                        });
                }
                if(checkDelay(value.Période_livraison,0,value.Désignation)){quantite = parseInt(value.Qté_reste_à_facturer);}else{quantite="-";}
                var productM1 = "<td class=\"column1 top-strong\">"+quantite+"</td>"+
                        "<td class=\"column2 top-strong\">"+parseInt(value.Qté_BO)+"</td>"+
                        "<td class=\"column1 top-strong readableForecastM1\">"+forecastM1+"</td>";
                if(checkDelay(value.Période_livraison,1,value.Désignation)){quantite = parseInt(value.Qté_reste_à_facturer);}else{quantite="-";}
                var productM2 =
                        "<td class=\"column2 top-strong\">"+quantite+"</td>"+
                        "<td class=\"column1 top-strong readableForecastM2\" colspan=\"2\">"+forecastM2+"</td>";
                if(checkDelay(value.Période_livraison,2,value.Désignation)){quantite = parseInt(value.Qté_reste_à_facturer);}else{quantite="-";}
                var productM3 =
                        "<td class=\"column2 top-strong\">"+quantite+"</td>"+
                        "<td class=\"column1 top-strong readableForecastM3\" colspan=\"2\">"+forecastM3+"</td>";
                if(checkDelay(value.Période_livraison,3,value.Désignation)){quantite = parseInt(value.Qté_reste_à_facturer);}else{quantite="-";}
                var productM4 = "<td class=\"column2 top-strong\">"+quantite+"</td>"+
                        "<td colspan=\"2\" id=\"input"+value.Référence.trim()+"\" class=\"column1 top-strong forecast readableForecastM4\" style=\"padding:0;\" onclick=\"displayInput('"+value.Référence.trim()+"')\"><input class=\"inputForecast\" id=\"forecast"+value.Référence.trim()+"\" onchange=\"saveForecast('"+M3_code+"','"+value.Référence.trim()+"');displayTotalForecast();\" type=\"text\" style=\"margin:0;display:none;\"><span>"+forecastM4+"</span></td>"+
                        "<td style=\"display:none\"></td>"+
                     "</tr>";
                $('#body').append(product+productM1+productM2+productM3+productM4);
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

function displayTotalForecast()
{
    setTimeout(function(){
        var allForecast = 0
        $('.readableForecastM1').each(function(){if($(this).html() != '-'){allForecast += parseInt($(this).html());}});
        console.log('Total Forecast M1 : '+allForecast);
        $('#forecastM1').html(allForecast);

        var allForecast = 0
        $('.readableForecastM2').each(function(){if($(this).html() != '-'){allForecast += parseInt($(this).html());}});
        console.log('Total Forecast M2 : '+allForecast);
        $('#forecastM2').html(allForecast);
        

        var allForecast = 0
        $('.readableForecastM3').each(function(){if($(this).html() != '-'){allForecast += parseInt($(this).html());}});
        console.log('Total Forecast M3 : '+allForecast);
        $('#forecastM3').html(allForecast);
        

        var allForecast = 0
        $('.readableForecastM4 span').each(function(){if($(this).html() != '-'){allForecast += parseInt($(this).html());}});
        console.log('Total Forecast M4 : '+allForecast);
        $('#forecastM4').html(allForecast);
        
    },1600);
}

function checkDelay(date,offset,designation)
{
    currentMonth = parseInt(date.substring(4,6));
    currentYear = date.substring(0,4);
    month = parseInt(mon)+offset;
    //console.log(designation);
    //console.log(currentMonth + ' ' + currentYear );
    if(offset==0 && (currentYear < year || (currentYear == year && currentMonth < month)))
    {
      //  console.log('BO true');
        return true;
    }
   
    if(year==currentYear && month==currentMonth)
    {
        //console.log('true');
        return true;
    }
    //console.log('false');
    return false;
}


function saveForecast(user,product)
{
    date = String(parseInt(mon)+3)+String(year);
    forecast = $('#forecast'+product).val();
    $.ajax({
    type: "GET",
    url : base_url+"index.php/coordinator_c/saveForecast/"+forecast+'/'+user+'/'+product+'/'+date,
    success: function(res){
        data = jQuery.parseJSON(res);
        console.log(data);
        $('#forecast'+product).css("display","none");
        $('#input'+product+' span').html(data.amount_forecast);
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


