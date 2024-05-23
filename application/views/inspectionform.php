<?php 
$insgenpremark ="";
if (isset($user_lang) && $user_lang == "greek") {
  $langprefix ="";
	if (isset($inspection->rmrk_inspection) && $inspection->rmrk_inspection != "n/a") {
		$insgenpremark = $inspection->rmrk_inspection;
	}
} else {
  $langprefix ="en_";
	if (isset($inspection->en_rmrk_inspection) && $inspection->en_rmrk_inspection != "n/a") {
		$insgenpremark = $inspection->en_rmrk_inspection;
	}
  }
	$prcp = 0;
  $mainsect = $langprefix."mainsect";
  $name_section = $langprefix."name_section";
  $name_cp = $langprefix."name_cp";
  $helptext_cp = $langprefix."helptext_cp";
  ?>
<div class="container mt-5 mb-5">
<div class="row justify-content-center">
           <?php if ($signature) { ?>
	<div class="col-lg-8 px-3 py-2 bg-success text-white">Έγινε αποδοχή των Όρων Ελέγχου Οχημάτων από <?= $signature['clientlname_signature'] ?> <?= $signature['clientfname_signature'] ?></div>
	
	<?php } else { ?>
		<div class="col-lg-8 px-3 py-2 bg-warning text-dark">Δεν έχει γίνει αποδοχή των Όρων Ελέγχου Οχημάτων. <a class="btn btn-sm btn-primary float-right" href="/inspection/getsignature/<?= $inspection->id_inspection ?>">Λήψη υπογραφής</a></div>	
	<?php  } ?></div>




<div class="row justify-content-center">
      <div class="col-lg-8 p-3 bg-light">
      <p class="lead"><i class="fal fa-clipboard-check"></i> <?php echo $inspection->number_inspection; ?></p>
      <p class="lead"><i class="fal fa-car"></i> <?php echo $inspection->reg_vhcl; ?> <?php echo $inspection->make_vhcl; ?> <?php echo $inspection->model_vhcl; ?> <?php echo $this->lang->line($inspection->fueltyp_vhcl); ?></p>
      <p class="lead"><i class="fal fa-user-tie"></i> <?php echo $inspection->name_client; ?></p>
      </div>
      </div>


<div id="gauge-wrapper" style="position: fixed; top:100px; left:0px;" class="d-none d-lg-block">

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
    <div class="row justify-content-center pb-5 <?php if (!$signature) { echo "disablediv"; } ?>">
      <div class="col-lg-8">
        <?php echo form_open("inspection/inspection_save", "id='inspform'");?>
        <input type="hidden" name="inspectionid_insres" value = "<?= $inspectionid ?> ">
				<div class="row">
