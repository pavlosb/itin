<div class="container mt-5 mb-5">
<div class="row justify-content-center">
      <div class="col-lg-8 p-3 bg-light">
      
      </div>
      <div class="col-lg-8 p-3 bg-light">
<div class="row d-lg-none">
      
<div class="col-sm-4">
<canvas id="cnvgauge5" width = "240px" height="120px"></canvas>
<div style="width:100%" class="text-center small">Τεχνικός έλεγχος</div>
      <div id="score4" style="width:100%" class="text-center mb-2"><?= $sec1score ?></div>
</div>
<div class="col-sm-4">   
      <canvas id="cnvgauge6"  width = "240px" height="120px"></canvas>
      <div style="width:100%" class="text-center small">Έλεγχος Αμαξώματος</div>
      <div id="score5" style="width:100%" class="text-center mb-2"><?= $sec2score ?></div>
      </div>
<div class="col-sm-4">    
      <canvas id="cnvgauge7"  width = "240px" height="120px"></canvas>
      <div style="width:100%" class="text-center small">Έλεγχος συστήματος μνήμης σφαλμάτων</div>
      <div id="score6" style="width:100%" class="text-center mb-2"><?= $sec3score ?></div>
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
  limitMax: false,     // If false, max value increases automatically if value > maxValue
  limitMin: false,     // If true, the min value of the gauge will be fixed
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
  limitMax: false,     // If false, max value increases automatically if value > maxValue
  limitMin: false,     // If true, the min value of the gauge will be fixed
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
  limitMax: false,     // If false, max value increases automatically if value > maxValue
  limitMin: false,     // If true, the min value of the gauge will be fixed
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
var gauge1 = new Gauge(target5).setOptions(opts1); // create sexy gauge!
gauge1.maxValue = 112; // set max gauge value
gauge1.setMinValue(0);  // Prefer setter over gauge.minValue = 0
gauge1.animationSpeed = 32; // set animation speed (32 is default value)
gauge1.set(Number(score1)); // set actual value
var target2 = document.getElementById('cnvgauge2'); // your canvas elem ent
var gauge2 = new Gauge(target6).setOptions(opts2); // create sexy gauge!
gauge2.maxValue = 62; // set max gauge value
gauge2.setMinValue(0);  // Prefer setter over gauge.minValue = 0
gauge2.animationSpeed = 32; // set animation speed (32 is default value)
gauge2.set(Number(score2)); // set actual value
var target3 = document.getElementById('cnvgauge3'); // your canvas elem ent
var gauge3 = new Gauge(target7).setOptions(opts3); // create sexy gauge!
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