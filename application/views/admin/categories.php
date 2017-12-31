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
		<h3>Add New Category</h3>
			<form class="form" action="<?php echo base_url('admin/categories/add')?>" method="post">
				<div class="form-group">
					<label>Name</label>
					<input type="text" class="form-control" name="category_name" required placeholder="Enter Category Name" autofocus>
				</div>
				
				<div class="form-group">
					<label>Description</label>
					<input type="text" class="form-control" name="category_description" required placeholder="Enter Category Description" >
				</div>

				<div class="form-group">
					<label>Code</label>
					<input type="text" class="form-control" name="category_code" required placeholder="Enter Category Code" >
				</div>

				<div class="form-group">
					<label>Parent Category</label>
					<select class="form-control" name="parent_category" required>
						<option value="0">NONE</option>
						<?php foreach($categories as $sd){
							echo '<option value="'.$sd->id.'">'.$sd->category_name.'</option>';
						} ?>
					</select>
				</div>
				
				<div class="form-group">
					<button class="btn btn-primary btn-icon"><i class="fa fa-save"></i> Save Category</button>
				</div>
				
				
			</form>
		
		</div>
		
		<div class="panel panel-default col-lg-7 margin-10" >
			<h4>List of Categories</h4>
			<hr>
			<table class="table table-hover table-responsive">
				<thead>
					<tr>
						<th>Sr No</th>
						<th>Name</th>
						<th>Code</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php 
					if($categories){
					$i=1;
						foreach($categories as $sd){
						?>
						<tr>
							<td><strong>#<?php echo $i;?></strong></td>
							<td><strong><?php echo $sd->category_name;?></strong></td>
							<td><strong><?php echo $sd->category_code;?></strong></td>
							<td>
								<button class="btn btn-icon btn-info" onclick="$('#loadData').load('<?php echo base_url('admin/categories/edit/'.$sd->id)?>');" data-toggle="modal" data-target="#myModal"><i class="fa fa-edit"></i></button>
								<a onclick="return confirm('Are you sure want to trash this record?')" href="<?php echo base_url('admin/categories/del/'.$sd->id)?>"><button class="btn btn-icon btn-danger"><i class="fa fa-trash"></i></button></a>
							</td>
						</tr>
						<?php
							$category =	$this->lib->get_by_id('categories','parent_category',$sd->id);
							if($category):
							$j=1;
							foreach($category as $cat){?>
								<tr>
									<td><?php echo $i.'.'.$j;?></td>
									<td><?php echo $cat->category_name;?></td>
									<td><?php echo $cat->category_code;?></td>
									<td>
										<button class="btn btn-icon btn-info" onclick="$('#loadData').load('<?php echo base_url('admin/categories/edit/'.$cat->id)?>');" data-toggle="modal" data-target="#myModal"><i class="fa fa-edit"></i></button>
										<a onclick="return confirm('Are you sure want to trash this record?')" href="<?php echo base_url('admin/categories/del/'.$cat->id)?>"><button class="btn btn-icon btn-danger"><i class="fa fa-trash"></i></button></a>
									</td>
								</tr>
						<?php $j++;	}
						endif;


						?>
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