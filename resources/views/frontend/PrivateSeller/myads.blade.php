@extends('layouts/frontapp')
@section('content')
<div class="page-heading">
  <div class="breadcrumbs">
    <ul>
        <li class="home"> <a href="index.html" title="Go to Home Page">Home</a> <span>&rsaquo; </span> </li>
        <li class="category1601"> <strong>My Ads</strong> </li>
    </ul> 
  </div>
  <div class="page-title">
    <h2>My Ads</h2>
  </div>
</div>
<!---->
<section class="py-5 adsTab mb-5">
    <div class="col-xxl-9 col-xl-9 col-lg-10 col-11 mx-auto">
        <form>
            <div class="d-xl-flex align-items-center mb-3">
                <nav class="h-100 mb-3 mb-xl-0 mt-0">
                  <div class="nav w-100 nav-tabs" id="nav-tab" role="tablist">
                    <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">View all ({{ count($listings) }})</button>
                    <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Active Ads ({{ count($activelistings) }})</button>
                    <button class="nav-link" id="nav-contact-tab" data-bs-toggle="tab" data-bs-target="#nav-contact" type="button" role="tab" aria-controls="nav-contact" aria-selected="false">Inactive Ads ({{ count($inactivelistings) }})</button>
                  </div>
                </nav>
                <!---->
                <div class="input-group mb-0">
                  <button type="button" class="input-group-text" id="basic-addon1"><img class="img-fluid" src="{{ asset('public/front/images/search-icon.png') }}" alt="icon"/></button>
                  <input type="text" class="form-control" placeholder="Search...">
                </div>
            </div>
        </form>
        <!---->
        <div class="tab-content p-0" id="nav-tabContent">
            <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab" tabindex="0">
                @forelse($listings as $list)
                <div class="card mb-3">
                    <div class="card-body ps-0 pe-0 pe-lg-3 py-0 d-md-flex align-items-center">
                        <div class="text-center d059c029 _42f36e3b _1075545d" style="min-width: 12rem; height: 100%; background-color: #f7f8f8; padding: .8rem;">
                            <strong>From : {{ $list->start_date }} </strong>
                            <strong>To : {{ $list->end_date }} </strong>
                        </div>
                        <div class="w-100 ms-md-3 px-md-0 px-2">
                            <div class="btn-group">
                              <button class="btn btnHorizental" type="button" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false"><img class="img-fluid" width="20" src="{{ asset('public/front/images/horizentalBaricon.svg') }}" alt="icon"/></button>
                              <ul class="dropdown-menu dropdown-menu-end">
                                <li><a class="dropdown-item" href="{{ route('ad-edit',$list->id) }}">Edit Now</a></li>
                                <li><a class="dropdown-item deactivead" data-href="{{ route('ad-deactivate',$list->id) }}">Deactivate</a></li>
                              </ul>
                            </div>
                            <!---->
                            <ul class="list-unstyled w-100 pt-3">
                                <a href="#" class="d-sm-flex align-items-center justify-content-between text-center text-sm-start text-decoration-none">
                                    <li class="nav-item mb-3 mb-sm-0">
                                        <span class="LL_ d-flex justify-content-center justify-content-sm-start align-items-center">
                                            <div class="pHoto me-2"><img class="img-fluid" src="{{ asset('public/uploads/listings/'.$list->feature_image) }}" alt="icon"/></div>
                                            {{ $list->title }}
                                        </span>
                                    </li>
                                    <li class="nav-item">
                                        <p class="m-0">R: {{ $list->price }}</p>
                                    </li>
                                    <li class="nav-item">
                                        <span class="badge">@if($list->status) Active @else Inactive @endif </span>
                                    </li>
                                    <li class="nav-item">
                                        <p class="m-0">@if($list->status) This ad is currently live. @else This ad is currently Inactive @endif</p>
                                    </li>
                                </a>
                            </ul>
                            <hr class="my-2"/>
                            <div class="d-sm-flex align-items-center pb-2">
                                <ul class="list-unstyled m-0 d-flex align-items-center justify-content-center justify-content-sm-start mb-3 mb-sm-0">
                                    <li class="nav-item"><a href="#" class="nav-linkk"><img class="img-fluid" src="{{ asset('public/front/images/iconViews_.svg') }}" alt="icon"/> Views: {{ $list->views_counter }}</a></li>
                                    <li class="nav-item"><a href="#" class="nav-linkk"><img class="img-fluid" src="{{ asset('public/front/images/iconCall_.svg') }}" alt="icon"/> Tel: {{ $list->tel_counter }}</a></li>
                                    <li class="nav-item"><a href="#" class="nav-linkk"><img class="img-fluid" src="{{ asset('public/front/images/iconLikes_.svg') }}" alt="icon"/> Likes: {{ $list->views_counter }}</a></li>
                                    <li class="nav-item"><a href="#" class="nav-linkk"><img class="img-fluid" src="{{ asset('public/front/images/iconChats_.svg') }}" alt="icon"/> Chats: {{ $list->chat_counter }}</a></li>
                                </ul>
                                <div class="list-unstyled ms-auto text-center text-sm-start">
                                    <button type="button" class="btn btnSell">Sell faster now</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @empty
                    <div class="alert alert-secondary" role="alert">No ad found</div>
                @endforelse
            </div>
            <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab" tabindex="0">
                @forelse($activelistings as $list)
                <div class="card mb-3">
                    <div class="card-body ps-0 pe-0 pe-lg-3 py-0 d-md-flex align-items-center">
                        <div class="text-center d059c029 _42f36e3b _1075545d" style="min-width: 12rem; height: 100%; background-color: #f7f8f8; padding: .8rem;">
                            <strong>From : {{ $list->start_date }} </strong>
                            <strong>To : {{ $list->end_date }} </strong>
                        </div>
                        <div class="w-100 ms-md-3 px-md-0 px-2">
                            <div class="btn-group">
                              <button class="btn btnHorizental" type="button" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false"><img class="img-fluid" width="20" src="{{ asset('public/front/images/horizentalBaricon.svg') }}" alt="icon"/></button>
                              <ul class="dropdown-menu dropdown-menu-end">
                                <li><a class="dropdown-item" href="#">Menu item</a></li>
                                <li><a class="dropdown-item" href="#">Menu item</a></li>
                                <li><a class="dropdown-item" href="#">Menu item</a></li>
                              </ul>
                            </div>
                            <!---->
                            <ul class="list-unstyled w-100 pt-3">
                                <a href="#" class="d-sm-flex align-items-center justify-content-between text-center text-sm-start text-decoration-none">
                                    <li class="nav-item mb-3 mb-sm-0">
                                        <span class="LL_ d-flex justify-content-center justify-content-sm-start align-items-center">
                                            <div class="pHoto me-2"><img class="img-fluid" src="{{ asset('public/uploads/listings/'.$list->feature_image) }}" alt="icon"/></div>
                                            {{ $list->title }}
                                        </span>
                                    </li>
                                    <li class="nav-item">
                                        <p class="m-0">R: {{ $list->price }}</p>
                                    </li>
                                    <li class="nav-item">
                                        <span class="badge">@if($list->status) Active @else Inactive @endif </span>
                                    </li>
                                    <li class="nav-item">
                                        <p class="m-0">@if($list->status) This ad is currently live. @else This ad is currently Inactive @endif</p>
                                    </li>
                                </a>
                            </ul>
                            <hr class="my-2"/>
                            <div class="d-sm-flex align-items-center pb-2">
                                <ul class="list-unstyled m-0 d-flex align-items-center justify-content-center justify-content-sm-start mb-3 mb-sm-0">
                                    <li class="nav-item"><a href="#" class="nav-linkk"><img class="img-fluid" src="{{ asset('public/front/images/iconViews_.svg') }}" alt="icon"/> Views: {{ $list->views_counter }}</a></li>
                                    <li class="nav-item"><a href="#" class="nav-linkk"><img class="img-fluid" src="{{ asset('public/front/images/iconCall_.svg') }}" alt="icon"/> Tel: {{ $list->tel_counter }}</a></li>
                                    <li class="nav-item"><a href="#" class="nav-linkk"><img class="img-fluid" src="{{ asset('public/front/images/iconLikes_.svg') }}" alt="icon"/> Likes: {{ $list->views_counter }}</a></li>
                                    <li class="nav-item"><a href="#" class="nav-linkk"><img class="img-fluid" src="{{ asset('public/front/images/iconChats_.svg') }}" alt="icon"/> Chats: {{ $list->chat_counter }}</a></li>
                                </ul>
                                <div class="list-unstyled ms-auto text-center text-sm-start">
                                    <button type="button" class="btn btnSell">Sell faster now</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @empty
                    <div class="alert alert-secondary" role="alert">No ad found</div>
                @endforelse
            </div>
            <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab" tabindex="0">
                @forelse($inactivelistings as $list)
                <div class="card mb-3">
                    <div class="card-body ps-0 pe-0 pe-lg-3 py-0 d-md-flex align-items-center">
                        <div class="text-center d059c029 _42f36e3b _1075545d" style="min-width: 12rem; height: 100%; background-color: #f7f8f8; padding: .8rem;">
                            <strong>From : {{ $list->start_date }} </strong>
                            <strong>To : {{ $list->end_date }} </strong>                  
                        </div>
                        <div class="w-100 ms-md-3 px-md-0 px-2">
                            <div class="btn-group">
                              <button class="btn btnHorizental" type="button" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false"><img class="img-fluid" width="20" src="{{ asset('public/front/images/horizentalBaricon.svg') }}" alt="icon"/></button>
                              <ul class="dropdown-menu dropdown-menu-end">
                                <li><a class="dropdown-item" href="#">Menu item</a></li>
                                <li><a class="dropdown-item" href="#">Menu item</a></li>
                                <li><a class="dropdown-item" href="#">Menu item</a></li>
                              </ul>
                            </div>
                            <!---->
                            <ul class="list-unstyled w-100 pt-3">
                                <a href="#" class="d-sm-flex align-items-center justify-content-between text-center text-sm-start text-decoration-none">
                                    <li class="nav-item mb-3 mb-sm-0">
                                        <span class="LL_ d-flex justify-content-center justify-content-sm-start align-items-center">
                                            <div class="pHoto me-2"><img class="img-fluid" src="{{ asset('public/uploads/listings/'.$list->feature_image) }}" alt="icon"/></div>
                                            {{ $list->title }}
                                        </span>
                                    </li>
                                    <li class="nav-item">
                                        <p class="m-0">R: {{ $list->price }}</p>
                                    </li>
                                    <li class="nav-item">
                                        <span class="badge">@if($list->status == 1) Active @else Inactive @endif </span>
                                    </li>
                                    <li class="nav-item">
                                        <p class="m-0">@if($list->status == 1) This ad is currently live. @else This ad is currently Inactive @endif</p>
                                    </li>
                                </a>
                            </ul>
                            <hr class="my-2"/>
                            <div class="d-sm-flex align-items-center pb-2">
                                <ul class="list-unstyled m-0 d-flex align-items-center justify-content-center justify-content-sm-start mb-3 mb-sm-0">
                                    <li class="nav-item"><a href="#" class="nav-linkk"><img class="img-fluid" src="{{ asset('public/front/images/iconViews_.svg') }}" alt="icon"/> Views: {{ $list->views_counter }}</a></li>
                                    <li class="nav-item"><a href="#" class="nav-linkk"><img class="img-fluid" src="{{ asset('public/front/images/iconCall_.svg') }}" alt="icon"/> Tel: {{ $list->tel_counter }}</a></li>
                                    <li class="nav-item"><a href="#" class="nav-linkk"><img class="img-fluid" src="{{ asset('public/front/images/iconLikes_.svg') }}" alt="icon"/> Likes: {{ $list->views_counter }}</a></li>
                                    <li class="nav-item"><a href="#" class="nav-linkk"><img class="img-fluid" src="{{ asset('public/front/images/iconChats_.svg') }}" alt="icon"/> Chats: {{ $list->chat_counter }}</a></li>
                                </ul>
                                <div class="list-unstyled ms-auto text-center text-sm-start">
                                    <button type="button" class="btn btnSell">Sell faster now</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @empty
                    <div class="alert alert-secondary" role="alert">No ad found</div>
                @endforelse
            </div>
        </div>
    </div>
</section>
<script>
// $(function() {
//     $('deactivead').confirmButton({
//         confirm: "Are you really sure to deactivate your ad?"
//     });
// });
</script>
@endsection