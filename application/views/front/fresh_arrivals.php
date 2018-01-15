<!-- =====  CONTAINER START  ===== -->

<div class="container">
  <div class="row ">
    
    <div class="col-sm-12 col-md-12 col-lg-12 mtb_30"> 
      <!-- =====  BANNER STRAT  ===== -->
      <div class="breadcrumb ptb_20">
        <h1 class="main-title" style="color:#000;">Fresh Arrivals</h1>
        <ul >
          <li><a href="<?php echo base_url(); ?>">Home</a></li>
          <li style="color:#e80184;" class="active">Fresh Arrivals</li>
        </ul>
      </div>
      <!-- =====  BREADCRUMB END===== -->
   <!--   <div class="category-page-wrapper mb_30">
        <div class="col-xs-6 sort-wrapper">
          <label class="control-label" for="input-sort">Sort By :</label>
          <div class="sort-inner">
            <select id="input-sort" class="form-control">
              <option value="ASC" selected="selected">Default</option>
              <option value="ASC">Name (A - Z)</option>
              <option value="DESC">Name (Z - A)</option>
              <option value="ASC">Price (Low &gt; High)</option>
              <option value="DESC">Price (High &gt; Low)</option>
              <option value="DESC">Rating (Highest)</option>
              <option value="ASC">Rating (Lowest)</option>
              <option value="ASC">Model (A - Z)</option>
              <option value="DESC">Model (Z - A)</option>
            </select>
          </div>
          <span><i class="fa fa-angle-down" aria-hidden="true"></i></span> </div>
        <div class="col-xs-4 page-wrapper">
          <label class="control-label" for="input-limit">Show :</label>
          <div class="limit">
            <select id="input-limit" class="form-control">
              <option value="8" selected="selected">08</option>
              <option value="25">25</option>
              <option value="50">50</option>
              <option value="75">75</option>
              <option value="100">100</option>
            </select>
          </div>
          <span><i class="fa fa-angle-down" aria-hidden="true"></i></span> </div>
        <div class="col-xs-2 text-right list-grid-wrapper">
          <div class="btn-group btn-list-grid">
            <button type="button" id="list-view" class="btn btn-default list-view" ></button>
            <button type="button" id="grid-view" class="btn btn-default grid-view active" ></button>
          </div>
        </div>
      </div>-->
      <div class="row">
      	<?php $products = $this->lib->get_table('products',array('id'=>'desc'),NULL,40);
      	if($products){
        foreach($products as $pro){
        ?>
	        <div class="product-layout  product-grid  col-lg-3 col-md-4 col-xs-6 ">
	          <div class="item">
	            <div class="product-thumb clearfix mb_30">
	              <div class="image product-imageblock"> 
	              	<a href="<?php echo base_url('product-detail/').$pro->id; ?>"> 
	              		<img data-name="product_image" src="<?php echo base_url().$pro->product_featured_image; ?>" alt="<?php echo strtoupper($pro->product_name); ?>" title="<?php echo strtoupper($pro->product_name); ?>" class="img-responsive" /> 
	              		<?php //if(!empty($pro->product_gallery_image)){
	              		$gallery_image = $this->lib->get_by_id('products_gallery_images','product_id',$pro->id,1);
              			//print_r($gallery_image);exit;
	              		foreach($gallery_image as $gi){
	              			//if(!empty($gi->image)){
	              		?>
	              			<img src="<?php echo base_url().$gi->image; ?>" alt="<?php echo strtoupper($pro->product_name); ?>" title="<?php echo strtoupper($pro->product_name); ?>" class="img-responsive" /> 
	              		<?php } //} //} ?>
	              	</a> 
	              </div>
	              <div class="caption product-detail text-left">
	                <h6 data-name="product_name" class="product-name mt_20"><a href="#" title="<?php echo strtoupper($pro->product_name); ?>"><?php echo strtoupper($pro->product_name); ?></a></h6> 
	                
	              </div>
	            </div>
	          </div>
	        </div>
        <?php } }else{ ?>
      		<h1>No Products Found!</h1>	
        <?php } ?>
      </div>
      <!-- <div class="pagination-nav text-center mt_50">
        <ul>
          <li><a href="#"><i class="fa fa-angle-left"></i></a></li>
          <li class="active"><a href="#">1</a></li>
          <li><a href="#">2</a></li>
          <li><a href="#">3</a></li>
          <li><a href="#"><i class="fa fa-angle-right"></i></a></li>
        </ul>
      </div> -->
    </div>
  </div>
  
</div>
<!-- =====  CONTAINER END  ===== --> 