@extends('layouts.backendapp')
@section('content')
            <div class="l-main">
                <div class="content-wrapper">
                    <div class="container-fluid">
                        <div class="content-wrapper-content">
                            <div class="main_heading d-md-flex align-items-center mb-3">
                                <h5>Update Equipment</h5>
                                <a href="{{ route('equipments') }}" class="ml-auto nav-link px-0">Back To Equipment</a>
                            </div>
                            <form action="{{ route('update-equipment',$equipment->id) }}" method="post" enctype='multipart/form-data'>
                            @csrf
                            <div class="card card-body">
                                <div class="row">
                                    <div class="col-lg-6 mb-3">
                                        <div class="form-group mb-0">
                                            <label><strong>Equipment Name</strong></label>
                                            <input type="text" class="form-control rounded-border2" name="name" value="{{ $equipment->name }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 mb-3">
                                        <div class="form-group mb-0">
                                            <label><strong>Image</strong></label>
                                            <input type="file" class="form-control rounded-border2" name="image" placeholder="">
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group mb-0">
                                            <label><strong>Old Image</strong></label>
                                            <img class="img-thumbnail" src="{{ asset('public/uploads/equipments/'.$equipment->image) }}" width="200px" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-3 w-100 text-right">
                                <button type="submit" class="btn btn-next d-inline-flex">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
@endsection