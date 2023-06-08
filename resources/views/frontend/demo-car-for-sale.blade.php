@extends('layouts/frontapp')
@section('content')
<div class="page-heading">
  <div class="breadcrumbs">
    <div class="container">
      <div class="row">
        <div class="col-xs-12">
          <ul>
            <li class="home"> <a href="{{ route('homepage') }}" title="Go to Home Page">Home</a> <span>&rsaquo; </span> </li>
            <li class="category1601"> <strong>Demo Car For Sale</strong> </li>
          </ul>
        </div>
        <!--col-xs-12--> 
      </div>
      <!--row--> 
    </div>
    <!--container--> 
  </div>
  <div class="page-title">
    <h2>Demo Car For Sale</h2>
  </div>
</div>
<!---->
<div class="col2-right-layout">
    <div class="main col-xl-9 col-lg-10 col-11 mx-auto mb-4">
        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="true">
          <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
          </div>
          <div class="carousel-inner">
            <div class="carousel-item active">
              <img src="https://cars.alliftech.com/public/front/images/slide-img4.jpg" class="d-block w-100" alt="banner1">
            </div>
            <div class="carousel-item">
              <img src="https://cars.alliftech.com/public/front/images/slide-img5.jpg" class="d-block w-100" alt="banner2">
            </div>
            <div class="carousel-item">
              <img src="https://cars.alliftech.com/public/front/images/slide-img3.jpg" class="d-block w-100" alt="banner3">
            </div>
          </div>
          <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
          </button>
        </div>
    </div>
