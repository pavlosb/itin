<?php if (isset($user_lang) && $user_lang == "greek") {
  $langprefix ="";
  $otherlangprefix ="en_";
} else {
  $langprefix ="en_";
  $otherlangprefix ="";
}
  ?>

<div class="container">
<div class="row justify-content-center">
  <div class="col-12">

<table class="table">
<?php 
$mcp = "";
$scp = "";
foreach ($checkpoints as $cp): 
if ($cp['mainsect'] != $mcp) { ?>
<tr><td colspan="3"><h3><?= $cp[$langprefix.'mainsect']; ?><br /><small><?= $cp[$otherlangprefix.'mainsect']; ?></small></h3></td></tr>
<?php } 
if ($cp['name_section'] != $scp) { ?>
<tr><td colspan="3"><h4><?= $cp[$langprefix.'name_section']; ?><br /><small><?= $cp[$otherlangprefix.'name_section']; ?></small></h4></td></tr>
<tr><th>Σημείο</th><th class="text-center">Βαθμολογία</th><th></th></tr>
<?php } ?>
<tr><td><?= $cp[$langprefix.'name_cp']; ?><br /><small><?= $cp[$otherlangprefix.'name_cp']; ?></small></td><td class="text-center"><?= $cp['points_cp']; ?></td><td class="text-center"><i class="fal fa-edit"></i></td></tr>
<?php
$mcp = $cp['mainsect'];
$scp = $cp['name_section'];
 endforeach ?>
</table>
</div>
</div>
</div>
<a href="#" id="back-to-top" title="Back to top"><i class="fal fa-arrow-from-bottom fa-3x"></i></a>

<script>
jQuery(document).ready(function($) {

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