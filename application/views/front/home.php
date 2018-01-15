<!-- =====  BANNER START  ===== -->
  <div class="banner">
    <div class="main-banner owl-carousel">
      <?php $sliders = $this->lib->get_table('slides',array('slide_id'=>'asc'));
      foreach($sliders as $slide){ ?>
        <div class="item"><a href="#"><img src="<?php echo $slide->slide_image ?>" alt="Main Banner" class="img-responsive" /></a></div>
      <?php } ?>
    </div>
  </div>
  <!-- =====  BANNER END  ===== --> 
  
  <!-- =====  CONTAINER START  ===== -->
  <div class="container">
    <div class="row ">
      <div class="col-sm-12 mtb_30"> 
        
        <!-- =====  SUB BANNER  STRAT ===== -->
        <div class="row">
          <div class="cms_banner mt_10">
            <div class="col-xs-5 col-sm-5 col-md-5 mt_20">
              <?php $banner1 = $this->lib->get_row_array('banners',array('id'=> 1));
              ?>
              <div id="subbanner1" class="sub-hover"> <a title="Click Here" href="<?php echo $banner1->banner_link; ?>"><img src="<?php echo base_url().$banner1->banner_image; ?>" alt="Sub Banner1" class="img-responsive"></a> 
                <div class="bannertext">
                  <h2><?php echo $banner1->banner_text; ?></h2>
                </div>
                <!--  <div class="bannertext">
                <h2><span>use code : </span>suitup <br>online only.</h2>
              </div>--> 
              </div>
            </div>
            <div class="col-xs-7 col-sm-7 col-md-7 mt_20">
              <div class="row">
                <div class="col-xs-6 col-sm-6 col-md-6">
                  <?php $banner2 = $this->lib->get_row_array('banners',array('id'=> 2));
              ?>
                  <div id="subbanner2" class="sub-hover"> <a title="Click Here" href="<?php echo $banner2->banner_link; ?>"><img src="<?php echo base_url().$banner2->banner_image; ?>" alt="Sub Banner2" class="img-responsive"></a>
                    <div class="bannertext">
                      <h2><?php echo $banner2->banner_text; ?></h2>
                    </div>
                  </div>
                </div>
                <div class="col-xs-6 col-sm-6 col-md-6">
                  <?php $banner3 = $this->lib->get_row_array('banners',array('id'=> 3));
              ?>
                  <div id="subbanner3" class="sub-hover"> <a title="Click Here" href="<?php echo $banner3->banner_link; ?>"><img src="<?php echo base_url().$banner3->banner_image; ?>" alt="Sub Banner3" class="img-responsive"></a>
                    <div class="bannertext">
                      <h2><?php echo $banner3->banner_text; ?></h2>
                    </div>
                  </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 mt_30">
                  <?php $banner4 = $this->lib->get_row_array('banners',array('id'=> 4));
              ?>
                  <div id="subbanner4" class="sub-hover"> <a title="Click Here" href="<?php echo $banner4->banner_link; ?>"><img src="<?php echo base_url().$banner4->banner_image; ?>" alt="Sub Banner4" class="img-responsive"></a>
                    <div class="bannertext">
                      <h2><?php echo $banner4->banner_text; ?></h2>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- =====  SUB BANNER END  ===== --> 
        
        <!-- =====  PRODUCT TAB  ===== -->
        <div id="product-tab" class="mt_30">
          <div class="row">
            <div class="col-md-6">
              <div  class="new-arrival-code"><a href="#nArrivals" data-toggle="tab">New Arrivals</a></div>
            </div>
            <div class="col-md-6">
              <div class="new-arrival-code"><a href="#Featured" data-toggle="tab">Featured</a> </div>
            </div>
          </div>
          <!-- <div class="heading-part mb_20 ">
          <h2 class="main_title">Jwast Cloths</h2>
        </div>--> 
          
          <!-- <ul class="nav text-right">
          <li class="active"> <a href="#nArrivals" data-toggle="tab">New Arrivals</a> </li>
          <li><a href="#Featured" data-toggle="tab">Featured</a> </li>
        </ul>-->
          <div class="tab-content clearfix box">
           <div class="col-md-6"> <div class="tab-pane active" id="nArrivals">
              <div class="nArrivals owl-carousel">
                <?php $latest_category = $this->lib->get_table('products',array('id'=>'desc'),NULL,50);
                foreach($latest_category as $lc){ ?>
                <div class="product-grid">
                  <div class="item">
                    <div class="product-thumb">
                      <div class="image product-imageblock">
                        <a href="<?php echo base_url('product-detail/').$lc->id; ?>">
                          <img data-name="product_image" src="<?php echo base_url().$lc->product_featured_image; ?>" alt="<?php echo $lc->product_name; ?>" title="<?php echo $lc->product_name; ?>" class="img-responsive">
                          <img src="<?php echo base_url('static/front/') ?>img/product9-1.jpg" alt="<?php echo $lc->product_name; ?>" title="<?php echo $lc->product_name; ?>" class="img-responsive">
                        </a>
                      </div>
                    </div>
                  </div>
                </div>
                <?php } ?>
              </div>
            </div></div>
           <div class="col-md-6"> 
           
           <div class="tab-pane" id="Featured">
              <div class="Featured owl-carousel">
                <?php $featured_category = $this->lib->get_by_id('products','is_featured',1);
                foreach($featured_category as $fc){ ?>
                  <div class="product-grid">
                    <div class="item">
                      <div class="product-thumb  mb_30">
                        <div class="image product-imageblock"> 
                          <a href="<?php echo base_url('product-detail/').$fc->id; ?>">
                            <img data-name="product_image" src="<?php echo base_url().$fc->product_featured_image; ?>" alt="<?php echo $fc->product_name; ?>" title="<?php echo $fc->product_name; ?>" class="img-responsive">
                            <img src="<?php echo base_url('static/front/') ?>img/product2-1.jpg" alt="<?php echo $fc->product_name; ?>" title="<?php echo $fc->product_name; ?>" class="img-responsive">
                          </a> 
                        </div>
                      </div>
                    </div>                
                  </div>
                <?php } ?>  
              </div>
           </div>
          </div>
        </div>
        </div>
        <!-- =====  PRODUCT TAB  END ===== --> 
        <!-- =====  SUB BANNER  STRAT ===== -->
        <div class="row">
          <div class="cms_banner mt_40 mb_60">
            <div class="col-xs-12">
              <?php $banner5 = $this->lib->get_row_array('banners',array('id'=> 5));
              ?>
              <div id="subbanner5" class="banner"> <a href="<?php echo $banner5->banner_link; ?>"><img src="<?php echo base_url('static/front/') ?>img/sub5.png" alt="Sub Banner5" class="img-responsive"></a>
                <div class="bannertext">
                  <h2><?php echo $banner5->banner_text; ?></h2>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- =====  SUB BANNER END  ===== -->
        
        <div class="row Blog">
          <div class="col-xs-12 col-sm-6 col-md-8 col-lg-9"> 
            <!-- =====  sale product  ===== -->
            <div id="sale-product">
              <div class="heading-part mb_20 ">
                <h2 class="main_title">Latest from the Blog </h2>
              </div>
              <div class="blog-contain box">
                <div class="blog owl-carousel ">
                  <div class="item">
                <div class="box-holder">
                  <div class="thumb post-img"><a href="#"> <img src="<?php echo base_url('static/front/') ?>img/blog_img_01.jpg" alt="fastro"> </a> </div>
                  <div class="post-info mtb_20 ">
                    <h6 class="mb_10 text-uppercase"> <a href="single_blog.html">Fashions fade, style is eternal</a> </h6>
                    <p>Aliquam egestas pellentesque est. Etiam a orci Nulla id enim feugiat ligula ullamcorper scelerisque. Morbi eu luctus nisl.</p>
                    <div class="date-time">
                      <div class="day"> 11</div>
                      <div class="month">Aug</div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="box-holder">
                  <div class="thumb post-img"><a href="#"> <img src="<?php echo base_url('static/front/') ?>img/blog_img_02.jpg" alt="fastro"> </a></div>
                  <div class="post-info mtb_20 ">
                    <h6 class="mb_10 text-uppercase"> <a href="single_blog.html">Fashions fade, style is eternal</a> </h6>
                    <p>Aliquam egestas pellentesque est. Etiam a orci Nulla id enim feugiat ligula ullamcorper scelerisque. Morbi eu luctus nisl.</p>
                    <div class="date-time">
                      <div class="day"> 11</div>
                      <div class="month">Aug</div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="box-holder">
                  <div class="thumb post-img"><a href="#"> <img src="<?php echo base_url('static/front/') ?>img/blog_img_01.jpg" alt="fastro"> </a></div>
                  <div class="post-info mtb_20 ">
                    <h6 class="mb_10 text-uppercase"> <a href="single_blog.html">Fashions fade, style is eternal</a> </h6>
                    <p>Aliquam egestas pellentesque est. Etiam a orci Nulla id enim feugiat ligula ullamcorper scelerisque. Morbi eu luctus nisl.</p>
                    <div class="date-time">
                      <div class="day"> 11</div>
                      <div class="month">Aug</div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="box-holder">
                  <div class="thumb post-img"><a href="#"> <img src="<?php echo base_url('static/front/') ?>img/blog_img_01.jpg" alt="fastro"> </a></div>
                  <div class="post-info mtb_20 ">
                    <h6 class="mb_10 text-uppercase"> <a href="single_blog.html">Fashions fade, style is eternal</a> </h6>
                    <p>Aliquam egestas pellentesque est. Etiam a orci Nulla id enim feugiat ligula ullamcorper scelerisque. Morbi eu luctus nisl.</p>
                    <div class="date-time">
                      <div class="day"> 11</div>
                      <div class="month">Aug</div>
                    </div>
                  </div>
                </div>
              </div>
                </div>
              </div>
            </div>
            <!-- =====  sale product end ===== --> 
          </div>
          <!-- =====  testimonial  ===== -->
          <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
            <div class="Testimonial right-sidebar-widget" style="margin-bottom:30px;">
              <div class="heading-part mb_20 ">
                <h2 class="main_title">Testimonials</h2>
              </div>
              <div class="client owl-carousel text-center" >
                <?php $testimonials = $this->lib->get_table('testimonials',array('id'=>'asc'));
                foreach($testimonials as $test){ ?>
                  <div class="item client-detail">
                    <div class="client-avatar"> <img alt="" src="<?php echo base_url('').$test->customer_image; ?>"> </div>
                    <div class="client-title  mt_30"><strong><?php echo $test->customer_name; ?></strong></div>
                    <p><i class="fa fa-quote-left" aria-hidden="true"></i><?php echo $test->testimonial_content; ?></p>
                  </div>
                <?php } ?>
              </div>
            </div>
          </div>
          <!-- =====  testimonial end ===== --> 
        </div>
        
        <!-- =====  Blog ===== -->
        <!-- <div id="Blog" class="mt_30">
          <div class="heading-part mb_20 ">
            <h2 class="main_title">Latest from the Blog</h2>
          </div>
          <div class="blog-contain box">
            <div class="blog owl-carousel ">
              <div class="item">
                <div class="box-holder">
                  <div class="thumb post-img"><a href="#"> <img src="<?php echo base_url('static/front/') ?>img/blog_img_01.jpg" alt="fastro"> </a> </div>
                  <div class="post-info mtb_20 ">
                    <h6 class="mb_10 text-uppercase"> <a href="single_blog.html">Fashions fade, style is eternal</a> </h6>
                    <p>Aliquam egestas pellentesque est. Etiam a orci Nulla id enim feugiat ligula ullamcorper scelerisque. Morbi eu luctus nisl.</p>
                    <div class="date-time">
                      <div class="day"> 11</div>
                      <div class="month">Aug</div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="box-holder">
                  <div class="thumb post-img"><a href="#"> <img src="<?php echo base_url('static/front/') ?>img/blog_img_02.jpg" alt="fastro"> </a></div>
                  <div class="post-info mtb_20 ">
                    <h6 class="mb_10 text-uppercase"> <a href="single_blog.html">Fashions fade, style is eternal</a> </h6>
                    <p>Aliquam egestas pellentesque est. Etiam a orci Nulla id enim feugiat ligula ullamcorper scelerisque. Morbi eu luctus nisl.</p>
                    <div class="date-time">
                      <div class="day"> 11</div>
                      <div class="month">Aug</div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="box-holder">
                  <div class="thumb post-img"><a href="#"> <img src="<?php echo base_url('static/front/') ?>img/blog_img_01.jpg" alt="fastro"> </a></div>
                  <div class="post-info mtb_20 ">
                    <h6 class="mb_10 text-uppercase"> <a href="single_blog.html">Fashions fade, style is eternal</a> </h6>
                    <p>Aliquam egestas pellentesque est. Etiam a orci Nulla id enim feugiat ligula ullamcorper scelerisque. Morbi eu luctus nisl.</p>
                    <div class="date-time">
                      <div class="day"> 11</div>
                      <div class="month">Aug</div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="box-holder">
                  <div class="thumb post-img"><a href="#"> <img src="<?php echo base_url('static/front/') ?>img/blog_img_02.jpg" alt="fastro"> </a></div>
                  <div class="post-info mtb_20 ">
                    <h6 class="mb_10 text-uppercase"> <a href="single_blog.html">Fashions fade, style is eternal</a> </h6>
                    <p>Aliquam egestas pellentesque est. Etiam a orci Nulla id enim feugiat ligula ullamcorper scelerisque. Morbi eu luctus nisl.</p>
                    <div class="date-time">
                      <div class="day"> 11</div>
                      <div class="month">Aug</div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- =====  Blog end ===== --> 
        <!-- </div> -->
      </div>
    </div>
  </div>
  <!-- =====  CONTAINER END  ===== --> 