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
			<form class="form" action="<?php echo base_url('admin/products/add')?>" enctype="multipart/form-data" method="post">
				<h3>Add Product</h3>

					<div class="col-lg-4 form-group">
						<label>Product Name</label>
						<input type="text" name="product_name" class="form-control" placeholder="Enter Product Name" required>
					</div>

					<div class="col-lg-4 form-group">
						<label>Product Code</label>
						<input type="text" name="product_code" class="form-control" placeholder="Enter Product Code" required>
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
								foreach($categories as $cat)
								echo '<option value="'.$cat->id.'">'.$cat->category_name.'</option>';
							}?>
						</select>
					</div>
					<div class="col-lg-6 form-group">
						<label>Product Sizes</label>
						<select name="product_size[]" multiple class="form-control" required>
							<option value="">---Select Product Sizes---</option>
							<?php $sizes = $this->lib->get_table('product_sizes',array('id'=>'asc'),NULL,50);
							if($sizes){
								foreach($sizes as $sz)
								echo '<option value="'.$sz->id.'">'.$sz->size_code.'</option>';
							}?>
						</select>
					</div>
					<div class="col-lg-6 form-group">
						<label>Product Colors</label>
						<select multiple name="product_colors[]" class="form-control" required>
							<option value="">---Select Product Colors---</option>
							<?php $colors = $this->lib->get_table('product_colors',array('color_name'=>'asc'),NULL,50);
							if($categories){
								foreach($colors as $col)
								echo '<option value="'.$col->id.'">'.$col->color_name.'</option>';
							}?>
						</select>
					</div>					

					<!-- <div class="col-lg-6 form-group">
						<label>Product Short Description</label>
						<textarea name="product_short_description" id="editor_kama" class="form-control" rows="20"></textarea>
					</div>
 -->
					<div class="col-lg-12 form-group">
						<label>Product Full Description</label>
						<textarea name="product_full_description" id="editor_kama" class="form-control" rows="20"></textarea>
					</div>
				
					<div class="col-lg-6 form-group">
						<label>Product Regular Price</label>
						<input required type="number" name="product_regular_price" class="form-control" placeholder="Enter Product Regular Price">
					</div>

					<div class="col-lg-6 form-group">
						<label>Product Sale Price</label>
						<input required type="number" name="product_sale_price" class="form-control" placeholder="Enter Product Sale Price">
					</div>	
				
					

					<!-- <div class="col-lg-6 form-group">
						<label>Product Weight</label>
						<input type="number" name="product_weight" class="form-control" placeholder="Enter Product Weight">
					</div>

					<div class="col-lg-6 form-group">
						<label>Product Length</label>
						<input type="number" name="product_length" class="form-control" placeholder="Enter Product Length">
					</div>

					<div class="col-lg-6 form-group">
						<label>Product Width</label>
						<input type="number" name="product_width" class="form-control" placeholder="Enter Product Width">
					</div>

					<div class="col-lg-6 form-group">
						<label>Product Height</label>
						<input type="number" name="product_height" class="form-control" placeholder="Enter Product Height">
					</div>

					<div class="col-lg-6 form-group">
						<label>Product Purchase Notes</label>
						<textarea name="product_purchase_notes" id="editor_kama2" class="form-control" rows="20"></textarea>
					</div>

					<div class="col-lg-6 form-group">
						<label>Product Important Notes</label>
						<textarea name="product_important_notes" id="editor_kama3" class="form-control" rows="20"></textarea>
					</div>
 -->
					<div class="col-lg-4 form-group">
						<label>Product Featured Status</label>
						<select name="is_featured" class="form-control" required>
							<option value="">---Select Product Featured Status---</option>
							<option value="1">YES</option>
							<option value="0">NO</option>
						</select>
					</div>

					<div class="col-lg-4 form-group">
						<label>Product Stock Status</label>
						<select name="product_stock_status" class="form-control" required>
							<option value="">---Select Product Status---</option>
							<option selected value="1">IN STOCK</option>
							<option value="0">OUT OF STOCK</option>
						</select>
					</div>

					<div class="col-lg-4 form-group">
						<label>Product Status</label>
						<select name="product_status" class="form-control" required>
							<option value="">---Select Product Status---</option>
							<option selected value="1">ACTIVE</option>
							<option value="0">INACTIVE</option>
						</select>
					</div>

					<div class="col-lg-6 form-group">
						<label>Product Featured Image</label>
						<p class="help-block">Please select image of height : <?php echo $product_featured_image_h;?>px and width <?php echo $product_featured_image_w;?>px</p>
						<input type="file" accept="image/*" class="hidden" id="file_select" name="product_featured_image">
						<span class="btn btn-default" onclick="$('#file_select').click();"><i class="fa fa-upload"></i> Select file</span>
						<div style="margin:10px auto">
							<img src="http://placehold.it/275x150?text=Preview" id="preview" style='max-width: 275px;' height="auto">
						</div>
					</div>

					<div class="col-lg-6 form-group">
						<label>Product Gallery Images</label>
						<p class="help-block">Please select image of height : <?php echo $product_featured_image_h;?>px and width <?php echo $product_featured_image_w;?>px</p>
						<input type="file" accept="image/*" multiple class="hidden" id="file_select1" name="product_gallery_images[]">
						<span class="btn btn-default" onclick="$('#file_select1').click();"><i class="fa fa-upload"></i> Select file</span>
						<div style="margin:10px auto">
							<img src="http://placehold.it/275x150?text=Preview" id="preview" style='max-width: 275px;' height="auto">
						</div>
					</div>
					
					<div class="col-lg-4 form-group">
						<button class="btn btn-primary btn-block"><i class="fa fa-save"></i> Save Product</button>
					</div>
				</div>				
			</form>
		</div>
		
	</div>
	<div class="clearfix"></div>

</div>