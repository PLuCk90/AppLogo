<?php
	// foreach ($products as $product) {
	//print_r($licences);
	// echo '<br>';}
?>
	<script type="text/javascript" style="display:none;">
    base_url = '<?=base_url();?>';
    all = '<?php print_r(lang("all"));?>';
	</script>
	<script src="<?php echo base_url();?>assets/js/salesforecast.js"></script>


	<div class="panel small-2 medium-2 columns" style="margin-bottom:0;border:solid #C0C0C0 1px;">

			<div class="row">
				<div class="small-12 columns">
						<label><?php echo lang('licence_label');?>
						<select id="licenceDrop" name="licence" onchange="displayLicences('<?php echo $this->session->userdata('id_M3');?>');">
							<option value="all" selected="selected"><?php print_r(lang('all'));?></option>
							<?php foreach($licences  as $licence) :?>

								<option value="<?php print_r($licence['Licence']); ?>">
								<?php print_r($licence['Licence']); ?>
							    </option>
							<?php endforeach; ?>
						</select>
						</label>
				</div>
			</div>

			<div class="row">
				<div class="small-12 columns">
						<label><?php echo lang('theme_label');?>
						<select id="themeDrop" name="theme" onchange="">
							<option value="all" selected="selected"><?php print_r(lang('all'));?></option>
							<?php foreach($themes  as $theme) :?>

									<option value="<?php print_r($theme['Thème']); ?>">
									<?php print_r($theme['Thème']); ?>
								    </option>
								<?php endforeach; ?>
						</select>
						</label>
				</div>
			</div>

			<div class="row">
				<div class="small-12 columns">
						<label><?php echo lang('family_label');?>
						<select id="familyDrop" name="family" onchange="">
						<option value="all" selected="selected"><?php print_r(lang('all'));?></option>
						<?php foreach($families  as $family) :?>

								<option value="<?php print_r($family['Famille']); ?>">
								<?php print_r($family['Famille']); ?>
							    </option>
							<?php endforeach; ?>
						</select>
						</label>
				</div>
			</div>

			<div class="row">
				<div class="small-12 columns">
						<label><?php echo lang('mounting_label');?>
						<select id="mountingDrop" name="mounting" onchange="">
						<option value="all" selected="selected"><?php print_r(lang('all'));?></option>
						<?php foreach($mountings  as $mounting) :?>

								<option value="<?php print_r($mounting['Montage']); ?>">
								<?php print_r($mounting['Montage']); ?>
							    </option>
							<?php endforeach; ?>
						</select>
						</label>
				</div>
			</div>

	</div>

			<!--<table class="medium-12 small-6"	>
				<thead>
					<tr>
						<th><?php echo lang('licence_label');?></th>
						<th><?php echo lang('theme_label');?></th>
						<th><?php echo lang('family_label');?></th>
						<th><?php echo lang('mounting_label');?></th>
						<th><?php echo lang('reference_label');?></th>
						<th><?php echo lang('designation_label');?></th>
						<th><?php echo lang('type_label');?></th>
					</tr>
				</thead>
				<tbody>
					<?php if( $products != NULL): ?>
						<?php foreach ($products as $product):

							if(in_array($product['Licence'],$licence)==TRUE){
								unset($product['Licence']);?>
							<?php
							}
							else
							{
								array_push($licence,$product['Licence']);
							?>
							<tr style="background-color:#B9E3FF;"><td><?php if(isset($product['Licence'])){echo $product['Licence'];} ?></td>
							<td><?= ''; ?></td>
							<td><?= ''; ?></td>
							<td><?= ''; ?></td>
							<td><?= ''; ?></td>
							<td><?= ''; ?></td>
							<td><?= ''; ?></td>
							</tr>

							<?php unset($product['Licence']); }?>
							<tr>
								<td><?php if(isset($product['Licence'])){echo $product['Licence'];} ?></td>
								<td><?= $product['Thème']; ?></td>
								<td><?= $product['Famille']; ?></td>
								<td><?= $product['Montage']; ?></td>
								<td><?= $product['Référence']; ?></td>
								<td><?= $product['Désignation']; ?></td>
								<td><?= $product['Type article']; ?></td>
							</tr>
						<?php endforeach; ?>
					<?php endif; ?>
				</tbody>
			</table>-->

