<?php
$client_vhcl = "";
$reg_vhcl = "";
$firstreg_vhcl = "";
$vin_vhcl = "";
$mlg_vhcl = "";
$nxtdate_vhcl = "";
$type_vhcl = "";
$make_vhcl = "";
$model_vhcl = "";
$doors_vhcl = "";
$colour_vhcl = "";
$displ_vhcl = "";
$pow_vhcl = "";
if (isset($vhcldata)) {
  $id_vhcl = $vhcldata[0]->id_vhcl;
  $client_vhcl = $vhcldata[0]->client_vhcl;
  $reg_vhcl = $vhcldata[0]->reg_vhcl;
  $firstreg_vhcl = $vhcldata[0]->firstreg_vhcl;
  $vin_vhcl = $vhcldata[0]->vin_vhcl;
  $mlg_vhcl = $vhcldata[0]->mlg_vhcl;
  $nxtdate_vhcl = $vhcldata[0]->nxtdate_vhcl;
  $type_vhcl = $vhcldata[0]->type_vhcl;
  $make_vhcl = $vhcldata[0]->make_vhcl;
  $model_vhcl = $vhcldata[0]->model_vhcl;
  $doors_vhcl = $vhcldata[0]->doors_vhcl;
  $colour_vhcl = $vhcldata[0]->colour_vhcl;
  $displ_vhcl = $vhcldata[0]->displ_vhcl;
  $pow_vhcl = $vhcldata[0]->pow_vhcl;
  $id_vhcl = $vhcldata[0]->id_vhcl;
	$fueltyp_vhcl = $vhcldata[0]->fueltyp_vhcl;
	$wheeldrive_vhcl = $vhcldata[0]->wheeldrive_vhcl;

}



?>



<div class="container mt-5 mb-5">
<div class="row justify-content-center">
  <div class="col-sm-10 col-lg-6">
<h1 class="display-4"><?= $this->lang->line('vehicle_details'); ?></h1>
<p class="lead"></p>
</div>
</div>
<div class="row justify-content-center">
<div class="col-sm-10 col-lg-6">
<?php 
$attributes = array('id' => 'vehicleForm');
echo form_open("inspection/vehicle_save", $attributes);?>
<?php if (isset($id_vhcl)) {?>
	<input type="hidden" name ="id_vhcl" value ="<?= $id_vhcl ?>">
<?php } ?>
<div class="form-group">
    <label for="client_vhcl"><?= $this->lang->line('client_vhcl'); ?></label>
    <select class="form-control" id="client_vhcl" name="client_vhcl">
      <option value = ""><?= $this->lang->line('choose'); ?></option>
      <?php foreach ($clients as $client) : ?>
      <option value="<?= $client->id_client ?>" <?php if ($client->id_client == $client_vhcl) { echo "SELECTED"; } ?>><?= $client->name_client ?></option>
<?php endforeach; ?>
    </select>
  </div>
<div class="form-row">
  <div class="form-group col">
    <label for="reg_vhcl"><?= $this->lang->line('reg_vhcl'); ?></label>
    <input type="text" class="form-control" id="reg_vhcl" name ="reg_vhcl" value = "<?= $reg_vhcl ?>" onKeyUp="elToEn(this.value)" onfocusout="checkifexists(this, 4)">
  </div>
  <div class="form-group col">
    <label for="firstreg_vhcl"><?= $this->lang->line('firstreg_vhcl'); ?></label>
      <div class="input-group mb-3 date" id="datetimepicker11" data-target-input="nearest">
        <input type="text" class="form-control datetimepicker-input" id="firstreg_vhcl" name ="firstreg_vhcl" value = "<?= date("m/Y", strtotime($firstreg_vhcl)) ?>" data-target="#datetimepicker11">
          <div class="input-group-append" data-target="#datetimepicker11" data-toggle="datetimepicker">
            <span class="input-group-text" id="basic-addon2"><i class="fal fa-calendar-alt"></i></span>
          </div>
      </div>
  </div>
