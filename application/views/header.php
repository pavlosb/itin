<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
   <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css">
   <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/all.min.css">
   <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/custom.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.0-alpha14/css/tempusdominus-bootstrap-4.min.css" />
   <script src="<?php echo base_url(); ?>assets/js/jquery-3.3.1.min.js"></script>
    <title>ITIN</title>
  </head>
  <body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#itinnavbartoggle" aria-controls="itinnavbartoggle" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <a class="navbar-brand" href="#">ITIN</a>

  <div class="collapse navbar-collapse" id="itinnavbartoggle">
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
      <li class="nav-item">
        <a class="nav-link" href="#">Home </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Link</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#" >Disabled</a>
      </li>
    </ul>
    <span class="navbar-text">
      <?php echo $username ?> | <a href="<?php echo base_url(); ?>auth/logout">Logout</a>
    </span>
  </div>
</nav>