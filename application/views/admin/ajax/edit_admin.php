<h3>Edit Admin : <?php echo $admin->name;?></h3>
			<form class="form" action="<?php echo base_url('admin/users/save')?>" method="post">
				<div class="form-group">
					<label>Name</label>
					<input type="text" class="form-control" name="name" required placeholder="Enter speciality name" autofocus value="<?php echo $admin->name;?>">
					<input type="hidden" name="id" value="<?php echo $admin->id;?>" class="hidden">
				</div>
				
				<div class="form-group">
					<label>Email</label>
					<input type="email" class="form-control" name="email" required placeholder="Enter admin email" value="<?php echo $admin->email;?>">
				</div>
				
				<div class="form-group">
					<label>New Password</label>
					<input type="text" class="form-control" name="password" placeholder="Leave blank if not updating it" >
				</div>
				
			
				
				<div class="form-group">
					<button class="btn btn-primary btn-icon"><i class="fa fa-save"></i> Save Admin</button>
				</div>
				
				
			</form>