</div>
<div class="form-row">
  <div class="form-group col">
    <label for="vin_vhcl"><?= $this->lang->line('vin_vhcl'); ?></label>
    <input type="text" class="form-control" id="vin_vhcl" name ="vin_vhcl" value = "<?= $vin_vhcl ?>"  onfocusout="checkifexists(this, 15)">
  </div>
	<div class="form-group col">
    <label for="fueltyp_vhcl"><?= $this->lang->line('fuel_vhcl'); ?></label>
      <div class="input-group mb-3">
	<select class="custom-select"  name="fueltyp_vhcl" id="fueltyp_vhcl" >
	<option value = ""><?= $this->lang->line('choose'); ?></option>
    <?php foreach ($fueltypes as $ft) { ?>
			<option value="<?= $ft ?>" <?php if ($ft ==	$fueltyp_vhcl) { echo "SELECTED"; } ?>><?= $this->lang->line($ft); ?></option>
		<?php } ?>
  </select>
          <div class="input-group-append" data-target="#fueltyp_vhcl">
            <span class="input-group-text" id="basic-addon2"><i class="fal fa-gas-pump"></i></span>
          </div>
      </div>
  </div>
	</div>
  <div class="form-row">
  <div class="form-group col">
    <label for="mlg_vhcl"><?= $this->lang->line('mlg_vhcl'); ?></label>
    <input type="number" class="form-control" id="mlg_vhcl" name ="mlg_vhcl" value = "<?= $mlg_vhcl ?>">
  </div>
  <div class="form-group col">
    <label for="wheeldrive_vhcl"><?= $this->lang->line('wheeldrive_vhcl'); ?></label>
  <select class="custom-select"  name="wheeldrive_vhcl" id="wheeldrive_vhcl" >
	<option value = ""><?= $this->lang->line('choose'); ?></option>
    <?php foreach ($wheeldrives as $wd) { ?>
			<option value="<?= $wd ?>" <?php if ($wd ==	$wheeldrive_vhcl) { echo "SELECTED"; } ?>><?= $this->lang->line($wd); ?></option>
		<?php } ?>
  </select>
    
     
  </div>
</div>
  <div class="form-group">
    <label for="type_vhcl"><?= $this->lang->line('type_vhcl'); ?></label>
    <select class="form-control" id="type_vhcl" name="type_vhcl">
    <option value = ""><?= $this->lang->line('choose'); ?></option>
      <?php foreach ($vhcltypes as $vt) : ?>
      <option value="<?= $vt['nametype'] ?>" <?php if ($vt['nametype'] == $type_vhcl) { echo "SELECTED"; } ?>><?=  $vt['nametype'] ?></option>
<?php endforeach; ?>
    </select>
    </div>
  <div class="form-group">
    <label for="make_vhcl"><?= $this->lang->line('make_vhcl'); ?></label>
    <select class="form-control" id="make_vhcl" name="make_vhcl">
    <option value = ""><?= $this->lang->line('choose'); ?></option>
      <?php foreach ($carbrands as $cb) : ?>
      <option value="<?= $cb->name_carbrand ?>" <?php if ($cb->name_carbrand == $make_vhcl) { echo "SELECTED"; } ?>><?= $cb->name_carbrand ?></option>
<?php endforeach; ?>
    </select>
  </div>
  <div class="form-group">
    <label for="model_vhcl"><?= $this->lang->line('model_vhcl'); ?></label>
    <input type="text" class="form-control" id="model_vhcl" name ="model_vhcl" value = "<?= $model_vhcl ?>">
  </div>
  <div class="form-row">
  <div class="form-group col">
    <label for="doors_vhcl"><?= $this->lang->line('doors_vhcl'); ?></label>
    <input type="number" class="form-control" id="doors_vhcl" name ="doors_vhcl" value = "<?= $doors_vhcl ?>" min="2" max="5">
    
  </div>
  <div class="form-group col">
    <label for="colour_vhcl"><?= $this->lang->line('colour_vhcl'); ?></label>
    <input type="text" class="form-control" id="colour_vhcl"  value = "<?= $colour_vhcl ?>" name ="colour_vhcl">
    </div></div>
  <div class="form-row">
  <div class="form-group col">
    <label for="displ_vhcl"><?= $this->lang->line('displ_vhcl'); ?></label>
    <div class="input-group mb-3">
    <input type="text" class="form-control" id="displ_vhcl" name ="displ_vhcl"  value = "<?= $displ_vhcl ?>">
    <div class="input-group-append">
    <span class="input-group-text" id="basic-addon2">cc</span>
  </div></div>
  </div>
  <div class="form-group col">
    <label for="pow_vhcl"><?= $this->lang->line('pow_vhcl'); ?></label>
    <div class="input-group mb-3">
    <input type="text" class="form-control" id="pow_vhcl" name ="pow_vhcl" value = "<?= $pow_vhcl ?>">
    <div class="input-group-append">
    <span class="input-group-text" id="basic-addon2">kw</span>
  </div></div>
  </div></div>
   <button type="submit" class="btn btn-primary" disabled><?= $this->lang->line('submit'); ?></button>
