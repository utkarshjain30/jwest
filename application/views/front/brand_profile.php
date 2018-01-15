<!-- =====  CONTAINER START  ===== --> 
  <div class="container">
  <div class="row ">
    <div class="col-md-12 mb_20 mt_40">
        
   <div class="heading-part mb_20 mt_20"><h2 class="main_title">Brand Profile</h2></div>     
        <?php

        $page_detail = $this->lib->get_row_array('pages',array('page_url'=>'brand-profile'));
        

        ?>
		<h1><?php echo $page_detail->page_content; ?></h1>




        
      
      </div></div>
     <br>
<br>
    
     
          
  </div>
</div>
</div>
  <!-- Single Blog  -->
  

<!-- End Blog 	-->

<!-- =====  CONTAINER END  ===== --> 