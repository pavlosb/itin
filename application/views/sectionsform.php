<div class="container">
<div class="row justify-content-center">
  <div class="col-sm-8 col-lg-6">
<h1 class="display-4">Νέα Ενότητα</h1>
<p class="lead"></p>
</div>
</div>
<div class="row justify-content-center">
<div class="col-sm-8 col-lg-6">
<?php echo form_open("admin/section_save");?>
<div class="form-group">
    <label for="name_section">Section Name</label>
    <input type="text" class="form-control" id="name_section" name ="name_section">
    </div>
  <div class="form-group">
    <label for="printtext_section">Section Name in report</label>
    <input type="text" class="form-control" id="printtext_section" name ="printtext_section">
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>
  <div class="form-group">
    <label for="exampleFormControlSelect1">Parent Section</label>
    <select class="form-control" id="exampleFormControlSelect1">
      <option></option>
      <?php foreach ($sections as $section) : ?>
      <option value="<?= $section->id_section ?>"><?= $section->name_section ?></option>
<?php endforeach; ?>
    </select>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
<?php echo form_close();?>
</div>
</div>
</div>