<div class="content">

  <!-- Start Page breadcrumb -->
  <div class="page-header">
 
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url('admin')?>"><i class='fa fa-dashboard'></i> Dashboard</a></li>
		<li><?php if($heading){ echo $heading;}?></li>
      </ol>
</div>

<div class="container-default">
	<div class="col-lg-12  panel panel-default">
		<?php echo $this->lib->alert_message();?>
		<?php 
		if($message){
		?>
		<table class="table table-hover">
			<thead>
				<tr>
					<th>Sr</th>
					<th>Name</th>
					<th>Email</th>
					<th>Phone</th>
					
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				<?php 
				$i=1;
				foreach($message as $md){
				?>
					<tr>
						<td><?php echo $i;?></td>
						<td><?php echo $md->contact_name;?>
						<br><small>Sent <?php echo timespan($md->contact_sent_on,time(),1)?> ago</small><br><small><?php if($md->contact_status==3){ echo "<span class='label label-success'>Unread</span>";}?><?php if($md->contact_seen_on){ echo "Seen ".timespan($md->contact_seen_on,time(),2)." ago";}?></small>		
						</td>
						<td><?php echo $md->contact_email;?></td>
						<td><?php echo $md->contact_phone;?></td>
						
						<td>
							<button data-toggle="modal" data-target="#myModal" onclick="$('#loadData').load('<?php echo base_url('admin/contacts/view/'.base64_encode($md->contact_id))?>')"  class="btn btn-sm btn-icon btn-light"><i class="fa fa-search"></i></button>
							
							<a onclick="return confirm('Are you sure want to delete this enquiry?')" href="<?php echo base_url('admin/contacts/del/'.base64_encode($md->contact_id))?>"><button class="btn btn-sm btn-icon btn-danger"><i class="fa fa-trash"></i></button></a>
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
		$this->lib->display_alert('All Enquiry will be available here','info','info-circle');
		}
		?>
		
	</div>
	<div class="clearfix"></div>

</div>




