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
			<div class="panel panel-default col-lg-12">
				<div class="col-lg-8">
					<form class="form" action="<?php echo base_url('admin/pages/save')?>" enctype="multipart/form-data" method="post">
						<h3><i class="fa fa-edit fa-fw"></i> Edit Page : <?php echo $cat_info->page_title;?></h3>
						<div class="form-group">
							<label>Title</label>
							<input type="text" name="page_title" value="<?php echo $cat_info->page_title;?>" placeholder="Page Title" required class="form-control">
						</div>
						
						<div class="form-group">
							<label>URL</label>
							<input type="text" name="page_url" value="<?php echo $cat_info->page_url;?>" placeholder="Page URL" required class="form-control">
						</div>
						
						<div class="form-group">
							<label>Content</label>
							<textarea name="page_content" id="editor_kama" class="form-control" rows="20"><?php echo $cat_info->page_content;?></textarea>
							<input name="page_id" value="<?php echo base64_encode($cat_info->page_id);?>" type="hidden" class="hidden">
						</div>
						
					</div>
					
					
					<div class="col-lg-4">
						
							<div class="form-group">
								<label>Meta Keywords</label>
								<textarea class="form-control" placeholder="Meta Keywords Separated by Comas" name="page_meta_keyword"><?php echo $cat_info->page_meta_keyword;?></textarea>
								
							</div>
						
							<div class="form-group">
								<label>Meta Description</label>
								<textarea class="form-control" placeholder="Meta Description" name="page_meta_description"><?php echo $cat_info->page_meta_description;?></textarea>
								
							</div>
						
						
						<div class="form-group">
							<button class="btn btn-primary btn-icon btn-block"><i class="fa fa-save"></i> Save Page</button>
						</div>
					</div>
				</form>
			</div>
		</div>
		
	</div>
	<div class="clearfix"></div>
	
</div>



