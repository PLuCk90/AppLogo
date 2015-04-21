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

function alertCreateUser(){
    $('#creAlert').foundation('reveal', 'open');
}

function activationRequest(id,id_state,url,self)
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
    url: base_url + "index.php/admin_c/activateUser/"+id+"/"+state,
    success: function(res){if(self==true){window.location.replace(url+"index.php/admin_c/display_users");}
  }});
}

function displayActAlert()
{
  $('#ActAlert').foundation('reveal', 'open');
  //alert('ça marche');
  //$('a.reveal-link').trigger('click');
} 

var angularEnv = angular.module('angularEnv',[]);
angularEnv.controller("searchController", function($scope,$http){
   $scope.$watch('search', function() {
                  
                  //console.log(users);
                 $http({
                  method:'GET',
                  url: base_url+"assets/js/searchBar.php?search="+$scope.search+'&users='+users,
                }).success(
                    function(data_result, status){
                      //console.log(data_result);
                      //console.log($scope.search);
                      $scope.disp = data_result;
                      if($scope.search == undefined || $scope.search == ''){ //--no search entry
                      angular.element($('.userRow')).attr('style','display:');
                       angular.element($('#noMatch')).attr('style','display:none');
                      }
                      else{
                        if(data_result.length < '1'){ //--no match
                        angular.element($('.userRow')).attr('style','display:none');
                        angular.element($('#noMatch')).attr('style','display:');

                      }
                      else{
                        angular.element($('.userRow')).attr('style','display:none');
                        angular.forEach(data_result, function(value, key) { //--some matches
                        angular.element($('#noMatch')).attr('style','display:none');
                        var id = '#userRow'+value; 
                        angular.element($(id)).attr('style','display:');
                        });
                      }
                      }
                      
                      
                    }
                  );
            });
});