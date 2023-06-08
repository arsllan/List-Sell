@extends('layouts.backendapp')
@section('content')
            <div class="l-main">
                <div class="content-wrapper">
                    <div class="container-fluid">
                        <div class="content-wrapper-content">
                            <div class="main_heading d-md-flex align-items-center mb-3">
                                <h5>Add New City</h5>
                                <a href="{{ route('manage-city') }}" class="ml-auto nav-link px-0">Back To Cities</a>
                            </div>
                            @if(session()->has('success'))
                                <div class="alert alert-success">
                                    {{ session()->get('success') }}
                                </div>
                            @endif                                    
                            <form action="{{ route('store-city') }}" method="post" enctype='multipart/form-data'>
                            @csrf
                                <div class="card card-body">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group m-t-20">
                                                <label><strong>State</strong></label>
                                                <select class="form-control" name="state" required>
                                                    <option value="">Select State</option>
                                                    @foreach($states as $state)
                                                        <option value="{{ $state->id }}">{{ $state->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group m-t-20">
                                                <label><strong>City Name</strong></label>
                                                <input type="text" class="form-control rounded-border2" required name="name" placeholder="">
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