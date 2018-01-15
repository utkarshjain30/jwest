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
				<form class="form" action="<?php echo base_url('admin/products/save')?>" enctype="multipart/form-data" method="post">
					<h3><i class="fa fa-edit fa-fw"></i> Edit Product : <?php echo $cat_info->product_name;?></h3>
					<input name="id" value="<?php echo base64_encode($cat_info->id);?>" type="hidden" class="hidden">
					<div class="col-lg-4 form-group">
						<label>Product Name</label>
						<input type="text" name="product_name" class="form-control" value="<?php echo $cat_info->product_name;?>" placeholder="Enter Product Name" required>
					</div>

					<div class="col-lg-4 form-group">
						<label>Product Code</label>
						<input type="text" name="product_code" class="form-control" value="<?php echo $cat_info->product_code;?>" placeholder="Enter Product Code" required>
					</div>

					<!-- <div class="col-lg-4 form-group">
						<label>Product SKU</label>
						<input type="text" name="product_sku" class="form-control" placeholder="Enter Product SKU" required>
					</div> -->

					<div class="col-lg-4 form-group">
						<label>Product Categories</label>
						<select name="product_categories" class="form-control" required>
							<option value="">---Select Product Category---</option>
							<?php $categories = $this->lib->get_table('categories',array('category_name'=>'asc'),NULL,50);
							if($categories){
								foreach($categories as $cat){
									if($cat->id == $cat_info->product_categories){
										$selected = 'selected';
									}else{
										$selected = '';
									}
									echo '<option '.$selected.' value="'.$cat->id.'">'.$cat->category_name.'</option>';
								}
							}?>
						</select>
					</div>				

					<div class="col-lg-6 form-group">
						<label>Product Sizes</label>
						<select name="product_size[]" multiple class="form-control" required>
							<option value="">---Select Product Sizes---</option>
							<?php  
							$sizes = $this->lib->get_table('product_sizes',array('id'=>'asc'),NULL,50);
							if($sizes){
								foreach($sizes as $sz){?>
									<option <?php if(strpos($cat_info->product_size, $sz->id) !== false){ echo 'selected'; }else{ echo ''; } ?> value="<?php echo $sz->id; ?>"><?php echo $sz->size_code; ?></option>
								<?php }
							}?>
						</select>
					</div>
					<div class="col-lg-6 form-group">
						<label>Product Colors</label>
						<select multiple name="product_colors[]" class="form-control" required>
							<option value="">---Select Product Colors---</option>
							<?php $colors = $this->lib->get_table('product_colors',array('color_name'=>'asc'),NULL,50);
							if($categories){
								foreach($colors as $col){?>
									<option <?php if(strpos($cat_info->product_colors, $col->id) !== false){ echo 'selected'; }else{ echo ''; } ?> value="<?php echo $col->id; ?>"><?php echo $col->color_name; ?></option>	
								<?php }
							}?>
						</select>
					</div>					

					<div class="col-lg-12 form-group">
						<label>Product Full Description</label>
						<textarea name="product_full_description" id="editor_kama" class="form-control" rows="20"><?php echo $cat_info->product_full_description;?></textarea>
					</div>
				
					<div class="col-lg-6 form-group">
						<label>Product Regular Price</label>
						<input required type="number" name="product_regular_price" class="form-control" value="<?php echo $cat_info->product_regular_price?>" placeholder="Enter Product Regular Price">
					</div>

					<div class="col-lg-6 form-group">
						<label>Product Sale Price</label>
						<input required type="number" name="product_sale_price" class="form-control" value="<?php echo $cat_info->product_sale_price;?>" placeholder="Enter Product Sale Price">
					</div>	
					
					<div class="col-lg-4 form-group">
						<label>Product Featured Status</label>
						<select name="is_featured" class="form-control" required>
							<option value="">---Select Product Featured Status---</option>
							<option <?php if($cat_info->is_featured == 1){
								echo 'selected';
							} ?> value="1">YES</option>
							<option <?php if($cat_info->is_featured == 0){
								echo 'selected';
							} ?> value="0">NO</option>
						</select>
					</div>

					<div class="col-lg-4 form-group">
						<label>Product Stock Status</label>
						<select name="product_stock_status" class="form-control" required>
							<option <?php if($cat_info->product_stock_status == 1){
								echo 'selected';
							} ?> value="1">IN STOCK</option>
							<option <?php if($cat_info->product_stock_status == 0){
								echo 'selected';
							} ?> value="0">OUT OF STOCK</option>
						</select>
					</div>

					<div class="col-lg-4 form-group">
						<label>Product Status</label>
						<select name="product_status" class="form-control" required>
							<option <?php if($cat_info->product_status == 0){
								echo 'selected';
							} ?> value="1">ACTIVE</option>
							<option <?php if($cat_info->product_status == 0){
								echo 'selected';
							} ?> value="0">INACTIVE</option>
						</select>
					</div>

					<div class="col-lg-4 form-group">
						<label>Product Featured Image</label>
						<p class="help-block">Please select image of height : <?php echo $product_featured_image_h;?>px and width <?php echo $product_featured_image_w;?>px</p>
						<input type="file" accept="image/*" class="hidden" id="file_select" name="product_featured_image">
						<span class="btn btn-default" onclick="$('#file_select').click();"><i class="fa fa-upload"></i> Select file</span>
						<div style="margin:10px auto">
							<img src="<?php echo base_url().$cat_info->product_featured_image; ?>" id="preview" style='max-width: 275px;' height="auto">
						</div>
					</div>

					<div class="col-lg-8 form-group">
						<label>Product Gallery Images</label>
						<p class="help-block">Please select image of height : <?php echo $product_featured_image_h;?>px and width <?php echo $product_featured_image_w;?>px</p>
						<input type="file" accept="image/*" multiple class="hidden" id="file_select1" name="product_gallery_images[]">
						<span class="btn btn-default" onclick="$('#file_select1').click();"><i class="fa fa-upload"></i> Select file</span>
						<?php $gallery_images = explode(',',$cat_info->product_gallery_images);
						echo '<p style="font-size:20px; margin-top:10px;">'.sizeof($gallery_images).' Images</p>';
						?>
						<div style="margin:10px auto">
							<?php 
							
							foreach($gallery_images as $gi){ 
								$gallery = $this->lib->get_row_array('products_gallery_images',array('id'=>$gi));
								?>
								<div style="float: left;">
									<a class="gallery_delete" id="<?php echo $gallery->id; ?>" title="Click Here to Delete">
										<i style="float: right;" class="fa fa-times-circle fa-2x" aria-hidden="true"></i>
									</a>	
									<img id="image_<?php echo $gallery->id; ?>" src="<?php echo base_url().$gallery->image; ?>" style='max-width: 150px; display: block; margin-right: 10px; margin-bottom: 10px;' height="auto">
									
								</div>
							<?php } ?>
						</div>
					</div>

					<div class="col-lg-4 form-group">
						<button class="btn btn-primary btn-icon btn-block"><i class="fa fa-save"></i> Save Product</button>
					</div>
				</form>
		</div>
		
	</div>
	<div class="clearfix"></div>
	
</div>

<script type="text/javascript">

$('.gallery_delete').click(function(){ 

	var x = confirm("Are you sure you want to delete this gallery image?");
	
	if(x){
		deleteFile( $(this).attr('id') );
	}     
	
});

function deleteFile(id){
    $.ajax({ 
    	url : '<?php echo base_url(); ?>'+'admin/products/gallery_delete/'+id,   	
        //url: 'gallery_delete.php?fileid='+id,
        success: function() {
            jQuery('#image_'+id).hide();
            jQuery('#'+id).hide();
        }
    });
}
</script>


