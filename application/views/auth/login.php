<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/images/favicon.png" />
    <!-- Bootstrap CSS -->
   <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css">
   <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/all.min.css">
   <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/formValidation.min.css">
   <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.18/r-2.2.2/rg-1.1.0/datatables.min.css"/>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.0-alpha14/css/tempusdominus-bootstrap-4.min.css" />
   <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/custom.css">




   <script src="<?php echo base_url(); ?>assets/js/jquery-3.3.1.min.js"></script>
   <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.18/r-2.2.2/rg-1.1.0/datatables.min.js"></script>
  
 

    <title>ITIN</title>
  </head>
  <body>
<div class="container mt-5">
  <div class="row justify-content-center">
  <div class="col-sm-8 col-lg-6">
<h1 class="display-4"><?php echo lang('login_heading');?></h1>
<p class="lead"><?php echo lang('login_subheading');?></p>
<p class="text-danger">DEV Environment DO NOT USE!</p>
<?php if ($message !=""){ ?>
<div class="alert <?php echo $msgclass;?>" role="alert"><?php echo $message;?></div>
<?php } ?>
</div>
</div>
<div class="row justify-content-center">
<div class="col-sm-8 col-lg-6">
<?php echo form_open("auth/login");?>

<div class="form-group">
  <label for="identity"><?php echo lang('login_identity_label', 'identity');?></label>
    <?php echo form_input($identity);?>
    </div>

  <div class="form-group">
  <label for="password"><?php echo lang('login_password_label', 'password');?></label>
    <?php echo form_input($password);?>
    </div>

  <div class="form-group form-check">
    <?php echo form_checkbox('remember', '1', FALSE, array('id' => 'remember', 'class' => 'form-check-input'));?>
    <label class="form-check-label" for="remember"><?php echo lang('login_remember_label', 'remember');?></label>
  </div>


  <p><?php echo form_submit('submit', lang('login_submit_btn'));?></p>

<?php echo form_close();?>

<p><a href="forgot_password"><?php echo lang('login_forgot_password');?></a></p>
</div>
</div>
</div>
<script src="<?php echo base_url(); ?>assets/js/bootstrap.bundle.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/moment.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/gauge.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/formValidation.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/framework/bootstrap4.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/bootbox.all.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/clipboard.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.0-alpha14/js/tempusdominus-bootstrap-4.min.js"></script>
  
</body>
</html>
