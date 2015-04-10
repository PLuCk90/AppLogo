<div class="fixed">
	
<nav class="top-bar" data-topbar role="navigation" style="-moz-box-shadow: 2px 2px 10px 0px #656565;-webkit-box-shadow: 2px 2px 10px 0px #656565;-o-box-shadow: 2px 2px 10px 0px #656565;box-shadow: 2px 2px 10px 0px #656565;filter:progid:DXImageTransform.Microsoft.Shadow(color=#656565, Direction=134, Strength=10);">  
			<ul class="title-area">
			    <li class="name">
			      <h1><a href="<?php echo site_url('admin_c/display_admin_main');?>"><strong><?php echo lang('topbar_title');  ?></strong></a></h1>
			    </li>
			     <!-- Remove the class "menu-icon" to get rid of menu icon. Take out "Menu" to just have icon alone -->
			    <li class="toggle-topbar menu-icon"><a href="#"><span>Menu</span></a></li>
  			</ul>
		
			  <section class="top-bar-section">
				<ul class="left">
	 		 			<li class=""><a href="<?php echo site_url('admin_c/display_users'); ?>"><?php echo lang('users_label');?></a></li> 
				 	
				</ul>
				

				    <!-- Right Nav Section -->
				    <ul class="right">
				      <li class="has-dropdown">
				      		<a href="#"><?php echo lang('welcome_message');?><?php echo $this->session->userdata('name_user');?> <?php echo $this->session->userdata('firstname_user');?></a>
				      		<ul class="dropdown" style="width:15em;">
				      			<li>
				      			<div style="border:solid 1px #282828;color:#C0C0C0;padding:0px;">
				 		 			<!--<div style="overflow:hidden;">-->
						 		 		<div style="background-color:#101010;padding-left:10px">
						 		 			<i class="fi-info"> </i><?php echo lang('infos_header');?>
					 		 			</div>
					 		 			<div class="panel" style="padding:0;padding-left:10px;margin:0">
						 		 			<i class="fi-results-demographics"> </i><?php echo $this->session->userdata('mail_user');?>
					 		 			</div>
					 		 			<div class="panel" style="padding:0;padding-left:10px;margin:0" >
						 		 			<i class="fi-telephone"> </i><?php echo $this->session->userdata('phone_user');?>
					 		 			</div>
					 		 			<div class="panel" style="padding:0;padding-left:10px;margin:0">
						 		 			<i class="fi-torso-business"> </i><?php echo $this->session->userdata('description_right');?>
					 		 			</div>
				 		 			<!--</div>-->
			 		 			</div>
				      			</li>
				      		</ul>  	
			      	  </li>
				      <li class="has-dropdown">
				        <a href="#" class="small fi-widget" style="font-size:1.5em;color:white"></a>
				        <ul class="dropdown">
				        	<li>
				        		
			 		 		</li>
					        <li><a href="<?php echo site_url('main_c/logout'); ?>"><?php echo lang('logout_label');?></a></li>
				        </ul>
				      </li>
				    </ul>
			  </section>
		
</nav>
</div>
<div class="row panel" style="padding:0;height:50em;-moz-box-shadow: 2px 2px 10px 0px #656565;-webkit-box-shadow: 2px 2px 10px 0px #656565;-o-box-shadow: 2px 2px 10px 0px #656565;box-shadow: 2px 2px 10px 0px #656565;filter:progid:DXImageTransform.Microsoft.Shadow(color=#656565, Direction=134, Strength=10);">
                