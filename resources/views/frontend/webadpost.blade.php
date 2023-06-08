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
    <h2>Ads Post Page</h2>
  </div>
</div>
    <div class="content">
        <div class="container-fluid">
            <div class="row mb-5 mb-xxl-0 whitebg"> 
                <div class="col-xxl-10 col-xl-7 col-lg-10 col-11 mx-auto my-5 generalcategory">
                    <h4 class="mb-3 text-center fontsize22">Select Category</h4>
                    <p class="fontsize16 text-center">What are you listing today?</p>
                    <!--<div class="mx-lg-auto mx-0 col-12 col-lg-5">-->
                    <!--    <div class="card card-body">-->
                    <!--        <ul class="list-unstyled m-0">-->
                    <!--            @foreach(system_categories_data() as $cat)-->
                    <!--            <li data-val="{{ $cat->id }}" class="cat=list-li" style="border-bottom:1px solid #dedede;font-weight:bold; padding:8px;">{{ $cat->name }}</li>-->
                    <!--            @endforeach-->
                    <!--        </ul>-->
                    <!--    </div>-->
                    <!--</div>-->
                    <ul class="list-unstyled split-list">
                        @foreach(system_categories_data() as $cat)
                        <li data-val="{{ $cat->id }}" class="split-item">
                            <span class="category-text">{{ $cat->name }}</span>
                        </li>
                        @endforeach
                    </ul>
                </div>
                <div class="col-xxl-9 col-xl-9 col-lg-10 col-11 mx-auto mt-5 mb-5 mainform" style="display:none;">
                    <form action="{{ route('webpostadd-store') }}" method="post" enctype='multipart/form-data'>
                        @csrf
                        <div class="mx-auto col-xl-8 col-lg-9 col-12">
                            <div class="row">
                                <div class="col-lg-12 mb-3">
                                    <div class="form-group">
                                        <label class="mb-1 d-flex align-items-center justify-content-between"><strong class="d-block labels">Category</strong> <strong class="d-block reqired">(Required)</strong></label>
                                        <select class="form-select" id="category_id" name="category_id" required aria-label="Default select example">
                                          <option value="">-- Please Select --</option>
                                            @foreach(system_categories_data() as $cat)
                                                <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-12 mb-3">
                                    <div class="form-group">
                                        <label class="mb-1 d-flex align-items-center justify-content-between"><strong class="d-block labels">Condition</strong> <strong class="d-block reqired">(Required)</strong></label>
                                        <select class="form-select w-100 rounded-border2" name="auto_condition">
                                            <option value="">-- Please Select --</option>
                                            <option value="Used">Used</option>
                                            <option value="New">New</option>
                                            <option value="Demo">Demo</option>
                                        </select>
                                    </div>
                                </div> 
                                <div class="col-lg-12 mb-3">
                                    <div class="form-group">
                                        <label class="mb-1 d-flex align-items-center justify-content-between"><strong class="d-block labels">Title</strong> <strong class="d-block reqired">(Required)</strong></label>
                                        <input type="text" class="form-control rounded-border2" name="title" placeholder="eg: Gorgeous mercedes benz e-class..." aria-label="Username" aria-describedby="basic-addon1">
                                    </div>
                                </div>
                                <div class="col-lg-12 mb-3">
                                    <div class="form-group">
                                        <label class="mb-1 d-flex align-items-center justify-content-between"><strong class="d-block labels">Location</strong> <strong class="d-block reqired">(Required)</strong></label>
                                        <select class="form-select" id="location" name="location" required>
                                            <option value="">Select Location</option>
                                            @foreach(states() as $state)
                                                <option value="{{ $state->id }}">{{ $state->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>                                                    
                                                    
                                <div class="col-lg-12 mb-3">
                                    <div class="form-group">
                                        <label class="mb-1 d-flex align-items-center justify-content-between"><strong class="d-block labels">Price</strong> <strong class="d-block reqired">(Required)</strong></label>
                                        <input type="text" class="form-control w-100 rounded-border2" name="price" placeholder="eg: 10000">
                                    </div>
                                </div>                                                    
                                <div class="col-lg-12 mb-3">
                                    <div class="form-group">
                                        <label class="mb-1 d-flex align-items-center justify-content-between"><strong class="d-block labels">Descriptions</strong> <strong class="d-block reqired">(Required)</strong></label>
                                        <textarea id="myeditorinstance" rows="6" class="form-control w-100 h-auto" name="descriptions"></textarea>
                                    </div>
                                </div>                                                    													
                                <div class="col-lg-12 mb-3">
                                    <div class="form-group mb-0">
                                      <label class="mb-1 d-flex align-items-center justify-content-between"><strong class="d-block labels">Feature Image</strong> <strong class="d-block reqired">(Required)</strong></label>
                                      <input class="form-control h-auto" name="image" type="file" id="formFile">
                                    </div>
                                </div>
                                <div class="col-lg-12 mb-3">
                                    <div class="form-group">
                                        <label class="mb-1 d-flex align-items-center justify-content-between"><strong class="d-block labels">Phone Number</strong> <strong class="d-block reqired">(Required)</strong></label>
                                        <input type="number" class="form-control rounded-border2" name="phone" placeholder="Type your phone number">
                                    </div>
                                </div>
                                <div class="col-lg-12 mb-3">
                                    <div class="form-group">
                                        <label class="mb-1 d-flex align-items-center justify-content-between"><strong class="d-block labels">Email Address</strong> <strong class="d-block reqired">(Required)</strong></label>
                                        <input type="email" class="form-control rounded-border2" name="email" placeholder="Type your email address">
                                    </div>
                                </div>
                                <div class="col-lg-12 mb-3">
                                    <div class="p-3" style="background:#fff; border: 1px solid #dedede; border-radius: 8px;">
                                        <h6 class="profileTile mb-3" style="font-size: 0.896rem;font-weight: 700;">Get Verified</h6>
                                        <p class="mb-1" style="font-weight: 700;">Please provide your id document</p>
                                        <input class="form-control h-auto" type="file" name="document_id"  id="formFile">
                                        <p class="m-0"><img class="img-fluid me-2" src="{{ asset('public/front/images/infoicon.svg') }}" alt="icon"/> JPG, JPEG, PNG Min: 400px, Max: 1024px</p>
                                    </div>
                                </div>
                                <div class="col-lg-12 mb-3">
                                    <div class="form-group">
                                        <label class="mb-1 d-flex align-items-center justify-content-between"><strong class="d-block labels">Promote my ad</strong> <strong class="d-block reqired">(Required)</strong></label>
                                        <div class="postadFeature">
                                            <div class="featureInfo mb-2 d-md-flex align-items-center">
                                                <div class="featureIcon"><img class="img-fluid" src="{{ asset('public/front/images/downloadddd.svg')}}" alt="icon"/></div>
                                                <div class="w-100 ms-auto px-2 px-md-0">
                                                    <h5 class="featureTitle">Top Ad <span class="">&nbsp;-&nbsp;</span> <a href="#" data-bs-toggle="modal" data-bs-target="#exampleLinkModal" class="inline-block exampleLink">See example</a></h5>
                                                    <p class="paraGraph">Feature your ad in rotation on top of Category Pages.</p>
                                                </div>
                                            </div>
                                            <ul class="list-unstyled mb-0 d-md-flex align-items-center">
                                                <li class="featureOption">
                                                    <div class="form-check w-100 p-0 d-flex align-items-center">
                                                        <div class="featureCheckbox">
                                                            <input class="form-check-input" type="checkbox" value="" id="flexCheckOne">
                                                            <span class="checkbox-text">Add</span>
                                                        </div>
                                                        <label class="form-check-label ps-3" for="flexCheckOne"><span>7 days</span><br/> <span>R370</span></label>
                                                    </div>
                                                </li>
                                                <li class="featureOption">
                                                    <div class="form-check w-100 p-0 d-flex align-items-center">
                                                        <div class="featureCheckbox">
                                                            <input class="form-check-input" type="checkbox" value="" id="flexCheckTwo">
                                                            <span class="checkbox-text">Add</span>
                                                        </div>
                                                        <label class="form-check-label ps-3" for="flexCheckTwo"><span>7 days</span><br/> <span>R370</span></label>
                                                    </div>
                                                </li>
                                                <li class="featureOption">
                                                    <div class="form-check w-100 p-0 d-flex align-items-center">
                                                        <div class="featureCheckbox">
                                                            <input class="form-check-input" type="checkbox" value="" id="flexCheckThree">
                                                            <span class="checkbox-text">Add</span>
                                                        </div>
                                                        <label class="form-check-label ps-3" for="flexCheckThree"><span>7 days</span><br/> <span>R370</span></label>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
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
    <!---->
    <div class="modal fade" id="exampleLinkModal" tabindex="-1" aria-labelledby="exampleLinkModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-center w-100">Top Ad</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <ul class="mb-2 list-unstyled feature-long-description">
                    <li>&nbsp; The first ad people see in each category</li>
                    <li>&nbsp; Easy to find, easy to reply</li>
                </ul>
                <small><strong>Tip:</strong>  Make sure your Ad title and description clearly explain what you’re selling, for maximum effectiveness.</small>
            </div>
        </div>
    </div>
    <!---->
    <script>
        $(document).on('click', '.split-item', function() {
            $('#category_id').val($(this).attr("data-val"));
            $(".mainform").css('display','block');
            $(".generalcategory").css('display','none');
        });
    </script>
@endsection