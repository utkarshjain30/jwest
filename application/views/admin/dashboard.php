<div class="content">

  <!-- Start Page breadcrumb -->
  <div class="page-header">
 
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url('admin')?>"><i class='fa fa-dashboard'></i> Dashboard</a></li>
		<li><?php if($heading){ echo $heading;}?></li>
      </ol>
</div>

<div class="container-default">
	<div class="row">
	<div class="col-lg-12 ">
		<?php echo $this->lib->alert_message();?>
		<div class="col-lg-12 dashboard">
			
			<div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 ">
				<a href="<?php echo base_url('admin/videos')?>"><div class="padding-5 margin-5 panel-warning tiles">
					<h1><i class="fa fa-video-camera fa-2x"></i></h1>
					<h3> Videos</h3>
				</div></a>
			</div>
			
			<div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 ">
				<a href="<?php echo base_url('admin/users')?>"><div class="padding-5 margin-5 panel-success tiles">
					<h1><i class="fa fa-users fa-2x"></i></h1>
					<h3>10 Users</h3>
				</div></a>
			</div>
			
		
			<div class="clearfix"></div>
			
			<div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 ">
				<a href="<?php echo base_url('admin/notify')?>"><div class="padding-5 margin-5 panel-info tiles">
					
					<h3> <i class="fa fa-bell fa-fw fa-lg"></i> Notification</h3>
				</div></a>
			</div>
			
			<div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 ">
				<a href="<?php echo base_url('admin/contacts')?>"><div class="padding-5 margin-5 panel-success tiles">
					
					<h3> <i class="fa fa-envelope fa-fw fa-lg"></i> Enquiries</h3>
				</div></a>
			</div>
			
			<div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 ">
				<a href="<?php echo base_url('admin/settings')?>"><div class="padding-5 margin-5 panel-primary tiles">
					
					<h3> <i class="fa fa-gears fa-fw fa-lg"></i> Setings</h3>
				</div></a>
			</div>
			
			
		</div>
		
		
		
	</div>
	<div class="clearfix"></div>
</div>
</div>




<style>
	.tiles{
	color:#fff;
	text-align:center;
	}
	
	.dashboard a i,a h1,a h3{
	color:#fff !important;
	}
	
	.list-unstyled li{
		text-align: left;
		padding-left: 5px;
	}
	
	.recent{
	height:150px;
	overflow-y:hidden;
	
	}
	
	.recent:hover{
	overflow-y:scroll;
	}
</style>
	
