<!DOCTYPE html>
<html lang="en">
<head>
<link rel="icon" href="{{ asset('public/front/images/favicon48x48.png')}}" />
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>List & Sell</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="Default Description">
<meta name="keywords" content="fashion, store, E-commerce">
<meta name="robots" content="*">
<link rel="icon" href="#" type="image/x-icon">
<link rel="shortcut icon" href="#" type="image/x-icon">
<meta name="_token" content="{{ csrf_token() }}">

<!-- Google Fonts -->
<meta name="keywords" content="List & Sell">
<meta name="author" content="List & Sell">
@yield('og')

<link rel="canonical" href="https://cars.alliftech.com/" />

<!-- CSS Style -->
<link rel="stylesheet" type="text/css" href="{{ asset('public/front/stylesheet/bootstrap.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('public/front/stylesheet/font-awesome.css') }}" media="all">
<link rel="stylesheet" type="text/css" href="{{ asset('public/front/stylesheet/bootstrap-select.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('public/front/stylesheet/revslider.css') }}" >
<link rel="stylesheet" type="text/css" href="{{ asset('public/front/stylesheet/owl.carousel.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('public/front/stylesheet/owl.theme.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('public/front/stylesheet/jquery.bxslider.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('public/front/stylesheet/jquery.mobile-menu.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('public/front/stylesheet/style.css') }}" media="all">
<link rel="stylesheet" type="text/css" href="{{ asset('public/front/stylesheet/responsive.css') }}" media="all">

<link href='https://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,700italic,400,600,700,800' rel='stylesheet' type='text/css'>
<link href="https://fonts.googleapis.com/css?family=Teko:300,400,500,600,700" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Saira+Condensed:300,400,500,600,700,800" rel="stylesheet">
<script type="text/javascript" src="{{ asset('public/front/js/jquery.min.js') }}"></script> 

</head>
<body>
    
<div id="page">
    <!--<div id="page-preloader"><span class="spinner"></span></div>-->
    <div id="st-preloader">
        <div class="st-preloader-wave"><img class="img-fluid" src="{{ asset('public/front/images/st-loader.png') }}" alt="preloader"></div>
    </div>
    @include('includes/frontend/header')
  <!--container-->
    @yield('content')
  <!--container-->

  <!-- Footer -->
  @include('includes/frontend/footer')
  <!-- End Footer --> 
</div>
<!--page--> 
    <!-- Mobile Menu-->
    @include('includes/frontend/mobilemenu')
    <!-- Mobile Menu-->
    <!-- Newsletter-->
    @include('includes/frontend/newsletter')
    <!-- Newsletter-->


<div id="fade" style="display: none;"></div>

<!-- JavaScript --> 
<div id="toTop" class="car-top default show car-down">
    <span><img src="{{ asset('public/front/images/totop_car.png')}}" alt="Top" title="Back to top" width="74" height="114"></span>
