<?php if (isset($user_lang) && $user_lang == "greek") {
  $langprefix ="";
} else {
  $langprefix ="en_";
  }
  $mainsect = $langprefix."mainsect";
  $name_section = $langprefix."name_section";
  $name_cp = $langprefix."name_cp";
  $helptext_cp = $langprefix."helptext_cp";
  ?>
<div class="container mt-5 mb-5">
<div class="row justify-content-center">
      <div class="col-lg-8 p-3 bg-light">
      <p class="lead"><i class="fal fa-clipboard-check"></i> <?php echo $inspection->number_inspection; ?></p>
      <p class="lead"><i class="fal fa-car"></i> <?php echo $inspection->reg_vhcl; ?> <?php echo $inspection->make_vhcl; ?> <?php echo $inspection->model_vhcl; ?></p>
      <p class="lead"><i class="fal fa-user-tie"></i> <?php echo $inspection->name_client; ?></p>
      </div>
      <div class="col-lg-8 p-3 bg-light">
<div class="row d-lg-none">
      
<div class="col-sm-4">
<canvas id="cnvgauge5" width = "240px" height="120px"></canvas>
<div style="width:100%" class="text-center small"><?= $this->lang->line('technology_check'); ?></div>
      <div id="score4" style="width:100%" class="text-center mb-2">0</div>
</div>
<div class="col-sm-4">   
      <canvas id="cnvgauge6"  width = "240px" height="120px"></canvas>
      <div style="width:100%" class="text-center small"><?= $this->lang->line('bodywork_check'); ?></div>
      <div id="score5" style="width:100%" class="text-center mb-2">0</div>
      </div>
<div class="col-sm-4">    
      <canvas id="cnvgauge7"  width = "240px" height="120px"></canvas>
      <div style="width:100%" class="text-center small"><?= $this->lang->line('system_check'); ?></div>
      <div id="score6" style="width:100%" class="text-center mb-2">0</div>
      </div>
</div>
      </div>
</div>


<div id="gauge-wrapper" style="position: fixed; top:150px; left:0px;" class="d-md-none d-lg-block">

<canvas id="cnvgauge1" width = "300px" height="160px"></canvas>
<div style="width:300px" class="text-center small"><?= $this->lang->line('technology_check'); ?></div>
      <div id="score1" style="width:300px" class="text-center mb-2">0</div>
      
      <canvas id="cnvgauge2" width = "300px" height="160px"></canvas>
      <div style="width:300px" class="text-center small"><?= $this->lang->line('bodywork_check'); ?></div>
      <div id="score2" style="width:300px" class="text-center mb-2">0</div>
      
      <canvas id="cnvgauge3" width = "300px" height="160px"></canvas>
      <div style="width:300px" class="text-center small"><?= $this->lang->line('system_check'); ?></div>
      <div id="score3" style="width:300px" class="text-center mb-2">0</div>
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
              <h3><?= $cp[$mainsect]; ?></h3>
      <?php } 
if ($cp['name_section'] != $scp) { ?>
<div class="row">
 <legend class="col-form-label col-form-label-lg col-sm-12"><?= $cp[$name_section]; ?></legend>
</div>
<?php } ?>

<div class="form-group row pt-3">
  <input type=hidden name="chpsect[<?= $cp['id_cp']; ?>]" value ="<?= $cp['mainsectid']; ?>">
    <label for="chpsect[<?= $cp['id_cp']; ?>]" class="col-sm-7 col-form-label "><?= $cp[$name_cp]; ?><small class="form-text text-muted"><?= $cp[$helptext_cp]; ?></small></label>
    <div class="col-sm-5 text-center text-sm-right">
    <div class="btn-group btn-group-toggle " data-toggle="buttons">
  <label class="btn btnnok btn-secondary <?php if (isset($inspscore) && $inspscore[$cp['id_cp']] == -1) { echo "active"; } ?>">
    <input type="radio" data-sect="<?= $cp['mainsectid']; ?>"  class="do-not-calc" name="checkpoint[<?= $cp['id_cp']; ?>]" id="option1" value="-1" <?php if (isset($inspscore) && $inspscore[$cp['id_cp']] == -1) { echo "checked"; } ?> autocomplete="off"><i class="fal fa-times-square"></i>
  </label>
  <label class="btn btnna btn-secondary <?php if (!isset($inspscore) || (isset($inspscore) && $inspscore[$cp['id_cp']] == 0)) { echo "active"; } ?>">
    <input type="radio" data-sect="<?= $cp['mainsectid']; ?>"  name="checkpoint[<?= $cp['id_cp']; ?>]" id="option2" value="0" autocomplete="off" <?php if (!isset($inspscore) || (isset($inspscore) && $inspscore[$cp['id_cp']] == 0)) { echo "checked"; } ?>> <i class="fal fa-stop"></i>
  </label>
  <label class="btn btnok btn-secondary <?php if (isset($inspscore) && $inspscore[$cp['id_cp']] == $cp['points_cp']) { echo "active"; } ?>">
    <input type="radio" data-sect="<?= $cp['mainsectid']; ?>"  name="checkpoint[<?= $cp['id_cp']; ?>]" id="option3" <?php if (isset($inspscore) && $inspscore[$cp['id_cp']] == $cp['points_cp']) { echo "checked"; } ?> value ="<?= $cp['points_cp']; ?>"autocomplete="off"> <i class="fal fa-check-square"></i>
  </label>
  
