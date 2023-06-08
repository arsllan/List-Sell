@extends('layouts/frontapp')
@section('content')
@php
    $queryParameters = request()->except('page'); // Get all query parameters except "page"
    $queryParameters = request()->except('per_page'); // Get all query parameters except "page"
    $hasQueryParams = count($queryParameters) > 0;
    $updatedUrlfull = url()->current() . '?' . http_build_query(request()->except('page'));
    $updatedUrl = $hasQueryParams ? '&' : '?'; // Add a question mark if there are no query parameters
@endphp
<div class="page-heading">

  <div class="page-title">
    <h2>CURRENT LISTING</h2>
  </div>
</div>
<!--breadcrumbs--> 
<!-- BEGIN Main Container col2-left -->
<section class="main-container col2-left-layout bounceInUp animated"> 
  <!-- For version 1, 2, 3, 8 --> 
  <!-- For version 1, 2, 3 -->
  <div class="col-xxl-11 col-xl-11 col-lg-11 col-11 mx-auto">
    <div class="row">
      <aside class="col-left sidebar col-xl-3 col-sm-pull-9 wow bounceInUp animated"> 
      <!-- BEGIN SIDE-NAV-CATEGORY -->
          
            <div class="section-filter">
              <div class="b-filter__inner bg-grey">
                <h2><span>Find your right car</span></h2>
                <form class="b-filter">
                  <select class="form-select mb-3" name="brand" id="brand" onchange="brandChangedTrigger()">
                    <option value="">Select Brand</option>
                    @foreach(brands() as $brand)
                        <option value="{{ $brand->slug }}" @if(request()->brand == $brand->slug) selected @endif>{{ $brand->name }}</option>
                    @endforeach
                  </select>
                  <select class="form-select mb-3" name="bodytype" id="bodytype" onchange="bodytypeChangedTrigger()">
                    <option value="">Select Body Type</option>
                    @foreach(bodytypehelper() as $type)
                        <option value="{{ $type->id }}" @if(request()->bodytype == $type->id) selected @endif>{{ $type->name }}</option>
                    @endforeach
                  </select>
                  <select class="form-select mb-3" name="transmission" id="transmission" onchange="transmissionChangedTrigger()">
                    <option value="">Select Transmission</option>
                    <option value="automatic" @if(request()->transmission == 'automatic') selected @endif>Automatic</option>
                    <option value="manual" @if(request()->transmission == 'manual') selected @endif>Manual</option>
                    <option value="none" @if(request()->transmission == 'none') selected @endif>None</option>
                    
                  </select>
                  <select class="form-select mb-3" name="fueltype" id="fueltype" onchange="fueltypeChangedTrigger()">
                    <option value="">Select Fuel Type</option>
                    <option value="diesel" @if(request()->fueltype == 'diesel') selected @endif>Diesel</option>
                    <option value="hydrid fuel" @if(request()->fueltype == 'hybrid fuel') selected @endif>Hybrid fuel</option>
                    <option value="petrol" @if(request()->fueltype == 'petrol') selected @endif>Petrol</option>
                  </select>
                  <select class="form-select mb-3" name="yearmodel" id="yearmodel" onchange="yearmodelChangedTrigger()">
                    <option value="">Select Year Model</option>
                    @for($i = 2023; $i >= 2000; $i--)
                        <option value="{{ $i }}" @if(request()->yearmodel == $i) selected @endif>{{ $i }}</option>
                    @endfor
                  </select>
                  <select class="form-select mb-3" name="location" id="location" onchange="locationChangedTrigger()">
                    <option value="">Select Location</option>
                    @foreach(states() as $state)
                        @php $counter = \App\Models\Listing::where('location',$state->id)->count();  @endphp
                        <option value="{{ $state->slug }}" @if(request()->location == $state->slug) selected @endif>{{ $state->name }} ({{ $counter }})</option>
                    @endforeach
                  </select>
                  <select class="form-select mb-3" name="city" id="city" onchange="cityChangedTrigger()">
                    <option value="">Select City</option>
                    @foreach(cities() as $city)
                        <option value="{{ $city->slug }}" @if(request()->city == $city->slug) selected @endif>{{ $city->name }}</option>
                    @endforeach
                  </select>
                  <select class="form-select mb-3" id="start_price" onchange="startpriceChangedTrigger()">
                    <option value="">Price - from</option>
                      <option value="170000" @if(request()->start_price == 170000) selected @endif>R170,000</option>
                       <option value="180000" @if(request()->start_price == 180000) selected @endif>R180,000</option>
                       <option value="190000" @if(request()->start_price == 190000) selected @endif>R190,000</option>
                       <option value="200000" @if(request()->start_price == 200000) selected @endif>R200,000</option>
                       <option value="250000" @if(request()->start_price == 250000) selected @endif>R250,000</option>
                       <option value="300000" @if(request()->start_price == 300000) selected @endif>R300,000</option>
                       <option value="350000" @if(request()->start_price == 350000) selected @endif>R350,000</option>
                       <option value="400000" @if(request()->start_price == 400000) selected @endif>R400,000</option>
                       <option value="450000" @if(request()->start_price == 450000) selected @endif>R450,000</option>
                       <option value="500000" @if(request()->start_price == 500000) selected @endif>R500,000</option>
                       <option value="550000" @if(request()->start_price == 550000) selected @endif>R550,000</option>
                       <option value="600000" @if(request()->start_price == 600000) selected @endif>R600,000</option>
                       <option value="650000" @if(request()->start_price == 650000) selected @endif>R650,000</option>
                       <option value="700000" @if(request()->start_price == 700000) selected @endif>R700,000</option>
                       <option value="750000" @if(request()->start_price == 750000) selected @endif>R750,000</option>
                       <option value="800000" @if(request()->start_price == 800000) selected @endif>R800,000</option>
                       <option value="850000" @if(request()->start_price == 850000) selected @endif>R850,000</option>
                       <option value="900000" @if(request()->start_price == 900000) selected @endif>R900,000</option>
                       <option value="950000" @if(request()->start_price == 950000) selected @endif>R950,000</option>
                       <option value="1000000" @if(request()->start_price == 1000000) selected @endif>R1,000,000</option>
                  </select>
                  <select class="form-select mb-3" id="end_price" onchange="endpriceChangedTrigger()">
                    <option value="">Price - to</option>
                       <option value="180000" @if(request()->end_price == 180000) selected @endif>R180,000</option>
                       <option value="190000" @if(request()->end_price == 190000) selected @endif>R190,000</option>
                       <option value="200000" @if(request()->end_price == 200000) selected @endif>R200,000</option>
                       <option value="250000" @if(request()->end_price == 250000) selected @endif>R250,000</option>
                       <option value="300000" @if(request()->end_price == 300000) selected @endif>R300,000</option>
                       <option value="350000" @if(request()->end_price == 350000) selected @endif>R350,000</option>
                       <option value="400000" @if(request()->end_price == 400000) selected @endif>R400,000</option>
                       <option value="450000" @if(request()->end_price == 450000) selected @endif>R450,000</option>
                       <option value="500000" @if(request()->end_price == 500000) selected @endif>R500,000</option>
                       <option value="550000" @if(request()->end_price == 550000) selected @endif>R550,000</option>
                       <option value="600000" @if(request()->end_price == 600000) selected @endif>R600,000</option>
                       <option value="650000" @if(request()->end_price == 650000) selected @endif>R650,000</option>
                       <option value="700000" @if(request()->end_price == 700000) selected @endif>R700,000</option>
                       <option value="750000" @if(request()->end_price == 750000) selected @endif>R750,000</option>
                       <option value="800000" @if(request()->end_price == 800000) selected @endif>R800,000</option>
                       <option value="850000" @if(request()->end_price == 850000) selected @endif>R850,000</option>
                       <option value="900000" @if(request()->end_price == 900000) selected @endif>R900,000</option>
                       <option value="950000" @if(request()->end_price == 950000) selected @endif>R950,000</option>
                       <option value="1000000" @if(request()->end_price == 1000000) selected @endif>R1,000,000</option>
                       <option value="2000000" @if(request()->end_price == 2000000) selected @endif>R2,000,000</option>
                  </select>
                  <!--<select class="form-select mb-3" data-width="100%" tabindex="-98">-->
                  <!--  <option>Select All Locations</option>-->
                  <!--    <option>Location 1</option>-->
                  <!--    <option>Location 2</option>-->
                  <!--    <option>Location 3</option>-->
                  <!--</select>-->
                  <!--<select class="form-select mb-3" data-width="100%" tabindex="-98">-->
                  <!--  <option>Select Year</option>-->
                  <!--    <option>2017</option>-->
                  <!--    <option>2016</option>-->
                  <!--    <option>2015</option>-->
                  <!--</select>-->
                  <!---->
                  <!--<div class="ui-filter-slider">-->
                  <!--  <div class="sidebar-widget-body m-t-10">-->
                  <!--    <div class="price-range-holder"> <span class="min-max"> <span class="pull-left">$200.00</span> <span class="pull-right">$800.00</span> </span>-->
                  <!--      <input type="text" class="price-slider" value="" style="display:block" >-->
                  <!--    </div> -->
                  <!--  </div>-->
                  <!--</div>-->
                  <div>
                    <!--<div class="b-filter__btns">-->
                    <!--  <button class="btn btn-lg btn-primary">search vehicle</button>-->
                    <!--</div>-->
                  </div>
                </form>
              </div>
            </div>
            <div class="side-nav-categories">
            <div class="block-title"> <span>match our main category</span> </div>
            <!--block-title--> 
                <!-- BEGIN BOX-CATEGORY -->
                <div class="box-content box-category">
                  <ul>
                    @foreach(system_categories_data() as $cat)
                        <li> <a href="#!" class="category" data-value="{{ $cat->slug  }}">{{ $cat->name }} For Sale</a></li>
                    @endforeach
                  </ul>
                </div>
                <!--box-content box-category--> 
              </div>
          <!--side-nav-categories-->
        </aside>
      <div class="col-main col-xl-7 col-sm-push-3 product-grid">
          <!---->
      <div class="pro-coloumn">
          <div class="toolbar">
            <div class="sorter">
              <div class="view-mode"><a href="#!" title="Grid" onclick="gridviewTrigger()" class="button-grid">&nbsp;</a> <span title="list" class="button button-active button-list">&nbsp;</span> </div>
            </div>

            <div class="pager">
                            @if ($listings->hasPages())
                              <div id="limiter">
                                <label>View: </label>
                                <ul>
                                  <li><a href="#">@if(request()->per_page) {{ request()->per_page }} @else 10 @endif<span class="right-arrow"></span></a>
                                    <ul>
                                      <li><a href="{{ route('listing', ['per_page' => 20]) }}">20</a></li>
                                      <li><a href="{{ route('listing', ['per_page' => 30]) }}">30</a></li>
                                      <li><a href="{{ route('listing', ['per_page' => 35]) }}">35</a></li>
                                    </ul>
                                  </li>
                                </ul>
                              </div>
                            <!--pagination start-->
                                <div class="pages">
                                    <ul class="pagination justify-content-center">
                                        {{-- Previous Page Link --}}
                                        @if ($listings->onFirstPage())
                                            <li class="page-item disabled"><span class="page-link">«</span></li>
                                        @else
                                            <li class="page-item"><a href="{{ $updatedUrlfull.'page='.$listings->previousPageUrl() }}"
                                                                     rel="prev" class="page-link">«</a></li>
                                        @endif

                                        @if($listings->currentPage() > 3)
                                            <li class="page-item hidden-xs"><a href="{{ $updatedUrlfull.'page=1' }}"
                                                                               class="page-link">1</a></li>
                                        @endif
                                        @if($listings->currentPage() > 4)
                                            <li class="page-item"><span class="page-link">...</span></li>
                                        @endif
                                        @foreach(range(1, $listings->lastPage()) as $i)
                                            @if($i >= $listings->currentPage() - 2 && $i <= $listings->currentPage() + 2)
                                                @if ($i == $listings->currentPage())
                                                    <li class="page-item active"><span class="page-link">{{ $i }}</span>
                                                    </li>
                                                @else
                                                    <li class="page-item"><a class="page-link"
                                                                             href="{{ $updatedUrlfull.'page='.$i }}">{{ $i }}</a>
                                                    </li>
                                                @endif
                                            @endif
                                        @endforeach
                                        @if($listings->currentPage() < $listings->lastPage() - 3)
                                            <li class="page-item"><span class="page-link">...</span></li>
                                        @endif
                                        @if($listings->currentPage() < $listings->lastPage() - 2)
                                            <li class="page-item hidden-xs"><a
                                                        href="{{ $updatedUrlfull.'page='.$listings->lastPage() }}"
                                                        class="page-link">{{ $listings->lastPage() }}</a></li>
                                        @endif

                                        {{-- Next Page Link --}}
                                        @if ($listings->hasMorePages())
                                            <li class="page-item"><a class="page-link"
                                                                     href="{{ $updatedUrlfull.'page='.$listings->nextPageUrl() }}"
                                                                     rel="next">»</a></li>
                                        @else
                                            <li class="page-item disabled"><span class="page-link">»</span></li>
                                        @endif
                                    </ul>
                                    </div>
                            <!--pagination end--> 
                            @endif
            </div>
            <div id="sort-by">
              <a class="button-asc left" href="#" title="Set Descending Direction"><span class="top_arrow"></span></a> 
            </div>
          </div>
        <article class="col-main mt-2">
          <div class=" new_dynamic">
              <!---->
                @forelse($topads as $list)
                <div class="card card_listing mb-4">
                <!---->
                <div class="card-body">
                    <div class="row">
                        <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-5 col-sm-6 mx-auto mb-3 mb-xl-0">
                            <div class="car-image position-relative new_cars-ribbon" style="background: rgba(21, 26, 123, 0.4);">
                                <a href="{{ route('auto-detail',$list->slug) }}" class=""><img class="img-fluid h-100" src="{{ asset('public/uploads/listings/'.$list->feature_image) }}" alt="icon"/></a>
                            </div>
                        </div>
                        <div class="col-xxl-8 col-xl-8 col-lg-8 col-md-7 col-sm-12 mb-3 mb-xl-0">
                            <div class="car-specs">
                                <div class="card-header px-0" data-listingid="{{ $list->id }}">
                                    <button class="btnAll add-to-fav" title="" type="button"><img class="img-fluid" src="{{ asset('public/front/images/heart-svgrepo-com.svg') }}" alt="icon"/></button>
                                    <a href="{{ route('auto-detail',$list->slug) }}" class="img_title">
                                        <h6 class="mb-0 ">{{ $list->title }}</h6>
                                    </a>
                                </div>
                                @if($list->is_deal == 1)
                                    <div class="search-price"><del>R{{ $list->price }}</del> <span>R{{ $list->deal_price }}</span></div>
                                @else
                                    <div class="search-price"><span>R{{ $list->price }}</span></div>
                                @endif                                
                                
                                <!---->
                                <div class="row flex-row">
                                    <div class="col-6">
                                        <a href="#">
                                            <ul class="list-unstyled search_list m-0">
                                                <li>
                                                    <i class="specs-icon" style="background-image: url('https://cars.alliftech.com/public/front/images/Year.png')"></i>
                                                    <span class="value">{{ $list->year }}</span>
                                                </li>
                                                <li>
                                                    <i class="specs-icon" style="background-image: url('https://cars.alliftech.com/public/front/images/body-type.png')"></i>
                                                    <span class="hidden-xs">Body Type:</span> <span class="value">{{ $list->body_type->name ?? 'N/A' }}</span>
                                                </li>
                                                <li>
                                                    <i class="specs-icon" style="background-image: url('https://cars.alliftech.com/public/front/images/type-of-fuel.png')"></i>
                                                    <span class="hidden-xs">Type of Fuel:</span> <span class="value">{{ $list->fuel_type ?? 'N/A' }}</span>
                                                </li>
                                                <li>
                                                    <i class="specs-icon" style="background-image: url('https://cars.alliftech.com/public/front/images/transmission.png')"></i>
                                                    <span class="hidden-xs">Transmission:</span> <span class="value">{{ $list->transmission ?? 'N/A' }}</span>
                                                </li>
                                            </ul>
                                        </a>
                                    </div>
                                    <!---->
                                    <div class="col-6">
                                        <a href="#">
                                            <ul class="list-unstyled search_list m-0">
                                                <li><i class="specs-icon" style="background-image: url('https://cars.alliftech.com/public/front/images/traction-of-vehicle.png')"></i><span class="hidden-xs">Traction of Vehicle:</span> <span class="value">Front-wheel drive</span></li>
                                                <li><i class="specs-icon" style="background-image: url('https://cars.alliftech.com/public/front/images/doors.png')"></i><span class="value">{{ $list->doors ?? 'N/A' }}</span> </li>
                                                <li><i class="specs-icon" style="background-image: url('https://cars.alliftech.com/public/front/images/engine-capacity.png')"></i><span class="hidden-xs">Engine Capacity (cm3):</span> <span class="value">{{ $list->engine ?? 'N/A' }}</span> </li>
                                                <li><i class="specs-icon" style="background-image: url('https://cars.alliftech.com/public/front/images/colour.png')"></i><span class="hidden-xs">Colour:</span> <span class="value">{{ $list->color ?? 'N/A' }}</span> </li>
                                            </ul>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--<div class="col-xxl-3 col-xl-3 col-lg-12 col-md-12">-->
                        <!--    <div class="car-specials-preview row">-->
                        <!--        <a href="#" class="col-xs-4 col-sm-4 col-md-6 px-1"><img class="img-thumbnail" src="https://www.cardealer.co.za/upload/5955/thumbs/6184417_1_big.jpg" alt="icon"/></a>-->
                        <!--        <a href="#" class="col-xs-4 col-sm-4 col-md-6 px-1"><img class="img-thumbnail" src="https://www.cardealer.co.za/upload/5955/thumbs/6184417_1_big.jpg" alt="icon"/></a>-->
                        <!--        <a href="#" class="col-xs-4 col-sm-4 col-md-6 px-1"><img class="img-thumbnail" src="https://www.cardealer.co.za/upload/5955/thumbs/6184417_1_big.jpg" alt="icon"/></a>-->
                        <!--    </div>-->
                        <!--</div>-->
                    </div>
                </div>
                <!---->
            </div>
            @empty
            @endforelse
                @php $i = 0; @endphp
                @forelse($listings as $list)
                <div class="card card_listing mb-4">
                <!---->
                <div class="card-body">
                    <div class="row">
                        <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-5 col-sm-6 mx-auto mb-3 mb-xl-0">
                            <div class="car-image position-relative" style="background: rgba(21, 26, 123, 0.4);">
                                <a href="{{ route('auto-detail',$list->slug) }}" class=""><img class="img-fluid h-100" src="{{ asset('public/uploads/listings/'.$list->feature_image) }}" alt="icon"/></a>
                            </div>
                        </div>
                        <div class="col-xxl-8 col-xl-8 col-lg-8 col-md-7 col-sm-12 mb-3 mb-xl-0">
                            <div class="car-specs">
                                <div class="card-header px-0" data-listingid="{{ $list->id }}">
                                    <button class="btnAll add-to-fav" title="" type="button"><img class="img-fluid" src="{{ asset('public/front/images/heart-svgrepo-com.svg') }}" alt="icon"/></button>
                                    <a href="{{ route('auto-detail',$list->slug) }}" class="img_title">
                                        <h6 class="mb-0 ">{{ $list->title }}</h6>
                                    </a>
                                </div>
                                @if($list->is_deal == 1)
                                    <div class="search-price"><del>R{{ $list->price }}</del> <span>R{{ $list->deal_price }}</span></div>
                                @else
                                    <div class="search-price"><span>R{{ $list->price }}</span></div>
                                @endif   
                                <!---->
                                <div class="row flex-row">
                                    <div class="col-6">
                                        <a href="#">
                                            <ul class="list-unstyled search_list m-0">
                                                <li>
                                                    <i class="specs-icon" style="background-image: url('https://cars.alliftech.com/public/front/images/Year.png')"></i>
                                                    <span class="value">{{ $list->year }}</span>
                                                </li>
                                                <li>
                                                    <i class="specs-icon" style="background-image: url('https://cars.alliftech.com/public/front/images/body-type.png')"></i>
                                                    <span class="hidden-xs">Body Type:</span> <span class="value">{{ $list->body_type->name ?? 'N/A' }}</span>
                                                </li>
                                                <li>
                                                    <i class="specs-icon" style="background-image: url('https://cars.alliftech.com/public/front/images/type-of-fuel.png')"></i>
                                                    <span class="hidden-xs">Type of Fuel:</span> <span class="value">{{ $list->fuel_type ?? 'N/A' }}</span>
                                                </li>
                                                <li>
                                                    <i class="specs-icon" style="background-image: url('https://cars.alliftech.com/public/front/images/transmission.png')"></i>
                                                    <span class="hidden-xs">Transmission:</span> <span class="value">{{ $list->transmission ?? 'N/A' }}</span>
                                                </li>
                                            </ul>
                                        </a>
                                    </div>
                                    <!---->
                                    <div class="col-6">
                                        <a href="#">
                                            <ul class="list-unstyled search_list m-0">
                                                <li><i class="specs-icon" style="background-image: url('https://cars.alliftech.com/public/front/images/traction-of-vehicle.png')"></i><span class="hidden-xs">Traction of Vehicle:</span> <span class="value">Front-wheel drive</span></li>
                                                <li><i class="specs-icon" style="background-image: url('https://cars.alliftech.com/public/front/images/doors.png')"></i><span class="value">{{ $list->doors ?? 'N/A' }}</span> </li>
                                                <li><i class="specs-icon" style="background-image: url('https://cars.alliftech.com/public/front/images/engine-capacity.png')"></i><span class="hidden-xs">Engine Capacity (cm3):</span> <span class="value">{{ $list->engine ?? 'N/A' }}</span> </li>
                                                <li><i class="specs-icon" style="background-image: url('https://cars.alliftech.com/public/front/images/colour.png')"></i><span class="hidden-xs">Colour:</span> <span class="value">{{ $list->color ?? 'N/A' }}</span> </li>
                                            </ul>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--<div class="col-xxl-3 col-xl-3 col-lg-12 col-md-12">-->
                        <!--    <div class="car-specials-preview row">-->
                        <!--        <a href="#" class="col-xs-4 col-sm-4 col-md-6 px-1"><img class="img-thumbnail" src="https://www.cardealer.co.za/upload/5955/thumbs/6184417_1_big.jpg" alt="icon"/></a>-->
                        <!--        <a href="#" class="col-xs-4 col-sm-4 col-md-6 px-1"><img class="img-thumbnail" src="https://www.cardealer.co.za/upload/5955/thumbs/6184417_1_big.jpg" alt="icon"/></a>-->
                        <!--        <a href="#" class="col-xs-4 col-sm-4 col-md-6 px-1"><img class="img-thumbnail" src="https://www.cardealer.co.za/upload/5955/thumbs/6184417_1_big.jpg" alt="icon"/></a>-->
                        <!--    </div>-->
                        <!--</div>-->
                    </div>
                </div>
                <!---->
            </div>
                    @if($i == 4)
                        @if(count($highlightedads) > 0)
                        <div class="card card_listing mb-4">
                            <!---->
                            <div class="card-body colorlolo">
                                <div class="row">
                                    <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-5 col-sm-6 mx-auto mb-3 mb-xl-0">
                                        <div class="car-image position-relative new_cars-ribbon" style="background: rgba(21, 26, 123, 0.4);">
                                            <a href="{{ route('auto-detail',$highlightedads[0]->id) }}" class=""><img class="img-fluid h-100" src="{{ asset('public/uploads/listings/'.$highlightedads[0]->feature_image) }}" alt="icon"/></a>
                                        </div>
                                    </div>
                                    <div class="col-xxl-8 col-xl-8 col-lg-8 col-md-7 col-sm-12 mb-3 mb-xl-0">
                                        <div class="car-specs">
                                            <div class="card-header px-0" data-listingid="{{ $highlightedads[0]->id }}">
                                                <button class="btnAll add-to-fav" title="" type="button"><img class="img-fluid" src="{{ asset('public/front/images/heart-svgrepo-com.svg') }}" alt="icon"/></button>
                                                <a href="{{ route('auto-detail',$highlightedads[0]->slug) }}" class="img_title">
                                                    <h6 class="mb-0 ">{{ $highlightedads[0]->title }}</h6>
                                                </a>
                                            </div>
                                            @if($highlightedads[0]->is_deal == 1)
                                                <div class="search-price"><del>R{{ $highlightedads[0]->price }}</del> <span>R{{ $highlightedads[0]->deal_price }}</span></div>
                                            @else
                                                <div class="search-price"><span>R{{ $highlightedads[0]->price }}</span></div>
                                            @endif 
                                            <!---->
                                            <div class="row flex-row">
                                                <div class="col-6">
                                                    <a href="#">
                                                        <ul class="list-unstyled search_list m-0">
                                                            <li>
                                                                <i class="specs-icon" style="background-image: url('https://cars.alliftech.com/public/front/images/Year.png')"></i>
                                                                <span class="value">{{ $highlightedads[0]->year }}</span>
                                                            </li>
                                                            <li>
                                                                <i class="specs-icon" style="background-image: url('https://cars.alliftech.com/public/front/images/body-type.png')"></i>
                                                                <span class="hidden-xs">Body Type:</span> <span class="value">{{ $highlightedads[0]->body_type->name ?? 'N/A' }}</span>
                                                            </li>
                                                            <li>
                                                                <i class="specs-icon" style="background-image: url('https://cars.alliftech.com/public/front/images/type-of-fuel.png')"></i>
                                                                <span class="hidden-xs">Type of Fuel:</span> <span class="value">{{ $highlightedads[0]->fuel_type ?? 'N/A' }}</span>
                                                            </li>
                                                            <li>
                                                                <i class="specs-icon" style="background-image: url('https://cars.alliftech.com/public/front/images/transmission.png')"></i>
                                                                <span class="hidden-xs">Transmission:</span> <span class="value">{{ $highlightedads[0]->transmission ?? 'N/A' }}</span>
                                                            </li>
                                                        </ul>
                                                    </a>
                                                </div>
                                                <!---->
                                                <div class="col-6">
                                                    <a href="#">
                                                        <ul class="list-unstyled search_list m-0">
                                                            <li><i class="specs-icon" style="background-image: url('https://cars.alliftech.com/public/front/images/traction-of-vehicle.png')"></i><span class="hidden-xs">Traction of Vehicle:</span> <span class="value">Front-wheel drive</span></li>
                                                            <li><i class="specs-icon" style="background-image: url('https://cars.alliftech.com/public/front/images/doors.png')"></i><span class="value">{{ $highlightedads[0]->doors ?? 'N/A' }}</span> </li>
                                                            <li><i class="specs-icon" style="background-image: url('https://cars.alliftech.com/public/front/images/engine-capacity.png')"></i><span class="hidden-xs">Engine Capacity (cm3):</span> <span class="value">{{ $highlightedads[0]->engine ?? 'N/A' }}</span> </li>
                                                            <li><i class="specs-icon" style="background-image: url('https://cars.alliftech.com/public/front/images/colour.png')"></i><span class="hidden-xs">Colour:</span> <span class="value">{{ $highlightedads[0]->color ?? 'N/A' }}</span> </li>
                                                        </ul>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!---->
                        </div>  
                        @endif
                    @endif
                    @if($i == 8)
                        @if(count($highlightedads) > 0 && count($highlightedads) < 3)
                        <div class="card card_listing mb-4">
                            
                            <div class="card-body colorlolo">
                                <div class="row">
                                    <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-5 col-sm-6 mx-auto mb-3 mb-xl-0">
                                        <div class="car-image position-relative new_cars-ribbon" style="background: rgba(21, 26, 123, 0.4);">
                                            <a href="{{ route('auto-detail',$highlightedads[1]->slug) }}" class=""><img class="img-fluid h-100" src="{{ asset('public/uploads/listings/'.$highlightedads[1]->feature_image) }}" alt="icon"/></a>
                                        </div>
                                    </div>
                                    <div class="col-xxl-8 col-xl-8 col-lg-8 col-md-7 col-sm-12 mb-3 mb-xl-0">
                                        <div class="car-specs">
                                            <div class="card-header px-0" data-listingid="{{ $highlightedads[1]->id }}">
                                                <button class="btnAll add-to-fav" title="" type="button"><img class="img-fluid" src="{{ asset('public/front/images/heart-svgrepo-com.svg') }}" alt="icon"/></button>
                                                <a href="{{ route('auto-detail',$highlightedads[1]->id) }}" class="img_title">
                                                    <h6 class="mb-0 ">{{ $highlightedads[1]->title }}</h6>
                                                </a>
                                            </div>
                                            @if($highlightedads[1]->is_deal == 1)
                                                <div class="search-price"><del>R{{ $highlightedads[1]->price }}</del> <span>R{{ $highlightedads[1]->deal_price }}</span></div>
                                            @else
                                                <div class="search-price"><span>R{{ $highlightedads[1]->price }}</span></div>
                                            @endif                                               
                                            <div class="row flex-row">
                                                <div class="col-6">
                                                    <a href="#">
                                                        <ul class="list-unstyled search_list m-0">
                                                            <li>
                                                                <i class="specs-icon" style="background-image: url('https://cars.alliftech.com/public/front/images/Year.png')"></i>
                                                                <span class="value">{{ $highlightedads[1]->year }}</span>
                                                            </li>
                                                            <li>
                                                                <i class="specs-icon" style="background-image: url('https://cars.alliftech.com/public/front/images/body-type.png')"></i>
                                                                <span class="hidden-xs">Body Type:</span> <span class="value">{{ $highlightedads[1]->body_type->name ?? 'N/A' }}</span>
                                                            </li>
                                                            <li>
                                                                <i class="specs-icon" style="background-image: url('https://cars.alliftech.com/public/front/images/type-of-fuel.png')"></i>
                                                                <span class="hidden-xs">Type of Fuel:</span> <span class="value">{{ $highlightedads[1]->fuel_type ?? 'N/A' }}</span>
                                                            </li>
                                                            <li>
                                                                <i class="specs-icon" style="background-image: url('https://cars.alliftech.com/public/front/images/transmission.png')"></i>
                                                                <span class="hidden-xs">Transmission:</span> <span class="value">{{ $highlightedads[1]->transmission ?? 'N/A' }}</span>
                                                            </li>
                                                        </ul>
                                                    </a>
                                                </div>
                                                
                                                <div class="col-6">
                                                    <a href="#">
                                                        <ul class="list-unstyled search_list m-0">
                                                            <li><i class="specs-icon" style="background-image: url('https://cars.alliftech.com/public/front/images/traction-of-vehicle.png')"></i><span class="hidden-xs">Traction of Vehicle:</span> <span class="value">Front-wheel drive</span></li>
                                                            <li><i class="specs-icon" style="background-image: url('https://cars.alliftech.com/public/front/images/doors.png')"></i><span class="value">{{ $highlightedads[1]->doors ?? 'N/A' }}</span> </li>
                                                            <li><i class="specs-icon" style="background-image: url('https://cars.alliftech.com/public/front/images/engine-capacity.png')"></i><span class="hidden-xs">Engine Capacity (cm3):</span> <span class="value">{{ $highlightedads[1]->engine ?? 'N/A' }}</span> </li>
                                                            <li><i class="specs-icon" style="background-image: url('https://cars.alliftech.com/public/front/images/colour.png')"></i><span class="hidden-xs">Colour:</span> <span class="value">{{ $highlightedads[1]->color ?? 'N/A' }}</span> </li>
                                                        </ul>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                        </div>      
                        @endif
                    @endif
                    @if($i == 12)
                        <!--<div class="card card_listing mb-4">-->
                            <!---->
                        <!--    <div class="card-body colorlolo">-->
                        <!--        <div class="row">-->
                        <!--            <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-5 col-sm-6 mx-auto mb-3 mb-xl-0">-->
                        <!--                <div class="car-image position-relative new_cars-ribbon">-->
                        <!--                    <a href="{{ route('auto-detail',$list->slug) }}" class=""><img class="img-fluid h-100" src="{{ asset('public/uploads/listings/'.$list->feature_image) }}" alt="icon"/></a>-->
                        <!--                </div>-->
                        <!--            </div>-->
                        <!--            <div class="col-xxl-8 col-xl-8 col-lg-8 col-md-7 col-sm-12 mb-3 mb-xl-0">-->
                        <!--                <div class="car-specs">-->
                        <!--                    <div class="card-header px-0" data-listingid="{{ $list->id }}">-->
                        <!--                        <button class="btnAll add-to-fav" title="" type="button"><img class="img-fluid" src="{{ asset('public/front/images/heart-svgrepo-com.svg') }}" alt="icon"/></button>-->
                        <!--                        <a href="{{ route('auto-detail',$list->slug) }}" class="img_title">-->
                        <!--                            <h6 class="mb-0 ">{{ $list->title }}</h6>-->
                        <!--                        </a>-->
                        <!--                    </div>-->
                        <!--                    <div class="search-price"><span>R{{ $list->price }}</span></div>-->
                                            <!---->
                        <!--                    <div class="row flex-row">-->
                        <!--                        <div class="col-6">-->
                        <!--                            <a href="#">-->
                        <!--                                <ul class="list-unstyled search_list m-0">-->
                        <!--                                    <li>-->
                        <!--                                        <i class="specs-icon" style="background-image: url('https://cars.alliftech.com/public/front/images/Year.png')"></i>-->
                        <!--                                        <span class="value">{{ $list->year }}</span>-->
                        <!--                                    </li>-->
                        <!--                                    <li>-->
                        <!--                                        <i class="specs-icon" style="background-image: url('https://cars.alliftech.com/public/front/images/body-type.png')"></i>-->
                        <!--                                        <span class="hidden-xs">Body Type:</span> <span class="value">{{ $list->body_type->name ?? 'N/A' }}</span>-->
                        <!--                                    </li>-->
                        <!--                                    <li>-->
                        <!--                                        <i class="specs-icon" style="background-image: url('https://cars.alliftech.com/public/front/images/type-of-fuel.png')"></i>-->
                        <!--                                        <span class="hidden-xs">Type of Fuel:</span> <span class="value">{{ $list->fuel_type ?? 'N/A' }}</span>-->
                        <!--                                    </li>-->
                        <!--                                    <li>-->
                        <!--                                        <i class="specs-icon" style="background-image: url('https://cars.alliftech.com/public/front/images/transmission.png')"></i>-->
                        <!--                                        <span class="hidden-xs">Transmission:</span> <span class="value">{{ $list->transmission ?? 'N/A' }}</span>-->
                        <!--                                    </li>-->
                        <!--                                </ul>-->
                        <!--                            </a>-->
                        <!--                        </div>-->
                                                <!---->
                        <!--                        <div class="col-6">-->
                        <!--                            <a href="#">-->
                        <!--                                <ul class="list-unstyled search_list m-0">-->
                        <!--                                    <li><i class="specs-icon" style="background-image: url('https://cars.alliftech.com/public/front/images/traction-of-vehicle.png')"></i><span class="hidden-xs">Traction of Vehicle:</span> <span class="value">Front-wheel drive</span></li>-->
                        <!--                                    <li><i class="specs-icon" style="background-image: url('https://cars.alliftech.com/public/front/images/doors.png')"></i><span class="value">{{ $list->doors ?? 'N/A' }}</span> </li>-->
                        <!--                                    <li><i class="specs-icon" style="background-image: url('https://cars.alliftech.com/public/front/images/engine-capacity.png')"></i><span class="hidden-xs">Engine Capacity (cm3):</span> <span class="value">{{ $list->engine ?? 'N/A' }}</span> </li>-->
                        <!--                                    <li><i class="specs-icon" style="background-image: url('https://cars.alliftech.com/public/front/images/colour.png')"></i><span class="hidden-xs">Colour:</span> <span class="value">{{ $list->color ?? 'N/A' }}</span> </li>-->
                        <!--                                </ul>-->
                        <!--                            </a>-->
                        <!--                        </div>-->
                        <!--                    </div>-->
                        <!--                </div>-->
                        <!--            </div>-->
                                    <!--<div class="col-xxl-3 col-xl-3 col-lg-12 col-md-12">-->
                                    <!--    <div class="car-specials-preview row">-->
                                    <!--        <a href="#" class="col-xs-4 col-sm-4 col-md-6 px-1"><img class="img-thumbnail" src="https://www.cardealer.co.za/upload/5955/thumbs/6184417_1_big.jpg" alt="icon"/></a>-->
                                    <!--        <a href="#" class="col-xs-4 col-sm-4 col-md-6 px-1"><img class="img-thumbnail" src="https://www.cardealer.co.za/upload/5955/thumbs/6184417_1_big.jpg" alt="icon"/></a>-->
                                    <!--        <a href="#" class="col-xs-4 col-sm-4 col-md-6 px-1"><img class="img-thumbnail" src="https://www.cardealer.co.za/upload/5955/thumbs/6184417_1_big.jpg" alt="icon"/></a>-->
                                    <!--    </div>-->
                                    <!--</div>-->
                        <!--        </div>-->
                        <!--    </div>-->
                            <!---->
                        <!--</div>                    -->
                    @endif
                @php $i++; @endphp
            @empty
                <div class="alert alert-secondary">
                    No Record Found!
                </div>
            @endforelse
          <!---->
          </div>
          <div class="toolbar bottom">
            
            <div id="sort-by">
              <a class="button-asc left" href="#" title="Set Descending Direction"><span class="top_arrow"></span></a> </div>
            <div class="pager">
                @if ($listings->hasPages())
                                <div id="limiter">
                                <label>View: </label>
                                <ul>
                                  <li><a href="#">@if(request()->per_page) {{ request()->per_page }} @else 10 @endif<span class="right-arrow"></span></a>
                                    <ul>
                                      <li><a href="{{ route('listing', ['per_page' => 20]) }}">20</a></li>
                                      <li><a href="{{ route('listing', ['per_page' => 30]) }}">30</a></li>
                                      <li><a href="{{ route('listing', ['per_page' => 35]) }}">35</a></li>
                                    </ul>
                                  </li>
                                </ul>
                                </div>
                            <!--pagination start-->
                                
                                <div class="pages">
                                    <ul class="pagination justify-content-center">
                                        {{-- Previous Page Link --}}
                                        @if ($listings->onFirstPage())
                                            <li class="page-item disabled"><span class="page-link">«</span></li>
                                        @else
                                            <li class="page-item"><a href="{{ $updatedUrlfull.'page='.$listings->previousPageUrl() }}"
                                                                     rel="prev" class="page-link">«</a></li>
                                        @endif

                                        @if($listings->currentPage() > 3)
                                            <li class="page-item hidden-xs"><a href="{{ $updatedUrlfull.'page=1' }}"
                                                                               class="page-link">1</a></li>
                                        @endif
                                        @if($listings->currentPage() > 4)
                                            <li class="page-item"><span class="page-link">...</span></li>
                                        @endif
                                        @foreach(range(1, $listings->lastPage()) as $i)
                                            @if($i >= $listings->currentPage() - 2 && $i <= $listings->currentPage() + 2)
                                                @if ($i == $listings->currentPage())
                                                    <li class="page-item active"><span class="page-link">{{ $i }}</span>
                                                    </li>
                                                @else
                                                    <li class="page-item"><a class="page-link"
                                                                             href="{{ $updatedUrlfull.'page='.$i }}">{{ $i }}</a>
                                                    </li>
                                                @endif
                                            @endif
                                        @endforeach
                                        @if($listings->currentPage() < $listings->lastPage() - 3)
                                            <li class="page-item"><span class="page-link">...</span></li>
                                        @endif
                                        @if($listings->currentPage() < $listings->lastPage() - 2)
                                            <li class="page-item hidden-xs"><a
                                                        href="{{ $updatedUrlfull.'page='.$listings->lastPage() }}"
                                                        class="page-link">{{ $listings->lastPage() }}</a></li>
                                        @endif

                                        {{-- Next Page Link --}}
                                        @if ($listings->hasMorePages())
                                            <li class="page-item"><a class="page-link"
                                                                     href="{{ $updatedUrlfull.'page='.$listings->nextPageUrl() }}"
                                                                     rel="next">»</a></li>
                                        @else
                                            <li class="page-item disabled"><span class="page-link">»</span></li>
                                        @endif
                                    </ul>
                                    </div>
                                @endif
                            <!--pagination end--> 
            </div>
          </div>
          
        </article>
        </div>
        <!--	///*///======    End article  ========= //*/// --> 
      </div>
      <!--col-right sidebar-->
      <aside class="col-left sidebar col-xl-2 col-sm-pull-9 wow bounceInUp animated"> 
        
        <div class="text-center card mb-3">
            <div class="card-body p-0">
                <h5 class="text-start p-3" style="font-size:18px; font-weight:600; color:#222222">Sponsored Ads</h5>
                <div class="custom-slider mb-0">
                  <div>
                    <div id="carouselExampleCaptions" class="carousel slide category-products pt-0" data-bs-ride="false">
                    <ul class="carousel-inner products-grid m-0" id="sponsardAdds">
                        @forelse($highlightedads as $list)
                        <li class="carousel-item @if($loop->iteration == 1) active @endif">
                            <div class="item px-0 mb-0 slider-items">
                                <div class="item-inner">
                                    <div class="item-img">
                                      <div class="item-img-info">
                                        <a href="{{ route('auto-detail',$list->slug) }}" title="Retis lapen casen" class="product-image">
                                          <img src="{{ asset('public/uploads/listings/'.$list->feature_image) }}" alt="Retis lapen casen">
                                        </a>
                                        <div class="new-label new-top-left">Urgent</div>
                                        <div class="item-box-hover">
                                          <div class="box-inner">
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                    <div class="item-info" style="background:#fff;">
                                        <div class="info-inner pb-3">
                                            <div class="item-title px-2 py-0">
                                                <a href="{{ route('auto-detail',$list->slug) }}" style="font-size:12px;line-height:normal;" title="Retis lapen casen">{{ $list->title }}</a>
                                            </div>
                                            <div class="item-content">
                                                <div class="item-price">
                                                    <div class="price-box py-0">
                                                      <span class="regular-price">
                                                        <span class="price" style="font-size:17px;">R{{ $list->price }}</span>
                                                      </span>
                                                    </div>
                                                </div>
                                                <div class="other-info mt-0" style="font-size:13px;">
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
                        </li>
                        @empty
                        @endforelse
                    </ul>
                      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                      </button>
                      <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                      </button>
                  </div>
                </div>
            </div>          
            </div>
        </div>
        <div class="text-center card">
            <div class="card-body p-0"><img class="img-thumbnail" src="{{ asset('public/front/images/addsbaner.jpg') }}" alt="icon"/></div>
        </div>
      </aside>
    </div>
    <!--row--> 
  </div>
  <!--container--> 
