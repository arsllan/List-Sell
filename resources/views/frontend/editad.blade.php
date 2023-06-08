@extends('layouts/frontapp')
@section('content')
<style>
    .catlist-li:hover{
        background-color: #4a91ff3d;
        cursor: pointer;
    }
</style>
<div class="page-heading">
  <div class="breadcrumbs">
    <div class="container">
      <div class="row">
        <div class="col-xs-12">
          <ul>
            <li class="home"> <a href="index.html" title="Go to Home Page">Home</a> <span>&rsaquo; </span> </li>
            <li class="category1601"> <strong>Ad Post</strong> </li>
          </ul>
        </div>
        <!--col-xs-12--> 
      </div>
      <!--row--> 
    </div>
    <!--container--> 
  </div>
  <div class="page-title">
    <h2>Edit Ad</h2>
  </div>
</div>
    <div class="content">
        <div class="container-fluid">
            <div class="row mb-5 mb-xxl-0 whitebg"> 
                <div class="col-xxl-9 col-xl-9 col-lg-10 col-11 mx-auto mt-5 mb-5">
                    <form action="{{ route('webpostadd-update') }}" method="post" enctype='multipart/form-data'>
                        @csrf
                        <div class="mx-auto col-xl-8 col-lg-9 col-10">
                            <div class="row">
                                <div class="col-lg-12 mb-3">
                                    <div class="form-group">
                                        <label class="mb-2 d-flex align-items-center justify-content-between"><strong class="d-block labels">Category</strong> <strong class="d-block reqired">(Required)</strong></label>
                                        <select class="form-select" id="category_id" name="category_id" required aria-label="Default select example">
                                          <option value="">-- Please Select --</option>
                                            @foreach(system_categories_data() as $cat)
                                                <option value="{{ $cat->id }}" @if($addata->category_id == $cat->id) selected @endif >{{ $cat->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-12 mb-3">
                                    <div class="form-group">
                                        <label class="mb-2 d-flex align-items-center justify-content-between"><strong class="d-block labels">Condition</strong> <strong class="d-block reqired">(Required)</strong></label>
                                        <select class="form-select w-100 rounded-border2" name="auto_condition">
                                            <option value="">-- Please Select --</option>
                                            <option value="Used" @if($addata->auto_condition == 'Used') selected @endif>Used</option>
                                            <option value="New" @if($addata->auto_condition == 'New') selected @endif>New</option>
                                            <option value="Demo" @if($addata->auto_condition == 'Demo') selected @endif>Demo</option>
                                        </select>
                                    </div>
                                </div> 
                                <div class="col-lg-12 mb-3">
                                    <div class="form-group">
                                        <label class="mb-2 d-flex align-items-center justify-content-between"><strong class="d-block labels">Title</strong> <strong class="d-block reqired">(Required)</strong></label>
                                        <input type="text" class="form-control rounded-border2" name="title" value="{{ $addata->title }}" placeholder="eg: Gorgeous mercedes benz e-class..." aria-label="Username" aria-describedby="basic-addon1">
                                    </div>
                                </div>
                                <div class="col-lg-12 mb-3">
                                    <div class="form-group">
                                        <label class="mb-2 d-flex align-items-center justify-content-between"><strong class="d-block labels">Location</strong> <strong class="d-block reqired">(Required)</strong></label>
                                        <select class="form-select" id="location" name="location" required>
                                            <option value="">Select Location</option>
                                            @foreach(states() as $state)
                                                <option value="{{ $state->id }}" @if($addata->location == $state->id) selected @endif>{{ $state->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>                                                    
                                                    
                                <div class="col-lg-12 mb-3">
                                    <div class="form-group">
                                        <label class="mb-2 d-flex align-items-center justify-content-between"><strong class="d-block labels">Price</strong> <strong class="d-block reqired">(Required)</strong></label>
                                        <input type="text" class="form-control w-100 rounded-border2" value="{{ $addata->price }}" name="price" placeholder="eg: 10000">
                                    </div>
                                </div>                                                    
                                <div class="col-lg-12 mb-3">
                                    <div class="form-group">
                                        <label class="mb-2 d-flex align-items-center justify-content-between"><strong class="d-block labels">Descriptions</strong> <strong class="d-block reqired">(Required)</strong></label>
                                        <textarea id="myeditorinstance" rows="6" class="form-control w-100 h-auto" name="descriptions">{{ $addata->descriptions }}</textarea>
                                    </div>
                                </div>                                                    													
                                <div class="col-lg-12 mb-3">
                                    <div class="form-group mb-0">
                                      <label class="mb-2 d-flex align-items-center justify-content-between"><strong class="d-block labels">Feature Image</strong> <strong class="d-block reqired">(Required)</strong></label>
                                      <input class="form-control" name="image" type="file" id="formFile">
                                    </div>
                                </div>
                                <div class="col-lg-12 mb-3">
                                    <div class="form-group">
                                        <label class="mb-2 d-flex align-items-center justify-content-between"><strong class="d-block labels">Phone Number</strong> <strong class="d-block reqired">(Required)</strong></label>
                                        <input type="number" class="form-control rounded-border2" value="{{ $addata->phone }}" name="phone" placeholder="Type your phone number">
                                    </div>
                                </div>
                                
                                <div class="col-lg-3 col-5 mx-auto text-center">
                                    <button type="submit" class="btn btn-theme rounded-border w-100 bg-light-success-bg text-white" style="background: #151a7b;">Post</button>
                                </div>                                               
                            </div>
                        </div>
                        <!---->
                    </form>                 
                </div>
            </div>
        </div>
    </div>
@endsection