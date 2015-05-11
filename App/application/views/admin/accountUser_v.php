	<?php echo form_open('admin_c/validation_accountUser'); ?>
	<div class="row">
		<fieldset style="border:none;">
		<legend class="fi-torso-business" style="background:transparent;"> <?php echo lang('update_form_header');?></legend>
		<input name="id_user"  type="hidden" value="<?php if(isset($id_user)) echo $id_user; ?>"/>

		<label><?php echo lang('mail_label');?>
		<input name="mail_user"  type="text"  size="50" 	value="<?= set_value('mail_user',$mail_user);?>"/>
		<?= form_error('mail_user');?>    </label>

		<label><?php echo lang('phone_label');?>
		<input name="phone_user"  type="text"  size="50" 	value="<?= set_value('phone_user',$phone_user);?>"/>
		<?= form_error('phone_user');?>    </label>

		<label><?php echo lang('password_label');?>
		<input name="password_user"  type="password"  size="50" 	value="<?= set_value('password_user');?>"/>
		<?= form_error('password_user');?>    </label>

		<label><?php echo lang('confirm_password_label');?>
		<input name="confirm_password_user"  type="password"  size="50" 	value="<?= set_value('confirm_password_user');?>"/>
		<?= form_error('confirm_password_user');?>    </label>

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

		<input type="submit" name="alterUser" class="button radius small" value="<?php echo lang('update_label');?>" />
		<a href="<?php echo site_url('admin_c/display_admin_main'); ?>" class="secondary button radius small"><?php echo lang('del_alert_close');?></a>
		
			
		</fieldset>	
	</div>
	<?php echo form_close(); ?>

