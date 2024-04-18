<?php echo form_open_multipart("inspection/imgupload", "id='inspform'");?>
<div class="row">
<div class = "col-md-9"><input id="fileupload" type="file" class="custom-file-input" name="fileupload" multiple/>
	<label class="custom-file-label" for="customFile">Επιλογή αρχείου</label></div>
	<div class = "col-md-3">
	<button type="submit" class="btn btn-lg btn-primary float-right"><?= $this->lang->line('submit'); ?></button>

</div>
<?php echo form_close();?>
