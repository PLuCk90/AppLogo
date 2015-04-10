function display_online_users(online,id,src){
  //console.log(online);
  $(id).html("" );
  if (online ==1)
  {
    $(id).html('<img height="10em" width="10em" style="margin-left:1em;" src="'+src+'assets/img/button-green.png" alt="Online"/>');
  }
  else
  {
    $(id).html('<img height="10em" width="10em" style="margin-left:1em;" src="'+src+'assets/img/button-red.png" alt="Offline"/>');
  }
}

function activateUser(id_alert,id_session,id,id_state,url){
  if(id_session == id)
  {
    $(id_alert).foundation('reveal', 'open');
  }
  else{activationRequest(id,id_state,url);}
}

function activationRequest(id,id_state,url)
{
    if($(id_state).is(':checked')){
       state = 1;
       //console.log(state);
    }
    else{
      state = 0;
       //console.log(state);
    } 
    $.ajax({
    type: "POST",
    url: url + "index.php/admin_c/activateUser/"+id+"/"+state,
    success: function(res){window.location.replace(url+"index.php/admin_c/display_users")}});
}

function displayActAlert()
{
  $('#ActAlert').foundation('reveal', 'open');
  //alert('ça marche');
  //$('a.reveal-link').trigger('click');
}