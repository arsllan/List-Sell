@extends('layouts.backendapp')
@section('content')



<style>
    .table-loader{
   visibility:hidden;
}
.table-loader:before {
    visibility:visible;
    display:table-caption;
    content: " ";
    width: 100%;
		height: 600px;
		background-image:
		linear-gradient( rgba(235, 235, 235, 1) 1px, transparent 0 ),
      linear-gradient(90deg, rgba(235, 235, 235, 1) 1px, transparent 0 ),
      linear-gradient( 90deg, rgba(255, 255, 255, 0), rgba(255, 255, 255, 0.5) 15%, rgba(255, 255, 255, 0) 30% ),
      linear-gradient( rgba(240, 240, 242, 1) 35px, transparent 0 )
			;

		background-repeat: repeat;

		background-size:
			1px 35px,
			calc(100% * 0.1666666666) 1px,
      30% 100%,
      2px 70px;

		background-position:
			0 0,
      0 0,
      0 0,
			0 0;

		animation: shine 0.5s infinite;
	}

	@keyframes shine {
		to {
			background-position:
				0 0,
        0 0,
        40% 0,
				0 0;
		}
	}
    .in_text{
      display:none;
    }
    .editable{ 
    width:100%;
    
    }
    .asd{
      border-bottom : 1px dashed #333;
    }
    .text{
    display: inline;   
    }	
