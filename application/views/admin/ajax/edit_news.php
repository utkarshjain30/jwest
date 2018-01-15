<h3>Edit News : <?php echo $new->news_heading;?></h3>
			<form class="form" action="<?php echo base_url('admin/news/save')?>" method="post">
				<div class="form-group">
					<label>News Heading</label>
					<input type="text" class="form-control" name="news_heading" required placeholder="Enter News Heading" autofocus value="<?php echo $new->news_heading;?>">
					<input type="hidden" name="id" value="<?php echo $new->id;?>" class="hidden">
				</div>
				
				<div class="form-group">
					<label>News Content</label>
					<input type="text" class="form-control" name="news_content" required placeholder="Enter News Content" value="<?php echo $new->news_content;?>">
				</div>
				
				<div class="form-group">
					<label>News Order</label>
					<select name="news_order" id="news_order">
						<?php for($i=1; $i<5; $i++){
							if($i == $new->news_order){
								$selected = 'selected';
							}else{
								$selected = '';
							}
							echo '<option '.$selected.' value="'.$i.'">'.$i.'</option>';
						} ?>
					</select>
				</div>
				
				<div class="form-group">
					<button class="btn btn-primary btn-icon"><i class="fa fa-save"></i> Save Size</button>
				</div>
				
				
			</form>