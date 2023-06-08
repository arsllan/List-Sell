@extends('layouts/frontapp')
@section('content')
<div class="page-heading">
  <div class="breadcrumbs">
    <div class="container">
      <div class="row">
        <div class="col-xs-12">
          <ul>
            <li class="home"> <a href="index.html" title="Go to Home Page">Home</a> <span>&rsaquo; </span> </li>
            <!--<li class="category1601"> <strong>A</strong> </li>-->
          </ul>
        </div>
        <!--col-xs-12--> 
      </div>
      <!--row--> 
    </div>
    <!--container--> 
  </div>
  <div class="page-title">
    <h2>Ad Post Success</h2>
  </div>
</div>
<div class="content">
    <div class="container-fluid">
        <div class="row mb-5 mb-xxl-0 whitebg"> 
            <div class="col-12">
                Post add Successfully
                <a href="{{ route('my-ads') }}">View My Ads</a>
                <a href="{{ URL::to('/') }}">Go Back To Home</a>
            </div>
        </div>
    </div>
</div>




@endsection