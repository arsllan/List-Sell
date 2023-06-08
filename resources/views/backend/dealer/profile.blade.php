@extends('layouts.backendapp')
@section('content')
<style>
.upload__inputfilee {
  width: 0.1px;
  height: 0.1px;
  opacity: 0;
  overflow: hidden;
  position: absolute;
  z-index: -1;
}

</style>
    <div class="l-main">
        <div class="content-wrapper">
            <div class="container-fluid">
                <div class="content-wrapper-content">
                    <div class="d-md-flex align-items-center mb-3">
                        <div class="main_heading"><h5 class="">Profile</h5></div>
                        <!--<a href="{{ route('create-brand') }}" class="btn ml-auto btn-next"><i class="fa mr-2 fa-plus"></i> Add Brand</a>-->
                    </div>
                    @if (\Session::has('success'))
                        <div class="alert alert-success">
                            {!! \Session::get('success') !!}
                        </div>
                    @endif
                    <form action="{{ route('update-dealer-profile') }}" method="post" enctype='multipart/form-data'>
                    @csrf
                    <div class="card card-body mb-3">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group m-t-20">
                                    <label><strong>Dealership Name</strong></label>
                                    <input type="text" class="form-control rounded-border2" required name="dealername" value="{{ $user->dealerdata->dealership_name }}">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group m-t-20">
                                    <label><strong>Contact Person</strong></label>
                                    <input type="text" class="form-control rounded-border2" required name="contactperson" value="{{ $user->dealerdata->contact_person }}">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group m-t-20">
                                    <label><strong>Region</strong></label>
                                    <select class="form-control rounded-border2" name="region" required id="region">
                                        <option value="">Select Region</option>
                                        @foreach($states as $state)
                                            <option value="{{ $state->id }}" @if($state->id == $user->dealerdata->region) selected @endif>{{ $state->name }}</option>
                                        @endforeach                                                                
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group m-t-20">
                                    <label><strong>City / Town</strong></label>
                                    <select class="form-control rounded-border2" name="city" required id="city">
                                        <option value="">Select City</option>
                                        <option value="{{ $user->dealerdata->city }}" selected>{{ $city->name }}</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group m-t-20">
                                    <label><strong>Telephone</strong></label>
                                    <input type="text" class="form-control rounded-border2" required name="telephone" value="{{ $user->dealerdata->telephone }}">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group m-t-20">
                                    <label><strong>Cell (optional)</strong></label>
                                    <input type="text" class="form-control rounded-border2"  name="cell" value="{{ $user->dealerdata->cell }}">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group m-t-20">
                                    <label><strong>Email Address</strong></label>
                                    <input type="text" class="form-control rounded-border2" name="email" value="{{ $user->email }}">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group m-t-20">
                                    <label><strong>Document File</strong></label>
                                    <input type="file" class="form-control rounded-border2" name="document" placeholder="">
                                </div>
                            </div>
                        </div>
                    </div>
                    <!---->
                    <div class="card card-body mb-3">
                        <div class="col-lg-3 mb-0">
                            <label><strong>Profile Image</strong></label>
                            <!--<input type="file" class="form-control rounded-border2" name="image" placeholder="">-->
                            <div class="upload__box">
                              <div class="upload__btn-box">
                                <label class="upload__btn">Choose File
                                    <input type="file"  name="image" data-max_length="20" class="upload__inputfilee"  onchange="readURL(this);">
                                </label>
                              </div>
                            </div>
                            <div class="upload__box">
                                <div class="upload__img-wrap w-100 m-0">
                                    <div class=" upload__img-box">
                                        <img class="h-100 img-fluid pb-0 img-bg" id="blah" src="{{ asset('public/uploads/profile/'.$user->image) }}" />
                                    </div>                                                              
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card card-body">
                        <div class="col-lg-3 mb-0">
                            <label><strong>Banner Image</strong></label>
                            <!--<input type="file" class="form-control rounded-border2" name="image" placeholder="">-->
                            <div class="upload__box">
                              <div class="upload__btn-box">
                                <label class="upload__btn">Choose File
                                    <input type="file"  name="bannerimage" data-max_length="20" class="upload__inputfilee"  onchange="readURLL(this);">
                                </label>
                              </div>
                            </div>
                            <div class="upload__box">
                                <div class="upload__img-wrap w-100 m-0">
                                    <div class="upload__img-box">
                                        <img class="h-100 img-fluid pb-0 img-bg" id="blahh" src="{{ asset('public/uploads/dealers/banners/'.$user->dealerdata->banner_image) }}" />
                                    </div>                                                              
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
    <script>
     function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#blah')
                    .attr('src', e.target.result);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }

 function readURLL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#blahh')
                    .attr('src', e.target.result);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }

        $(document).ready(function () {
            $('#region').on('change', function () {
                var idState = this.value;
                $("#city").html('');
                $.ajax({
                    url: "{{route('fetch-cities')}}",
                    type: "POST",
                    data: {
                        state_id: idState,
                        _token: '{{csrf_token()}}'
                    },
                    dataType: 'json',
                    success: function (res) {
                        $('#city').html('<option value="">Select City</option>');
                        $.each(res.cities, function (key, value) {
                            $("#city").append('<option value="' + value
                                .id + '">' + value.name + '</option>');
                        });
                    }
                });
            });
        });
    </script>            
@endsection