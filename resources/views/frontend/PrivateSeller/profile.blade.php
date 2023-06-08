@extends('layouts/frontapp')
@section('content')
<div class="page-heading">
    <div class="breadcrumbs">
        <ul>
            <li class="home"> <a href="index.html" title="Go to Home Page">Home</a> <span>&rsaquo; </span> </li>
            <li class="category1601"> <strong>Profile</strong> </li>
        </ul>
    </div>
    <div class="page-title">
        <h2>My Profile</h2>
    </div>
</div>
<!---->
<section class="py-5 profileAdfs mb-5">
    <div class="col-xxl-9 col-xl-9 col-lg-10 col-11 mx-auto">
            <div class="col-xxl-7 col-xl-9 col-lg-12 col-12 mx-auto">
                <div class="card mb-3">
                    <div class="card-header">
                        <h5>Edit profile</h5>
                    </div>
                                    @if (\Session::has('success'))
                                        <div class="alert alert-success">
                                            {!! \Session::get('success') !!}
                                        </div>
                                    @endif
                    <form action="{{ route('update-user-profile') }}" method="post" enctype='multipart/form-data'>
                        @csrf
                        <div class="card-body pb-0">
                            <h6 class="profileTile">Profile Photo</h6>
                            <div class="d-flex profileRow align-items-center">
                                <div class="_5bfcfed1 me-3"><img class="img-fluid" src="{{ asset('public/front/images/iconProfile.png') }}" alt="icon"/></div>
                                <div class="w-100">
                                    <label class="d-inline-flex mb-2"> Upload Photo <input type="file" size="60" ></label>
                                    <p class="m-0"><img class="img-fluid me-2" src="{{ asset('public/front/images/infoicon.svg') }}" alt="icon"/> JPG, JPEG, PNG Min: 400px, Max: 1024px</p>
                                </div>
                            </div>
                            <!---->
                            <hr class="my-2"/>
                        </div>
                        <!---->
                        <div class="card-body">
                            <h6 class="profileTile">Basic information</h6>
                            <div class="row">
                                <div class="col-xl-7 mb-2">
                                    <h6 class="profileTile">First Name</h6>
                                    <div class="form-group mb-3">
                                        <input type="text" class="form-control" name="fname" id="" value="{{ auth()->user()->fname }}" placeholder="Name">
                                    </div>
                                    <h6 class="profileTile">Last Name</h6>
                                    <div class="form-group mb-3">
                                        <input type="text" class="form-control" id="" name="lname" value="{{ auth()->user()->lname }}" placeholder="Name">
                                    </div>
                                    <h6 class="profileTile">Date of birth</h6>
                                    <div class="input-group mb-3">
                                        <select class="form-select" aria-label="Default select example">
                                          <option selected>DD</option>
                                          <option value="1">One</option>
                                          <option value="2">Two</option>
                                          <option value="3">Three</option>
                                        </select>
                                        <!---->
                                        <select class="form-select" aria-label="Default select example">
                                          <option selected>MM</option>
                                          <option value="1">One</option>
                                          <option value="2">Two</option>
                                          <option value="3">Three</option>
                                        </select>
                                        <!---->
                                        <select class="form-select" aria-label="Default select example">
                                          <option selected>YYYY</option>
                                          <option value="1">One</option>
                                          <option value="2">Two</option>
                                          <option value="3">Three</option>
                                        </select>
                                    </div>
                                    <!---->
                                    <h6 class="profileTile">Gender</h6>
                                    <div class="input-group mb-3">
                                        <select class="form-select" aria-label="Default select example">
                                          <option selected>Gender</option>
                                          <option value="male" @if(auth()->user()->gender == 'male') selected @endif>Male</option>
                                          <option value="female" @if(auth()->user()->gender == 'female') selected @endif>Female</option>
                                        </select>
                                    </div>
                                    <!---->
                                    <div class="input-group">
                                        <textarea class="form-control h-auto" id="" placeholder="About me (optional)" rows="5"></textarea>
                                        <small class="w-100">0/200</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!---->
                        <hr class="my-2"/>
                        <div class="card-body">
                            <h6 class="profileTile">Contact information</h6>
                            <div class="row">
                                <div class="col-xl-7 mb-2">
                                    <div class="input-group mb-3">
                                        <span class="input-group-text" id="basic-addon1">+92</span>
                                        <input type="phone" class="form-control" value="{{ auth()->user()->phone }}" id="" placeholder="22336655">
                                    </div>
                                    <div class="input-group mb-3">
                                        <span class="input-group-text" id="basic-addon1"><img class="img-fluid" src="{{asset('public/front/images/envolpeicon.svg')}}" alt="icon"/></span>
                                        <input type="email" class="form-control" value="{{ auth()->user()->email }}" id="" placeholder="admin@.com">
                                    </div>
                                    <h6 class="profileTile mb-3">Get Verified</h6>
                                    <p class=" mb-1">Please provide your id document</p>
                                    <input class="form-control h-auto" type="file" name="document_id" id="formFile">
                                    <p class=""><img class="img-fluid me-2" src="{{ asset('public/front/images/infoicon.svg') }}" alt="icon"/> JPG, JPEG, PNG Min: 400px, Max: 1024px</p>
                                    <div class="form-group">
                                         <button type="submit" class="btn btnSell">Save Changes</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!---->
                    </form>
                </div>
            </div>
    </div>
</section>
@endsection