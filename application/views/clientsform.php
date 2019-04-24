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
<h1 class="display-4"><?= $this->lang->line('client_details'); ?></h1>
<p class="lead"></p>
</div>
</div>
<div class="row justify-content-center">
<div class="col-sm-10 col-lg-6">
<?php 
$attributes = array('id' => 'clientForm');
echo form_open("inspection/client_save", $attributes);?>
<?php if (isset($id_client)) {?>
	<input type="hidden" name ="id_client" value ="<?= $id_client ?>">
<?php } ?>
    <div class="form-group">
        <label for="name_client"><?= $this->lang->line('name_client'); ?></label>
        <input type="text" class="form-control" id="name_client" name ="name_client" value ="<?= $name_client ?>">
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
     <div class="form-group">
        <label for="vatno_client"><?= $this->lang->line('vatno_client'); ?></label>
        <input type="text" class="form-control" id="vatno_client" name ="vatno_client" value ="<?= $vatno_client ?>"  onfocusout="checkifexists(this, 8)">
    </div>
    <div class="form-group">
        <label for="address_client"><?= $this->lang->line('address_client'); ?></label>
        <input type="text" class="form-control" id="address_client" name ="address_client" value ="<?= $address_client ?>">
    </div>
    <div class="form-group">
        <label for="zip_client"><?= $this->lang->line('zip_client'); ?></label>
        <input type="text" class="form-control" id="zip_client" name ="zip_client" value ="<?= $zip_client ?>">
    </div>
	<div class="form-group">
        <label for="email_client"><?= $this->lang->line('email_client'); ?></label>
        <input type="text" class="form-control" id="email_client" name ="email_client" value ="<?= $email_client ?>"  onfocusout="checkifexists(this, 7)">
    </div>
    <div class="form-group">
        <label for="tel_client"><?= $this->lang->line('tel_client'); ?></label>
        <input type="text" class="form-control" id="tel_client" name ="tel_client" value ="<?= $tel_client ?>">
    </div>
    
	<?php if (!isset($hasaccount) || !$hasaccount) { ?>
    <div class="form-group form-check">
    <input type="checkbox" class="form-check-input" name="createaccount" id="createaccount" value = "1">
    <label class="form-check-label" for="createaccount"><?= $this->lang->line('createaccount'); ?></label>
  </div>
  <?php } ?>
   <button type="submit" class="btn btn-primary" disabled><?= $this->lang->line('submit'); ?></button>
<?php echo form_close();?>
</div>
</div>
</div>
<script type="text/javascript">
       jQuery(document).ready(function($){
		$('#clientForm').on('input change', function() {
    	$('.btn.btn-primary').attr('disabled', false);
  });
      
      $('#clientForm').formValidation({
			framework: 'bootstrap4',
			icon: false,
			fields: {
				name_client: {
					validators: {
						notEmpty: {
							message: '<?= $this->lang->line('required_field'); ?>'
						},
											}
				},
				vatno_client: {
					validators: {
						notEmpty: {
							message: '<?= $this->lang->line('required_field'); ?>'
						},
											}
				},
                address_client: {
					validators: {
						notEmpty: {
							message: '<?= $this->lang->line('required_field'); ?>'
						},
											}
				},
                zip_client: {
					validators: {
						notEmpty: {
							message: '<?= $this->lang->line('required_field'); ?>'
						},
											}
				},
                tel_client: {
					validators: {
						notEmpty: {
							message: '<?= $this->lang->line('required_field'); ?>'
						},
											}
				},
                email_client: {
						validators: {
							notEmpty: {
							message: '<?= $this->lang->line('required_field'); ?>'
						},
							emailAddress: {
								message: '<?= $this->lang->line('invalid_email'); ?>'
							},
							regexp: {
								regexp: '^[^@\\s]+@([^@\\s]+\\.)+[^@\\s]+$',
								message: '<?= $this->lang->line('invalid_email'); ?>'
							}
						}
				   },
       	   
			 
			}
			
		});	

	});	

	function checkifexists(fld, len){
		
		var chkval = fld.value;
		var chkfld  = fld.name;
	
		if (chkval.length > len) {
			$(".memberok").empty();
			$(".nomember").empty();
	$.ajax({
		type: "POST",
		dataType: "JSON",
		data: {chk_fld:chkfld, chk_val:chkval},
		url: "checkifexists",
		success: function(data){
			$.each(data, function(i,item){
				if (item.EXISTS == 'exists'){
				
			fld.value ="";
			fld.placeholder = chkval+"- <?= $this->lang->line('already_exists'); ?>";
			fld.focus();
			$('#clientForm').formValidation('revalidateField', chkfld);
	
				} else {
		  
						}
			});
			}
		
	  
	}); 
	}
	}
    </script>
