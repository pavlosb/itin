<div class="container">
<div class="row justify-content-center">
  <div class="col-sm-8 col-lg-6">
<h1 class="display-4">Στοιχεία Πελάτη</h1>
<p class="lead"></p>
</div>
</div>
<div class="row justify-content-center">
<div class="col-sm-8 col-lg-6">
<?php echo form_open("inspection/client_save");?>
    <div class="form-group">
        <label for="name_client">Επωνυμία </label>
        <input type="text" class="form-control" id="name_client" name ="name_client">
    </div>
    <div class="form-row">
        <div class="form-group col">
            <label for="firstname_client">'Ονομα</label>
            <input type="text" class="form-control" id="firstname_client" name ="firstname_client">
        </div>
        <div class="form-group col">
            <label for="lastname_client">Επώνυμο</label>
            <input type="text" class="form-control" id="lastname_client" name ="lastname_client">
        </div>
    </div>
     <div class="form-group">
        <label for="vatno_client">Α.Φ.Μ.</label>
        <input type="text" class="form-control" id="vatno_client" name ="vatno_client">
    </div>
    <div class="form-group">
        <label for="address_client">Διεύθυνση</label>
        <input type="text" class="form-control" id="address_client" name ="address_client">
    </div>
    <div class="form-group">
        <label for="zip_client">T.K.</label>
        <input type="text" class="form-control" id="zip_client" name ="zip_client">
    </div>
    <div class="form-group">
        <label for="tel_client">Τηλέφωνο</label>
        <input type="text" class="form-control" id="tel_client" name ="tel_client">
    </div>
    <div class="form-group">
        <label for="email_client">email</label>
        <input type="text" class="form-control" id="email_client" name ="email_client">
    </div>
    <div class="form-group form-check">
    <input type="checkbox" class="form-check-input" name="createaccount" id="createaccount" value = "1">
    <label class="form-check-label" for="createaccount">Δημιουργία Λογαριασμού</label>
  </div>
  
   <button type="submit" class="btn btn-primary">Submit</button>
<?php echo form_close();?>
</div>
</div>
</div>