<div class="content">

  	<div class="page-header"> 
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url('admin/')?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><?php if($heading){ echo $heading;}?></li>
      </ol>
	</div>

	<div class="container-default">
		<div>
			<?php echo $this->lib->alert_message();?>
			<div class="col-lg-12 panel panel-default">
				<?php //print_r($banners);exit;
				foreach($banners as $b){ ?>
							
					<form class="form" action="<?php echo base_url('admin/banners/update')?>" enctype='multipart/form-data' method="post">
						<input type="hidden" name="id" value="<?php echo $b->id; ?>">
						<div class="form-group">
							
							<label class="col-lg-1">Banner <?php echo $b->id; ?>:</label>
							
							<img class="col-lg-3" src="<?php echo base_url().$b->banner_image; ?>" id="preview" style='max-width: 275px;' height="auto">	
							<input type="file" accept="image/*" class="hidden" id="file_select<?php echo $b->id; ?>" name="banner<?php echo $b->id; ?>">
							<div class="col-lg-3 form-group">
								
								<input class="form-control" type="text" name="banner_link" value="<?php echo $b->banner_link; ?>" placeholder="Enter Banner Url">
								<br><br>
								<input  class="form-control" type="text" name="banner_text" value="<?php echo $b->banner_text; ?>" placeholder="Enter Banner Text">
							</div>
							<span class="col-lg-2 btn btn-default" onclick="$('#file_select'+<?php echo $b->id; ?>).click();"><i class="fa fa-upload"></i> Select file</span>
								
							<div class="col-lg-2"><button class="btn btn-primary btn-icon btn-block"><i class="fa fa-save"></i> Update</button></div>
							
							<div class="col-lg-3" id="msg_site"></div>
						
						</div>
						<div class="clearfix"></div>
						<hr>
						<br>

					</form>	
				<?php } ?>
			</div>	
	</div>

</div>