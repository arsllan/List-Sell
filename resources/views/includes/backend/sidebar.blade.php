@if(auth()->user()->role_id == 1)
<nav id="sidebar">
    <div class="sidebar-header">
        <h3><div class="logo__txt text-center"><a href="{{ route('dashboard') }}">List & Sell</a></div></h3>
        <strong>LS</strong>
    </div>
    <div class="l-sidebar__content">
        <nav class="theme-navbar side-main-menu">
            <div class="scrollable">
                <div id="accordionExample">
                    <ul id="side-main-menu" class="side-navbar side-menu list-unstyled">
                        <li class=""><a class="{{ (request()->is('dashboard')) ? 'active' : '' }} card-left align-items-center" href="{{ route('dashboard') }}" aria-expanded="false"><span class="img-icon"><img class="icon-bike" src="{{ asset('public/backend/images/sidebar-icn-1.png') }}"></span><span class="text-hidee">Dashboard </span></a></li>
                        <li id="heading-1">
                            <a href="#stockmanager" data-toggle="collapse" aria-expanded="false" class="card-left align-items-center justify-content-between"><div class="d-flex align-items-center"><span class="img-icon"><img class="icon-bike" src="{{ asset('public/backend/newFiles/images/sidebar-icn-2.svg') }}"></span> <span class="text-hidee">Stock Manager</span></div> <i class="fa fa-chevron-right"></i></a>
                            <ul class="collapse list-unstyled {{ (request()->is('listings/id')) ? 'show' : '' }}" id="stockmanager" aria-labelledby="heading-1" data-parent="#accordion">
                                @foreach(system_categories_data() as $data)
                                    <li><a class="{{ (request()->is('listings')) ? 'active' : '' }}" href="{{ route('listings',$data->id) }}">{{ $data->name }} <span>({{ $data->listing()->count() }})</span></a></li>
                                @endforeach
                            </ul>
                        </li>      
                        <li id="heading-2">
                            <a href="#adsmanager" data-toggle="collapse" aria-expanded="false" class="card-left align-items-center justify-content-between"><div class="d-flex align-items-center"><span class="img-icon"><img class="icon-bike" src="{{ asset('public/backend/newFiles/images/sidebar-icn-3.svg') }}"></span> <span class="text-hidee">Ads</span></div> </span> <i class="fa fa-chevron-right"></i></a>
                            <ul class="collapse list-unstyled" id="adsmanager" aria-labelledby="heading-2" data-parent="#accordion">
                                <li><a href="{{ route('ads') }}">Dealer Ads <span>(0)</span></a></li>
                                <li><a href="{{ route('ads') }}">Private Seller Ads <span>(0)</span></a></li>
                            </ul>
                        </li>    
                        <li id="heading-2">
                            <a href="#leadmanager" data-toggle="collapse" aria-expanded="false" class="card-left align-items-center justify-content-between"><div class="d-flex align-items-center"><span class="img-icon"><img class="icon-bike" src="{{ asset('public/backend/newFiles/images/sidebar-icn-4.svg') }}"></span> <span class="text-hidee">Lead Manager</span></div> <i class="fa fa-chevron-right"></i></a>
                            <ul class="collapse list-unstyled" id="leadmanager" aria-labelledby="heading-2" data-parent="#accordion">
                                    <li><a href="{{ route('personal-site-leads') }}">Personal site - leads <span>(0)</span></a></li>
                                    <li><a href="{{ route('contactus-leads') }}">Contact us - leads <span>(0)</span></a></li>
                                    <li><a href="{{ route('compaigns-leads') }}">Campaigns - leads <span>(0)</span></a></li>
                                    <li><a href="{{ route('email-enquiry-leads') }}">Email Enquiries <span>(4)</span></a></li>
                                    <li><a href="{{ route('callback-leads') }}">Callback Leads <span>(3)</span></a></li>
                                    <li><a href="{{ route('personal-site-leads') }}">Contact Details Requested <span>(0)</span></a></li>
                                    <li><a href="{{ route('personal-site-leads') }}">Click-to-Call <span>(0)</span></a></li>
                                    <li><a href="{{ route('personal-site-leads') }}">Generic New Test Drive <span>(0)</span></a></li>
                                    <li><a href="{{ route('personal-site-leads') }}">Phone Calls <span>(0)</span></a></li>
                                    <li><a href="{{ route('personal-site-leads') }}">Dealership Leads <span>(0)</span></a></li>
                                    <li><a href="{{ route('personal-site-leads') }}">Buy My Car Offers <span>(0)</span></a></li>
                            </ul>
                        </li>    
                        <li class=""><a class=" {{ (request()->is('manage/users')) ? 'active' : '' }} card-left align-items-center" href="{{ route('manage-users') }}" aria-expanded="false"> <span class="img-icon"><img class="icon-bike" src="{{ asset('public/backend/newFiles/images/sidebar-icn-5.svg') }}"></span> <span class="text-hidee">Private Seller & Users</span></a></li>
                        <li class=""><a class=" {{ (request()->is('manage/dealers')) ? 'active' : '' }} card-left align-items-center" href="{{ route('manage-dealers') }}" aria-expanded="false"> <span class="img-icon"><img class="icon-bike" src="{{ asset('public/backend/newFiles/images/sidebar-icn-6.svg') }}"></span> <span class="text-hidee">Dealers</span></a></li>                    
                        <li id="heading-3">
                            <a href="#articlemanager" data-toggle="collapse" aria-expanded="false" class=" card-left align-items-center justify-content-between"><div class="d-flex align-items-center"><span class="img-icon"><img class="icon-bike" src="{{ asset('public/backend/newFiles/images/sidebar-icn-7.svg') }}"></span> <span class="text-hidee">Article Manager</span></div> <i class="fa fa-chevron-right"></i></a>
                            <ul class="collapse list-unstyled" id="articlemanager" aria-labelledby="heading-3" data-parent="#accordion">
                                <li><a href="#">Authors & Editors</a></li>
                                <li><a href="#">Categories</a></li>
                                <li><a href="#">Articles</a></li>
                                <li><a href="#">Tags</a></li>
                            </ul>
                        </li>                        
                        <li id="heading-3">
                            <a href="#autoparts" data-toggle="collapse" aria-expanded="false" class=" card-left align-items-center justify-content-between"><div class="d-flex align-items-center"><span class="img-icon"><img class="icon-bike" src="{{ asset('public/backend/newFiles/images/sidebar-icn-8.svg') }}"></span> <span class="text-hidee">Auto Parts</span></div> <i class="fa fa-chevron-right"></i></a>
                            <ul class="collapse list-unstyled" id="autoparts" aria-labelledby="heading-3" data-parent="#accordion">
                                <li><a href="{{ route('add-new-part') }}">Add New Part</a></li>
                                <li><a href="{{ route('autoparts') }}">Manage Parts</a></li>
                            </ul>
                        </li>                        
                        <li id="heading-5">
                            <a href="#websitemanager" data-toggle="collapse" aria-expanded="false" class=" card-left align-items-center justify-content-between"><div class="d-flex align-items-center"><span class="img-icon"><img class="icon-bike" width="25" src="{{ asset('public/backend/newFiles/images/sidebar-icn-9.svg') }}"></span> <span class="text-hidee">Website Manager</span></div> <i class="fa fa-chevron-right"></i></a>
                            <ul class="collapse list-unstyled" id="websitemanager" aria-labelledby="heading-4" data-parent="#accordion">
                                
                                <li><a href="{{ route('manage-marqueenews') }}">Marquee News</a></li>
                                <li><a href="{{ route('manage-sliders') }}">Sliders</a></li>
                                <li><a href="{{ route('manage-adssubscriptions') }}">Ads Subscriptions</a></li>
                                <li><a href="#">Special Deals</a></li>
                                <li><a href="#">Statistics</a></li>
                                <li><a href="#">Dealers</a></li>
                                <li><a href="#">Private Sellers</a></li>
                                <li><a href="#">Tickets</a></li>
                            </ul>
                        </li>                        
                        <li class=""><a class=" {{ (request()->is('/indeals')) ? 'active' : '' }} card-left align-items-center" href="{{ route('indeals') }}" aria-expanded="false"> <span class="img-icon"><img class="icon-bike" src="{{ asset('public/backend/newFiles/images/sidebar-icn-10.svg') }}"></span> <span class="text-hidee">Special Deals</span></a></li>
                        <li class=""><a class=" {{ (request()->is('/categories')) ? 'active' : '' }} card-left align-items-center" href="{{ route('categories') }}" aria-expanded="false"> <span class="img-icon"><img class="icon-bike" src="{{ asset('public/backend/newFiles/images/sidebar-icn-11.svg') }}"></span> <span class="text-hidee">Categories</span></a></li>
                        <li class=""><a class=" {{ (request()->is('body/types')) ? 'active' : '' }} card-left align-items-center" href="{{ route('body-types') }}" aria-expanded="false"> <span class="img-icon"><img class="icon-bike" src="{{ asset('public/backend/newFiles/images/sidebar-icn-12.svg') }}"></span> <span class="text-hidee">Body Types</span></a></li>
                        <li class=""><a class=" {{ (request()->is('models')) ? 'active' : '' }} card-left align-items-center" href="{{ route('models') }}" aria-expanded="false"> <span class="img-icon"><img class="icon-bike" src="{{ asset('public/backend/newFiles/images/sidebar-icn-13.svg') }}"></span> <span class="text-hidee">Models</span></a></li>
                        <li class=""><a class=" {{ (request()->is('equipments')) ? 'active' : '' }} card-left align-items-center" href="{{ route('equipments') }}" aria-expanded="false"> <span class="img-icon"><img class="icon-bike" src="{{ asset('public/backend/newFiles/images/sidebar-icn-14.svg') }}"></span> <span class="text-hidee">Equipments</span></a></li>
    
                        <li class=""><a class=" {{ (request()->is('manage/brands')) ? 'active' : '' }} card-left align-items-center" href="{{ route('manage-brands') }}" aria-expanded="false"> <span class="img-icon"><img class="icon-bike" src="{{ asset('public/backend/newFiles/images/sidebar-icn-15.svg') }}"></span> <span class="text-hidee">Brands</span></a></li>
                        <li class=""><a class=" {{ (request()->is('manage/city')) ? 'active' : '' }} card-left align-items-center" href="{{ route('manage-city') }}" aria-expanded="false"> <span class="img-icon"><img class="icon-bike" src="{{ asset('public/backend/newFiles/images/sidebar-icn-16.svg') }}"></span> <span class="text-hidee">City</span></a></li>
                    </ul>
                </div>
                <!--<div class="log-out-btn active"><a href="{{ URL::to('adminlogout') }}" class="btn text-center"><span class="img-icon"><img class="icon-bike" src="{{ asset('public/backend/images/sidebar-icn-27.svg') }}"></span> <span class="text-hidee">Logout </span></a></div>-->
            </div>
        </nav>
    </div>
