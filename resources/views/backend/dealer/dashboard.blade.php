@extends('layouts.backendapp')
@section('content')

<div class="l-main">
    <div class="content-wrapper">
        <div class="container-fluid">
            <div class="row mb-4">
                <div class="col-xl-3 col-sm-6 stretch-card-dashboard mb-4 mb-xl-0">
                    <div class="card card-body">
                        <div class="arrow-circle"><i class="fa fa-long-arrow-right"></i></div>
                        <div class="d-flex align-items-center justify-content-between">
                            <div class="icon-box nth-child1"><img width="35" src="{{ asset('public/backend/newFiles/images/icn-1.png') }}" class="img-fluid"></div>
                            <div class="w-70 content-topboxes">
                                <h4 class="m-b-10">{{ $listingcount }}<span>Listings</span></h4>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 stretch-card-dashboard mb-4 mb-xl-0">
                    <div class="card card-body">
                        <div class="arrow-circle"><i class="fa fa-long-arrow-right"></i></div>
                        <div class="d-flex align-items-center justify-content-between">
                            <div class="icon-box nth-child2"><img width="35" src="{{ asset('public/backend/newFiles/images/icn-2.png') }}" class="img-fluid"></div>
                            <div class="w-70 content-topboxes">
                                <h4 class="m-b-10">{{ $leadscount }}<span>Total Leads</span></h4>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 stretch-card-dashboard mb-4 mb-xl-0">
                    <div class="card card-body">
                        <div class="arrow-circle"><i class="fa fa-long-arrow-right"></i></div>
                        <div class="d-flex align-items-center justify-content-between">
                            <div class="icon-box nth-child3"><img width="35" src="{{ asset('public/backend/newFiles/images/icn-3.png') }}" class="img-fluid"></div>
                            <div class="w-70 content-topboxes">
                                <h4 class="m-b-10">Freemium<span>Current Subscrption Package</span></h4>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 stretch-card-dashboard mb-4 mb-xl-0">
                    <div class="card card-body">
                        <div class="arrow-circle"><i class="fa fa-long-arrow-right"></i></div>
                        <div class="d-flex align-items-center justify-content-between">
                            <div class="icon-box nth-child4"><img width="35" src="{{ asset('public/backend/newFiles/images/icn-4.png') }}" class="img-fluid"></div>
                            <div class="w-70 content-topboxes">
                                <h4 class="m-b-10">126<span>Top Listing</span></h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!---->
            <div class="row">
                <div class="col-xl-6 col-lg-6 m-b-30">
                    <div class="card card-body">
                        <h5>Top Listing Views By Customer</h5>
                        <div id="chartContainer" class="mt-4" style="height: 370px; width: 100%;"></div>
                    </div>
                </div>
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
        //     yValueFormatString: "#0.## ьз╕C",
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