</style>
          <div class="l-main">
                <div class="content-wrapper">
                    <div class="container-fluid">
                        <div class="content-wrapper-content">
                            <div class="d-md-flex align-items-center mb-3 justify-content-center justify-content-lg-start">
                                <div class="main_heading"><h5>Deals Listings</h5></div>
                            </div>
                            <div class="card card-body">
                                @if(session()->has('success'))
                                    <div class="alert alert-success">
                                        {{ session()->get('success') }}
                                    </div>
                                @endif
                                <div class="table-responsive-sm">
                                    <table class="table w-100 mt-4 table-striped datatable table-loader">
                                        <thead class="thead-dark">
                                          <tr>
                                            <th scope="col">Ref No</th>
                                            <th scope="col">MM Code/Color</th>
                                            <th scope="col">Manufacturer & Model</th>
                                            <th scope="col">Year</th>
                                            <th scope="col">Mileage KM</th>
                                            <th scope="col">Site Click</th>
                                            <th scope="col">Leads</th>
                                            <th scope="col">Created</th>
                                            <th scope="col">Price</th>
                                            <th scope="col">Dealer</th>
                                            <th scope="col">Action</th>
                                          </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Modal -->
            <div class="modal fade" id="exampleModalAds" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title adtitle" id="exampleModalLabel"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <form action="{{ route('paynow') }}" method="post">
                      @csrf
                  <div class="modal-body">
                    
                    <div class="form-group mainform">
                        <label class="mb-1 d-flex align-items-center justify-content-between"><strong class="d-block labels">Promote my ad</strong> <strong class="d-block reqired">(Required)</strong></label>
                        <input type="hidden" class="adid" name="adid" value="" />
                        @foreach($adssubcriptions as $ad)
                        <div class="postadFeature mb-3">
                            <div class="featureInfo mb-2 d-md-flex align-items-center">
                                <div class="featureIcon"><img class="img-fluid" src="https://cars.alliftech.com/public/front/images/downloadddd.svg" alt="icon"></div>
                                <div class="w-100 ms-auto px-2 px-md-0">
                                    <h5 class="featureTitle">{{ $ad->name }}<span class="">&nbsp;-&nbsp;</span> <a data-toggle="modal" data-target="#example{{$ad->slug}}Model" class="inline-block exampleLink">See example</a></h5>
                                    <p class="paraGraph">Feature your ad in rotation on top of Category Pages.</p>
                                </div>
                            </div>
                            <ul class="list-unstyled mb-0 d-md-flex align-items-center">
                                @if($ad->seven_days_price != null)
                                <li class="featureOption">
                                    <div class="form-check w-100 p-0 d-flex align-items-center">
                                        <div class="featureCheckbox">
                                            <input class="form-check-input" type="radio" value="7" @if($ad->slug == 'top_ad') required @endif name="{{ $ad->slug }}" id="flexCheckOne">
                                            <span class="checkbox-text">Add</span>
                                        </div>
                                        <label class="form-check-label pl-3" for="flexCheckOne"><span>7 days</span><br> <span>R{{ $ad->seven_days_price }}</span></label>
                                    </div>
                                </li>
                                @endif
                                @if($ad->fifteen_days_price != null)
                                <li class="featureOption">
                                    <div class="form-check w-100 p-0 d-flex align-items-center">
                                        <div class="featureCheckbox">
                                            <input class="form-check-input" type="radio" @if($ad->slug == 'top_ad') required @endif name="{{ $ad->slug }}"  value="15" id="flexCheckTwo">
                                            <span class="checkbox-text">Add</span>
                                        </div>
                                        <label class="form-check-label pl-3" for="flexCheckTwo"><span>15 days</span><br> <span>R{{ $ad->fifteen_days_price }}</span></label>
                                    </div>
                                </li>
                                @endif
                                @if($ad->thirty_days_price != null)
                                <li class="featureOption">
                                    <div class="form-check w-100 p-0 d-flex align-items-center">
                                        <div class="featureCheckbox">
                                            <input class="form-check-input" type="radio" @if($ad->slug == 'top_ad') required @endif name="{{ $ad->slug }}"  value="30" id="flexCheckThree">
                                            <span class="checkbox-text">Add</span>
                                        </div>
                                        <label class="form-check-label pl-3" for="flexCheckThree"><span>30 days</span><br> <span>R{{ $ad->thirty_days_price }}</span></label>
                                    </div>
                                </li>
                                @endif
                            </ul>
                        </div>
                        @endforeach
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button class="btn btn-next" type="submit">Pay Now</button>    
                  </div>
                  </form>
                </div>
              </div>
            </div>
            <!-- Special Deal Modal -->
            <div class="modal fade" id="exampleModalSpecialDeal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title adtitle" id="exampleModalLabel"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <form action="{{ route('converttospecialdeal') }}" method="post">
                      @csrf
                  <div class="modal-body">
                    
                    <div class="form-group mainform">
                        <label class="mb-1 d-flex align-items-center justify-content-between"><strong class="d-block labels">Special Deal Price</strong></label>
                        <input type="hidden" class="adid" name="adid" value="" />
                        <input type"number" value="" name="deal_price" required class="form-control" />
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button class="btn btn-next" type="submit">Convert Now</button>    
                  </div>
                  </form>
                </div>
              </div>
            </div>
            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title socialtitle" id="exampleModalLabel">Social</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <div class="subscribe_widget d-flex align-items-center">
                        <ul class="nav w-100 m-0 justify-content-center">
                            <li><a class="fb fshare" href="" target="_blank" rel="nofollow"><img class="img-fluid" width="10" src="https://cars.alliftech.com/public/backend/images/facebook-f.svg" alt="icon"></a></li> 
                            <li><a class="telegram tshare" href="" target="_blank" rel="nofollow"><span class=""><img class="img-fluid" width="16" src="https://cars.alliftech.com/public/front/images/telegramicon.svg" alt="icon"></span></a></li> 
                            <li class="m-0"><a class="whatsapp wshare" href="" target="_blank" rel="nofollow"><img class="img-fluid" width="20" src="https://cars.alliftech.com/public/backend/images/whatsapp-w.svg" alt="icon"></a></li>
                        </ul>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!--exampletop_adModel-->
            <div class="modal fade" id="exampletop_adModel" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title text-center w-100">Top Ad</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <ul class="mb-2 list-unstyled feature-long-description">
                                <li>&nbsp; The first ad people see in each category</li>
                                <li>&nbsp; Easy to find, easy to reply</li>
                            </ul>
                            <small class="d-block mb-3"><strong>Tip:</strong>  Make sure your Ad title and description clearly explain what you’re selling, for maximum effectiveness.</small>
                            <div class="text-center"><img class="img-thumbnail" src=" {{ asset('public/backend/images/highlight-5afa35dc00.jpg') }}" alt="icon"/></div>
                        </div>
                    </div>
                </div>
            </div>
            <!--exampleurgent_adModel-->
            <div class="modal fade" id="exampleurgent_adModel" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title text-center w-100">Urgent Ad</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <ul class="mb-2 list-unstyled feature-long-description">
                                <li>&nbsp; The first ad people see in each category</li>
                                <li>&nbsp; Easy to find, easy to reply</li>
                            </ul>
                            <small class="d-block mb-3"><strong>Tip:</strong>  Make sure your Ad title and description clearly explain what you’re selling, for maximum effectiveness.</small>
                            <div class="text-center"><img class="img-thumbnail" src="{{ asset('public/backend/images/highlight-5afa35dc00.jpg') }}" alt="icon"/></div>
                        </div>
                    </div>
                </div>
            </div>
            <!--examplehighlight_adModel-->
            <div class="modal fade" id="examplehighlight_adModel" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title text-center w-100">Highlight Ad</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <ul class="mb-2 list-unstyled feature-long-description">
                            <li>&nbsp; The first ad people see in each category</li>
                            <li>&nbsp; Easy to find, easy to reply</li>
                        </ul>
                        <small class="d-block mb-3"><strong>Tip:</strong>  Make sure your Ad title and description clearly explain what you’re selling, for maximum effectiveness.</small>
                        <div class="text-center"><img class="img-thumbnail" src="{{ asset('public/backend/images/highlight-5afa35dc00.jpg') }}" alt="icon"/></div>
                    </div>
                </div>
            </div>
