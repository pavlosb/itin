<div class="container mt-5">
<div class="row justify-content-center">
  <div class="col-sm-10 col-lg-8">
<h1 class="display-4"><?= $this->lang->line('new_inspection'); ?></h1>
<p class="lead"></p>
</div>
</div>
<div class="row justify-content-center">
<div class="col-sm-8 col-lg-6">
<?php if ($vehicles != null) { ?>
<?php
$attributes = array('id' => 'inspectionIntroForm');
 echo form_open("inspection/inspection_add", $attributes);?>


<div class="form-group mb-5">


    <label for="vehicle_inspection"><?= $this->lang->line('vehicle_inspection'); ?></label>
    <select class="form-control form-control-lg" id="vehicle_inspection" name="vehicle_inspection">
      <option value = ""></option>
      <?php foreach ($vehicles as $vh) : ?>
      <option value="<?= $vh->id_vhcl ?>"><?= $vh->reg_vhcl ?> | <?= $vh->make_vhcl ?> <?= $vh->model_vhcl ?></option>
<?php endforeach; ?>
    </select>

  </div>
<div class="form-row">
    <div class="form-group col">
        <label for="number_inspection"><?= $this->lang->line('number_inspection'); ?></label>
        <input type="text" class="form-control" id="number_inspection" name ="number_inspection">
        <small class="form-text text-primary"><?= $this->lang->line('leave_empty'); ?></small>
    </div>
    <div class="form-group col">
    <label for="date_inspection"><?= $this->lang->line('date_inspection'); ?></label>
      <div class="input-group mb-3 date" id="datetimepicker12" data-target-input="nearest">
        <input type="text" class="form-control datetimepicker-input" id="date_inspection" name ="date_inspection" data-target="#datetimepicker12" value="<?php echo date('Y-m-d'); ?>">
          <div class="input-group-append" data-target="#datetimepicker12" data-toggle="datetimepicker">
            <span class="input-group-text" id="basic-addon2"><i class="fal fa-calendar-alt"></i></span>
          </div>
      </div>
  </div>
</div> 
<div class="form-row">
    <div class="form-group col">
        <label for="ordermethod_inspection"><?= $this->lang->line('ordermethod_inspection'); ?></label>
        <input type="text" class="form-control" id="ordermethod_inspection" name ="ordermethod_inspection">
    </div>
    <div class="form-group col">
    <label for="orderdate_inspection"><?= $this->lang->line('orderdate_inspection'); ?></label>
      <div class="input-group mb-3 date" id="datetimepicker13" data-target-input="nearest">
        <input type="text" class="form-control datetimepicker-input" id="orderdate_inspection" name ="orderdate_inspection" data-target="#datetimepicker13" value="<?php echo date('Y-m-d'); ?>">
          <div class="input-group-append" data-target="#datetimepicker13" data-toggle="datetimepicker">
            <span class="input-group-text" id="basic-addon2"><i class="fal fa-calendar-alt"></i></span>
          </div>
      </div>
  </div>
</div> 
   <button type="submit" class="btn btn-primary"><?= $this->lang->line('continue'); ?></button>
<?php echo form_close();?>
<?php } else {?>
<p class="lead text-center text-warning mt-5"><?= $this->lang->line('no_vehicles_for_inspection'); ?></p>
<p class="text-center"><a href="<?php echo base_url(); ?>inspection/vehicle_add" class="btn btn-primary btn-lg"><i class="fal fa-car"></i> <?= $this->lang->line('add_new_vehicle'); ?></a></p>
  <?php }?>

</div>
</div>
</div>
<script type="text/javascript">
        jQuery(document).ready(function($) {
            $('#datetimepicker12').datetimepicker({
                    format: 'YYYY-MM-DD'
            });
            $('#datetimepicker13').datetimepicker({
                    format: 'YYYY-MM-DD'
            });
            $('#inspectionIntroForm').formValidation({
			framework: 'bootstrap4',
			icon: false,
			fields: {
				vehicle_inspection: {
					validators: {
						notEmpty: {
							message: '<?= $this->lang->line('no_vehicle_chosen'); ?>'
						},
											}
				},
        ordermethod_inspection: {
					validators: {
						notEmpty: {
							message: '<?= $this->lang->line('required_field'); ?>'
						},
											}
				},
				
				   
			 
			}
			
		});	


        });
    </script>