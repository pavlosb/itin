<div class="container">
<div class="row justify-content-center">
  <div class="col-sm-8 col-lg-6">
<h1 class="display-4">Στοιχεία Οχήματος</h1>
<p class="lead"></p>
</div>
</div>
<div class="row justify-content-center">
<div class="col-sm-8 col-lg-6">
<?php echo form_open("inspection/vehicle_save");?>
<div class="form-group">
    <label for="client_vhcl">Πελάτης</label>
    <select class="form-control" id="client_vhcl" name="client_vhcl">
      <option value = 0></option>
      <?php foreach ($clients as $client) : ?>
      <option value="<?= $client->id_client ?>"><?= $client->name_client ?></option>
<?php endforeach; ?>
    </select>
  </div>
<div class="form-row">
  <div class="form-group col">
    <label for="reg_vhcl">Αριθμός Πινακίδας</label>
    <input type="text" class="form-control" id="reg_vhcl" name ="reg_vhcl">
  </div>
  <div class="form-group col">
    <label for="firstreg_vhcl">1η Κυκλοφορία</label>
      <div class="input-group mb-3 date" id="datetimepicker11" data-target-input="nearest">
        <input type="text" class="form-control datetimepicker-input" id="firstreg_vhcl" name ="firstreg_vhcl" data-target="#datetimepicker11">
          <div class="input-group-append" data-target="#datetimepicker11" data-toggle="datetimepicker">
            <span class="input-group-text" id="basic-addon2"><i class="fal fa-calendar-alt"></i></span>
          </div>
      </div>
  </div>
</div>
  <div class="form-group">
    <label for="vin_vhcl">Αριθμός Πλαισίου</label>
    <input type="text" class="form-control" id="vin_vhcl" name ="vin_vhcl">
  </div>
  <div class="form-row">
  <div class="form-group col">
    <label for="mlg_vhcl">Χιλιόμετρα</label>
    <input type="number" class="form-control" id="mlg_vhcl" name ="mlg_vhcl">
  </div>
  <div class="form-group col">
    <label for="nxtdate_vhcl">Επόμενος Ελέγχος</label>
      <div class="input-group mb-3 date" id="datetimepicker12" data-target-input="nearest">
        <input type="text" class="form-control datetimepicker-input" id="nxtdate_vhcl" name ="nxtdate_vhcl" data-target="#datetimepicker12">
          <div class="input-group-append" data-target="#datetimepicker12" data-toggle="datetimepicker">
            <span class="input-group-text" id="basic-addon2"><i class="fal fa-calendar-alt"></i></span>
          </div>
      </div>
  </div>
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
    <label for="model_vhcl">Μοντέλο</label>
    <input type="text" class="form-control" id="model_vhcl" name ="model_vhcl">
  </div>
  <div class="form-row">
  <div class="form-group col">
    <label for="doors_vhcl">Πόρτες</label>
    <input type="number" class="form-control" id="doors_vhcl" name ="doors_vhcl" min="2" max="5">
    
  </div>
  <div class="form-group col">
    <label for="colour_vhcl">Χρώμα</label>
    <input type="text" class="form-control" id="colour_vhcl" name ="colour_vhcl">
    </div></div>
  <div class="form-row">
  <div class="form-group col">
    <label for="displ_vhcl">Κυβικά</label>
    <div class="input-group mb-3">
    <input type="text" class="form-control" id="displ_vhcl" name ="displ_vhcl">
    <div class="input-group-append">
    <span class="input-group-text" id="basic-addon2">cc</span>
  </div></div>
  </div>
  <div class="form-group col">
    <label for="pow_vhcl">Ιπποδύναμη</label>
    <div class="input-group mb-3">
    <input type="text" class="form-control" id="pow_vhcl" name ="pow_vhcl">
    <div class="input-group-append">
    <span class="input-group-text" id="basic-addon2">kw</span>
  </div></div>
  </div></div>
   <button type="submit" class="btn btn-primary">Submit</button>
<?php echo form_close();?>
</div>
</div>
</div>
<script type="text/javascript">
        $(function () {
            $('#datetimepicker11').datetimepicker({
                viewMode: 'years',
                format: 'MM/YYYY'
            });
            $('#datetimepicker12').datetimepicker({
                viewMode: 'years',
                format: 'MM/YYYY'
            });
        });
    </script>