<div class="form-group col">
<label for="exampleFormControlTextarea1"><?= $this->lang->line('genremark_inspection'); ?></label>
    <textarea class="form-control" id="<?= $langprefix ?>rmrk_inspection" name="<?= $langprefix ?>rmrk_inspection" rows="5"><?php echo $insgenpremark; ?></textarea>
			</div>
			</div>


				
        <?php 
          $mcp = "";
          $scp = "";
          foreach ($checkpoints as $cp): 

						// Take photos Section 
						if ($prcp == 12 && $cp['mainsectid'] == 16) { ?>
						
							<div id="results" class="row pb-3">
								<?php if (isset($inspimg)) {
									foreach ($inspimg as $key=>$value): ?>
<div id="eimg-<?= $key ?>" class="col-md-3 mb-2"><img class="img-fluid" src="<?= base_url() ?>upload/<?= $value ?>"/><div class="dellbtn"><button type="button" class="delimg btn btn-danger" data-imgid="<?= $key ?>"><i class="fal fa-trash-alt"></i></button></div></div>
							<?php		endforeach;
								} ?>
							</div>
<div class="row pb-3">
	<div class="col-md-3">
		<div class="row">
			<div class="col-md-12 py-1">
<button type="button" id="opencamera"  onclick="configure()" class="btn btn-primary btn-block btn-lg"><i class="fas fa-camera"></i></button></div>
<div class="col-md-12 py-1"><button type="button" id="closecamera"  class="btn btn-danger btn-block btn-lg" onclick="closecam()"><i class="fas fa-times"></i></button></div>
<div class="col-md-12 py-1">
<input type=button id="takesnapshot" class="btn btn-success btn-lg btn-block" value="Take Photo" onclick="take_snapshot()" >
</div>
<div class="col-md-6 pr-0 py-1">
<button type="button" id="savesnapshot" class="btn btn-block btn-info btn-block btn-lg" onclick="saveSnap()"><i class="fas fa-save"></i></button></div>
<div class="col-md-6 pl-0 py-1"><button type="button" id="trashsnapshot" class="btn btn-block btn-warning btn-block btn-lg" onclick="trashSnap()" ><i class="fal fa-trash-alt"></i></button></div>
	</div></div><div id="my_camera" class="col-md-9"></div>
</div>
<div class="row pb-5">
<div class = "col-md-12"><h5>Ανεβάστε φωτογραφίες</h5></div>
	<div class = "col-md-9"><input id="fileupload" type="file"  name="fileupload[]" accept="image/png, image/jpeg" multiple/>
	<!--<label class="custom-file-label" for="customFile">Επιλογή αρχείου</label> --></div>
	<div class = "col-md-3">
<button  type="button" class="btn btn-info btn-block" id="upload-button" onclick="uploadFile()"> Αποθήκευση </button></div>
</div>
				<?php		}
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
  <input type=hidden name="points[<?= $cp['id_cp']; ?>]" data-sectpen="<?= $cp['mainsectid']; ?>" value ="<?= $cp['points_cp']; ?>">
    <label for="chpsect[<?= $cp['id_cp']; ?>]" class="col-sm-7 col-form-label "><?= $cp[$name_cp]; ?><small class="form-text text-muted"><?= $cp[$helptext_cp]; ?></small></label>
    <div class="col-sm-5 text-center text-sm-right">
    <div class="btn-group btn-group-toggle " data-toggle="buttons">
  <label class="btn btnnok btn-secondary <?php if (isset($inspscore) && $inspscore[$cp['id_cp']] == -1) { echo "active"; } ?>">
    <input type="radio" data-sect="<?= $cp['mainsectid']; ?>" data-cpid = "<?= $cp['id_cp']; ?>" data-ptscp="0" class="do-not-calc" name="checkpoint[<?= $cp['id_cp']; ?>]" id="option1[<?= $cp['id_cp']; ?>]" data-substract = "<?= $cp['points_cp']; ?>" value="-1" <?php if (isset($inspscore) && $inspscore[$cp['id_cp']] == -1) { echo "checked"; } ?> autocomplete="off"><i class="fal fa-times-square"></i>
  </label>
  <label class="btn btnna btn-secondary <?php if (!isset($inspscore) || (isset($inspscore) && $inspscore[$cp['id_cp']] == 0)) { echo "active"; } ?>">
    <input type="radio" data-sect="<?= $cp['mainsectid']; ?>" data-cpid = "<?= $cp['id_cp']; ?>" data-ptscp="<?= $cp['points_cp']; ?>" name="checkpoint[<?= $cp['id_cp']; ?>]" id="option2[<?= $cp['id_cp']; ?>]" value="0" autocomplete="off" <?php if (!isset($inspscore) || (isset($inspscore) && $inspscore[$cp['id_cp']] == 0)) { echo "checked"; } ?>> <i class="fal fa-stop"></i>
  </label>
  <label class="btn btnok btn-secondary <?php if (isset($inspscore) && $inspscore[$cp['id_cp']] == $cp['points_cp']) { echo "active"; } ?>">
    <input type="radio" data-sect="<?= $cp['mainsectid']; ?>"  data-cpid = "<?= $cp['id_cp']; ?>" data-ptscp="0" name="checkpoint[<?= $cp['id_cp']; ?>]" id="option3[<?= $cp['id_cp']; ?>]" <?php if (isset($inspscore) && $inspscore[$cp['id_cp']] == $cp['points_cp']) { echo "checked"; } ?> data-substract = "<?= $cp['points_cp']; ?>" value ="<?= $cp['points_cp']; ?>"autocomplete="off"> <i class="fal fa-check-square"></i>
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
$prcp = $cp['mainsectid'];
$mcp = $cp['mainsect'];
$scp = $cp['name_section'];
 endforeach ?>
