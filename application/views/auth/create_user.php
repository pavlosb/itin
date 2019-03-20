<div class="container">
  <div class="row justify-content-center">
  <div class="col-sm-8 col-lg-6">
  <h1 class="display-4"><?php echo lang('create_user_heading');?></h1>
<p class="lead"><?php echo lang('create_user_subheading');?></p>
<?php if ($message !=""){ ?>
 <div class="alert alert-danger" role="alert"><?php echo $message;?></div>
<?php } ?>
</div>
</div>
<div class="row justify-content-center">
<div class="col-sm-8 col-lg-6">
<?php echo form_open("auth/create_user");?>

<div class="form-group">
            <?php echo lang('create_user_fname_label', 'first_name');?> <br />
            <?php echo form_input($first_name);?>
      </div>

      <div class="form-group">
            <?php echo lang('create_user_lname_label', 'last_name');?> <br />
            <?php echo form_input($last_name);?>
            </div>
      
      <?php
      if($identity_column!=='email') {
          echo '<div class="form-group">';
          echo lang('create_user_identity_label', 'identity');
         // echo '<br />';
          echo form_error('identity');
          echo form_input($identity);
          echo '</div>';
      }
      ?>

<div class="form-group">
<label for="company"><?php echo lang('create_user_company_label', 'company');?> </label>
            <?php echo form_input($company);?>
            </div>

<div class="form-group">
<label for="email"><?php echo lang('create_user_email_label', 'email');?> </label>
            <?php echo form_input($email);?>
            </div>

<div class="form-group">
<label for="phone">  <?php echo lang('create_user_phone_label', 'phone');?> </label>
            <?php echo form_input($phone);?>
            </div>

<div class="form-group">
<label for="password"><?php echo lang('create_user_password_label', 'password');?> </label>
            <?php echo form_input($password);?>
            </div>

<div class="form-group">
<label for="password_confirm">  <?php echo lang('create_user_password_confirm_label', 'password_confirm');?> </label>
            <?php echo form_input($password_confirm);?>
      </div>


      <p><?php echo form_submit('submit', lang('create_user_submit_btn'));?></p>

<?php echo form_close();?>
</div>
</div>
</div>