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
                            <div class="main_heading d-md-flex align-items-center">
                                <h5>Add New User</h5>
                                <a href="{{ route('manage-users') }}" class="ml-auto nav-link px-0">Back To Mange Users</a>
                            </div>
                            <!---->
                            <div class="card card-body mt-3">
                                <form action="{{ route('store-user') }}" method="post" enctype='multipart/form-data'>
                                @csrf
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group m-t-20">
                                                <label><strong>First Name</strong></label>
                                                <input type="text" class="form-control rounded-border2" required name="fname" placeholder="">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group m-t-20">
                                                <label><strong>Last Name</strong></label>
                                                <input type="text" class="form-control rounded-border2" required name="lname" placeholder="">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group m-t-20">
                                                <label><strong>Gender</strong></label>
                                                <select class="form-control rounded-border2" name="gender" required id="gender">
                                                    <option value="">Select Gender</option>
                                                    <option value="male">Male</option>
                                                    <option value="female">Female</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group m-t-20">
                                                <label><strong>Phone</strong></label>
                                                <input type="text" class="form-control rounded-border2" required name="phone" placeholder="">
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
                                                <label><strong>Password</strong></label>
                                                <input type="text" class="form-control rounded-border2" required name="password" placeholder="">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group m-t-20">
                                                <label><strong>Confirm Password</strong></label>
                                                <input type="text" class="form-control rounded-border2" required name="cpassword" placeholder="">
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
                                <div class="card card-body mt-3">
                                    <div class="form-group mb-0">
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
                                                <div class="upload__img-box">
                                                    <img class="h-100 img-fluid pb-0 img-bg" id="blah" src="http://placehold.it/180" />
                                                </div>                                                              
                                            </div>
                                        </div>
                                    </div>
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
    </script>
@endsection