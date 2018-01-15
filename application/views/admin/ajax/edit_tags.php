<h3>Edit Tags : <?php echo $tags->tag_name;?></h3>
			<form class="form" action="<?php echo base_url('admin/tags/save')?>" method="post">
				<div class="form-group">
					<label>Tag Name</label>
					<input type="text" class="form-control" name="tag_name" required placeholder="Enter Tag Name" autofocus value="<?php echo $tags->tag_name;?>">
					<input type="hidden" name="id" value="<?php echo $tags->id;?>" class="hidden">
				</div>
				
				<div class="form-group">
					<button class="btn btn-primary btn-icon"><i class="fa fa-save"></i> Save Tag</button>
				</div>
				
				
			</form>