</div>
    </div>
  </div>
 
	<div class="form-group row pb-3">
		<div class="col-12">
    <label for="rmrk[<?= $cp['id_cp']; ?>]"><?= $this->lang->line('comment'); ?></label>
    <textarea name="remark[<?= $cp['id_cp']; ?>]"class="form-control" id="remark[<?= $cp['id_cp']; ?>]" rows="3"><?php if (isset($inspremark[$cp['id_cp']])){ 
		echo $inspremark[$cp['id_cp']];
	}?></textarea>
	</div>
  </div>




<!-- <tr><td><?= $cp['name_cp']; ?></td><td class="text-center"><?= $cp['points_cp']; ?></td><td class="text-center"><i class="fal fa-edit"></i></td></tr> -->
<?php
$mcp = $cp['mainsect'];
$scp = $cp['name_section'];
 endforeach ?>



<button type="submit" class="btn btn-primary"><?= $this->lang->line('submit'); ?></button>
<?php echo form_close();?>
</div>
</div>
</div> 
<a href="#" id="back-to-top" title="Back to top"><i class="fal fa-arrow-from-bottom fa-3x"></i></a>
<script>
jQuery(document).ready(function($) {

     $('input:radio').change(function ()
{

      var total1 = 0;
      var total2 = 0;
      var total3 = 0;
      $('input:radio:checked').each(function(){
        if (!$(this).hasClass('do-not-calc')) {
          if ($(this).data("sect") === 1) {
       total1 += isNaN(parseInt($(this).val())) ? 0 : parseInt($(this).val());
       $("#score1").text(total1);
          }
          if ($(this).data("sect") === 12) {
       total2 += isNaN(parseInt($(this).val())) ? 0 : parseInt($(this).val());
       $("#score2").text(total2);
          }
          if ($(this).data("sect") === 16) {
       total3 += isNaN(parseInt($(this).val())) ? 0 : parseInt($(this).val());
       $("#score3").text(total3);
          }
        }
      });   
  
     gauge1.set(total1);
     AnimationUpdater.run();
     gauge2.set(total2);
     AnimationUpdater.run();
     gauge3.set(total3);
     AnimationUpdater.run();

});

var opts1 = {
  angle: 0, // The span of the gauge arc
  lineWidth: 0.2, // The line thickness
  radiusScale: 0.78, // Relative radius
  pointer: {
    length: 0.41, // // Relative to gauge radius
    strokeWidth: 0.035, // The thickness
    color: '#000000' // Fill color
  },
  limitMax: true,     // If false, max value increases automatically if value > maxValue
  limitMin: true,     // If true, the min value of the gauge will be fixed
  colorStart: '#6FADCF',   // Colors
  colorStop: '#8FC0DA',    // just experiment with them
  strokeColor: '#E0E0E0',  // to see which ones work best for you
  staticZones: [
   {strokeStyle: "#ff3300", min: 0, max: 91.99}, // Red from 100 to 130
   {strokeStyle: "#28db00", min: 92, max: 112}, // Yellow
  ],
  generateGradient: true,
  highDpiSupport: true,     // High resolution support
  
};
var opts2 = {
  angle: 0, // The span of the gauge arc
  lineWidth: 0.2, // The line thickness
  radiusScale: 0.78, // Relative radius
  pointer: {
    length: 0.41, // // Relative to gauge radius
    strokeWidth: 0.035, // The thickness
    color: '#000000' // Fill color
  },
  limitMax: true,     // If false, max value increases automatically if value > maxValue
  limitMin: true,     // If true, the min value of the gauge will be fixed
  colorStart: '#6FADCF',   // Colors
  colorStop: '#8FC0DA',    // just experiment with them
  strokeColor: '#E0E0E0',  // to see which ones work best for you
  staticZones: [
   {strokeStyle: "#ff3300", min: 0, max: 52.99}, // Red from 100 to 130
   {strokeStyle: "#28db00", min: 53, max: 62}, // Yellow
  ],
  generateGradient: true,
  highDpiSupport: true,     // High resolution support
  
};
var opts3 = {
  angle: 0, // The span of the gauge arc
  lineWidth: 0.2, // The line thickness
  radiusScale: 0.78, // Relative radius
  pointer: {
    length: 0.41, // // Relative to gauge radius
    strokeWidth: 0.035, // The thickness
    color: '#000000' // Fill color
  },
  limitMax: true,     // If false, max value increases automatically if value > maxValue
  limitMin: true,     // If true, the min value of the gauge will be fixed
  colorStart: '#6FADCF',   // Colors
  colorStop: '#8FC0DA',    // just experiment with them
  strokeColor: '#E0E0E0',  // to see which ones work best for you
  staticZones: [
   {strokeStyle: "#ff3300", min: 0, max: 11.99}, 
   {strokeStyle: "#28db00", min: 12, max: 16}, 
  ],
  generateGradient: true,
  highDpiSupport: true,     // High resolution support
  
};
var target1 = document.getElementById('cnvgauge1'); // your canvas element
var gauge1 = new Gauge(target1).setOptions(opts1); // create sexy gauge!
gauge1.maxValue = 112; // set max gauge value
gauge1.setMinValue(0);  // Prefer setter over gauge.minValue = 0
gauge1.animationSpeed = 32; // set animation speed (32 is default value)
gauge1.set(0); // set actual value
var target2 = document.getElementById('cnvgauge2'); // your canvas elem ent
var gauge2 = new Gauge(target2).setOptions(opts2); // create sexy gauge!
gauge2.maxValue = 62; // set max gauge value
gauge2.setMinValue(0);  // Prefer setter over gauge.minValue = 0
gauge2.animationSpeed = 32; // set animation speed (32 is default value)
gauge2.set(0); // set actual value
var target3 = document.getElementById('cnvgauge3'); // your canvas elem ent
var gauge3 = new Gauge(target3).setOptions(opts3); // create sexy gauge!
gauge3.maxValue = 16; // set max gauge value
gauge3.setMinValue(0);  // Prefer setter over gauge.minValue = 0
gauge3.animationSpeed = 32; // set animation speed (32 is default value)
gauge3.set(0); // set actual value



      var total1 = 0;
      var total2 = 0;
      var total3 = 0;
      $('input:radio:checked').each(function(){
        if (!$(this).hasClass('do-not-calc')) {
          if ($(this).data("sect") === 1) {
       total1 += isNaN(parseInt($(this).val())) ? 0 : parseInt($(this).val());
       $("#score1").text(total1);
          }
          if ($(this).data("sect") === 12) {
       total2 += isNaN(parseInt($(this).val())) ? 0 : parseInt($(this).val());
       $("#score2").text(total2);
          }
          if ($(this).data("sect") === 16) {
       total3 += isNaN(parseInt($(this).val())) ? 0 : parseInt($(this).val());
       $("#score3").text(total3);
          }
        }
      });    
  
     gauge1.set(total1);
     AnimationUpdater.run();
     gauge2.set(total2);
     AnimationUpdater.run();
     gauge3.set(total3);
     AnimationUpdater.run();


     if ($('#back-to-top').length) {
    var scrollTrigger = 100, // px
        backToTop = function () {
            var scrollTop = $(window).scrollTop();
            if (scrollTop > scrollTrigger) {
                $('#back-to-top').addClass('show');
            } else {
                $('#back-to-top').removeClass('show');
            }
        };
    backToTop();
    $(window).on('scroll', function () {
        backToTop();
    });
    $('#back-to-top').on('click', function (e) {
        e.preventDefault();
        $('html,body').animate({
            scrollTop: 0
        }, 700);
    });
}
});
    </script>
