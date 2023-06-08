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
                            <div class="main_heading mb-3 d-md-flex align-items-center">
                                <h5>Add New Dealer</h5>
                                <a href="{{ route('manage-dealers') }}" class="ml-auto nav-link px-0">Back To Manage Dealers</a>
                            </div>
                            <!---->
                            <form action="{{ route('store-dealer') }}" method="post" enctype='multipart/form-data'>
                            @csrf
                                <div class="card card-body mb-3">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group m-t-20">
                                                <label><strong>Dealership Name</strong></label>
                                                <input type="text" class="form-control rounded-border2" required name="dealername" placeholder="">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group m-t-20">
                                                <label><strong>Telephone</strong></label>
                                                <input type="text" class="form-control rounded-border2" required name="telephone" placeholder="">
                                            </div>
                                        </div>                                        
                                        <div class="col-lg-6">
                                            <div class="form-group m-t-20">
                                                <label><strong>Tracking Number</strong></label>
                                                <input type="text" class="form-control rounded-border2" name="trackingno" placeholder="">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group m-t-20">
                                                <label><strong>Email Address</strong></label>
                                                <input type="text" class="form-control rounded-border2" required name="email" placeholder="">
                                            </div>
                                        </div>        
                                        <div class="col-lg-6">
                                            <div class="form-group m-t-20">
                                                <label><strong>Region</strong></label>
                                                <select class="form-control rounded-border2" name="region" required id="region">
                                                    <option value="">Select Region</option>
                                                    @foreach($states as $state)
                                                        <option value="{{ $state->id }}">{{ $state->name }}</option>
                                                    @endforeach                                                                
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group m-t-20">
                                                <label><strong>City / Town</strong></label>
                                                <select class="form-control rounded-border2" name="city" required id="city">
                                                    <option value="">Select City</option>
                                                </select>
                                            </div>
                                        </div> 
                                        <div class="col-lg-6">
                                            <div class="form-group m-t-20">
                                                <label><strong>Physical Address:*</strong></label>
                                                <input type="text" class="form-control rounded-border2" required name="physical_address" placeholder="">
                                            </div>
                                        </div>                                        
                                        <div class="col-lg-6">
                                            <div class="form-group m-t-20">
                                                <label><strong>Zip Code:</strong></label>
                                                <input type="text" class="form-control rounded-border2" required name="zipcode" placeholder="">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group m-t-20">
                                                <label><strong>Cell (optional)</strong></label>
                                                <input type="text" class="form-control rounded-border2"  name="cell" placeholder="">
                                            </div>
                                        </div>                                        
                                        <div class="col-lg-6">
                                            <div class="form-group m-t-20">
                                                <label><strong>Contact Person</strong></label>
                                                <input type="text" class="form-control rounded-border2" name="contactperson" placeholder="">
                                            </div>
                                        </div>                                        
                                        <div class="col-lg-6">
                                            <div class="form-group m-t-20">
                                                <label><strong>Contact Person Account</strong></label>
                                                <input type="text" class="form-control rounded-border2" name="contactpersonaccount" placeholder="">
                                            </div>
                                        </div>                                        
                                        <div class="col-lg-6">
                                            <div class="form-group m-t-20">
                                                <label><strong>Email Accounts:</strong></label>
                                                <input type="text" class="form-control rounded-border2" name="emailaccounts" placeholder="">
                                            </div>
                                        </div>                                        
                                        <div class="col-lg-6">
                                            <div class="form-group m-t-20">
                                                <label><strong>Registered Company Name:*</strong></label>
                                                <input type="text" class="form-control rounded-border2" name="registered_company_name" placeholder="">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group m-t-20">
                                                <label><strong>Company Registration Number:*</strong></label>
                                                <input type="text" class="form-control rounded-border2" name="company_registration_number" placeholder="">
                                            </div>
                                        </div>                                        
                                        <div class="col-lg-6">
                                            <div class="form-group m-t-20">
                                                <label><strong>Postal Address details:*</strong></label>
                                                <input type="checkbox" class="" required id="addressCheckbox" value="1" name="postal_address_details"> Same as physical address
                                            </div>
                                        </div>                                        
                                        <div class="col-lg-6" id="postal_region">
                                            <div class="form-group m-t-20">
                                                <label><strong>Region:</strong></label>
                                                <select class="form-control rounded-border2" name="postal_region">
                                                    <option value="">Select Region</option>
                                                    @foreach($states as $state)
                                                        <option value="{{ $state->id }}">{{ $state->name }}</option>
                                                    @endforeach                                                                
                                                </select>                                                
                                            </div>
                                        </div>
                                        <div class="col-lg-6" id="postal_city">
                                            <div class="form-group m-t-20">
                                                <label><strong>Town/City:</strong></label>
                                                <select class="form-control rounded-border2" name="postal_city">
                                                    <option value="">Select City</option>
                                                </select>                                                
                                            </div>
                                        </div>
                                        <div class="col-lg-6" id="postal_address">
                                            <div class="form-group m-t-20">
                                                <label><strong>Postal Address:</strong></label>
                                                <input type="text" class="form-control rounded-border2" name="postal_address" placeholder="">
                                            </div>
                                        </div>
                                        <div class="col-lg-6" id="postal_zipcode">
                                            <div class="form-group m-t-20">
                                                <label><strong>Code:</strong></label>
                                                <input type="text" class="form-control rounded-border2" name="post_zipcode" placeholder="">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group m-t-20">
                                                <label><strong>VAT Number:</strong></label>
                                                <input type="text" class="form-control rounded-border2" name="vat_number" placeholder="">
                                            </div>
                                        </div>                                        
                                        <div class="col-lg-6">
                                            <div class="form-group m-t-20">
                                                <label><strong>Password</strong></label>
                                                <input type="text" class="form-control rounded-border2" required name="password" placeholder="">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group m-t-20">
                                                <label><strong>Notes:(visible for admin only):*</strong></label>
                                                <input type="text" class="form-control rounded-border2" name="notes" placeholder="">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group m-t-20">
                                                <label><strong>Trial period:*</strong></label>
                                                <select class="form-control rounded-border2" name="trail_period" required>
                                                    <option value="">Select Option</option>
                                                    <option value="30">30 Days</option>
                                                    <option value="60">60 Days</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group m-t-20">
                                                <label><strong>Dealer type:*</strong></label>
                                                <select class="form-control rounded-border2" name="dealer_type" required>
                                                    <option value="">Select Option</option>
                                                    <option value="used car">Used Car</option>
                                                    <option value="new car">New Car</option>
                                                    <option value="both">Both</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group m-t-20">
                                                <label><strong>Facebook:</strong></label>
                                                <input type="text" class="form-control rounded-border2" name="facebook" placeholder="">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group m-t-20">
                                                <label><strong>Twitter:</strong></label>
                                                <input type="text" class="form-control rounded-border2" name="twitter" placeholder="">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group m-t-20">
                                                <label><strong>LinkedIn:</strong></label>
                                                <input type="text" class="form-control rounded-border2" name="linkedin" placeholder="">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group m-t-20">
                                                <label><strong>Instagram:</strong></label>
                                                <input type="text" class="form-control rounded-border2" name="instagram" placeholder="">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group m-t-20">
                                                <label><strong>Pinterest</strong></label>
                                                <input type="text" class="form-control rounded-border2" name="pinterest" placeholder="">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group m-t-20">
                                                <label><strong>Featured</strong></label>
                                                <select class="form-control rounded-border2" name="featured" id="featured">
                                                    <option value="">Select Option</option>
                                                    <option value="1">Yes</option>
                                                    <option value="0" selected>No</option>
                                                </select>
                                            </div>
                                        </div>    
                                        <div class="col-lg-6">
                                            <div class="form-group m-t-20">
                                                <label><strong>Document File</strong></label>
                                                <input type="file" class="form-control rounded-border2" required name="document" placeholder="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!---->
                                <div class="card card-body mb-3">
                                    <div class="form-group">
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
                                            <div class="upload__img-wrap w-100">
                                                <div class=" upload__img-box">
                                                    <img class="h-100 img-fluid pb-0 img-bg" id="blah" src="http://placehold.it/180" />
                                                </div>                                                              
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card card-body">
                                    <div class="form-group">
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
                                            <div class="upload__img-wrap w-100">
                                                <div class=" upload__img-box">
                                                    <img class="h-100 img-fluid pb-0 img-bg" id="blahh" src="http://placehold.it/180" />
                                                </div>                                                              
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!---->
                                <div class="w-100 mt-3 text-right">
                                    <button type="submit" class="btn btn-next d-inline-flex">Save</button>
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
$(document).ready(function () {
  ImgUpload();
});
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
  ImgUpload();
});
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
        $(document).ready(function () {
            $('#postal_region').on('change', function () {
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
                        $('#postal_city').html('<option value="">Select City</option>');
                        $.each(res.cities, function (key, value) {
                            $("#city").append('<option value="' + value
                                .id + '">' + value.name + '</option>');
                        });
                    }
                });
            });
        });
    </script>
    <script>
        $(document).ready(function() {
          // Hide the inputs initially
        //   $("#address1").hide();
        //   $("#address2").hide();
        
          // Handle checkbox change event
          $("#addressCheckbox").change(function() {
            if ($(this).is(":checked")) {
              // Checkbox is checked, show the inputs
              $("#postal_region").hide();
              $("#postal_city").hide();
              $("#postal_address").hide();
              $("#postal_zipcode").hide();
            } else {
              // Checkbox is unchecked, hide the inputs
              $("#postal_region").show();
              $("#postal_city").show();
              $("#postal_address").show();
              $("#postal_zipcode").show();
            }
          });
        });
</script>

@endsection