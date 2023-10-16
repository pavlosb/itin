<div class="container mt-5 mb-5">
<div class="row justify-content-center">
<div class="col-sm-10 col-lg-6">
<?php 
$attributes = array('id' => 'clientForm');
echo form_open("", $attributes);?>
<div class="form-group">
  <label for=""></label>
  <input type="text" name="" id="" class="form-control" placeholder="" aria-describedby="helpId">
  <small id="helpId" class="text-muted">Help text</small>
</div>
<div class="form-row">
        <div class="form-group col">
            <label for="firstname_client"><?= $this->lang->line('firstname_client'); ?></label>
            <input type="text" class="form-control" id="firstname_client" name ="firstname_client" value ="<?= $firstname_client ?>">
        </div>
        <div class="form-group col">
            <label for="lastname_client"><?= $this->lang->line('lastname_client'); ?></label>
            <input type="text" class="form-control" id="lastname_client" name ="lastname_client" value ="<?= $lastname_client ?>">
        </div>
    </div>
	<canvas id="signature-pad" class="signature-pad" width=400 height=200></canvas>
    <input type="hidden" id="signature-input" name="signature">
<button type="submit" class="btn btn-primary">Submit</button>
<?php echo form_close();?>
</div>
</div></div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/signature_pad/1.5.3/signature_pad.min.js"></script>

<script>
var canvas = document.querySelector("canvas");
var signaturePad = new SignaturePad(canvas);

canvas.addEventListener("mouseup", function () {
    document.getElementById("signature-input").value = signaturePad.toDataURL();
});
</script>

