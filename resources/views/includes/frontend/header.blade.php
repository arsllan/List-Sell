<header>
    <!---->
    <div class="col-xxl-10 col-xl-10 col-lg-11 col-11 mx-auto bG767">
        <div class="row">
            <div class="col-lg-2 col-md-2"><a href="{{ route('homepage') }}" title="Car HTML" class="logo"><img src="{{ asset('public/front/images/logo.svg') }}" class="" alt="Car Store"></a></div>
            <div class="col-lg-10 col-md-10 d-md-block d-none ps-md-5">
                <div class="header-banner row align-items-center d-none d-md-flex justify-content-start">
                    <div class="col-lg-5 col-md-8 col-sm-7">
                        <div class="assetBlock">
                            <div style="height: 20px; overflow: hidden;" id="slideshow">
                                @foreach(marqueenews() as $news)
                                <p style="display: block;">{{ $news->title }}</p>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <!---->
                    <div class="col-lg-7 col-md-4 col-sm-5 call-us d-none d-md-block">
                        <div class="d-flex align-items-center justify-content-end">
                            <div class="ms-xl-auto dealer_login text-end text-lg-start">
                                <div class="d-xl-flex text-end align-items-center"><span class="d-none d-xl-flex me-3"><i class="fa fa-phone"></i> +1 800 789 0000</span> <a href="{{ route('dealerLogin') }}" class="dealer_login_link">Dealer Login</a></div>
                            </div>
                        </div>
                    </div>
                </div>
                <!---->
                <div class="d-flex align-items-center">
                    <!-- BEGIN NAV -->
                    <ul id="nav" class="d-flex align-items-center ms-0">
                      <li class="active"> <a class="level-top" href="{{ route('homepage') }}"><span class="ps-0">Home</span></a></li>
                      <li class="level0 parent drop-menu"> <a class="level-top" href="{{ URL::to('listing?category=used-cars') }}"><span>For Sale</span></a>
                        <ul class="level1">
                            @foreach(system_categories_data() as $cat)
                                <li class="level1 @if($loop->iteration == 1)first @endif nav-10-3">
                                    @if($cat->slug == 'parts')
                                        <a href="{{ URL::to('parts') }}" >
                                    @else
                                        <a href="{{ URL::to('listing?category='.$cat->slug) }}" >
                                    @endif
                                    
                                        <span>{{ $cat->name }} For Sale</span>
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                      </li>
                      <li class="level0 parent drop-menu"> <a class="level-top" href="{{ URL::to('listing?category=used-cars') }}"><span>Special Deals</span></a>
                        <ul class="level1">
                            @foreach(system_categories_data() as $cat)
                                <li class="level1 @if($loop->iteration == 1)first @endif nav-10-3">
                                    @if($cat->slug == 'parts')
                                        <a href="{{ URL::to('parts') }}" >
                                    @else
                                        <a href="{{ URL::to('deallisting?category='.$cat->slug) }}" >
                                    @endif                                    
                                        <span>{{ $cat->name }} For Sale</span>
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                      </li>
                      <li class="level0 parent drop-menu"> <a class="level-top" href="{{route('new-cars')}}"><span>New Car guide</span></a></li>
                      <li class="level0 parent drop-menu"> <a class="level-top" href="{{ route('parts') }}"><span>Parts</span></a></li>
                      <li class="active"> <a class="level-top" href="{{ route('dealerships') }}"><span>Dealerships</span></a></li>
                      <!--<li class="fl-custom-tabmenulink mega-menu"> <a href="#" class="level-top"> <span>Compare Cars</span> </a>
                        <div class="level0-wrapper fl-custom-tabmenu" style="left: 0px; display: none;">
                          <div class="container">
                            <div class="header-nav-dropdown-wrapper cleare p-3">
                                @php
                                    $compare_car_data = compare_car_data();
                                @endphp
                                @forelse($compare_car_data as $compare)
                                   
                                  <div class="grid12-3 position-relative">
                                    <div><img src="{{ asset('public/uploads/listings/'.$compare->feature_image) }}" alt="custom-image"></div>
                                    <h4 class="heading">{{ $compare->title }}</h4>
                                    <a href="{{ route('compare-car-destroy',$compare->id) }}" class="btn btn_delete"></a>
                                  </div>
                                @empty
                                    <div class="alert alert-primary m-0" role="alert">Noting In Compare</div>
                                    <div class="b-compare-images p-0 m-0 border-0 shadow-none">
                            			<div class="row justify-content-end">
                            				<div class="col-lg-3 col-md-3 col-sm-6 col-6 col-md-offset-3">
                            			        <div class="position-relative">
                            						<div class="position-relative">
                            						    <img class="img-fluid" src="{{ asset('public/uploads/listings/blank_car.png') }}" alt="image">
                            						</div>
                            						<div class="b-compare-price p-0 mt-1">
                            						    <select class="form-select mb-1" aria-label="Default select example">
                                                          <option selected>Open this select menu</option>
                                                          <option value="1">One</option>
                                                          <option value="2">Two</option>
                                                          <option value="3">Three</option>
                                                        </select>
                                                        <select class="form-select mb-1" aria-label="Default select example">
                                                          <option selected>Open this select menu</option>
                                                          <option value="1">One</option>
                                                          <option value="2">Two</option>
                                                          <option value="3">Three</option>
                                                        </select>
                                                        <select class="form-select" aria-label="Default select example">
                                                          <option selected>Open this select menu</option>
                                                          <option value="1">One</option>
                                                          <option value="2">Two</option>
                                                          <option value="3">Three</option>
                                                        </select>
                            						</div>
                            					</div>
                            				</div>
                            				<div class="col-lg-3 col-md-3 col-sm-6 col-6 col-md-offset-3">
                            					<div class="position-relative">
                            						<div class="position-relative">
                            						    <img class="img-fluid" src="{{ asset('public/uploads/listings/blank_car.png') }}" alt="image">
                            						</div>
                            						<div class="b-compare-price p-0 mt-1">
                            						    <select class="form-select mb-1" aria-label="Default select example">
                                                          <option selected>Open this select menu</option>
                                                          <option value="1">One</option>
                                                          <option value="2">Two</option>
                                                          <option value="3">Three</option>
                                                        </select>
                                                        <select class="form-select mb-1" aria-label="Default select example">
                                                          <option selected>Open this select menu</option>
                                                          <option value="1">One</option>
                                                          <option value="2">Two</option>
                                                          <option value="3">Three</option>
                                                        </select>
                                                        <select class="form-select" aria-label="Default select example">
                                                          <option selected>Open this select menu</option>
                                                          <option value="1">One</option>
                                                          <option value="2">Two</option>
                                                          <option value="3">Three</option>
                                                        </select>
                            						</div>
                            					</div>
                            				</div>
                            				<div class="col-lg-3 col-md-3 col-sm-6 col-6 col-md-offset-3">
                            					<div class="position-relative">
                            						<div class="position-relative">
                            						    <img class="img-fluid" src="{{ asset('public/uploads/listings/blank_car.png') }}" alt="image">
                            						</div>
                            						<div class="b-compare-price p-0 mt-1">
                            						    <select class="form-select mb-1" aria-label="Default select example">
                                                          <option selected>Open this select menu</option>
                                                          <option value="1">One</option>
                                                          <option value="2">Two</option>
                                                          <option value="3">Three</option>
                                                        </select>
                                                        <select class="form-select mb-1" aria-label="Default select example">
                                                          <option selected>Open this select menu</option>
                                                          <option value="1">One</option>
                                                          <option value="2">Two</option>
                                                          <option value="3">Three</option>
                                                        </select>
                                                        <select class="form-select" aria-label="Default select example">
                                                          <option selected>Open this select menu</option>
                                                          <option value="1">One</option>
                                                          <option value="2">Two</option>
                                                          <option value="3">Three</option>
                                                        </select>
                            						</div>
                            					</div>
                            				</div>
                            			</div>
                            		</div> 
                                @endforelse
                            </div>
                            <div class="w-100"><a href="{{ route('compare-cars') }}" class="btn">View Detail Compare</a></div>
                          </div>
                        </div>
                      </li>-->
                    </ul>
                    <!---->
                    <ul id="nav" class="d-flex align-items-center m-0">
                        <li class="level0 parent"><a class="level-top freeAdd" style="" href="{{ route('webadpost') }}"><span style="line-height:35px">Post a Free Ad</span></a></li>
                        @if(Auth::check())
                            <li class="ms-3"><a href="{{ route('fav-listing') }}" class="whishlistCount">
                                <span class="counter favcounter">{{ Auth::user()->favlistingCount() }}</span>
                                <img class="img-fluid" src="{{ asset('public/front/images/heart-svgrepo-com.svg') }}" alt="icon"/></a>
                            </li>
                        @else
                            <li class="ms-3"><a href="#!" class="whishlistCount">
                                <span class="counter">0</span>
                                <img class="img-fluid" src="{{ asset('public/front/images/heart-svgrepo-com.svg') }}" alt="icon"/></a>
                            </li>                        
                        @endif
                        <!---->
                        @if(Auth::check())
                            @if(request()->path() == 'parts')
                            <div class="fl-cart-contain">
                                @php $totalcart = 0; $item=0; @endphp
                                @foreach((array) session('cart') as $id => $details)
                                    @php 
                                        $totalcart += $details['price'] * $details['quantity'];
                                        $item++;
                                    @endphp
                                @endforeach  
                              <div class="mini-cart">
                                <div class="basket"> <a href="shopping-cart.html"><span> {{ $item }} </span></a> </div>
                                <div class="fl-mini-cart-content" style="display: none;">
                                  <div class="block-subtitle">
                                    <div class="top-subtotal">{{ $item }} items, <span class="price">R{{ $totalcart }}</span> </div>
                                    <!--top-subtotal--> 
                                    <!--pull-right--> 
                                  </div>
                                  <!--block-subtitle-->
                                  @if(session('cart'))
                                  <ul class="mini-products-list" id="cart-sidebar">
                                    @php $total = 0 @endphp
                                    @if(session('cart'))
                                        @forelse(session('cart') as $id => $details)
                                            @php $total += $details['price'] * $details['quantity'] @endphp                                      
                                            <li class="item first">
                                              <div class="item-inner">
                                                  <a class="product-image" title="{{ $details['name'] }}" href="#!">
                                                    <img alt="{{ $details['name'] }}" src="{{ asset('public/uploads/parts/'.$details['image'] )}}">
                                                   </a>
                                                <div class="product-details">
                                                  <div class="access" data-id="{{ $id }}"><a class="btn-remove1 remove-from-cart" title="Remove This Item" href="#!">Remove</a> </div>
                                                  <!--access--> 
                                                  <strong>{{ $details['quantity'] }}</strong> x <span class="price">R{{ $details['price'] }}</span>
                                                  <p class="product-name"><a href="accessories-detail.html">{{ $details['name'] }}</a></p>
                                                </div>
                                              </div>
                                            </li>
                                        @endforeach
                                    @endif
                                  </ul>
                                  <div class="actions">
                                    <a href="{{ route('checkOut') }}" class="btn-checkout" title="Checkout" type="button" onClick="window.location=checkout.html"><span>Checkout</span></a>
                                  </div>
                                  @else
                                    <p class="mt-3 mb-0"><img class="img-fluid" width="90" src="{{ asset('public/front/images/shopping-cart-.png') }}" alt="icon"/></p>
                                    <p class="w-100 text-uppercase">Your cart is empty</p>
                                  @endif
                                  <!--actions--> 
                                </div>
                                <!--fl-mini-cart-content--> 
                              </div>
                            </div>
                            @endif                        
                            <button class="btn loginFull level-top ms-3" type="button" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false">
                                <span class="d-flex align-items-center">
                                    <img class="img-fluid" src="{{ asset('public/front/images/iconProfile.png') }}" alt="icon"/>
                                    <img class="img-fluid _874da736 _419576f3" src="{{ asset('public/front/images/iconArrowDown_.svg') }}" alt="icon"/>
                                </span>
                            </button>
                            <ul class="dropdown-menu">
                                <div class="card-header">
                                    <div class="_Photouser"><img class="img-fluid" src="{{ asset('public/front/images/iconProfile.png') }}" alt="icon"/></div>
                                    <div class="ms-3 w-100">
                                        <small>Hello</small>
                                        <h6 class="mb-0">{{ auth()->user()->fname }}</h6>
                                        <a href="{{ route('my-profile') }}" class="_Font text-decoration-underline">View and edit your profile</a>
                                    </div>
                                </div>
                                <li class="nav-item"><a class="dropdown-item" href="{{ route('my-profile') }}"><img class="img-fluid me-2" src="{{ asset('public/front/images/iconMyAds_.svg') }}" alt="icon"/> Profile</a></li>
                                <li class="nav-item"><a class="dropdown-item" href="{{ route('my-ads') }}"> <img class="img-fluid me-2" src="{{ asset('public/front/images/iconMyAds_.svg') }}" alt="icon"/> My Ads</a></li>
                                <li class="nav-item"><a class="dropdown-item" href="{{ route('weblogout') }}"><img class="img-fluid me-2" src="{{ asset('public/front/images/iconLogout_.svg') }}" alt="icon"/> Logout</a></li>
                            </ul>
                        @else
                            @if(request()->path() == 'parts')
                            <div class="fl-cart-contain">
                                @php $totalcart = 0; $item=0; @endphp
                                @foreach((array) session('cart') as $id => $details)
                                    @php 
                                        $totalcart += $details['price'] * $details['quantity'];
                                        $item++;
                                    @endphp
                                @endforeach  
                              <div class="mini-cart">
                                <div class="basket"> <a href="shopping-cart.html"><span> {{ $item }} </span></a> </div>
                                <div class="fl-mini-cart-content" style="display: none;">
                                  <div class="block-subtitle">
                                    <div class="top-subtotal">{{ $item }} items, <span class="price">R{{ $totalcart }}</span> </div>
                                    <!--top-subtotal--> 
                                    <!--pull-right--> 
                                  </div>
                                  <!--block-subtitle-->
                                  @if(session('cart'))
                                  <ul class="mini-products-list" id="cart-sidebar">
                                    @php $total = 0 @endphp
                                    @if(session('cart'))
                                        @forelse(session('cart') as $id => $details)
                                            @php $total += $details['price'] * $details['quantity'] @endphp                                      
                                            <li class="item first">
                                              <div class="item-inner">
                                                  <a class="product-image" title="{{ $details['name'] }}" href="#!">
                                                    <img alt="{{ $details['name'] }}" src="{{ asset('public/uploads/parts/'.$details['image'] )}}">
                                                   </a>
                                                <div class="product-details">
                                                  <div class="access" data-id="{{ $id }}"><a class="btn-remove1 remove-from-cart" title="Remove This Item" href="#!">Remove</a> </div>
                                                  <!--access--> 
                                                  <strong>{{ $details['quantity'] }}</strong> x <span class="price">R{{ $details['price'] }}</span>
                                                  <p class="product-name"><a href="accessories-detail.html">{{ $details['name'] }}</a></p>
                                                </div>
                                              </div>
                                            </li>
                                        @endforeach
                                    @endif
                                  </ul>
                                  <div class="actions">
                                    <a href="{{ route('checkOut') }}" class="btn-checkout" title="Checkout" type="button" onClick="window.location=checkout.html"><span>Checkout</span></a>
                                  </div>
                                  @else
                                    <p class="mt-3 mb-0"><img class="img-fluid" width="90" src="{{ asset('public/front/images/shopping-cart-.png') }}" alt="icon"/></p>
                                    <p class="w-100 text-uppercase">Your cart is empty</p>
                                  @endif
                                  <!--actions--> 
                                </div>
                                <!--fl-mini-cart-content--> 
                              </div>
                            </div>
                            @endif
                            <!---->
                            <li class="level0 parent">
                                <a href="{{ route('webLogin') }}" class="level-top loginRopp"  title="Login"><span class="ms-3 ps-0 pe-0">Login</span></a>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!---->
    <div class="container d-md-none d-block">
      <div class="row">
        <div id="header" class="p-0 px-lg-3" style="height:67px;">
          <div class="header-container h-100">
            <div class="header__nav h-100">
              
              <div class="h-100 fl-header-right d-flex align-items-center justify-content-between m-0 px-3">
                <!---->
                <div class="mm-toggle-wrap w-auto p-0">
                    <div class="mm-toggle p-0 d-flex align-items-center"><i class="fa fa-bars"></i><span class="mm-label">Menu</span> </div>
                </div>
                <ul id="nav" class="d-flex align-items-center m-0">
                    <!---->
                    <li class="level0 parent"><a class="level-top freeAdd" style="" href="{{ route('webadpost') }}"><span style="line-height:35px">Post a Free Ad</span></a></li>
                    <!---->
                    @if(Auth::check())
                        <button class="btn loginFull level-top ms-3" type="button" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false">
                            <span class="d-flex align-items-center">
                                <img class="img-fluid" src="{{ asset('public/front/images/iconProfile.png') }}" alt="icon"/>
                                <!--<img class="img-fluid _874da736 _419576f3" src="{{ asset('public/front/images/iconArrowDown_.svg') }}" alt="icon"/>-->
                            </span>
                        </button>
                        <ul class="dropdown-menu">
                            <div class="card-header">
                                <div class="_Photouser"><img class="img-fluid" src="{{ asset('public/front/images/iconProfile.png') }}" alt="icon"/></div>
                                <div class="ms-3 w-100">
                                    <small>Hello</small>
                                    <h6 class="mb-0">User Name</h6>
                                    <a href="{{ route('my-profile') }}" class="_Font text-decoration-underline">View and edit your profile</a>
                                </div>
                            </div>
                            <li class="nav-item"><a class="dropdown-item" href="{{ route('my-profile') }}"><img class="img-fluid me-2" src="{{ asset('public/front/images/iconMyAds_.svg') }}" alt="icon"/> Profile</a></li>
                            <li class="nav-item"><a class="dropdown-item" href="{{ route('my-ads') }}"> <img class="img-fluid me-2" src="{{ asset('public/front/images/iconMyAds_.svg') }}" alt="icon"/> My Ads</a></li>
                            <li class="nav-item"><a class="dropdown-item" href="{{ route('weblogout') }}"><img class="img-fluid me-2" src="{{ asset('public/front/images/iconLogout_.svg') }}" alt="icon"/> Logout</a></li>
                        </ul>
                    @else
                    <li class="level0 parent ps-3 pe-0">
                        <a href="{{ route('webLogin') }}" class="level-top"  title="My Account"><span class="p-0">Login</span></a>
                    </li>
                    @endif
                </ul>
                <!--<div class="fl-links">-->
                <!--    <button class="clicker-fliter" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasTop" aria-controls="offcanvasTop"><img class="img-fluid" width="25" alt="" src="{{ asset('public/front/images/bodytypecar.svg') }}"></button>-->
                <!--</div>-->
              </div>
              <div class="fl-nav-menu">
                <nav>
                  <div class="nav-inner"> 
                    <!-- BEGIN NAV -->
                    <ul id="nav" class="d-md-flex align-items-center d-none">
                      <li class="active"> <a class="level-top" href="{{ route('homepage') }}"><span>Home</span></a></li>
                      <li class="level0 parent drop-menu"> <a class="level-top" href="{{ route('car-specials') }}"><span>For Sale</span></a>
                        <ul class="level1">
                            @foreach(system_categories_data() as $cat)
                                <li class="level1 @if($loop->iteration == 1)first @endif nav-10-3"><a href="{{ URL::to('listing?category='.$cat->id) }}"><span>{{ $cat->name }} For Sale</span></a></li>
                            @endforeach
                        </ul>
                      </li>
                      <li class="level0 parent drop-menu"> <a class="level-top" href="{{ route('car-specials') }}"><span>{{ request()->path() }}</span></a>
                        <ul class="level1">
                            @foreach(system_categories_data() as $cat)
                                <li class="level1 @if($loop->iteration == 1)first @endif nav-10-3"><a href="{{ URL::to('listing?category='.$cat->id) }}"><span>{{ $cat->name }} For Sale</span></a></li>
                            @endforeach
                        </ul>
                      </li>
                      <li class="level0 parent drop-menu"> <a class="level-top" href="{{route('new-cars')}}"><span>New Car guide</span></a></li>
                      <li class="level0 parent drop-menu"> <a class="level-top" href="{{ route('parts') }}"><span>Parts</span></a></li>
                      <li class="active"> <a class="level-top" href="{{ route('dealerships') }}"><span>Dealerships</span></a></li>
                      <!--<li class="fl-custom-tabmenulink mega-menu"> <a href="#" class="level-top"> <span>Compare Cars</span> </a>
                        <div class="level0-wrapper fl-custom-tabmenu" style="left: 0px; display: none;">
                          <div class="container">
                            <div class="header-nav-dropdown-wrapper cleare p-3">
                                @php
                                    $compare_car_data = compare_car_data();
                                @endphp
                                @forelse($compare_car_data as $compare)
                                   
                                  <div class="grid12-3 position-relative">
                                    <div><img src="{{ asset('public/uploads/listings/'.$compare->feature_image) }}" alt="custom-image"></div>
                                    <h4 class="heading">{{ $compare->title }}</h4>
                                    <a href="{{ route('compare-car-destroy',$compare->id) }}" class="btn btn_delete"></a>
                                  </div>
                                @empty
                                    <div class="alert alert-primary m-0" role="alert">Noting In Compare</div>
                                    <div class="b-compare-images p-0 m-0 border-0 shadow-none">
                            			<div class="row justify-content-end">
                            				<div class="col-lg-3 col-md-3 col-sm-6 col-6 col-md-offset-3">
                            			        <div class="position-relative">
                            						<div class="position-relative">
                            						    <img class="img-fluid" src="{{ asset('public/uploads/listings/blank_car.png') }}" alt="image">
                            						</div>
                            						<div class="b-compare-price p-0 mt-1">
                            						    <select class="form-select mb-1" aria-label="Default select example">
                                                          <option selected>Open this select menu</option>
                                                          <option value="1">One</option>
                                                          <option value="2">Two</option>
                                                          <option value="3">Three</option>
                                                        </select>
                                                        <select class="form-select mb-1" aria-label="Default select example">
                                                          <option selected>Open this select menu</option>
                                                          <option value="1">One</option>
                                                          <option value="2">Two</option>
                                                          <option value="3">Three</option>
                                                        </select>
                                                        <select class="form-select" aria-label="Default select example">
                                                          <option selected>Open this select menu</option>
                                                          <option value="1">One</option>
                                                          <option value="2">Two</option>
                                                          <option value="3">Three</option>
                                                        </select>
                            						</div>
                            					</div>
                            				</div>
                            				<div class="col-lg-3 col-md-3 col-sm-6 col-6 col-md-offset-3">
                            					<div class="position-relative">
                            						<div class="position-relative">
                            						    <img class="img-fluid" src="{{ asset('public/uploads/listings/blank_car.png') }}" alt="image">
                            						</div>
                            						<div class="b-compare-price p-0 mt-1">
                            						    <select class="form-select mb-1" aria-label="Default select example">
                                                          <option selected>Open this select menu</option>
                                                          <option value="1">One</option>
                                                          <option value="2">Two</option>
                                                          <option value="3">Three</option>
                                                        </select>
                                                        <select class="form-select mb-1" aria-label="Default select example">
                                                          <option selected>Open this select menu</option>
                                                          <option value="1">One</option>
                                                          <option value="2">Two</option>
                                                          <option value="3">Three</option>
                                                        </select>
                                                        <select class="form-select" aria-label="Default select example">
                                                          <option selected>Open this select menu</option>
                                                          <option value="1">One</option>
                                                          <option value="2">Two</option>
                                                          <option value="3">Three</option>
                                                        </select>
                            						</div>
                            					</div>
                            				</div>
                            				<div class="col-lg-3 col-md-3 col-sm-6 col-6 col-md-offset-3">
                            					<div class="position-relative">
                            						<div class="position-relative">
                            						    <img class="img-fluid" src="{{ asset('public/uploads/listings/blank_car.png') }}" alt="image">
                            						</div>
                            						<div class="b-compare-price p-0 mt-1">
                            						    <select class="form-select mb-1" aria-label="Default select example">
                                                          <option selected>Open this select menu</option>
                                                          <option value="1">One</option>
                                                          <option value="2">Two</option>
                                                          <option value="3">Three</option>
                                                        </select>
                                                        <select class="form-select mb-1" aria-label="Default select example">
                                                          <option selected>Open this select menu</option>
                                                          <option value="1">One</option>
                                                          <option value="2">Two</option>
                                                          <option value="3">Three</option>
                                                        </select>
                                                        <select class="form-select" aria-label="Default select example">
                                                          <option selected>Open this select menu</option>
                                                          <option value="1">One</option>
                                                          <option value="2">Two</option>
                                                          <option value="3">Three</option>
                                                        </select>
                            						</div>
                            					</div>
                            				</div>
                            			</div>
                            		</div> 
                                @endforelse
                            </div>
                            <div class="w-100"><a href="{{ route('compare-cars') }}" class="btn">View Detail Compare</a></div>
                          </div>
                        </div>
                      </li>-->
                      <li class="level0 parent"><a class="level-top freeAdd" style="" href="{{ route('webadpost') }}"><span style="line-height:35px">Post a Free Ad</span></a></li>
                    </ul>
                    <!--nav--> 
                  </div>
                </nav>
              </div>
            </div>
            
            <!--row--> 
            
          </div>
        </div>
      </div>
    </div>
  </header>
  <!--Filter cars-->
  <div class="offcanvas offcanvas-top h-100 offcanvas_car" tabindex="-1" id="offcanvasTop" aria-labelledby="offcanvasTopLabel">
        <div class="offcanvas-header justify-content-center">
            <h5 class="offcanvas-title" id="offcanvasTopLabel">Cars For Sale</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="col-xxl-10 col-xl-10 col-lg-11 col-11 mx-auto">
            <div class="row mb-4">
                <div class="col">
                  <div class="row align-items-center text-center">
                      @foreach(bodytypehelper() as $type)
                      <div class="col-lg-2 col-sm-3 col-6">
                        <div class="mb-4">
                            <label name="{{ $type->name }}" class="form-check form_filter_check mb-2" for="exampleRadios1">
                                <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" checked>
                                <span class="form-check-img ms-3"><img class="img-fluid" src="{{ asset('public/front/images/Sedan.jpg') }}" alt="undefined"></span>
                            </label>
                            <span class="title" for="exampleRadios1">{{ $type->name }} <small>(0)</small></span>
                        </div>
                     </div>
                     @endforeach
                  </div>
                </div>
            </div>
            <!---->
            <div class="row">
                <div class="col-md-2 col-6 mb-3 mb-md-0">
                    <select class="form-select w-100" aria-label="Default select example">
                      <option selected>Open this select menu</option>
                      <option value="1">One</option>
                      <option value="2">Two</option>
                      <option value="3">Three</option>
                    </select>
                </div>
                <div class="col-md-2 col-6 mb-3 mb-md-0">
                    <select class="form-select w-100" aria-label="Default select example">
                      <option selected>Open this select menu</option>
                      <option value="1">One</option>
                      <option value="2">Two</option>
                      <option value="3">Three</option>
                    </select>
                </div>
                <div class="col-md-2 col-6 mb-3 mb-md-0">
                    <select class="form-select w-100" aria-label="Default select example">
                      <option selected>Open this select menu</option>
                      <option value="1">One</option>
                      <option value="2">Two</option>
                      <option value="3">Three</option>
                    </select>
                </div>
                <div class="col-md-2 col-6 mb-3 mb-md-0">
                    <select class="form-select w-100" aria-label="Default select example">
                      <option selected>Open this select menu</option>
                      <option value="1">One</option>
                      <option value="2">Two</option>
                      <option value="3">Three</option>
                    </select>
                </div>
                <div class="col-md-2 col-6 mb-3 mb-md-0">
                    <select class="form-select w-100" aria-label="Default select example">
                      <option selected>Open this select menu</option>
                      <option value="1">One</option>
                      <option value="2">Two</option>
                      <option value="3">Three</option>
                    </select>
                </div>
                <div class="col-md-2 col-6 mb-3 mb-md-0">
                    <select class="form-select w-100" aria-label="Default select example">
                      <option selected>Open this select menu</option>
                      <option value="1">One</option>
                      <option value="2">Two</option>
                      <option value="3">Three</option>
                    </select>
                </div>
            </div>
        </div>
    </div>