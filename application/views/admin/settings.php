<div class="content">

  <!-- Start Page breadcrumb -->
  <div class="page-header">
 
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url('admin')?>"><i class='<?php echo $icon;?>'></i> <?php echo $heading;?></a></li>
      </ol>
</div>

<div class="container-default">
	<div class="col-lg-12">
	
	<div class="col-lg-12 panel panel-default">
		
			<!--LOGO-->

			<!-- <div class="form-group">
				<label class="col-lg-3">Logo</label>
				<div class="col-lg-5">
					<form style="background-color: #000; padding: 5px;" class="form" action="<?php //echo base_url('admin/settings/save_logo')?>" enctype="multipart/form-data">
						<img width="100px" src="<?php //if(file_exists($logo)){ echo base_url($logo);}else{ echo "http://placehold.it/100x100?text=No+logo";}?>">	
						<input type="file" name="logo" accept="image/*" id="select_image" class="hidden">
						<span onclick="$('#select_image').click();" class="btn btn-info"><i class="fa fa-upload"></i> Select image</span>
				</div>
				<div class="col-lg-1"><span id="saveSitebtn" class="btn btn-primary btn-icon "><i class="fa fa-save"></i> Save</span></div>
				</form>
				<div class="col-lg-3" id="saveSiteMsg"></div>
			</div>
			<div class="clearfix"></div>
			<br> -->

			<div class="form-group">
				<label class="col-lg-3">Sitename</label>
				<div class="col-lg-5"><input type="text" class="form-control" id="sitename" value="<?php echo $sitename;?>"></div>
				<div class="col-lg-1"><span id="save_site" class="btn btn-primary btn-icon "><i class="fa fa-save"></i> Save</span></div>
				<div class="col-lg-3" id="msg_site"></div>
			</div>
			<div class="clearfix"></div>
			<br>
			
			<div class="form-group">
				<label class="col-lg-3">Home page title</label>
				<div class="col-lg-5"><input type="text" class="form-control" id="home_title" value="<?php echo $home_title;?>"></div>
				<div class="col-lg-1"><span id="save_home_title" class="btn btn-primary btn-icon "><i class="fa fa-save"></i> Save</span></div>
				<div class="col-lg-3" id="msg_home_title"></div>
			</div>
			<div class="clearfix"></div>
			<br>
			
			<div class="form-group">
				<label class="col-lg-3">Meta details</label>
				<div class="col-lg-5">
					<textarea class="form-control" id="meta_detail"><?php echo $meta_detail;?></textarea>
				</div>
				<div class="col-lg-1"><span id="save_meta_detail" class="btn btn-primary btn-icon "><i class="fa fa-save"></i> Save</span></div>
				<div class="col-lg-3" id="msg_meta_detail"></div>
			</div>
			<div class="clearfix"></div>
			<br>
			
			
			<div class="form-group">
				<label class="col-lg-3">Admin Email</label>
				<div class="col-lg-5"><input type="email" class="form-control" id="email" value="<?php echo $email;?>"></div>
				<div class="col-lg-1"><span id="save_email" class="btn btn-primary btn-icon "><i class="fa fa-save"></i> Save</span></div>
				<div class="col-lg-3" id="msg_email"></div>
			</div>
			<div class="clearfix"></div>
			<br>


			<!--LANDLINE NUMBER-->

			<div class="form-group">
				<label class="col-lg-3">Website Landline Number</label>
				<div class="col-lg-5"><input type="text" class="form-control" id="landline" value="<?php echo $landline;?>"></div>
				<div class="col-lg-1"><span id="save_landline" class="btn btn-primary btn-icon "><i class="fa fa-save"></i> Save</span></div>
				<div class="col-lg-3" id="msg_landline"></div>
			</div>
			<div class="clearfix"></div>
			<br>


			<!--MOBILE NUMBER-->

			<div class="form-group">
				<label class="col-lg-3">Website Mobile Number</label>
				<div class="col-lg-5"><input type="text" class="form-control" id="mobile" value="<?php echo $mobile;?>"></div>
				<div class="col-lg-1"><span id="save_mobile" class="btn btn-primary btn-icon "><i class="fa fa-save"></i> Save</span></div>
				<div class="col-lg-3" id="msg_mobile"></div>
			</div>
			<div class="clearfix"></div>
			<br>

			<!--FACEBOOK-->

			<div class="form-group">
				<label class="col-lg-3">Facebook Link</label>
				<div class="col-lg-5"><input type="text" class="form-control" id="facebook" value="<?php echo $facebook;?>"></div>
				<div class="col-lg-1"><span id="save_facebook" class="btn btn-primary btn-icon "><i class="fa fa-save"></i> Save</span></div>
				<div class="col-lg-3" id="msg_facebook"></div>
			</div>
			<div class="clearfix"></div>
			<br>

			<!--TWITTER-->

			<div class="form-group">
				<label class="col-lg-3">Twitter Link</label>
				<div class="col-lg-5"><input type="text" class="form-control" id="twitter" value="<?php echo $twitter;?>"></div>
				<div class="col-lg-1"><span id="save_twitter" class="btn btn-primary btn-icon "><i class="fa fa-save"></i> Save</span></div>
				<div class="col-lg-3" id="msg_twitter"></div>
			</div>
			<div class="clearfix"></div>
			<br>

			<!--INSTAGRAM-->

			<div class="form-group">
				<label class="col-lg-3">Instagram Link</label>
				<div class="col-lg-5"><input type="text" class="form-control" id="instagram" value="<?php echo $instagram;?>"></div>
				<div class="col-lg-1"><span id="save_instagram" class="btn btn-primary btn-icon "><i class="fa fa-save"></i> Save</span></div>
				<div class="col-lg-3" id="msg_instagram"></div>
			</div>
			<div class="clearfix"></div>
			<br>

			<!--SKYPE-->

			<div class="form-group">
				<label class="col-lg-3">Skype Username</label>
				<div class="col-lg-5"><input type="text" class="form-control" id="skype" value="<?php echo $skype;?>"></div>
				<div class="col-lg-1"><span id="save_skype" class="btn btn-primary btn-icon "><i class="fa fa-save"></i> Save</span></div>
				<div class="col-lg-3" id="msg_skype"></div>
			</div>
			<div class="clearfix"></div>
			<br>


			<!--Corporate Address-->
			<div class="form-group">
				<label class="col-lg-3">Corporate Office Address</label>
				<div class="col-lg-5"><input type="text" class="form-control" id="corporate_office_address" value="<?php echo $corporate_office_address;?>"></div>
				<div class="col-lg-1"><span id="save_corporate_office_address" class="btn btn-primary btn-icon "><i class="fa fa-save"></i> Save</span></div>
				<div class="col-lg-3" id="msg_corporate_office_address"></div>
			</div>
			<div class="clearfix"></div>
			<br>


			<!--ADDRESS-->

			<div class="form-group">
				<label class="col-lg-3">Store Address</label>
				<div class="col-lg-5"><input type="text" class="form-control" id="address" value="<?php echo $address;?>"></div>
				<div class="col-lg-1"><span id="save_address" class="btn btn-primary btn-icon "><i class="fa fa-save"></i> Save</span></div>
				<div class="col-lg-3" id="msg_address"></div>
			</div>
			<div class="clearfix"></div>
			<br>

			<div class="form-group">
				<label class="col-lg-3">Date Format</label>
				<div class="col-lg-5">
					<select class="form-control" name="date-format" id="date">
						<option value="M/d/Y" <?php if($this->lib->get_settings('date_format')=='M/d/Y'){ echo "selected";}?>><?php echo date('M/d/Y')?></option>
						<option value="M d Y" <?php if($this->lib->get_settings('date_format')=='M d Y'){ echo "selected";}?>><?php echo date('M d Y')?></option>
						<option value="m/d/Y" <?php if($this->lib->get_settings('date_format')=='m/d/Y'){ echo "selected";}?>><?php echo date('m/d/y')?></option>
						<option value="d M Y" <?php if($this->lib->get_settings('date_format')=='d M Y'){ echo "selected";}?>><?php echo date('d M Y')?></option>
						<option value="D d-M-Y" <?php if($this->lib->get_settings('date_format')=='D d-M-Y'){ echo "selected";}?>><?php echo date('D-d-M-Y')?></option>
						<option value="D d-m-y" <?php if($this->lib->get_settings('date_format')=='D d-m-y'){ echo "selected";}?>><?php echo date('D d-m-y')?></option>
						
					</select>
				</div>
				<div class="col-lg-1"><span id="save_date" class="btn btn-primary btn-icon "><i class="fa fa-save"></i> Save</span></div>
				<div class="col-lg-3" id="msg_date"></div>
				</div>
			<div class="clearfix"></div>
			
			<br>
				<div class="form-group">
				<label class="col-lg-3">Name of Email sender</label>
				<div class="col-lg-5"><input type="email" class="form-control" id="email_name" value="<?php echo $email_name;?>"></div>
				<div class="col-lg-1"><span id="save_send_name" class="btn btn-primary btn-icon "><i class="fa fa-save"></i> Save</span></div>
				<div class="col-lg-3" id="msg_email_name"></div>
				</div>
			<div class="clearfix"></div>			
		
	</div>
	</div>

