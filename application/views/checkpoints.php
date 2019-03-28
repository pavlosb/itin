<div class="container">
<div class="row justify-content-center">
  <div class="col-12">

<table class="table">
<?php 
$mcp = "";
$scp = "";
foreach ($checkpoints as $cp): 
if ($cp['mainsect'] != $mcp) { ?>
<tr><td colspan="3"><h3><?= $cp['mainsect']; ?></h3></td></tr>
<?php } 
if ($cp['name_section'] != $scp) { ?>
<tr><td colspan="3"><h4><?= $cp['name_section']; ?></h4></td></tr>
<?php } ?>
<tr><td><?= $cp['name_cp']; ?></td><td><?= $cp['points_cp']; ?></td><td></td></tr>
<?php
$mcp = $cp['mainsect'];
$scp = $cp['name_section'];
 endforeach ?>
</table>
</div>
</div>
</div>