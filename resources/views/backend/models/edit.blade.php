@extends('layouts.backendapp')
@section('content')
            <div class="l-main">
                <div class="content-wrapper">
                    <div class="container-fluid">
                        <div class="content-wrapper-content">
                            <div class="main_heading d-md-flex align-items-center mb-3">
                                <h5>Update Ads Model</h5>
                                <a href="{{ route('models') }}" class="ml-auto nav-link px-0">Back To Model</a>
                            </div>
                            <form action="{{ route('update-model',$model->id) }}" method="post" enctype='multipart/form-data'>
                            @csrf
                                <div class="card card-body">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group m-t-20">
                                                <label><strong>Select Brand</strong></label>
                                                <select class="form-control mb-3" name="brand" required="" data-width="100%" tabindex="-98">
                                                    <option value="">Select Brand</option>
                                                    @foreach($brands as $brand)
                                                    <option value="{{ $brand->id }}" @if($brand->id == $model->brand_id) selected @endif>{{ $brand->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group m-t-20">
                                                <label><strong>Model Name</strong></label>
                                                <input type="text" class="form-control rounded-border2" name="name" value="{{ $model->name }}">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group m-t-20">
                                                <label><strong>Old Image</strong></label>
                                                <img class="img-thumbnail" src="{{ asset('public/uploads/models/'.$model->image) }}" width="200px" />
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
                                    <button type="submit" class="btn btn-next d-inline-flex">Update</button>
                                </div>
                        </form>
                        </div>
                    </div>
                </div>
            </div>
@endsection