</div>
<!---->
<div class="new_dynamic">
    <div class="col-xl-9 col-lg-10 col-11 mx-auto mb-4">
        <form>
            <div class="card card-body">
            <div class="d-lg-flex align-items-center">
                <h4 class="title_row mb-3 mb-lg-0">Demo Cars for Sale in South Africa</h4>
                <div class="filter_row ms-auto">
                    <div class="input-group m-0 align-items-center">
                        <label for="" class="me-3 m-0 form-label">Sort by:</label>
                        <!---->
                        <div class="btn-group me-2">
                          <button class="btn_new dropdown-toggle" type="button" data-bs-toggle="dropdown" data-bs-auto-close="false" aria-expanded="false">Latest updates</button>
                          <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Latest updates </a></li>
                            <li><a class="dropdown-item" href="#">Price (low to high) </a></li>
                            <li><a class="dropdown-item" href="#">Price (high to low) </a></li>
                            <li><a class="dropdown-item" href="#">Mileage (low to high) </a></li>
                            <li><a class="dropdown-item" href="#">Mileage (high to low) </a></li>
                            <li><a class="dropdown-item" href="#">Year (low to high) </a></li>
                            <li><a class="dropdown-item" href="#">Year (high to low) </a></li>
                            <li><a class="dropdown-item" href="#">Manufacturer (A-Z) </a></li>
                            <li><a class="dropdown-item" href="#">Manufacturer (Z-A) </a></li>
                          </ul>
                        </div>
                        <!---->
                        <div class="btn-group me-2">
                          <button class="btn_new dropdown-toggle" type="button" data-bs-toggle="dropdown" data-bs-auto-close="false" aria-expanded="false">Manufacturer</button>
                          <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#"><div class="brand_logo" style="background-image: url('')"></div> All Makes</a></li>
                            <li><a class="dropdown-item" href="#"><div class="brand_logo" style="background-image: url('https://cars.alliftech.com/public/front/images/Nissan.png')"></div> Nissan</a></li>
                            <li><a class="dropdown-item" href="#"><div class="brand_logo" style="background-image: url('https://cars.alliftech.com/public/front/images/Renault.png')"></div> Renault</a></li>
                          </ul>
                        </div>
                        <!---->
                        <div class="btn-group">
                          <button class="btn_new dropdown-toggle" type="button" data-bs-toggle="dropdown" data-bs-auto-close="false" aria-expanded="false">Body Type</button>
                          <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#"> All Types </a></li>
                            <li><a class="dropdown-item" href="#"> Hatchback </a></li>
                            <li><a class="dropdown-item" href="#"> MPV </a></li>
                            <li><a class="dropdown-item" href="#"> SUV </a></li>
                          </ul>
                        </div>
                        <!---->
                    </div>
                </div>
            </div>
        </div>
        </form>
    </div>
    <!---->
    <div class="col-xl-9 col-lg-10 col-11 mx-auto mb-4">
        <div class="card card_listing mb-4">
            <a href="javascript:void(0)" class="fav js-add-slide " data-id="2147446"><img src="https://cars.alliftech.com/public/front/images/tag-heart.svg" alt="icon" class="swing"></a>
            <div class="card-header">
                <div class="row align-items-center">
                    <div class="col-xxl-10 col-xl-9 col-lg-9 col-md-12 mb-3 mb-lg-0">
                        <a href="#" class="d-flex align-items-center img_title">
                            <img class="img-thumbnail" src="https://cars.alliftech.com/public/front/images/Renault.png" alt="icon"/>
                            <h6 class="mb-0 ms-3">Title</h6>
                            <div class="ms-3 alert p-2 m-0 alert-danger" role="alert">Demo Vehicle</div>
                        </a>
                    </div>
                    <div class="col-xxl-2 col-xl-3 col-lg-3 col-md-12 text-start text-lg-center">
                        <a href="#" class="btn">View this Special</a>
                    </div>
                </div>
            </div>
            <!---->
            <div class="card-body">
                <div class="row">
                    <div class="col-xxl-3 col-xl-3 col-lg-4 col-md-5 col-sm-6 mx-auto mb-3 mb-xl-0">
                        <div class="car-image position-relative new_cars-ribbon">
                            <a href="#" class=""><img class="img-fluid" src="https://www.cardealer.co.za/upload/5955/thumbs/6184417_1_big.jpg" alt="icon"/></a>
                        </div>
                    </div>
                    <div class="col-xxl-6 col-xl-6 col-lg-8 col-md-7 col-sm-12 mb-3 mb-xl-0">
                        <div class="car-specs">
                            <div class="flex-center-y wrap">
                                <div class="search-price"><span>R219,999</span></div>
                            </div>
                            <!---->
                            <div class="row flex-row">
                                <div class="col-6">
                                    <a href="#">
                                        <ul class="list-unstyled search_list">
                                            <li>
                                                <i class="specs-icon" style="background-image: url('https://cars.alliftech.com/public/front/images/Year.png')"></i>
                                                <span class="value">2023</span> -
                                                <span class="red-text">NEW DEAL</span>
                                            </li>
                                            <li>
                                                <i class="specs-icon" style="background-image: url('https://cars.alliftech.com/public/front/images/body-type.png')"></i>
                                                <span class="hidden-xs">Body Type:</span> <span class="value">Crossover</span>
                                            </li>
                                            <li>
                                                <i class="specs-icon" style="background-image: url('https://cars.alliftech.com/public/front/images/type-of-fuel.png')"></i>
                                                <span class="hidden-xs">Type of Fuel:</span> <span class="value">Petrol</span>
                                            </li>
                                            <li>
                                                <i class="specs-icon" style="background-image: url('https://cars.alliftech.com/public/front/images/transmission.png')"></i>
                                                <span class="hidden-xs">Transmission:</span> <span class="value">Manual</span>
                                            </li>
                                        </ul>
                                    </a>
                                </div>
                                <!---->
                                <div class="col-6">
                                    <a href="#">
                                        <ul class="list-unstyled search_list">
                                            <li><i class="specs-icon" style="background-image: url('https://cars.alliftech.com/public/front/images/traction-of-vehicle.png')"></i><span class="hidden-xs">Traction of Vehicle:</span> <span class="value">Front-wheel drive</span></li>
                                            <li><i class="specs-icon" style="background-image: url('https://cars.alliftech.com/public/front/images/doors.png')"></i><span class="value">5 Doors</span> </li>
                                            <li><i class="specs-icon" style="background-image: url('https://cars.alliftech.com/public/front/images/engine-capacity.png')"></i><span class="hidden-xs">Engine Capacity (cm3):</span> <span class="value">1.0</span> </li>
                                            <li><i class="specs-icon" style="background-image: url('https://cars.alliftech.com/public/front/images/colour.png')"></i><span class="hidden-xs">Colour:</span> <span class="value">Blue</span> </li>
                                        </ul>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xxl-3 col-xl-3 col-lg-12 col-md-12">
                        <div class="car-specials-preview row">
                            <a href="#" class="col-xs-4 col-sm-4 col-md-6 px-1"><img class="img-thumbnail" src="https://www.cardealer.co.za/upload/5955/thumbs/6184417_1_big.jpg" alt="icon"/></a>
                            <a href="#" class="col-xs-4 col-sm-4 col-md-6 px-1"><img class="img-thumbnail" src="https://www.cardealer.co.za/upload/5955/thumbs/6184417_1_big.jpg" alt="icon"/></a>
                            <a href="#" class="col-xs-4 col-sm-4 col-md-6 px-1"><img class="img-thumbnail" src="https://www.cardealer.co.za/upload/5955/thumbs/6184417_1_big.jpg" alt="icon"/></a>
                        </div>
                    </div>
                </div>
            </div>
            <!---->
        </div>
    </div>
</div>
          
          
@endsection