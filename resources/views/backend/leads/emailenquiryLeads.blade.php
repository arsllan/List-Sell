@extends('layouts.backendapp')
@section('content')
    <div class="l-main">
        <div class="content-wrapper">
            <div class="content-wrapper-content px-3">
                <div class="d-md-flex align-items-center mb-3">
                    <div class="main_heading"><h5>Email Enquiries Leads</h5></div>
                </div>
                <div class="card card-body mb-3">
                    <div class="d-lg-flex archiveStyle align-items-center justify-content-lg-start justify-content-center">
                        <div class="input-group d-md-flex d-block mb-0 align-items-center justify-content-lg-start justify-content-center">
                            <div class="mb-3 mb-lg-0 d-flex align-items-center" style="">
                                <label style="font-weight:600; font-size:14px; max-width:100px; min-width:100px;" class="d-flex align-items-center mb-2 mb-md-0 m-0 mr-3"><img class="img-fluid" src="{{ asset('public/backend/images/pdf.gif') }}" alt="icon"/> Export:</label>
                                <select class="form-control mb-2 mb-md-0" id="exampleFormControlSelect1">
                                    <option value="24" selected> Last 24 hours </option>
                                    <option value="48"> Last 48 hours </option>
                                    <option value="week"> This week </option>
                                    <option value="month"> This month </option>
                                </select>
                            </div>
                            <div class="ml-auto d-flex align-items-center">
                                <button type="button" class="input-group-text ml-2" id="basic-addon1">PDF</button>
                                <button type="button" class="input-group-text ml-2" id="basic-addon1">CSV</button>
                            </div>
                        </div>
                        <!--<div class="ml-auto">-->
                        <!--    <div class="input-group d-md-flex d-block mb-0 align-items-center justify-content-lg-start justify-content-center">-->
                        <!--        <label style=" font-weight:600; font-size:14px" class="mb-2 mb-md-0 m-0 mr-3"><img class="img-fluid" src="{{ asset('public/backend/images/arrow_green.png') }}" alt="icon"/> Lead archive:</label>-->
                        <!--        <select class="form-control mb-2 mb-md-0" id="exampleFormControlSelect1">-->
                        <!--          <option> 03-2023 (3) </option>-->
                        <!--          <option>2</option>-->
                        <!--          <option>3</option>-->
                        <!--          <option>4</option>-->
                        <!--          <option>5</option>-->
                        <!--        </select>-->
                        <!--      <button type="button" class="input-group-text ml-2" id="basic-addon1">Go</button>-->
                        <!--    </div>-->
                        <!--</div>-->
                    </div>
                </div>
                <!---->
                <div class="d-md-flex align-items-center mb-3">
                    <div class="main_heading"><h5>Fliter In Leads</h5></div>
                </div>
                <div class="card card-body mb-3">
                    <div class="row align-items-center">
                        <div class="col-lg-10 col-md-12 mb-3 mb-lg-0">
                            <div class="row">
                                <div class="col-lg-4 col-md-4 mb-3 mb-md-0">
                                    <div class="form-group mb-0">
                                        <label for="exampleFormControlSelect1">Make</label>
                                        <select class="form-control" id="exampleFormControlSelect1">
                                          <option>1</option>
                                          <option>2</option>
                                          <option>3</option>
                                          <option>4</option>
                                          <option>5</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 mb-3 mb-md-0">
                                    <div class="form-group mb-0">
                                        <label for="exampleFormControlSelect1">Modal</label>
                                        <select class="form-control" id="exampleFormControlSelect2">
                                          <option>1</option>
                                          <option>2</option>
                                          <option>3</option>
                                          <option>4</option>
                                          <option>5</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 mb-3 mb-md-0">
                                    <div class="form-group mb-0">
                                        <label for="exampleFormControlSelect1">Body</label>
                                        <select class="form-control" id="exampleFormControlSelect3">
                                          <option>1</option>
                                          <option>2</option>
                                          <option>3</option>
                                          <option>4</option>
                                          <option>5</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-2 text-right col-md-12 mb-3 mb-md-0">
                            <button type="button" class="d-inline-flex btn btn-next" style="max-width:100px; min-width:100px; height:35px;">Filter</button>
                        </div>
                    </div>
                </div>
                <!---->
                <div class="row">
                    <div class="col-xl-12 col-lg-12 mb-3">
                        <div class="card card-body">
                            <h5>Body types Graph</h5>
                            <div id="chartContainer" class="mt-4" style="height: 370px; width: 100%;"></div>
                        </div>
                    </div>
                </div>
                <!---->
                <div class="card">
                    <div class="table-responsive-sm">
                        <table class="mb-0 table table-striped datatable">
                            <thead class="thead-dark">
                              <tr>	
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Phone</th>
                                <!--<th scope="col">Region</th>-->
                                <th scope="col">Vehicle</th>
                                <th scope="col">Message Preview</th>
                                <th scope="col">Time</th>
                                <th scope="col">Dealer</th>
                                <th scope="col">Action</th>
                              </tr>
                            </thead>
                            <tbody>
                                @forelse($leads as $lead)
                                <tr>
                                    <td>{{ $lead->name }}</td>
                                    <td>{{ $lead->email }}</td>
                                    <td>{{ $lead->phone }}</td>
                                    <!--<td>{{ $lead->name }}</td>-->
                                    <td>
                                        <a href="{{ route('auto-detail',$lead->list->id) }}" data-toggle="tooltip" data-placement="top" title="<img class='img-fluid' width='150px' src='{{ asset('public/uploads/listings/'.$lead->list->feature_image) }}' />">
                                            {{ $lead->list->title }} <br>
                                            Make: {{ $lead->list->model->brand->name }} <br>
                                            Model: {{ $lead->list->model->name }} <br>
                                            Body Type: {{ $lead->list->body_type->name }}
                                            
                                        </a>
                                    </td>
                                    <td>{{ $lead->message }}</td>
                                    <td>{{ $lead->created_at }}</td>
                                    <td>{{ $lead->name }}</td>
                                    <td><a href="#!" class="btn btn-sm mr-1 edit viewindetail"
                                            data-img="<img class='img-thumbnail' width='150px' src='{{ asset('public/uploads/listings/'.$lead->list->feature_image) }}' />"
                                            data-make="{{ $lead->list->model->brand->name }}"
                                            data-model="{{ $lead->list->model->name }}"
                                            data-body="{{ $lead->list->body_type->name }}"
                                            data-msg="{{ $lead->message }}"
                                            data-name="{{ $lead->name }}"
                                            data-email="{{ $lead->email }}"
                                            data-phone="{{ $lead->phone }}"
                                            data-time="{{ $lead->created_at }}"
                                            
                                        >View</a></td>
                                </tr>
                                @empty
                                    <tr>
                                        <td colspan="8" class="text-center">No Record Found</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade ViewTable" id="exampleModalView" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Email Inquiry In Detail</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body content">
              <h4 class="titleName mb-2">Lead Information</h4>
            <div class="d-flex align-items-center mb-4">
                <div class="text-center bannerProduct"></div>
                <div class="ml-3 w-100">
                    <div class="mb-3">
                        <p class="mb-1">Make: <span class="make"></span></p>
                        <p class="mb-1">Model: <span class="model"></span></p>
                        <p class="mb-1">Body Type: <span class="body"></span></p>
                    </div>
                </div>
            </div>
            <!---->
            <h4 class="titleName mb-2">Lead Enquiry Detail</h4>
            <div class="mt-3">
                <h4 class="titleName mb-2 name"></h4>
                <a href="#!" class="email d-block mb-1"><strong>Email:</strong> <span class="emaill"></span></a>
                <a href="#!" class="d-block phone mb-1"><strong>Phone:</strong> <span class="phonee"></span></a>
                <p class="#!"><strong>Time:</strong> <span class="time"></span></p>
            </div>
            <h4 class="titleName mb-2">Message</h4>
            <p class="m-0 msg"></p>
          </div>
          <!--<div class="modal-footer">-->
          <!--  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>-->
          <!--  <button type="button" class="btn btn-primary">Save changes</button>-->
          <!--</div>-->
        </div>
      </div>
    </div>
