<!DOCTYPE html>
<html lang="en">
  <head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="Modern is a Premium Bootstrap Admin Template, It's responsive, clean coded and mobile friendly">
  <meta name="keywords" content="<?php if(isset($keywords)){ echo $keywords;}else{ echo $this->lib->get_settings('meta_keywords');}?>" />
  <title>Jwest Admin : <?php if(isset($title)){ echo $title;}?></title>

  <!-- ========== Css Files ========== -->
  <link href="<?php echo base_url('static/admin/css/root.css')?>" rel="stylesheet">
	<script src="<?php echo base_url('static/front/js')?>/jquery.min.js"></script>
  </head>
  <body>

 <!-- //////////////////////////////////////////////////////////////////////////// --> 
  <!-- START TOP -->
  <div id="top" class="clearfix">

    <!-- Start App Logo -->
    <div class="applogo">
      <a href="<?php echo base_url('admin')?>" class="logo">
        <img style="width:70%;" src="<?php echo base_url($this->lib->get_settings('logo'))?>" width="100%" alt="<?php echo $this->lib->get_settings('sitename')?>" class="icon">
      </a>
    </div>
    <!-- End App Logo -->
    
     <!-- Start Sidebar Show Hide Button -->
    <a href="#" class="sidebar-open-button"><i class="fa fa-bars"></i></a>
    <a href="#" class="sidebar-open-button-mobile"><i class="fa fa-bars"></i></a>
    <!-- End Sidebar Show Hide Button -->
    
     <!-- page title -->
      <h1 class="title"><?php if(isset($icon)){ echo "<i class='".$icon." fa-lg fa-fw'></i> ";}?><?php if(isset($heading)){ echo $heading;}?></h1>
      <!-- End page title -->

   
    
    

   
    
     



    <!-- End Top Right -->

  </div>
  <!-- END TOP -->
 <!-- //////////////////////////////////////////////////////////////////////////// --> 
 <?php require('sidebar.php');?>