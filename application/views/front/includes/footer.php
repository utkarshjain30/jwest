  <!-- =====  FOOTER START  ===== -->
  <div class="footer pt_60">
  <div class="container">
    <div class="row">
      <div class="col-md-3 footer-block">
        <div class="content_footercms_right">
          <div class="footer-contact">
            <div class="footer-logo mb_40"> <a href="<?php echo base_url();?>"> <img src="<?php echo base_url($this->lib->get_settings('logo'))?>" alt="fastro"> </a> </div>
            <ul>
              <li><strong>Corporate Office Address:</strong></li>
              <li><?php echo $this->lib->get_settings('corporate_office_address');?></li>
              <li><strong>Address:</strong></li>
              <li><?php echo $this->lib->get_settings('address');?></li>
              <li><a title="<?php echo $this->lib->get_settings('email');?>" href="mailto:<?php echo $this->lib->get_settings('email');?>"><?php echo $this->lib->get_settings('email');?></a></li>
              <li><a title="<?php echo $this->lib->get_settings('landline');?>" href="callto:<?php echo $this->lib->get_settings('landline');?>"><?php echo $this->lib->get_settings('landline');?></a></li>
            </ul>
            <div class="social_icon">
              <ul>
                <li><a href="<?php echo $this->lib->get_settings('facebook');?>"><i class="fa fa-facebook"></i></a></li>
                <li><a href="<?php echo $this->lib->get_settings('address');?>"><i class="fa fa-google"></i></a></li>
                <li><a href="<?php echo $this->lib->get_settings('address');?>"><i class="fa fa-linkedin"></i></a></li>
                <li><a href="<?php echo $this->lib->get_settings('twitter');?>"><i class="fa fa-twitter"></i></a></li>
                <li><a href="<?php echo $this->lib->get_settings('instagram');?>"><i class="fa fa-instagram"></i></a></li>
                <li><a href="#"><i class="fa fa-rss"></i></a></li>
              </ul>
            </div>
            <br>        
          </div>
        </div>
      </div>
      
      <div class="col-md-3 footer-block">
        <h6 class="footer-title ptb_20">Information</h6>
        <ul>
         
          <li> <a href="<?php echo base_url(); ?>">Home</a></li>
              <li> <a href="<?php echo base_url('about'); ?>">About Us</a></li>
              <li><a href="<?php echo base_url('faq'); ?>">FAQ's</a></li>
              <li><a href="<?php echo base_url('policy'); ?>">Policy</a></li>
              <li><a href="<?php echo base_url('terms-conditions'); ?>">Terms & conditions</a></li>
              <li> <a href="<?php echo base_url('sale'); ?>">Sale</a></li>
              <li> <a href="<?php echo base_url('blog'); ?>">Blog</a></li>
              <li> <a href="<?php echo base_url('contact'); ?>">Contact us</a></li>
        
        </ul>
      </div>
      
      
      <div class="col-md-3 footer-block">
        <h6 class="footer-title ptb_20">Categories</h6>
        <ul>
          <?php $categories = $this->lib->get_by_id('categories','parent_category',0,NULL,array('category_name'=>'ASC'));
          foreach($categories as $cat){ ?>
            <li><a href="#"> <?php echo $cat->category_name; ?> </a></li>
          <?php } ?>
        </ul>
      </div>
      
      <div class="col-md-3 footer-block">
        <h6 class="footer-title ptb_20">Facebook Feeds</h6>



        <?php

//Set your App ID and App Secret.
// $appID = '1861390500839515';
// $appSecret = 'cf3177c4a370708e0a2529c4dca27ca5';

// //Create an access token using the APP ID and APP Secret.
// $accessToken = $appID . '|' . $appSecret;

// //The ID of the Facebook page in question.
// $id = '7177913734';

// //Tie it all together to construct the URL
// $url = "https://graph.facebook.com/$id/posts?access_token=$accessToken";

// //Make the API call
// $result = file_get_contents($url);

// //Decode the JSON result.
// $decoded = json_decode($result, true);

//var_dump($decoded);exit
//Dump it out onto the page so that we can take a look at the structure of the data.
?>
        <p>Coming Soon</p>
        
      </div>
      
      
   <!--   <div class="col-md-2 footer-block">
        <h6 class="footer-title ptb_20">My Account</h6>
        <ul>
          <li><a href="#">Checkout</a></li>
          <li><a href="#">My Account</a></li>
          <li><a href="#">My Orders</a></li>
          <li><a href="#">My Credit Slips</a></li>
          <li><a href="#">My Addresses</a></li>
          <li><a href="#">My Personal Info</a></li>
        </ul>
      </div>-->
    <!--  <div class="col-md-3">
        <h6 class="ptb_20">SIGN UP OUR NEWSLETTER</h6>
        <p class="mt_10 mb_20">For get offers from our favorite brands & get 20% off for next </p>
        <div class="form-group">
          <input class="mb_20" type="text" placeholder="Enter Your Email Address">
          <button class="btn">Subscribe</button>
        </div>
      </div>-->
    </div>
  </div>
  <div class="footer-bottom mt_60 ptb_10">
      <div class="container">
        <div class="row">
          <div class="col-sm-6">
            <div class="copyright-part">@ <?php echo date("Y"); ?> All Rights Reserved <a title="<?php echo base_url(); ?>" href="<?php echo base_url(); ?>"><?php echo $this->lib->get_settings('sitename');?></a></div>
          </div>
          <div class="col-sm-6">
            <div class="payment-icon text-right">
              <ul>
                <li><i class="fa fa-cc-paypal "></i></li>
                <li><i class="fa fa-cc-stripe"></i></li>
                <li><i class="fa fa-cc-visa"></i></li>
                <li><i class="fa fa-cc-discover"></i></li>
                <li><i class="fa fa-cc-mastercard"></i></li>
                <li><i class="fa fa-cc-amex"></i></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
</div>
  
  <!-- =====  FOOTER END  ===== --> 
</div>
<a id="scrollup">Scroll</a> 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script> 
<script src="<?php echo base_url('static/front/')?>js/jQuery_v3.1.1.min.js"></script> <script src="<?php echo base_url('static/front/')?>js/owl.carousel.min.js"></script> 
<script src="<?php echo base_url('static/front/')?>js/bootstrap.min.js"></script> 
<script src="<?php echo base_url('static/front/')?>js/jquery.magnific-popup.js"></script> 
<script src="<?php echo base_url('static/front/')?>js/jquery.firstVisitPopup.js"></script> 
<script src="<?php echo base_url('static/front/')?>js/custom.js"></script> 
<script src="<?php echo base_url('static/front/')?>js/bootstrap-dropdownhover.min.js"></script>
</body>
</html>