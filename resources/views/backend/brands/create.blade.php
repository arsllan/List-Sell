@extends('layouts.backendapp')
@section('content')
            <div class="l-main">
                <div class="content-wrapper">
                    <div class="container-fluid">
                        <div class="content-wrapper-content">
                            <div class="main_heading d-md-flex align-items-center mb-3">
                                <h5>Add New Brand</h5>
                                <a href="{{ route('manage-brands') }}" class="ml-auto nav-link px-0">Back To Brand</a>
                            </div>
                            @if(session()->has('success'))
                                <div class="alert alert-success">
                                    {{ session()->get('success') }}
                                </div>
                            @endif
                            <form action="{{ route('store-brand') }}" method="post" enctype='multipart/form-data'>
                            @csrf
                                <div class="card card-body">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group m-t-20">
                                                <label><strong>Brand Name</strong></label>
                                                <input type="text" class="form-control rounded-border2" name="name" placeholder="">
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
                                <div class="w-100 mt-3 text-right">
                                    <button type="submit" class="btn btn-next d-inline-flex">Save</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
@endsection