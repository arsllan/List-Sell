@extends('layouts/frontapp')
@section('content')
<div class="page-heading">
  <div class="breadcrumbs">
    <div class="container">
      <div class="row">
        <div class="col-xs-12">
          <ul>
            <li class="home"> <a href="{{ route('homepage') }}" title="Go to Home Page">Home</a> <span>&rsaquo; </span> </li>
            <li class="category1601"> <strong>forgot password</strong> </li>
          </ul>
        </div>
        <!--col-xs-12--> 
      </div>
      <!--row--> 
    </div>
    <!--container--> 
  </div>
  <div class="page-title">
    <h2>forgot password Page</h2>
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
          <form action="" method="post" id="login-form">
            <input name="form_key" type="hidden" value="EPYwQxF6xoWcjLUr">
            <fieldset class="col2-set">
              <div class="registered-users">
                <strong>Registered Customers</strong>
                <div class="content">
                  <p>If you have an account with us, please log in.</p>
                  <ul class="form-list">
                    <li>
                      <label for="email">Email Address <em class="required">*</em>
                      </label>
                      <div class="input-box">
                        <input type="text" name="login[username]" value="" id="email" class="input-text required-entry validate-email" title="Email Address">
                      </div>
                    </li>
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
                    <a href="{{ route('webLogin') }}" class="button login d-inline-block" title="Login" name="send" id="send2">
                      <span>Login</span>
                    </a>
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
@endsection