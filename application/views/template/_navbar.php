<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title><?php echo $title ?? 'OrangeFarmNews the voice of the people since 2012 (DashBoard)'; ?></title>

  <!-- Custom fonts for this template-->
  <link href="<?php echo base_url('assets/panel/vendor/fontawesome-free/css/all.min.css'); ?>" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="<?php echo base_url('assets/panel/css/sb-admin-2.min.css'); ?>" rel="stylesheet">

</head>

<body <?php echo in_array(strtolower($active ?? ''), array('register','login','password')) ? 'class="bg-gradient-primary"' : 'id="page-top"'; ?>>
