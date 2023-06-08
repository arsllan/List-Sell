@extends('layouts/frontapp')
@section('content')
<div class="page-heading">
  <div class="breadcrumbs">
    <div class="container">
      <div class="row">
        <div class="col-xs-12">
          <ul>
            <li class="home"> <a href="{{ route('homepage') }}" title="Go to Home Page">Home</a> <span>&rsaquo; </span> </li>
            <!--<li class="category1599"> <a href="{{ route('dealerships')}}" title="">Dealership</a> <span>&rsaquo; </span> </li>-->
            <li class="category1601"> <strong>Dealerships</strong> </li>
          </ul>
        </div>
        <!--col-xs-12--> 
      </div>
      <!--row--> 
    </div>
    <!--container--> 
  </div>
  <div class="page-title">
    <h2>DEALERSHIPS</h2>
  </div>
</div>
<!--breadcrumbs-->
<section class="py-5">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-3 sidebar col-md-12 mb-4 mt-0">
            <div class="section-filter">
              <div class="b-filter__inner bg-grey">
                <h2><span>Find Dealership</span></h2>
                <form action="{{ route('dealerships') }}" method="get" class="b-filter">
                  <select class="form-select mb-3" name="dealer" id="dealer">
                    <option value="">Select Dealership Name</option>
                    @foreach($dealersships as $dealer)
                        <option value="{{ $dealer->user_id }}" @if(request()->dealer == $dealer->user_id) selected @endif>{{ $dealer->dealership_name }}</option>
                    @endforeach

                  </select>                    
                <select class="form-select mb-3" name="category" id="category">
                    <option value="">Select Category</option>
                    @foreach($categories as $cat)
                        <option value="{{ $cat->slug }}">{{ $cat->name }} For Sale</option>
                    @endforeach
                </select>                    

                    <select class="form-select mb-3" name="region" id="region">
                        <option value="">Select Region</option>
                        @foreach($states as $state)
                            <option value="{{ $state->id }}" @if(request()->region == $state->id) selected @endif>{{ $state->name }}</option>
                        @endforeach
                    </select>
                    <select class="form-select mb-3" name="city" id="city">
                        <option value="">Select City</option>
                    </select>
                  <div>
                    <div class="b-filter__btns">
                      <button class="btn btn-lg btn-primary">Search</button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          <!--block block-list block-compare--> 
        </div>
        <div class="col-lg-9 col-md-12">
            <div class="row">
                @forelse($dealers as $dealer)
                <div class="col-xxl-4 col-xl-4 col-lg-6 mb-4">
                    <div class="vehica-car-card__inner">
                        @if($dealer->featured == 1)
                          <div class="vehica-car-card__featured">
                            <div class="vehica-car-card__featured__inner"> Featured</div>
                          </div>
                        @endif
                      <div class="vehica-car-card__image-bg">
                        <a href="{{ route('dealership-detail',$dealer->slug) }}" class="vehica-car-card__image" style="padding-top: 55.5224%;">
                          <img src="{{ asset('public/uploads/dealers/banners/'.$dealer->banner_image)}}" alt="Royal Car Dealership" class="lazyautosizes lazyloaded" sizes="336px">
                          <div class="vehica-car-card__image-info">
                            <!--<span class="vehica-car-card__image-info__photos"></span>-->
                            <div class="d-flex align-items-center">
                                <div class="vehica-car-card__image__favorite"><i class="fa fa-star-o"></i></div>
                                <div class="vehica-car-card__image__favorite"><i class="fa fa-star-o"></i></div>
                            </div>
                          </div>
                        </a>
                      </div>
                      <div class="vehica-car-card__content">
                        <a href="{{ route('dealership-detail',$dealer->slug) }}" title="{{ $dealer->dealership_name }}" class="vehica-car-card__name mb-3"> {{ $dealer->dealership_name }}</a>
                        <div class="dealer-details">
                            <div class="custom-dealer-text d-flex align-items-center mb-3">
                                <div class="icon d-inline-flex">
                                    <img src="{{ asset('public/front/images/location.svg')}}" width="15" class="img-fluid me-2" alt="icon"/>
                                    <span style="text-overflow: ellipsis; overflow: hidden; white-space: nowrap;">{{ $dealer->statesdata->name ?? 'N/A' }}</span>
                                </div>
                            </div>
                            <div class="custom-dealer-text d-flex align-items-center">
                                <div class="icon d-inline-flex">
                                    <img src="{{ asset('public/front/images/phone.svg')}}" width="15" class="img-fluid me-2" alt="icon"/>
                                    <span style="text-overflow: ellipsis; overflow: hidden; white-space: nowrap;">{{ $dealer->telephone }}</span>
                                </div>
                                <div class="icon d-inline-flex ms-auto">
                                    <img src="{{ asset('public/front/images/car.svg')}}" width="15" class="img-fluid me-2" alt="icon"/>
                                    @php
                                        $counter = \App\Models\Listing::where('uploaded_by',$dealer->user_id)->count();
                                    @endphp                                    
                                    <span style="text-overflow: ellipsis; overflow: hidden; white-space: nowrap;">{{ $counter }} Total</span>
                                </div>
                            </div>
                        </div>
                        <div class="vehica-car-card__separator"></div>
                        <div class="vehica-car-card__info">
                        @php
                            $brandarray = \App\Models\Listing::where('uploaded_by',$dealer->user_id)->pluck('make')->toArray();
                            $brands = \App\Models\Brands::whereIn('id',$brandarray)->get();
                        @endphp
                        @forelse($brands as $b)
                          <div class="vehica-car-card__info__single"> {{ $b->name }}</div>
                        @empty
                            <div class="vehica-car-card__info__single">No Available</div>
                        @endforelse
                        </div>
                      </div>
                    </div>
                </div>
                @empty
                <div class="alert alert-danger">
                    No dealer found.
                </div>
                @endforelse
            <div class="toolbar bottom" style="background:none;">
                            <!--pagination start-->
                                @if ($dealers->hasPages())
                                <div class="pages">
                                    <ul class="pagination justify-content-center">
                                        {{-- Previous Page Link --}}
                                        @if ($dealers->onFirstPage())
                                            <li class="page-item disabled"><span class="page-link">«</span></li>
                                        @else
                                            <li class="page-item"><a href="{{ url()->full().'&page='.$dealers->previousPageUrl() }}"
                                                                     rel="prev" class="page-link">«</a></li>
                                        @endif

                                        @if($dealers->currentPage() > 3)
                                            <li class="page-item hidden-xs"><a href="{{ url()->full().'&page=1' }}"
                                                                               class="page-link">1</a></li>
                                        @endif
                                        @if($dealers->currentPage() > 4)
                                            <li class="page-item"><span class="page-link">...</span></li>
                                        @endif
                                        @foreach(range(1, $dealers->lastPage()) as $i)
                                            @if($i >= $dealers->currentPage() - 2 && $i <= $dealers->currentPage() + 2)
                                                @if ($i == $dealers->currentPage())
                                                    <li class="page-item active"><span class="page-link">{{ $i }}</span>
                                                    </li>
                                                @else
                                                    <li class="page-item"><a class="page-link"
                                                                             href="{{ url()->full().'&page='.$i }}">{{ $i }}</a>
                                                    </li>
                                                @endif
                                            @endif
                                        @endforeach
                                        @if($dealers->currentPage() < $dealers->lastPage() - 3)
                                            <li class="page-item"><span class="page-link">...</span></li>
                                        @endif
                                        @if($dealers->currentPage() < $dealers->lastPage() - 2)
                                            <li class="page-item hidden-xs"><a
                                                        href="{{ url()->full().'&page='.$dealers->lastPage() }}"
                                                        class="page-link">{{ $dealers->lastPage() }}</a></li>
                                        @endif

                                        {{-- Next Page Link --}}
                                        @if ($dealers->hasMorePages())
                                            <li class="page-item"><a class="page-link"
                                                                     href="{{ url()->full().'&page='.$dealers->nextPageUrl() }}"
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
        </div>
    </div>
</div>
</section>

<script>
$(document).ready(function() {
    $('#region').on('change', function() {
        var state_id = this.value;
        $("#city").html('');
        $.ajax({
            url:"{{route('get-city-by-state')}}",
            type: "POST",
            data: {
            state_id: state_id,
            _token: '{{csrf_token()}}' 
            },
            dataType : 'json',
            success: function(result){
                $('#city').html('<option value="">Select City</option>'); 
                $.each(result.models,function(key,value){
                $("#city").append('<option value="'+value.id+'">'+value.name+'</option>');
                });
            }
        });
    });
    $('#category').on('change', function() {
        var category_id = this.value;
        $.ajax({
            url:"{{route('get-dealer-by-cat')}}",
            type: "POST",
            data: {
            category_id: category_id,
            _token: '{{csrf_token()}}' 
            },
            dataType : 'json',
            success: function(result){
                $("#dealer").html('');
                $('#dealer').html('<option value="">Select Dealership Name</option>'); 
                $.each(result.dealers,function(key,value){
                $("#dealer").append('<option value="'+value.id+'">'+value.dealership_name+'</option>');
                });
            }
        });
    });
});
</script>
@endsection