<div class="container">
<div class="row justify-content-center">
  <div class="col-sm-8 col-lg-6">
<h1 class="display-4">Νέo όχημα</h1>
<p class="lead"></p>
</div>
</div>
<div class="row justify-content-center">
<div class="col-sm-8 col-lg-6">
<?php echo form_open("admin/vehicle_save");?>
<div class="form-group">
    <label for="reg_vhcl">Αριθμός Πινακίδας</label>
    <input type="text" class="form-control" id="reg_vhcl" name ="reg_vhcl">
    </div>
  <div class="form-group">
    <label for="vin_vhcl">Αριθμός Πλαισίου</label>
    <input type="text" class="form-control" id="vin_vhcl" name ="vin_vhcl">
  </div>
  <div class="form-group">
    <label for="type_vhcl">Είδος Οχήματος</label>
    <select class="form-control" id="type_vhcl" name="type_vhcl">
      <option value = 0></option>
      <?php foreach ($vhcltypes as $vt) : ?>
      <option value="<?= $vt['nametype'] ?>"><?=  $vt['nametype'] ?></option>
<?php endforeach; ?>
    </select>
    </div>
  <div class="form-group">
    <label for="make_vhcl">Κατασκευαστής</label>
    <select class="form-control" id="make_vhcl" name="make_vhcl">
      <option value = 0></option>
      <?php foreach ($carbrands as $cb) : ?>
      <option value="<?= $cb->name_carbrand ?>"><?= $cb->name_carbrand ?></option>
<?php endforeach; ?>
    </select>
  </div>
  <div class="form-group">
    <label for="displ_vhcl">Μοντέλο</label>
    <input type="text" class="form-control" id="displ_vhcl" name ="displ_vhcl">
  </div>
  <div class="form-group">
    <label for="displ_vhcl">Κυβικά</label>
    <div class="input-group mb-3">
    <input type="text" class="form-control" id="displ_vhcl" name ="displ_vhcl">
    <div class="input-group-append">
    <span class="input-group-text" id="basic-addon2">cc</span>
  </div></div>
  </div>
  <div class="form-group">
    <label for="displ_vhcl">Ιπποδύναμη</label>
    <div class="input-group mb-3">
    <input type="text" class="form-control" id="displ_vhcl" name ="displ_vhcl">
    <div class="input-group-append">
    <span class="input-group-text" id="basic-addon2">kw</span>
  </div></div>
  </div>
   <button type="submit" class="btn btn-primary">Submit</button>
<?php echo form_close();?>
</div>
</div>
</div>