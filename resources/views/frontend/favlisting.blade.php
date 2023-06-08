@extends('layouts/frontapp')
@section('content')

<div class="page-heading">
  <div class="breadcrumbs">
    <div class="container">
      <div class="row">
        <div class="col-xs-12">
          <ul>
            <li class="home"> <a href="{{ URL::to('/') }}" title="Go to Home Page">Home</a> <span>&rsaquo; </span> </li>
            <li class="category1601"> <strong>Favorite listing</strong> </li>
          </ul>
        </div>
        <!--col-xs-12--> 
      </div>
      <!--row--> 
    </div>
    <!--container--> 
  </div>
  <div class="page-title">
    <h2>Favorite Listing</h2>
  </div>
</div>
<!--breadcrumbs--> 
<!-- BEGIN Main Container col2-left -->
<section class="main-container col2-left-layout bounceInUp animated py-5">
  <div class="container">
			@if(count($favlisting))
			<div class="right-area">
    			<div id="ajaxContent">
        			<div class="row wish-list-area">
        				@foreach($favlisting as $list)
            				<div class="col-lg-6">
            					<div class="single-wish" data-listingid="{{ $list->listing_id }}">
            						<span class="remove fav-remove" data-href="{{ route('auto-detail',$list->listing->slug) }}"><i class="fa fa-times"></i></span>
            						<div class="left">
            							<a href="{{ route('auto-detail',$list->listing->slug) }}"><img class="img-fluid" src="{{ asset('public/uploads/listings/'.$list->listing->feature_image) }}" alt=""></a>
            						</div>
            						<div class="right">
            							<h4 class="title">
                    						<a href="{{ route('auto-detail',$list->listing->slug) }}">
                    							{{ $list->listing->title }}
                    						</a>
            							</h4>
            							<div>
            								<p>{{mb_strlen($list->listing->descriptions,'utf-8') > 150 ? mb_substr($list->listing->descriptions,0,150,'utf-8')."...":$list->listing->descriptions}}</p>
            							</div>
            							<div class="price">
            								R{{ $list->listing->price }}
            							</div>
            						</div>
            					</div>
            				</div>
        				@endforeach
        
        			</div>
    			</div>
    		</div>
			@else

			<div class="text-center mb-5 pb-4 px-4" style="border-radius:15px; background-color:#cee3e2;">
			    <!--<img class="img-fluid" src="{{ asset('public/front/images/VdgGG.gif')}}" alt="icon"/>-->
			    <div class="mb-3" style="height:300px;">
			        <img class="img-fluid h-100" src="{{ asset('public/front/images/VdgGG.gif')}}" alt="icon"/>
			    </div>
			    <h5 class="basel-empty-wishlist">FAVORITE IS EMPTY.</h5>
			    <p class="basel-empty-page-text">You don't have any listing in the favotite yet. You will find a lot of interesting listing on our "Listing" page.</p>
			    <a href="{{ route('homepage') }}" class="btn btn-lg btn-primary">Return to Home</a>
			</div>

			@endif
    <!--row-->
  </div>
  <!--container-->
</section>
<!--main-container col2-left-layout--> 

@endsection