<div class="container mt-5">
<div class="row justify-content-center">
      <div class="col-lg-8 p-3 bg-light">
      <p class="lead"><i class="fal fa-clipboard-check"></i> <?php echo $inspection->number_inspection; ?></p>
      <p class="lead"><i class="fal fa-car"></i> <?php echo $inspection->reg_vhcl; ?> <?php echo $inspection->make_vhcl; ?> <?php echo $inspection->model_vhcl; ?></p>
      <p class="lead"><i class="fal fa-user-tie"></i> <?php echo $inspection->name_client; ?></p>
      </div>
</div>


<div id="gauge-wrapper" style="position: fixed; top:300px; left:0px;" class="d-md-none d-lg-block">
      <canvas id="cnvgauge" width = "300px" height="200px"></canvas>
</div>

<div class="container mt-2">

    <div class="row justify-content-center">
      <div class="col-lg-8">
<!--<h1 class="display-4">Νέo Σημείο Ελέγχου</h1> -->
        <p class="lead"></p>
      </div>
    </div>
    <div class="row justify-content-center">
      <div class="col-lg-8">
        <?php echo form_open("inspection/inspection_save");?>
        <input type="hidden" name="inspectionid_insres" value = "<?= $inspectionid ?> ">
        <?php 
          $mcp = "";
          $scp = "";
          foreach ($checkpoints as $cp): 
            if ($cp['mainsect'] != $mcp) 
            {?>
              <h3><?= $cp['mainsect']; ?></h3>
      <?php } 
if ($cp['name_section'] != $scp) { ?>
<div class="row">
 <legend class="col-form-label col-form-label-lg col-sm-12"><?= $cp['name_section']; ?></legend>
</div>
<?php } ?>

<div class="form-group row py-3">
    <label for="inputEmail3" class="col-sm-7 col-form-label "><?= $cp['name_cp']; ?><small class="form-text text-muted"><?= $cp['helptext_cp']; ?></small></label>
    <div class="col-sm-5 text-center text-sm-right">
    <div class="btn-group btn-group-toggle " data-toggle="buttons">
  <label class="btn btnnok btn-secondary <?php if (isset($inspscore) && $inspscore[$cp['id_cp']] == -1) { echo "active"; } ?>">
    <input type="radio" class="do-not-calc" name="checkpoint[<?= $cp['id_cp']; ?>]" id="option1" value="-1" <?php if (isset($inspscore) && $inspscore[$cp['id_cp']] == -1) { echo "checked"; } ?> autocomplete="off"><i class="fal fa-times-square"></i>
  </label>
  <label class="btn btnna btn-secondary <?php if (!isset($inspscore) || (isset($inspscore) && $inspscore[$cp['id_cp']] == 0)) { echo "active"; } ?>">
    <input type="radio" name="checkpoint[<?= $cp['id_cp']; ?>]" id="option2" value="0" autocomplete="off" <?php if (!isset($inspscore) || (isset($inspscore) && $inspscore[$cp['id_cp']] == 0)) { echo "checked"; } ?>> <i class="fal fa-stop"></i>
  </label>
  <label class="btn btnok btn-secondary <?php if (isset($inspscore) && $inspscore[$cp['id_cp']] == $cp['points_cp']) { echo "active"; } ?>">
    <input type="radio" name="checkpoint[<?= $cp['id_cp']; ?>]" id="option3" <?php if (isset($inspscore) && $inspscore[$cp['id_cp']] == $cp['points_cp']) { echo "checked"; } ?> value ="<?= $cp['points_cp']; ?>"autocomplete="off"> <i class="fal fa-check-square"></i>
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
jQuery(document).ready(function($) {

     $('input:radio').change(function ()
{

      var total = 0;
      $('input:radio:checked').each(function(){
        if (!$(this).hasClass('do-not-calc')) {
       total += isNaN(parseInt($(this).val())) ? 0 : parseInt($(this).val());
        }
      });   
  
     gauge.set(total);
     AnimationUpdater.run();

});

var opts = {
  angle: 0, // The span of the gauge arc
  lineWidth: 0.2, // The line thickness
  radiusScale: 0.78, // Relative radius
  pointer: {
    length: 0.41, // // Relative to gauge radius
    strokeWidth: 0.035, // The thickness
    color: '#000000' // Fill color
  },
  limitMax: false,     // If false, max value increases automatically if value > maxValue
  limitMin: false,     // If true, the min value of the gauge will be fixed
  colorStart: '#6FADCF',   // Colors
  colorStop: '#8FC0DA',    // just experiment with them
  strokeColor: '#E0E0E0',  // to see which ones work best for you
  generateGradient: true,
  highDpiSupport: true,     // High resolution support
  
};
var target = document.getElementById('cnvgauge'); // your canvas element
var gauge = new Gauge(target).setOptions(opts); // create sexy gauge!
gauge.maxValue = 190; // set max gauge value
gauge.setMinValue(0);  // Prefer setter over gauge.minValue = 0
gauge.animationSpeed = 32; // set animation speed (32 is default value)
gauge.set(0); // set actual value



var total = 0;
      $('input:radio:checked').each(function(){
        if (!$(this).hasClass('do-not-calc')) {
       total += isNaN(parseInt($(this).val())) ? 0 : parseInt($(this).val());
        }
      });   
  
     gauge.set(total);
     AnimationUpdater.run();

});
    </script>