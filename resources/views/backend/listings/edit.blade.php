@extends('layouts.backendapp')
@section('content')
<style>
    .upload__inputfilee{
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
                                <h5>Update Listing</h5>
                                <a href="{{ route('listings', 4) }}" class="ml-auto nav-link px-0">Back To Listings</a>
                            </div>
                            <!---->
                            <div class="card card-body mt-4">
                                <form action="{{ route('update-listing',$listing->id) }}" method="post" enctype='multipart/form-data'>
                                    <div class="w-100 mt-3 text-right">
                                        <button type="submit" class="btn btn-next d-inline-flex">Save Changes</button>
                                    </div>
                                    @csrf
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <label class="d-block"><strong>Feature Image</strong></label>
                                            <!--<div class="form-group m-t-20">-->
                                            <!--    <img style="width: 130px;padding: 0 10px;margin-bottom: 12px;border-radius: 12px;" src="{{ asset('public/uploads/listings/'.$listing->feature_image) }}" />-->
                                            <!--    <input type="file" class="form-control rounded-border2" name="image" placeholder="">-->
                                            <!--</div>-->
                                            <!---->
                                            <div class="row mx-0 upload__box">
                                                <div class="upload__img-wrap w-100">
                                                    <div class="col-1 upload__img-box">
                                                        <img class="h-100 img-fluid pb-0 img-bg" id="blah" src="{{ asset('public/uploads/listings/'.$listing->feature_image) }}" />
                                                    </div>                                                              
                                                </div>
                                            </div>
                                            <div class="upload__box">
                                              <div class="upload__btn-box">
                                                <label class="upload__btn">Choose File
                                                    <input type="file"  name="image" data-max_length="20" class="upload__inputfilee" onchange="readURL(this);">
                                                </label>
                                              </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form-group m-t-20">
                                                <label><strong>Gallery Images</strong></label>
                                                <div class="row mx-0 upload__box">
                                                    <div class="upload__img-wrap w-100">
                                                        @forelse($listingmedia as $image)
                                                            <div class="col-1 upload__img-box" data-id="{{ $image->id }}" id="{{ $image->position }}" style='margin-left: 10px;'>
                                                                <img class="h-100 img-fluid pb-0 img-bg" src="{{ asset('public/uploads/listings/listing_media/'.$image->image) }}" />
                                                                <div class="upload__img-closee closing"></div>
                                                            </div>
                                                        @empty
                                                        @endforelse                                                                
                                                    </div>
                                                </div>

                                                <div class="upload__box">
                                                  <div class="upload__btn-box">
                                                    <label class="upload__btn">Upload images
                                                        <input type="file" multiple="" name="images[]" data-max_length="20" class="upload__inputfile">
                                                        <input type="hidden" value="" id="removefromgallery" name="removefromgallery" />
                                                    </label>
                                                  </div>
                                                  <div class="upload__img-wrap"></div>
                                                </div>
                                            </div>                                                        
                                        </div>                                                   
                                        <div class="col-lg-6">
                                            <div class="form-group m-t-20">
                                                <label><strong>Title</strong></label>
                                                <input type="text" class="form-control rounded-border2" name="title" value="{{ $listing->title }}">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group m-t-20">
                                                <label><strong>Category</strong></label>
                                                <select class="form-control rounded-border2" id="category_id" name="category_id" required>
                                                    <option value="">-- Please Select --</option>
                                                    @foreach($categories as $cat)
                                                        <option value="{{ $cat->id }}" @if($cat->id == $listing->category_id) selected @endif>{{ $cat->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group m-t-20">
                                                <label><strong>Make:</strong></label>
                                                <select class="form-control rounded-border2" id="brand" name="make" required>
                                                    <option value="">-- Please Select --</option>
                                                    @foreach($makes as $m)
                                                        <option value="{{ $m->id }}" @if($m->id == $listing->equipment_id) selected @endif>{{ $m->name }}</option>
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
                                                        <option value="{{ $model->id }}" @if($model->id == $listing->model_id) selected @endif>{{ $model->name }}</option>
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
                                                        <option value="{{ $body->id }}" @if($body->id == $listing->body_type_id) selected @endif>{{ $body->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="col-lg-6">
                                            <div class="form-group m-t-20">
                                                <label><strong>Version</strong></label>
                                                <input type="text" class="form-control rounded-border2" name="version" value="{{ $listing->version }}">
                                            </div>
                                        </div>                                                    
                                        <div class="col-lg-6">
                                            <div class="form-group m-t-20">
                                                <label><strong>Year</strong></label>
                                                <input type="text" class="form-control rounded-border2" name="year"  value="{{ $listing->year }}">
                                            </div>
                                        </div>                                                    
                                        <div class="col-lg-6">
                                            <div class="form-group m-t-20">
                                                <label><strong>Transmission</strong></label>
                                                <select class="form-control rounded-border2" name="transmission" required>
                                                    <option value="">-- Please Select --</option>
                                                    <option value="Automatic" @if($listing->transmission == 'Automatic') selected @endif>Automatic</option>
                                                    <option value="Semi-Automatic" @if($listing->transmission == 'Semi-Automatic') selected @endif >Semi-Automatic</option>
                                                    <option value="Manual"  @if($listing->transmission == 'Manual') selected @endif>Manual</option>
                                                </select>
                                            </div>
                                        </div>                                                    
                                        <div class="col-lg-6">
                                            <div class="form-group m-t-20">
                                                <label><strong>Doors</strong></label>
                                                <select class="form-control rounded-border2" required name="doors">
                                                    <option value="">-- Please Select --</option>
                                                    <option value="2"  @if($listing->doors == 2) selected @endif>2</option>
                                                    <option value="3"  @if($listing->doors == 3) selected @endif>3</option>
                                                    <option value="4"  @if($listing->doors == 4) selected @endif>4</option>
                                                    <option value="5"  @if($listing->doors == 5) selected @endif>5</option>
                                                </select>
                                            </div>
                                        </div>                                                    
                                        <div class="col-lg-6">
                                            <div class="form-group m-t-20">
                                                <label><strong>Fuel Type</strong></label>
                                                <select class="form-control rounded-border2" name="fuel_type">
                                                    <option value="">-- Please Select --</option>
                                                    <option value="Diesel" @if($listing->fuel_type == 'Diesel') selected @endif>Diesel</option>
                                                    <option value="Petrol" @if($listing->fuel_type == 'Petrol') selected @endif>Petrol</option>
                                                    <option value="Electric" @if($listing->fuel_type == 'Electric') selected @endif>Electric</option>
                                                    <option value="Hybrid" @if($listing->fuel_type == 'Hybrid') selected @endif>Hybrid</option>
                                                </select>
                                            </div>
                                        </div>                                                    
                                        <div class="col-lg-6">
                                            <div class="form-group m-t-20">
                                                <label><strong>Auto Condition</strong></label>
                                                <select class="form-control rounded-border2" name="auto_condition">
                                                    <option value="">-- Please Select --</option>
                                                    <option value="Used" @if($listing->auto_condition == 'Used') selected @endif>Used</option>
                                                    <option value="New" @if($listing->auto_condition == 'New') selected @endif>New</option>
                                                    <option value="Demo" @if($listing->auto_condition == 'Demo') selected @endif>Demo</option>
                                                </select>
                                            </div>
                                        </div>                                                    
                                        <div class="col-lg-6">
                                            <div class="form-group m-t-20">
                                                <label><strong>Auto Drive</strong></label>
                                                <select class="form-control rounded-border2" name="auto_drive">
                                                    <option value="">-- Please Select --</option>
                                                    <option value="Front Wheel Drive" @if($listing->auto_drive == 'Front Wheel Drive') selected @endif>Front Wheel Drive</option>
                                                    <option value="Rear Wheel Drive" @if($listing->auto_drive == 'Rear Wheel Drive') selected @endif>Rear Wheel Drive</option>
                                                    <option value="4X4" @if($listing->auto_drive == '4X4') selected @endif>4X4</option>
                                                    <option value="4X2" @if($listing->auto_drive == '4X2') selected @endif>4X2</option>
                                                    <option value="AWD" @if($listing->auto_drive == 'AWD') selected @endif>AWD</option>
                                                </select>
                                            </div>
                                        </div>                                                    
                                        <div class="col-lg-6">
                                            <div class="form-group m-t-20">
                                                <label><strong>Color</strong></label>
                                                <input type="text" class="form-control rounded-border2" name="color" placeholder="eg: red" value="{{ $listing->color }}">
                                            </div>
                                        </div>                                                    
                                        <div class="col-lg-6">
                                            <div class="form-group m-t-20">
                                                <label><strong>Price</strong></label>
                                                <input type="text" class="form-control rounded-border2" name="price" placeholder="eg: 10000" value="{{ $listing->price }}" >
                                            </div>
                                        </div>                                                   
                                        <div class="col-lg-6">
                                            <div class="form-group m-t-20">
                                                <label><strong>Mileage</strong></label>
                                                <input type="text" class="form-control rounded-border2" name="mileage" placeholder="eg: 100000" value="{{ $listing->mileage }}" >
                                            </div>
                                        </div>                                                    
                                        <div class="col-lg-6">
                                            <div class="form-group m-t-20">
                                                <label><strong>Vin</strong></label>
                                                <input type="text" class="form-control rounded-border2" name="vin" placeholder="eg: 1VXBR12EXCP901213" value="{{ $listing->vin }}" >
                                            </div>
                                        </div>                                                    
                                        <div class="col-lg-6">
                                            <div class="form-group m-t-20">
                                                <label><strong>Engine</strong></label>
                                                <input type="text" class="form-control rounded-border2" name="engine" placeholder="eg: 1900" value="{{ $listing->engine }}">
                                            </div>
                                        </div>                                                    
                                        <div class="col-lg-6">
                                            <div class="form-group m-t-20">
                                                <label><strong>Seating Capacity</strong></label>
                                                <select class="form-control rounded-border2" name="seating_capacity">
                                                    <option value="">-- Please Select --</option>
                                                    <option value="1" @if($listing->seating_capacity == 1) 1 @endif >1</option>
                                                    <option value="2" @if($listing->seating_capacity == 2) 2 @endif>2</option>
                                                    <option value="3" @if($listing->seating_capacity == 3) 3 @endif>3</option>
                                                    <option value="4" @if($listing->seating_capacity == 4) 4 @endif>4</option>
                                                    <option value="5" @if($listing->seating_capacity == 5) 5 @endif>5</option>
                                                    <option value="6" @if($listing->seating_capacity == 6) 6 @endif>6</option>
                                                    <option value="7" @if($listing->seating_capacity == 7) 7 @endif>7</option>
                                                    <option value="8" @if($listing->seating_capacity == 8) 8 @endif>8</option>
                                                    <option value="9" @if($listing->seating_capacity == 9) 9 @endif>9</option>
                                                    <option value="10" @if($listing->seating_capacity == 10) 10 @endif>10</option>
                                                </select>
                                            </div>
                                        </div>     
                                        <div class="col-lg-12">
                                            <div class="row align-items-center">
                                                <div class="col "><div class="w-100 d-flex align-items-center mb-2 mr-0 p-2" style=" border: solid 1px #ddd;border-radius: 10px; max-width:250px; min-width:250px;"><label><input type="checkbox" name="airbags" @if($listing->airbags == 1) checked @endif id="airbags"> Air-Bags (SRS)</label></div></div>  
                                                <div class="col "><div class="w-100 d-flex align-items-center mb-2 mr-0 p-2" style=" border: solid 1px #ddd;border-radius: 10px; max-width:250px; min-width:250px;"><label><input type="checkbox" name="tracker" @if($listing->tracker == 1) checked @endif id="tracker"> Alarm System</label></div></div> 
                                                <div class="col "><div class="w-100 d-flex align-items-center mb-2 mr-0 p-2" style=" border: solid 1px #ddd;border-radius: 10px; max-width:250px; min-width:250px;"><label><input type="checkbox" name="alloywheels" @if($listing->alloywheels == 1) checked @endif id="alloywheels"> Alloy Wheels</label></div></div>
                                                <div class="col "><div class="w-100 d-flex align-items-center mb-2 mr-0 p-2" style=" border: solid 1px #ddd;border-radius: 10px; max-width:250px; min-width:250px;"><label><input type="checkbox" name="abs" @if($listing->abs == 1) checked @endif id="abs"> Anti-lock Breaking System (ABS)</label></div></div> 
                                                <div class="col "><div class="w-100 d-flex align-items-center mb-2 mr-0 p-2" style=" border: solid 1px #ddd;border-radius: 10px; max-width:250px; min-width:250px;"><label><input type="checkbox" name="bluetooth" @if($listing->bluetooth == 1) checked @endif id="bluetooth"> Bluetooth Connectivity</label></div></div> 
                                                <div class="col "><div class="w-100 d-flex align-items-center mb-2 mr-0 p-2" style=" border: solid 1px #ddd;border-radius: 10px; max-width:250px; min-width:250px;"><label><input type="checkbox" name="central" @if($listing->central == 1) checked @endif  id="central"> Central Locking</label></div></div> 
                                                <div class="col "><div class="w-100 d-flex align-items-center mb-2 mr-0 p-2" style=" border: solid 1px #ddd;border-radius: 10px; max-width:250px; min-width:250px;"><label><input type="checkbox" name="cruise_control" @if($listing->cruise_control == 1) checked @endif id="cruise_control"> Cruise Control</label></div></div> 
                                                <div class="col "><div class="w-100 d-flex align-items-center mb-2 mr-0 p-2" style=" border: solid 1px #ddd;border-radius: 10px; max-width:250px; min-width:250px;"><label><input type="checkbox" name="eco_stop_start" @if($listing->eco_stop_start == 1) checked @endif id="eco_stop_start"> Eco Start Stop</label></div></div> 
                                                <div class="col "><div class="w-100 d-flex align-items-center mb-2 mr-0 p-2" style=" border: solid 1px #ddd;border-radius: 10px; max-width:250px; min-width:250px;"><label><input type="checkbox" name="mirrors" @if($listing->mirrors == 1) checked @endif  id="mirrors"> Electric Mirrors</label></div></div> 
                                                <div class="col "><div class="w-100 d-flex align-items-center mb-2 mr-0 p-2" style=" border: solid 1px #ddd;border-radius: 10px; max-width:250px; min-width:250px;"><label><input type="checkbox" name="elec_seats" @if($listing->elec_seats == 1) checked @endif id="elec_seats"> Electric Seats</label></div></div>  
                                                <div class="col "><div class="w-100 d-flex align-items-center mb-2 mr-0 p-2" style=" border: solid 1px #ddd;border-radius: 10px; max-width:250px; min-width:250px;"><label><input type="checkbox" name="windows" @if($listing->windows == 1) checked @endif  id="windows"> Electric Windows</label></div></div>  
                                                <div class="col "><div class="w-100 d-flex align-items-center mb-2 mr-0 p-2" style=" border: solid 1px #ddd;border-radius: 10px; max-width:250px; min-width:250px;"><label><input type="checkbox" name="heated_seats" @if($listing->heated_seats == 1) checked @endif id="heated_seats"> Heated Seats</label></div></div>
                                                <div class="col "><div class="w-100 d-flex align-items-center mb-2 mr-0 p-2" style=" border: solid 1px #ddd;border-radius: 10px; max-width:250px; min-width:250px;"><label><input type="checkbox" name="isofix" @if($listing->isofix == 1) checked @endif id="isofix"> ISO Fix</label></div></div> 
                                                <div class="col "><div class="w-100 d-flex align-items-center mb-2 mr-0 p-2" style=" border: solid 1px #ddd;border-radius: 10px; max-width:250px; min-width:250px;"><label><input type="checkbox" name="immobilizer" @if($listing->immobilizer == 1) checked @endif id="immobilizer"> Immobilizer</label></div></div> 
                                                <div class="col "><div class="w-100 d-flex align-items-center mb-2 mr-0 p-2" style=" border: solid 1px #ddd;border-radius: 10px; max-width:250px; min-width:250px;"><label><input type="checkbox" name="mf_steering" @if($listing->mf_steering == 1) checked @endif id="mf_steering"> Multi Functional Steering Wheel</label></div></div> 
                                                <div class="col "><div class="w-100 d-flex align-items-center mb-2 mr-0 p-2" style=" border: solid 1px #ddd;border-radius: 10px; max-width:250px; min-width:250px;"><label><input type="checkbox" name="navigation" @if($listing->navigation == 1) checked @endif id="navigation"> Navigation System (GPS)</label></div></div> 
                                                <div class="col "><div class="w-100 d-flex align-items-center mb-2 mr-0 p-2" style=" border: solid 1px #ddd;border-radius: 10px; max-width:250px; min-width:250px;"><label><input type="checkbox" name="park_distance" @if($listing->park_distance == 1) checked @endif  id="park_distance"> Park Distance Control (PDC)</label></div></div>
                                                <div class="col "><div class="w-100 d-flex align-items-center mb-2 mr-0 p-2" style=" border: solid 1px #ddd;border-radius: 10px; max-width:250px; min-width:250px;"><label><input type="checkbox" name="steering" @if($listing->steering == 1) checked @endif  id="steering"> Power Steering</label></div></div>
                                                <div class="col "><div class="w-100 d-flex align-items-center mb-2 mr-0 p-2" style=" border: solid 1px #ddd;border-radius: 10px; max-width:250px; min-width:250px;"><label><input type="checkbox" name="rain_sensors" @if($listing->rain_sensors == 1) checked @endif id="rain_sensors"> Rain Sensors</label></div></div> 
                                                <div class="col "><div class="w-100 d-flex align-items-center mb-2 mr-0 p-2" style=" border: solid 1px #ddd;border-radius: 10px; max-width:250px; min-width:250px;"><label><input type="checkbox" name="stability_control" @if($listing->stability_control == 1) checked @endif id="stability_control"> Stability Control</label></div></div> 
                                                <div class="col "><div class="w-100 d-flex align-items-center mb-2 mr-0 p-2" style=" border: solid 1px #ddd;border-radius: 10px; max-width:250px; min-width:250px;"><label><input type="checkbox" name="sun_roof" @if($listing->sun_roof == 1) checked @endif id="sun_roof"> Sun Roof</label></div></div>
                                                <div class="col "><div class="w-100 d-flex align-items-center mb-2 mr-0 p-2" style=" border: solid 1px #ddd;border-radius: 10px; max-width:250px; min-width:250px;"><label><input type="checkbox" name="traction_control" @if($listing->traction_control == 1) checked @endif id="traction_control"> Traction Control</label></div></div>
                                            </div>
                                        </div>                                        
                                        <div class="col-lg-12">
                                            <div class="form-group m-t-20">
                                                <label><strong>Descriptions</strong></label>
                                                <textarea id="myeditorinstance" name="descriptions">{{ $listing->descriptions }}</textarea>
                                            </div>
                                        </div>                                                    													
                                    </div>
                                
                                    <div class="w-100 mt-3 text-right">
                                        <button type="submit" class="btn btn-next d-inline-flex">Save Changes</button>
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
  $(document).on('click', ".closing", function (e) {
      var imageid = $(this).parent().data("id");
      var pre = $("#removefromgallery").val();
      $("#removefromgallery").val(pre+","+imageid);
      $(this).parent().remove();  
  });
}
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
                    updateOrder(selectedData);
                }            
        });

    function updateOrder(data) {
            $.ajax({
                url:"{{ URL::to('updategalleryimageorder') }}",
                type:'post',
                data:{position:data,listingid:"{{ $listing->id }}","_token": "{{ csrf_token() }}"},
                success:function(data){
                        Swal.fire(
                          'Updated!',
                          data,
                          'success'
                        );
                        window.location.reload();
                }
            });
        }
    });

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