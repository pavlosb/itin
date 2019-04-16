<div class="container mt-5 mb-5">
    <div class="row justify-content-center">
        <div class="col-lg-10 p-3 bg-light">
            <div class="row mb-2">
                <div class="col-md-8"><span class="text-secondary">Αριθμός:</span> <?php echo $inspection->number_inspection; ?> <span class="text-secondary">Εμπειρογνώμονας:</span> <?php echo $inspection->last_name; ?> <?php echo $inspection->first_name; ?></div>
                <div class="col-md-4 text-md-right"><span class="text-secondary">Ημερομηνία:</span> <?php echo date("d-m-Y", strtotime($inspection->date_inspection)); ?></div>
            </div>
            <div class="row">
                <div class="col-sm-12 text-center text-light bg-green pt-1 pb-1">Στοιχεία Οχήματος</div>
                <div class="col-5 col-sm-3 text-secondary pt-2 pb-2">Αριθμός Πλαισίου:</div>
                <div class="col-7 col-sm-9 pt-2 pb-2"><?php echo $inspection->vin_vhcl; ?></div>
                <div class="col-sm-6 col-md-3 text-secondary pt-2 pb-2">Πινακίδα:</div>
                <div class="col-sm-6 col-md-3 pt-2 pb-2"><?php echo $inspection->reg_vhcl; ?></div>
                <div class="col-sm-6 col-md-3 text-secondary pt-2 pb-2">1η Κυκλοφορία:</div>
                <div class="col-sm-6 col-md-3 pt-2 pb-2"><?php echo date("m/Y", strtotime($inspection->firstreg_vhcl)); ?></div>
                <div class="col-sm-6 col-md-3 text-secondary pt-2 pb-2">Τύπος οχήματος:</div>
                <div class="col-sm-6 col-md-3 pt-2 pb-2"><?php echo $inspection->type_vhcl; ?></div>
                <div class="col-sm-6 col-md-3 text-secondary pt-2 pb-2">Θύρες:</div>
                <div class="col-sm-6 col-md-3 pt-2 pb-2"><?php echo $inspection->doors_vhcl; ?></div>
                <div class="col-sm-6 col-md-3 text-secondary pt-2 pb-2">Κατασκευαστής:</div>
                <div class="col-sm-6 col-md-3 pt-2 pb-2"><?php echo $inspection->make_vhcl; ?></div>
                <div class="col-sm-6 col-md-3 text-secondary pt-2 pb-2">Χρώμα:</div>
                <div class="col-sm-6 col-md-3 pt-2 pb-2"><?php echo $inspection->colour_vhcl; ?></div>
                <div class="col-sm-6 col-md-3 text-secondary pt-2 pb-2">Μοντέλο:</div>
                <div class="col-sm-6 col-md-3 pt-2 pb-2"><?php echo $inspection->model_vhcl; ?></div>
                <div class="col-sm-6 col-md-3 text-secondary pt-2 pb-2">Επόμενος Τεχ. Έλεγχος:</div>
                <div class="col-sm-6 col-md-3 pt-2 pb-2"><?php echo date("m/Y", strtotime($inspection->nxtdate_vhcl)); ?></div>
                <div class="col-sm-6 col-md-3 text-secondary pt-2 pb-2">Ισχύς / Κυβισμός:</div>
                <div class="col-sm-6 col-md-3 pt-2 pb-2"><?php echo $inspection->pow_vhcl; ?>kW / <?php echo $inspection->displ_vhcl; ?>ccm</td></div>
                <div class="col-sm-6 col-md-3 text-secondary pt-2 pb-2">Χιλιόμετρα:</div>
                <div class="col-sm-6 col-md-3 pt-2 pb-2"><?php echo $inspection->mlg_vhcl; ?></div>

            </div>    

        </div>
        <div class="col-lg-10 p-3 bg-light">
            <div class="row">
                <div class="col-sm-4 text-center">
                    <canvas id="cnvgauge5" ></canvas>
                    <div style="width:100%" class="text-center small">Τεχνικός έλεγχος</div>
                    <div id="score4" style="width:100%" class="text-center mb-2"><?= $sec1score ?></div>
                </div>
                <div class="col-sm-4 text-center">   
                    <canvas id="cnvgauge6"></canvas>
                    <div style="width:100%" class="text-center small">Έλεγχος Αμαξώματος</div>
                    <div id="score5" style="width:100%" class="text-center mb-2"><?= $sec2score ?></div>
                </div>
                <div class="col-sm-4 text-center">    
                    <canvas id="cnvgauge7"></canvas>
                    <div style="width:100%" class="text-center small">Έλεγχος συστήματος μνήμης σφαλμάτων</div>
                    <div id="score6" style="width:100%" class="text-center mb-2"><?= $sec3score ?></div>
                </div>
            </div>
        </div>
    </div>
</div>




<script>
jQuery(document).ready(function($) {

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
});
    </script>