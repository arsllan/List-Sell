@extends('layouts.backendapp')
@section('content')
<?php
$years = ['2015','2016','2017','2018','2019','2020']; 
$users = ['33','50','44','20','66','88'];
?>
<script type="text/javascript">
    var labels =  {{ Js::from($labels) }};
    var users =  {{ Js::from($data) }};

    const data = {
        labels: labels,
        datasets: [{
            label: 'My First dataset',
            backgroundColor: 'rgb(255, 99, 132)',
            borderColor: 'rgb(255, 99, 132)',
            data: users,
        }]
    };
  
    const config = {
        type: 'line',
        data: data,
        options: {}
    };
  
    const myChart = new Chart(
        document.getElementById('chartContainerLead'),
        config
    );
</script>
<div class="l-main">
    <div class="content-wrapper">
        <div class="container-fluid">
            <div class="content-wrapper-content">
                <div class="card card-body mb-4">
                    <div class="d-xl-flex align-items-center mb-4">
                        <h5 class="mb-3 mb-lg-0">Leads by time</h5>
                        <div class="ml-auto">
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                              <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="one-tab" data-toggle="tab" data-target="#personal" type="button" role="tab" aria-controls="personal" aria-selected="true">Personal site</button>
                              </li>
                              <li class="nav-item" role="presentation">
                                <button class="nav-link" id="two-tab" data-toggle="tab" data-target="#contact" type="button" role="tab" aria-controls="contact" aria-selected="false">Contact us</button>
                              </li>
                              <li class="nav-item" role="presentation">
                                <button class="nav-link" id="three-tab" data-toggle="tab" data-target="#automart" type="button" role="tab" aria-controls="automart" aria-selected="false">AutoMart</button>
                              </li>
                              <li class="nav-item" role="presentation">
                                <button class="nav-link" id="four-tab" data-toggle="tab" data-target="#capeauto" type="button" role="tab" aria-controls="capeauto" aria-selected="false">Cape Auto Guide</button>
                              </li>
                              <li class="nav-item" role="presentation">
                                <button class="nav-link" id="five-tab" data-toggle="tab" data-target="#carsauto" type="button" role="tab" aria-controls="carsauto" aria-selected="false">Cars Auto Buy</button>
                              </li>
                              <li class="nav-item" role="presentation">
                                <button class="nav-link" id="six-tab" data-toggle="tab" data-target="#carsdealer" type="button" role="tab" aria-controls="carsdealer" aria-selected="false">CAR Dealer</button>
                              </li>
                            </ul>
                        </div>
                    </div>
                    <!---->
                    <div class="tab-content" id="myTabContent">
                      <div class="tab-pane fade show active" id="personal" role="tabpanel" aria-labelledby="one-tab">
                          <ul class="list-unstyled lister">
                            <li class="px-3 d-flex align-items-center justify-content-between">
                                <strong>Today</strong>
                                <span class="">{{ $personalsite['today'] }}</span>
                            </li>
                            <li class="px-3 d-flex align-items-center justify-content-between">
                                <strong>Yesterday</strong>
                                <span class="">{{ $personalsite['yesterday'] }}</span>
                            </li>
                            <li class="px-3 d-flex align-items-center justify-content-between">
                                <strong>  This week: </strong>
                                <span class="">{{ $personalsite['currentweek'] }}</span>
                            </li>
                            <li class="px-3 d-flex align-items-center justify-content-between">
                                <strong>  Last 7 days: </strong>
                                <span class="">{{ $personalsite['lastweek'] }}</span>
                            </li>
                            <li class="px-3 d-flex align-items-center justify-content-between">
                                <strong>  This month: </strong>
                                <span class="">{{ $personalsite['thismonth'] }}</span>
                            </li>
                            <li class="px-3 d-flex align-items-center justify-content-between">
                                <strong>  Last month: </strong>
                                <span class="">{{ $personalsite['lastmonth'] }}</span>
                            </li>
                            <li class="px-3 d-flex align-items-center justify-content-between">
                                <strong>  This year: </strong>
                                <span class="">{{ $personalsite['thisyear'] }}</span>
                            </li>
                            <li class="px-3 d-flex align-items-center justify-content-between">
                                <strong>  All time: </strong>
                                <span class="">{{ $personalsite['alltime'] }}</span>
                            </li>
                          </ul>
                      </div>
                      <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="two-tab">
                          <ul class="list-unstyled lister">
                            <li class="d-flex align-items-center justify-content-between">
                                <strong>Today</strong>
                                <span class="">0</span>
                            </li>
                            <li class="d-flex align-items-center justify-content-between">
                                <strong>Yesterday</strong>
                                <span class="">0</span>
                            </li>
                            <li class="d-flex align-items-center justify-content-between">
                                <strong>  This week: </strong>
                                <span class="">0</span>
                            </li>
                            <li class="d-flex align-items-center justify-content-between">
                                <strong>  Last 7 days: </strong>
                                <span class="">0</span>
                            </li>
                            <li class="d-flex align-items-center justify-content-between">
                                <strong>  This month: </strong>
                                <span class="">0</span>
                            </li>
                            <li class="d-flex align-items-center justify-content-between">
                                <strong>  Last month: </strong>
                                <span class="">0</span>
                            </li>
                            <li class="d-flex align-items-center justify-content-between">
                                <strong>  This year: </strong>
                                <span class="">0</span>
                            </li>
                            <li class="d-flex align-items-center justify-content-between">
                                <strong>  All time: </strong>
                                <span class="">0</span>
                            </li>
                          </ul>
                      </div>
                      <div class="tab-pane fade" id="automart" role="tabpanel" aria-labelledby="three-tab">
                          <ul class="list-unstyled lister">
                            <li class="d-flex align-items-center justify-content-between">
                                <strong>Today</strong>
                                <span class="">0</span>
                            </li>
                            <li class="d-flex align-items-center justify-content-between">
                                <strong>Yesterday</strong>
                                <span class="">0</span>
                            </li>
                            <li class="d-flex align-items-center justify-content-between">
                                <strong>  This week: </strong>
                                <span class="">0</span>
                            </li>
                            <li class="d-flex align-items-center justify-content-between">
                                <strong>  Last 7 days: </strong>
                                <span class="">0</span>
                            </li>
                            <li class="d-flex align-items-center justify-content-between">
                                <strong>  This month: </strong>
                                <span class="">0</span>
                            </li>
                            <li class="d-flex align-items-center justify-content-between">
                                <strong>  Last month: </strong>
                                <span class="">0</span>
                            </li>
                            <li class="d-flex align-items-center justify-content-between">
                                <strong>  This year: </strong>
                                <span class="">0</span>
                            </li>
                            <li class="d-flex align-items-center justify-content-between">
                                <strong>  All time: </strong>
                                <span class="">0</span>
                            </li>
                          </ul>
                      </div>
                      <div class="tab-pane fade" id="capeauto" role="tabpanel" aria-labelledby="four-tab">
                          <ul class="list-unstyled lister">
                            <li class="d-flex align-items-center justify-content-between">
                                <strong>Today</strong>
                                <span class="">0</span>
                            </li>
                            <li class="d-flex align-items-center justify-content-between">
                                <strong>Yesterday</strong>
                                <span class="">0</span>
                            </li>
                            <li class="d-flex align-items-center justify-content-between">
                                <strong>  This week: </strong>
                                <span class="">0</span>
                            </li>
                            <li class="d-flex align-items-center justify-content-between">
                                <strong>  Last 7 days: </strong>
                                <span class="">0</span>
                            </li>
                            <li class="d-flex align-items-center justify-content-between">
                                <strong>  This month: </strong>
                                <span class="">0</span>
                            </li>
                            <li class="d-flex align-items-center justify-content-between">
                                <strong>  Last month: </strong>
                                <span class="">0</span>
                            </li>
                            <li class="d-flex align-items-center justify-content-between">
                                <strong>  This year: </strong>
                                <span class="">0</span>
                            </li>
                            <li class="d-flex align-items-center justify-content-between">
                                <strong>  All time: </strong>
                                <span class="">0</span>
                            </li>
                          </ul>
                      </div>
                      <div class="tab-pane fade" id="carsauto" role="tabpanel" aria-labelledby="five-tab">
                          <ul class="list-unstyled lister">
                            <li class="d-flex align-items-center justify-content-between">
                                <strong>Today</strong>
                                <span class="">0</span>
                            </li>
                            <li class="d-flex align-items-center justify-content-between">
                                <strong>Yesterday</strong>
                                <span class="">0</span>
                            </li>
                            <li class="d-flex align-items-center justify-content-between">
                                <strong>  This week: </strong>
                                <span class="">0</span>
                            </li>
                            <li class="d-flex align-items-center justify-content-between">
                                <strong>  Last 7 days: </strong>
                                <span class="">0</span>
                            </li>
                            <li class="d-flex align-items-center justify-content-between">
                                <strong>  This month: </strong>
                                <span class="">0</span>
                            </li>
                            <li class="d-flex align-items-center justify-content-between">
                                <strong>  Last month: </strong>
                                <span class="">0</span>
                            </li>
                            <li class="d-flex align-items-center justify-content-between">
                                <strong>  This year: </strong>
                                <span class="">0</span>
                            </li>
                            <li class="d-flex align-items-center justify-content-between">
                                <strong>  All time: </strong>
                                <span class="">0</span>
                            </li>
                          </ul>
                      </div>
                      <div class="tab-pane fade" id="carsdealer" role="tabpanel" aria-labelledby="six-tab">
                          <ul class="list-unstyled lister">
                            <li class="d-flex align-items-center justify-content-between">
                                <strong>Today</strong>
                                <span class="">0</span>
                            </li>
                            <li class="d-flex align-items-center justify-content-between">
                                <strong>Yesterday</strong>
                                <span class="">0</span>
                            </li>
                            <li class="d-flex align-items-center justify-content-between">
                                <strong>  This week: </strong>
                                <span class="">0</span>
                            </li>
                            <li class="d-flex align-items-center justify-content-between">
                                <strong>  Last 7 days: </strong>
                                <span class="">0</span>
                            </li>
                            <li class="d-flex align-items-center justify-content-between">
                                <strong>  This month: </strong>
                                <span class="">0</span>
                            </li>
                            <li class="d-flex align-items-center justify-content-between">
                                <strong>  Last month: </strong>
                                <span class="">0</span>
                            </li>
                            <li class="d-flex align-items-center justify-content-between">
                                <strong>  This year: </strong>
                                <span class="">0</span>
                            </li>
                            <li class="d-flex align-items-center justify-content-between">
                                <strong>  All time: </strong>
                                <span class="">0</span>
                            </li>
                          </ul>
                      </div>
                    </div>
                </div>
                <!---->
                <div class="row mb-4">
                    <!---->
                    <div class="col-xl-3 col-sm-6 stretch-card-dashboard mb-4 mb-xl-0">
                        <div class="card card-body">
                            <div class="arrow-circle"><i class="fa fa-long-arrow-right"></i></div>
                            <div class="d-flex align-items-center justify-content-between">
                                <div class="icon-box nth-child1"><img width="35" src="{{ asset('public/backend/newFiles/images/icn-1.svg') }}" class="img-fluid"></div>
                                <div class="ml-2 w-70 content-topboxes">
                                    <h4 class="m-b-10">126<span>Customers</span></h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-sm-6 stretch-card-dashboard mb-4 mb-xl-0">
                        <div class="card card-body">
                            <div class="arrow-circle"><i class="fa fa-long-arrow-right"></i></div>
                            <div class="d-flex align-items-center justify-content-between">
                                <div class="icon-box nth-child2"><img style="filter:brightness(100);" width="45" src="{{ asset('public/backend/newFiles/images/sidebar-icn-6.svg') }}" class=" img-fluid"></div>
                                <div class=" ml-2 w-70 content-topboxes">
                                    <h4 class="m-b-10">121<span>Dealerships</span></h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-sm-6 stretch-card-dashboard mb-4 mb-xl-0">
                        <div class="card card-body">
                            <div class="arrow-circle"><i class="fa fa-long-arrow-right"></i></div>
                            <div class="d-flex align-items-center justify-content-between">
                                <div class="icon-box nth-child3"><img style="filter:brightness(100);" width="45" src="{{ asset('public/backend/newFiles/images/sidebar-icn-11.svg') }}" class="img-fluid"></div>
                                <div class="ml-2 w-70 content-topboxes">
                                    <h4 class="m-b-10">{{ $catcount }}<span>Categories</span></h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-sm-6 stretch-card-dashboard mb-4 mb-xl-0">
                        <div class="card card-body">
                            <div class="arrow-circle"><i class="fa fa-long-arrow-right"></i></div>
                            <div class="d-flex align-items-center justify-content-between">
                                <div class="icon-box nth-child4"><img style="filter:brightness(100);" width="45" src="{{ asset('public/backend/newFiles/images/sidebar-icn-2.svg') }}" class=" img-fluid"></div>
                                <div class="ml-2 w-70 content-topboxes">
                                    <h4 class="m-b-10">{{ $listingcount }}<span>Listings</span></h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!---->
                    <!--<div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 stretch-card-dashboard">-->
                    <!--    <div class="card p-l-15 p-r-15 p-t-15 p-b-15">-->
                            <!--<div class="row m-0">-->
                            <!--    <div class="col bg-light-warning px-6 rounded-border-5 mr-sm-3 m-b-15">-->
                            <!--        <div class="d-flex align-items-center equel-grid justify-content-between">-->
                            <!--            <a href="" class="title-grid"><h4 class="text-light-warning">126 <span>Customers</span></h4></a>-->
                            <!--            <div class="svg-grid rounded-border text-center"><img class="img-fluid" src="{{ asset('public/front/images/users.png') }}"></div>-->
                            <!--        </div>-->
                            <!--    </div>-->
                            <!--    <div class="col bg-light-danger px-6 rounded-border-5 m-b-15">-->
                            <!--        <div class="d-flex align-items-center equel-grid justify-content-between">-->
                            <!--            <a href="" class="title-grid"><h4 class="text-light-danger">121 <span>Dealerships</span></h4></a>-->
                            <!--            <div class="svg-grid rounded-border text-center"><img class="img-fluid" src="{{ asset('public/backend/images/sidebar-icn-29.svg') }}"></div>-->
                            <!--        </div>-->
                            <!--    </div>-->
                            <!--</div>-->
                            <!--<div class="row m-0">-->
                            <!--    <div class="col bg-light-success px-6 rounded-border-5 mr-sm-3">-->
                            <!--        <div class="d-flex align-items-center equel-grid justify-content-between">-->
                            <!--            <a href="" class="title-grid"><h4 class="text-light-success">{{ $catcount }} <span>Categories</span></h4></a>-->
                            <!--            <div class="svg-grid rounded-border text-center"><img class="img-fluid" src="{{ asset('public/backend/images/sidebar-icn-30.svg') }}"></div>-->
                            <!--        </div>-->
                            <!--    </div>-->
                            <!--    <div class="col bg-light-primary px-6 rounded-border-5">-->
                            <!--        <div class="d-flex align-items-center equel-grid justify-content-between">-->
                            <!--            <a href="" class="title-grid"><h4 class="text-light-primary">{{ $listingcount }} <span>Listings</span></h4></a>-->
                            <!--            <div class="svg-grid rounded-border text-center"><img class="img-fluid" src="{{ asset('public/backend/images/sidebar-icn-31.svg') }}"></div>-->
                            <!--        </div>-->
                            <!--    </div>-->
                            <!--</div>-->
                    <!--    </div>-->
                    <!--</div>-->
                </div>
                <!---->
                <div class="row mb-4">
                    <div class="col-xl-6">
                        <div class="card card-body">
                            <h5>Leads by time:</h5>
                             <div id="chartContainer" class="mt-4" style="height: 370px; width: 100%;"></div>
                        </div>
                    </div>
                </div>
                <!---->
                <div class="card">
                    <div class="table-responsive-sm">
                        <table class="table mb-0 table-striped datatable">
                            <thead class="thead-dark">
                              <tr>
                                <th scope="col">Date</th>
                                <th scope="col">Unique</th>
                                <th scope="col">Hits (first page)</th>
                                <th scope="col">Audience</th>
                                <th scope="col">Other sites / Search engines KM</th>
                              </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>01.03.2023</td>
                                    <td>4576</td>
                                    <td>36192 [ 439 ]</td>
                                    <td>2057</td>
                                    <td>428 / 2091</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                    <!---->
                <!--    <div class="col-xl-6 col-lg-6 mb-3">-->
                <!--        <div class="card">-->
                <!--            <h5>Listing Graph</h5>-->
                <!--            <div id="chartContainer" class="mt-4" style="height: 370px; width: 100%;"></div>-->
                <!--        </div>-->
                <!--    </div>-->
                <!--</div>-->
            </div>
        </div>
    </div>
