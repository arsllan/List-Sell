@extends('layouts/frontapp')
@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row"> 
        <!-- Slider -->
        <div class="home-slider5 p-0">
          <div id="thmg-slideshow" class="thmg-slideshow">
            <div id='rev_slider_4_wrapper' class='rev_slider_wrapper fullwidthbanner-container' >
              <div id='rev_slider_4' class='rev_slider fullwidthabanner'>
                <ul>
                @forelse($sliders as $slide)
                  <li data-transition='random' data-slotamount='7' data-masterspeed='1000' data-thumb="{{ asset('public/uploads/sliders/'.$slide->image)}}"><img src="{{ asset('public/uploads/sliders/'.$slide->image)}}"  data-bgfit='cover' data-bgrepeat='no-repeat' alt="banner"/>
                    <div class="container">
                      <div class="content_slideshow">
                        <div class="row">
                          <div class="col-lg-3 col-sm-3 col-md-3 "> &nbsp; </div>
                          <div class="col-lg-9 col-sm-9 col-md-9">
                            <div class="info">
                              <div class='tp-caption ExtraLargeTitle sft  tp-resizeme ' data-endspeed='500' data-speed='500' data-start='1100' data-easing='Linear.easeNone' data-splitin='none' data-splitout='none' data-elementdelay='0.1' data-endelementdelay='0.1' style='z-index:2; white-space:nowrap;'><span>{{ $slide->title }}</span> </div>
                              <div class='tp-caption LargeTitle sfl  tp-resizeme ' data-endspeed='500' data-speed='500' data-start='1300' data-easing='Linear.easeNone' data-splitin='none' data-splitout='none' data-elementdelay='0.1' data-endelementdelay='0.1' style='z-index:3; white-space:nowrap;'><span style="font-weight:normal; display:block">{{ $slide->sub_title }}</span> </div>
                              <div class='tp-caption Title sft  tp-resizeme ' data-endspeed='500' data-speed='500' data-start='1450' data-easing='Power2.easeInOut' data-splitin='none' data-splitout='none' data-elementdelay='0.1' data-endelementdelay='0.1' style='z-index:4; white-space:nowrap;'>{{ $slide->underline }}</div>
                              <div class='tp-caption sfb  tp-resizeme ' data-endspeed='500' data-speed='500' data-start='1500' data-easing='Linear.easeNone' data-splitin='none' data-splitout='none' data-elementdelay='0.1' data-endelementdelay='0.1' style='z-index:4; white-space:nowrap;'><a href="{{ route('contact-us') }}" class="buy-btn">Contact Us</a> </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </li>
                @empty
                @endforelse
                </ul>
                <div class="tp-bannertimer"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!---->
      <div class="col-xxl-9 col-xl-9 col-lg-10 col-11 mx-auto">
        <div class="row">
          <div class="section-filter">
            <div class="b-filter__inner bg-grey">
              <h2>Search Here</h2>
              <form action="{{ route('listing') }}" method="get" class="b-filter">
                <select class="form-select mb-1" name="category">
                    <option value="">Select Category</option>
                    @foreach($categories as $cat)
                        <option value="{{ $cat->slug }}">{{ $cat->name }} For Sale</option>
                    @endforeach
                </select>
                <select class="form-select mb-1" name="location">
                    <option value="">Select Location</option>
                    @foreach($states as $state)
                        <option value="{{ $state->slug }}">{{ $state->name }}</option>
                    @endforeach
                </select>
                <select class="form-select mb-1" name="city" id="city">
                    <option value="">Select City</option>
                    @foreach(cities() as $city)
                        <option value="{{ $city->slug }}" @if(request()->city == $city->slug) selected @endif>{{ $city->name }}</option>
                    @endforeach
                </select>
                <select class="form-select mb-1" name="start_price" id="start_price" title="Price - from" data-width="100%" >
                   <option value="">Price - from</option>
                   <option value="170000">R170,000</option>
                   <option value="180000">R180,000</option>
                   <option value="190000">R190,000</option>
                   <option value="200000">R200,000</option>
                   <option value="250000">R250,000</option>
                   <option value="300000">R300,000</option>
                   <option value="350000">R350,000</option>
                   <option value="400000">R400,000</option>
                   <option value="450000">R450,000</option>
                   <option value="500000">R500,000</option>
                   <option value="550000">R550,000</option>
                   <option value="600000">R600,000</option>
                   <option value="650000">R650,000</option>
                   <option value="700000">R700,000</option>
                   <option value="750000">R750,000</option>
                   <option value="800000">R800,000</option>
                   <option value="850000">R850,000</option>
                   <option value="900000">R900,000</option>
                   <option value="950000">R950,000</option>
                   <option value="1000000">R1,000,000</option>
                </select>
                <select class="form-select mb-1" name="end_price" id="end_price" title="Price - to" data-width="100%" >
                   <option value="">Price - to</option>
                   <option value="180000">R180,000</option>
                   <option value="190000">R190,000</option>
                   <option value="200000">R200,000</option>
                   <option value="250000">R250,000</option>
                   <option value="300000">R300,000</option>
                   <option value="350000">R350,000</option>
                   <option value="400000">R400,000</option>
                   <option value="450000">R450,000</option>
                   <option value="500000">R500,000</option>
                   <option value="550000">R550,000</option>
                   <option value="600000">R600,000</option>
                   <option value="650000">R650,000</option>
                   <option value="700000">R700,000</option>
                   <option value="750000">R750,000</option>
                   <option value="800000">R800,000</option>
                   <option value="850000">R850,000</option>
                   <option value="900000">R900,000</option>
                   <option value="950000">R950,000</option>
                   <option value="1000000">R1,000,000</option>
                   <option value="2000000">R2,000,000</option>
                </select>
                <a href="#" class="reset-btn">Reset Form</a>
                <div>
                  <div class="b-filter__btns">
                    <button class="btn btn-lg btn-primary">search vehicle</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <!---->
    </div>
    <!---->
    <!--<div class="my-5">-->
    <!--    <div class="container">-->
    <!--        <div class="row">-->
    <!--            <div class="col-lg-9 mb-lg-0 mb-4">-->
    <!--                <div class="text-center comparison_heading">-->
    <!--                    <h5>Top <span>New Car</span> Comparisons</h5>-->
    <!--                    <p>When it comes to buying a car, everyone has different priorities, <strong>Best Cars Dealer</strong> comes with excellent car comparison features that suits your needs</p>-->
    <!--                </div>-->
    <!--                <div id="carouselExampleFade" class="carousel slide carousel-fade" data-bs-ride="carousel">-->
    <!--                    <div class="carousel-indicators">-->
    <!--                        <button type="button" data-bs-target="#carouselExampleFade" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>-->
    <!--                        <button type="button" data-bs-target="#carouselExampleFade" data-bs-slide-to="1" aria-label="Slide 2"></button>-->
    <!--                    </div>-->
    <!--                    <div class="carousel-inner">-->
    <!--                        <div class="car-comparisons-wrapper"><a href="#" class="vs"><img class="inner-img img-fluid" src="{{ asset('public/front/images/versus.png') }}" alt="icon"/></a></div>-->
    <!--                        <div class="carousel-item active" data-bs-interval="10000">-->
    <!--                            <div class="row">-->
    <!--                                <div class="col-6">-->
    <!--                                    <div class="comparison_box">-->
    <!--                                        <div class="img-comparison"><a href="#"><img class="inner-img img-fluid" src="{{ asset('public/front/images/schedule.png') }}" alt="icon"/></a></div>-->
    <!--                                        <a href="#" class="comparison_link">Toyota <br/> <small>Corolla Quest</small></a>-->
    <!--                                    </div>-->
    <!--                                </div>-->
    <!--                                <div class="col-6">-->
    <!--                                    <div class="comparison_box">-->
    <!--                                        <div class="img-comparison"><a href="#"><img class="inner-img img-fluid" src="{{ asset('public/front/images/speakers.png') }}" alt="icon"/></a></div>-->
    <!--                                        <a href="#" class="comparison_link">Toyota <br/> <small>Corolla Quest</small></a>-->
    <!--                                    </div>-->
    <!--                                </div>-->
    <!--                            </div>-->
    <!--                        </div>-->
    <!--                        <div class="carousel-item" data-bs-interval="2000">-->
    <!--                            <div class="row">-->
    <!--                                <div class="col-6">-->
    <!--                                    <div class="comparison_box">-->
    <!--                                        <div class="img-comparison"><a href="#"><img class="inner-img img-fluid" src="{{ asset('public/front/images/speakers.png') }}" alt="icon"/></a></div>-->
    <!--                                        <a href="#" class="comparison_link">Toyota <br/> <small>Corolla Quest</small></a>-->
    <!--                                    </div>-->
    <!--                                </div>-->
    <!--                                <div class="col-6">-->
    <!--                                    <div class="comparison_box">-->
    <!--                                        <div class="img-comparison"><a href="#"><img class="inner-img img-fluid" src="{{ asset('public/front/images/schedule.png') }}" alt="icon"/></a></div>-->
    <!--                                        <a href="#" class="comparison_link">Toyota <br/> <small>Corolla Quest</small></a>-->
    <!--                                    </div>-->
    <!--                                </div>-->
    <!--                            </div>-->
    <!--                        </div>-->
    <!--                    </div>-->
    <!--                </div>-->
    <!--                <div class="text-center mt-4">-->
    <!--                    <a href="#" class="btn compare-btn">Compare Other Vehicles</a>-->
    <!--                </div>-->
    <!--            </div>-->
    <!--            <div class="col-lg-3">-->
    <!--                <div style="border-radius:5px; overflow:hidden;">-->
    <!--                    <div class="mostpopularpro"><h2>Most Popular</h2></div>-->
    <!--                    <div class="text-center testimonial-1">-->
    <!--                        <div class="testimonial-block text-center">-->
    <!--                          <div class="testimonial-image">-->
    <!--                            <img height="250" src="{{ asset('public/front/images/speakers.png') }}" class="attachment-cardealer-blog-thumb size-cardealer-blog-thumb wp-post-image" alt="" loading="lazy" srcset="{{ asset('public/front/images/speakers.png') }}" sizes="(max-width: 450px) 100vw, 450px">-->
    <!--                          </div>-->
    <!--                          <div class="testimonial-box">-->
    <!--                            <div class="testimonial-avtar">-->
    <!--                              <img loading="lazy" class="img-responsive mb-4" src="https://cars.alliftech.com/public/front/images/brand2.png" width="150" height="150">-->
    <!--                              <h6>Rolls-Royce</h6>-->
    <!--                              <span>| Phantom </span>-->
    <!--                            </div>-->
    <!--                          </div>-->
    <!--                        </div>-->
    <!--                    </div>-->
    <!--                </div>-->
    <!--            </div>-->
    <!--        </div>-->
    <!--    </div>-->
    <!--</div>-->
    <section class="mt-lg-4 mt-3 wow bounceInUp animated">
      <div class="hot_deals slider-items-products col-xxl-9 col-xl-9 col-lg-10 col-11 mx-auto">
        <div class="new_title">
          <h2><span>Deals of the Week</span></h2>
          <!--<div class="box-timer">-->
          <!--  <div class="countbox_1 timer-grid"></div>-->
          <!--</div>-->
        </div>
        <div id="hot_deals" class="product-flexslider hidden-buttons">
          <div class="slider-items slider-width-col4 products-grid">
            @forelse($bestsellerlisting as $list)
            <div class="item">
              <div class="item-inner">
                <div class="item-img">
                  <div class="item-img-info"><a href="{{ route('auto-detail',$list->slug) }}" class="" title="Retis lapen casen" class="product-image"><img style="height:197px;" src="{{ asset('public/uploads/listings/'.$list->feature_image) }}" alt="Retis lapen casen"></a>
                    <div class="new-label new-top-left">New</div>
                    <div class="item-box-hover">
                      <div class="box-inner">
                        <!--<div class="add_cart">-->
                        <!--  <button class="button btn-cart" type="button"></button>-->
                        <!--</div>-->
                        <div class="product-detail-bnt"><a class="button detail-bnt" href="{{ route('auto-detail',$list->slug) }}"><span>Quick View</span></a></div>
                        <div class="actions" data-listingid="{{ $list->id }}"><span class="add-to-links"><a href="#!" class="link-wishlist add-to-fav" title="Add to Wishlist"><span>Add to Wishlist</span></a> </span> </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="item-info">
                  <div class="info-inner">
                    <div class="item-title"><a href="{{ route('auto-detail',$list->slug) }}" class="d-inline-block text-truncate" style="max-width: 150px;" title="Retis lapen casen">{{ $list->title }}</a> </div>
                    <div class="item-content">
                      <div class="rating">
                        <div class="ratings">
                          <div class="rating-box">
                            <div class="rating" style="width:80%"></div>
                          </div>
                          <p class="rating-links"><a href="#">1 Review(s)</a> <span class="separator">|</span> <a href="#">Add Review</a> </p>
                        </div>
                      </div>
                      <div class="item-price">
                        <div class="price-box"><span class="regular-price"><span class="price">R{{ $list->price }}</span> </span> </div>
                      </div>
                      <div class="other-info">
                        <div class="col-km"><i class="fa fa-tachometer"></i> {{ $list->mileage }}</div>
                        <div class="col-engine"><i class="fa fa-gear"></i> {{ $list->transmission }}</div>
                        <div class="col-date"><i class="fa fa-calendar" aria-hidden="true"></i> {{ $list->year }}</div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            @empty
                No record found.
            @endforelse    
          </div>
        </div>
      </div>
    </section>
    <!---->
    <section class="mt-lg-4 mt-3">
        <div class="logo-brand col-xxl-9 col-xl-9 col-lg-10 col-11 mx-auto">
            <div class="brand-title">
              <h2><span>Popular Searches</span></h2>
            </div>
            <!---->
        <div id="best-seller" class="product-flexslider hidden-buttons">
          <div class="slider-items slider-width-col4 products-grid">
            @forelse($popularsearches as $list)
            <div class="item">
              <div class="item-inner">
                <div class="item-img">
                  <div class="item-img-info"><a href="{{ route('auto-detail',$list->slug) }}" class="" title="Retis lapen casen" class="product-image"><img style="height:197px;" src="{{ asset('public/uploads/listings/'.$list->feature_image) }}" alt="Retis lapen casen"></a>
                    <div class="new-label new-top-left">New</div>
                    <div class="item-box-hover">
                      <div class="box-inner">
                        <!--<div class="add_cart">-->
                        <!--  <button class="button btn-cart" type="button"></button>-->
                        <!--</div>-->
                        <div class="product-detail-bnt"><a class="button detail-bnt" href="{{ route('auto-detail',$list->slug) }}"><span>Quick View</span></a></div>
                        <div class="actions" data-listingid="{{ $list->id }}"><span class="add-to-links"><a href="#!" class="link-wishlist add-to-fav" title="Add to Wishlist"><span>Add to Wishlist</span></a> </span> </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="item-info">
                  <div class="info-inner">
                    <div class="item-title"><a href="{{ route('auto-detail',$list->slug) }}" class="d-inline-block text-truncate" style="max-width: 150px;" title="Retis lapen casen">{{ $list->title }}</a> </div>
                    <div class="item-content">
                      <div class="rating">
                        <div class="ratings">
                          <div class="rating-box">
                            <div class="rating" style="width:80%"></div>
                          </div>
                          <p class="rating-links"><a href="#">1 Review(s)</a> <span class="separator">|</span> <a href="#">Add Review</a> </p>
                        </div>
                      </div>
                      <div class="item-price">
                        <div class="price-box"><span class="regular-price"><span class="price">R{{ $list->price }}</span> </span> </div>
                      </div>
                      <div class="other-info">
                        <div class="col-km"><i class="fa fa-tachometer"></i> {{ $list->mileage }}</div>
                        <div class="col-engine"><i class="fa fa-gear"></i> {{ $list->transmission }}</div>
                        <div class="col-date"><i class="fa fa-calendar" aria-hidden="true"></i> {{ $list->year }}</div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            @empty
                No record found.
            @endforelse    
          </div>
        </div>
        </div>
    </section>
    <!--Category slider Start-->
    <div class="top-cate m-0">
      <div class="featured-pro col-xxl-9 col-xl-9 col-lg-10 col-11 mx-auto">
        <div>
          <div class="slider-items-products">
            <div class="new_title">
              <h2><span class="m-0">browse by Categories</span> </h2>
            </div>
            <div id="top-categories" class="product-flexslider hidden-buttons">
              <div class="slider-items slider-width-col4 products-grid">
                @forelse($categories as $cat)
                <div class="item">
                    @if($cat->slug == 'parts')
                        <a href="{{ URL::to('parts') }}" >
                    @else
                        <a href="{{ URL::to('listing?category='.$cat->slug) }}" >
                    @endif
                      <div class="pro-img"><img src="{{ asset('public/uploads/categories/'.$cat->image) }}" alt="Retis lapen casen">
                        <div class="pro-info">{{ $cat->name }}</div>
                      </div>
                    </a>
                </div>
                @empty
                
                @endforelse
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!--Category silder End-->
    <!-- best Pro Slider -->
      <section class=" wow bounceInUp animated">
        <div class="best-pro slider-items-products col-xxl-9 col-xl-9 col-lg-10 col-11 mx-auto">
          <div class="new_title">
            <h2><span>Best Seller Cars</span></h2>
          </div>
          <div id="best-seller" class="product-flexslider hidden-buttons">
            <div class="slider-items slider-width-col4 products-grid">
                        @forelse($bestsellerlisting as $list)
        <div class="item">
          <div class="item-inner">
            <div class="item-img">
              <div class="item-img-info"><a href="{{ route('auto-detail',$list->slug) }}" title="Retis lapen casen" class="product-image"><img style="height:197px;" src="{{ asset('public/uploads/listings/'.$list->feature_image) }}" alt="Retis lapen casen"></a>
                <div class="new-label new-top-left">New</div>
                <div class="item-box-hover">
                  <div class="box-inner">
                    <!--<div class="add_cart">-->
                    <!--  <button class="button btn-cart" type="button"></button>-->
                    <!--</div>-->
                    <div class="product-detail-bnt"><a class="button detail-bnt" href="{{ route('auto-detail',$list->slug) }}"><span>Quick View</span></a></div>
                    <div class="actions" data-listingid="{{ $list->id }}"><span class="add-to-links"><a href="#!" class="link-wishlist add-to-fav" title="Add to Wishlist"><span>Add to Wishlist</span></a> </span> </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="item-info">
              <div class="info-inner">
                <div class="item-title"><a href="{{ route('auto-detail',$list->slug) }}" title="Retis lapen casen">{{ $list->title }}</a> </div>
                <div class="item-content">
                  <div class="rating">
                    <div class="ratings">
                      <div class="rating-box">
                        <div class="rating" style="width:80%"></div>
                      </div>
                      <p class="rating-links"><a href="#">1 Review(s)</a> <span class="separator">|</span> <a href="#">Add Review</a> </p>
                    </div>
                  </div>
                  <div class="item-price">
                    <div class="price-box"><span class="regular-price"><span class="price">R{{ $list->price }}</span> </span> </div>
                  </div>
                  <div class="other-info">
                    <div class="col-km"><i class="fa fa-tachometer"></i> {{ $list->mileage }}</div>
                    <div class="col-engine"><i class="fa fa-gear"></i> {{ $list->transmission }}</div>
                    <div class="col-date"><i class="fa fa-calendar" aria-hidden="true"></i> {{ $list->year }}</div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        @empty
            No record found.
        @endforelse
            </div>
          </div>
        </div>
      </section>
      <!--Category slider Start-->
        <div class="top-cate">
          <div class="featured-pro col-xxl-9 col-xl-9 col-lg-10 col-11 mx-auto">
            <div>
              <div class="slider-items-products">
                <div class="new_title">
                  <h2><span class="m-0">browse by Body Type</span> </h2>
                </div>
                <div id="top-categories" class="product-flexslider hidden-buttons">
                  <div class="slider-items slider-width-col4 products-grid">
                    @forelse($bodytypes as $type)
                    <a href="{{ URL::to('listing?bodytype='.$type->id) }}" >
                    <div class="item">
                      <div class="pro-img"><img src="{{ asset('public/uploads/bodytypes/'.$type->image) }}" alt="Retis lapen casen">
                        <div class="pro-info">{{ $type->name }}</div>
                      </div>
                    </div>
                    </a>
                    @empty
                    
                    @endforelse
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!--Category silder End-->
    
    <div id="top">
      <div class="col-xxl-9 col-xl-9 col-lg-10 col-11 mx-auto">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
              <a href="{{ route('webadpost') }}" data-scroll-goto="1"><img src="{{ asset('public/front/images/speakers.png') }}" alt="promotion-banner1"><div class="btn">Want to Sell your Car?</div> </a>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
              <a href="{{route('new-cars')}}" data-scroll-goto="2"> <img src="{{ asset('public/front/images/schedule.png') }}" alt="promotion-banner2"><div class="btn">Searching for a New Car?</div> </a>
            </div>
        </div>
      </div>
    </div>
    
    
    
    <!-- Logo Brand Block -->
    <div class="brand-logo d-none wow bounceInUp animated">
      <div class="container">
        <div class="row">
          <div class="home-banner col-lg-2 hidden-md col-xs-12 hidden-sm"> </div>
          <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
            <div class="testimonials-section">
              <div class="offer-slider parallax parallax-2">
                <ul class="bxslider">
                  <li>
                    <div class="avatar"><img src="{{ asset('public/front/images/member1.png') }}" alt="Image"></div>
                    <div class="testimonials">Perfect Themes and the best of all that you have many options to choose! Very fast responding! I highly recommend this theme and these people!</div>
                    <div class="clients_author">Smith John <span>Happy Customer</span> </div>
                  </li>
                  <li>
                    <div class="avatar"><img src="{{ asset('public/front/images/member2.png') }}" alt="Image"></div>
                    <div class="testimonials">Code, template and others are very good. The support has served me immediately and solved my problems when I need help. Are to be congratulated.</div>
                    <div class="clients_author">Sahara Anderson <span>Happy Customer</span> </div>
                  </li>
                  <li>
                    <div class="avatar"><img src="{{ asset('public/front/images/member3.png') }}" alt="Image"></div>
                    <div class="testimonials">Our support and response has been amazing, helping me with several issues I came across and got them solved almost the same day. A pleasure to work with them! </div>
                    <div class="clients_author">Stephen Smith <span>Happy Customer</span> </div>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  
 
  
  <!-- Home Lastest Blog Block -->
  <div class="latest-blog d-none wow bounceInUp animated animated container"> 
    <!--exclude For version 6 -->
    <div class="blog-home-inner">
      <div class="blog-title">
        <h2><span>Latest Blog post</span></h2>
      </div>
      <!--For version 1,2,3,4,5,6,8 -->
      <div class="row">
        <div class="col-lg-4 col-md-4 col-xs-12 col-sm-4 blog-post">
          <div class="blog_inner">
            <div class="blog-img"> <a href="blog-detail.html"> <img src="{{ asset('public/front/images/blog-img1.jpg') }}" alt="blog image"> </a> </div>
            <!--blog-img-->
            <div class="blog-info">
              <div class="post-date"> <span class="entry-date">14  Jan, 2019</span> </div>
              <ul class="post-meta">
                <li><i class="fa fa-user"></i>Posted by <a href="#">admin</a> </li>
                <li><i class="fa fa-comments"></i><a href="#">4 comments</a> </li>
              </ul>
              <h3><a href="blog-detail.html">Powerful and flexible premium Ecommerce themes</a></h3>
              <p>Fusce ac pharetra urna. Duis non lacus sit amet lacus interdum facilisis sed non est. Ut mi metus, semper eu dictum nec...</p>
            </div>
          </div>
          <!--blog_inner--> 
        </div>
        <div class="col-lg-4 col-md-4 col-xs-12 col-sm-4 blog-post">
          <div class="blog_inner">
            <div class="blog-img"> <a href="blog-detail.html"> <img src="{{ asset('public/front/images/blog-img2.jpg') }}" alt="blog image"> </a> </div>
            <!--blog-img-->
            <div class="blog-info">
              <div class="post-date"> <span class="entry-date">23  Dec, 2018</span> </div>
              <ul class="post-meta">
                <li><i class="fa fa-user"></i>Posted by <a href="#">admin</a> </li>
                <li><i class="fa fa-comments"></i><a href="#">8 comments</a> </li>
              </ul>
              <h3><a href="blog-detail.html">Awesome template with lot's of features on the board!</a></h3>
              <p>Aliquam laoreet consequat malesuada. Integer vitae diam sed dolor euismod laoreet eget ac felis erat sed elit bibendum ...</p>
            </div>
          </div>
          <!--blog_inner--> 
        </div>
        <div class="col-lg-4 col-md-4 col-xs-12 col-sm-4 blog-post">
          <div class="blog_inner">
            <div class="blog-img"> <a href="blog-detail.html"> <img src="{{ asset('public/front/images/blog-img3.jpg') }}" alt="blog image"> </a> </div>
            <!--blog-img-->
            <div class="blog-info">
              <div class="post-date"> <span class="entry-date">23  Dec, 2018</span> </div>
              <ul class="post-meta">
                <li><i class="fa fa-user"></i>Posted by <a href="#">admin</a> </li>
                <li><i class="fa fa-comments"></i><a href="#">8 comments</a> </li>
              </ul>
              <h3><a href="blog-detail.html">Awesome template with lot's of features on the board!</a></h3>
              <p>Aliquam laoreet consequat malesuada. Integer vitae diam sed dolor euismod laoreet eget ac felis erat sed elit bibendum ...</p>
            </div>
          </div>
          <!--blog_inner--> 
        </div>
      </div>
    </div>
    <!--END For version 1,2,3,4,5,6,8 --> 
    <!--exclude For version 6 --> 
    <!--container--> 
  </div>
  <!---->
