@extends('layouts/frontapp')
@section('content')
<div class="page-heading">
  <div class="breadcrumbs">
    <div class="container">
      <div class="row">
        <div class="col-xs-12">
          <ul>
            <li class="home"> <a href="{{ route('homepage') }}" title="Go to Home Page">Home</a> <span>&rsaquo; </span> </li>
            <li class="category1601"> <strong>Create Acccount</strong> </li>
          </ul>
        </div>
        <!--col-xs-12--> 
      </div>
      <!--row--> 
    </div>
    <!--container--> 
  </div>
  <div class="page-title">
    <h2>Create Acccount Page</h2>
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
          <form action="{{ route('register') }}" method="post" id="login-form">
              @csrf
            <input name="form_key" type="hidden" value="EPYwQxF6xoWcjLUr">
            <fieldset class="col2-set">
              <div class="registered-users">
                <strong>Registered Customers</strong>
                <div class="content">
                  <p>If you have an account with us, please log in.</p>
                  <ul class="form-list">
                    <li>
                      <label for="name">First Name <em class="required">*</em>
                      </label>
                      <div class="input-box">
                        <input type="name" name="fname" value="" id="firstname" class="input-text required-entry" required title="First Name">
                      </div>
                    </li>
                    <li>
                      <label for="name">Last Name <em class="required">*</em>
                      </label>
                      <div class="input-box">
                        <input type="name" name="lname" value="" id="lastname" class="input-text required-entry" required title="Last Name">
                      </div>
                    </li>
                    <li>
                      <label for="email">Email Address <em class="required">*</em>
                      </label>
                      <div class="input-box">
                        <input type="text" name="email" value="" id="email" class="input-text" required title="Email Address">
                      </div>
                    </li>
                    <li>
                      <label for="pass">Password <em class="required">*</em>
                      </label>
                      <div class="input-box">
                        <input type="password" name="password" class="input-text required-entry validate-password" required id="pass" title="Password">
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
                    <button type="submit" class="button login" title="Login" name="send" id="send2">
                      <span>Create Account</span>
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
@endsection