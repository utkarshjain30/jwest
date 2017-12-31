<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="<?php if(isset($description)){ echo $description; }else{ echo $this->lib->get_settings('meta_detail');} ?>">

    <meta name="keywords" content="<?php if(isset($keywords)){ echo $keywords; }else{ echo $this->lib->get_settings('meta_keyword'); } ?>">
    <meta name="author" content="<?php if(isset($author)){ echo $author;}else{ echo $this->lib->get_settings('author');}?>">

    <title><?php if(isset($title)){ echo $title; }else{ echo $this->lib->get_settings('sitename'); } ?></title>
    <link href="<?php echo base_url('static/front/')?>css/bootstrap.min.css" rel="stylesheet">

    <!-- Theme CSS -->
    <link href="<?php echo base_url('static/front/')?>css/clean-blog.min.css" rel="stylesheet">
    <link href="<?php echo base_url('static/front/')?>css/main.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="<?php echo base_url('static/front/')?>/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-custom navbar-fixed-top">
        <div class="container-fluid">
           
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    Menu <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="<?php echo base_url()?>">
                	<img class="logo" src="<?php echo base_url($this->lib->get_settings('logo'))?>" heigh="auto">
                	<?php echo $this->lib->get_settings('sitename')?>
                </a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a href="<?php echo base_url()?>"><i class="fa fa-home fa-fw"></i> Home</a>
                    </li>
                    <li>
                        <a href="<?php echo base_url('about')?>"><i class="fa fa-user fa-fw"></i>About</a>
                    </li>
                    <li>
                        <a href="<?php echo base_url('post')?>"><i class="fa fa-edit fa-fw"></i> Blog</a>
                    </li>
                    <li>
                        <a href="<?php echo base_url('contact')?>"><i class="fa fa-envelope fa-fw"></i> Contact</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <!-- Page Header -->
    <!-- Set your background image for this header on the line below. -->