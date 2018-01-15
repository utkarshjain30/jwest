<div class="content">

  <!-- Start Page breadcrumb -->
  <div class="page-header">
 
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url('admin')?>"><i class='fa fa-dashboard'></i> Dashboard</a></li>
		<li><?php if($heading){ echo $heading;}?></li>
      </ol>
</div>

<div class="container-default">
	<div class="col-lg-12">
		<?php echo $this->lib->alert_message();?>
		
		<div class="col-lg-12 panel panel-default">
		<a href='<?php echo base_url()."admin/products/add_new"?>'><button class="btn btn-primary btn-icon"><i class="fa fa-plus"></i> Add New Product</button></a>
			<h3>All Products list</h3>
			<?php 
			if($products){
			?>	
			<table class="table table-hover">
				<thead>
					<tr>
						<th>Sr</th>
						<th>Product Name</th>
						<th>Product Code</th>
						<th>Action</th>
					</tr>
					</thead>
					<tbody>
					<?php
					$i=1;
					foreach($products as $cat){
					?>
					<tr>
						<td><?php echo $i;?></td>
						<td><?php echo $cat->product_name;?></td>
						<td><?php echo $cat->product_code;?></td>
						<td>
							<a href='<?php echo base_url('admin/products/edit/'.base64_encode($cat->id))?>'><button class="btn btn-info btn-sm btn-icon"><i class="fa fa-edit"></i></button></a>
							<a onclick="return confirm('Are you sure want to delete this product?')" href="<?php echo base_url('admin/products/del/'.$cat->id)?>"><button class="btn btn-danger btn-sm btn-icon"><i class="fa fa-trash"></i></button></a>
						</td>
					</tr>
					<?php
					$i++;
					}	
					?>
				</tbody>
			
			</table>
			<?php
			}else{
			echo 'No Products Yet';
			}
			?>
		</div>
		
	</div>
	<div class="clearfix"></div>
</div>