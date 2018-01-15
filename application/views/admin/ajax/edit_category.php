<h3>Edit Category : <?php echo $categories->category_name;?></h3>
			<form class="form" action="<?php echo base_url('admin/categories/save')?>" method="post">
				<div class="form-group">
					<label>Name</label>
					<input type="text" class="form-control" name="category_name" required placeholder="Enter Category Name" autofocus value="<?php echo $categories->category_name;?>">
					<input type="hidden" name="id" value="<?php echo $categories->id;?>" class="hidden">
				</div>
				
				<div class="form-group">
					<label>Description</label>
					<input type="text" class="form-control" name="category_description" required placeholder="Enter Category Description" value="<?php echo $categories->category_description;?>">
				</div>

				<div class="form-group">
					<label>Category Code</label>
					<input type="text" class="form-control" name="category_code" required placeholder="Enter Category Code" value="<?php echo $categories->category_code;?>">
				</div>

				<div class="form-group">
					<label>Description</label>
					<select class="form-control" name="parent_category" required>
						<option value="0">NONE</option>
						<?php $category = $this->lib->get_by_id('categories','parent_category',0);
						foreach ($category as $cat) {
							if($cat->id == $categories->parent_category){
								$selected = 'selected';
							}else{
								$selected = '';
							}
							echo '<option '.$selected.' value="'.$cat->id.'">'.$cat->category_name.'</option>';
						}








						?>
					</select>
				</div>
				
				<div class="form-group">
					<button class="btn btn-primary btn-icon"><i class="fa fa-save"></i> Save Category</button>
				</div>
				
				
			</form>