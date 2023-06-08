  <footer> 
    <!-- BEGIN INFORMATIVE FOOTER -->
    <div class="footer-inner">
      <!--<div class="our-features-box wow bounceInUp animated animated">-->
      <!--  <div class="container">-->
      <!--    <ul>-->
      <!--      <li>-->
      <!--        <div class="feature-box">-->
      <!--          <div class="icon-truck"><img src="{{ asset('public/front/images/world-icon.png')}}" alt="Image"></div>-->
      <!--          <div class="content">-->
      <!--            <h6>World's #1</h6>-->
      <!--            <p>Largest Auto portal</p>-->
      <!--          </div>-->
      <!--        </div>-->
      <!--      </li>-->
      <!--      <li>-->
      <!--        <div class="feature-box">-->
      <!--          <div class="icon-support"><img src="{{ asset('public/front/images/car-sold-icon.png')}}" alt="Image"></div>-->
      <!--          <div class="content">-->
      <!--            <h6>Car Sold</h6>-->
      <!--            <p>Every 4 minute</p>-->
      <!--          </div>-->
      <!--        </div>-->
      <!--      </li>-->
      <!--      <li>-->
      <!--        <div class="feature-box">-->
      <!--          <div class="icon-money"><img src="{{ asset('public/front/images/tag-icon.png')}}" alt="Image"></div>-->
      <!--          <div class="content">-->
      <!--            <h6>Offers</h6>-->
      <!--            <p>Stay updated pay less</p>-->
      <!--          </div>-->
      <!--        </div>-->
      <!--      </li>-->
      <!--      <li class="last">-->
      <!--        <div class="feature-box">-->
      <!--          <div class="icon-return"><img src="{{ asset('public/front/images/compare-icon.png')}}" alt="Image"></div>-->
      <!--          <div class="content">-->
      <!--            <h6>Compare</h6>-->
      <!--            <p>Decode the right car</p>-->
      <!--          </div>-->
      <!--        </div>-->
      <!--      </li>-->
      <!--    </ul>-->
      <!--  </div>-->
      <!--</div>-->
      <!--<div class="newsletter-row">-->
      <!--  <div class="container">-->
      <!--    <div class="row"> -->
      <!--      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 col1">-->
      <!--        <div class="newsletter-wrap">-->
      <!--          <h5>Newsletter</h5>-->
      <!--          <h4>Get Notified Of any Updates!</h4>-->
      <!--          <form action="#" method="post" id="newsletter-validate-detail1">-->
      <!--            <div id="container_form_news">-->
      <!--              <div id="container_form_news2">-->
      <!--                <input type="text" name="email" id="newsletter1" title="Sign up for our newsletter" class="input-text required-entry validate-email" placeholder="Enter your email address">-->
      <!--                <button type="submit" title="Subscribe" class="button subscribe"><span>Subscribe</span></button>-->
      <!--              </div>-->
      <!--            </div>-->
      <!--          </form>-->
      <!--        </div> -->
      <!--      </div>-->
      <!--    </div>-->
      <!--  </div>-->
      <!--</div>-->
      <div class="footer_area red_footer_area budget_footer footer_back_image">
          <div class="container">
            <div class="row">
              <div class="col-6 col-sm-3 col-lg-3 col-12">
                  <div class="about_widget">
                      <a href="{{ route('homepage') }}" class="px-0 py-2 fot general-footer-logo"><img width="200" class="img-fluid" src="{{ asset('public/front/images/general-footer-logo.svg')}}" title="general footer logo" alt="general footer logo"></a>
                  </div>
                  <div class="footer-column">
                      <h4>Cars For Sale</h4>
                      <ul class="links ul2">
                        @foreach(brands() as $brand)
                            <li class="@if($loop->iteration == 1) first @endif"><a title="{{ $brand->name  }}" href="{{ URL::to('listing?brand='.$brand->slug) }}">{{ $brand->name  }}</a></li>
                        @endforeach
                      </ul>
                  </div>
              </div>
              <div class="col-6 col-sm-3 col-lg-3 col-6">
                  <div class="footer-column">
                      <h4>Regons</h4>
                      <ul class="links">
                        @foreach(states() as $state)
                            <li class="@if($loop->iteration == 1) first @endif"><a title="{{ $state->name }}" href="{{ URL::to('listing?location='.$state->slug) }}">{{ $state->name }}</a></li>
                        @endforeach
                      </ul>
                  </div>
              </div>
              <div class="col-6 col-sm-3 col-lg-3 col-6">
                  <div class="footer-column">
                      <h4>Services</h4>
                      <ul class="links">
                        @foreach(system_categories_data() as $cat)
                            <li class="@if($loop->iteration == 1) first @endif">
                                @if($cat->slug == 'parts')
                                    <a href="{{ URL::to('parts') }}" >
                                @else
                                    <a title="{{ $cat->name }} For Sale" href="{{ URL::to('listing?category='.$cat->slug) }}">
                                @endif
                                
                                    {{ $cat->name }} For Sale
                                </a>
                            </li>
                        @endforeach                          
                      </ul>
                  </div>
              </div>
              <div class="col-6 col-sm-3 col-lg-3 col-6">
                  <div class="footer-column">
                      <h4>Car Dealer</h4>
                      <ul class="links">
                        <li class="first"><a title="Contact Us" href="{{ route('contact-us') }}">Contact Us</a></li>
                        <li class="first"><a title="Dealer Advertising" href="{{ route('dealer-advertising') }}">Dealer Advertising</a></li>
                        <li class="first"><a title="Email Disclaimer" href="{{ route('email-disclaimer') }}">Email Disclaimer</a></li>
                        <li class="first"><a title="Terms of Use" href="{{ route('term-of-use') }}">Terms of Use</a></li>
                        <li class="first"><a title="PAIA Manual" href="{{ route('paia-manual') }}">PAIA Manual</a></li>
                        <li class="first"><a title="Support" href="{{ route('support') }}">Support</a></li>
                      </ul>
                  </div>
              </div>
            </div>
            <!---->
            <div class="f_card_inner subscribe_widget text-center text-lg-start d-block mt-4 d-lg-flex">
                <div class="left mb-3 mb-sm-0">
                    <form action="/motodeal/budget/#wpcf7-f453-o1" method="post" class="wpcf7-form init" novalidate="novalidate" data-status="init">
                        <div class="input-group"><span class="wpcf7-form-control-wrap email">
                            <input type="text" name="email" value="" size="40" class="wpcf7-form-control wpcf7-text form-control" aria-invalid="false" placeholder="Your Email"></span>
                            <div class="input-group-append">
                                <button class="wpcf7-form-control wpcf7-submit btn btn-outline-secondary red"><i class="fa fa-long-arrow-right" aria-hidden="true"></i></button>
                                <span class="ajax-loader"></span>
                            </div>
                        </div>
                        <div class="wpcf7-response-output"></div>
                    </form>
				</div>
				<div class="right">
                    <ul class="nav justify-content-between justify-content-sm-start">
                        <li><a href="https://www.facebook.com/" target="_blank" rel="nofollow"><i aria-hidden="true" class="fa fa-facebook-f"></i></a></li> 
                        <li><a href="https://www.youtube.com/" target="_blank" rel="nofollow"><i aria-hidden="true" class="fa fa-youtube"></i></a></li> 
                        <li><a href="https://twitter.com/?lang=en" target="_blank" rel="nofollow"><i aria-hidden="true" class="fa fa-twitter"></i></a></li> 
                        <li><a href="https://www.google.com/" target="_blank" rel="nofollow"><i aria-hidden="true" class="fa fa-google-plus"></i></a></li> 
                    </ul>
    				<!--<ul class="nav justify-content-center justify-content-end-center">-->
    				<!--	<li><a href="" target="_blank" re="nofollow"><img src="{{ asset('public/front/images/card-1.png')}}" title="card-1" alt="card-1"></a></li> -->
    				<!--	<li><a href="https://www.americanexpress.com/bangladesh/homepage.shtml" target="_blank" rel="nofollow"><img src="{{ asset('public/front/images/card-3.png')}}" title="card-3" alt="card-3"></a></li> -->
    				<!--	<li><a href="https://www.mastercard.us/en-us.html" target="_blank" rel="nofollow"><img src="{{ asset('public/front/images/card-2.png')}}" title="card-2" alt="card-2"></a></li> -->
    				<!--	<li><a href="https://www.discover.com/" target="_blank" rel="nofollow"><img src="{{ asset('public/front/images/card-4.png')}}" title="card-4" alt="card-4"></a></li> -->
    				<!--</ul>-->
    			</div>
            </div>
            <!---->
            <div class="copyright_inner text-center text-lg-start d-block d-lg-flex justify-content-between align-items-center">
			    <div class="left"><p>Copyright Reserved by <a href="https://cars.alliftech.com/">List & Sell </a>&nbsp;2023</p></div>
				<div class="right">
					<ul class="nav justify-content-center justify-content-end-center">
						<li><a href="#">Privacy Policy</a></li>
						<li><a href="#">Returns Policy</a></li>
					</ul>
				</div>
			</div>
        </div>
      </div>
      
      <!--container--> 
    </div>
    <!-- BEGIN SIMPLE FOOTER --> 
  </footer>