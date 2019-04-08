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
        <label for="vin_vhcl">Επωνυμία </label>
        <input type="text" class="form-control" id="vin_vhcl" name ="vin_vhcl">
    </div>
    <div class="form-row">
        <div class="form-group col">
            <label for="reg_vhcl">'Ονομα</label>
            <input type="text" class="form-control" id="reg_vhcl" name ="reg_vhcl">
        </div>
        <div class="form-group col">
            <label for="reg_vhcl">Επώνυμο</label>
            <input type="text" class="form-control" id="reg_vhcl" name ="reg_vhcl">
        </div>
    </div>
     <div class="form-group">
        <label for="displ_vhcl">Α.Φ.Μ.</label>
        <input type="text" class="form-control" id="displ_vhcl" name ="displ_vhcl">
    </div>
    <div class="form-group">
        <label for="displ_vhcl">Διεύθυνση</label>
        <input type="text" class="form-control" id="displ_vhcl" name ="displ_vhcl">
    </div>
    <div class="form-group">
        <label for="displ_vhcl">Τηλέφωνο</label>
        <input type="text" class="form-control" id="displ_vhcl" name ="displ_vhcl">
    </div>
    <div class="form-group">
        <label for="displ_vhcl">email</label>
        <input type="text" class="form-control" id="displ_vhcl" name ="displ_vhcl">
    </div>
  
   <button type="submit" class="btn btn-primary">Submit</button>
<?php echo form_close();?>
</div>
</div>
</div>