<?php 	//print_r($this->session->all_userdata()) ;
//print_r ($M3);

?>

<script type="text/javascript" style="display:none;">
    base_url = '<?=base_url();?>';
    users = '<?= json_encode($users);?>';
</script>
<div class="panel small-10 medium-10 columns" style="margin-bottom:0;border:solid #C0C0C0 1px;" data-ng-controller="searchController">
			<font>
			<table class="medium-12 small-6"	>
				<caption><?php echo lang('users_table_header');?></caption>
				<thead>
					<tr>
						<th width="40em"><?php echo lang('online_label');?></th>
						<th width="100em"><?php echo lang('lastname_label');?></th>
						<th width="100em"><?php echo lang('name_label');?></th>
						<th width="100em"><?php echo lang('M3code_label');?></th>
						<th width="100em"><?php echo lang('M3coor_label');?></th>
						<th width="100em"><?php echo lang('mail_label');?></th>
						<th width="100em"><?php echo lang('phone_label');?></th>
						<th class="hide-for-small" width="60em"><?php echo lang('language_label');?></th>
						<th class="hide-for-small" width="50em"><?php echo lang('rights_label');?></th>
						<th width="50em"><?php echo lang('active_label');?></th>
						<th width="50em"><?php echo lang('operations_label');?></th>
					</tr>
				</thead>
				<tbody>
					<?php if( $users != NULL): ?>
						<?php foreach ($users as $value): ?>
							<tr id="userRow<?php echo hash("sha256",$value->id_user,FALSE);?>" class="userRow">
								<?php
								$online=False;
								foreach ($sessions as $session) {
								if($session['id_user']==$value->id_user)
								{ $online = True; 
								}
								}
								?>
								<td id="<?php echo hash("sha256",$value->id_user,FALSE); ?>"></td>
								<script>display_online_users('<?php echo $online;?>','#<?php echo hash("sha256",$value->id_user,FALSE);?>','<?php echo base_url();?>')</script>
								<td><?php echo $value->lastname_user; ?></td>
								<td><?= $value->name_user; ?></td>
								<td><?= $value->id_m3; ?></td>
								<td><?php if($value->id_coor_m3 == ''){echo lang('no_coor');} ?></td>
								<td><?= $value->mail_user; ?></td>
								<td><?= $value->phone_user; ?></td>
								<td class="hide-for-small"> 
									<a href="#" data-options="is_hover:true" class="tiny" data-dropdown="langDrop<?php echo hash("sha256",$value->id_user,FALSE)?>" style="font-size:1em;margin-left:15px;">
									<?php 
									if(isset($value->description_language)){print_r("<img height=\"12.5em\" width=\"12.5em\" src=\"".base_url()."/assets/img/flags/".$value->description_language.".png\" alt =\"".$value->description_language."\">");}
									?>
									&raquo;</a>
									<ul id="langDrop<?php echo hash("sha256",$value->id_user,FALSE)?>" class="[tiny content] f-dropdown" data-dropdown-content >
										<?php foreach($languages  as $language) : ?>
										<li>
											<a href="<?php echo site_url("admin_c/changeLanguage")."/".$value->id_user."/".$language->id_language."/".$language->description_language;; ?>" style="margin:0" >
												<img height="8%" width="8%" src="<?php echo base_url();?>/assets/img/flags/<?php echo $language->description_language;?>.png" alt ="<?php echo $language->description_language; ?>">
												<?php echo ucfirst ($this->users_m->getLangLabel($language->id_language));?>
											</a>
										</li>
										<?php endforeach; ?>
						  			</ul>
								</td>
								<td class="hide-for-small"><?= ucfirst ($this->users_m->getRightLabel($value->id_right_user)); ?></td>
								<td>
									<div class="switch round">
  										<input id="activation<?php echo hash("sha256",$value->id_user,FALSE); ?>" type="checkbox" 
  										<?php if ($value->activation_user == "1"){echo "checked";} ?> onchange="activateUser('#DesactAlert<?php echo hash("sha256",$value->id_user,FALSE); ?>','<?php echo $this->session->userdata('id_user');?>','<?php echo $value->id_user ?>','#activation<?php echo hash("sha256",$value->id_user,FALSE); ?>','<?php echo base_url(); ?>')"/>
  										<label for="activation<?php echo hash("sha256",$value->id_user,FALSE); ?>"></label>

  										<div id="DesactAlert<?php echo hash("sha256",$value->id_user,FALSE); ?>" class="reveal-modal" data-reveal aria-labelledby="DesactAlertTitle" aria-hidden="true" role="dialog">
										  <h2 id="DesactAlertTitle"><?php echo lang('Desact_alert_title');?></h2>
										  <p><?php echo lang('Desact_alert_message'); ?></p>
										  <p><a class="alert button" onclick="$('#DesactAlert<?php echo hash("sha256",$value->id_user,FALSE);?>').foundation('reveal', 'close');activationRequest('<?php echo $value->id_user ?>','#activation<?php echo hash("sha256",$value->id_user,FALSE); ?>','<?php echo base_url(); ?>',true);"><?php echo lang('Desact_alert_continue');?></a>
										   <a href="<?php echo site_url("admin_c/display_users");?>" class='close secondary button' onclick="$('#DesactAlert<?php echo hash("sha256",$value->id_user,FALSE);?>').foundation('reveal', 'close');"><?php echo lang('Desact_alert_close');?></a></p>
										</div>
									</div>
								</td>
								<td>
									<a href="#" data-options="is_hover:true" class="button radius secondary tiny fi-wrench" data-dropdown="toolsDrop<?php echo hash("sha256",$value->id_user,FALSE)?>" style="font-size:1.5em;margin:0;padding:13px">&raquo;</a>
						  			<ul id="toolsDrop<?php echo hash("sha256",$value->id_user,FALSE)?>" class="[tiny content] f-dropdown" data-dropdown-content > 
						  				<li><a href="<?php echo site_url("admin_c/alterUser")."/".$value->id_user; ?>" style="margin:0" ><i class="fi-clipboard-pencil" style="font-size:1.2em"></i> <?php echo lang('update_label');?></a></li>
						  				<li><a href="" data-reveal-id="delAlert<?php echo hash("sha256",$value->id_user,FALSE); ?>" style="margin:0"><i class="fi-trash" style="font-size:1.2em"></i> <?php echo lang('delete_label');?></a></li>
						  			</ul>	

							  		<div id="delAlert<?php echo hash("sha256",$value->id_user,FALSE); ?>" class="reveal-modal" data-reveal aria-labelledby="delAlertTitle" aria-hidden="true" role="dialog">
									  <h2 id="delAlertTitle"><?php echo lang('del_alert_title');?></h2>
									  <p><?php echo lang('del_alert_message'); ?></p>
									  <p><a href="<?php echo site_url("admin_c/delUser")."/".$value->id_user; ?>" class="alert button" onclick="$('#delAlert').foundation('reveal', 'close');"><?php echo lang('del_alert_continue');?></a>
									   <a class='close secondary button' onclick="$('#delAlert<?php echo hash("sha256",$value->id_user,FALSE); ?>').foundation('reveal', 'close');"><?php echo lang('del_alert_close');?></a></p>
									</div>
								</td>

							</tr>

						<?php endforeach; ?>
					<?php endif; ?>
				</tbody>
			</table>

			<div class="row">
				<div id="noMatch" class="small-3 small-offset-5 columns" style="display:none;"><?= lang('no_match');?></div>
			</div>
</div>



<div class="panel small-2 columns" style="margin-bottom:0;border:none;">
	<div class="row">
		<a href="<?php echo site_url("admin_c/createUser")?>" class="button radius small-12" onclick="$('#delAlert').foundation('reveal', 'close');"><?php echo lang('add_user_label');?></a>
	</div>
	<div class="row">
		<div class="row collapse postfix-round">

	        <div class="small-12 columns">
	          <input type="text" data-ng-model="search" placeholder="<?php echo lang('search_label');?>">
	        </div>
	        <!--<div class="small-3 columns">
	          <a href="#" class="button postfix">Go</a>
	    	</div>-->
    	</div>
	</div>
</div>


	