<!-- =====  CONTAINER START  ===== --> 
  <div class="container">
  <div class="row ">
    <div class="col-md-12 mb_20 mt_40">
   <?php $page_detail = $this->lib->get_row_array('pages',array('page_url'=>'terms-conditions')); ?>     
   <div class="heading-part mb_20 mt_20"><h2 class="main_title"><?php echo $page_detail->page_title; ?></h2></div>     
        
<?php echo $page_detail->page_content; ?>

        
        
        
        
      </div></div>
     <br>
<br>
    
     
          
  </div>
</div>
</div>
  <!-- Single Blog  -->
  

<!-- End Blog 	-->

<!-- =====  CONTAINER END  ===== --> 