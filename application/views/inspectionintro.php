<div class="container">
<div class="row justify-content-center">
  <div class="col-sm-8 col-lg-6">
<h1 class="display-4">Νέα Επιθεώρηση</h1>
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


    <label for="client_vhcl">Όχημα</label>
    <select class="form-control form-control-lg" id="vehicle_inspection" name="vehicle_inspection">
      <option value = ""></option>
      <?php foreach ($vehicles as $vh) : ?>
      <option value="<?= $vh->id_vhcl ?>"><?= $vh->reg_vhcl ?> | <?= $vh->make_vhcl ?> <?= $vh->model_vhcl ?></option>
<?php endforeach; ?>
    </select>

  </div>
<div class="form-row">
    <div class="form-group col">
        <label for="number_inspection">Αριθμός </label>
        <input type="text" class="form-control" id="number_inspection" name ="number_inspection">
    </div>
    <div class="form-group col">
    <label for="date_inspection">Ημερομηνία</label>
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
        <label for="number_inspection">Εντολή</label>
        <input type="text" class="form-control" id="ordermethod_inspection" name ="ordermethod_inspection">
    </div>
    <div class="form-group col">
    <label for="orderdate_inspection">Ημερομηνία Εντολής</label>
      <div class="input-group mb-3 date" id="datetimepicker13" data-target-input="nearest">
        <input type="text" class="form-control datetimepicker-input" id="orderdate_inspection" name ="orderdate_inspection" data-target="#datetimepicker13" value="<?php echo date('Y-m-d'); ?>">
          <div class="input-group-append" data-target="#datetimepicker13" data-toggle="datetimepicker">
            <span class="input-group-text" id="basic-addon2"><i class="fal fa-calendar-alt"></i></span>
          </div>
      </div>
  </div>
</div> 
   <button type="submit" class="btn btn-primary">Συνέχεια</button>
<?php echo form_close();?>
<?php } else {?>
<p class="lead text-center mt5">Δεν υπάρχουν οχήματα προς επιθεώρηση.</p>
<p class="text-center"><a href="<?php echo base_url(); ?>inspection/vehicle_add" class="btn btn-secondary btn-lg"><i class="fal fa-car"></i>Νέο Όχημα</a></p>
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
							message: 'Δεν έχετε επιλέξει Όχημα'
						},
											}
				},
        number_inspection: {
					validators: {
						notEmpty: {
							message: 'Απαιτούμενο πεδίο'
						},
											}
				},
        ordermethod_inspection: {
					validators: {
						notEmpty: {
							message: 'Απαιτούμενο πεδίο'
						},
											}
				},
				
				   
			 
			}
			
		});	


        });
    </script>