@extends('layouts.backendapp')
@section('content')
            <div class="l-main">
                <div class="content-wrapper">
                    <div class="container-fluid">
                        <div class="content-wrapper-content">
                            <div class="main_heading d-md-flex align-items-center">
                                <h5>Update Ads Subscription</h5>
                                <a href="{{ route('manage-adssubscriptions') }}" class="ml-auto nav-link px-0">Back To Mange Adssubscriptions</a>
                            </div>
                            @if(session()->has('success'))
                                <div class="alert alert-success">
                                    {{ session()->get('success') }}
                                </div>
                            @endif
                            <form action="{{ route('update-adssubscription',$ads->id) }}" method="post" enctype='multipart/form-data'>
                            @csrf
                            <div class="card card-body mt-4">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group m-t-20">
                                            <label><strong>Subscription Name</strong></label>
                                            <input type="text" class="form-control rounded-border2" name="name" value="{{ $ads->name }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group m-t-20">
                                            <label><strong>Seven Days Price</strong></label>
                                            <input type="text" class="form-control rounded-border2" name="seven_days_price" value="{{ $ads->seven_days_price }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group m-t-20">
                                            <label><strong>Fifteen Days Price</strong></label>
                                            <input type="text" class="form-control rounded-border2" name="fifteen_days_price" value="{{ $ads->fifteen_days_price }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group m-t-20">
                                            <label><strong>Thirty Days Price</strong></label>
                                            <input type="text" class="form-control rounded-border2" name="thirty_days_price" value="{{ $ads->thirty_days_price }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="w-100 text-right mt-3">
                                <button type="submit" class="btn btn-next d-inline-flex">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
@endsection