<?php
	//  foreach ($products as $product) {
	// print_r($product);
	//  echo '<br>';}
?>
	<style type="text/css"> 


	.appTable{
        border-spacing: 1px 0px; /* Nombre de pixels d'espace horizontal (5px), vertical (8px) */
        background-color:black;
        /*border-radius: 12px;*/
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

	.produit:hover{
		background-color:#E18700;
		cursor:pointer;
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

	.forecast:hover{
		background-color:#C9C9C9;
		cursor:pointer;
	}

	.total{
		background-color:#FFD2E9;
	}

	.totalHead{
		background-color:#FBACF4;
	}
	}

	</style>
	<script type="text/javascript" style="display:none;">
    base_url = '<?=base_url();?>';
    all = '<?php print_r(lang("all"));?>';
    M3_code = '<?php echo $this->session->userdata('id_M3');?>'; 
    mon = '<?php echo $mon;?>'; 
    year = '<?php echo $year;?>'; 
	</script>
	<script src="<?php echo base_url();?>assets/js/salesforecast.js"></script>

	<div id="alert-filter" class="reveal-modal" data-reveal aria-labelledby="FilterTitle" aria-hidden="true" role="dialog">
									  <h2 id="FilterTitle"><?php echo lang('filter_alert_title');?></h2>
									  <p><?php echo lang('filter_alert_message'); ?></p>
									  <p><a class="alert button" onclick="$('#alert-filter').foundation('reveal', 'close');"><?php echo lang('filter_alert_continue');?></a>
	</div>

	<div id="alert-filter2" class="reveal-modal" data-reveal aria-labelledby="FilterTitle2" aria-hidden="true" role="dialog">
									  <h2 id="FilterTitle2"><?php echo lang('filter_alert_title2');?></h2>
									  <p><?php echo lang('filter_alert_message2'); ?></p>
									  <p><a class="alert button" onclick="$('#alert-filter2').foundation('reveal', 'close');"><?php echo lang('filter_alert_continue2');?></a>
	</div>


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

				<div class="small-2 columns">
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

				<div class="small-2 columns">
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

				<div class="small-2 columns left" style="padding-top:1em">
						<input type="submit" class="inline button small radius small-8" value="<?php echo lang('search_label');?>" onclick="updateProducts('<?php echo $this->session->userdata('id_M3');?>');displayTotalForecast();">
				</div>
			</div>

	</div>

	<div  class="panel medium-12 small-6" style="min-height:47em;margin-bottom:0;">
			<table class="appTable medium-12" style="border-top:black 1px solid;border-bottom:black 1px solid;">
				<thead id="tableHead">
				<tr>
						<th rowspan="5"><?php echo lang('products_label');?></th>
					    <th colspan="3" class="month"><?php echo $this->products_m->getLitteralMonth($mon); echo ' '.$year;?></th>
					    <th colspan="3" class="month"><?php echo $this->products_m->getLitteralMonth($mon+1); echo ' '.$year;?></th>
					    <th colspan="3" class="month" ><?php echo $this->products_m->getLitteralMonth($mon+2); echo ' '.$year;?></th>
					    <th colspan="3" class="month" ><?php echo $this->products_m->getLitteralMonth($mon+3); echo ' '.$year;?></th>
				</tr>
				  <tr >
					    
					    <th class="totalHead" ><?php echo lang('objective_label');?></th>
					    <th class="totalHead"><?php echo lang('forecast_label');?></th>
					    <th class="totalHead"><?php echo lang('rest_label');?></th>

					    <th class="totalHead"><?php echo lang('objective_label');?></th>
					    <th class="totalHead"><?php echo lang('forecast_label');?></th>
					    <th class="totalHead"><?php echo lang('rest_label');?></th>

					    <th class="totalHead"><?php echo lang('objective_label');?></th>
					    <th class="totalHead"><?php echo lang('forecast_label');?></th>
					    <th class="totalHead"><?php echo lang('rest_label');?></th>

					    <th class="totalHead"><?php echo lang('objective_label');?></th>
					    <th class="totalHead"><?php echo lang('forecast_label');?></th>
					    <th class="totalHead"><?php echo lang('rest_label');?></th>
				  </tr>

				   <tr >
					    <th class="total"  id="objectiveM1"> - </th>
					    <th class="total"  id="forecastM1"> - </th>
					    <th class="total"  id="restM1"> - </th>


					    <th class="total"  id="objectiveM2"> - </th>
					    <th class="total"  id="forecastM2"> - </th>
					    <th class="total"  id="restM2"> - </th>

					    <th class="total"  id="objectiveM3"> - </th>
					    <th class="total"  id="forecastM3"> - </th>
					    <th class="total"  id="restM3"> - </th>

					    <th class="total"  id="objectiveM4"> - </th>
					    <th class="total"  id="forecastM4"> - </th>
					    <th class="total"  id="restM4"> - </th>
				  </tr>

				  <tr>

					    <th class="option" colspan="2"><?php echo lang('backorder_label');?><br></th>
					    <th class="option"><?php echo lang('forecast_label');?></th>

					    <th class="option" colspan="1"><?php echo lang('backorder_label');?><br></th>
					    <th class="option" colspan="2"><?php echo lang('forecast_label');?></th>

					    <th class="option" colspan="1"><?php echo lang('backorder_label');?><br></th>
					    <th class="option" colspan="2"><?php echo lang('forecast_label');?></th>

					    <th class="option" colspan="1"><?php echo lang('backorder_label');?><br></th>
					    <th class="option" colspan="2" ><?php echo lang('forecast_label');?></th>
				  </tr>
				  <tr>

					    <th class="detail"><?php echo lang('quantity_label');?></th>
						<th class="detail"><?php echo lang('quantity_BO_label');?></th>
					    <th class="option"></th>

					    <th class="detail"><?php echo lang('quantity_label');?></th>
					    <th class="option" colspan="2"></th>

					    <th class="detail"><?php echo lang('quantity_label');?></th>
					    <th class="option" colspan="2"></th>

					    <th class="detail"><?php echo lang('quantity_label');?></th>
					    <th class="option" colspan="2"></th>
				 	</tr>				  
			  	</thead>
			  	<tbody id="body" style="">
			  	</tbody>
			</table>

	</div>

	<script type="text/javascript">
		var $table = $('.appTable');
		$table.floatThead({
			scrollingTop : function(){
				return $('.top-bar').height();
			},
			//useAbsolutePositioning: false,
			autoReflow:true,
		});
	</script>