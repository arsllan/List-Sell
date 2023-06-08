@extends('layouts/frontapp')
@section('content')
<div class="page-heading">
  <div class="breadcrumbs">
    <div class="container">
      <div class="row">
        <div class="col-xs-12">
          <ul>
            <li class="home"> <a href="{{ URL::to('/') }}" title="Go to Home Page">Home</a> <span>&rsaquo; </span> </li>
            <li class="category1601"> <strong>Parts</strong> </li>
          </ul>
        </div>
        <!--col-xs-12--> 
      </div>
      <!--row--> 
    </div>
    <!--container--> 
  </div>
  <div class="page-title">
    <h2>Parts</h2>
  </div>
</div>
<!--breadcrumbs--> 
<!-- BEGIN Main Container col2-left -->
<section class="main-container col2-left-layout bounceInUp animated">
  <div class="col-xxl-10 col-xl-10 col-lg-11 col-11 mx-auto">
      <div class="row">
        <div class="col-main col-sm-9 col-sm-push-3 product-grid">
          <div class="pro-coloumn">
            <article class="col-main m-0">
              <div class="category-products" style="background-color:#fff;">
                    <div class="row">
                        @forelse($products as $product)
                            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 col-xl-3 mb-3">
                                <div class="thumbnail">
                                    <div class="thumbnailImage mb-3">
                                        <img class="img-fluid w-100 d-block h-100" src="{{ asset('public/uploads/parts/'.$product->image) }}" alt="">
                                        <!--<div class="d-inline-flex align-items-center thumbnailRop">-->
                                        <!--    <a href="{{ route('add.to.cart', $product->id) }}" class="thumbnailBtn" role="button"><img class="img-fluid" src="{{ asset('public/front/images/addtocart.svg')}}" alt="icon"/></a>-->
                                        <!--</div>-->
                                    </div>
                                    <div class="caption text-center">
                                        <h4 class="title">{{ $product->name }}</h4>
                                        <p class="m-2">{{ $product->description }}</p>
                                        <p class="priceeeeee"><!--<strong>Price: </strong>--> R{{ $product->price }}</p>
                                        <a href="{{ route('add.to.cart', $product->id) }}" class="btn" role="button">Add To Cart</a>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="alert alert-secondary">
                                No Part Found.
                            </div>
                        @endforelse
                    </div>
              </div>
              
              <div class="toolbar bottom" style="justify-content: center;">
                <div class="pager">
                    @if ($products->links()->paginator->hasPages())
                      <div class="pages">
                        <ul class="pagination">
                            {{ $products->links() }}
                        </ul>
                      </div>
                    @endif
                </div>
              </div>
            </article>
          </div>
          <!--	///*///======    End article  ========= //*/// -->
        </div>
        <aside class="col-left sidebar col-sm-3 col-xs-12 col-sm-pull-9 wow bounceInUp animated">
            <div class="section-filter">
              <div class="b-filter__inner bg-grey">
                <h2><span>SHOP BY</span></h2>
                <form class="b-filter">
                  <select class="form-select mb-3" name="brand" id="brand" onchange="brandChangedTrigger()">
                    <option value="">Select Brand</option>
                    @foreach(brands() as $brand)
                        <option value="{{ $brand->slug }}" @if(request()->brand == $brand->slug) selected @endif>{{ $brand->name }}</option>
                    @endforeach
                  </select>
                  <select class="form-select mb-3" name="model" id="model" onchange="modelChangedTrigger()">
                    <option value="">Select Model</option>
                    @foreach($models as $model)
                        <option value="{{ $model->id }}" @if(request()->model == $model->id) selected @endif>{{ $model->name }}</option>
                    @endforeach
                  </select>
                  <select class="form-select mb-3" name="manufacture" id="manufacture" onchange="manufactureChangedTrigger()">
                    <option value="">Select Manufacture</option>
                    @foreach($manufactures as $manu)
                        <option value="{{ $manu->manufacture }}" @if(request()->manufacture == $manu->manufacture) selected @endif>{{ $manu->manufacture }}</option>
                    @endforeach
                  </select>
                  <select class="form-select mb-3" id="start_price" onchange="startpriceChangedTrigger()">
                    <option value="">Price - from</option>
                      <option value="100" @if(request()->start_price == 100) selected @endif>R100</option>
                       <option value="200" @if(request()->start_price == 200) selected @endif>R200</option>
                       <option value="300" @if(request()->start_price == 300) selected @endif>R300</option>
                       <option value="500" @if(request()->start_price == 500) selected @endif>R500</option>
                       <option value="1000" @if(request()->start_price == 1000) selected @endif>R1000</option>
                       <option value="2000" @if(request()->start_price == 2000) selected @endif>R2000</option>
                       <option value="5000" @if(request()->start_price == 5000) selected @endif>R5000</option>
                       <option value="10000" @if(request()->start_price == 10000) selected @endif>R10000</option>
                       <option value="20000" @if(request()->start_price == 20000) selected @endif>R20000</option>
                       <option value="25000" @if(request()->start_price == 25000) selected @endif>R25000</option>
                       <option value="50000" @if(request()->start_price == 50000) selected @endif>R50000</option>
                  </select>
                  <select class="form-select mb-3" id="end_price" onchange="endpriceChangedTrigger()">
                    <option value="">Price - to</option>
                       <option value="200" @if(request()->end_price == 200) selected @endif>R200</option>
                       <option value="300" @if(request()->end_price == 300) selected @endif>R300</option>
                       <option value="500" @if(request()->end_price == 500) selected @endif>R500</option>
                       <option value="1000" @if(request()->end_price == 1000) selected @endif>R1000</option>
                       <option value="2000" @if(request()->end_price == 2000) selected @endif>R2000</option>
                       <option value="5000" @if(request()->end_price == 5000) selected @endif>R5000</option>
                       <option value="10000" @if(request()->end_price == 10000) selected @endif>R10000</option>
                       <option value="20000" @if(request()->end_price == 20000) selected @endif>R20000</option>
                       <option value="25000" @if(request()->end_price == 25000) selected @endif>R25000</option>
                       <option value="50000" @if(request()->end_price == 50000) selected @endif>R50000</option>
                  </select>
                  <div>
                  </div>
                </form>
              </div>
            </div>            
          <div class="block block-list block-cart">
            <div class="block-title"> My Cart </div>
                @php $totalcart = 0; $item=0; @endphp
                @foreach((array) session('cart') as $id => $details)
                    @php 
                        $totalcart += $details['price'] * $details['quantity'];
                        $item++;
                    @endphp
                @endforeach
            <div class="block-content">
              <div class="summary">
                <p class="amount">There is <a href="#">{{ $item }} item</a> in your cart. </p>
                <p class="subtotal">
                  <span class="label">Cart Subtotal:</span>
                  <span class="price">R{{ $totalcart }}</span>
                </p>
              </div>
              <div class="ajax-checkout">
                <button type="button" title="Checkout" class="button button-checkout" onClick="#">
                  <span>Checkout</span>
                </button>
              </div>
              <p class="block-subtitle">Recently added item(s)</p>
              <ul id="cart-sidebar" class="mini-products-list">
        @php $total = 0 @endphp
        @if(session('cart'))
            @foreach(session('cart') as $id => $details)
                @php $total += $details['price'] * $details['quantity'] @endphp
                <li class="item">
                  <div class="item-inner">
                    <a href="#!" class="product-image">
                      <img src="{{ asset('public/uploads/parts/'.$details['image'] )}}" width="80" alt="product">
                    </a>
                    <div class="product-details">
                      <div class="access" data-id="{{ $id }}">
                        <a href="#!" class="btn-remove1 remove-from-cart">Remove</a>
                      </div>
                      <!--access-->
                      <strong>{{ $details['quantity'] }}</strong> x <span class="price">R{{ $details['price'] }}</span>
                      <p class="product-name">
                        <a href="#!">{{ $details['name'] }}</a>
                      </p>
                    </div>
                    <!--product-details-bottoms-->
                  </div>
                </li>
            @endforeach
        @endif
              </ul>
            </div>
          </div>
          <div class="custom-slider">
              <div>
                <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="false">
                  <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
                  </div>
                  <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="item active"><img src="{{ asset('public/front/images/slide3.jpg')}}" alt="slide3">
                          <div class="carousel-caption">
                            <h3><a title=" Sample Product" href="{{ route('auto-detail',1)}}">50% OFF</a></h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                            <a class="link" href="#">Buy Now</a></div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="item"><img src="{{ asset('public/front/images/slide1.jpg')}}" alt="slide1">
                          <div class="carousel-caption">
                            <h3><a title=" Sample Product" href="{{ route('auto-detail',1)}}">Hot collection</a></h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                          </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="item"><img src="{{ asset('public/front/images/slide2.jpg')}}" alt="slide2">
                          <div class="carousel-caption">
                            <h3><a title=" Sample Product" href="{{ route('auto-detail',1)}}">Summer collection</a></h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                          </div>
                        </div>
                    </div>
                  </div>
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
          <!--block block-list block-compare-->
          <div class="hot-banner">
            <img src="{{ asset('public/front/images/hot-trends-banner.jpg')}}" alt="banner">
          </div>
        </aside>
        <!--col-right sidebar-->
      </div>
      <!--row-->
    </div>
  <!--container--> 
