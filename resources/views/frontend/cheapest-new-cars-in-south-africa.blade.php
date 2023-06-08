@extends('layouts/frontapp')
@section('content')
<div class="page-heading">
  <div class="breadcrumbs">
    <div class="container">
      <div class="row">
        <div class="col-xs-12">
          <ul>
            <li class="home">
              <a href="{{ route('homepage') }}" title="Go to Home Page">Home</a>
              <span>&rsaquo; </span>
            </li>
            <li class="category1601">
              <strong>Cheapest New Cars</strong>
            </li>
          </ul>
        </div>
        <!--col-xs-12-->
      </div>
      <!--row-->
    </div>
    <!--container-->
  </div>
  <div class="page-title">
    <h2>Cheapest New Cars</h2>
  </div>
</div>
<!---->
<section class="main-container col2-left-layout top-cate bounceInUp animated">
    <div class="col-xl-9 col-lg-10 col-11 mx-auto">
        <div class="new_title d-md-flex align-items-center mb-3">
          <h2>Cheap new cars for sale </h2>
          <div class="ms-auto mt-2 mt-md-0">
              <div class="input-group m-0">
                  <select class="form-select" aria-label="Default select example">
                    <option selected>All Body Type</option>
                    <option value="1">One</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
                  </select>
                  <!---->
                  <select class="form-select" aria-label="Default select example">
                    <option selected>All Modals</option>
                    <option value="1">One</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
                  </select>
              </div>
          </div>
        </div>
        <!---->
        <div class="row">
            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12 mb-4">
                <div class="card shadow-lg border-0">
                    <div class="card-header d-flex align-items-center">
                        <div class="me-3 brand_photo"><img class="img-fluid" src="https://www.cardealer.co.za/models/BAIC/logo.png" alt=""/></div>
                        <h4>Brand Name</h4>
                    </div>
                    <div class="card-body text-center">
                        <div class="overflow-hidden mb-4" style="border-radius:15px;"><a href="#"><img class="img-fluid" src="https://cars.alliftech.com/public/front/images/speakers.png" alt=""/></a></div>
                        <div class="d-md-flex align-items-center">
                            <a href="#" class=""><h5 class="m-0">BAIC X25</h5></a>
                            <p class="m-0 ms-auto">Price starts <strong>R219,990</strong></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12 mb-4">
                <div class="card shadow-lg border-0">
                    <div class="card-header d-flex align-items-center">
                        <div class="me-3 brand_photo"><img class="img-fluid" src="https://www.cardealer.co.za/models/Fiat/logo.png" alt=""/></div>
                        <h4>Brand Name</h4>
                    </div>
                    <div class="card-body text-center">
                        <div class="overflow-hidden mb-4" style="border-radius:15px;"><a href="#"><img class="img-fluid" src="https://cars.alliftech.com/public/front/images/speakers.png" alt=""/></a></div>
                        <div class="d-md-flex align-items-center">
                            <a href="#" class=""><h5 class="m-0">BAIC X25</h5></a>
                            <p class="m-0 ms-auto">Price starts <strong>R219,990</strong></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
  
@endsection