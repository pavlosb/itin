<div class="container">
  <div class="row justify-content-center">
  <div class="col-sm-8 col-lg-6">
  <h1 class="display-4"><?php echo lang('edit_user_heading');?></h1>
<p class="lead"><?php echo lang('edit_user_subheading');?></p>
<?php if ($message !=""){ ?>
 <div class="alert  <?php echo $msgclass;?>" role="alert"><?php echo $message;?></div>
<?php } ?>
</div>
</div>
<div class="row justify-content-center">
<div class="col-sm-8 col-lg-6">
<?php echo form_open(uri_string());?>

<div class="form-group">
<label for="first_name"><?php echo lang('edit_user_fname_label', 'first_name');?></label>
            <?php echo form_input($first_name);?>
            </div>

      <div class="form-group">
      <label for="last_name"><?php echo lang('edit_user_lname_label', 'last_name');?></label>
            <?php echo form_input($last_name);?>
            </div>

      <div class="form-group">
<label for="company"><?php echo lang('edit_user_company_label', 'company');?></label>
            <?php echo form_input($company);?>
            </div>

      <div class="form-group">
<label for="phone"><?php echo lang('edit_user_phone_label', 'phone');?></label>
            <?php echo form_input($phone);?>
            </div>

      <div class="form-group">
<label for="password"><?php echo lang('edit_user_password_label', 'password');?></label>
            <?php echo form_input($password);?>
            </div>

<div class="form-group">
<label for="password_confirm"><?php echo lang('edit_user_password_confirm_label', 'password_confirm');?><br />
            <?php echo form_input($password_confirm);?>
            </div>

      <?php if ($this->ion_auth->is_admin()): ?>

          <h3><?php echo lang('edit_user_groups_heading');?></h3>
          <?php foreach ($groups as $group):?>
          <div class="form-check form-check-inline">
                         <?php
                  $gID=$group['id'];
                  $checked = null;
                  $item = null;
                  foreach($currentGroups as $grp) {
                      if ($gID == $grp->id) {
                          $checked= ' checked="checked"';
                      break;
                      }
                  }
              ?>
              <input type="checkbox" class="form-check-input" name="groups[]" value="<?php echo $group['id'];?>"<?php echo $checked;?>>
              <label class="form-check-label" for="<?php echo htmlspecialchars($group['name'],ENT_QUOTES,'UTF-8');?>">
              <?php echo htmlspecialchars($group['name'],ENT_QUOTES,'UTF-8');?>
              </label>
              </div>
          <?php endforeach?>

      <?php endif ?>

      <?php echo form_hidden('id', $user->id);?>
      <?php echo form_hidden($csrf); ?>

      <p><?php echo form_submit('submit', lang('edit_user_submit_btn'));?></p>

<?php echo form_close();?>
</div>
</div>
</div>