</section>
<!--main-container col2-left-layout--> 

<script>
    function brandChangedTrigger () {
        let queryString = window.location.search;  // get url parameters
        let params = new URLSearchParams(queryString);  // create url search params object
        params.delete('brand');  // delete city parameter if it exists, in case you change the dropdown more then once
        params.append('brand', document.getElementById("brand").value); // add selected city
        document.location.href = "?" + params.toString(); // refresh the page with new url
    }
    function bodytypeChangedTrigger () {
        let queryString = window.location.search;  // get url parameters
        let params = new URLSearchParams(queryString);  // create url search params object
        params.delete('bodytype');  // delete city parameter if it exists, in case you change the dropdown more then once
        params.append('bodytype', document.getElementById("bodytype").value); // add selected city
        document.location.href = "?" + params.toString(); // refresh the page with new url
    }
    function transmissionChangedTrigger () {
        let queryString = window.location.search;  // get url parameters
        let params = new URLSearchParams(queryString);  // create url search params object
        params.delete('transmission');  // delete city parameter if it exists, in case you change the dropdown more then once
        params.append('transmission', document.getElementById("transmission").value); // add selected city
        document.location.href = "?" + params.toString(); // refresh the page with new url
    }
    function fueltypeChangedTrigger () {
        let queryString = window.location.search;  // get url parameters
        let params = new URLSearchParams(queryString);  // create url search params object
        params.delete('fueltype');  // delete city parameter if it exists, in case you change the dropdown more then once
        params.append('fueltype', document.getElementById("fueltype").value); // add selected city
        document.location.href = "?" + params.toString(); // refresh the page with new url
    }
    function yearmodelChangedTrigger () {
        let queryString = window.location.search;  // get url parameters
        let params = new URLSearchParams(queryString);  // create url search params object
        params.delete('yearmodel');  // delete city parameter if it exists, in case you change the dropdown more then once
        params.append('yearmodel', document.getElementById("yearmodel").value); // add selected city
        document.location.href = "?" + params.toString(); // refresh the page with new url
    }
    function fueltypeChangedTrigger () {
        let queryString = window.location.search;  // get url parameters
        let params = new URLSearchParams(queryString);  // create url search params object
        params.delete('fueltype');  // delete city parameter if it exists, in case you change the dropdown more then once
        params.append('fueltype', document.getElementById("fueltype").value); // add selected city
        document.location.href = "?" + params.toString(); // refresh the page with new url
    }
    function locationChangedTrigger () {
        let queryString = window.location.search;  // get url parameters
        let params = new URLSearchParams(queryString);  // create url search params object
        params.delete('location');  // delete city parameter if it exists, in case you change the dropdown more then once
        params.append('location', document.getElementById("location").value); // add selected city
        document.location.href = "?" + params.toString(); // refresh the page with new url
    }
    function cityChangedTrigger () {
        let queryString = window.location.search;  // get url parameters
        let params = new URLSearchParams(queryString);  // create url search params object
        params.delete('city');  // delete city parameter if it exists, in case you change the dropdown more then once
        params.append('city', document.getElementById("city").value); // add selected city
        document.location.href = "?" + params.toString(); // refresh the page with new url
    }
    function startpriceChangedTrigger () {
        let queryString = window.location.search;  // get url parameters
        let params = new URLSearchParams(queryString);  // create url search params object
        params.delete('start_price');  // delete city parameter if it exists, in case you change the dropdown more then once
        params.append('start_price', document.getElementById("start_price").value); // add selected city
        document.location.href = "?" + params.toString(); // refresh the page with new url
    }
    function endpriceChangedTrigger () {
        let queryString = window.location.search;  // get url parameters
        let params = new URLSearchParams(queryString);  // create url search params object
        params.delete('end_price');  // delete city parameter if it exists, in case you change the dropdown more then once
        params.append('end_price', document.getElementById("end_price").value); // add selected city
        document.location.href = "?" + params.toString(); // refresh the page with new url
    }
    function gridviewTrigger() {
        let queryString = window.location.search;  // get url parameters
        let params = new URLSearchParams(queryString);  // create url search params object
        params.delete('end_price');  // delete city parameter if it exists, in case you change the dropdown more then once
        params.append('end_price', document.getElementById("end_price").value); // add selected city
        document.location.href = "{{ URL::to('grid') }}?" + params.toString(); // refresh the page with new url
    }
    $(document).on('click', '.category', function() {
        let queryString = window.location.search;  // get url parameters
        let params = new URLSearchParams(queryString);  // create url search params object
        params.delete('category');  // delete city parameter if it exists, in case you change the dropdown more then once
        params.append('category', $(this).data("value")); // add selected city
        document.location.href = "?" + params.toString(); // refresh the page with new url        
    });    
</script>
@endsection