<section class=" wow bounceInUp animated">
  <div class="hot_deals slider-items-products col-xxl-9 col-xl-9 col-lg-10 col-11 mx-auto">
    <div class="new_title">
      <h2><span>New Car Listing</span></h2>
    </div>
    <div id="hot_deals" class="product-flexslider hidden-buttons">
      <div class="slider-items slider-width-col4 products-grid">
        @forelse($newlisting as $list)
        <div class="item">
          <div class="item-inner">
            <div class="item-img">
              <div class="item-img-info"><a href="{{ route('auto-detail',$list->slug) }}" title="Retis lapen casen" class="product-image"><img style="height:197px;" src="{{ asset('public/uploads/listings/'.$list->feature_image) }}" alt="Retis lapen casen"></a>
                <div class="new-label new-top-left">New</div>
                <div class="item-box-hover">
                  <div class="box-inner">
                    <!--<div class="add_cart">-->
                    <!--  <button class="button btn-cart" type="button"></button>-->
                    <!--</div>-->
                    <div class="product-detail-bnt"><a class="button detail-bnt" href="{{ route('auto-detail',$list->slug) }}"><span>Quick View</span></a></div>
                    <div class="actions" data-listingid="{{ $list->id }}"><span class="add-to-links"><a href="#!" class="link-wishlist add-to-fav" title="Add to Wishlist"><span>Add to Wishlist</span></a> </span> </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="item-info">
              <div class="info-inner">
                <div class="item-title"><a href="{{ route('auto-detail',$list->slug) }}" title="Retis lapen casen">{{ $list->title }}</a> </div>
                <div class="item-content">
                  <div class="rating">
                    <div class="ratings">
                      <div class="rating-box">
                        <div class="rating" style="width:80%"></div>
                      </div>
                      <p class="rating-links"><a href="#">1 Review(s)</a> <span class="separator">|</span> <a href="#">Add Review</a> </p>
                    </div>
                  </div>
                  <div class="item-price">
                    <div class="price-box"><span class="regular-price"><span class="price">R{{ $list->price }}</span> </span> </div>
                  </div>
                  <div class="other-info">
                    <div class="col-km"><i class="fa fa-tachometer"></i> {{ $list->mileage }}</div>
                    <div class="col-engine"><i class="fa fa-gear"></i> {{ $list->transmission }}</div>
                    <div class="col-date"><i class="fa fa-calendar" aria-hidden="true"></i> {{ $list->year }}</div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        @empty
            No record found.
        @endforelse
      </div>
    </div>
  </div>
