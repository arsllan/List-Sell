@extends('layouts.backendapp')
@section('content')
<style>
    .catlist-li:hover{
        background-color: #4a91ff3d;
        cursor: pointer;
    }

.upload__inputfilee {
  width: 0.1px;
  height: 0.1px;
  opacity: 0;
  overflow: hidden;
  position: absolute;
  z-index: -1;
}
.tox-menubar{
    display:none !important;
}

</style>
            <div class="l-main">
                <div class="content-wrapper">
                    <div class="container-fluid">
                        <div class="content-wrapper-content">
                            <div class="main_heading d-md-flex align-items-center">
                                <h5>Add New Listing</h5>
                                <a href="{{ route('listings', 4) }}" class="ml-auto nav-link px-0">Back To Listings</a>
                            </div>
                            <div class="generalcategory row mt-4">
                                <div class="col-lg-4">
                                    <div class="card card-body">
                                        <ul style="border:1px solid #dedede;border-radius:12px;">
                                            @foreach($categories as $cat)
                                            <li data-val="{{ $cat->id }}" class="catlist-li" style="border-bottom:1px solid #dedede;padding:8px;">{{ $cat->name }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="mainform" style="display:none;">
                                <form action="{{ route('store-listing') }}" method="post" enctype='multipart/form-data'>
                                @csrf
                                    <div class="w-100 mt-3 text-right">
                                        <button type="submit" class="btn btn-next d-inline-flex">Save</button>
                                    </div>
                                    <div class="row mt-4">
                                        <div class="col-lg-12 mb-3">
                                            <div class="card card-body">
                                                <div class="form-group mb-0 text-center">
                                                    <label class="d-block mb-2"><strong>Feature Image</strong></label>
                                                    <!--<input type="file" class="form-control rounded-border2" name="image" placeholder="">-->
                                                    <div class="upload__box">
                                                        <div class="upload__img-wrap m-0 justify-content-center w-100">
                                                            <div class="upload__img-box">
                                                                <img class="h-100 img-fluid pb-0 img-bg" id="blah" src="http://placehold.it/180" />
                                                            </div>                                                              
                                                        </div>
                                                    </div>
                                                    <!---->
                                                    <div class="upload__box">
                                                      <div class="upload__btn-box">
                                                        <label class="upload__btn">Choose File
                                                            <input type="file"  name="image" data-max_length="20" class="upload__inputfilee"  onchange="readURL(this);">
                                                        </label>
                                                      </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!---->
                                        <div class="col-lg-12">
                                            <div class="card card-body">
                                                <div class="form-group mb-0 text-center">
                                                    <label class="d-block mb-2"><strong>Gallery Images</strong></label>
                                                    <div class="upload__box">
                                                        <div class="upload__img-wrap m-0 w-100 justify-content-center">
                                                            <div class="upload__img-box">
                                                                <img class="h-100 img-fluid pb-0 img-bg" id="blah" src="http://placehold.it/180" />
                                                            </div>                                                              
                                                        </div>
                                                    </div>
                                                    <!---->
                                                    <div class="upload__box">
                                                      <div class="upload__btn-box">
                                                        <label class="upload__btn">
                                                          Upload images
                                                          <input type="file" multiple="" name="images[]" data-max_length="20" class="upload__inputfile">
                                                        </label>
                                                      </div>
                                                      <div class="upload__img-wrap"></div>
                                                    </div>
                                                </div>                                                       
                                            </div>                                                       
                                        </div> 
                                    </div>
                                    <!---->
                                    <div class="card card-body mt-4">
                                        <div class="row">                                                     
                                            <div class="col-lg-6">
                                                <div class="form-group m-t-20">
                                                    <label><strong>Title</strong></label>
                                                    <input type="text" class="form-control rounded-border2" name="title" placeholder="eg: Gorgeous mercedes benz e-class...">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group m-t-20">
                                                    <label><strong>Category</strong></label>
                                                    <select class="form-control rounded-border2" id="category_id" name="category_id" required>
                                                        <option value="">-- Please Select --</option>
                                                        @foreach($categories as $cat)
                                                            <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group m-t-20">
                                                    <label><strong>Make</strong></label>
                                                    <select class="form-control rounded-border2" id="brand" name="make" required>
                                                        <option value="">-- Please Select --</option>
                                                        @foreach($makes as $m)
                                                            <option value="{{ $m->id }}">{{ $m->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>                                            
                                            <div class="col-lg-6">
                                                <div class="form-group m-t-20">
                                                    <label><strong>Model</strong></label>
                                                    <select class="form-control rounded-border2" id="model" name="model" required>
                                                        <option value="">-- Please Select --</option>
                                                        @foreach($models as $model)
                                                            <option value="{{ $model->id }}">{{ $model->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-lg-6">
                                                <div class="form-group m-t-20">
                                                    <label><strong>Body Type</strong></label>
                                                    <select class="form-control rounded-border2" name="bodytype" required>
                                                        <option value="">-- Please Select --</option>
                                                        @foreach($bodytypes as $body)
                                                            <option value="{{ $body->id }}">{{ $body->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="col-lg-6">
                                                <div class="form-group m-t-20">
                                                    <label><strong>Version</strong></label>
                                                    <input type="text" class="form-control rounded-border2" name="version" placeholder="">
                                                </div>
                                            </div>                                                    
                                            <div class="col-lg-6">
                                                <div class="form-group m-t-20">
                                                    <label><strong>Year</strong></label>
                                                    <input type="text" class="form-control rounded-border2" name="year" placeholder="">
                                                </div>
                                            </div>                                                    
                                            <div class="col-lg-6">
                                                <div class="form-group m-t-20">
                                                    <label><strong>Transmission</strong></label>
                                                    <select class="form-control rounded-border2" name="transmission" required>
                                                        <option value="">-- Please Select --</option>
                                                        <option value="Automatic">Automatic</option>
                                                        <option value="Semi-Automatic">Semi-Automatic</option>
                                                        <option value="Manual">Manual</option>
                                                    </select>
                                                </div>
                                            </div>                                                    
                                            <div class="col-lg-6">
                                                <div class="form-group m-t-20">
                                                    <label><strong>Doors</strong></label>
                                                    <select class="form-control rounded-border2" required name="doors">
                                                        <option value="">-- Please Select --</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="4">4</option>
                                                        <option value="5">5</option>
                                                    </select>
                                                </div>
                                            </div>                                                    
                                            <div class="col-lg-6">
                                                <div class="form-group m-t-20">
                                                    <label><strong>Fuel Type</strong></label>
                                                    <select class="form-control rounded-border2" name="fuel_type">
                                                        <option value="">-- Please Select --</option>
                                                        <option value="Diesel">Diesel</option>
                                                        <option value="Petrol">Petrol</option>
                                                        <option value="Electric">Electric</option>
                                                        <option value="Hybrid">Hybrid</option>
                                                    </select>
                                                </div>
                                            </div>                                                    
                                            <div class="col-lg-6">
                                                <div class="form-group m-t-20">
                                                    <label><strong>Auto Condition</strong></label>
                                                    <select class="form-control rounded-border2" name="auto_condition">
                                                        <option value="">-- Please Select --</option>
                                                        <option value="Used">Used</option>
                                                        <option value="New">New</option>
                                                        <option value="Demo">Demo</option>
                                                    </select>
                                                </div>
                                            </div>                                                    
                                            <div class="col-lg-6">
                                                <div class="form-group m-t-20">
                                                    <label><strong>Auto Drive</strong></label>
                                                    <select class="form-control rounded-border2" name="auto_drive">
                                                        <option value="">-- Please Select --</option>
                                                        <option value="Front Wheel Drive">Front Wheel Drive</option>
                                                        <option value="Rear Wheel Drive">Rear Wheel Drive</option>
                                                        <option value="4X4">4X4</option>
                                                        <option value="4X2">4X2</option>
                                                        <option value="AWD">AWD</option>
                                                    </select>
                                                </div>
                                            </div>                                                    
                                            <div class="col-lg-6">
                                                <div class="form-group m-t-20">
                                                    <label><strong>Color</strong></label>
                                                    <input type="text" class="form-control rounded-border2" name="color" placeholder="eg: red">
                                                </div>
                                            </div>                                                    
                                            <div class="col-lg-6">
                                                <div class="form-group m-t-20">
                                                    <label><strong>Price</strong></label>
                                                    <input type="text" class="form-control rounded-border2" name="price" placeholder="eg: 10000">
                                                </div>
                                            </div>                                                    
                                            <div class="col-lg-6">
                                                <div class="form-group m-t-20">
                                                    <label><strong>Sale Price</strong></label>
                                                    <input type="text" class="form-control rounded-border2" name="sale_price" placeholder="eg: 9000">
                                                </div>
                                            </div>                                                    
                                            <div class="col-lg-6">
                                                <div class="form-group m-t-20">
                                                    <label><strong>Mileage</strong></label>
                                                    <input type="text" class="form-control rounded-border2" name="mileage" placeholder="eg: 100000">
                                                </div>
                                            </div>                                                    
                                            <div class="col-lg-6">
                                                <div class="form-group m-t-20">
                                                    <label><strong>Vin</strong></label>
                                                    <input type="text" class="form-control rounded-border2" name="vin" placeholder="eg: 1VXBR12EXCP901213">
                                                </div>
                                            </div>                                                    
                                            <div class="col-lg-6">
                                                <div class="form-group m-t-20">
                                                    <label><strong>Engine</strong></label>
                                                    <input type="text" class="form-control rounded-border2" name="engine" placeholder="eg: 1900">
                                                </div>
                                            </div>                                                    
                                            <div class="col-lg-6">
                                                <div class="form-group m-t-20">
                                                    <label><strong>Seating Capacity</strong></label>
                                                    <select class="form-control rounded-border2" name="seating_capacity">
                                                        <option value="">-- Please Select --</option>
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="4">4</option>
                                                        <option value="5">5</option>
                                                        <option value="6">6</option>
                                                        <option value="7">7</option>
                                                        <option value="8">8</option>
                                                        <option value="9">9</option>
                                                        <option value="10">10</option>
                                                    </select>
                                                </div>
                                            </div>     
                                            <div class="col-lg-12 mt-4">
                                                <div class="row align-items-center">
                                                    <div class="col "><div class="w-100 d-flex align-items-center mb-2 mr-0 p-2" style=" border: solid 1px #ddd;border-radius: 10px; max-width:250px; min-width:250px;"><label><input type="checkbox" class="mr-2" name="airbags" id="airbags"> Air-Bags (SRS)</label></div></div>  
                                                    <div class="col "><div class="w-100 d-flex align-items-center mb-2 mr-0 p-2" style=" border: solid 1px #ddd;border-radius: 10px; max-width:250px; min-width:250px;"><label><input type="checkbox" class="mr-2" name="tracker" id="tracker"> Alarm System</label></div></div> 
                                                    <div class="col "><div class="w-100 d-flex align-items-center mb-2 mr-0 p-2" style=" border: solid 1px #ddd;border-radius: 10px; max-width:250px; min-width:250px;"><label><input type="checkbox" class="mr-2" name="alloywheels" id="alloywheels"> Alloy Wheels</label></div></div>
                                                    <div class="col "><div class="w-100 d-flex align-items-center mb-2 mr-0 p-2" style=" border: solid 1px #ddd;border-radius: 10px; max-width:250px; min-width:250px;"><label><input type="checkbox" class="mr-2" name="abs" id="abs"> Anti-lock Breaking System (ABS)</label></div></div> 
                                                    <div class="col "><div class="w-100 d-flex align-items-center mb-2 mr-0 p-2" style=" border: solid 1px #ddd;border-radius: 10px; max-width:250px; min-width:250px;"><label><input type="checkbox" class="mr-2" name="bluetooth" id="bluetooth"> Bluetooth Connectivity</label></div></div> 
                                                    <div class="col "><div class="w-100 d-flex align-items-center mb-2 mr-0 p-2" style=" border: solid 1px #ddd;border-radius: 10px; max-width:250px; min-width:250px;"><label><input type="checkbox" class="mr-2" name="central"  id="central"> Central Locking</label></div></div> 
                                                    <div class="col "><div class="w-100 d-flex align-items-center mb-2 mr-0 p-2" style=" border: solid 1px #ddd;border-radius: 10px; max-width:250px; min-width:250px;"><label><input type="checkbox" class="mr-2" name="cruise_control" id="cruise_control"> Cruise Control</label></div></div> 
                                                    <div class="col "><div class="w-100 d-flex align-items-center mb-2 mr-0 p-2" style=" border: solid 1px #ddd;border-radius: 10px; max-width:250px; min-width:250px;"><label><input type="checkbox" class="mr-2" name="eco_stop_start" id="eco_stop_start"> Eco Start Stop</label></div></div> 
                                                    <div class="col "><div class="w-100 d-flex align-items-center mb-2 mr-0 p-2" style=" border: solid 1px #ddd;border-radius: 10px; max-width:250px; min-width:250px;"><label><input type="checkbox" class="mr-2" name="mirrors"  id="mirrors"> Electric Mirrors</label></div></div> 
                                                    <div class="col "><div class="w-100 d-flex align-items-center mb-2 mr-0 p-2" style=" border: solid 1px #ddd;border-radius: 10px; max-width:250px; min-width:250px;"><label><input type="checkbox" class="mr-2" name="elec_seats" id="elec_seats"> Electric Seats</label></div></div>  
                                                    <div class="col "><div class="w-100 d-flex align-items-center mb-2 mr-0 p-2" style=" border: solid 1px #ddd;border-radius: 10px; max-width:250px; min-width:250px;"><label><input type="checkbox" class="mr-2" name="windows"  id="windows"> Electric Windows</label></div></div>  
                                                    <div class="col "><div class="w-100 d-flex align-items-center mb-2 mr-0 p-2" style=" border: solid 1px #ddd;border-radius: 10px; max-width:250px; min-width:250px;"><label><input type="checkbox" class="mr-2" name="heated_seats" id="heated_seats"> Heated Seats</label></div></div>
                                                    <div class="col "><div class="w-100 d-flex align-items-center mb-2 mr-0 p-2" style=" border: solid 1px #ddd;border-radius: 10px; max-width:250px; min-width:250px;"><label class="ms-2" class="ms-2"><input type="checkbox" name="isofix" id="isofix"> ISO Fix</label></div></div> 
                                                    <div class="col "><div class="w-100 d-flex align-items-center mb-2 mr-0 p-2" style=" border: solid 1px #ddd;border-radius: 10px; max-width:250px; min-width:250px;"><label><input type="checkbox" class="mr-2" name="immobilizer" id="immobilizer"> Immobilizer</label></div></div> 
                                                    <div class="col "><div class="w-100 d-flex align-items-center mb-2 mr-0 p-2" style=" border: solid 1px #ddd;border-radius: 10px; max-width:250px; min-width:250px;"><label><input type="checkbox" class="mr-2" name="mf_steering" id="mf_steering"> Multi Functional Steering Wheel</label></div></div> 
                                                    <div class="col "><div class="w-100 d-flex align-items-center mb-2 mr-0 p-2" style=" border: solid 1px #ddd;border-radius: 10px; max-width:250px; min-width:250px;"><label><input type="checkbox" class="mr-2" name="navigation" id="navigation"> Navigation System (GPS)</label></div></div> 
                                                    <div class="col "><div class="w-100 d-flex align-items-center mb-2 mr-0 p-2" style=" border: solid 1px #ddd;border-radius: 10px; max-width:250px; min-width:250px;"><label><input type="checkbox" class="mr-2" name="park_distance"  id="park_distance"> Park Distance Control (PDC)</label></div></div>
                                                    <div class="col "><div class="w-100 d-flex align-items-center mb-2 mr-0 p-2" style=" border: solid 1px #ddd;border-radius: 10px; max-width:250px; min-width:250px;"><label><input type="checkbox" class="mr-2" name="steering"  id="steering"> Power Steering</label></div></div>
                                                    <div class="col "><div class="w-100 d-flex align-items-center mb-2 mr-0 p-2" style=" border: solid 1px #ddd;border-radius: 10px; max-width:250px; min-width:250px;"><label><input type="checkbox" class="mr-2" name="rain_sensors" id="rain_sensors"> Rain Sensors</label></div></div> 
                                                    <div class="col "><div class="w-100 d-flex align-items-center mb-2 mr-0 p-2" style=" border: solid 1px #ddd;border-radius: 10px; max-width:250px; min-width:250px;"><label><input type="checkbox" class="mr-2" name="stability_control" id="stability_control"> Stability Control</label></div></div> 
                                                    <div class="col "><div class="w-100 d-flex align-items-center mb-2 mr-0 p-2" style=" border: solid 1px #ddd;border-radius: 10px; max-width:250px; min-width:250px;"><label><input type="checkbox" class="mr-2" name="sun_roof" id="sun_roof"> Sun Roof</label></div></div>
                                                    <div class="col "><div class="w-100 d-flex align-items-center mb-2 mr-0 p-2" style=" border: solid 1px #ddd;border-radius: 10px; max-width:250px; min-width:250px;"><label><input type="checkbox" class="mr-2" name="traction_control" id="traction_control"> Traction Control</label></div></div>
                                                </div>
                                            </div>                                             
                                            <div class="col-lg-12 mt-4">
                                                <div class="form-group m-t-20">
                                                    <label><strong>Descriptions</strong></label>
                                                    <textarea id="myeditorinstance" name="descriptions"></textarea>
                                                </div>
                                            </div>                                                    													
                                   
                                        </div>
                                    

                                    </div>
                                    <div class="w-100 mt-3 text-right">
                                        <button type="submit" class="btn btn-next d-inline-flex text-white" style="max-width: 250px; min-width: 250px; background-color:#0d1e42;">Save</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
<script type="text/javascript">
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

function ImgUpload() {
  var imgWrap = "";
  var imgArray = [];

  $('.upload__inputfile').each(function () {
    $(this).on('change', function (e) {
      imgWrap = $(this).closest('.upload__box').find('.upload__img-wrap');
      var maxLength = $(this).attr('data-max_length');

      var files = e.target.files;
      var filesArr = Array.prototype.slice.call(files);
      var iterator = 0;
      filesArr.forEach(function (f, index) {

        if (!f.type.match('image.*')) {
          return;
        }

        if (imgArray.length > maxLength) {
          return false
        } else {
          var len = 0;
          for (var i = 0; i < imgArray.length; i++) {
            if (imgArray[i] !== undefined) {
              len++;
            }
          }
          if (len > maxLength) {
            return false;
          } else {
            imgArray.push(f);

            var reader = new FileReader();
            reader.onload = function (e) {
              var html = "<div class='upload__img-box' id='"+index+"' style='margin-left: 10px;'><div style='background-image: url(" + e.target.result + ")' data-number='" + $(".upload__img-close").length + "' data-file='" + f.name + "' class='img-bg'><div class='upload__img-close'></div></div></div>";
              imgWrap.append(html);
              iterator++;
            }
            reader.readAsDataURL(f);
          }
        }
      });
    });
  });

  $('body').on('click', ".upload__img-close", function (e) {
    var file = $(this).parent().data("file");
    for (var i = 0; i < imgArray.length; i++) {
      if (imgArray[i].name === file) {
        imgArray.splice(i, 1);
        break;
      }
    }
    $(this).parent().parent().remove();
  });
}
</script>           
<script>
    $(document).on('click', '.catlist-li', function() {
        $('#category_id').val($(this).attr("data-val"));
        $(".mainform").css('display','block');
        $(".generalcategory").css('display','none');
    });
</script>
 <script src="https://cdn.tiny.cloud/1/yecr0xk7ramewid1meqwj3zbg79s2bm5c7snc4umsdekv5n1/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
  <script>
    tinymce.init({
      selector: 'textarea',
      plugins: 'wordcount',
      toolbar: '',
    });
  </script>
  <script src="{{ asset('public/backend/js/jquery-ui.js') }}" type="text/javascript"></script>
  <script>
    $(document).ready(function (e) {
        var dropIndex;
        $(".upload__img-wrap").sortable({
                delay: 150,
                stop: function() {
                    var selectedData = new Array();
                    $('.upload__img-wrap>div').each(function() {
                        selectedData.push($(this).attr("id"));
                    });
                   // updateOrder(selectedData);
                }            
        });

    // function updateOrder(data) {
    //         $.ajax({
    //             url:"{{ URL::to('update') }}",
    //             type:'post',
    //             data:{position:data,"_token": "{{ csrf_token() }}"},
    //             success:function(data){
    //                     Swal.fire(
    //                       'Updated!',
    //                       data,
    //                       'success'
    //                     );
    //                     window.location.reload();
    //             }
    //         });
    //     }
    // });

</script>
<script>
$(document).ready(function() {
    $('#brand').on('change', function() {
        var brand_id = this.value;
        $("#model").html('');
        $.ajax({
            url:"{{route('get-model-by-brand')}}",
            type: "POST",
            data: {
            brand_id: brand_id,
            _token: '{{csrf_token()}}' 
            },
            dataType : 'json',
            success: function(result){
                $('#model').html('<option value="">--Please Select--</option>'); 
                $.each(result.models,function(key,value){
                $("#model").append('<option value="'+value.id+'">'+value.name+'</option>');
                });
            }
        });
    });
});
</script>
@endsection