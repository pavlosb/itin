<div class="container">
  <div class="row justify-content-center">
  <div class="col-sm-8 col-lg-6">
<h1 class="display-4"><?php echo lang('login_heading');?></h1>
<p class="lead"><?php echo lang('login_subheading');?></p>

<div class="alert alert-danger" role="alert"><?php echo $message;?></div>
</div>
</div>
<div class="row justify-content-center">
<div class="col-sm-8 col-lg-6">
<?php echo form_open("auth/login");?>

  <p>
  <label for="identity"><?php echo lang('login_identity_label', 'identity');?></label>
    <?php echo form_input($identity);?>
  </p>

  <p>
  <label for="password"><?php echo lang('login_password_label', 'password');?></label>
    <?php echo form_input($password);?>
  </p>

  <p>
    <?php echo lang('login_remember_label', 'remember');?>
    <?php echo form_checkbox('remember', '1', FALSE, 'id="remember"');?>
  </p>


  <p><?php echo form_submit('submit', lang('login_submit_btn'));?></p>

<?php echo form_close();?>

<p><a href="forgot_password"><?php echo lang('login_forgot_password');?></a></p>
</div>
</div>
</div>