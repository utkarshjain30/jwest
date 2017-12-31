<h3>Edit Color : <?php echo $colors->color_name;?></h3>
			<form class="form" action="<?php echo base_url('admin/colors/save')?>" method="post">
				<div class="form-group">
					<label>Color Name</label>
					<input type="text" class="form-control" name="color_name" required placeholder="Enter Color Name" autofocus value="<?php echo $colors->color_name;?>">
					<input type="hidden" name="id" value="<?php echo $colors->id;?>" class="hidden">
				</div>
				
				<div class="form-group">
					<label>Color Code</label>
					<input type="text" class="form-control" name="color_code" required placeholder="Enter Color Code" value="<?php echo $colors->color_code;?>">
				</div>
				
				<div class="form-group">
					<label>Color Image</label>
				</div>
				
				<div class="form-group">
					<button class="btn btn-primary btn-icon"><i class="fa fa-save"></i> Save Color</button>
				</div>
				
				
			</form>