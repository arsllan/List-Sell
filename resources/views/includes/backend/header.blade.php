<div class="l-header">
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid p-0">
            <div class="navbar-header w-100 d-flex justify-content-between">
                <button type="button" id="sidebarCollapse" data-target="#bs-example-navbar-collapse-1" aria-controls="bs-example-navbar-collapse-1" class="btn text-white"><i class="fa fa-bars"></i></button>
                <div class="logo__txtt text-center d-sm-flex d-lg-none align-items-center"><a href="{{ URL::to('dashboard') }}"><span>List</span> & Sell</a></div>
                <button class="btn btn-dark d-inline-block d-lg-none" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><i class="fa fa-align-justify"></i></button>
            </div>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto align-items-center">
                    @if(auth()->user()->role_id == 2)
                        @php $dealer = \App\Models\Dealers::where('user_id',auth()->user()->id)->first();  @endphp
                        <li class=""><a href="{{ route('dealership-detail',$dealer->slug) }}" target="_blank" class="btn web-btn rounded-border"><i class="fa fa-globe mr-2"></i> View Website</a></li>
                    @else
                        <li class=""><a href="{{ URL::to('/') }}" target="_blank" class="btn web-btn rounded-border" ><i class="fa fa-globe mr-2"></i> View Website</a></li>
                    @endif
                    <div class="d-lg-none d-flex">
                        @if(auth()->user()->role_id == 2)
                            <li><a class="btn web-btn rounded-border" style="width:90px" href="{{ route('dealer.profile') }}"><i class="fa fa-sign-in-alt"></i> Profile</a></li>
                        @else
                            <li><a class="btn web-btn rounded-border" style="width:90px" href="{{ route('admin.profile') }}"><i class="fa fa-sign-in-alt"></i> Profile</a></li>
                        @endif
                        <li><a class="btn web-btn rounded-border" style="width:90px" href="{{ URL::to('adminlogout') }}"><i class="fa fa-sign-out-alt"></i> Logout</a></li>
                    </div>
                    <!---->
                    <li class="nav-item c-header-icon basket dropdown">
                        <div class="c-header-icon logout">
                            <a class="nav-link" href="#" class="dropdown-toggle d-flex align-items-center" data-toggle="dropdown"><div class="login-circle"><img class="img-fluid" src="{{ asset('public/backend/newFiles/images/avatar.jpg') }}"></div></a>
                            <!---->
                            <ul class="dropdown-menu dropdown-menu-right p-0">
                                @if(auth()->user()->role_id == 2)
                                    <li><a class="list-group-item list-group-item-action" href="{{ route('dealer.profile') }}"><i class="fa fa-sign-in-alt"></i> Profile</a></li>
                                @else
                                    <li><a class="list-group-item list-group-item-action" href="{{ route('admin.profile') }}"><i class="fa fa-sign-in-alt"></i> Profile</a></li>
                                @endif
                                <li class="dropdown-divider m-0"></li>
                                <li><a class="list-group-item list-group-item-action" href="{{ URL::to('adminlogout') }}"><i class="fa fa-sign-out-alt"></i> Logout</a></li>
                            </ul>
                        </div>
                    </li>
                    <!---->
                    
                </ul>
            </div>
        </div>
    </nav>
</div>