</section>
<!--main-container col2-left-layout--> 
<script>
    function brandChangedTrigger() {
        let queryString = window.location.search;  // get url parameters
        let params = new URLSearchParams(queryString);  // create url search params object
        params.delete('brand');  // delete city parameter if it exists, in case you change the dropdown more then once
        params.append('brand', document.getElementById("brand").value); // add selected city
        document.location.href = "?" + params.toString(); // refresh the page with new url
    }
    function modelChangedTrigger() {
        let queryString = window.location.search;  // get url parameters
        let params = new URLSearchParams(queryString);  // create url search params object
        params.delete('model');  // delete city parameter if it exists, in case you change the dropdown more then once
        params.append('model', document.getElementById("model").value); // add selected city
        document.location.href = "?" + params.toString(); // refresh the page with new url
    }
    function manufactureChangedTrigger() {
        let queryString = window.location.search;  // get url parameters
        let params = new URLSearchParams(queryString);  // create url search params object
        params.delete('manufacture');  // delete city parameter if it exists, in case you change the dropdown more then once
        params.append('manufacture', document.getElementById("manufacture").value); // add selected city
        document.location.href = "?" + params.toString(); // refresh the page with new url
    }
    function startpriceChangedTrigger() {
        let queryString = window.location.search;  // get url parameters
        let params = new URLSearchParams(queryString);  // create url search params object
        params.delete('start_price');  // delete city parameter if it exists, in case you change the dropdown more then once
        params.append('start_price', document.getElementById("start_price").value); // add selected city
        document.location.href = "?" + params.toString(); // refresh the page with new url
    }
    function endpriceChangedTrigger() {
        let queryString = window.location.search;  // get url parameters
        let params = new URLSearchParams(queryString);  // create url search params object
        params.delete('end_price');  // delete city parameter if it exists, in case you change the dropdown more then once
        params.append('end_price', document.getElementById("end_price").value); // add selected city
        document.location.href = "?" + params.toString(); // refresh the page with new url
    }
</script>
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