<?php echo form_close();?>
</div>
</div>
</div>
<script type="text/javascript">
       jQuery(document).ready(function($){

       
		$('#vehicleForm').on('input change', function() {
    	$('.btn.btn-primary').attr('disabled', false);
  });

            $('#datetimepicker11').datetimepicker({
                viewMode: 'years',
                format: 'MM/YYYY'
            });
            $('#datetimepicker12').datetimepicker({
                viewMode: 'years',
                format: 'MM/YYYY'
            });
   
          var fv = $('#vehicleForm').formValidation({
			framework: 'bootstrap4',
			icon: false,
			fields: {
				client_vhcl: {
					validators: {
						notEmpty: {
							message: '<?= $this->lang->line('required_field'); ?>'
						},
											}
				},
        reg_vhcl: {
					validators: {
						notEmpty: {
							message: '<?= $this->lang->line('required_field'); ?>'
						},
											}
				},
				firstreg_vhcl: {
					validators: {
						notEmpty: {
							message: '<?= $this->lang->line('required_field'); ?>'
						},
											}
				},
        vin_vhcl: {
					validators: {
						notEmpty: {
							message: '<?= $this->lang->line('required_field'); ?>'
						},
            stringLength: {
                            max: 17,
                            message: '<?= $this->lang->line('incorrect_vin'); ?>',
                            min: 17,
                            message: '<?= $this->lang->line('incorrect_vin'); ?>'
                        }
											}
				},
        mlg_vhcl: {
					validators: {
						notEmpty: {
							message: '<?= $this->lang->line('required_field'); ?>'
						},
											}
				},
				make_vhcl: {
					validators: {
						notEmpty: {
							message: '<?= $this->lang->line('required_field'); ?>'
						},
											}
				},
        fueltyp_vhcl: {
					validators: {
						notEmpty: {
							message: '<?= $this->lang->line('required_field'); ?>'
						},
											}
				},
				wheeldrive_vhcl: {
					validators: {
						notEmpty: {
							message: '<?= $this->lang->line('required_field'); ?>'
						},
											}
				},
        model_vhcl: {
					validators: {
						notEmpty: {
							message: '<?= $this->lang->line('required_field'); ?>'
						},
											}
				},
        doors_vhcl: {
					validators: {
						notEmpty: {
							message: '<?= $this->lang->line('required_field'); ?>'
						},
											}
				},
        colour_vhcl: {
					validators: {
						notEmpty: {
							message: '<?= $this->lang->line('required_field'); ?>'
						},
											}
				},
        displ_vhcl: {
					validators: {
						notEmpty: {
							message: '<?= $this->lang->line('required_field'); ?>'
						},
											}
				},
        pow_vhcl: {
					validators: {
						notEmpty: {
							message: '<?= $this->lang->line('required_field'); ?>'
						},
											}
				},
        type_vhcl: {
					validators: {
						notEmpty: {
							message: '<?= $this->lang->line('required_field'); ?>'
						},
											}
				},
				   
			 
			}
			
		});	


    

	});	

var conversionMap = {Ρ:'P',Β:'B',Ε:'E',Ζ:'Z',Η:'H',Ι:'I',Κ:'K',Μ:'M',Ν:'N',Ο:'O',Τ:'T',Υ:'Y',Χ:'X',Α:'A'};
function elToEn(){
    var field = document.getElementById('reg_vhcl');
    var value = field.value.split('');
    var i = 0, len = value.length;

    for(i;i<len;i++){
        if (conversionMap[value[i]]) {
            value[i] = conversionMap[value[i]];
        }
    }
    field.value = value.join('');
    // prevent memory leak.
    field = null;
}

function checkifexists(fld, len){
		
    var chkval = fld.value;
    var chkfld  = fld.name;

    if (chkval.length > len) {
		$(".memberok").empty();
		$(".nomember").empty();
$.ajax({
    type: "POST",
    dataType: "JSON",
    data: {chk_fld:chkfld, chk_val:chkval},
    url: "checkifexists",
    success: function(data){
    	$.each(data, function(i,item){
			if (item.EXISTS == 'exists'){
			
        fld.value ="";
        fld.placeholder = chkval+"- <?= $this->lang->line('already_exists'); ?>";
        fld.focus();
        $('#vehicleForm').formValidation('revalidateField', chkfld);

			} else {
      
        			}
	    });
	    }
    
  
}); 
}
}
    </script>

