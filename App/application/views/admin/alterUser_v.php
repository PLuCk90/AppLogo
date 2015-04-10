<div class="panel small-10 small-centered columns" style="height:45em;">
	<form method="post" action="<?php echo site_url('admin_c/validation_AlterUser');?>">
	<div class="row">
		<fieldset>
		<legend><?php echo lang('update_form_header');?></legend>
		<input name="id_user"  type="hidden" value="<?php if(isset($id_user)) echo $id_user; ?>"/>

		<label><?php echo lang('firstname_label');?>
		<input name="firstname_user"  type="text"  size="18" 	value="<?= set_value('firstname_user',$firstname_user);?>"/>
		<?= form_error('firstname_user');?>    </label>

		<label><?php echo lang('name_label');?>
		<input name="name_user"  type="text"  size="18" 	value="<?= set_value('name_user',$name_user);?>"/>
		<?= form_error('name_user');?>    </label>

		<label><?php echo lang('mail_label');?>
		<input name="mail_user"  type="text"  size="50" 	value="<?= set_value('mail_user',$mail_user);?>"/>
		<?= form_error('mail_user');?>    </label>

		<label><?php echo lang('phone_label');?>
		<input name="phone_user"  type="text"  size="50" 	value="<?= set_value('phone_user',$phone_user);?>"/>
		<?= form_error('phone_user');?>    </label>

		<label><?php echo lang('rights_label');?>
		<select name="id_right">
			<!--<option value="other">Sélectionner un type</option>-->
		<?php foreach($rightDropdown  as $key=>$value) : ?>
			<option value="<?php echo $key; ?>" 
				 <?php if(isset($id_right_user)  and $id_right_user==$key): ?> selected="selected" <?php endif; ?> >
			<?php echo $value; ?>
		    </option>
		<?php endforeach; ?>
		</select>
		<?php echo form_error('id_right');?>
		</label>

		<input type="submit" name="alterUser" class="button radius small" value="<?php echo lang('update_label');?>" />
		<a href="<?php echo site_url('admin_c/display_users'); ?>" class="secondary button radius small"><?php echo lang('del_alert_close');?></a>
			
		</fieldset>	
	</div>
	</form>
</div>