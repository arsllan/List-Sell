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
                  <li data-transition='random' data-slotamount='7' data-masterspeed='1000' data-thumb="{{ asset('public/front/images/slide-img1.jpg')}}"><img src="{{ asset('public/front/images/slide-img1.jpg')}}"  data-bgfit='cover' data-bgrepeat='no-repeat' alt="banner"/>
                    <div class="container">
                      <div class="content_slideshow">
                        <div class="row">
                          <div class="col-lg-3 col-sm-3 col-md-3 "> &nbsp; </div>
                          <div class="col-lg-9 col-sm-9 col-md-9">
                            <div class="info">
                              <div class='tp-caption ExtraLargeTitle sft  tp-resizeme ' data-endspeed='500' data-speed='500' data-start='1100' data-easing='Linear.easeNone' data-splitin='none' data-splitout='none' data-elementdelay='0.1' data-endelementdelay='0.1' style='z-index:2; white-space:nowrap;'><span>Top Brands 2019</span> </div>
                              <div class='tp-caption LargeTitle sfl  tp-resizeme ' data-endspeed='500' data-speed='500' data-start='1300' data-easing='Linear.easeNone' data-splitin='none' data-splitout='none' data-elementdelay='0.1' data-endelementdelay='0.1' style='z-index:3; white-space:nowrap;'><span style="font-weight:normal; display:block">Modern-classic</span> incredible </div>
                              <div class='tp-caption Title sft  tp-resizeme ' data-endspeed='500' data-speed='500' data-start='1450' data-easing='Power2.easeInOut' data-splitin='none' data-splitout='none' data-elementdelay='0.1' data-endelementdelay='0.1' style='z-index:4; white-space:nowrap;'>Get 40% OFF on selected items.</div>
                              <div class='tp-caption sfb  tp-resizeme ' data-endspeed='500' data-speed='500' data-start='1500' data-easing='Linear.easeNone' data-splitin='none' data-splitout='none' data-elementdelay='0.1' data-endelementdelay='0.1' style='z-index:4; white-space:nowrap;'><a href='{{ route("contact-us") }}' class="buy-btn">Contact Us</a> </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </li>
                  <li data-transition='random' data-slotamount='7' data-masterspeed='1000' data-thumb="{{ asset('public/front/images/slide-img2.jpg')}}"><img src="{{ asset('public/front/images/slide-img2.jpg')}}"  data-bgfit='cover' data-bgrepeat='no-repeat' alt="banner"/>
                    <div class="container">
                      <div class="content_slideshow">
                        <div class="row">
                          <div class="col-lg-3 col-sm-3 col-md-3">&nbsp;</div>
                          <div class="col-lg-9 col-sm-9 col-md-9">
                            <div class="info">
                              <div class='tp-caption ExtraLargeTitle sft  tp-resizeme ' data-endspeed='500' data-speed='500' data-start='1100' data-easing='Linear.easeNone' data-splitin='none' data-splitout='none' data-elementdelay='0.1' data-endelementdelay='0.1' style='z-index:2; white-space:nowrap;'><span>Top Brands 2018</span> </div>
                              <div class='tp-caption LargeTitle sfl  tp-resizeme ' data-endspeed='500' data-speed='500' data-start='1300' data-easing='Linear.easeNone' data-splitin='none' data-splitout='none' data-elementdelay='0.1' data-endelementdelay='0.1' style='z-index:3; white-space:nowrap;'><span style="font-weight:normal; display:block">Modern-classic</span> Decorative </div>
                              <div class='tp-caption Title sft  tp-resizeme ' data-endspeed='500' data-speed='500' data-start='1450' data-easing='Power2.easeInOut' data-splitin='none' data-splitout='none' data-elementdelay='0.1' data-endelementdelay='0.1' style='z-index:4; white-space:nowrap;'>Get 40% OFF on selected items.</div>
                              <div class='tp-caption sfb  tp-resizeme ' data-endspeed='500' data-speed='500' data-start='1500' data-easing='Linear.easeNone' data-splitin='none' data-splitout='none' data-elementdelay='0.1' data-endelementdelay='0.1' style='z-index:4; white-space:nowrap;'><a href='{{ route("contact-us") }}' class="buy-btn">Contact Us</a> </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </li>
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
          <div class="section-filter" style="top:7%;">
            <div class="b-filter__inner bg-grey">
              <h2>2023 New Car Prices and Specifications</h2>
              <form class="b-filter">
                <!---->
                <select class="form-select mb-3" aria-label="Default select example" data-width="100%" tabindex="-98">
                  <option>Select a Brand</option>
                    <option>Make 1</option>
                    <option>Make 2</option>
                    <option>Make 3</option>
                </select>
                <select class="form-select mb-3" aria-label="Default select example" data-width="100%" tabindex="-98">
                  <option>Select a Model</option>
                    <option>Status 1</option>
                    <option>Status 2</option>
                    <option>Status 3</option>
                </select>
                <select class="form-select mb-3" aria-label="Default select example" data-width="100%" tabindex="-98">
                  <option>Select a Body</option>
                    <option>Model 1</option>
                    <option>Model 2</option>
                    <option>Model 3</option>
                </select>
                <select class="form-select mb-3" aria-label="Default select example" data-width="100%" tabindex="-98">
                  <option>Any Price Range</option>
                    <option>Location 1</option>
                    <option>Location 2</option>
                    <option>Location 3</option>
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
    <section class="pt-5 wow bounceInUp animated">
      <div class="best-pro slider-items-products container">
        <div class="new_title">
          <h2><span class="brandtext">New Cars For Sale</span></h2>
        </div>
        <div id="best-seller" class="newlistingbybrand products-grid">
            <div id="best-seller" class="product-flexslider hidden-buttons">
                <div class="slider-items slider-width-col4 products-grid"> 
                @forelse($newlisting as $list) 
                    <div class="item">
                      <div class="item-inner">
                        <div class="item-img">
                          <div class="item-img-info">
                            <a href="{{ route('auto-detail',$list->slug) }}" title="Retis lapen casen" class="product-image">
                              <img style="height:197px;" src="{{ asset('public/uploads/listings/'.$list->feature_image) }}" alt="Retis lapen casen">
                            </a>
                            <div class="new-label new-top-left">New</div>
                            <div class="item-box-hover">
                              <div class="box-inner">
                                <div class="product-detail-bnt">
                                  <a class="button detail-bnt" href="{{ route('auto-detail',$list->slug) }}">
                                    <span>Quick View</span>
                                  </a>
                                </div>
                                <div class="actions" data-listingid="{{ $list->id }}">
                                  <span class="add-to-links">
                                    <a href="#!" class="link-wishlist add-to-fav" title="Add to Wishlist">
                                      <span>Add to Wishlist</span>
                                    </a>
                                  </span>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="item-info">
                          <div class="info-inner">
                            <div class="item-title">
                              <a href="{{ route('auto-detail',$list->slug) }}" title="Retis lapen casen">{{ $list->title }}</a>
                            </div>
                            <div class="item-content">
                              <div class="rating">
                                <div class="ratings">
                                  <div class="rating-box">
                                    <div class="rating" style="width:80%"></div>
                                  </div>
                                  <p class="rating-links">
                                    <a href="#">1 Review(s)</a>
                                    <span class="separator">|</span>
                                    <a href="#">Add Review</a>
                                  </p>
                                </div>
                              </div>
                              <div class="item-price">
                                <div class="price-box">
                                  <span class="regular-price">
                                    <span class="price">R{{ $list->price }}</span>
                                  </span>
                                </div>
                              </div>
                              <div class="other-info">
                                <div class="col-km">
                                  <i class="fa fa-tachometer"></i> {{ $list->mileage }}
                                </div>
                                <div class="col-engine">
                                  <i class="fa fa-gear"></i> {{ $list->transmission }}
                                </div>
                                <div class="col-date">
                                  <i class="fa fa-calendar" aria-hidden="true"></i> {{ $list->year }}
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div> 
                    @empty <div class="alert alert-secondary">No record found.</div> 
                @endforelse
                </div>
            </div>
        </div>
      </div>
    </section>
  <!---->
    <div class="container">
        <div class="alert alert-primary" role="alert">
          <h4 class="alert-heading" style="font-weight:bold;">Popular new cars</h4>
          <p>Research the most popular new models in South Africa.</p>
        </div>
    </div>
    <!---->
    <div class="container">
        <div id="tabsCars">
            <ul class="nav w-100 nav-tabs car-tabs" id="myTab" role="tablist">
                @foreach($bodytypes as $type)
                    <li class="nav-item" role="presentation">
                        <button class="nav-link @if($loop->iteration == 1) active @endif" id="C{{ $loop->iteration }}-tab" data-bs-toggle="tab" data-bs-target="#C{{ $loop->iteration }}-tab-pane" type="button" role="tab" aria-controls="C{{ $loop->iteration }}-tab-pane" aria-selected="true">
                            <div class="mb-2">{{ $type->name }}</div>
                            <img class="img-fluid" src="{{ asset('public/uploads/bodytypes/'.$type->image) }}" alt="{{ $type->name }}">
                        </button>
                    </li>   
                @endforeach            
            </ul>
        </div>
        <div class="tab-content tab_car_content" id="myTabContent">
          @foreach($bodytypes as $type)  
          <div class="tab-pane fade @if($loop->iteration == 1) show active @endif" id="C{{ $loop->iteration }}-tab-pane" role="tabpanel" aria-labelledby="C{{ $loop->iteration }}-tab" tabindex="0">
                @php
                    $newlisting = \App\Models\Listing::with('model','model_sub','equipment','body_type','media')->where('body_type_id',$type->id)->where('status',1)->orderBy('created_at','desc')->limit(5)->get();
                @endphp
              <div class="row tabsCard">
                  @forelse($newlisting as $row)
                  <div class="col-xl-2 col-lg-3 col-sm-6 text-center">
                      <div class="card card-body p-2">
                          <div class="imageF mb-3"><img class="img-fluid" src="{{ asset('public/uploads/listings/'.$row->feature_image) }}" alt=""></div>
                          <h4 class="card-title mt-2">{{ $row->title }}</h4>
                          <div class="price_car">From R{{ $row->price }}</div>
                      </div>
                  </div>
                  @empty
                  <div class="alert alert-danger">No Record Found!</div>
                  @endforelse
              </div>
          </div>
          @endforeach
        </div>
    </div>
    <!---->
    <div class="container my-4">
        <div class="alert alert-primary" role="alert">
          <h4 class="alert-heading" style="font-weight:bold;">Search New Cars by Manufacturer</h4>
          <p>Research the most popular new models in South Africa.</p>
        </div>
    </div>
    <!---->
    <div class="container mb-3">
        <div class="row align-items-center text-center justify-content-center">
          @foreach($brands as $brand)
            <div class="col-xxl-2 col-xl-2 col-lg-3 col-md-4 brandmain" data-id="{{ $brand->id }}" data-name="{{ $brand->name }}">
                <div class="brandsList">
                    <div class="brandListLogo">
                        <div class="brandLogoImg"><a href="#!"><img style="width:150px" src="{{ asset('public/uploads/brands/'.$brand->image) }}" alt="Abarth for sale"></a></div>
                        <h2><a href="!#">{{ $brand->name }} </a></h2>
                    </div>
                </div>
            </div>
          @endforeach
        </div>
    </div>
</div>
@endsection