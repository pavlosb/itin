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

    <div class="form-group">
        <label for="name_client">Αριθμός </label>
        <input type="text" class="form-control form-control-lg" id="name_client" name ="name_client">
    </div>
    
  
   <button type="submit" class="btn btn-primary">Continue</button>
<?php echo form_close();?>
</div>
</div>
</div>