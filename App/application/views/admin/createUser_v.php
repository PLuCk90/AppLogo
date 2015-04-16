	<?php echo form_open('admin_c/validation_createUser');?>
	<div class="row">
		<fieldset style="border:none;">
		<legend class="fi-torso-business" style="background:transparent;"> <?php echo lang('create_form_header');?></legend>
		<!--<input name="id_user"  type="hidden" value="<?php if(isset($id_user)) echo $id_user; ?>"/>-->

		<label><?php echo lang('lastname_label');?>
		<input name="lastname_user"  type="text"  size="18" 	value="<?= set_value('lastname_user');?>"/>
		<?= form_error('lastname_user');?>    </label>

		<label><?php echo lang('name_label');?>
		<input name="name_user"  type="text"  size="18" 	value="<?= set_value('name_user');?>"/>
		<?= form_error('name_user');?>    </label>

		<label><?php echo lang('mail_label');?>
		<input name="mail_user"  type="text"  size="50" 	value="<?= set_value('mail_user');?>"/>
		<?= form_error('mail_user');?>    </label>

		<label><?php echo lang('phone_label');?>
		<input name="phone_user"  type="text"  size="50" 	value="<?= set_value('phone_user');?>"/>
		<?= form_error('phone_user');?>    </label>

		<label><?php echo lang('lang_label');?>
		<select name="id_lang">
			<option value="other"><?php echo lang('lang_dropdown_header');?></option>
		<?php foreach($languages  as $language) : ?>
			<option value="<?php echo $language->id_language; ?>"
				<?php if(isset($id_language_user)  and $id_language_user==$language->id_language): ?> 
				selected="selected" <?php endif; ?>>
			<?php echo ucfirst ($language->description_language); ?>
		    </option>
		<?php endforeach; ?>
		</select>
		<?php echo form_error('id_lang');?>
		</label>

		<label><?php echo lang('rights_label');?>
		<select name="id_right">
			<!--<option value="other">Sélectionner un type</option>-->
		<?php foreach($rightDropdown  as $key=>$value) : ?>
			<option value="<?php echo $key; ?>"
				<?php if(isset($id_right_user)  and $id_right_user==$key): ?> selected="selected" <?php endif; ?>>
			<?php echo ucfirst ($value); ?>
		    </option>
		<?php endforeach; ?>
		</select>
		<?php echo form_error('id_right');?>
		</label>

		<input type="submit" name="alterUser" class="button radius small" value="<?php echo lang('create_label');?>" />
		<a href="<?php echo site_url('admin_c/display_users'); ?>" class="secondary button radius small"><?php echo lang('del_alert_close');?></a>
			
		</fieldset>	
	</div>

	<div id="creAlert" class="reveal-modal" data-reveal aria-labelledby="creAlertTitle" aria-hidden="true" role="dialog" data-options="close_on_background_click:false">
		  <h2 id="creAlertTitle"><?php echo lang('cre_alert_title');?></h2>
		  <p><?php echo lang('cre_alert_message'); ?></p>
		  <p><a href="<?php echo site_url('admin_c/validation_createUser/1'); ?>" class="alert button" onclick="$('#creAlert').foundation('reveal', 'close');"><?php echo lang('cre_alert_continue');?></a>
		   <a href="<?php echo site_url('admin_c/validation_createUser/0'); ?>" class='close secondary button' onclick="$('#creAlert').foundation('reveal', 'close');"><?php echo lang('cre_alert_close');?></a></p>
	</div>
	<?php echo form_close();?>



	<?php 			
	if(isset($alert) && $alert== '1')
			{
			 echo '<script>alertCreateUser();</script>';
			}
	?>
