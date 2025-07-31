<!doctype html>
<html lang="en">
  <head>
		<title>DCHECK</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/images/favicon.png" />
    <!-- Bootstrap CSS -->
   <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css">
   <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/all.min.css">
   <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/formValidation.min.css">
   <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.18/r-2.2.2/rg-1.1.0/datatables.min.css"/>
	 <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/2.0.7/css/dataTables.bootstrap4.css"/>
	 <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/3.0.2/css/buttons.bootstrap4.min.css"/>
	 <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/3.0.2/css/responsive.bootstrap4.min.css"/>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.0-alpha14/css/tempusdominus-bootstrap-4.min.css" />
	 <link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>assets/css/featherlight.css" />
<link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>assets/css/featherlight.gallery.css" />
   <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/custom.css">
<script src="<?php echo base_url(); ?>assets/js/jquery-3.3.1.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/webcam.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/qrcode.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/2.0.7/js/dataTables.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/2.0.7/js/dataTables.bootstrap4.js"></script>
   <!--<script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.18/r-2.2.2/rg-1.1.0/datatables.min.js"></script> -->
	 <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.2/moment.min.js"></script>
	 <script type="text/javascript" src="https://cdn.datatables.net/buttons/3.0.2/js/dataTables.buttons.js"></script>
	 <script type="text/javascript" src="https://cdn.datatables.net/buttons/3.0.2/js/buttons.bootstrap4.min.js"></script>
	 <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
	 <script type="text/javascript" src="https://cdn.datatables.net/buttons/3.0.2/js/buttons.html5.min.js"></script>
	 <script type="text/javascript" src="https://cdn.datatables.net/buttons/3.0.2/js/buttons.print.min.js"></script>
	 <script type="text/javascript" src="https://cdn.datatables.net/responsive/3.0.2/js/dataTables.responsive.min.js"></script>
	 <script type="text/javascript" src="https://cdn.datatables.net/responsive/3.0.2/js/responsive.bootstrap4.min.js"></script>
 
  </head>
  <body>
  <div class="content">  
  <header>
  <nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#itinnavbartoggle" aria-controls="itinnavbartoggle" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <a class="navbar-brand" href="<?php echo base_url(); ?>inspection"><img src="<?php echo base_url(); ?>assets/images/itin-dekra.png" width="24" height="30" alt="">CHECK</a>

  <div class="collapse navbar-collapse" id="itinnavbartoggle">
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?= $this->lang->line('mnu_clients'); ?>
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="<?php echo base_url(); ?>inspection/client_add"><?= $this->lang->line('mnu_client_add'); ?></a>
          <a class="dropdown-item" href="<?php echo base_url(); ?>inspection/clients_list"><?= $this->lang->line('mnu_clients_list'); ?></a>
          </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?= $this->lang->line('mnu_vehicles'); ?>
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="<?php echo base_url(); ?>inspection/vehicle_add"><?= $this->lang->line('mnu_vehicle_add'); ?></a>
          <a class="dropdown-item" href="<?php echo base_url(); ?>inspection/vehicles_list"><?= $this->lang->line('mnu_vehicles_list'); ?></a>
         </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?= $this->lang->line('mnu_inspections'); ?>
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="<?php echo base_url(); ?>inspection/inspection_new"><?= $this->lang->line('mnu_inspection_add'); ?></a>
          <a class="dropdown-item" href="<?php echo base_url(); ?>inspection/inspections_list"><?= $this->lang->line('mnu_inspections_list'); ?></a>
          </div>
      </li>
			<li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?= $this->lang->line('mnu_inspectors'); ?>
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <!--<a class="dropdown-item" href="<?php echo base_url(); ?>inspection/inspection_new"><?= $this->lang->line('mnu_inspector_add'); ?></a>-->
          <a class="dropdown-item" href="<?php echo base_url(); ?>inspection/inspectors_list"><?= $this->lang->line('mnu_inspectors_list'); ?></a>
          </div>
      </li>
    </ul>
    
    <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
         <i class="fas fa-user"></i>
        </a>
        <div class="dropdown-menu  dropdown-menu-right" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="<?php echo base_url(); ?>auth/edit_user/<?= $userid; ?>"><?php echo $username ?></a>
          <a class="dropdown-item" href="<?php echo base_url(); ?>auth/logout"><?= $this->lang->line('logout'); ?></a>
          </div>
      </li>
  </div>
  </ul>
  <span class="navbar-text"><a href="<?php echo base_url(); ?>languageswitcher/switchLang/english" <?php if (isset($user_lang) && $user_lang == "english") {echo "class='text-success'"; $ulcl="en";} ?>>EN</a>  <a href="<?php echo base_url(); ?>languageswitcher/switchLang/greek" <?php if (isset($user_lang) && $user_lang == "greek") {echo "class='text-success'"; $ulcl = "el"; } ?>>EL</a>
     
    </span>
</nav>
</header>