<div class="form-group row" id="imagefields"></div>
<input type=hidden name="pensect1" value ="0">
<input type=hidden name="pensect2" value ="0">
<input type=hidden name="pensect3" value ="0">
<button type="submit" class="btn btn-lg btn-primary float-right"><?= $this->lang->line('submit'); ?></button>
<?php echo form_close();?>
</div>
</div>



<div class="row justify-content-center">
      <div class="col-lg-8 p-3 bg-light">
<div class="row d-lg-none">

<div class="col-sm-4">
<canvas id="cnvgauge4" width = "240px" height="120px"></canvas>
<div style="width:100%" class="text-center small"><?= $this->lang->line('technology_check'); ?></div>
      <div id="score4" style="width:100%" class="text-center mb-2">0</div>
</div>
<div class="col-sm-4">   
      <canvas id="cnvgauge5"  width = "240px" height="120px"></canvas>
      <div style="width:100%" class="text-center small"><?= $this->lang->line('bodywork_check'); ?></div>
      <div id="score5" style="width:100%" class="text-center mb-2">0</div>
      </div>
<div class="col-sm-4">    
      <canvas id="cnvgauge6"  width = "240px" height="120px"></canvas>
      <div style="width:100%" class="text-center small"><?= $this->lang->line('system_check'); ?></div>
      <div id="score6" style="width:100%" class="text-center mb-2">0</div>
      </div>
</div>
      </div>
</div>
</div> 
<div id="spinner" class="d-flex justify-content-center" style="position: absolute; width: 100%; height: 100%; top: 0px; left: 0; z-index: 9999; background: rgba(255,255,255,0.7);">
  <div class="spinner-border align-self-center" role="status">
    <span class="sr-only">Loading...</span>
  </div>
</div>
<a href="#" id="back-to-top" title="Back to top"><i class="fal fa-arrow-from-bottom fa-3x"></i></a>
<script language="JavaScript">

