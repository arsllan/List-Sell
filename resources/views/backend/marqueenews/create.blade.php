@extends('layouts.backendapp')
@section('content')
            <div class="l-main">
                <div class="content-wrapper">
                    <div class="container-fluid">
                        <div class="content-wrapper-content">
                            <div class="main_heading d-md-flex align-items-center">
                                <h5>Add New Marquee News</h5>
                                <a href="{{ route('manage-marqueenews') }}" class="ml-auto nav-link px-0">Back To Manage Marquee News</a>
                            </div>
                             @if(session()->has('success'))
                                <div class="alert alert-success">
                                    {{ session()->get('success') }}
                                </div>
                            @endif
                            <form action="{{ route('store-marqueenews') }}" method="post" enctype='multipart/form-data'>
                                @csrf
                                <div class="card card-body mt-4">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="form-group mb-0">
                                                <label><strong>Title</strong></label>
                                                <input type="text" class="form-control rounded-border2" name="title" placeholder="">
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