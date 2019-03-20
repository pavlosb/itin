
<div class="container">
  <div class="row justify-content-center">
  <div class="col-sm-12 col-lg-12">
  <h1 class="display-4"><?php echo lang('index_heading');?></h1>
<p class="lead"><?php echo lang('index_subheading');?></p>

<?php if ($message !=""){ ?>
 <div class="alert alert-danger" role="alert"><?php echo $message;?></div>
<?php } ?>
</div>
</div>
<div class="row justify-content-center">
<div class="col-sm-12 col-lg-12">
<div class="table-responsive-sm">
<table class= "table table-striped">
<thead>
	<tr>
		<th scope="col"><?php echo lang('index_fname_th');?> <?php echo lang('index_lname_th');?></th>
		<th scope="col"><?php echo lang('index_email_th');?></th>
		<th scope="col" class="text-center"><?php echo lang('index_groups_th');?></th>
		<th scope="col" class="text-center"><?php echo lang('index_status_th');?></th>
		<th scope="col" class="text-center"><?php echo lang('index_action_th');?></th>
	</tr>
	</thead>
  <tbody>
	<?php foreach ($users as $user):?>
		<tr>
            <td><?php echo htmlspecialchars($user->first_name,ENT_QUOTES,'UTF-8');?> <?php echo htmlspecialchars($user->last_name,ENT_QUOTES,'UTF-8');?></td>
            <td><?php echo htmlspecialchars($user->email,ENT_QUOTES,'UTF-8');?></td>
			<td class="text-center">
				<?php foreach ($user->groups as $group):?>
				<span class="badge badge-primary badge-pill">	<?php echo anchor("auth/edit_group/".$group->id, htmlspecialchars($group->name,ENT_QUOTES,'UTF-8')) ;?></span>
                <?php endforeach?>
			</td>
			<td class="text-center"><?php echo ($user->active) ? anchor("auth/deactivate/".$user->id, '<i class="green far fa-traffic-light-go fa-lg"></i>') : anchor("auth/activate/". $user->id, '<i class="red fal fa-traffic-light-stop fa-lg"></i>');?></td>
			<td class="text-center"><?php echo anchor("auth/edit_user/".$user->id, '<i class="far fa-edit fa-lg"></i>') ;?></td>
		</tr>
	<?php endforeach;?>
	</tbody>
</table>
</div>
<p><?php echo anchor('auth/create_user', lang('index_create_user_link'))?> | <?php echo anchor('auth/create_group', lang('index_create_group_link'))?></p>
</div>
</div>
</div>