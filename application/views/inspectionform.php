<div class="container">
<div class="row justify-content-center">
  <div class="col-12">
<h1 class="display-4">Νέo Σημείο Ελέγχου</h1>
<p class="lead"></p>
</div>
</div>
<div class="row justify-content-center">
<div class="col-12">
<?php echo form_open("inspections/inspection_save");?>
<?php 
$mcp = "";
$scp = "";
foreach ($checkpoints as $cp): 
if ($cp['mainsect'] != $mcp) { ?>
<tr><td colspan="3"><h3><?= $cp['mainsect']; ?></h3></td></tr>
<?php } 
if ($cp['name_section'] != $scp) { ?>
<tr><td colspan="3"><h4><?= $cp['name_section']; ?></h4></td></tr>
<div class="form-group row">
    <label for="inputEmail3" class="col-sm-8 col-form-label"><?= $cp['name_cp']; ?></label>
    <div class="col-sm-6">
    <div class="btn-group btn-group-toggle" data-toggle="buttons">
  <label class="btn btn-secondary active">
    <input type="radio" name="options" id="option1" autocomplete="off" checked> Active
  </label>
  <label class="btn btn-secondary">
    <input type="radio" name="options" id="option2" autocomplete="off"> Radio
  </label>
  <label class="btn btn-secondary">
    <input type="radio" name="options" id="option3" autocomplete="off"> Radio
  </label>
</div>
    </div>
  </div>




<tr><th>Σημείο</th><th class="text-center">Βαθμολογία</th><th></th></tr>
<?php } ?>
<tr><td><?= $cp['name_cp']; ?></td><td class="text-center"><?= $cp['points_cp']; ?></td><td class="text-center"><i class="fal fa-edit"></i></td></tr>
<?php
$mcp = $cp['mainsect'];
$scp = $cp['name_section'];
 endforeach ?>
</table>


<button type="submit" class="btn btn-primary">Submit</button>
<?php echo form_close();?>
</div>
</div>
</div>