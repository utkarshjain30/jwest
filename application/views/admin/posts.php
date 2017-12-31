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
	</div>
	<div class="clearfix"></div>
	<a href="<?php echo base_url('admin/posts/new')?>"><button class="btn btn-primary"><i class="fa fa-edit"></i> Create New</button></a>
	<div class="clearfix"></div>
	<div class="panel panel-default">
	<?php
		if($all_posts!=''):
		$i=1;
	?>
		<table class="table table-hover">
		<thead>
			<tr>
				<th>Sr No</th>
				<th>Post title</th>
				<th>Posted on</th>
				<th>Posted by</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach($all_posts as $post):?>
			<tr>
				<td><?php echo $i;?></td>
				<td><?php echo word_limiter($post->post_title,10);?></td>
				<td><?php echo date($this->lib->get_settings('date_format'),strtotime($post->created_on));?></td>
				<td><?php echo $this->lib->get_row('admin','id',$post->post_by,'name')?></td>
				<td>
					<button class="btn btn-sm btn-icon btn-light"><i class="fa fa-edit"></i></button>
					<button class="btn btn-sm btn-icon btn-danger"><i class="fa fa-trash"></i></button>
				</td>
			</tr>
		<?php
			$i++;
			endforeach;
		?>
		</tbody>
	</table>
	<?php endif;?>

	</div>
	

	
</div>




