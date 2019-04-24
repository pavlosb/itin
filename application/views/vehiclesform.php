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
<div class="form-group">
    <label for="client_vhcl"><?= $this->lang->line('client_vhcl'); ?></label>
    <select class="form-control" id="client_vhcl" name="client_vhcl">
      <option value = ""><?= $this->lang->line('choose'); ?></option>
      <?php foreach ($clients as $client) : ?>
      <option value="<?= $client->id_client ?>"><?= $client->name_client ?></option>
<?php endforeach; ?>
    </select>
  </div>
<div class="form-row">
  <div class="form-group col">
    <label for="reg_vhcl"><?= $this->lang->line('reg_vhcl'); ?></label>
    <input type="text" class="form-control" id="reg_vhcl" name ="reg_vhcl" onKeyUp="elToEn(this.value)" onfocusout="checkifexists(this, 4)">
  </div>
  <div class="form-group col">
    <label for="firstreg_vhcl"><?= $this->lang->line('firstreg_vhcl'); ?></label>
      <div class="input-group mb-3 date" id="datetimepicker11" data-target-input="nearest">
        <input type="text" class="form-control datetimepicker-input" id="firstreg_vhcl" name ="firstreg_vhcl" data-target="#datetimepicker11">
          <div class="input-group-append" data-target="#datetimepicker11" data-toggle="datetimepicker">
            <span class="input-group-text" id="basic-addon2"><i class="fal fa-calendar-alt"></i></span>
          </div>
      </div>
  </div>
</div>
  <div class="form-group">
    <label for="vin_vhcl"><?= $this->lang->line('vin_vhcl'); ?></label>
    <input type="text" class="form-control" id="vin_vhcl" name ="vin_vhcl"  onfocusout="checkifexists(this, 4)">
  </div>
  <div class="form-row">
  <div class="form-group col">
    <label for="mlg_vhcl"><?= $this->lang->line('mlg_vhcl'); ?></label>
    <input type="number" class="form-control" id="mlg_vhcl" name ="mlg_vhcl">
  </div>
  <div class="form-group col">
    <label for="nxtdate_vhcl"><?= $this->lang->line('nxtdate_vhcl'); ?></label>
      <div class="input-group mb-3 date" id="datetimepicker12" data-target-input="nearest">
        <input type="text" class="form-control datetimepicker-input" id="nxtdate_vhcl" name ="nxtdate_vhcl" data-target="#datetimepicker12">
          <div class="input-group-append" data-target="#datetimepicker12" data-toggle="datetimepicker">
            <span class="input-group-text" id="basic-addon2"><i class="fal fa-calendar-alt"></i></span>
          </div>
      </div>
  </div>
</div>
  <div class="form-group">
    <label for="type_vhcl"><?= $this->lang->line('type_vhcl'); ?></label>
    <select class="form-control" id="type_vhcl" name="type_vhcl">
    <option value = ""><?= $this->lang->line('choose'); ?></option>
      <?php foreach ($vhcltypes as $vt) : ?>
      <option value="<?= $vt['nametype'] ?>"><?=  $vt['nametype'] ?></option>
<?php endforeach; ?>
    </select>
    </div>
  <div class="form-group">
    <label for="make_vhcl"><?= $this->lang->line('make_vhcl'); ?></label>
    <select class="form-control" id="make_vhcl" name="make_vhcl">
    <option value = ""><?= $this->lang->line('choose'); ?></option>
      <?php foreach ($carbrands as $cb) : ?>
      <option value="<?= $cb->name_carbrand ?>"><?= $cb->name_carbrand ?></option>
<?php endforeach; ?>
    </select>
  </div>
  <div class="form-group">
    <label for="model_vhcl"><?= $this->lang->line('model_vhcl'); ?></label>
    <input type="text" class="form-control" id="model_vhcl" name ="model_vhcl">
  </div>
  <div class="form-row">
  <div class="form-group col">
    <label for="doors_vhcl"><?= $this->lang->line('doors_vhcl'); ?></label>
    <input type="number" class="form-control" id="doors_vhcl" name ="doors_vhcl" min="2" max="5">
    
  </div>
  <div class="form-group col">
    <label for="colour_vhcl"><?= $this->lang->line('colour_vhcl'); ?></label>
    <input type="text" class="form-control" id="colour_vhcl" name ="colour_vhcl">
    </div></div>
  <div class="form-row">
  <div class="form-group col">
    <label for="displ_vhcl"><?= $this->lang->line('displ_vhcl'); ?></label>
    <div class="input-group mb-3">
    <input type="text" class="form-control" id="displ_vhcl" name ="displ_vhcl">
    <div class="input-group-append">
    <span class="input-group-text" id="basic-addon2">cc</span>
  </div></div>
  </div>
  <div class="form-group col">
    <label for="pow_vhcl"><?= $this->lang->line('pow_vhcl'); ?></label>
    <div class="input-group mb-3">
    <input type="text" class="form-control" id="pow_vhcl" name ="pow_vhcl">
    <div class="input-group-append">
    <span class="input-group-text" id="basic-addon2">kw</span>
  </div></div>
  </div></div>
   <button type="submit" class="btn btn-primary"><?= $this->lang->line('submit'); ?></button>
<?php echo form_close();?>
</div>
</div>
</div>
<script type="text/javascript">
       jQuery(document).ready(function($){
            $('#datetimepicker11').datetimepicker({
                viewMode: 'years',
                format: 'MM/YYYY'
            });
            $('#datetimepicker12').datetimepicker({
                viewMode: 'years',
                format: 'MM/YYYY'
            });
   
            fv = $('#vehicleForm').formValidation({
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

			} else {
      
        			}
	    });
	    }
    
  
}); 
field = null;
.validateField(chkfld)
}

 
  }
    </script>

