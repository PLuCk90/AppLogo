<script type="text/javascript" style="display:none;">
    base_url = '<?=base_url();?>';
    all = '<?php print_r(lang("all"));?>';
    M3_code = '<?php echo $this->session->userdata('id_M3');?>'; 
    mon = '<?php echo $mon;?>'; 
    year = '<?php echo $year;?>'; 
</script>

<?php
foreach ($rep as $item) {
	print_r($item);
	print_r('<br>');
};	 
?>

<div class="panel small-12 medium-12 columns" style="margin-bottom:0;border:none;">

			<div class="row">
				<div class="small-2 columns">
						<label><?php echo lang('licence_label');?>
						<select id="licenceDrop" name="licence" onchange="displayThemes('<?php echo $this->session->userdata('id_M3');?>');displayFamilies('<?php echo $this->session->userdata('id_M3');?>');displayMounting('<?php echo $this->session->userdata('id_M3');?>');">
							<option value="all" selected="selected"><?php print_r(lang('all'));?></option>
							<?php foreach($licences  as $licence) :?>

								<option value="<?php print_r($licence['Licence']); ?>">
								<?php print_r($licence['Licence']); ?>
							    </option>
							<?php endforeach; ?>
						</select>
						</label>
				</div>

				<div class="small-2 columns">
						<label><?php echo lang('description_right_label_2');?>
						<select id="SalesPersDrop" name="Salesperson" onchange="">
							<option value="all" selected="selected"><?php print_r(lang('all'));?></option>
							<?php foreach($salespersons  as $saleperson) :?>

									<option value="<?php print_r('rien'); ?>">
									<?php print_r('rien'); ?>
								    </option>
								<?php endforeach; ?>
						</select>
						</label>
				</div>
			</div>
</div>