</div>
<!-- JavaScript --> 
<script type="text/javascript" src="{{ asset('public/front/js/bootstrap.min.js') }}"></script> 
<script src="{{ asset('public/front/js/bootstrap-slider.min.js') }}"></script> 
<script src="{{ asset('public/front/js/bootstrap-select.min.js') }}"></script> 
<script type="text/javascript" src="{{ asset('public/front/js/parallax.js') }}"></script> 
<script type="text/javascript" src="{{ asset('public/front/js/revslider.js') }}"></script> 
<script type="text/javascript" src="{{ asset('public/front/js/common.js') }}"></script> 
<script type="text/javascript" src="{{ asset('public/front/js/jquery.bxslider.min.js') }}"></script> 
<script type="text/javascript" src="{{ asset('public/front/js/owl.carousel.min.js') }}"></script> 
<script type="text/javascript" src="{{ asset('public/front/js/jquery.mobile-menu.min.js') }}"></script> 
<script src="{{ asset('public/front/js/countdown.js') }}"></script>
<script src="{{ asset('public/front/js/notify.min.js') }}"></script>
<script src="{{ asset('public/front/js/custom.js') }}"></script>
<script src="{{ asset('public/front/js/cloud-zoom.js') }}"></script>
<script>
        jQuery(document).ready(function(){
            jQuery('#rev_slider_4').show().revolution({
                dottedOverlay: 'none',
                delay: 5000,
                startwidth: 1170,
	            startheight:650,

                hideThumbs: 200,
                thumbWidth: 200,
                thumbHeight: 50,
                thumbAmount: 2,

                navigationType: 'thumb',
                navigationArrows: 'solo',
                navigationStyle: 'round',

                touchenabled: 'on',
                onHoverStop: 'on',
                
                swipe_velocity: 0.7,
                swipe_min_touches: 1,
                swipe_max_touches: 1,
                drag_block_vertical: false,
            
                spinner: 'spinner0',
                keyboardNavigation: 'off',

                navigationHAlign: 'center',
                navigationVAlign: 'bottom',
                navigationHOffset: 0,
                navigationVOffset: 20,

                soloArrowLeftHalign: 'left',
                soloArrowLeftValign: 'center',
                soloArrowLeftHOffset: 20,
                soloArrowLeftVOffset: 0,

                soloArrowRightHalign: 'right',
                soloArrowRightValign: 'center',
                soloArrowRightHOffset: 20,
                soloArrowRightVOffset: 0,

                shadow: 0,
                fullWidth: 'on',
                fullScreen: 'off',

                stopLoop: 'off',
                stopAfterLoops: -1,
                stopAtSlide: -1,

                shuffle: 'off',

                autoHeight: 'off',
                forceFullWidth: 'on',
                fullScreenAlignForce: 'off',
                minFullScreenHeight: 0,
                hideNavDelayOnMobile: 1500,
            
                hideThumbsOnMobile: 'off',
                hideBulletsOnMobile: 'off',
                hideArrowsOnMobile: 'off',
                hideThumbsUnderResolution: 0,

                hideSliderAtLimit: 0,
                hideCaptionAtLimit: 0,
                hideAllCaptionAtLilmit: 0,
                startWithSlide: 0,
                fullScreenOffsetContainer: ''
            });
        });
        </script>

<script type="text/javascript">
    function HideMe()
    {
        jQuery('.popup1').hide();
        jQuery('#fade').hide();
    }
</script>
<script type="text/javascript">
    CloudZoom.quickStart();
</script>  
<script>
      var dthen1 = new Date("12/25/17 11:59:00 PM");
      start = "08/04/15 03:02:11 AM";
      start_date = Date.parse(start);
      var dnow1 = new Date(start_date);
      if (CountStepper > 0)
      ddiff = new Date((dnow1) - (dthen1));
      else
      ddiff = new Date((dthen1) - (dnow1));
      gsecs1 = Math.floor(ddiff.valueOf() / 1000);
      
      var iid1 = "countbox_1";
      CountBack_slider(gsecs1, "countbox_1", 1);
    </script>
    @if(Session::get('success'))
        <script>
            $.notify("{{session::get('success')}}", "success");
        </script>
    @endif 
<script>


    $(".brandmain").click(function(){
        var bid = $(this).attr('data-id');
        var bname = $(this).attr('data-name');
        $.ajax({
            url: '/listingbybrand',
            type: 'POST',
            data: {_token : "{{ csrf_token() }}",brandid: bid},
            success: function (result) {
                $(".newlistingbybrand").html('');
                $(".brandtext").html("New "+bname+" For Sale");
                $(".newlistingbybrand").append(result);
                $(window).scrollTop(750);
                $("#testing").owlCarousel({
                        items: 4,
                        itemsDesktop: [1024, 4],
                        itemsDesktopSmall: [900, 3],
                        itemsTablet: [600, 2],
                        itemsMobile: [350, 1],
                        navigation: !0,
                        navigationText: ['<a class="flex-prev"></a>', '<a class="flex-next"></a>'],
                        slideSpeed: 500,
                        pagination: !1
                });
            }
        }); 
        
    });

</script>   
<script type="text/javascript">
 
    $(".remove-from-cart").click(function (e) {
        e.preventDefault();
  
        var ele = $(this);
  
        if(confirm("Are you sure want to remove?")) {
            $.ajax({
                url: '{{ route('remove.from.cart') }}',
                method: "DELETE",
                data: {
                    _token: '{{ csrf_token() }}', 
                    id: ele.parents("div").attr("data-id")
                },
                success: function (response) {
                    window.location.reload();
                }
            });
        }
    });
  
</script>
<script>
        $(document).ready(function() {
          $(".st-preloader-wave").delay(1000).fadeOut("slow");
          $("#st-preloader").delay(1000).fadeOut("slow").remove();
        });
</script>
</body>
</html>
