<?php //	print_r($this->session->all_userdata()) ;


?>
<div class="panel small-10 columns" style="height:80em;" >
	<div class="row" style="">
			<font>
			<table class="small-12" >
				<caption><?php echo lang('users_table_header');?></caption>
				<thead>
					<tr>
						<th><?php echo lang('online_label');?></th>
						<th><?php echo lang('firstname_label');?></th>
						<th><?php echo lang('name_label');?></th>
						<th><?php echo lang('mail_label');?></th>
						<th><?php echo lang('phone_label');?></th>
						<th><?php echo lang('language_label');?></th>
						<th><?php echo lang('rights_label');?></th>
						<th><?php echo lang('active_label');?></th>
						<th><?php echo lang('operations_label');?></th>
					</tr>
				</thead>
				<tbody>
					<?php if( $users != NULL): ?>
						<?php foreach ($users as $value): ?>
							<tr>
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
								<td><?php echo $value->firstname_user; ?></td>
								<td><?= $value->name_user; ?></td>
								<td><?= $value->mail_user; ?></td>
								<td><?= $value->phone_user; ?></td>
								<td> 
									<a href="#" data-options="is_hover:true" class="tiny" data-dropdown="langDrop<?php echo hash("sha256",$value->id_user,FALSE)?>" style="font-size:1.5em;margin:0;padding:13px">
									<?php 
									if(isset($value->description_language)){print_r("<img height=\"12.5em\" width=\"12.5em\" src=\"".base_url()."/assets/img/flags/".$value->description_language.".png\" alt =\"".$value->description_language."\">");}
									?>
									&raquo;</a>
									<ul id="langDrop<?php echo hash("sha256",$value->id_user,FALSE)?>" class="[tiny content] f-dropdown" data-dropdown-content >
										<?php foreach($languages  as $language) : ?>
										<li>
											<a href="<?php echo site_url("admin_c/changeLanguage")."/".$value->id_user."/".$language->id_language."/".$language->description_language;; ?>" style="margin:0" >
												<img height="8%" width="8%" src="<?php echo base_url();?>/assets/img/flags/<?php echo $language->description_language;?>.png" alt ="<?php echo $language->description_language; ?>">
												<?php echo ucfirst ($language->description_language);?>
											</a>
										</li>
										<?php endforeach; ?>
						  			</ul>
								</td>
								<td><?= $value->description_right; ?></td>
								<td>
									<div class="switch round">
  										<input id="<?php echo hash("sha256",$value->mail_user,FALSE); ?>" type="checkbox">
  										<label for="<?php echo hash("sha256",$value->mail_user,FALSE); ?>"></label>
									</div>
								</td>
								<td>
									<a href="#" data-options="is_hover:true" class="button radius secondary tiny fi-wrench" data-dropdown="toolsDrop<?php echo hash("sha256",$value->id_user,FALSE)?>" style="font-size:1.5em;margin:0;padding:13px">&raquo;</a>
						  			<ul id="toolsDrop<?php echo hash("sha256",$value->id_user,FALSE)?>" class="[tiny content] f-dropdown" data-dropdown-content > 
						  				<li><a href="<?php echo site_url("admin_c/alterUser")."/".$value->id_user; ?>" style="margin:0" ><i class="fi-clipboard-pencil" style="font-size:1.2em"></i> <?php echo lang('update_label');?></a></li>
						  				<li><a href="" data-reveal-id="delAlert" style="margin:0"><i class="fi-trash" style="font-size:1.2em"></i> <?php echo lang('delete_label');?></a></li>
						  			</ul>	
								</td>
							</tr>
						<?php endforeach; ?>
					<?php endif; ?>
				<tbody>
			</table>
	</div>
	<div id="delAlert" class="reveal-modal" data-reveal aria-labelledby="delAlertTitle" aria-hidden="true" role="dialog">
	  <h2 id="delAlertTitle"><?php echo lang('del_alert_title');?></h2>
	  <p><?php echo lang('del_alert_message'); ?></p>
	  <p><a href="<?php echo site_url("admin_c/delUser")."/".$value->id_user; ?>" class="alert button" onclick="$('#delAlert').foundation('reveal', 'close');"><?php echo lang('del_alert_continue');?></a>
	   <a class='close secondary button' onclick="$('#delAlert').foundation('reveal', 'close');"><?php echo lang('del_alert_close');?></a></p>
	</div>
</div>

<div class="panel small-2 columns" style="height:80em;">
	<div class="row">
		<a href="<?php echo site_url("admin_c/addUser")."/".$value->id_user; ?>" class="button radius small-12" onclick="$('#delAlert').foundation('reveal', 'close');"><?php echo lang('add_user_label');?></a>
	</div>
	<div class="row">
		<div class="row collapse postfix-round">
	        <div class="small-9 columns">
	          <input type="text" placeholder="<?php echo lang('search_label');?>">
	        </div>
	        <div class="small-3 columns">
	          <a href="#" class="button postfix">Go</a>
	    	</div>
    	</div>
	</div>
</div>




	