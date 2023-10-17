<div class="container mt-5 mb-5">
<div class="row justify-content-center">
  <div class="col-sm-10 col-lg-6">
<h1 class="display-4"><?php $this->lang->line('client_signature'); ?></h1>
<p class="lead"></p>
</div>
<div class="row justify-content-center">
<div class="col-sm-10 col-lg-6">
<p>Έχω διαβάσει και αποδέχομαι τους Όρους Ελέγχου Οχημάτων <button type="button" class="btn btn-primary btn-sm"data-toggle="modal" data-target="#myModal">εμφάνιση</button></p>
<?php 
$attributes = array('id' => 'clientForm');
echo form_open("inspection/getsignature", $attributes);?>
<input type="hidden" name ="id_client" value ="<?= $id_client ?>">
<input type="hidden" id="inspectionid" name="inspectionid" value="<?= $inspectionid ?>">
<!--<div class="form-group">
  <label for=""></label>
  <input type="text" name="" id="" class="form-control" placeholder="" aria-describedby="helpId">
  <small id="helpId" class="text-muted">Help text</small>
</div> -->
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
	<div class="form-group">
  <label for="">Υπογραφή</label>
	<canvas id="signature-pad" class="signature-pad" width=350 height=200></canvas>
    <input type="hidden" id="signature-input" name="signature">
	</div>
<button type="submit" class="btn btn-primary">Καταχώρηση</button>
<?php echo form_close();?>
</div>
</div></div>

<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">ΟΡΟΙ ΕΛΕΓΧΩΝ ΟΧΗΜΑΤΩΝ </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <h3>ΕΙΣΑΓΩΓΙΚΑ</h3>
		<p>Η εταιρεία Ιmperial DEKRA διαθέτοντας υψηλή τεχνογνωσία και εξειδίκευση διενεργεί κατόπιν αιτήσεων ελέγχους σε παντός είδους οχήματα. Οι έλεγχοι της διέπονται από συγκεκριμένους όρους και προϋποθέσεις οι οποίες αναφέρονται αναλυτικά στο παρόν έγγραφο. </p>
		<p>Οι κάτωθι όροι ισχύουν σε κάθε περίπτωση ανάθεσης ελέγχου οχήματος από πελάτη στην εταιρεία με την επωνυμία Ιmperial DEKRA. Με την εκδήλωση ενδιαφέροντος από τον πελάτη και την αίτησή του για έλεγχο η ως άνω εταιρεία του γνωστοποιεί τους κάτωθι όρους και ο τελευταίος τους αποδέχεται με την υπογραφή του στο τέλος του εγγράφου αναγράφοντας ολογράφως και το ονοματεπώνυμό του. Η γνωστοποίηση και η αποδοχή των όρων δύναται να γίνεται και ηλεκτρονικά δηλώνοντας ο πελάτης τη διεύθυνση email στην ως άνω εταιρεία στην οποία επιθυμεί να λάβει το κείμενο των όρων. Η αποστολή των όρων στην υποδειχθείσα διεύθυνση αποτελεί αποδοχή από πλευράς του πελάτη. Οι κάτωθι όροι γνωστοποιούνται σε κάθε ενδιαφερόμενο πελάτη μέσω του διαδικτυακού τόπου της εταιρείας.</p>
		      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Κλείσιμο</button>
      </div>
    </div>
  </div>
</div>




<script src="https://cdnjs.cloudflare.com/ajax/libs/signature_pad/1.5.3/signature_pad.min.js"></script>

<script>
var canvas = document.querySelector("canvas");
var signaturePad = new SignaturePad(canvas);

canvas.addEventListener("mouseup", function () {
    document.getElementById("signature-input").value = signaturePad.toDataURL();
});
</script>

