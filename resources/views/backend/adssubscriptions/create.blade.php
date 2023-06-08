@extends('layouts.backendapp')
@section('content')
            <div class="l-main">
                <div class="content-wrapper">
                    <div class="container-fluid">
                        <div class="content-wrapper-content">
                            <div class="main_heading d-md-flex align-items-center">
                                <h5>Add New Ads Subscription</h5>
                                <a href="{{ route('manage-adssubscriptions') }}" class="ml-auto nav-link px-0">Back To Mange Adssubscriptions</a>
                            </div>
                            @if(session()->has('success'))
                                <div class="alert alert-success">
                                    {{ session()->get('success') }}
                                </div>
                            @endif
                            <form action="{{ route('store-adssubscription') }}" method="post" enctype='multipart/form-data'>
                            @csrf
                            <div class="card card-body mt-4">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group m-t-20">
                                            <label><strong>Subscription Name</strong></label>
                                            <input type="text" class="form-control rounded-border2" name="name" placeholder="">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group m-t-20">
                                            <label><strong>Seven Days Price</strong></label>
                                            <input type="text" class="form-control rounded-border2" name="seven_days_price" placeholder="">
                                        </div>
                                    </div>
                                </div>
                                <!---->
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group m-t-20">
                                            <label><strong>Fifteen Days Price</strong></label>
                                            <input type="text" class="form-control rounded-border2" name="fifteen_days_price" placeholder="">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group m-t-20">
                                            <label><strong>Thirty Days Price</strong></label>
                                            <input type="text" class="form-control rounded-border2" name="thirty_days_price" placeholder="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="w-100 mt-3 text-right">
                                <button type="submit" class="btn btn-next d-inline-flex">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
@endsection