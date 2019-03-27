<div class="container">
<div class="row justify-content-center">
  <div class="col-sm-8 col-lg-6">
<?php print_r($checkpoints); ?>
<table>
<?php 
$mcp = "";
foreach ($checkpoints as $cp): 
if ($cp['mainsect'] != $mcp) { ?>
<tr><td colspan="3"><?= $cp['mainsect']; ?></td></tr>
<?php } ?>
<tr><td><?= $cp['name_section']; ?></td><td><?= $cp['name_cp']; ?></td><td><?= $cp['points_cp']; ?></td></tr>
<?php
$mcp = $cp['mainsect'];

 endforeach ?>
</table>
</div>
</div>
</div>