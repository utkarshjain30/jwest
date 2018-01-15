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
		<h3>Add New News</h3>
			<form class="form" action="<?php echo base_url('admin/news/add')?>" method="post">
				<div class="form-group">
					<label>News Heading</label>
					<input type="text" class="form-control" name="news_heading" required placeholder="Enter News Heading" autofocus>
				</div>

				<div class="form-group">
					<label>News Content</label>
					<input type="text" class="form-control" name="news_content" required placeholder="Enter News Content" autofocus>
				</div>
				
				<div class="form-group">
					<label>News Order</label>
					<select name="news_order" id="news_order">
						<?php for($i=1; $i<5; $i++){
							echo '<option value="'.$i.'">'.$i.'</option>';
						} ?>
					</select>
				</div>

				<div class="form-group">
					<button class="btn btn-primary btn-icon"><i class="fa fa-save"></i> Save News</button>
				</div>
				
				
			</form>
		
		</div>
	
		<div class="panel panel-default col-lg-7 margin-10" >
			<h4>List of News</h4>
			<hr>
			<table class="table table-hover table-responsive">
				<thead>
					<tr>
						<th>Sr No</th>
						<th>Size Heading</th>
						<th>Size Content</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php 
					if($news){
					$i=1;
						foreach($news as $new){
						?>
						<tr>
							<td><strong>#<?php echo $i;?></strong></td>
							<td><strong><?php echo $new->news_heading;?></strong></td>
							<td><strong><?php echo $new->news_content;?></strong></td>
							<td>
								<button title="Edit News" class="btn btn-icon btn-info" onclick="$('#loadData').load('<?php echo base_url('admin/news/edit/'.$new->id)?>');" data-toggle="modal" data-target="#myModal"><i class="fa fa-edit"></i></button>
								<a title="Delete News" onclick="return confirm('Are you sure want to trash this news?')" href="<?php echo base_url('admin/news/del/'.$new->id)?>"><button class="btn btn-icon btn-danger"><i class="fa fa-trash"></i></button></a>
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