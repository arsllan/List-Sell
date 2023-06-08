@extends('layouts/frontapp')
@section('content')
<div class="page-heading">
  <div class="breadcrumbs">
    <div class="container">
      <div class="row">
        <div class="col-xs-12">
          <ul>
            <li class="home"> <a href="{{ route('homepage') }}" title="Go to Home Page">Home</a> <span>&rsaquo; </span> </li>
            <li class="category1601"> <strong>Dealer Register Page</strong> </li>
          </ul>
        </div>
        <!--col-xs-12--> 
      </div>
      <!--row--> 
    </div>
    <!--container--> 
  </div>
  <div class="page-title">
    <h2>Dealer Register Page</h2>
  </div>
</div>
<!--breadcrumbs-->

<div class="main-container col1-layout wow bounceInUp animated animated" style="visibility: visible;">
  <div class="main">
  <div class="row">
  <div class="col-4 mx-auto">
    <div class="account-login">
        <div class="card-body p-4">
          <!--page-title-->
          <form action="{{ route('registerdealer-indb') }}" method="post" id="login-form">
            @csrf
            <fieldset class="col2-set">
              <div class="registered-users">
                <!--<strong>Registered Customers</strong>-->
                <div class="content">
                  <!--<p>If you have an account with us, please log in.</p>-->
                  <!--alert message-->
                  <ul class="form-list">
                    <li>
                      <label for="email">Login Id <em class="required">*</em>
                      </label>
                      <div class="input-box">
                        <input type="text" name="loginid" id="loginid" value="{{ old('loginid') }}" class="input-text mb-1"  title="Login id">
                        @if ($errors->has('loginid'))
                            <span class="text-danger">{{ $errors->first('loginid') }}</span>
                        @endif                       
                      </div>
                    </li>
                    <li>
                      <label for="email">Dealership Name <em class="required">*</em>
                      </label>
                      <div class="input-box">
                        <input type="text" name="dealername" id="dealername" value="{{ old('dealername') }}" class="input-text mb-1"  title="Email Address">
                        @if ($errors->has('dealername'))
                            <span class="text-danger">{{ $errors->first('dealername') }}</span>
                        @endif                        
                      </div>
                    </li>

                    <!--<li>-->
                    <!--  <label for="email">Contact Person <em class="required">*</em>-->
                    <!--  </label>-->
                    <!--  <div class="input-box">-->
                    <!--    <input type="text" name="contactperson" id="contactperson" value="{{ old('contactperson') }}" class="input-text mb-1"  title="Email Address">-->
                    <!--    @if ($errors->has('contactperson'))-->
                    <!--        <span class="text-danger">{{ $errors->first('contactperson') }}</span>-->
                    <!--    @endif                       -->
                    <!--  </div>-->
                    <!--</li>-->
                    <li>
                      <label for="email">Region <em class="required">*</em>
                      </label>
                      <div class="input-box">
                        <select name="region" class="mb-1" id="region" title="Select Region">
                            <option value="" select>Select Region</option>
                            @foreach($states as $state)
                                <option value="{{ $state->id }}">{{ $state->name }}</option>
                            @endforeach
                        </select>  
                        @if ($errors->has('region'))
                            <span class="text-danger">{{ $errors->first('region') }}</span>
                        @endif                         
                      </div>
                    </li>
                    <!--<li>-->
                    <!--  <label for="email">City / Town <em class="required">*</em>-->
                    <!--  </label>-->
                    <!--  <div class="input-box">-->
                    <!--    <select name="city" id="city" class="mb-1" title="Select City">-->
                    <!--        <option value="" select>Select City</option>-->
                    <!--    </select>  -->
                    <!--    @if ($errors->has('city'))-->
                    <!--        <span class="text-danger">{{ $errors->first('city') }}</span>-->
                    <!--    @endif -->
                    <!--  </div>-->
                    <!--</li>-->
                    <!--<li>-->
                    <!--  <label for="email">Telephone <em class="required">*</em>-->
                    <!--  </label>-->
                    <!--  <div class="input-box">-->
                    <!--    <input type="text" name="telephone" value="{{ old('telephone') }}" id="telephone" class="input-text mb-1" title=Telephone>-->
                    <!--    @if ($errors->has('telephone'))-->
                    <!--        <span class="text-danger">{{ $errors->first('telephone') }}</span>-->
                    <!--    @endif -->
                    <!--  </div>-->
                    <!--</li>-->
                    <!--<li>-->
                    <!--  <label for="email">Cell (optional)-->
                    <!--  </label>-->
                    <!--  <div class="input-box">-->
                    <!--    <input type="text" name="cell" value="{{ old('cell') }}" id="cell" class="input-text"  title="Cell phone">-->
                    <!--  </div>-->
                    <!--</li>-->
                    <li>
                      <label for="email">Email Address <em class="required">*</em>
                      </label>
                      <div class="input-box">
                        <input type="text" name="email" value="{{ old('email') }}" id="email" class="input-text mb-1"  title="Email Address">
                        @if ($errors->has('email'))
                            <span class="text-danger">{{ $errors->first('email') }}</span>
                        @endif                         
                      </div>
                    </li>
                    <!--<li>-->
                    <!--  <label for="pass">Password <em class="required">*</em>-->
                    <!--  </label>-->
                    <!--  <div class="input-box">-->
                    <!--    <input type="password" name="password" class="input-text mb-1" value="{{ old('password') }}"  id="password" title="Password">-->
                    <!--    @if($errors->has('password'))-->
                    <!--        <span class="text-danger">{{ $errors->first('password') }}</span>-->
                    <!--    @endif                        -->
                    <!--  </div>-->
                    <!--</li>-->
                    <!--<li>-->
                    <!--  <label for="pass">Confirm Password <em class="required">*</em>-->
                    <!--  </label>-->
                    <!--  <div class="input-box">-->
                    <!--    <input type="password" name="password_confirmation" value="{{ old('password_confirmation') }}" class="input-text"  id="password_confirmation" title="Confirm Password">-->
                    <!--    @if($errors->has('password_confirmation'))-->
                    <!--        <span class="text-danger">{{ $errors->first('password_confirmation') }}</span>-->
                    <!--    @endif                          -->
                    <!--  </div>-->
                    <!--</li>-->
                  </ul>
                  <div class="remember-me-popup">
                    <div class="remember-me-popup-head" style="display:none">
                      <h3 id="text2">What's this?</h3>
                      <a href="#" class="remember-me-popup-close" onClick="showDiv()" title="Close">Close</a>
                    </div>
                    <div class="remember-me-popup-body" style="display:none">
                      <p id="text1">Checking "Remember Me" will let you access your shopping cart on this computer when you are logged out</p>
                      <div class="remember-me-popup-close-button a-right">
                        <a href="#" class="remember-me-popup-close button" title="Close" onClick="showDiv()">
                          <span>Close</span>
                        </a>
                      </div>
                    </div>
                  </div>
                  <p class="required">* Required Fields</p>
                  <div class="buttons-set">
                    <button type="submit" class="button login" title="Login" name="send" id="send2">
                      <span>Submit</span>
                    </button>
                  </div>
                  <!--buttons-set-->
                </div>
                <!--content-->
              </div>
              <!--col-2 registered-users-->
            </fieldset>
            <!--col2-set-->
          </form>
      </div>
    </div>
    </div>
    </div>
    <!--account-login-->
  </div>
  <!--main-container-->
</div>
<!--col1-layout-->
    <script>
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