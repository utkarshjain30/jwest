<form class="form" action="<?php echo base_url('admin/sliders/update')?>" method="post">
				<h3>Edit Slider</h3>
				<div class="form-group">
					<label>Heading</label>
					<input type="text" class="form-control" value='<?php echo $cat_info->slide_big_text;?>' name="slide_big_text" required placeholder="Enter Heading" autofocus>
				</div>
				
				<div class="form-group">
					<label>Image Order Number</label>
					<input type="number" class="form-control" value='<?php echo $cat_info->slide_order;?>' name="slide_order"  placeholder="Select Image Order Number" >
				</div>

				<div class="form-group">
					<label>Image Desciption</label>
					<input type="text" class="form-control" value='<?php echo $cat_info->sm_txt;?>' name="sm_txt"  placeholder="Enter short description" >
				</div>

				<div class="form-group">
					<label>Image Link</label>
					<input type="text" class="form-control" value='<?php echo $cat_info->link_url;?>' name="link_url"  placeholder="Enter Slide Link" >
				</div>
				
				<input name="slide_id" value="<?php echo base64_encode($cat_info->slide_id);?>" type="hidden" class="hidden">
				
				<div class="form-group">
					<button class="btn btn-success"><i class="fa fa-save"></i> Save Slider</button>
				</div>
</form>