</nav>
@endif

@if(auth()->user()->role_id == 2)
<nav id="sidebar">
    <div class="sidebar-header">
        <h3><div class="logo__txt text-center"><a href="{{ route('dashboard') }}">List & Sell</a></div></h3>
        <strong>LS</strong>
    </div>
    <div class="l-sidebar__content">
        <nav class="theme-navbar h-100">
            <div class="scrollable">
                <ul class="side-navbar m-0 side-menu list-unstyled">
                    <li class=""><a class="{{ (request()->is('dealer-dashboard')) ? 'active' : '' }} card-left align-items-center" href="{{ route('dealer-dashboard') }}" aria-expanded="false"><span class="img-icon"><img class="icon-bike" src="{{ asset('public/backend/images/sidebar-icn-1.png') }}"></span><span class="text-hidee">Dashboard </span></a></li>
                    <li id="heading-1">
                        <a href="#stockmanager" data-toggle="collapse" aria-expanded="false" class="card-left align-items-center justify-content-between"><div class="d-flex align-items-center"><span class="img-icon"><img class="icon-bike" src="{{ asset('public/backend/newFiles/images/sidebar-icn-7.svg') }}"></span> <span class="text-hidee">Stock Manager</span></div> <i class="fa fa-chevron-right"></i></a>
                        <ul class="collapse list-unstyled {{ (request()->is('listings/id')) ? 'show' : '' }}" id="stockmanager" aria-labelledby="heading-1" data-parent="#accordion">
                            @foreach(system_categories_data() as $data)
                                @php $counter = \App\Models\Listing::where('category_id',$data->id)->where('uploaded_by',auth()->user()->id)->count(); @endphp
                                <li><a class="{{ (request()->is('listings')) ? 'active' : '' }}" href="{{ route('listings',$data->id) }}">{{ $data->name }} <span>({{ $counter }})</span></a></li>
                            @endforeach
                        </ul>
                    </li>   
                    <li class=""><a class=" {{ (request()->is('/indeals')) ? 'active' : '' }} card-left align-items-center" href="{{ route('indeals') }}" aria-expanded="false"> <span class="img-icon"><img class="icon-bike" src="{{ asset('public/backend/newFiles/images/sidebar-icn-14.svg') }}"></span> <span class="text-hidee">Special Deals</span></a></li>
                    <li id="heading-2">
                        <a href="#leadmanager" data-toggle="collapse" aria-expanded="false" class=" card-left align-items-center justify-content-between"><div class="d-flex align-items-center"><span class="img-icon"><img class="icon-bike" src="{{ asset('public/backend/newFiles/images/sidebar-icn-4.svg') }}"></span> <span class="text-hidee">Lead Manager</span></div> <i class="fa fa-chevron-right"></i></a>
                        <ul class="collapse list-unstyled" id="leadmanager" aria-labelledby="heading-2" data-parent="#accordion">
                                <li><a href="{{ route('email-enquiry-leads') }}">Email Enquiries <span>(4)</span></a></li>
                                <li><a href="{{ route('callback-leads') }}">Callback Leads <span>(3)</span></a></li>
                        </ul>
                    </li>     
                    <li id="heading-3">
                        <a href="#autoparts" data-toggle="collapse" aria-expanded="false" class="card-left align-items-center justify-content-between"><div class="d-flex align-items-center"><span class="img-icon"><img class="icon-bike" src="{{ asset('public/backend/newFiles/images/sidebar-icn-2.svg') }}"></span> <span class="text-hidee">Auto Parts</span></div> <i class="fa fa-chevron-right"></i></a>
                        <ul class="collapse list-unstyled" id="autoparts" aria-labelledby="heading-3" data-parent="#accordion">
                            <li><a href="{{ route('add-new-part') }}">Add New Part</a></li>
                            <li><a href="{{ route('autoparts') }}">Manage Parts</a></li>
                        </ul>
                    </li> 
                </ul>
                <!--<div class="log-out-btn active"><a href="{{ URL::to('adminlogout') }}" class="btn text-center"><span class="img-icon"><img class="icon-bike" src="{{ asset('public/backend/images/sidebar-icn-27.svg') }}"></span> <span class="text-hidee">Logout </span></a></div>-->
            </div>
        </nav>
    </div>
</nav>
@endif