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
		<a href='<?php echo base_url()."admin/testimonials/add_new"?>'><button class="btn btn-primary btn-icon"><i class="fa fa-plus"></i> Add New Testimonial</button></a>
			<h3>All Testimonials list</h3>
			<?php 
			if(isset($testimonials)){
			?>	
			<table class="table table-hover">
				<thead>
					<tr>
						<th>Sr</th>
						<th>Customer Name</th>
						<th>Testimonial Content</th>
						<th>Action</th>
					</tr>
					</thead>
					<tbody>
					<?php
					$i=1;
					foreach($testimonials as $cat){
					?>
					<tr>
						<td><?php echo $i;?></td>
						<td><?php echo $cat->customer_name;?></td>
						<td><?php echo substr($cat->testimonial_content, 0, 60);?></td>
						<td>
							<a href='<?php echo base_url('admin/testimonials/edit/'.base64_encode($cat->id))?>'><button class="btn btn-info btn-sm btn-icon"><i class="fa fa-edit"></i></button></a>
							<a onclick="return confirm('Are you sure want to delete this testimonial?')" href="<?php echo base_url('admin/testimonials/del/'.base64_encode($cat->id))?>"><button class="btn btn-danger btn-sm btn-icon"><i class="fa fa-trash"></i></button></a>
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
			echo 'No Testimonials Yet';
			}
			?>
		</div>
		
	</div>
	<div class="clearfix"></div>

</div>



