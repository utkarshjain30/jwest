<div class="content">

  <!-- Start Page breadcrumb -->
  <div class="page-header">
 
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url('admin')?>"><i class='fa fa-dashboard'></i> Dashboard</a></li>
		<li><?php if($heading){ echo $heading;}?></li>
      </ol>
	</div>

<div class="container-default">
	<div class="col-lg-12">
		<?php echo $this->lib->alert_message();?>
		<div class="panel panel-default col-lg-12">
			<form class="form" action="<?php echo base_url('admin/testimonials/add')?>" enctype="multipart/form-data" method="post">
				<h3>Add Testimonial</h3>
				<div class='col-lg-12'>
					<div class="form-group">
						<label>Customer Name</label>
						<input type="text" name="customer_name" class="form-control" placeholder="Enter Customer Name">
					</div>
					
					<div class="form-group">
						<label>Select Image</label>
						<p class="help-block">Please select image of height : <?php echo $testimonial_image_h?>px and width <?php echo $testimonial_image_w?> px</p>
						<input type="file" accept="image/*" class="hidden" id="file_select" name="customer_image" requird>
						<span class="btn btn-default" onclick="$('#file_select').click();"><i class="fa fa-upload"></i> Select file</span>
						<div style="margin:10px auto">
							<img src="http://placehold.it/275x150?text=Preview" id="preview" style='max-width: 275px;' height="auto">
						</div>
					</div>
					
					<div class="form-group">
						<label>Content</label>
						<textarea name="testimonial_content" id="editor_kama" class="form-control" rows="20"></textarea>
					</div>
				
					<div class="col-lg-4 form-group">
						<button class="btn btn-primary btn-block"><i class="fa fa-save"></i> Save Testimonial</button>
					</div>

				</div>
					
									
			</form>
		</div>
		
	</div>
	<div class="clearfix"></div>

</div>