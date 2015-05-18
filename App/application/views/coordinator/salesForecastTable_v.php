<?php
	//  foreach ($products as $product) {
	// print_r($product);
	//  echo '<br>';}
?>
	<style type="text/css"> 


	.appTable{
        border-spacing: 1px 0px; /* Nombre de pixels d'espace horizontal (5px), vertical (8px) */
        background-color:black;
        border-radius: 12px;
        overflow:hidden;
	}

	.appTable th{
		text-align:center;
		padding:3px;
	}

	.appTable td{
		text-align:center;
	}

	.month{
		background-color: #687EA1;
		color:white	;
	}

	.option{
		background-color: #C5CFDF;
	}

	.detail{
		background-color: #EBEFF5;
	}

	.produit{
		background-color: orange;
	}

	.column1{
		background-color:#DCDDDE;
	}

	.column2{
		background-color:#BABDC1;
		margin-bottom:0;
	}

	.top-strong{
		border-top: 1px solid black;
	}
	.top-light{
		border-top: 1px solid grey;
	}
	}

	</style>
	<script type="text/javascript" style="display:none;">
    base_url = '<?=base_url();?>';
    all = '<?php print_r(lang("all"));?>';
	</script>
	<script src="<?php echo base_url();?>assets/js/salesforecast.js"></script>


	<div class="panel small-12 medium-12 columns" style="margin-bottom:0;border:none">

			<div class="row">
				<div class="small-3 columns">
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

				<div class="small-3 columns">
						<label><?php echo lang('theme_label');?>
						<select id="themeDrop" name="theme" onchange="displayLicences('<?php echo $this->session->userdata('id_M3');?>');displayFamilies('<?php echo $this->session->userdata('id_M3');?>');displayMounting('<?php echo $this->session->userdata('id_M3');?>');">
							<option value="all" selected="selected"><?php print_r(lang('all'));?></option>
							<?php foreach($themes  as $theme) :?>

									<option value="<?php print_r($theme['Thème']); ?>">
									<?php print_r($theme['Thème']); ?>
								    </option>
								<?php endforeach; ?>
						</select>
						</label>
				</div>

				<div class="small-3 columns">
						<label><?php echo lang('family_label');?>
						<select id="familyDrop" name="family" onchange="displayThemes('<?php echo $this->session->userdata('id_M3');?>');displayLicences('<?php echo $this->session->userdata('id_M3');?>');displayMounting('<?php echo $this->session->userdata('id_M3');?>');">
						<option value="all" selected="selected"><?php print_r(lang('all'));?></option>
						<?php foreach($families  as $family) :?>

								<option value="<?php print_r($family['Famille']); ?>">
								<?php print_r($family['Famille']); ?>
							    </option>
							<?php endforeach; ?>
						</select>
						</label>
				</div>

				<div class="small-3 columns">
						<label><?php echo lang('mounting_label');?>
						<select id="mountingDrop" name="mounting" onchange="displayThemes('<?php echo $this->session->userdata('id_M3');?>');displayFamilies('<?php echo $this->session->userdata('id_M3');?>');displayLicences('<?php echo $this->session->userdata('id_M3');?>');">
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

	<div  class="panel medium-12 small-6">
			<table class="appTable medium-12" style="border-top:black 1px solid;border-bottom:black 1px solid">
				<thead>
				  <tr >
					    <th class="hiddenPart" rowspan="3"></th>
					    <th colspan="6" class="month">Maintenant</th>
					    <th colspan="6" class="month">Mois+1</th>
					    <th colspan="6" class="month" >Mois+2</th>
				  </tr>
				  <tr>

					    <th class="option">Objectif<br></th>
					    <th class="option" colspan="3">Backorder<br></th>
					    <th class="option">Reste à faire<br></th>
					    <th class="option">Prévisions</th>

					    <th class="option">Objectif<br></th>
					    <th class="option" colspan="3">Backorder<br></th>
					    <th class="option">Reste à faire<br></th>
					    <th class="option">Prévisions</th>

					    <th class="option">Objectif<br></th>
					    <th class="option" colspan="3">Backorder<br></th>
					    <th class="option">Reste à faire<br></th>
					    <th class="option">Prévisions</th>
				  </tr>
				  <tr>
					    <th class="detail"></th>
					    <th class="detail"><?php echo lang('quantity_label');?></th>
						<th class="detail"><?php echo lang('quantity_BO_label');?></th>
						<th class="detail"><?php echo lang('delivery_label');?></th>
					    <th class="detail"></th>
					    <th class="detail"></th>

					    <th class="detail"></th>
					    <th class="detail"><?php echo lang('quantity_label');?></th>
						<th class="detail"><?php echo lang('quantity_BO_label');?></th>
						<th class="detail"><?php echo lang('delivery_label');?></th>
					    <th class="detail"></th>
					    <th class="detail"></th>

					    <th class="detail"></th>
					    <th class="detail"><?php echo lang('quantity_label');?></th>
						<th class="detail"><?php echo lang('quantity_BO_label');?></th>
						<th class="detail"><?php echo lang('delivery_label');?></th>
					    <th class="detail"></th>
					    <th class="detail"></th>
				 	</tr>				  
			  	</thead>
			  	<tbody>
			  		<tr style="display:none;"></tr>
				  	<tr>
					    <td class="produit top-strong">produit 1</td>
					    <td class="column2 top-strong">Rien</td>
					    <td class="column1 top-strong">3</td>
					    <td class="column2 top-strong">4</td>
					    <td class="column1 top-strong">5</td>
					    <td class="column2 top-strong">rien</td>
					    <td class="column1 top-strong">rien</td>

					    <td class="column2 top-strong">rien</td>
					    <td class="column1 top-strong">rien</td>
					    <td class="column2 top-strong">rien</td>
					    <td class="column1 top-strong">rien</td>
					    <td class="column2 top-strong">rien</td>
					    <td class="column1 top-strong">rien</td>

					    <td class="column2 top-strong">rien</td>
					    <td class="column1 top-strong">rien</td>
					    <td class="column2 top-strong">rien</td>
					    <td class="column1 top-strong">rien</td>
					    <td class="column2 top-strong">rien</td>
					    <td class="column1 top-strong">rien</td>
					    <td style="display:none"></td>
					 </tr>

					 <tr style="display:none;"></tr>
					 <tr>
					    <td class="produit">produit 2</td>
					    <td class="column2"></td>
					    <td class="column1">3</td>
					    <td class="column2">4</td>
					    <td class="column1">5</td>
					    <td class="column2">rien</td>
					    <td class="column1">rien</td>

					    <td class="column2">rien</td>
					    <td class="column1">rien</td>
					    <td class="column2">rien</td>
					    <td class="column1">rien</td>
					    <td class="column2">rien</td>
					    <td class="column1">rien</td>

					    <td class="column2">rien</td>
					    <td class="column1">rien</td>
					    <td class="column2">rien</td>
					    <td class="column1">rien</td>
					    <td class="column2">rien</td>
					    <td class="column1">rien</td>
					    <td style="display:none"></td>
					 </tr>	

					 <tr style="display:none;"></tr>
					 <tr>
					    <td class="produit">produit 3</td>
					    <td class="column2"></td>
					    <td class="column1">3</td>
					    <td class="column2">4</td>
					    <td class="column1">5</td>
					    <td class="column2">rien</td>
					    <td class="column1">rien</td>

					    <td class="column2">rien</td>
					    <td class="column1">rien</td>
					    <td class="column2">rien</td>
					    <td class="column1">rien</td>
					    <td class="column2">rien</td>
					    <td class="column1">rien</td>

					    <td class="column2">rien</td>
					    <td class="column1">rien</td>
					    <td class="column2">rien</td>
					    <td class="column1">rien</td>
					    <td class="column2">rien</td>
					    <td class="column1">rien</td>
					    <td style="display:none"></td>
					 </tr>	

					 <tr style="display:none;"></tr>
					 <tr>
					    <td class="produit">produit 4</td>
					    <td class="column2"></td>
					    <td class="column1">3</td>
					    <td class="column2">4</td>
					    <td class="column1">5</td>
					    <td class="column2">rien</td>
					    <td class="column1">rien</td>

					    <td class="column2">rien</td>
					    <td class="column1">rien</td>
					    <td class="column2">rien</td>
					    <td class="column1">rien</td>
					    <td class="column2">rien</td>
					    <td class="column1">rien</td>

					    <td class="column2">rien</td>
					    <td class="column1">rien</td>
					    <td class="column2">rien</td>
					    <td class="column1">rien</td>
					    <td class="column2">rien</td>
					    <td class="column1">rien</td>
					    <td style="display:none" ></td>
					 </tr>	
			  	</tbody>
			</table>

	</div>
