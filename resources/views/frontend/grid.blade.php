@extends('layouts/frontapp')
@section('content')

<div class="page-heading">
  <div class="page-title">
    <h2>CURRENT LISTING</h2>
  </div>
</div>
<!--breadcrumbs--> 
<!-- BEGIN Main Container col2-left -->
<section class="main-container col2-left-layout bounceInUp animated">
  <div class="col-xxl-10 col-xl-10 col-lg-10 col-11 mx-auto">
    <div class="row">
      <aside class="col-left sidebar col-sm-3 col-xs-12 col-sm-pull-9 wow bounceInUp animated"> 
      <!-- BEGIN SIDE-NAV-CATEGORY -->
<div class="section-filter">
              <div class="b-filter__inner bg-grey">
                <h2><span>Find your right car</span></h2>
                <form class="b-filter">
                  <select class="form-select mb-3" name="brand" id="brand" onchange="brandChangedTrigger()">
                    <option value="">Select Brand</option>
                    @foreach(brands() as $brand)
                        <option value="{{ $brand->id }}" @if(request()->brand == $brand->id) selected @endif>{{ $brand->name }}</option>
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
                        <option value="{{ $state->slug }}" @if(request()->location == $state->slug) selected @endif>{{ $state->name }}</option>
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
                  <div>
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
        </aside>
        <!--col-main col-sm-9 col-sm-push-3 product-grid-->
      <div class="col-main col-sm-7 col-sm-push-3 product-grid">
        <div class="pro-coloumn">
          <article class="col-main m-0">
            <div class="toolbar">
              <div class="sorter">
                <div class="view-mode">
                  <a href="#!" title="List" onclick="listviewTrigger()" class="button-list">&nbsp;</a>
                  <span title="Grid" class="button button-active button-grid">&nbsp;</span>
                </div>
              </div>
              <div id="sort-by">
                <label class="left">Sort By: </label>
                <ul>
                  <li>
                    <a href="#">Position <span class="right-arrow"></span>
                    </a>
                    <ul>
                      <li>
                        <a href="#">Name</a>
                      </li>
                      <li>
                        <a href="#">Price</a>
                      </li>
                      <li>
                        <a href="#">Position</a>
                      </li>
                    </ul>
                  </li>
                </ul>
                <a class="button-asc left" href="#" title="Set Descending Direction">
                  <span class="top_arrow"></span>
                </a>
              </div>
              <div class="pager">
                <div id="limiter">
                  <label>View: </label>
                  <ul>
                    <li>
                      <a href="#">15 <span class="right-arrow"></span>
                      </a>
                      <ul>
                        <li>
                          <a href="#">20</a>
                        </li>
                        <li>
                          <a href="#">30</a>
                        </li>
                        <li>
                          <a href="#">35</a>
                        </li>
                      </ul>
                    </li>
                  </ul>
                </div>
                            <!--pagination start-->
                                @if ($listings->hasPages())
                                <div class="pages">
                                    <ul class="pagination justify-content-center">
                                        {{-- Previous Page Link --}}
                                        @if ($listings->onFirstPage())
                                            <li class="page-item disabled"><span class="page-link">«</span></li>
                                        @else
                                            <li class="page-item"><a href="{{ url()->full().'&page='.$listings->previousPageUrl() }}"
                                                                     rel="prev" class="page-link">«</a></li>
                                        @endif

                                        @if($listings->currentPage() > 3)
                                            <li class="page-item hidden-xs"><a href="{{ url()->full().'&page=1' }}"
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
                                                                             href="{{ url()->full().'&page='.$i }}">{{ $i }}</a>
                                                    </li>
                                                @endif
                                            @endif
                                        @endforeach
                                        @if($listings->currentPage() < $listings->lastPage() - 3)
                                            <li class="page-item"><span class="page-link">...</span></li>
                                        @endif
                                        @if($listings->currentPage() < $listings->lastPage() - 2)
                                            <li class="page-item hidden-xs"><a
                                                        href="{{ url()->full().'&page='.$listings->lastPage() }}"
                                                        class="page-link">{{ $listings->lastPage() }}</a></li>
                                        @endif

                                        {{-- Next Page Link --}}
                                        @if ($listings->hasMorePages())
                                            <li class="page-item"><a class="page-link"
                                                                     href="{{ url()->full().'&page='.$listings->nextPageUrl() }}"
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
            <div class="category-products">
              <ul class="products-grid row w-100">
                @forelse($listings as $list)  
                <li class="item col-lg-4 col-md-3 col-sm-4 col-xs-6">
                  <div class="item-inner">
                    <div class="item-img">
                      <div class="item-img-info">
                        <a href="{{ route('auto-detail',$list->slug) }}" title="Retis lapen casen" class="product-image">
                          <img src="{{ asset('public/uploads/listings/'.$list->feature_image) }}" alt="Retis lapen casen">
                        </a>
                        <div class="new-label new-top-left">Used</div>
                        <div class="sale-label sale-top-left">-15%</div>
                        <div class="item-box-hover">
                          <div class="box-inner">
                            <!--<div class="add_cart">-->
                            <!--  <button class="button btn-cart" type="button"></button>-->
                            <!--</div>-->
                            <div class="product-detail-bnt">
                              <a class="button detail-bnt">
                                <span>Quick View</span>
                              </a>
                            </div>
                            <div class="actions">
                              <span class="add-to-links">
                                <a href="#" class="link-wishlist" title="Add to Wishlist">
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
                                <span class="price">R{{ $list->sale_price }}</span>
                              </span>
                            </div>
                          </div>
                          <div class="other-info">
                            <div class="col-km">
                              <i class="fa fa-tachometer"></i> 4875km
                            </div>
                            <div class="col-engine">
                              <i class="fa fa-gear"></i> Automatic
                            </div>
                            <div class="col-date">
                              <i class="fa fa-calendar" aria-hidden="true"></i> 2018
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </li>
                @empty
                    <div class="alert alert-secondary">
                        No Record Found!
                    </div>                
                @endforelse                
              </ul>
            </div>
            <div class="toolbar bottom">
              <div id="sort-by">
                <label class="left">Sort By: </label>
                <ul>
                  <li>
                    <a href="#">Position <span class="right-arrow"></span>
                    </a>
                    <ul>
                      <li>
                        <a href="#">Name</a>
                      </li>
                      <li>
                        <a href="#">Price</a>
                      </li>
                      <li>
                        <a href="#">Position</a>
                      </li>
                    </ul>
                  </li>
                </ul>
                <a class="button-asc left" href="#" title="Set Descending Direction">
                  <span class="top_arrow"></span>
                </a>
              </div>
              <div class="pager">
                <div id="limiter">
                  <label>View: </label>
                  <ul>
                    <li>
                      <a href="#">15 <span class="right-arrow"></span>
                      </a>
                      <ul>
                        <li>
                          <a href="#">20</a>
                        </li>
                        <li>
                          <a href="#">30</a>
                        </li>
                        <li>
                          <a href="#">35</a>
                        </li>
                      </ul>
                    </li>
                  </ul>
                </div>
                            <!--pagination start-->
                                @if ($listings->hasPages())
                                <div class="pages">
                                    <ul class="pagination justify-content-center">
                                        {{-- Previous Page Link --}}
                                        @if ($listings->onFirstPage())
                                            <li class="page-item disabled"><span class="page-link">«</span></li>
                                        @else
                                            <li class="page-item"><a href="{{ url()->full().'&page='.$listings->previousPageUrl() }}"
                                                                     rel="prev" class="page-link">«</a></li>
                                        @endif

                                        @if($listings->currentPage() > 3)
                                            <li class="page-item hidden-xs"><a href="{{ url()->full().'&page=1' }}"
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
                                                                             href="{{ url()->full().'&page='.$i }}">{{ $i }}</a>
                                                    </li>
                                                @endif
                                            @endif
                                        @endforeach
                                        @if($listings->currentPage() < $listings->lastPage() - 3)
                                            <li class="page-item"><span class="page-link">...</span></li>
                                        @endif
                                        @if($listings->currentPage() < $listings->lastPage() - 2)
                                            <li class="page-item hidden-xs"><a
                                                        href="{{ url()->full().'&page='.$listings->lastPage() }}"
                                                        class="page-link">{{ $listings->lastPage() }}</a></li>
                                        @endif

                                        {{-- Next Page Link --}}
                                        @if ($listings->hasMorePages())
                                            <li class="page-item"><a class="page-link"
                                                                     href="{{ url()->full().'&page='.$listings->nextPageUrl() }}"
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
      <aside class="col-left sidebar col-sm-2 col-xs-12 col-sm-pull-9 wow bounceInUp animated"> 
        <div class="text-center card mb-3">
            <div class="card-body p-0">
                <h5 class="text-start p-3" style="font-size:18px; font-weight:600; color:#222222">Sponsored Ads</h5>
                <div class="category-products p-0">
                    <ul class="products-grid m-0" id="sponsardAdds">
                        <li class="item px-0 mb-0 slider-items">
                            <div class="item-inner">
                                <div class="item-img">
                                  <div class="item-img-info">
                                    <a href="https://cars.alliftech.com/auto-detail/16" title="Retis lapen casen" class="product-image">
                                      <img src="https://cars.alliftech.com/public/uploads/listings/1677829704.jpg" style="height:90px !important;" alt="Retis lapen casen">
                                    </a>
                                    <div class="new-label new-top-left">Used</div>
                                    <div class="sale-label sale-top-left">-15%</div>
                                    <div class="item-box-hover">
                                      <div class="box-inner">
                                        <!--<div class="add_cart">-->
                                        <!--  <button class="button btn-cart" type="button"></button>-->
                                        <!--</div>-->
                                      </div>
                                    </div>
                                  </div>
                                </div>
                                <div class="item-info" style="background:#fff;">
                                    <div class="info-inner pb-3">
                                        <div class="item-title px-2 py-0">
                                            <a href="https://cars.alliftech.com/auto-detail/16" style="font-size:10px;" title="Retis lapen casen">2019 Ford Ranger 2.2TDCi SuperCab 4x4 XLS auto</a>
                                        </div>
                                        <div class="item-content">
                                            <div class="item-price">
                                                <div class="price-box py-0">
                                                  <span class="regular-price">
                                                    <span class="price" style="font-size:17px;">R335000</span>
                                                  </span>
                                                </div>
                                            </div>
                                            <div class="other-info mt-0" style="font-size:13px;">
                                                <div class="col-km">
                                                  <i class="fa fa-tachometer"></i> 4875km
                                                </div>
                                                <div class="col-engine">
                                                  <i class="fa fa-gear"></i> Automatic
                                                </div>
                                                <div class="col-date">
                                                  <i class="fa fa-calendar" aria-hidden="true"></i> 2018
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
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
    function fueltypeChangedTrigger() {
        let queryString = window.location.search;  // get url parameters
        let params = new URLSearchParams(queryString);  // create url search params object
        params.delete('fueltype');  // delete city parameter if it exists, in case you change the dropdown more then once
        params.append('fueltype', document.getElementById("fueltype").value); // add selected city
        document.location.href = "?" + params.toString(); // refresh the page with new url
    }
    function yearmodelChangedTrigger() {
        let queryString = window.location.search;  // get url parameters
        let params = new URLSearchParams(queryString);  // create url search params object
        params.delete('yearmodel');  // delete city parameter if it exists, in case you change the dropdown more then once
        params.append('yearmodel', document.getElementById("yearmodel").value); // add selected city
        document.location.href = "?" + params.toString(); // refresh the page with new url
    }
    function locationChangedTrigger() {
        let queryString = window.location.search;  // get url parameters
        let params = new URLSearchParams(queryString);  // create url search params object
        params.delete('location');  // delete city parameter if it exists, in case you change the dropdown more then once
        params.append('location', document.getElementById("location").value); // add selected city
        document.location.href = "?" + params.toString(); // refresh the page with new url
    }
    function cityChangedTrigger() {
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
    function listviewTrigger() {
        let queryString = window.location.search;  // get url parameters
        let params = new URLSearchParams(queryString);  // create url search params object
        params.delete('end_price');  // delete city parameter if it exists, in case you change the dropdown more then once
        params.append('end_price', document.getElementById("end_price").value); // add selected city
        document.location.href = "{{ URL::to('listing') }}?" + params.toString(); // refresh the page with new url
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