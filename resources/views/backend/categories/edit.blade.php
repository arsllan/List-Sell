@extends('layouts.backendapp')
@section('content')
            <div class="l-main">
                <div class="content-wrapper">
                    <div class="container-fluid">
                        <div class="content-wrapper-content">
                            <div class="main_heading d-md-flex align-items-center">
                                <h5>Update Categories</h5>
                                <a href="{{ route('categories') }}" class="ml-auto nav-link px-0">Back To Categories</a>
                            </div>
                            <!---->
                            <form action="{{ route('update-category', $category->id) }}" method="post" enctype='multipart/form-data'>
                            @csrf
                                <div class="card card-body mt-4">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="form-group m-t-20">
                                                <label><strong>Category Name</strong></label>
                                                <input type="text" class="form-control rounded-border2" name="name" value="{{ $category->name }}">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group m-t-20">
                                                <label><strong>Old Image</strong></label>
                                                <img class="img-thumbnail" src="{{ asset('public/uploads/categories/'.$category->image) }}" width="100px" />
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group m-t-20">
                                                <label><strong>Image</strong></label>
                                                <input type="file" class="form-control rounded-border2" name="image">
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