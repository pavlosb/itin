<div class="container">
  <div class="row justify-content-center">
  <div class="col-sm-8 col-lg-6">
<h1 class="display-4"><?php echo lang('login_heading');?></h1>
<p class="lead"><?php echo lang('login_subheading');?></p>
<?php if ($message !=""){ ?>
<div class="alert alert-danger" role="alert"><?php echo $message;?></div>
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