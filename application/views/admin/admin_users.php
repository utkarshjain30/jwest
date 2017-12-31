<div class="content">

  <div class="page-header">
 
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url('admin/')?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
      </ol>
</div>

<div class="container-default">
	<div class="col-lg-12">
	<?php $this->lib->alert_message();?>
	<div class="clearfix"></div>
		<div class="panel panel-default col-lg-4 margin-10">
		<h3>Add New speciality</h3>
			<form class="form" action="<?php echo base_url('admin/specility/add')?>" method="post">
				<div class="form-group">
					<label>Name</label>
					<input type="text" class="form-control" name="name" required placeholder="Enter speciality name" autofocus>
				</div>
				
				<div class="form-group">
					<label>Description</label>
					<input type="text" class="form-control" name="description" required placeholder="Enter speciality short description" >
				</div>
				
				<div class="form-group">
					<button class="btn btn-primary btn-icon"><i class="fa fa-save"></i> Save Speciality</button>
				</div>
				
				
			</form>
		
		</div>
		
		<div class="panel panel-default col-lg-7 margin-10" >
			<h4>List of available speciality</h4>
			<hr>
			<table class="table table-hover table-responsive">
				<thead>
					<tr>
						<th>Sr No</th>
						<th>Name</th>
						<th>Description</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php 
					if($speciality){
					$i=1;
						foreach($speciality as $sd){
						?>
						<tr>
							<td><?php echo $i;?></td>
							<td><?php echo $sd->name;?></td>
							<td><?php echo $sd->description;?></td>
							<td>
								<button class="btn btn-icon btn-info" onclick="$('#loadData').load('<?php echo base_url('admin/specility/edit/'.$sd->id)?>');" data-toggle="modal" data-target="#myModal"><i class="fa fa-edit"></i></button>
								<a onclick="return confirm('Are you sure want to trash this record?')" href="<?php echo base_url('admin/specility/del/'.$sd->id)?>"><button class="btn btn-icon btn-danger"><i class="fa fa-trash"></i></button></a>
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