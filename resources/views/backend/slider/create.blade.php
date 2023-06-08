@extends('layouts.backendapp')
@section('content')
            <div class="l-main">
                <div class="content-wrapper">
                    <div class="container-fluid">
                        <div class="content-wrapper-content">
                            <div class="main_heading d-md-flex align-items-center">
                                <h5>Add New Slider</h5>
                                <a href="{{ route('manage-sliders') }}" class="ml-auto nav-link px-0">Back To Slider</a>
                            </div>
                            @if(session()->has('success'))
                                <div class="alert alert-success">
                                    {{ session()->get('success') }}
                                </div>
                            @endif
                            <form action="{{ route('store-slider') }}" method="post" enctype='multipart/form-data'>
                            @csrf
                                <div class="card card-body mt-4">
                                        
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group m-t-20">
                                                <label><strong>Title</strong></label>
                                                <input type="text" class="form-control rounded-border2" name="title" placeholder="">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group m-t-20">
                                                <label><strong>Sub Title</strong></label>
                                                <input type="text" class="form-control rounded-border2" name="subtitle" placeholder="">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group m-t-20">
                                                <label><strong>Under Line</strong></label>
                                                <input type="text" class="form-control rounded-border2" name="underline" placeholder="">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group m-t-20">
                                                <label><strong>Image</strong></label>
                                                <input type="file" class="form-control rounded-border2" name="image" placeholder="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <div class="w-100 text-right mt-3">
                                <button type="submit" class="btn btn-next d-inline-flex">Save</button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
@endsection