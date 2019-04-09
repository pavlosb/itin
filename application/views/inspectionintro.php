<div class="container">
<div class="row justify-content-center">
  <div class="col-sm-8 col-lg-6">
<h1 class="display-4">Νέα Επιθεώρηση</h1>
<p class="lead"></p>
</div>
</div>
<div class="row justify-content-center">
<div class="col-sm-8 col-lg-6">
<?php echo form_open("inspection/inspection_add");?>


<div class="form-group">
    <label for="client_vhcl">Όχημα</label>
    <select class="form-control form-control-lg" id="vehicle_inspection" name="vehicle_inspection">
      <option value = 0></option>
      <?php foreach ($vehicles as $vh) : ?>
      <option value="<?= $vh->id_vhcl ?>"><?= $vh->reg_vhcl ?> | <?= $vh->make_vhcl ?> <?= $vh->model_vhcl ?></option>
<?php endforeach; ?>
    </select>
  </div>

    <div class="form-group col">
        <label for="number_inspection">Αριθμός </label>
        <input type="text" class="form-control form-control-lg" id="number_inspection" name ="number_inspection">
    </div>
    <div class="form-group col">
    <label for="date_inspection">Ημερομηνία</label>
      <div class="input-group mb-3 date" id="datetimepicker12" data-target-input="nearest">
        <input type="text" class="form-control form-control-lg datetimepicker-input" id="date_inspection" name ="date_inspection" data-target="#datetimepicker12">
          <div class="input-group-append" data-target="#datetimepicker12" data-toggle="datetimepicker">
            <span class="input-group-text" id="basic-addon2"><i class="fal fa-calendar-alt"></i></span>
          </div>
      </div>
  </div>
  
   <button type="submit" class="btn btn-primary">Continue</button>
<?php echo form_close();?>
</div>
</div>
</div>
<script type="text/javascript">
        $(function () {
            $('#datetimepicker12').datetimepicker({
                    format: 'YYYY-MM-DD'
            });
        });
    </script>