$('input[type="file"]').change(function(e){
        var fileName = e.target.files[0].name;
        $('.custom-file-label').html(fileName);
    });
  
	var i = 0;
	var j = 0;
	var ww = window.innerWidth;
	var wh = window.innerHeight;
	var rto = ww / wh;
	if (rto > 1.3) {
		rto = 1.33333;
	}
	var cwdth =  document.getElementById("my_camera").offsetWidth;
	var cwhght = cwdth / rto;
	 function configure(){
	 Webcam.set({
     width: cwdth,
     height: cwhght,
		 dest_width:1024,
		 dest_height:1024 / rto,
     image_format: 'jpeg',
     jpeg_quality: 95,
		 constraints: {
   facingMode: 'environment'
 }
 });

 Webcam.attach( '#my_camera' );
 i = i+1;
 Webcam.on( 'live', function() {
 document.getElementById("takesnapshot").style.display = "block";
 document.getElementById("closecamera").style.display = "block";
 document.getElementById("opencamera").style.display = "none";
 });
 
	 }

 // preload shutter audio clip
 var shutter = new Audio();
 /*shutter.autoplay = true;*/
 shutter.src = navigator.userAgent.match(/Firefox/) ? '/assets/mm/shutter.ogg' : '/assets/mm/shutter.mp3';

 function take_snapshot() {
    // play sound effect
    shutter.play();

    // take snapshot and get image data
    Webcam.snap( function(data_uri) {
       // display results in page
       document.getElementById('results').innerHTML +=
			         '<div id="imgbox-'+i+'" class="col-md-3"><img id="imageprev-'+i+'" class="img-fluid" src="'+data_uri+'"/></div>';
     } );

     Webcam.reset();
     document.getElementById("my_camera").style.height = "10px";
		 document.getElementById("takesnapshot").style.display = "none";
		 document.getElementById("savesnapshot").style.display = "block";
		 document.getElementById("trashsnapshot").style.display = "block";
		 }
 function closecam(){
	Webcam.reset();
     document.getElementById("my_camera").style.height = "10px";
     document.getElementById("closecamera").style.display = "none";
		 document.getElementById("opencamera").style.display = "block";
		 document.getElementById("takesnapshot").style.display = "none";
		 document.getElementById("savesnapshot").style.display = "none";
     document.getElementById("trashsnapshot").style.display = "none";
 }
 function saveSnap(){
   // Get base64 value from <img id='imageprev'> source
   var base64image = document.getElementById("imageprev-"+i).src;

   Webcam.upload( base64image, '/inspection/photoupload', function(code, text) {
      //  console.log(text);
			//	console.log(code);
       //console.log(text);
			 var input = document.createElement("input");


input.setAttribute("type", "hidden");

input.setAttribute("name", "inspimg["+i+"]");

input.setAttribute("value", text);

//append to form element that you want .
document.getElementById("imagefields").appendChild(input);

j = i;
   });
   document.getElementById("closecamera").style.display = "block";
		 document.getElementById("opencamera").style.display = "none";
		 document.getElementById("takesnapshot").style.display = "block";
		 document.getElementById("savesnapshot").style.display = "none";
     document.getElementById("trashsnapshot").style.display = "none";
     configure();

} 

function trashSnap() {
if (i > j) {
	document.getElementById("imgbox-"+i).remove();
	
}
document.getElementById("closecamera").style.display = "block";
		 document.getElementById("opencamera").style.display = "none";
		 document.getElementById("takesnapshot").style.display = "block";
		 document.getElementById("savesnapshot").style.display = "none";
     document.getElementById("trashsnapshot").style.display = "none";
     configure();
	 }



 function uploadFile() {
	i = i+1;
  let formData = new FormData(); 
	const fileInput = document.getElementById("fileupload");
	const selectedFiles = fileInput.files;
	
	//if(fileupload.files[0].length > 0) {
	for (let j = 0; j < selectedFiles.length; j++) {
		
    formData.append("file[]", selectedFiles[j])
	
		}
		
  //formData.append("file", fileupload[].files);


	$.ajax({
                    url:'/inspection/imgupload',
                    type:'post',
                    data:formData,
                    dataType: 'json',
                    contentType: false,
                    processData: false,
                    success:function(response){
											
                      response.files.forEach(function(url) {

 
document.getElementById('results').innerHTML +=
			         '<div id="imgbox-'+i+'" class="col-md-3"><img id="imageprev-'+i+'" class="img-fluid" src="'+url+'"/></div>';
 var input = document.createElement("input");


input.setAttribute("type", "hidden");

input.setAttribute("name", "inspimg["+i+"]");

input.setAttribute("value", url);

//append to form element that you want .
document.getElementById("imagefields").appendChild(input); 
i=i+1;
									});
								}
});


  }

