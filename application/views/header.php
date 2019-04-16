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
  <header>
  <nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#itinnavbartoggle" aria-controls="itinnavbartoggle" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <a class="navbar-brand" href="<?php echo base_url(); ?>inspection">ITIN <img src="<?php echo base_url(); ?>assets/images/itin-dekra.png" width="24" height="30" alt=""></a>

  <div class="collapse navbar-collapse" id="itinnavbartoggle">
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Πελάτες
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="<?php echo base_url(); ?>inspection/client_add">Νέος Πελάτης</a>
          <a class="dropdown-item" href="<?php echo base_url(); ?>inspection/clients_list">Κατάλογος</a>
          </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Οχήματα 
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="<?php echo base_url(); ?>inspection/vehicle_add">Νέο Όχημα</a>
          <a class="dropdown-item" href="<?php echo base_url(); ?>inspection/vehicles_list">Κατάλογος</a>
         </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Επιθεωρήσεις
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="<?php echo base_url(); ?>inspection/inspection_new">Νέα Επιθεώρηση</a>
          <a class="dropdown-item" href="<?php echo base_url(); ?>inspection/inspections_list">Κατάλογος</a>
          </div>
      </li>
    </ul>
    <span class="navbar-text">
      <?php echo $username ?> | <a href="<?php echo base_url(); ?>auth/logout">Αποσύνδεση</a>
    </span>
  </div>
</nav>
</header>