<!-- =====  CONTAINER START  ===== -->

<div class="container">
  <div class="row ">
    <div class="col-sm-3 mtb_30">
      <div class="heading-part mb_20">
        <h2 class="main_title">Top category</h2>
      </div>
      <ul class="nav" style="background:#fcfba6;">
        <?php $category =  $this->lib->get_by_id('categories','parent_category',0,NULL,array('category_name'=>'ASC'));
        foreach($category as $cat){ ?>
          <li><a href="<?php echo base_url('category/').$cat->id; ?>"> <?php echo $cat->category_name; ?> </a></li>
        <?php } ?> 
      </ul>
    </div>
   <div class="col-sm-8 col-md-8 col-lg-9 mtb_30"> 
      <!-- =====  BANNER STRAT  ===== -->
      <?php $product_id = $this->uri->segment(2); 
      $product_detail = $this->lib->get_row_array('products',array('id'=>$product_id));
      ?>
      <!-- =====  BREADCRUMB END===== -->  
      <div class="row mt_10 ">
      <div class="col-md-6">
        <div><a title="<?php echo $product_detail->product_name; ?>" class="thumbnails"> <img data-name="product_image" src="<?php echo base_url().$product_detail->product_featured_image; ?>" alt="<?php echo $product_detail->product_name; ?>" /></a></div>
        <div id="product-thumbnail" class="owl-carousel">
          <?php $gallery_image = $this->lib->get_by_id('products_gallery_images','product_id',$product_detail->id);
          // echo '<pre>';
          // print_r($gallery_image);exit;
          foreach($gallery_image as $gi){ ?>
            <div class="item">
              <div class="image-additional">
                <a title="<?php echo $product_detail->product_name; ?>"class="thumbnail" href="<?php echo base_url().$gi->image; ?>" data-fancybox="group1" > 
                  <img src="<?php echo base_url().$gi->image; ?>" alt="<?php echo $product_detail->product_name; ?>" />
                </a>
              </div>
            </div>
          <?php } ?>  
        </div>
      </div>
      <div class="col-md-6 prodetail caption product-thumb">
        <h4 data-name="product_name" class="product-name"><a href="#" title="<?php echo $product_detail->product_name; ?>"><?php echo $product_detail->product_name; ?></a></h4>
        
       
        <hr>
        <ul class="list-unstyled product_info mtb_20">
         <li>
            <label>Product Code:</label>
            <span><?php echo $product_detail->product_code; ?></span></li>
         
        </ul>
        <hr>
        <p class="product-desc mtb_30"><?php echo $product_detail->product_full_description; ?></p>
        
      </div>
    </div>
   
    </div>
  </div>
  
</div>
<!-- =====  CONTAINER END  ===== -->