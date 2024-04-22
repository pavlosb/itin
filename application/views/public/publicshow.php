<div class="container pt-5 pb-5">
	<div class="row"><div class="col text-center py-2 text-light bg-green"><h1><?= $this->lang->line('pdf_dekra_report'); ?></h1></div></div>
        <div class="row justify-content-center">
            <div class="col-lg-10 px-3 py-2 bg-light">
				
            <div class="row mb-2">
                <div class="col-md-8"><!--<span class="text-secondary"><?= $this->lang->line('number_inspection'); ?>:</span> <?php echo $inspection->number_inspection; ?> <span class="text-secondary"><?= $this->lang->line('inspector'); ?>:</span> <?php echo $inspection->last_name; ?> <?php echo $inspection->first_name; ?>--></div>
                <div class="col-md-4 text-center text-md-right"><span class="text-secondary"><?= $this->lang->line('date_inspection'); ?>:</span> <?php echo date("d-m-Y", strtotime($inspection->date_inspection)); ?></div>
            </div>
            <div class="row">
                <div class="col-sm-12 text-center text-light bg-green pt-1 pb-1"><?= $this->lang->line('vehicle_details'); ?></div>
                <div class="col-5 col-sm-3 text-secondary pt-2 pb-2"><?= $this->lang->line('vin_vhcl'); ?>:</div>
                <div class="col-7 col-md-3 col-sm-9 pt-2 pb-2"><?php echo $inspection->vin_vhcl; ?></div>
                <div class="col-6 col-md-3 text-secondary pt-2 pb-2"><?= $this->lang->line('reg_vhcl'); ?>:</div>
                <div class="col-6 col-md-3 pt-2 pb-2"><?php echo $inspection->reg_vhcl; ?></div>
                <div class="col-6 col-md-3 text-secondary pt-2 pb-2"><?= $this->lang->line('firstreg_vhcl'); ?>:</div>
                <div class="col-6 col-md-3 pt-2 pb-2"><?php echo date("m/Y", strtotime($inspection->firstreg_vhcl)); ?></div>
                <div class="col-6 col-md-3 text-secondary pt-2 pb-2"><?= $this->lang->line('type_vhcl'); ?>:</div>
                <div class="col-6 col-md-3 pt-2 pb-2"><?php echo $inspection->type_vhcl; ?></div>
                <div class="col-6 col-md-3 text-secondary pt-2 pb-2"><?= $this->lang->line('doors_vhcl'); ?>:</div>
                <div class="col-6 col-md-3 pt-2 pb-2"><?php echo $inspection->doors_vhcl; ?></div>
                <div class="col-6 col-md-3 text-secondary pt-2 pb-2"><?= $this->lang->line('make_vhcl'); ?>:</div>
                <div class="col-6 col-md-3 pt-2 pb-2"><?php echo $inspection->make_vhcl; ?></div>
                <div class="col-6 col-md-3 text-secondary pt-2 pb-2"><?= $this->lang->line('colour_vhcl'); ?>:</div>
                <div class="col-6 col-md-3 pt-2 pb-2"><?php echo $inspection->colour_vhcl; ?></div>
                <div class="col-6 col-md-3 text-secondary pt-2 pb-2"><?= $this->lang->line('model_vhcl'); ?>:</div>
                <div class="col-6 col-md-3 pt-2 pb-2"><?php echo $inspection->model_vhcl; ?></div>
                <div class="col-6 col-md-3 text-secondary pt-2 pb-2"><?= $this->lang->line('fuel_vhcl'); ?>:</div>
                <div class="col-6 col-md-3 pt-2 pb-2"><?php echo $this->lang->line($inspection->fueltyp_vhcl); ?></div>
				<div class="col-6 col-md-3 text-secondary pt-2 pb-2"><?= $this->lang->line('wheeldrive_vhcl'); ?>:</div>
                <div class="col-6 col-md-3 pt-2 pb-2"><?php echo $this->lang->line($inspection->wheeldrive_vhcl); ?></div>
                <div class="col-6 col-md-3 text-secondary pt-2 pb-2"><?= $this->lang->line('pdf_displpow_vhcl'); ?></div>
                <div class="col-6 col-md-3 pt-2 pb-2"><?php echo $inspection->pow_vhcl; ?>kW / <?php echo $inspection->displ_vhcl; ?>ccm</td></div>
                <div class="col-6 col-md-3 text-secondary pt-2 pb-2"><?= $this->lang->line('mlg_vhcl'); ?>:</div>
                <div class="col-6 col-md-3 pt-2 pb-2"><?php echo $inspection->mlg_vhcl; ?></div>
            </div>    

        </div>
        <div class="col-lg-10 p-3 bg-light">
            <div class="row">
                <div class="col-sm-4 text-center">
                    <canvas id="cnvgauge5" ></canvas>
                    <div style="width:100%" class="text-center small"><?= $this->lang->line('technology_check'); ?></div>
                    <div id="score4" style="width:100%" class="text-center mb-2"><?= round(100 * ($sec1score / 112), 2) ?><small>%</small></div>
                </div>
                <div class="col-sm-4 text-center">   
                    <canvas id="cnvgauge6"></canvas>
                    <div style="width:100%" class="text-center small"><?= $this->lang->line('bodywork_check'); ?></div>
                    <div id="score5" style="width:100%" class="text-center mb-2"><?= round(100 * ($sec2score / 62), 2) ?><small>%</small></div>
                </div>
                <div class="col-sm-4 text-center">    
                    <canvas id="cnvgauge7"></canvas>
                    <div style="width:100%" class="text-center small"><?= $this->lang->line('system_check'); ?></div>
                    <div id="score6" style="width:100%" class="text-center mb-2"><?= round(100 * ($sec3score / 16), 2) ?><small>%</small></div>
                </div>
            </div>
        </div>
		<?php if (isset($user_lang) && $user_lang == "greek") {
		
		if (isset($inspection->rmrk_inspection) && $inspection->rmrk_inspection != "n/a") { ?>
		<div class="col-lg-10 p-3 bg-light">
		<div class="row">
<div class = "col-12">
	<h4><?= $this->lang->line('genremark_inspection'); ?></h4></div>
	<div class = "col-12 pb-3"><?= $inspection->rmrk_inspection ?></div>
		
		</div>
		</div>

		<?php } } else {

			if (isset($inspection->en_rmrk_inspection) && $inspection->en_rmrk_inspection != "n/a") { ?>
		<div class="col-lg-10 p-3 bg-light">
		<div class="row">
<div class = "col-12">
	<h4><?= $this->lang->line('genremark_inspection'); ?></h4></div>
	<div class = "col-12 pb-3"><?= $inspection->en_rmrk_inspection ?></div>
		
		</div>
		</div>

			<?php } } ?>
		



    </div>
   
    
