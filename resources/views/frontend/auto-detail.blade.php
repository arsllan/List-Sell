@extends('layouts/frontapp')

@section('og')
<meta name="title" content="{{ $data->title }}"/>
<meta name="description" content="{!! html_entity_decode($data->descriptions)  !!}" />
<meta property="og:type" content="website">
<meta property="og:title" content="{{ $data->title }}">
<meta property="og:image" content="{{ asset('public/uploads/listings/'.$data->feature_image)}}">
<meta property="og:description" content="{!! 'Price: R'.$data->price !!}">
<meta property="og:url" content="{{url()->current()}}">
@endsection


@section('content')
  <div class="page-heading">
    <div class="breadcrumbs">
      <div class="container">
        <div class="row">
          <div class="col-xs-12">
            <ul>
              <li class="home"> <a href="{{ URL::to('/') }}" title="Go to Home Page">Home</a> <span>&rsaquo; </span> </li>
              <li class="category1599"> <a href="{{ route('listing',['category'=>$data->category->slug]) }}" title="">{{ $data->category->name }}</a> <span>&rsaquo; </span> </li>
              <li class="category1600"> <a href="#!" title="">{{ $data->model->name ?? '' }}</a> <span>&rsaquo; </span> </li>
              <li class="category1601"> <strong>{{ $data->body_type->name ?? '' }}</strong> </li>
            </ul>
          </div>
          <!--col-xs-12--> 
        </div>
        <!--row--> 
      </div>
      <!--container--> 
    </div>
    <div class="page-title">
      <h2>{{ $data->title }}</h2>
    </div>
  </div>
  <!-- detailPrewiew -->
    <section class="detailPrewiew product-view">
        @if($data->uploaded_by != 1)
            @php $dealer = \App\Models\Dealers::where('user_id',$data->uploaded_by)->first();  @endphp
            <div class="col-xxl-11 col-xl-11 col-lg-11 col-11 mx-auto">
                    <div class="row align-items-center">
                        <div class="col-lg-3">
                            <div class="card card-body p-2">
                                <div class="d-flex align-items-center mb-3 mb-lg-0">
                                    <div class="previewphoto text-center">
                                        <!--<div class="previewphotoo"><img class="img-fluid" width="62" src="{{ asset('public/uploads/profile/'.$data->user->image) }}" alt="icon"/></div>-->
                                          @if($dealer->verify_status == 1)
                                            <div class="previewphotoo mb-2">
                                                <img class="img-fluid lolo" src="{{ asset('public/uploads/profile/'.$data->user->image) }}" alt="icon"/>
                                                <div class="cross green"><img class="img-fluid" src="{{ asset('public/front/images/verified-seller-blue-checked.svg') }}" alt="icon"/></div>
                                            </div>
                                            <span>Verified Dealer</span>
                                          @else
                                            <div class="previewphotoo mb-2">
                                                <img class="img-fluid lolo" src="{{ asset('public/uploads/profile/'.$data->user->image) }}" alt="icon"/>
                                                <div class="cross red"><img class="img-fluid" src="{{ asset('public/front/images/verified-seller-red-cross.svg') }}" alt="icon"/></div>
                                            </div>
                                            <span>Unverified Dealer</span>
                                          @endif
                                    </div>
                                    <div class="mt-md-0 mt-3 w-100">
                                        <div class="d-flex align-items-center">
                                            <h4 class="previewtitle mb-3">{{ $dealer->dealership_name }}</h4>
                                        </div>
                                        <div class="ref">UID: <span id="vehicle_id">{{ $data->user->id }}</span></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!---->
                        <div class="col-lg-9">
                            <div class="card card-body p-2">
                                <div class="ms-auto addsbanner"><img class="img-fluid" src="{{ asset('public/front/images/dummyads.png') }}" alt="icon"/></div>
                            </div>
                        </div>
                    </div>
                </div>
        @endif
        <!---->
        <div class="col-xxl-11 col-xl-11 col-lg-11 col-11 mx-auto">
            <div class="mt-4 row">
                <div class="col-xl-3">
                    <div class="card mb-3">
                        <div class="card-header">Auto Details</div>
                        <div class="card-body">
                            <ul class="list-unstyled specs-item">
                                <li>Reference Id:<b>{{ $data->id ?? 'N/A' }}</b></li>
                                <li>MM Code:<b>{{ $data->mmcode ?? 'N/A' }}</b></li>
                                @php $location = \App\Models\State::where('id',$data->location)->first(); $locationname = $location->name ?? null;  @endphp
                                @php $city = \App\Models\Cities::where('id',$data->city)->first(); $cityname = $city->name ?? null;  @endphp
                                <li>Region:<b>{{ $locationname ?? 'N/A' }}</b></li>
                                <li>City:<b>{{ $cityname ?? 'N/A' }}</b></li>
                                
                                <li class="visible-xs">Price:<b style="float: right" class="color-red changeableprice">{{ 'R'.$data->price ?? 'N/A' }} </b></li>
                                
                                <li>Body Type:<b>{{ $data->body_type->name ?? 'N/A' }}</b></li>
                                <li>Type of Fuel:<b>{{ $data->fuel_type ?? 'N/A' }}</b></li>
                                <li>Transmission:<b>{{ $data->transmission ?? 'N/A' }}</b></li>
                                <li>Traction of Vehicle:<b>Front-wheel drive</b></li>
                                <li>2 Doors:<b>@if($data->windows == 1)<img src="{{ asset('public/front/images/std-green.png')}}" alt="Standard"> @else <img src="{{ asset('public/front/images/crossredicon.png')}}" alt="Standard"> @endif</b></li>
                                <li>Engine Capacity (cm3):<b>{{ $data->engine ?? 'N/A' }}</b></li>
                                <li>Colour:<b>{{ $data->color ?? 'N/A' }}</b></li>
                                <li>Interior:<b>Cloth</b></li>
                                <li>4 Seats:<b>@if($data->windows == 1)<img src="{{ asset('public/front/images/std-green.png')}}" alt="Standard"> @else <img src="{{ asset('public/front/images/crossredicon.png')}}" alt="Standard"> @endif</b></li>
                            </ul>
                        </div>
                    </div>
                    <!---->
                    <div class="card mb-3">
                        <div class="card-header">Features</div>
                        <div class="card-body">
                            <ul class="list-unstyled specs-item">
                                <li>Aircon:<b>@if($data->windows == 1)<img src="{{ asset('public/front/images/std-green.png')}}" alt="Standard"> @else <img src="{{ asset('public/front/images/crossredicon.png')}}" alt="Standard"> @endif</b></li>
                                <li>Electric Windows:<b>@if($data->windows == 1)<img src="{{ asset('public/front/images/std-green.png')}}" alt="Standard"> @else <img src="{{ asset('public/front/images/crossredicon.png')}}" alt="Standard"> @endif</b></li>
                                <li>Electric Mirrors:<b>@if($data->mirrors == 1)<img src="{{ asset('public/front/images/std-green.png')}}" alt="Standard"> @else <img src="{{ asset('public/front/images/crossredicon.png')}}" alt="Standard"> @endif</b></li>
                                <li>Power Steering:<b>@if($data->steering == 1)<img src="{{ asset('public/front/images/std-green.png')}}" alt="Standard"> @else <img src="{{ asset('public/front/images/crossredicon.png')}}" alt="Standard"> @endif</b></li>
                                <li>Multi Functional Steering Control:<b>@if($data->windows == 1)<img src="{{ asset('public/front/images/std-green.png')}}" alt="Standard"> @else <img src="{{ asset('public/front/images/crossredicon.png')}}" alt="Standard"> @endif</b></li>
                                <li>Audio System:<b>CD</b></li>
                                <li>Alloy Wheels:<b>@if($data->alloywheels == 1)<img src="{{ asset('public/front/images/std-green.png')}}" alt="Standard"> @else <img src="{{ asset('public/front/images/crossredicon.png')}}" alt="Standard"> @endif</b></li>
                                <li>ABS:<b>@if($data->abs == 1)<img src="{{ asset('public/front/images/std-green.png')}}" alt="Standard"> @else <img src="{{ asset('public/front/images/crossredicon.png')}}" alt="Standard"> @endif</b></li>
                                <li>Traction Control:<b>@if($data->traction_control == 1)<img src="{{ asset('public/front/images/std-green.png')}}" alt="Standard"> @else <img src="{{ asset('public/front/images/crossredicon.png')}}" alt="Standard"> @endif</b></li>
                                <li>Stability Control:<b>@if($data->stability_control == 1)<img src="{{ asset('public/front/images/std-green.png')}}" alt="Standard"> @else <img src="{{ asset('public/front/images/crossredicon.png')}}" alt="Standard"> @endif</b></li>
                                <li>Airbags:<b>@if($data->airbags == 1)<img src="{{ asset('public/front/images/std-green.png')}}" alt="Standard"> @else <img src="{{ asset('public/front/images/crossredicon.png')}}" alt="Standard"> @endif</b></li>
                                <li>Central Locking:<b>@if($data->central == 1)<img src="{{ asset('public/front/images/std-green.png')}}" alt="Standard"> @else <img src="{{ asset('public/front/images/crossredicon.png')}}" alt="Standard"> @endif</b></li>
                            </ul>
                        </div>
                    </div>
                    <!---->
                    <div class="card">
                        <div class="card-header">Information</div>
                        <div class="card-body">
                            <ul class="list-unstyled specs-item">
                                <li>Service plan:<b>Contact Dealer</b></li>
                                <li>Motor plan:<b>Contact Dealer</b></li>
                                <li>Warranty:<b>Contact Dealer</b></li>
                                <li>Vehicle finance:<b>available</b></li>
                            </ul>
                        </div>
                    </div>
                    <!---->
                </div>
                <div class="col-xxl-6 col-xl-6">
                    <div class="card card-body mb-3">
                        <div class="d-flex align-items-center mb-2">
                            <div class="brand">{{ $data->model->brand->name ?? '' }}</div>
                            <div class="subscribe_widget d-flex align-items-center ms-auto">
                                <ul class="nav w-100 m-0">
                                    <li><a class="fb" href="http://www.facebook.com/sharer.php?u={{ \URL::full(); }}" target="_blank" rel="nofollow"><i aria-hidden="true" class="fa fa-facebook-f"></i></a></li> 
                                    <li><a class="telegram" href="hhttps://telegram.me/share/url?url={{ \URL::full(); }}" target="_blank" rel="nofollow"><span class=""><img class="img-fluid" width="16" src="{{ asset('public/front/images/telegramicon.svg') }}" alt="icon"/></span></a></li> 
                                    <!--<li class="m-0"><a class="whatsapp" href="https://api.whatsapp.com/send?text={{ \URL::full(); }}" target="_blank" rel="nofollow"><i aria-hidden="true" class="fa fa-whatsapp"></i></a></li>-->
                                </ul>
                            </div>
                        </div>
                        <div class="product-name mb-2 d-flex align-items-center" data-listingid="{{ $data->id }}">
                            <h1>{{ $data->title }}</h1>
                            <button class="ms-auto btnAll position-relative top-0 end-0 add-to-fav" title="" type="button"><img class="img-fluid" src="{{ asset('public/front/images/heart-svgrepo-com.svg') }}" alt="icon"/></button>
                        </div>
                        <div class="d-flex align-items-center">
                            <p class="special-price">
                                @if($data->is_deal == 1)
                                    <span id="product-price-48" class="price"><del>R{{ $data->price }}</del> R{{ $data->deal_price }} </span>
                                    <input type="hidden" value="{{ $data->deal_price }}" id="oprice" />
                                @else
                                    <span id="product-price-48" class="price">R{{ $data->price }} </span>
                                    <input type="hidden" value="{{ $data->price }}" id="oprice" />
                                @endif
                                
                                
                            </p>
                            <div class="d-flex align-items-center prices_and_ref ms-auto">
                            <!--<span class="pricepreview">POA</span>-->
                                <div class="currency-box ms-3" data-default="POA">
                                    <div class="currency ZAR" data-name="ZAR" data-value=""></div>
                                    <div class="currency EUR" data-name="EUR" data-value=""></div>
                                    <div class="currency GBP" data-name="GBP" data-value=""></div>
                                    <div class="currency USD" data-name="USD" data-value=""></div>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                    <!---->
                    <div class="card product-essential m-0 mb-3">
                        <div class="product-img-box">
                          <div class="new-label new-top-left">Hot</div>
                          <div class="sale-label sale-top-left">-15%</div>
                          <div class="product-image">
                            <div class="product-full"><img class="w-100 img-thumbnail" id="product-zoom1" src="{{ asset('public/uploads/listings/'.$data->feature_image)}}" data-zoom-image="{{ asset('public/uploads/listings/'.$data->feature_image)}}" alt="product-image"/> </div>
                            <div class="more-views">
                              <div class="slider-items-products">
                                <div id="gallery_02" class="product-flexslider hidden-buttons product-img-thumb">
                                  <div class="slider-items slider-width-col4 block-content">
                                      <div class="more-views-items"> <a href="#" class="products-a" data-image="{{ asset('public/uploads/listings/'.$data->feature_image)}}" data-zoom-image="{{ asset('public/uploads/listings/'.$data->feature_image)}}"> <img id="product-zoom1" class="img-thumbnail" src="{{ asset('public/uploads/listings/'.$data->feature_image)}}" alt="product-image"/> </a></div>
                                    @php $media = \App\Models\ListingMedia::where('listing_id',$data->id)->get(); $i=2; @endphp
                                    @foreach($media as $image)
                                        @php $i++;  @endphp
                                        <div class="more-views-items"> <a href="#" class="products-a" data-image="{{ asset('public/uploads/listings/listing_media/'.$image->image)}}" data-zoom-image="{{ asset('public/uploads/listings/listing_media/'.$image->image)}}"> <img id="product-zoom{{ $i }}" class="img-thumbnail" src="{{ asset('public/uploads/listings/listing_media/'.$image->image)}}" alt="product-image"/> </a></div>
                                    @endforeach
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                    </div>
                    <!---->
                    <!--product-essential-->
                    <div class="product-collateral">
                        <ul id="myTab" class="nav nav-tabs product-tabs">
                            <li class="nav-item" role="presentation"> <a class="active" href="#product_tabs_description" data-bs-toggle="tab" data-bs-target="#description-tab-pane" type="button" role="tab" aria-controls="description-tab-pane" aria-selected="true"> Vehicle Overview </a> </li>
                            <li class="nav-item" role="presentation"><a href="#product_tabs_tags" data-bs-toggle="tab" data-bs-target="#tags-tab-pane" type="button" role="tab" aria-controls="tags-tab-pane" aria-selected="true">Technical Specification</a></li>
                            <li class="nav-item" role="presentation"> <a href="#product_tabs_custom" data-bs-toggle="tab" data-bs-target="#custom-tab-pane" type="button" role="tab" aria-controls="custom-tab-pane" aria-selected="true">Accessories</a> </li>
                            <li class="nav-item" role="presentation"> <a href="#reviews_tabs" data-bs-toggle="tab" data-bs-target="#tabs-tab-pane" type="button" role="tab" aria-controls="tabs-tab-pane" aria-selected="true">Reviews</a> </li>
                          </ul>
                        <div id="myTabContent" class="tab-content">
                          <div class="tab-pane fade show active" id="description-tab-pane">
                            <div class="std">
                                <p>{!! html_entity_decode($data->descriptions)  !!}</p>
                            </div>
                          </div>
                          <div class="tab-pane fade" id="tags-tab-pane">
                            <div class="spec-row" id="summarySpecs">
                                <table width="100%">
                                  <tbody>
                                    <tr>
                                      <td class="label-spec"> Mileage <span class="coln">:</span></td>
                                      <td class="value-spec"> {{ $data->mileage }} </td>
                                    </tr>
                                    <tr>
                                      <td class="label-spec"> Engine Displ. <span class="coln">:</span></td>
                                      <td class="value-spec"> {{ $data->engine }} </td>
                                    </tr>
                                    <tr class="odd">
                                      <td class="label-spec"> Transmission <span class="coln">:</span></td>
                                      <td class="value-spec"> {{ $data->transmission }} </td>
                                    </tr>
                                    <tr class="odd">
                                      <td class="label-spec"> Fuel Type <span class="coln">:</span></td>
                                      <td class="value-spec"> {{ $data->fuel_type }} </td>
                                    </tr>
                                    <tr>
                                      <td class="label-spec"> Model <span class="coln">:</span></td>
                                      <td class="value-spec"> {{ $data->model->name ?? '' }} </td>
                                    </tr>
                                    <tr>
                                      <td class="label-spec"> Power Windows <span class="coln">:</span></td>
                                      <td class="value-spec"> N/A </td>
                                    </tr>
                                    <tr class="odd">
                                      <td class="label-spec"> Airbags <span class="coln">:</span></td>
                                      <td class="value-spec"> N/A </td>
                                    </tr>
                                     <tr class="odd">
                                      <td class="label-spec"> ABS <span class="coln">:</span></td>
                                      <td class="value-spec"> N/A </td>
                                    </tr>
                                    <tr>
                                      <td class="label-spec"> Central Locking <span class="coln">:</span></td>
                                      <td class="value-spec"> N/A </td>
                                    </tr>
                                    <tr>
                                      <td class="label-spec"> Fog Lamps <span class="coln">:</span></td>
                                      <td class="value-spec"> N/A </td>
                                    </tr>
                                  </tbody>
                                </table>
                              </div>
                          </div>
                          <div class="tab-pane fade" id="tabs-tab-pane">
                            <div class="woocommerce-Reviews">
                              <div>
                                <h2 class="woocommerce-Reviews-title">{{ count($data->reviews) }} reviews for <span>{{ $data->title }}</span></h2>
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
                                    <form action="{{ route('post-review',$data->id) }}" method="post" class="comment-form" novalidate>
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
                          <div class="tab-pane fade" id="custom-tab-pane">
                            <div class="spec-row" id="summarySpecs">
                                <table width="100%">
                                  <tbody>
                                    <tr>
                                      <td class="label-spec"> Air Conditioner <span class="coln">:</span></td>
                                      <td class="value-spec"> <i class="fa fa-check-circle"></i> </td>
                                    </tr>
                                    <tr>
                                      <td class="label-spec"> AntiLock Braking System <span class="coln">:</span></td>
                                      <td class="value-spec"> <i class="fa fa-check-circle"></i> </td>
                                    </tr>
                                    <tr class="odd">
                                      <td class="label-spec"> Power Steering <span class="coln">:</span></td>
                                      <td class="value-spec"> <i class="fa fa-check-circle"></i> </td>
                                    </tr>
                                    <tr class="odd">
                                      <td class="label-spec"> Power Windows <span class="coln">:</span></td>
                                      <td class="value-spec"> <i class="fa fa-check-circle"></i> </td>
                                    </tr>
                                    <tr>
                                      <td class="label-spec"> CD Player <span class="coln">:</span></td>
                                      <td class="value-spec"> <i class="fa fa-check-circle"></i> </td>
                                    </tr>
                                    <tr>
                                      <td class="label-spec"> Leather Seats <span class="coln">:</span></td>
                                      <td class="value-spec"> <i class="fa fa-check-circle"></i> </td>
                                    </tr>
                                    <tr class="odd">
                                      <td class="label-spec"> Central Locking <span class="coln">:</span></td>
                                      <td class="value-spec"> <i class="fa fa-check-circle"></i> </td>
                                    </tr>
                                     <tr class="odd">
                                      <td class="label-spec"> Power Door Locks <span class="coln">:</span></td>
                                      <td class="value-spec"> <i class="fa fa-check-circle"></i> </td>
                                    </tr>
                                    <tr>
                                      <td class="label-spec"> Brake Assist <span class="coln">:</span></td>
                                      <td class="value-spec"> <i class="fa fa-check-circle"></i> </td>
                                    </tr>
                                    <tr>
                                      <td class="label-spec"> Driver Airbag <span class="coln">:</span></td>
                                      <td class="value-spec"> <i class="fa fa-check-circle"></i> </td>
                                    </tr>
                                  </tbody>
                                </table>
                              </div>
                          </div>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-3 col-xl-3">
                    <div class="card mb-3 pb-4">
                        <div class="mb-3 px-3 text-center">
                            <!--<a href="tel:0671222814" class="phoneLink my-3">-->
                            <!--    <img class="img-fluid me-2" width="30" src="{{ asset('public/front/images/phone.svg') }}" alt="icon"/>-->
                            <!--        {{ $data->phone }}-->
                            <!--</a>-->
                            <!---->
                            <a href="https://api.whatsapp.com/send?text={{ \URL::full(); }}" target="_blank" class="d-flex align-items-center">
                                <div class="me-4">
                                    <div class="coccoc-alo-phone coccoc-alo-green coccoc-alo-show">
                                        <div class="coccoc-alo-ph-circle"></div>
                                        <div class="coccoc-alo-ph-circle-fill"></div>
                                        <div class="coccoc-alo-ph-img-circle"></div>
                                    </div>
                                </div>
                                <p style="display:none;" class="m-0 phoneLink">{{ $data->phone }}</p>
                                <p class="m-0 phoneLinkReveal">******* <button type="button" class="btn ms-3" style="padding: 5px; margin-top: -3px; font-size: 12px; max-width: 100px; min-width: 100px;" id="hideshowreveal">Click To Reveal</button></p>
                            </a>
                            <!---->
                            <p class="text-center" style="font-size:12px;">We'll let the dealer know when is the best time to call you back</p>
                            <button data-toggle="modal" data-bs-toggle="modal" data-bs-target="#exampleModal" style="font-size:12px; fontweight:500;" class="btn btn-primary mx-auto d-inline-block">Request Callback</button>
                        </div>
                        <div class="p-2 mx-3" style="background-color:#f5f5f5;">
                            <form action="{{ route('submit-inquiry') }}" method="post">
                                @csrf
                                <div class="form-group mb-2">
                                    <input type="text" class="form-control" style="font-size:14px; height:40px;" name="name" required="" id="" placeholder="Name"/>
                                    <input type="hidden" name="listingid" value="{{ $data->id }}" />
                                </div>
                                <div class="form-group mb-2">
                                    <input type="email" class="form-control" style="font-size:14px; height:40px;" name="email" required="" id="" placeholder="Email"/>
                                </div>
                                <div class="form-group mb-2">
                                    <input type="phone" class="form-control" style="font-size:14px; height:40px;" name="phone" required="" id="" placeholder="Phone"/>
                                </div>
                                <div class="form-group mb-2">
                                    <textarea class="form-control h-auto" style="font-size:14px;" rows="4" name="message" id="" required="" placeholder="Message"></textarea>
                                </div>
                                <div class="form-group form-check" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                                    <input type="radio" name="radio" value="cash" required="" class="form-check-input" id="exampleCheck1">
                                    <label class="form-check-label" for="exampleCheck1">I am a cash buyer</label>
                                </div>
                                <div class="form-group form-check" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                                    <input type="radio" name="radio" value="finance" required="" class="form-check-input" id="exampleCheck2">
                                    <label class="form-check-label" for="exampleCheck2">I will need finance</label>
                                </div>
                                <div class="ps-3 collapse" id="collapseExample">
                                    <div class="form-group form-check">
                                        <input type="checkbox" class="form-check-input" value="1" name="license" id="exampleCheck3">
                                        <label class="form-check-label" for="exampleCheck3">I have a valid Drivers Licence</label>
                                    </div>
                                    <div class="form-group form-check">
                                        <input type="checkbox" class="form-check-input" name="blanklist" id="exampleCheck4">
                                        <label class="form-check-label" for="exampleCheck4">I confirm I am not blacklisted or under debt review</label>
                                    </div>
                                </div>
                                <div class="form-group form-check">
                                    <input type="checkbox" class="form-check-input" name="insurance" id="exampleCheck5">
                                    <label class="form-check-label" for="exampleCheck5">Insurance - Please contact me regarding a FREE quote</label>
                                </div>
                                <div class="form-group form-check">
                                    <input type="checkbox" class="form-check-input" name="notify" id="exampleCheck6">
                                    <label class="form-check-label" for="exampleCheck6">Notify me of similar cars in future</label>
                                </div>
                                <div class="text-center mt-3"><button type="submit" style="font-size:12px; fontweight:500;" class="btn btn-primary mx-auto d-inline-block">Send Enquiry</button></div>
                            </form>
                        </div>
                    </div>
                    <!---->
                    <div class="card text-center">
                        <div class="card-body p-0"><img class="img-thumbnail" src="https://cars.alliftech.com/public/front/images/addsbaner.jpg" alt="icon"></div>
                    </div>
                </div>
            </div>
        </div>
        <!---->
        <div class="col-xxl-11 col-xl-11 col-lg-11 col-11 mx-auto mt-5">
            <div class="related-pro p-0">
            <div class="slider-items-products">
                <div class="new_title center">
                  <h2><span>Related Listing</span></h2>
                </div>
                <div id="related-slider" class="product-flexslider hidden-buttons">
                  <div class="slider-items slider-width-col4 products-grid">
                        @forelse($relatedlisting as $list)
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
                                <div class="item-title"><a href="{{ route('auto-detail',$list->slug) }}" title="Retis lapen casen">{{mb_strlen($list->title,'utf-8') > 30 ? mb_substr($list->title,0,30,'utf-8')."...":$list->title}}</a> </div>
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
            </div>
        </div>
    </section>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Callback Request</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
            <form action="{{ route('submit-callback') }}" method="post">
                @csrf
          <div class="modal-body">
                <div class="mb-3">
                  <input type="text" class="form-control" name="name" required="" id="exampleFormControlInput1" placeholder="Name">
                   <input type="hidden" name="listingid" value="{{ $data->id }}" />
                </div>
                <div class="mb-3">
                  <input type="email" class="form-control" name="email" required="" id="exampleFormControlInput2" placeholder="Email (Optional)">
                </div>
                <div class="mb-3">
                  <input type="phone" class="form-control" name="phone" required=""  id="exampleFormControlInput3" placeholder="Telephone">
                </div>
                <div class="mb-3">
                    <select class="form-select" name="time" required="" aria-label="Default select example">
                      <option value="morning" selected>Morning</option>
                      <option value="afternoon">Afternoon</option>
                      <option value="evening">Evening</option>
                    </select>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" name="insurance" value="" id="flexCheckDefault">
                  <label class="form-check-label" for="flexCheckDefault">I am interested in low cost car insurance</label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" name="notify" value="" id="flexCheckDefault1">
                  <label class="form-check-label" for="flexCheckDefault1">Notify me of similar cars in future</label>
                </div>
            
          </div>
          <div class="modal-footer">
            <!--<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>-->
            <button type="submit" class="btn">Call me Back</button>
          </div>
          </form>
        </div>
      </div>
    </div>
    <!---->
   <script>
        $(".prelogin").click(function(){
            $.notify("You must login before submit review.", "error");
        })
        $(".currency").hover(function(){
            var originalprice = $("#oprice").val();
            var tocurrency = $(this).data("name"); 
            $.get('https://v6.exchangerate-api.com/v6/f1c579f4a98e52c401fce3a8/latest/ZAR',  // url
                function (data, textStatus, jqXHR) {  // success callback
                    var rate = data.conversion_rates[tocurrency];
                    var totalamount  = rate * originalprice;
                    totalamount = totalamount.toFixed(2);
                    $(".price").text(tocurrency+" "+totalamount);
            });            
        });
   </script>
   <script>
       $("#hideshowreveal").click(function(){
           $(".phoneLinkReveal").hide();
           $(".phoneLink").show();
       })
   </script>
@endsection