<div class="content">

  	<div class="page-header">
 
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url('admin/')?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><?php if($heading){ echo $heading;}?></li>
      </ol>
	</div>

<div class="container-default">
	<div class="col-lg-12">
	<?php $this->lib->alert_message();?>
	<div class="clearfix"></div>
		<div class="panel panel-default col-lg-4 margin-10">
		<h3>Add New Menu</h3>
			<form class="form" action="<?php echo base_url('admin/menu/add')?>" method="post">
				<div class="form-group">
					<label>Menu Name</label>
					<input type="text" class="form-control" name="menu_name" required placeholder="Enter Menu Name" autofocus>
				</div>

				<div class="form-group">
					<label>Menu Link</label>
					<input type="text" class="form-control" name="menu_link" required placeholder="Enter Menu Link" autofocus>
				</div>
				
				<div class="form-group">
					<label>Menu Order</label>
					<select class="form-control" name="menu_order" required>
						<?php for($i=1;$i<=10;$i++){
							echo '<option value="'.$i.'">'.$i.'</option>';
						}?>
					</select>
				</div>

				<div class="form-group">
					<label>Parent Menu</label>
					<select class="form-control" name="parent_menu" required>
						<option value="0">NONE</option>
						<?php if($menus){
						foreach($menus as $sd){
							echo '<option value="'.$sd->id.'">'.$sd->menu_name.'</option>';
						} } ?>
					</select>
				</div>
				
				<div class="form-group">
					<button class="btn btn-primary btn-icon"><i class="fa fa-save"></i> Save Menu</button>
				</div>
				
				
			</form>
		
		</div>
	
		<div class="panel panel-default col-lg-7 margin-10" >
			<h4>List of Menus</h4>
			<hr>
			<table class="table table-hover table-responsive">
				<thead>
					<tr>
						<th>Sr No</th>
						<th>Name</th>
						<th>Order Number</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php 
					if($menus){
					$i=1;
						foreach($menus as $sd){
						?>
						<tr>
							<td><strong>#<?php echo $i;?></strong></td>
							<td><strong><?php echo $sd->menu_name;?></strong></td>
							<td><strong><?php echo $sd->menu_order;?></strong></td>
							<td>
								<button class="btn btn-icon btn-info" onclick="$('#loadData').load('<?php echo base_url('admin/menu/edit/'.$sd->id)?>');" data-toggle="modal" data-target="#myModal"><i class="fa fa-edit"></i></button>
								<a onclick="return confirm('Are you sure want to trash this menu?')" href="<?php echo base_url('admin/menu/del/'.$sd->id)?>"><button class="btn btn-icon btn-danger"><i class="fa fa-trash"></i></button></a>
							</td>
						</tr>
						<?php
						$i++;
						}
						
					}else{
					?>
					<tr>
						<td colspan="4"><i class='fa fa-inbox'></i> No active Record at moment</td>
					</tr>
					<?php
					}	
					
					?>
				</tbody>
			</table>
		
		</div>

	</div>
	<div class="clearfix"></div>
</div>

</div>