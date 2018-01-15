<!DOCTYPE html>
<!--[if (gte IE 9)|!(IE)]><!-->
<html lang="en">
<!--<![endif]-->
<head>
<!-- =====  BASIC PAGE NEEDS  ===== -->
<meta charset="utf-8">
<title><?php echo $this->lib->get_settings('home_title');?></title>
<!-- =====  SEO MATE  ===== -->
<!--<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<meta name="description" content="">
<meta name="keywords" content="">
<meta name="distribution" content="global">
<meta name="revisit-after" content="2 Days">
<meta name="robots" content="ALL">
<meta name="rating" content="8 YEARS">
<meta name="Language" content="en-us">
<meta name="GOOGLEBOT" content="NOARCHIVE">-->
<!-- =====  MOBILE SPECIFICATION  ===== -->
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<meta name="viewport" content="width=device-width">
<!-- =====  CSS  ===== -->
<link rel="stylesheet" type="text/css" href="<?php echo base_url('static/front/')?>css/font-awesome.min.css"/>
<link rel="stylesheet" type="text/css" href="<?php echo base_url('static/front/')?>css/bootstrap.css"/>
<link rel="stylesheet" type="text/css" href="<?php echo base_url('static/front/')?>css/style.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('static/front/')?>css/magnific-popup.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('static/front/')?>css/owl.carousel.css">
<link href="<?php echo base_url('static/front/')?>css/bootstrap-dropdownhover.min.css" rel="stylesheet">
</head>
<body>
<!-- =====  LODER  ===== --> 
<!--<div class="loder"></div>-->
<div class="wrapper"> 
  <!-- =====  HEADER START  ===== -->
  <header id="header">
    <div class="header-top">
      <div class="container">
        <div class="row">
          <div class="col-sm-6 f">
            <ul class="header-top-right">
            </ul>
          </div>
          <div class="col-sm-6">
            <ul class="header-top-right text-right">
              <li><i class="fa fa-phone" aria-hidden="true"></i> <a title="<?php echo $this->lib->get_settings('landline');?>" href="callto:<?php echo $this->lib->get_settings('landline');?>"><?php echo $this->lib->get_settings('landline');?></a></li>
              <li><i class="fa fa-envelope" aria-hidden="true"></i> <a title="<?php echo $this->lib->get_settings('email');?>" href="mailto:<?php echo $this->lib->get_settings('email');?>"><?php echo $this->lib->get_settings('email');?></a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <div class="header">
      <div class="container">
        <nav class="navbar">
          <div class="navbar-header logo-space" align="center"> <a class="navbar-brand" align="center" href="<?php echo base_url();?>"> <img alt="" src="<?php echo base_url($this->lib->get_settings('logo'))?>" class="logo-img"> </a> </div>
          <div class="collapse navbar-collapse js-navbar-collapse pull-right">
            <ul id="menu" class="nav navbar-nav">
              <?php $menus = $this->lib->get_by_id('menus','parent_menu',0,NULL,array('menu_order'=>'ASC'));
              foreach($menus as $menu){
              if($menu->menu_link == '#' && $menu->menu_name = 'Top Category'){ ?>
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo $menu->menu_name; ?> <span class="caret"></span></a>
                  <ul class="dropdown-menu">
                    <?php $categories = $this->lib->get_by_id('categories','parent_category',0,NULL,array('category_name'=>'ASC'));
                    foreach($categories as $cat){
                      $sub_category = $this->lib->get_by_id('categories','parent_category',$cat->id);
                        if($sub_category){ ?>
                          <li class="dropdown dropdown-submenu">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#"><?php echo $cat->category_name; ?></a>
                            <ul style="right: 100%!important;" class="dropdown-menu">
                              <li><a href="#">Dropdown Submenu Link 4.1</a></li>
                            </ul>
                          </li>
                        <?php }else{ ?> 
                          <li>
                            <a href="#"><?php echo $cat->category_name; ?></a>
                          </li>
                        <?php } ?>   
                      </li>
                    <?php } ?>
                  </ul>
                </li>
                  <?php }else{ ?>
                  <li>
                    <a title="<?php echo $menu->menu_name; ?>" href="<?php 
                    echo base_url().$menu->menu_link; ?>"><?php echo $menu->menu_name; ?></a>
                  </li>
                  <?php } ?>  
                </li>
                
              <?php } ?>

            </ul>
          </div>
          
          <!-- /.nav-collapse --> 
        </nav>
      </div>
    </div>
    <div class="header-bottom">
      <div class="container">
        <div class="row">
          <div class="col-sm-4 col-md-4 col-lg-3">
            <a style="color: #000; font-weight: 600;" title="Fresh Arrivals" href="<?php echo base_url('fresh-arrivals'); ?>">
            <div class="category">
              
                <h4 class="category_text">
                  Fresh Arrivals <span class="i-bar"><i class="fa fa-bars"></i></span></h4>
                
            </div>
            </a>
          </div>
          <div class="col-sm-8 col-md-8 col-lg-9">
            <ul class="header-bottom-right">
              <li class="offers owl-carousel">
                <?php $news = $this->lib->get_table('news',array('news_order'=>'asc'),NULL,40);
                  foreach($news as $new){ ?>
                    <div class="item"><i class="fa fa-circle" aria-hidden="true"></i><?php echo $new->news_heading; ?> - <span><?php echo $new->news_content; ?> </span></div>
                  <?php } ?>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </header>
  <!-- =====  HEADER END  ===== --> 