</div>
<script>
	$('#saveSiteMsg').hide();
	
	$(document).ready(function() {
		$('#save_site').click(function () {
			$("#msg_site").html("<i class='fa fa-spinner fa-pulse fa-fw'></i>Please wait...");
			var sitename = $('#sitename').val();
		
			var data='value='+sitename;
			$.ajax({
				type:"POST",
				url:"<?php echo base_url('admin/settings/save_settings/sitename')?>",
				data:data,
				success:function(html) {
				$("#msg_site").html(html);
				},
				failure:function(html){
					$("#msg_site").html("Unable to connect to server");
				}
			});
			return false;
		});
		
		$('#save_email').click(function () {
			$("#msg_email").html("<i class='fa fa-spinner fa-pulse fa-fw'></i>Please wait...");
			var email = $('#email').val();
		
			var data='value='+email;
			$.ajax({
				type:"POST",
				url:"<?php echo base_url('admin/settings/save_settings/email')?>",
				data:data,
				success:function(html) {
				$("#msg_email").html(html);
				}
			});
			return false;
		});

		//LANDLINE SAVE

		$('#save_landline').click(function () {
			$("#msg_landline").html("<i class='fa fa-spinner fa-pulse fa-fw'></i>Please wait...");
			var landline = $('#landline').val();
		
			var data='value='+landline;
			$.ajax({
				type:"POST",
				url:"<?php echo base_url('admin/settings/save_settings/landline')?>",
				data:data,
				success:function(html) {
				$("#msg_landline").html(html);
				}
			});
			return false;
		});
		
		//MOBILE SAVE

		$('#save_mobile').click(function () {
			$("#msg_mobile").html("<i class='fa fa-spinner fa-pulse fa-fw'></i>Please wait...");
			var mobile = $('#mobile').val();
		
			var data='value='+mobile;
			$.ajax({
				type:"POST",
				url:"<?php echo base_url('admin/settings/save_settings/mobile')?>",
				data:data,
				success:function(html) {
				$("#msg_mobile").html(html);
				}
			});
			return false;
		});

		//FACEBOOK SAVE

		$('#save_facebook').click(function () {
			$("#msg_facebook").html("<i class='fa fa-spinner fa-pulse fa-fw'></i>Please wait...");
			var facebook = $('#facebook').val();
		
			var data='value='+facebook;
			$.ajax({
				type:"POST",
				url:"<?php echo base_url('admin/settings/save_settings/facebook')?>",
				data:data,
				success:function(html) {
				$("#msg_facebook").html(html);
				}
			});
			return false;
		});

		//TWITTER SAVE

		$('#save_twitter').click(function () {
			$("#msg_twitter").html("<i class='fa fa-spinner fa-pulse fa-fw'></i>Please wait...");
			var twitter = $('#twitter').val();
		
			var data='value='+twitter;
			$.ajax({
				type:"POST",
				url:"<?php echo base_url('admin/settings/save_settings/twitter')?>",
				data:data,
				success:function(html) {
				$("#msg_twitter").html(html);
				}
			});
			return false;
		});
		
		//INSTAGRAM SAVE

		$('#save_instagram').click(function () {
			$("#msg_instagram").html("<i class='fa fa-spinner fa-pulse fa-fw'></i>Please wait...");
			var instagram = $('#instagram').val();
		
			var data='value='+instagram;
			$.ajax({
				type:"POST",
				url:"<?php echo base_url('admin/settings/save_settings/instagram')?>",
				data:data,
				success:function(html) {
				$("#msg_instagram").html(html);
				}
			});
			return false;
		});

		//SKYPE SAVE

		$('#save_skype').click(function () {
			$("#msg_skype").html("<i class='fa fa-spinner fa-pulse fa-fw'></i>Please wait...");
			var skype = $('#skype').val();
		
			var data='value='+skype;
			$.ajax({
				type:"POST",
				url:"<?php echo base_url('admin/settings/save_settings/skype')?>",
				data:data,
				success:function(html) {
				$("#msg_skype").html(html);
				}
			});
			return false;
		});

		//CORPORATE ADDRESS SAVE

		$('#save_corporate_office_address').click(function () {
			$("#msg_corporate_office_address").html("<i class='fa fa-spinner fa-pulse fa-fw'></i>Please wait...");
			var corporate_office_address = $('#corporate_office_address').val();
		
			var data='value='+corporate_office_address;
			$.ajax({
				type:"POST",
				url:"<?php echo base_url('admin/settings/save_settings/corporate_office_address')?>",
				data:data,
				success:function(html) {
				$("#msg_corporate_office_address").html(html);
				}
			});
			return false;
		});



		//ADDRESS SAVE

		$('#save_address').click(function () {
			$("#msg_address").html("<i class='fa fa-spinner fa-pulse fa-fw'></i>Please wait...");
			var address = $('#address').val();
		
			var data='value='+address;
			$.ajax({
				type:"POST",
				url:"<?php echo base_url('admin/settings/save_settings/address')?>",
				data:data,
				success:function(html) {
				$("#msg_address").html(html);
				}
			});
			return false;
		});


		$('#save_home_title').click(function () {
			$("#msg_home_title").html("<i class='fa fa-spinner fa-pulse fa-fw'></i>Please wait...");
			var home_title = $('#home_title').val();
		
			var data='value='+home_title;
			$.ajax({
				type:"POST",
				url:"<?php echo base_url('admin/settings/save_settings/home_title')?>",
				data:data,
				success:function(html) {
				$("#msg_home_title").html(html);
				}
			});
			return false;
		});
		
		$('#save_date').click(function () {
			var date = $('#date').val();
			$("#msg_date").html("<i class='fa fa-spinner fa-pulse fa-fw'></i>Please wait...");
		
			var data='value='+date;
			$.ajax({
				type:"POST",
				url:"<?php echo base_url('admin/settings/save_settings/date_format')?>",
				data:data,
				success:function(html) {
				$("#msg_date").html(html);
				}
			});
			return false;
		});
		
		$('#save_send_name').click(function () {
			$("#msg_email_name").html("<i class='fa fa-spinner fa-pulse fa-fw'></i>Please wait...");
			var email_name = $('#email_name').val();
		
			var data='value='+email_name;
			$.ajax({
				type:"POST",
				url:"<?php echo base_url('admin/settings/save_settings/sending_email_name')?>",
				data:data,
				success:function(html) {
				$("#msg_email_name").html(html);
				}
			});
			return false;
		});
		
		
		
		$('#save_meta_detail').click(function () {
			$("#msg_meta_detail").html("<i class='fa fa-spinner fa-pulse fa-fw'></i>Please wait...");
			var meta_detail = $('#meta_detail').val();
		
			var data='value='+meta_detail;
			$.ajax({
				type:"POST",
				url:"<?php echo base_url('admin/settings/save_settings/meta_detail')?>",
				data:data,
				success:function(html) {
				$("#msg_meta_detail").html(html);
				}
			});
			return false;
		});
		

		
	});


	</script>
	
	