</script>
<script>
jQuery(document).ready(function($) {
	$("#spinner").removeClass("d-flex").hide();
  $('#takesnapshot').hide();
  $('#savesnapshot').hide();
  $('#trashsnapshot').hide();
  $('#closecamera').hide();
     $('input:radio').change(function ()
{
  

      var total1 = 0;
      var total2 = 0;
      var total3 = 0;
			var pensect1 = 0;
			var pensect2 = 0;
			var pensect3 = 0; 
			$totscore1 = 112;
			$totscore2 = 62;
			$totscore2 = 16;
			$newscore1 = 0;

      $('input:radio:checked').each(function(){
      $cpid = $(this).data("cpid");
      $ptscp = isNaN(parseInt($(this).data("ptscp"))) ? 0 : parseInt($(this).data("ptscp"));
			$('[name="points['+$cpid +']"]').val($ptscp);
        if (!$(this).hasClass('do-not-calc')) {
          if ($(this).data("sect") === 1) {
       total1 += isNaN(parseInt($(this).val())) ? 0 : parseInt($(this).val());
			 total1pc = 100 * (total1 / 112);
			 $("#score1").text(total1pc.toFixed(2) + '%');
			 $("#score4").text(total1pc.toFixed(2) + '%');
          }
          if ($(this).data("sect") === 12) {
       total2 += isNaN(parseInt($(this).val())) ? 0 : parseInt($(this).val());
			 total2pc = 100 * (total2 / 62);
       $("#score2").text(total2pc.toFixed(2) + '%');
			 $("#score5").text(total2pc.toFixed(2) + '%');
          }
          if ($(this).data("sect") === 16) {
       total3 += isNaN(parseInt($(this).val())) ? 0 : parseInt($(this).val());
			 total3pc = 100 * (total3 / 16);
       $("#score3").text(total3pc.toFixed(2) + '%');
			 $("#score6").text(total3pc.toFixed(2) + '%');
          }
        }
      });  
			
			$("input[data-sectpen='1']").each(function(){
				pensect1 += parseInt($(this).val());
			});
			$("input[data-sectpen='12']").each(function(){
				pensect2 += parseInt($(this).val());
			});
			$("input[data-sectpen='16']").each(function(){
				pensect3 += parseInt($(this).val());
			});
      $('[name="pensect1"]').val(pensect1);
      $('[name="pensect2"]').val(pensect2);
      $('[name="pensect3"]').val(pensect3);
  
     gauge1.set(total1);
     AnimationUpdater.run();
     gauge2.set(total2);
     AnimationUpdater.run();
     gauge3.set(total3);
     AnimationUpdater.run();
		 gauge4.set(total1);
     AnimationUpdater.run();
     gauge5.set(total2);
     AnimationUpdater.run();
     gauge6.set(total3);
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
var target4 = document.getElementById('cnvgauge4'); // your canvas element
var gauge4 = new Gauge(target4).setOptions(opts1); // create sexy gauge!
gauge4.maxValue = 112; // set max gauge value
gauge4.setMinValue(0);  // Prefer setter over gauge.minValue = 0
gauge4.animationSpeed = 32; // set animation speed (32 is default value)
gauge4.set(0); // set actual value
var target2 = document.getElementById('cnvgauge2'); // your canvas elem ent
var gauge2 = new Gauge(target2).setOptions(opts2); // create sexy gauge!
gauge2.maxValue = 62; // set max gauge value
gauge2.setMinValue(0);  // Prefer setter over gauge.minValue = 0
gauge2.animationSpeed = 32; // set animation speed (32 is default value)
gauge2.set(0); // set actual value
var target5 = document.getElementById('cnvgauge5'); // your canvas elem ent
var gauge5 = new Gauge(target5).setOptions(opts2); // create sexy gauge!
gauge5.maxValue = 62; // set max gauge value
gauge5.setMinValue(0);  // Prefer setter over gauge.minValue = 0
gauge5.animationSpeed = 32; // set animation speed (32 is default value)
gauge5.set(0); // set actual value
var target3 = document.getElementById('cnvgauge3'); // your canvas elem ent
var gauge3 = new Gauge(target3).setOptions(opts3); // create sexy gauge!
gauge3.maxValue = 16; // set max gauge value
gauge3.setMinValue(0);  // Prefer setter over gauge.minValue = 0
gauge3.animationSpeed = 32; // set animation speed (32 is default value)
gauge3.set(0); // set actual value
var target6 = document.getElementById('cnvgauge6'); // your canvas elem ent
var gauge6 = new Gauge(target6).setOptions(opts3); // create sexy gauge!
gauge6.maxValue = 16; // set max gauge value
gauge6.setMinValue(0);  // Prefer setter over gauge.minValue = 0
gauge6.animationSpeed = 32; // set animation speed (32 is default value)
gauge6.set(0); // set actual value

var pensect1 = 0;
			var pensect2 = 0;
			var pensect3 = 0; 
      var total1 = 0;
      var total2 = 0;
      var total3 = 0;
      $('input:radio:checked').each(function(){
				$cpid = $(this).data("cpid");
      $ptscp = isNaN(parseInt($(this).data("ptscp"))) ? 0 : parseInt($(this).data("ptscp"));
			$('[name="points['+$cpid +']"]').val($ptscp);
        if (!$(this).hasClass('do-not-calc')) {
          if ($(this).data("sect") === 1) {
       total1 += isNaN(parseInt($(this).val())) ? 0 : parseInt($(this).val());
       total1pc = 100 * (total1 / 112);
       $("#score1").text(total1pc.toFixed(2) + '%');
			 $("#score4").text(total1pc.toFixed(2) + '%');
          }
          if ($(this).data("sect") === 12) {
       total2 += isNaN(parseInt($(this).val())) ? 0 : parseInt($(this).val());
			 total2pc = 100 * (total2 / 62);
       $("#score2").text(total2pc.toFixed(2) + '%');
			 $("#score5").text(total2pc.toFixed(2) + '%');
          }
          if ($(this).data("sect") === 16) {
       total3 += isNaN(parseInt($(this).val())) ? 0 : parseInt($(this).val());
			 total3pc = 100 * (total3 / 16);
       $("#score3").text(total3pc.toFixed(2) + '%');
			 $("#score6").text(total3pc.toFixed(2) + '%');
          }
        }
      });    
			$("input[data-sectpen='1']").each(function(){
				pensect1 += parseInt($(this).val());
			});
			$("input[data-sectpen='12']").each(function(){
				pensect2 += parseInt($(this).val());
			});
			$("input[data-sectpen='16']").each(function(){
				pensect3 += parseInt($(this).val());
			});
      $('[name="pensect1"]').val(pensect1);
      $('[name="pensect2"]').val(pensect2);
      $('[name="pensect3"]').val(pensect3);
  
     gauge1.set(total1);
     AnimationUpdater.run();
     gauge2.set(total2);
     AnimationUpdater.run();
     gauge3.set(total3);
     AnimationUpdater.run();
		 gauge4.set(total1);
     AnimationUpdater.run();
		 gauge5.set(total2);
     AnimationUpdater.run();
		 gauge6.set(total3);
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

$( ".delimg" ).click(function() {
        var imgid =$(this).data("imgid");
     //   $('.prep').hide();
      $("#spinner").addClass("d-flex").show();
    $.ajax({
		type: "POST",
		dataType: "JSON",
		data: {id:imgid},
		url: "<?= base_url()?>inspection/removeimg",
		success: function(data){
			//$.each(data, function(i,item){
				if (data == 'ok'){
                   // alert(data.created);
                   // alert(data.en_certfile_inspection);
                   // alert(data.certfile_inspection);
                    $( "#eimg-"+imgid).remove();
                    //$('.repel').attr('href','<?= base_url()?>assets/pdfs/'+ data.certfile_inspection);
                    //$('.repen').attr('href','<?= base_url()?>assets/pdfs/'+ data.en_certfile_inspection);
                   $("#spinner").removeClass("d-flex").hide();
                   // $('.prep').show();
                   // window.location.reload(true);
		
				} else {
		  
						}
			//});
			}
		
	  
	});

        })


});
    </script>
