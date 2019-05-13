<?php if (isset($user_lang) && $user_lang == "greek") {
  $langprefix ="";
  $otherlangprefix ="en_";
} else {
  $langprefix ="en_";
  $otherlangprefix ="";
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
<tr><td colspan="3"><h4><?= $cp['name_section']; ?></h4></td></tr>
<tr><th>Σημείο</th><th class="text-center">Βαθμολογία</th><th></th></tr>
<?php } ?>
<tr><td><?= $cp['name_cp']; ?></td><td class="text-center"><?= $cp['points_cp']; ?></td><td class="text-center"><i class="fal fa-edit"></i></td></tr>
<?php
$mcp = $cp['mainsect'];
$scp = $cp['name_section'];
 endforeach ?>
</table>
</div>
</div>
</div>