<script>
    $(document).ready(function() {
        
      $('.datatable').on('init.dt',function() {
            $(".datatable").removeClass('table-loader').show();
          });
      setTimeout(function(){
        $('.datatable').DataTable({
            processing: false,
            serverSide: true,
            ajax: '/listings/datatablesofdeals/1',
            columns: [
                {data: 'refno', name: 'refno'},
                {data: 'mmcode', name: 'mmcode'},
                {data: 'manufacturemodel', name: 'manufacturemodel'},
                {data: 'year', name: 'year'},
                {data: 'mileage', name: 'mileage'},
                {data: 'siteclick', name: 'siteclick'},
                {data: 'leads', name: 'leads'},
                {data: 'created', name: 'created'},
                {data: 'price', name: 'price'},
                {data: 'dealershipname', name: 'dealershipname'},
                {data: 'action', name: 'action', orderable: false, searchable: false},
            ],
            language : {
                    processing: "<img src='{{ asset('public/backend/images/loading.gif')}}'>"
                },
        });
      }, 3000);
        
    } );

    

</script>
<script src="{{ asset('public/backend/js/sweetalert.min.js') }}"></script>
<script type="text/javascript">
    $(document).on('click', '.delete-confirm', function(e) {
        e.preventDefault();
        const url = $(this).attr('href');
        swal({
            title: 'Are you sure?',
            text: 'This record and it`s details will be permanantly deleted!',
            icon: 'warning',
            buttons: ["Cancel", "Yes!"],
        }).then(function(value) {
            if (value) {
                window.location.href = url;
            }
        });
    });
    $(document).on('click', '.socialsharing', function(e) {
        var id  = $(this).attr("data-id");
        var title  = $(this).attr("data-title");
        $('.socialtitle').text(title);
        $(".fshare").prop("href", "http://www.facebook.com/sharer.php?u=https://cars.alliftech.com/auto-detail/"+id)
        $(".tshare").prop("href", "https://telegram.me/share/url?url=https://cars.alliftech.com/auto-detail/"+id)
        $(".wshare").prop("href", "https://api.whatsapp.com/send?text=https://cars.alliftech.com/auto-detail/"+id)
        $('#exampleModal').modal('show');
        
    });
    $(document).on('click', '.converttoads', function(e) {
        var id  = $(this).attr("data-id");
        var title  = $(this).attr("data-title");
        $('.adtitle').text(title);
        $('.adid').val(id);
        $('#exampleModalAds').modal('show');
        
    });
    $(document).on('click', '.converttospecial', function(e) {
        var id  = $(this).attr("data-id");
        var title  = $(this).attr("data-title");
        $('.adtitle').text(title);
        $('.adid').val(id);
        $('#exampleModalSpecialDeal').modal('show');
        
    });
  
</script>

@endsection