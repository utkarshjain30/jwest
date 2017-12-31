<h3>Edit Menu : <?php echo $menus->menu_name;?></h3>
			<form class="form" action="<?php echo base_url('admin/menu/save')?>" method="post">
				<div class="form-group">
					<label>Menu Name</label>
					<input type="text" class="form-control" name="menu_name" required placeholder="Enter Menu Name" autofocus value="<?php echo $menus->menu_name;?>">
					<input type="hidden" name="id" value="<?php echo $menus->id;?>" class="hidden">
				</div>
				
				<div class="form-group">
					<label>Menu Link</label>
					<input type="text" class="form-control" name="menu_link" required placeholder="Enter Menu Link" value="<?php echo $menus->menu_link;?>">
				</div>
				
				<div class="form-group">
					<label>Menu Order</label>
					<select class="form-control" name="menu_order" required>
						<?php for($i=1;$i<=10;$i++){
							if($menus->menu_order==$i){
								$selected = "selected";
							}else{
								$selected = '';
							}
							echo '<option '.$selected.' value="'.$i.'">'.$i.'</option>';
						}?>
					</select>
				</div>

				<div class="form-group">
					<label>Parent Menu</label>
					<select class="form-control" name="parent_menu" required>
						<option value="0">NONE</option>
					</select>
				</div>
				
				<div class="form-group">
					<button class="btn btn-primary btn-icon"><i class="fa fa-save"></i> Save Admin</button>
				</div>
				
				
			</form>