</div>
<script>
    window.onload = function () {

    var chart = new CanvasJS.Chart("chartContainer", {
        animationEnabled: true,
        title:{
            text: ""
        },
        axisX: {
            valueFormatString: "DD MMM,YY"
        },
        axisY: {
            title: "",
            suffix: " $",
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
        //     {
        //     name: "Myrtle Beach",
        //     type: "spline",
        //     yValueFormatString: "#0.## 째C",
        //     showInLegend: true,
        //     dataPoints: [
        //         { x: new Date(2017,6,24), y: 31 },
        //         { x: new Date(2017,6,25), y: 31 },
        //         { x: new Date(2017,6,26), y: 29 },
        //         { x: new Date(2017,6,27), y: 29 },
        //         { x: new Date(2017,6,28), y: 31 },
        //         { x: new Date(2017,6,29), y: 30 },
        //         { x: new Date(2017,6,30), y: 29 }
        //     ]
        // },
        {
            name: "Martha Vineyard",
            type: "spline",
            yValueFormatString: "#0.## $k",
            color:"#151a7b",
            showInLegend: true,
            dataPoints: [
                { x: new Date(2020,6,24), y: 20 },
                { x: new Date(2020,6,25), y: 20 },
                { x: new Date(2020,6,26), y: 25 },
                { x: new Date(2020,6,27), y: 25 },
                { x: new Date(2020,6,28), y: 25 },
                { x: new Date(2020,6,29), y: 25 },
                { x: new Date(2020,6,30), y: 25 }
            ]
        },
        {
            name: "Nantucket",
            type: "spline",
            color:"#dddddd",
            yValueFormatString: "#0.## $k",
            showInLegend: true,
            dataPoints: [
                { x: new Date(2020,6,24), y: 22 },
                { x: new Date(2020,6,25), y: 19 },
                { x: new Date(2020,6,26), y: 23 },
                { x: new Date(2020,6,27), y: 24 },
                { x: new Date(2020,6,28), y: 24 },
                { x: new Date(2020,6,29), y: 23 },
                { x: new Date(2020,6,30), y: 23 }
            ]
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

    // ==========
    var chart1 = new CanvasJS.Chart("chartContainer1", {
    animationEnabled: true,  
    title:{
        text: ""
    },
    axisY: {
        title: "",
        valueFormatString: "#0,,.",
        suffix: "k",
        gridColor: "#e9ecef",
        prefix: "$"
    },
    data: [
        {
            type: "splineArea",
            color: "#26282a",
            markerSize: 5,
            xValueFormatString: "YYYY",
            yValueFormatString: "$#,##0.##",
            dataPoints: [
                { x: new Date(2000, 0), y: 42890 },
                { x: new Date(2001, 0), y: 4830000 },
                { x: new Date(2002, 0), y: 2009000 },
                { x: new Date(2003, 0), y: 3840000 },
                { x: new Date(2004, 0), y: 3396000 },
                { x: new Date(2005, 0), y: 2613000 },
                { x: new Date(2006, 0), y: 3821000 },
                { x: new Date(2007, 0), y: 3000000 },
                { x: new Date(2008, 0), y: 2397000 },
                { x: new Date(2009, 0), y: 3506000 },
                { x: new Date(2010, 0), y: 4798000 },
                { x: new Date(2011, 0), y: 5386000 },
                { x: new Date(2012, 0), y: 7704000},
                { x: new Date(2013, 0), y: 7026000 },
                { x: new Date(2014, 0), y: 3394000 },
                { x: new Date(2015, 0), y: 2872000 },
                { x: new Date(2016, 0), y: 3140000 }
            ]
        },
        {
        type: "splineArea",
        color: "#ffcc2a",
        markerSize: 5,
        xValueFormatString: "YYYY",
        yValueFormatString: "$#,##0.##",
        dataPoints: [
            { x: new Date(2000, 0), y: 3289000 },
            { x: new Date(2001, 0), y: 3830000 },
            { x: new Date(2002, 0), y: 2009000 },
            { x: new Date(2003, 0), y: 2840000 },
            { x: new Date(2004, 0), y: 2396000 },
            { x: new Date(2005, 0), y: 1613000 },
            { x: new Date(2006, 0), y: 2821000 },
            { x: new Date(2007, 0), y: 2000000 },
            { x: new Date(2008, 0), y: 1397000 },
            { x: new Date(2009, 0), y: 2506000 },
            { x: new Date(2010, 0), y: 2798000 },
            { x: new Date(2011, 0), y: 3386000 },
            { x: new Date(2012, 0), y: 6704000},
            { x: new Date(2013, 0), y: 6026000 },
            { x: new Date(2014, 0), y: 2394000 },
            { x: new Date(2015, 0), y: 1872000 },
            { x: new Date(2016, 0), y: 2140000 }
        ]
    }]
    });
chart1.render();
    // ==================

}


</script>
@endsection