@extends('layouts/frontapp')
@section('content')
<div class="page-heading">
  <div class="breadcrumbs">
    <div class="container">
      <div class="row">
        <div class="col-xs-12">
          <ul>
            <li class="home"> <a href="{{ route('homepage') }}" title="Go to Home Page">Home</a> <span>&rsaquo; </span> </li>
            <li class="category1601"> <strong>Dealership Details</strong> </li>
          </ul>
        </div>
        <!--col-xs-12--> 
      </div>
      <!--row--> 
    </div>
    <!--container--> 
  </div>
  <div class="page-title">
    <h2>DEALERSHIPS Details Page</h2>
  </div>
</div>
<!--breadcrumbs-->

<div class="py-5 pt-3 fulldetail_page" style="background: #f1f4f9;">
  <div class="container">
    <div class="row">
      <div class="col-xxl-3 col-xl-4 col-lg-5 col-md-12 mb-3 mb-lg-0">
        <div class="card cardd position-sticky">
          <div class="card-body text-center">
            <h5 class="vendor-title">{{ $data->dealership_name }}</h5>
            <div class="card-shop-image mb-3">
              <img class="img-fluid" src="{{ asset('public/uploads/profile/'.$data->user->image) }}" alt="icon">
            </div>
            <!---->
            <a href="#!" class="locationinfo d-flex align-items-center justify-content-center blacktext" data-bs-toggle="modal" data-bs-target="#VendorlocationModal">
              <img class="img-fluid me-2" width="50" src="{{ asset('public/front/images/location-map.png') }}" alt="" data-pagespeed-url-hash="1979504232"> {{ $data->statesdata->name ?? 'N/A' }} </a>
            <!---->
            <div class="mb-3 d-block align-items-center justify-content-center">
              <label class=" rating yellowtext me-2">
                <span class="fa fa-star"></span>
              </label>
              <label class=" rating yellowtext me-2">
                <span class="fa fa-star"></span>
              </label>
              <label class=" rating yellowtext me-2">
                <span class="fa fa-star"></span>
              </label>
              <label class=" rating yellowtext me-2">
                <span class="fa fa-star"></span>
              </label>
              <label class=" rating yellowtext me-2">
                <span class="fa fa-star"></span>
              </label>
            </div>
            <!---->
            <!--<div class="d-flex align-items-center justify-content-center">-->
            <!--  <a href="#" class="icon_messenger me-3">-->
            <!--    <img class="img-fluid" width="30" src="{{ asset('public/front/images/facebook-messenger.svg') }}" alt="icon">-->
            <!--  </a>-->
            <!--  <a href="tel:1231456" class="icon_messenger">-->
            <!--    <p class="m-0">-->
            <!--      <img class="img-fluid" width="25" src="{{ asset('public/front/images/telephone.png') }}" alt="icon">-->
            <!--    </p>-->
            <!--  </a>-->
            <!--  <a href="mailto:test@hotmail.fr" class="icon_messenger ms-3">-->
            <!--    <p class="m-0">-->
            <!--      <img class="img-fluid" width="30" src="{{ asset('public/front/images/gmail-svgr.svg') }}" alt="icon">-->
            <!--    </p>-->
            <!--  </a>-->
            <!--</div>-->
            <!---->
          </div>
          <div class="card-footer">
            <ul class="nav nav-tabs nav_tabs d-block w-100" id="myTab" role="tablist">
                @forelse($brands as $b)
                    <li class="nav-item" role="presentation">
                        <button class="nav-link @if($loop->iteration == 1) active @endif" id="home-tab" data-bs-toggle="tab" data-bs-target="#{{ $b->slug }}-tab-pane" type="button" role="tab" aria-controls="{{ $b->slug }}-tab-pane" aria-selected="true">
                          <div class="imgtag me-2">
                            <img width="45" src="{{ asset('public/uploads/brands/'.$b->image)}}" class="img-fluid">
                          </div> {{ $b->name }}
                        </button>
                    </li>
                @empty
                    <div class="vehica-car-card__info__single text-center w-100">No Listing Found</div>
                @endforelse                
            </ul>
          </div>
        </div>
      </div>
      <div class="col-xxl-9 col-xl-8 col-lg-7 col-md-12">
        <!---->
        <div class="details mb-3">
          <div class="card card-body">
            <div class="profile-frame mb-3">
              <p class="m-0 banner_img" style="background: rgba(21, 26, 123, 0.4);">
                <img src="{{ asset('public/uploads/dealers/banners/'.$data->banner_image) }}" alt="icon" title="" class="img-fluid w-100 ddddddd" _mstalt="47138">
              </p>
            </div>
            <!---->
            <div class="d-block d-lg-flex align-items-center mb-3">
              <ul class="nav nav-tabs nav_tabs_details w-100" id="details-myTab" role="tablist">
                <li class="nav-item" role="presentation">
                  <button class="nav-link active" id="details-home-tab" data-bs-toggle="tab" data-bs-target="#details-home-tab-pane" type="button" role="tab" aria-controls="details-home-tab-pane" aria-selected="true">About us </button>
                </li>
                <li class="nav-item" role="presentation">
                  <button class="nav-link" id="details-profile-tab" data-bs-toggle="tab" data-bs-target="#details-profile-tab-pane" type="button" role="tab" aria-controls="details-profile-tab-pane" aria-selected="false">Reviews</button>
                </li>
                <li class="nav-item" role="presentation">
                  <button class="nav-link" id="details-Opening-tab" data-bs-toggle="tab" data-bs-target="#details-Opening-tab-pane" type="button" role="tab" aria-controls="details-Opening-tab-pane" aria-selected="false">Opening hours</button>
                </li>
              </ul>
              <div class="subscribe_widget">
                <ul class="nav mt-0 w-100">
                  <li>
                    <a href="https://www.facebook.com/" target="_blank" rel="nofollow">
                      <i aria-hidden="true" class="fa fa-facebook-f"></i>
                    </a>
                  </li>
                  <li>
                    <a href="https://www.youtube.com/" target="_blank" rel="nofollow">
                      <i aria-hidden="true" class="fa fa-youtube"></i>
                    </a>
                  </li>
                  <li>
                    <a href="https://twitter.com/?lang=en" target="_blank" rel="nofollow">
                      <i aria-hidden="true" class="fa fa-twitter"></i>
                    </a>
                  </li>
                  <li>
                    <a href="https://www.google.com/" target="_blank" rel="nofollow">
                      <i aria-hidden="true" class="fa fa-google-plus"></i>
                    </a>
                  </li>
                </ul>
              </div>
            </div>
            <!---->
            <div class="tab-content p-0" id="details-myTabContent">
              <div class="tab-pane fade show active" id="details-home-tab-pane" role="tabpanel" aria-labelledby="details-home-tab" tabindex="0">
                <div class="card card-body p-0">
                    <p>{{ $data->bio }}</p>
                </div>
              </div>
              <div class="tab-pane fade" id="details-profile-tab-pane" role="tabpanel" aria-labelledby="details-profile-tab" tabindex="0">
                        <div class="woocommerce-Reviews">
                              <div>
                                <h2 class="woocommerce-Reviews-title">{{ count($data->reviews) }} reviews</h2>
                                <ol class="commentlist">
                                    @foreach($data->reviews as $review)
                                      @php $user = \App\Models\User::where('id',$review->user_id)->first();  @endphp
                                      <li class="comment">
                                        <div> <img alt="" src="{{ asset('public/uploads/profile/'.$user->image) }}" class="avatar avatar-60 photo">
                                          <div class="comment-text">
                                            <div class="ratings">
                                              <div class="rating-box">
                                                <div style="width:100%" class="rating"></div>
                                              </div>
                                            </div>
                                            <p class="meta"> <strong>{{ $user->fname }}</strong> <span>–</span> {{ $data->created_at->diffForHumans() }} </p>
                                            <div class="description">
                                              <p>{{ $review->text }}</p>
                                            </div>
                                          </div>
                                        </div>
                                      </li>
                                    @endforeach
                                  <!-- #comment-## -->
                                </ol>
                              </div>
                              <div>
                                
                                <div>
                                  <div class="comment-respond"> <span class="comment-reply-title">Add a review </span>
                                    <form action="{{ route('post-dealer-review',$data->id) }}" method="post" class="comment-form" novalidate>
                                        @csrf
                                      <p class="comment-notes"><span id="email-notes">Your email address will not be published.</span> Required fields are marked <span class="required">*</span></p>
                                      <div class="comment-form-rating">
                                        <label id="rating">Your rating</label>
                                        <p class="stars"> <span> <a class="star-1" href="#!">1</a> <a class="star-2" href="#!">2</a> <a class="star-3" href="#!">3</a> <a class="star-4" href="#!">4</a> <a class="star-5" href="#!">5</a> </span> </p>
                                      </div>
                                      <p class="comment-form-author">
                                        <label for="author">Name <span class="required">*</span></label>
                                        <input id="author" placeholder="Name" name="name" type="text" value="{{ auth()->user()->fname ?? '' }}" size="30" required>
                                      </p>                                      
                                      <p class="comment-form-comment">
                                        <label>Your review <span class="required">*</span></label>
                                        <textarea id="comment" placeholder="Message" name="text" cols="45" rows="8" required></textarea>
                                      </p>
                                      <p class="form-submit">
                                        @if(Auth::check())
                                            <input name="submit" type="submit" id="submit" class="submit" value="Submit">
                                        @else
                                            <input name="button" type="button" id="submit" class="submit prelogin" value="Submit">
                                        @endif
                                      </p>
                                    </form>
                                  </div>
                                  <!-- #respond --> 
                                </div>
                              </div>
                              <div class="clear"></div>
                            </div>
              </div>
              <div class="tab-pane fade" id="details-Opening-tab-pane" role="tabpanel" aria-labelledby="details-Opening-tab" tabindex="0">
                <div class="card card-body p-0">
                  <ul class="row list-unstyled opencloswtime mb-3 justify-content-center">
                    <li class="col-md-12 px-2 mb-2">
                      <div>
                        <strong class="">Sunday</strong>
                        <span class="fontweightmeduim">01:00 - N/A</span>
                      </div>
                    </li>
                    <li class="col-md-12 px-2 mb-2">
                      <div>
                        <strong class="">Sunday</strong>
                        <span class="fontweightmeduim">01:00 - N/A</span>
                      </div>
                    </li>
                    <li class="col-md-12 px-2">
                      <div>
                        <strong class="">Sunday</strong>
                        <span class="fontweightmeduim">01:00 - N/A</span>
                      </div>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!---->
        <div class="tab-content p-0" id="myTabContent">
                @forelse($brands as $b)
                    <div class="tab-pane fade @if($loop->iteration == 1) show active @endif" id="{{ $b->slug }}-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
                        <div class="card card-body">
                          <div id="best-seller" class="">
                            @php 
                                $listings = \App\Models\Listing::with('model','model_sub','body_type')->where('uploaded_by',$data->user_id)->where('make',$b->id)->get(); @endphp
                            <div class="row">
                                @forelse($listings as $list)
                                <div class="col-lg-4">
                                    <div class="products-grid">
                                      <div class="item">
                                        <div class="item-inner">
                                          <div class="item-img">
                                            <div class="item-img-info">
                                              <a href="{{ route('auto-detail',$list->slug) }}" title="Retis lapen casen" class="product-image">
                                                <img src="{{ asset('public/uploads/listings/'.$list->feature_image) }}" alt="Retis lapen casen">
                                              </a>
                                              <div class="item-box-hover">
                                                <div class="box-inner">
                                                  <!--<div class="add_cart">-->
                                                  <!--  <button class="button btn-cart" type="button"></button>-->
                                                  <!--</div>-->
                                                  <div class="product-detail-bnt">
                                                    <a href="{{ route('auto-detail',$list->slug) }}" class="button detail-bnt">
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
                                    </div>
                                </div>
                                @empty
                                @endforelse
                            </div>
                          </div>
                        </div>
                    </div>
                @empty
                    <div class="alert alert-secondary mb-0">No Listing Found</div>
                @endforelse              
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


@endsection