</section>
<!---->
<section class="">
    <div class="logo-brand col-xxl-9 col-xl-9 col-lg-10 col-11 mx-auto">
    <div class="brand-title">
      <h2><span>Popular Brands</span></h2>
    </div>
    <div class="slider-items-products">
      <div id="brand-slider" class="product-flexslider hidden-buttons">
        <div class="slider-items slider-width-col6"> 
          <!-- Item -->
          @foreach($brands as $brand)
            
              <div class="item">
                <div class="logo-item"><a href="{{ URL::to('listing?brand='.$brand->slug) }}"><img src="{{ asset('public/uploads/brands/'.$brand->image) }}" width="150px" alt="Image"></a></div>
              </div>
            
          @endforeach
          <!-- End Item --> 
        </div>
      </div>
    </div>
  </div>
</section>



<script>
$(document).ready(function() {
    $('#brand').on('change', function() {
        var brand_id = this.value;
        $("#model").html('');
        $.ajax({
            url:"{{route('get-model-by-brand')}}",
            type: "POST",
            data: {
            brand_id: brand_id,
            _token: '{{csrf_token()}}' 
            },
            dataType : 'json',
            success: function(result){
                $('#model').html('<option value="">Select Model</option>'); 
                $.each(result.models,function(key,value){
                $("#model").append('<option value="'+value.id+'">'+value.name+'</option>');
                });
            }
        });
    });
});
</script>
  
@endsection