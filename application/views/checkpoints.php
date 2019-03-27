<div class="container">
<div class="row justify-content-center">
  <div class="col-sm-8 col-lg-6">

<table>
<?php 
$mcp = "";
$scp = "";
foreach ($checkpoints as $cp): 
if ($cp['mainsect'] != $mcp) { ?>
<tr><td colspan="3"><?= $cp['mainsect']; ?></td></tr>
<?php } 
if ($cp['name_section'] != $scp) { ?>
<tr><td colspan="3"><?= $cp['name_section']; ?></td></tr>
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