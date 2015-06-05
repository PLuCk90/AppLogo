<div class="fixed">
	
<nav class="top-bar" data-topbar role="navigation" style="-moz-box-shadow: 2px 2px 10px 0px #656565;-webkit-box-shadow: 2px 2px 10px 0px #656565;-o-box-shadow: 2px 2px 10px 0px #656565;box-shadow: 2px 2px 10px 0px #656565;filter:progid:DXImageTransform.Microsoft.Shadow(color=#656565, Direction=134, Strength=10);">  
			<ul class="title-area">
			    <li class="name">
			      <h1><a class="fi-home" href="<?php echo site_url('coordinator_c/display_coordinator_main');?>"> <strong><?php echo lang('topbar_sales_title');  ?></strong></a></h1>
			    </li>
			     <!-- Remove the class "menu-icon" to get rid of menu icon. Take out "Menu" to just have icon alone -->
			    <li class="toggle-topbar menu-icon"><a href="#"><span>Menu</span></a></li>
  			</ul>
		
			  <section class="top-bar-section">
				<ul class="left">
	 		 			<li ><a class="fi-pricetag-multiple" href="<?php echo site_url('coordinator_c/sales_forecast'); ?>"> <?php echo lang('sales_forecast_label');?></a></li> 
				 		<li ><a class="fi-target" href="<?php echo site_url('coordinator_c/objectives'); ?>"> <?php echo lang('objective_label');?></a></li> 
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
						 		 			<i class="fi-torso-business"> </i><?php echo $this->users_m->getRightLabel($this->session->userdata('id_right_user'));?>
					 		 			</div>
				 		 			<!--</div>-->
			 		 			</div>
				      			</li>
				      		</ul>  	
			      	  </li>
				      <li class="has-dropdown">
				        <a href="#" class="small fi-widget" style="font-size:1.5em;"></a>
				        <ul class="dropdown" style="border:solid 1px #282828;color:#C0C0C0;padding:0px;">
				        	<li><a class="fi-torso " style="margin:0;border:solid 1px #DDDDDD;" href="<?php echo site_url('coordinator_c/manage_my_account/'.$this->session->userdata('id_user')); ?>"> <?php echo lang('my_account_label');?></a></li>
					        <li><a class="fi-power " style="margin:0;border:solid 1px #DDDDDD;" href="<?php echo site_url('main_c/logout'); ?>"> <?php echo lang('logout_label');?></a></li>
				        </ul>

				      </li>
				      
				    </ul>
			  </section>
		
</nav>
</div>
<div class="row" style="max-width:100%;">
<div class="small-11 small-centered columns">
<div class="small-12 columns panel" style="border:solid #C0C0C0 1px;padding:0;-moz-box-shadow: 2px 2px 10px 0px #656565;-webkit-box-shadow: 2px 2px 10px 0px #656565;-o-box-shadow: 2px 2px 10px 0px #656565;box-shadow: 2px 2px 10px 0px #656565;filter:progid:DXImageTransform.Microsoft.Shadow(color=#656565, Direction=134, Strength=10);">
                