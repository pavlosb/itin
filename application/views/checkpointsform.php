<div class="container">
<div class="row justify-content-center">
  <div class="col-sm-8 col-lg-6">
<h1 class="display-4">Νέo Σημείο Ελέγχου</h1>
<p class="lead"></p>
</div>
</div>
<div class="row justify-content-center">
<div class="col-sm-8 col-lg-6">
<?php echo form_open("admin/checkpoint_save");?>
<div class="form-group">
    <label for="name_cp">Checkpoint Name</label>
    <input type="text" class="form-control" id="name_cp" name ="name_cp">
    </div>
  <div class="form-group">
    <label for="printtext_cp">Checkpoint Name in report</label>
    <input type="text" class="form-control" id="printtext_cp" name ="printtext_cp">
  </div>
  <div class="form-group">
    <label for="helptext_cp">Checkpoint Help Text</label>
    <input type="text" class="form-control" id="helptext_cp" name ="helptext_cp">
  </div>
  <div class="form-group">
    <label for="points_cp">Points</label>
    <input type="number" class="form-control" id="points_cp" name ="points_cp">
  </div>
  <div class="form-group">
    <label for="sect_cp">Section</label>
    <select class="form-control" id="sect_cp" name="sect_cp">
      <option value = 0></option>
      <?php foreach ($sections as $section) : ?>
      <option value="<?= $section['id_section'] ?>"><?= $section['name_section'] ?></option>
<?php endforeach; ?>
    </select>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
<?php echo form_close();?>
</div>
</div>
</div>