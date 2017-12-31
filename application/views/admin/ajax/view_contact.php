<dl class="dl-horizontal">
	<dt>Name</dt>
	<dd><?php echo $contact->contact_name;?></dd>

	<dt>Email</dt>
	<dd><?php echo $contact->contact_email;?></dd>

	<dt>Phone</dt>
	<dd><?php echo $contact->contact_phone;?></dd>
	
	<dt>Subject</dt>
	<dd><?php echo $contact->contact_subject;?></dd>

	<dt>Message</dt>
	<dd><?php echo $contact->contact_message;?></dd>
	
	<dt>Sent on</dt>
	<dd><?php echo timespan($contact->contact_sent_on,time(),2);?> ago</dd>
	
	<dt>IP Address</dt>
	<dd><?php echo $contact->contact_ip_address;?></dd>
	<br>
	<a target="_blank" href="mailto:<?php echo $contact->contact_email;?>?Subject=Replay for Your Enquiry - <?php echo $this->lib->get_settings('sitename');?>"><button class="btn btn-light"><i class="fa fa-reply"></i> Reply</button></a>
	
	
	
</dl>