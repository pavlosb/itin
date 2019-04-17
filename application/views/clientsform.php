<?php
$name_client = "";
$firstname_client = "";
$lastname_client = "";
$vatno_client = "";
$address_client ="";
$zip_client ="";
$tel_client = "";
$email_client = "";

if (isset($cldata)) {
	$id_client = $cldata[0]->id_client;
	$name_client = $cldata[0]->name_client;
	$firstname_client = $cldata[0]->firstname_client;
	$lastname_client = $cldata[0]->lastname_client;
	$vatno_client = $cldata[0]->vatno_client;
	$address_client = $cldata[0]->address_client;
	$zip_client = $cldata[0]->zip_client;
	$tel_client = $cldata[0]->tel_client;
	$email_client = $cldata[0]->email_client;
}

?>
<div class="container mt-5 mb-5">
<div class="row justify-content-center">
  <div class="col-sm-10 col-lg-6">
<h1 class="display-4">Στοιχεία Πελάτη</h1>
<p class="lead"></p>
</div>
</div>
<div class="row justify-content-center">
<div class="col-sm-10 col-lg-6">
<?php 
$attributes = array('id' => 'clientForm');
echo form_open("inspection/client_save", $attributes);?>
<?php if (isset($id_client)) {?>
	<input type="hidden" name ="name_client" value ="<?= $id_client ?>">
<?php } ?>
    <div class="form-group">
        <label for="name_client">Επωνυμία </label>
        <input type="text" class="form-control" id="name_client" name ="name_client" value ="<?= $name_client ?>">
    </div>
    <div class="form-row">
        <div class="form-group col">
            <label for="firstname_client">'Ονομα</label>
            <input type="text" class="form-control" id="firstname_client" name ="firstname_client" value ="<?= $firstname_client ?>">
        </div>
        <div class="form-group col">
            <label for="lastname_client">Επώνυμο</label>
            <input type="text" class="form-control" id="lastname_client" name ="lastname_client" value ="<?= $lastname_client ?>">
        </div>
    </div>
     <div class="form-group">
        <label for="vatno_client">Α.Φ.Μ.</label>
        <input type="text" class="form-control" id="vatno_client" name ="vatno_client" value ="<?= $vatno_client ?>">
    </div>
    <div class="form-group">
        <label for="address_client">Διεύθυνση</label>
        <input type="text" class="form-control" id="address_client" name ="address_client" value ="<?= $address_client ?>">
    </div>
    <div class="form-group">
        <label for="zip_client">T.K.</label>
        <input type="text" class="form-control" id="zip_client" name ="zip_client" value ="<?= $zip_client ?>">
    </div>
    <div class="form-group">
        <label for="tel_client">Τηλέφωνο</label>
        <input type="text" class="form-control" id="tel_client" name ="tel_client" value ="<?= $tel_client ?>">
    </div>
    <div class="form-group">
        <label for="email_client">email</label>
        <input type="text" class="form-control" id="email_client" name ="email_client" value ="<?= $email_client ?>">
    </div>
    <div class="form-group form-check">
    <input type="checkbox" class="form-check-input" name="createaccount" id="createaccount" value = "1">
    <label class="form-check-label" for="createaccount">Δημιουργία Λογαριασμού</label>
  </div>
  
   <button type="submit" id="submit" class="btn btn-primary" disabled>Καταχώρηση</button>
<?php echo form_close();?>
</div>
</div>
</div>
<script type="text/javascript">
       jQuery(document).ready(function($){
		$('#clientForm').on('input change', function() {
    	$('#submit').attr('disabled', false);
  });
      
      $('#clientForm').formValidation({
			framework: 'bootstrap4',
			icon: false,
			fields: {
				name_client: {
					validators: {
						notEmpty: {
							message: 'Απαιτούμενο πεδίο'
						},
											}
				},
				vatno_client: {
					validators: {
						notEmpty: {
							message: 'Απαιτούμενο πεδίο'
						},
											}
				},
                address_client: {
					validators: {
						notEmpty: {
							message: 'Απαιτούμενο πεδίο'
						},
											}
				},
                zip_client: {
					validators: {
						notEmpty: {
							message: 'Απαιτούμενο πεδίο'
						},
											}
				},
                tel_client: {
					validators: {
						notEmpty: {
							message: 'Απαιτούμενο πεδίο'
						},
											}
				},
                email_client: {
						validators: {
							notEmpty: {
							message: 'Απαιτούμενο πεδίο'
						},
							emailAddress: {
								message: 'Η διεύθυνση email δεν είναι έγκυρη'
							},
							regexp: {
								regexp: '^[^@\\s]+@([^@\\s]+\\.)+[^@\\s]+$',
								message: 'Η διεύθυνση email δεν είναι έγκυρη'
							}
						}
				   },
       	   
			 
			}
			
		});	

	});	
    </script>
