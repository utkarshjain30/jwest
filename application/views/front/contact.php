<div class="container">
  <div class="row ">
    
      
      
      <div class="col-sm-12 col-md-12 col-lg-12 mtb_30"> 
        <?php $this->lib->alert_message();?>  
      <!-- contact  -->
      <div class="row">
       
        <div class="col-md-6 col-xs-12 contact">
        <div class="heading-part mb_20 mt_40">
            <h2 class="main_title">Our Store</h2>
          </div>
           <div class="mb_30">
           <img src="<?php echo base_url('static/front/') ?>img/store-img.jpg" alt="Store Location" class="img-responsive">
</div>

          <div class="Career mb_50">
          <div class="location mb_50">
          <div class="heading-part mb_20">
            <h2 class="main_title">Office address</h2>
          </div>
            <div class="address"> 
              <?php echo $this->lib->get_settings('address');?></div>
            <div class="call mt_10"><i class="fa fa-phone" aria-hidden="true"></i><a title="<?php echo $this->lib->get_settings('phone');?>" href="<?php echo $this->lib->get_settings('phone');?>"><?php echo $this->lib->get_settings('phone');?></a></div>
            <div class="email mt_10"><i class="fa fa-envelope" aria-hidden="true"></i><a title="<?php echo $this->lib->get_settings('email');?>" href="mailto:<?php echo $this->lib->get_settings('email');?>" target="_top"><?php echo $this->lib->get_settings('email');?></a></div>
            <div class="email mt_10"><i class="fa fa-globe" aria-hidden="true"></i><a href="#" target="_top">www.jwest.in</a></div>
          </div>
           
          </div>
          
        </div>
        <div class="col-md-6 col-xs-12 contact-form mb_50">
        <div class="heading-part mb_20 mt_40">
            <h2 class="main_title"> Enquiry</h2>
          </div> 
          <!-- Contact FORM -->
          <div  id="contact_form">
          
            <form action="<?php echo base_url('contact/save'); ?>" id="contact_body" method="post" action="contact_me.php">
              <!--                                <label class="full-with-form" ><span>Name</span></label>
-->
              <input required class="full-with-form " type="text" name="contact_name" placeholder="Name" data-required="true"/>
              <!--                <label class="full-with-form" ><span>Email Address</span></label>
-->
              <input required class="full-with-form  mt_30" type="email" name="contact_email" placeholder="Email Address" data-required="true"/>
              <!--                <label class="full-with-form" ><span>Phone Number</span></label>
-->
              <input required class="full-with-form  mt_30" type="text" name="contact_phone" placeholder="Phone Number" maxlength="15" data-required="true"/>
              <!--                <label class="full-with-form" ><span>Subject</span></label>
-->
              <input required class="full-with-form  mt_30" type="text" name="contact_subject" placeholder="Subject" data-required="true">
              <!--                                <label class="full-with-form" ><span>Attachment</span></label>
-->
                            
              <!--                                <label class="full-with-form" ><span>Message</span></label>
-->
              <textarea required class="full-with-form  mt_30" name="contact_message" placeholder="Message" data-required="true"></textarea>
              <button class="btn mt_30"  type="submit">Send Message</button>
            </form>
            <div id="contact_results"></div>
          </div>
          
          <!-- END Contact FORM --> 
        </div>
      </div>
      <!-- map  -->
      

      </div>
          
    </div>
  </div>
</div>
  <!-- Single Blog  -->
  

<!-- End Blog   -->

<!-- =====  CONTAINER END  ===== --> 