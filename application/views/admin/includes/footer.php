<!-- Start Footer -->
<div class="row footer">
  <div class="col-md-6 text-left">
  Copyright &copy; <?php echo date('Y',time());?> <a href="<?php echo base_url();?>" target="_blank"><?php echo $this->lib->get_settings('sitename')?></a> All rights reserved.
  </div>
</div>
<script type="text/javascript" src="<?php echo base_url('static/admin/js/jquery.min.js')?>"></script>
<script src="<?php echo base_url('static/admin/js/bootstrap/bootstrap.min.js')?>"></script>
<script src="<?php echo base_url('static/admin/js/date-range-picker/daterangepicker.js')?>"></script>
<script type="text/javascript" src="<?php echo base_url('static/admin/js/plugins.js')?>"></script>
	<script type="text/javascript">
$(document).ready(function() {
  $('#date-picker').daterangepicker({ singleDatePicker: true }, function(start, end, label) {
    console.log(start.toISOString(), end.toISOString(), label);
  });
});
</script>

<script type="text/javascript" src="<?php echo base_url() ?>static/ckeditor/ckeditor.js"></script>
	
							<script type="text/javascript">
			//<![CDATA[

				CKEDITOR.replace( 'editor_kama',
					{
							filebrowserBrowseUrl : '<?php echo base_url() ?>static/ckeditor/ckfinder/',
 	filebrowserImageBrowseUrl : '<?php echo base_url() ?>static/ckeditor/ckfinder/ckfinder.php?type=Images',
 	filebrowserFlashBrowseUrl : '<?php echo base_url() ?>static/ckeditor/ckfinder/ckfinder.php?type=Flash',
 	filebrowserUploadUrl : '<?php echo base_url() ?>static/ckeditor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
 	filebrowserImageUploadUrl : '<?php echo base_url() ?>static/ckeditor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
 	filebrowserFlashUploadUrl : '<?php echo base_url() ?>static/ckeditor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
					});

       
					

			//]]>
			</script>
			
			
<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
		<button type="button" class="close"  data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel" align="center">Action</h4>
      </div>
      <div class="modal-body" id="loadData">
        <h4 align="center"><i class="fa fa-spinner fa-pulse"></i></h4>
        <h4 align="center">Please wait...</h4>
      </div>
    </div>
  </div>
</div>
<script>
	$('.close').click(function(){
		$('#loadData').html("<h4 align='center'><i class='fa fa-spinner fa-pulse'></i></h4><h4 align='center'>Please wait...</h4>");
	})
</script>
</body>

</html>