<script>
$(function() {
  $('[data-toggle="tooltip"]').tooltip({
    html: true
  });
});
    $(document).on('click', '.viewindetail', function(e) {
        var image  = $(this).attr("data-img");
        var make  = $(this).attr("data-make");
        var model  = $(this).attr("data-model");
        var body  = $(this).attr("data-body");
        var msg  = $(this).attr("data-msg");
        var name  = $(this).attr("data-name");
        var email  = $(this).attr("data-email");
        var phone  = $(this).attr("data-phone");
        var time  = $(this).attr("data-time");
        $('.bannerProduct').html(image);
        $('.make').text(make);
        $('.model').text(model);
        $('.body').text(body);
        $('.msg').text(msg);
        $('.name').text(name);
        $('.emaill').text(email);
        $('.phonee').text(phone);
        $('.time').text(time);
        $('#exampleModalView').modal('show');
        
    });
</script>
<script>
    window.onload = function () {
    
    
     var chart = new CanvasJS.Chart("chartContainer", {
        animationEnabled: true,
        title:{
            text: ""
        },
        axisX: {
    		valueFormatString: "MMM",
    		intervalType: "month",
    		interval: 1
	    },
        axisY: {
            title: "",
            suffix: "",
            gridColor: "#e9ecef",
        },
        legend:{
            cursor: "pointer",
            fontSize: 16,
            itemclick: toggleDataSeries
        },
        toolTip:{
            shared: true
        },
        data: [

        {
            name: "Leads",
            type: "spline",
            yValueFormatString: "#0.##",
            color:"#151a7b",
            showInLegend: true,
            xValueFormatString: "MMMM",
            dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
        }]
    });
    chart.render();
    
    function toggleDataSeries(e){
        if (typeof(e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
            e.dataSeries.visible = false;
        }
        else{
            e.dataSeries.visible = true;
        }
        chart.render();
    }
    
}
</script>
@endsection