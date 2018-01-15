<div class="container">
  <?php

        $page_detail = $this->lib->get_row_array('pages',array('page_url'=>'about'));
        
        echo $page_detail->page_content;

        ?>
</div>
  <!-- Single Blog  -->
  

<!-- End Blog   -->

<!-- =====  CONTAINER END  ===== --> 