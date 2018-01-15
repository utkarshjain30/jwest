<h3>Edit Menu : <?php echo $sizes->size_name;?></h3>
			<form class="form" action="<?php echo base_url('admin/sizes/save')?>" method="post">
				<div class="form-group">
					<label>Size Name</label>
					<input type="text" class="form-control" name="size_name" required placeholder="Enter Size Name" autofocus value="<?php echo $sizes->size_name;?>">
					<input type="hidden" name="id" value="<?php echo $sizes->id;?>" class="hidden">
				</div>
				
				<div class="form-group">
					<label>Size Code</label>
					<input type="text" class="form-control" name="size_code" required placeholder="Enter Size Code" value="<?php echo $sizes->size_code;?>">
				</div>
				
				<div class="form-group">
					<label>Size Description</label>
					<textarea name="size_description" id="editor_kama" class="form-control" rows="20"><?php echo $sizes->size_description; ?></textarea>
				</div>
				
				<div class="form-group">
					<button class="btn btn-primary btn-icon"><i class="fa fa-save"></i> Save Size</button>
				</div>
				
				
			</form>