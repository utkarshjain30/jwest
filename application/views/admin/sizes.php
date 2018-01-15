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
		<h3>Add New Size</h3>
			<form class="form" action="<?php echo base_url('admin/sizes/add')?>" method="post">
				<div class="form-group">
					<label>Size Name</label>
					<input type="text" class="form-control" name="size_name" required placeholder="Enter Size Name" autofocus>
				</div>

				<div class="form-group">
					<label>Size Code</label>
					<input type="text" class="form-control" name="size_code" required placeholder="Enter Size Code" autofocus>
				</div>
				
				<div class="form-group">
					<label>Size Description</label>
					<textarea name="size_description" id="editor_kama" class="form-control" rows="20"></textarea>
				</div>

				<div class="form-group">
					<button class="btn btn-primary btn-icon"><i class="fa fa-save"></i> Save Size</button>
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
						<th>Size Name</th>
						<th>Size Code</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php 
					if($sizes){
					$i=1;
						foreach($sizes as $sd){
						?>
						<tr>
							<td><strong>#<?php echo $i;?></strong></td>
							<td><strong><?php echo $sd->size_name;?></strong></td>
							<td><strong><?php echo $sd->size_code;?></strong></td>
							<td>
								<button class="btn btn-icon btn-info" onclick="$('#loadData').load('<?php echo base_url('admin/sizes/edit/'.$sd->id)?>');" data-toggle="modal" data-target="#myModal"><i class="fa fa-edit"></i></button>
								<a onclick="return confirm('Are you sure want to trash this size?')" href="<?php echo base_url('admin/sizes/del/'.$sd->id)?>"><button class="btn btn-icon btn-danger"><i class="fa fa-trash"></i></button></a>
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