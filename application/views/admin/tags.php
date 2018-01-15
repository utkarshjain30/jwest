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
		<h3>Add New Tag</h3>
			<form class="form" action="<?php echo base_url('admin/tags/add')?>" method="post">
				<div class="form-group">
					<label>Tag Name</label>
					<input type="text" class="form-control" name="tag_name" required placeholder="Enter Product Tag" autofocus>
				</div>

				<div class="form-group">
					<button class="btn btn-primary btn-icon"><i class="fa fa-save"></i> Save Tag</button>
				</div>
				
				
			</form>
		
		</div>
	
		<div class="panel panel-default col-lg-7 margin-10" >
			<h4>List of Tags</h4>
			<hr>
			<table class="table table-hover table-responsive">
				<thead>
					<tr>
						<th>Sr No</th>
						<th>Tag Name</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php 
					if($tags){
					$i=1;
						foreach($tags as $sd){
						?>
						<tr>
							<td><strong>#<?php echo $i;?></strong></td>
							<td><strong><?php echo $sd->tag_name;?></strong></td>
							<td>
								<button class="btn btn-icon btn-info" onclick="$('#loadData').load('<?php echo base_url('admin/tags/edit/'.$sd->id)?>');" data-toggle="modal" data-target="#myModal"><i class="fa fa-edit"></i></button>
								<a onclick="return confirm('Are you sure want to trash this tag?')" href="<?php echo base_url('admin/tags/del/'.$sd->id)?>"><button class="btn btn-icon btn-danger"><i class="fa fa-trash"></i></button></a>
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