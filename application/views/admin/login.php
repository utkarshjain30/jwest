<!DOCTYPE html>
<html lang="en">
  
<!-- Mirrored from themesground.com/modern/demo1/HTML/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 12 Jan 2016 10:06:09 GMT -->
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="Login to admin panel to manage components">
  <meta name="keywords" content="Admin,login" />
  <title>Login</title>

  <!-- ========== Css Files ========== -->
  <link href="<?php echo base_url('static/admin/css/root.css')?>" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
  <script src="<?php echo base_url('static/admin/js/bootstrap/bootstrap.min.js')?>"></script>
  
  <style type="text/css">
    body{background: #F5F5F5;}
	.login-form form .top {
  
    text-align: center;
    padding: 30px 0;
    background: #73CC2E;
	color:#f36d21 !important;
}
h3,h4{
	
	    color: #fff !important;
}

.login-form form .top .icon {
    width: 200px;
    height: auto;
}

.login-form form{
	border:1px solid #FF0084 !important;
}
  </style>
  </head>
  <body>

    <div class="login-form">
      <form action="<?php echo base_url('admin/login/validate')?>" method="post">
        <div class="top">
          <img src="<?php echo base_url($this->lib->get_settings('logo'))?>" width="100%" alt="<?php echo $this->lib->get_settings('sitename')?>" class="icon">
          <h3><?php //echo $this->lib->get_settings('sitename')?></h3>
          <h4>Administrator panel</h4>
        </div>
        <div class="form-area">
		<?php $this->lib->alert_message();?>
          <div class="group">
            <input type="text" class="form-control" name="email" placeholder="Email" required>
            <i class="fa fa-at"></i>
          </div>
          <div class="group">
            <input type="password" name="password" class="form-control" placeholder="Password" required>
			<input type="hidden" name="redirect" value="<?php if(isset($_GET['redirect']) AND $_GET['redirect']!=''){ echo $_GET['redirect'];}?>">
            <i class="fa fa-key"></i>
          </div>
         
          <button type="submit" class="btn btn-warning btn-block"><i class="fa fa-login"></i> LOGIN</button>
        </div>
      </form>
      <div class="footer-links row">
   
        <div class="col-xs-12 text-right"><a href="#" onclick="$('#loadData').load('<?php echo base_url('admin/login/forget_password/')?>')" data-toggle="modal" data-target="#myModal"><i class="fa fa-lock"></i> Forgot password</a></div>
      </div>
    </div>

	<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel" align="center">Action</h4>
      </div>
      <div class="modal-body" id="loadData">
        <h4 align="center"><i class="fa fa-spinner fa-pulse"></i></h4>
        <h4 align="center">Please wait...</h4>
      </div>
    </div>
  </div>
</div>
	
</body>

</html>