</div>
<div id="spinner" class="d-flex justify-content-center" style="position: absolute; width: 100%; height: 100%; top: 0px; left: 0; z-index: 9999; background: rgba(255,255,255,0.7);">
  <div class="spinner-border align-self-center" role="status">
    <span class="sr-only">Loading...</span>
  </div>
</div>



<script>
jQuery(document).ready(function($) {
	$('.gallery').featherlightGallery();
    $("#spinner").removeClass("d-flex").hide();
    $('.pcert').hide();
  var btns = document.querySelectorAll('button');
  var clipboard = new ClipboardJS(btns);

  clipboard.on('success', function(e) {
    $(e.trigger).tooltip({title:"Copied!", trigger:'manual'}).tooltip('show').on('shown.bs.tooltip', function () {
        $(e.trigger).delay(1200).tooltip('hide')
})
    });

var score1 = <?= $sec1score ?>;
var score2 = <?= $sec2score ?>;
var score3 = <?= $sec3score ?>;


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
var target1 = document.getElementById('cnvgauge5'); // your canvas element
var gauge1 = new Gauge(target1).setOptions(opts1); // create sexy gauge!
gauge1.maxValue = 112; // set max gauge value
gauge1.setMinValue(0);  // Prefer setter over gauge.minValue = 0
gauge1.animationSpeed = 32; // set animation speed (32 is default value)
gauge1.set(Number(score1)); // set actual value
var target2 = document.getElementById('cnvgauge6'); // your canvas elem ent
var gauge2 = new Gauge(target2).setOptions(opts2); // create sexy gauge!
gauge2.maxValue = 62; // set max gauge value
gauge2.setMinValue(0);  // Prefer setter over gauge.minValue = 0
gauge2.animationSpeed = 32; // set animation speed (32 is default value)
gauge2.set(Number(score2)); // set actual value
var target3 = document.getElementById('cnvgauge7'); // your canvas elem ent
var gauge3 = new Gauge(target3).setOptions(opts3); // create sexy gauge!
gauge3.maxValue = 16; // set max gauge value
gauge3.setMinValue(0);  // Prefer setter over gauge.minValue = 0
gauge3.animationSpeed = 32; // set animation speed (32 is default value)
gauge3.set(Number(score3)); // set actual value



    


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


$( "#createcert" ).click(function() {
    $("#spinner").addClass("d-flex").show();
    $.ajax({
		type: "POST",
		dataType: "JSON",
		data: {id:<?= $inspection->id_inspection ?>},
		url: "<?= base_url()?>inspection/cert_pdf",
		success: function(data){
			//$.each(data, function(i,item){
				if (data.created == 'ok'){
                   // alert(data.created);
                   // alert(data.en_certfile_inspection);
                   // alert(data.certfile_inspection);
                    $( "#createcert" ).hide();
                    $('.certel').attr('href','<?= base_url()?>assets/pdfs/'+ data.certfile_inspection);
                    $('.btnel').attr('data-clipboard-text', '<?= base_url()?>assets/pdfs/'+ data.certfile_inspection);
                    $('.certen').attr('href','<?= base_url()?>assets/pdfs/'+ data.en_certfile_inspection);
                    $('.btnen').attr('data-clipboard-text', '<?= base_url()?>assets/pdfs/'+ data.en_certfile_inspection);
                    $("#spinner").removeClass("d-flex").hide();
                    $('.pcert').show();
		
				} else {
		  
						}
			//});
			}
		
	  
	});
});
$( "#resetinsp" ).click(function() {
	bootbox.confirm("<?= $this->lang->line('confirm_erase'); ?>", function(result) {    
                if (result) {
    $("#spinner").addClass("d-flex").show();
    $.ajax({
		type: "POST",
		dataType: "JSON",
		data: {id:<?= $inspection->id_inspection ?>},
		url: "<?= base_url()?>inspection/resetinspection",
		success: function(data){
			//$.each(data, function(i,item){
				if (data.reseted == 'ok'){
                   // alert(data.created);
                   // alert(data.en_certfile_inspection);
                   // alert(data.certfile_inspection);
                    $( "#resetinsp" ).hide();
					$('.inspfile').remove();
                    $("#spinner").removeClass("d-flex").hide();
                    
		
				} else {
		  
						}
			//});
			
		
		}
	});
}
});
});
bootbox.setDefaults({
          /**
           * @optional String
           * @default: en
           * which locale settings to use to translate the three
           * standard button labels: OK, CONFIRM, CANCEL
           */
          locale: "<?= $ulcl ?>"
    });


});
    </script>
