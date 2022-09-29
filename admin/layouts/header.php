<?php require 'conf/constantes.php' ; ?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="Dashboard">
  <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
  <title>Administration</title>

  <!-- Favicons -->
  <link href="<?= URL_BACK ?>img/favicon.png" rel="icon">
  <link href="<?= URL_BACK ?>img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Bootstrap core CSS -->
  <link href="<?= URL_BACK ?>lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!--external css-->
  <link href="lib/font-awesome/css/font-awesome.css" rel="stylesheet" />
  <link rel="stylesheet" type="text/css" href="<?= URL_BACK ?>css/zabuto_calendar.css">
  <link rel="stylesheet" type="text/css" href="<?= URL_BACK ?>lib/gritter/css/jquery.gritter.css" />
  <!-- Custom styles for this template -->
  <link href="<?= URL_BACK ?>css/style.css" rel="stylesheet">
  <link href="<?= URL_BACK ?>css/style-responsive.css" rel="stylesheet">
  <script src="<?= URL_BACK ?>lib/chart-master/Chart.js"></script>

  <!-- =======================================================
    Template Name: Dashio
    Template URL: https://templatemag.com/dashio-bootstrap-admin-template/
    Author: TemplateMag.com
    License: https://templatemag.com/license/
  ======================================================= -->
</head>

<body>
  <section id="container">
    <!-- **********************************************************************************************************************************************************
        TOP BAR CONTENT & NOTIFICATIONS
        *********************************************************************************************************************************************************** -->
    <!--header start-->
    <header class="header black-bg">
      <!--logo start-->
      <a href="index.php" class="logo"><b>E<span>commerce</span></b></a>
      <div class="top-menu">
        <ul class="nav pull-right top-menu">
          <li><a class="logout" href="#">Déconnexion</a></li>
        </ul>
      </div>
    </header>
    <!--header end-->
    <!-- **********************************************************************************************************************************************************
        MAIN SIDEBAR MENU
        *********************************************************************************************************************************************************** -->
    <!--sidebar start-->
    <aside>
      <div id="sidebar" class="nav-collapse ">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu" id="nav-accordion">
          <li class="mt">
            <a href="<?= URL_BACK ?>index.php">
              <i class="fa fa-dashboard"></i>
              <span>Dashboard</span>
            </a>
          </li>
          <li class="sub-menu">
            <a href="<?= URL_BACK ?>produits">
              <i class="fa fa-phone"></i>
              <span>Produits</span>
            </a>
          </li>
          <li class="sub-menu">
            <a href="javascript: history.go(-1)">
              <i class="fa fa-backward"></i>
              <span>Retour</span>
            </a>
          </li>
        </ul>
        <!-- sidebar menu end-->
      </div>
    </aside>
    <!--sidebar end-->
    <!-- **********************************************************************************************************************************************************
        MAIN CONTENT
        *********************************************************************************************************************************************************** -->
    <!--main content start-->
    <section id="main-content">
      <section class="wrapper">
        <div class="row">
          <div class="col-lg-9 main-chart">
