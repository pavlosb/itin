<div class="container">
<div class="row justify-content-center">
  <div class="col-12">
<!--<h1 class="display-4">Νέo Σημείο Ελέγχου</h1> -->
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
<h3><?= $cp['mainsect']; ?></h3>
<?php } 
if ($cp['name_section'] != $scp) { ?>
<div class="row">
 <legend class="col-form-label col-form-label-lg col-sm-12"><?= $cp['name_section']; ?></legend>
</div>
<?php } ?>

<div class="form-group row">
    <label for="inputEmail3" class="col-sm-6 col-form-label "><?= $cp['name_cp']; ?></label>
    <div class="col-sm-6">
    <div class="btn-group btn-group-toggle" data-toggle="buttons">
  <label class="btn btnnok btn-secondary">
    <input type="radio" name="checkpoint[<?= $cp['id_cp']; ?>]" id="option1" value="<?= $cp['points_cp']; ?>"  autocomplete="off"><i class="fal fa-times-square"></i>
  </label>
  <label class="btn btnna btn-secondary active">
    <input type="radio" name="checkpoint[<?= $cp['id_cp']; ?>]" id="option2" value="0" autocomplete="off" checked="checked"> <i class="fal fa-stop"></i>
  </label>
  <label class="btn btnok btn-secondary">
    <input type="radio" name="checkpoint[<?= $cp['id_cp']; ?>]" id="option3" value ="<?= $cp['points_cp']; ?>"autocomplete="off"> <i class="fal fa-check-square"></i>
  </label>
</div>
    </div>
  </div>






<!-- <tr><td><?= $cp['name_cp']; ?></td><td class="text-center"><?= $cp['points_cp']; ?></td><td class="text-center"><i class="fal fa-edit"></i></td></tr> -->
<?php
$mcp = $cp['mainsect'];
$scp = $cp['name_section'];
 endforeach ?>



<button type="submit" class="btn btn-primary">Submit</button>
<?php echo form_close();?>
</div>
</div>
</div>
<script>
    $( document ).ready(function() {
    $('input:checkbox').change(function ()
{

      var total = 0;
      $('input:checkbox:checked').each(function(){
       total += isNaN(parseInt($(this).val())) ? 0 : parseInt($(this).val());
      });   
  
     alert(total);

});
});
    </script>