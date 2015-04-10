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