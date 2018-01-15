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
		<div class="panel panel-default col-lg-4">
						<form class="form" action="<?php echo base_url('admin/sliders/save')?>" enctype='multipart/form-data' method="post">
				<div class="form-group">
					<label>Heading</label>
					<input type="text" class="form-control" name="slide_big_text" required placeholder="Enter Heading" autofocus>
				</div>
				
				<div class="form-group">
					<label>Slider Order Number</label>
					<input type="number" min="1" max="5" class="form-control" name="slide_order" required placeholder="Select Slider Order Number" required>
				</div>

				<div class="form-group">
					<label>Image Description</label>
					<input type="text" min="1" max="5" class="form-control" name="sm_txt" required placeholder="Enter Image Description" required>
				</div>

				<div class="form-group">
					<label>Image Link</label>
					<input type="text" min="1" max="5" class="form-control" name="link_url" required placeholder="Enter Image Link" required>
				</div>

			<div class="form-group">
				<label>Select Image</label>
				<p class="help-block">Please select image of height : <?php echo $slide_h?>px and width <?php echo $slide_w?> px</p>
				<input type="file" accept="image/*" class="hidden" id="file_select" name="slide_image" requird>
				<span class="btn btn-default" onclick="$('#file_select').click();"><i class="fa fa-upload"></i> Select file</span>
				<div style="margin:10px auto">
					<img src="http://placehold.it/275x150?text=Preview" id="preview" style='max-width: 275px;' height="auto">
				</div>
			</div>

			<div class="form-group">
				<button id="submit_slider" class="btn btn-primary btn-icon"><i class="fa fa-save"></i> Save Image</button>

			</div>
    </form>
		</div>

		<div class="col-lg-8 panel panel-default">
			<h3>All Sliders list</h3>
			<?php
			if($slides!=''){
			?>
			<table class="table table-hover">
				<thead>
					<tr>
						<th>Order No</th>
						<th>Heading</th>
						<th>Image</th>
						<th>Action</th>
					</tr>
					</thead>
					<tbody>
					<?php
					foreach($slides as $details){
					?>
					<tr>
						<td>#<?php echo $details->slide_order; ?></td>
						<td><?php echo $details->slide_big_text;?>
						
						</td>
						
						<td><img height='50px' width='100px' src='<?php if(file_exists($details->slide_image)): echo base_url($details->slide_image);else: echo "http://placehold.it/100x50?text=No+image";endif;?>'></img></td>
						
						<td>
							
							<button data-toggle="modal" data-target="#myModal" onclick="$('#loadData').load('<?php echo base_url('admin/sliders/edit/'.base64_encode($details->slide_id))?>')" class="btn btn-info btn-sm btn-icon"><i class="fa fa-edit"></i></button>
							<a onclick="return confirm('Are you sure want to delete this item permanently?')" href="<?php echo base_url('admin/sliders/del/'.base64_encode($details->slide_id))?>"><button class="btn btn-danger btn-sm btn-icon"><i class="fa fa-trash"></i></button></a>
						</td>
					</tr>
					<?php
					}
					?>
				</tbody>

			</table>
			<?php
    }else{
      $this->lib->display_alert('Nothing to display now','warning','info-circle');
    }
			?>
		</div>

	</div>
	<div class="clearfix"></div>

</div>
<script>
  function readURL(input) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();

        reader.onload = function (e) {
        $('#preview').attr('src', e.target.result);
        }

      reader.readAsDataURL(input.files[0]);
      }
  }

  $("#file_select").change(function(){
    readURL(this);
  });
  
  $(document).ready(function() {
    $('#submit_slider').bind("click",function() 
    { 
        var imgVal = $('#file_select').val(); 
        if(imgVal=='') 
        { 
            alert("Select Image"); 
			  return false; 
        } 
      

    }); 
	
	
});
    </script>
