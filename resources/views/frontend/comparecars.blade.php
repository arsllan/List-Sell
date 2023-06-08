@extends('layouts/frontapp')
@section('content')
    <div class="page-heading">
    <div class="breadcrumbs">
          <div class="container">
            <div class="row">
              <div class="col-xs-12">
                <ul>
                  <li class="home"> <a href="index.html" title="Go to Home Page">Home</a> <span>&rsaquo; </span> </li>
                  <li class="category1599"> <a href="grid.html" title="">New Car</a> <span>&rsaquo; </span> </li>
                  <li class="category1600"> <a href="grid.html" title="">Audi</a> <span>&rsaquo; </span> </li>
                  <li class="category1601"> <strong>Sedans</strong> </li>
                </ul>
              </div>
              <!--col-xs-12--> 
            </div>
            <!--row--> 
          </div>
          <!--container--> 
        </div>
        <div class="page-title">
          <h2>Compare Cars</h2>
        </div>
    </div>
    <!---->
    <form class="mt-4 d-none d-md-block">
        <div class="container">
            <div class="d-flex align-items-center ddd justify-content-between">
                <div class="input-group">
                    <select name="body" id="body-short_form" class="form-select" title="Body Type - any">
                        <option value="">Body Type - any</option>
                        <option value="Sedan">Sedan (1553)</option>
                        <option value="Hatchback">Hatchback (4245)</option>
                        <option value="SUV">SUV (3076)</option>
                        <option value="Station Wagon">Station Wagon (59)</option>
                        <option value="Coupe">Coupe (115)</option>
                        <option value="Fastback">Fastback (1)</option>
                        <option value="Crossover">Crossover (1506)</option>
                        <option value="Convertible">Convertible (96)</option>
                        <option value="MPV">MPV (282)</option>
                        <option value="Panel van">Panel van (66)</option>
                        <option value="Minibus">Minibus (37)</option>
                        <option value="Bakkie Double Cab">Bakkie Double Cab (1131)</option>
                        <option value="Bakkie Single Cab">Bakkie Single Cab (717)</option>
                        <option value="Bakkie Extended Cab">Bakkie Extended Cab (117)</option>
                    </select>
                </div>
                <!---->
                <div class="input-group">
                    <select name="transmission" id="transmission-short_form" class="form-select" title="Transmission - any">
                        <option value="">Transmission - any</option>
                        <option value="Amt">Amt (1)</option>
                        <option value="Automatic">Automatic (5825)</option>
                        <option value="Manual">Manual (7043)</option>
                        <option value="N/a">N/a (2)</option>
                    </select>
                </div>
                <!---->
                <div class="input-group">
                    <select name="manufacturer" id="manufacturer-short_form" class="form-select" title="Make - any">
                        <option value="">Make - any</option>
                        <option value="Alfa Romeo">Alfa Romeo (19)</option>
                        <option value="Aston Martin">Aston Martin (1)</option>
                        <option value="Audi">Audi (280)</option>
                        <option value="Bentley">Bentley (4)</option>
                        <option value="BMW">BMW (462)</option>
                        <option value="Chana">Chana (1)</option>
                        <option value="Chery">Chery (73)</option>
                        <option value="Chevrolet">Chevrolet (119)</option>
                        <option value="Chrysler">Chrysler (4)</option>
                        <option value="Citroen">Citroen (37)</option>
                        <option value="Daewoo">Daewoo (1)</option>
                        <option value="Daihatsu">Daihatsu (10)</option>
                        <option value="Datsun">Datsun (64)</option>
                        <option value="Dodge">Dodge (6)</option>
                        <option value="Ferrari">Ferrari (3)</option>
                        <option value="Fiat">Fiat (51)</option>
                        <option value="Ford">Ford (1260)</option>
                        <option value="Foton">Foton (1)</option>
                        <option value="GoNow">GoNow (1)</option>
                        <option value="GWM">GWM (97)</option>
                        <option value="Haval">Haval (122)</option>
                        <option value="Honda">Honda (166)</option>
                        <option value="Hyundai">Hyundai (2706)</option>
                        <option value="Infiniti">Infiniti (1)</option>
                        <option value="Isuzu">Isuzu (308)</option>
                        <option value="JAC">JAC (1)</option>
                        <option value="Jaguar">Jaguar (44)</option>
                        <option value="Jeep">Jeep (102)</option>
                        <option value="Kia">Kia (906)</option>
                        <option value="Lamborghini">Lamborghini (2)</option>
                        <option value="Land Rover">Land Rover (221)</option>
                        <option value="Lexus">Lexus (54)</option>
                        <option value="Mahindra">Mahindra (67)</option>
                        <option value="Maserati">Maserati (1)</option>
                        <option value="Mazda">Mazda (161)</option>
                        <option value="Mercedes-AMG">Mercedes-AMG (2)</option>
                        <option value="Mercedes-Benz">Mercedes-Benz (455)</option>
                        <option value="MG">MG (4)</option>
                        <option value="MINI">MINI (32)</option>
                        <option value="Mitsubishi">Mitsubishi (113)</option>
                        <option value="Nissan">Nissan (797)</option>
                        <option value="Opel">Opel (281)</option>
                        <option value="Peugeot">Peugeot (69)</option>
                        <option value="Porsche">Porsche (28)</option>
                        <option value="Renault">Renault (722)</option>
                        <option value="SEAT">SEAT (1)</option>
                        <option value="smart">smart (2)</option>
                        <option value="SsangYong">SsangYong (2)</option>
                        <option value="Subaru">Subaru (12)</option>
                        <option value="Suzuki">Suzuki (290)</option>
                        <option value="TATA">TATA (12)</option>
                        <option value="Toyota">Toyota (1567)</option>
                        <option value="Volkswagen">Volkswagen (1444)</option>
                        <option value="Volvo">Volvo (57)</option>
                    </select>
                </div>
                <!---->
                <div class="input-group">
                    <select name="model_id" id="model_id-short_form" class="form-select" title="Model - any">
                        <option value="" selected="selected">Model - any</option>
                    </select>
                </div>
                <!---->
                <div class="input-group">
                    <select name="modelgroup" id="modelgroup-short_form" class="form-select" title="Model Group - any">
                        <option value="" selected="selected">Model Group - any</option>
                    </select>
                </div>
                <!---->
                <div class="input-group">
                    <select name="start_price" id="start_price-short_form" class="form-select" title="Price - from">
                        <option value="">Price - from</option>
                        <option value="0">R0</option>
                        <option value="10000">R10,000</option>
                        <option value="20000">R20,000</option>
                        <option value="30000">R30,000</option>
                        <option value="40000">R40,000</option>
                        <option value="50000">R50,000</option>
                        <option value="60000">R60,000</option>
                        <option value="70000">R70,000</option>
                        <option value="80000">R80,000</option>
                        <option value="90000">R90,000</option>
                        <option value="100000">R100,000</option>
                        <option value="110000">R110,000</option>
                        <option value="120000">R120,000</option>
                        <option value="130000">R130,000</option>
                        <option value="140000">R140,000</option>
                        <option value="150000">R150,000</option>
                        <option value="160000">R160,000</option>
                        <option value="170000">R170,000</option>
                        <option value="180000">R180,000</option>
                        <option value="190000">R190,000</option>
                        <option value="200000">R200,000</option>
                        <option value="250000">R250,000</option>
                        <option value="300000">R300,000</option>
                        <option value="350000">R350,000</option>
                        <option value="400000">R400,000</option>
                        <option value="450000">R450,000</option>
                        <option value="500000">R500,000</option>
                        <option value="550000">R550,000</option>
                        <option value="600000">R600,000</option>
                        <option value="650000">R650,000</option>
                        <option value="700000">R700,000</option>
                        <option value="750000">R750,000</option>
                        <option value="800000">R800,000</option>
                        <option value="850000">R850,000</option>
                        <option value="900000">R900,000</option>
                        <option value="950000">R950,000</option>
                        <option value="1000000">R1,000,000</option>
                        <option value="2000000">R2,000,000</option>
                        <option value="3000000">R3,000,000</option>
                        <option value="4000000">R4,000,000</option>
                        <option value="5000000">R5,000,000</option>
                        <option value="6000000">R6,000,000</option>
                        <option value="7000000">R7,000,000</option>
                        <option value="8000000">R8,000,000</option>
                        <option value="9000000">R9,000,000</option>
                    </select>
                </div>
                <!---->
                <div class="input-group">
                    <select name="end_price" id="end_price-short_form" class="form-select" title="Price - to">
                        <option value="">Price - to</option>
                        <option value="10000">R10,000</option>
                        <option value="20000">R20,000</option>
                        <option value="30000">R30,000</option>
                        <option value="40000">R40,000</option>
                        <option value="50000">R50,000</option>
                        <option value="60000">R60,000</option>
                        <option value="70000">R70,000</option>
                        <option value="80000">R80,000</option>
                        <option value="90000">R90,000</option>
                        <option value="100000">R100,000</option>
                        <option value="110000">R110,000</option>
                        <option value="120000">R120,000</option>
                        <option value="130000">R130,000</option>
                        <option value="140000">R140,000</option>
                        <option value="150000">R150,000</option>
                        <option value="160000">R160,000</option>
                        <option value="170000">R170,000</option>
                        <option value="180000">R180,000</option>
                        <option value="190000">R190,000</option>
                        <option value="200000">R200,000</option>
                        <option value="250000">R250,000</option>
                        <option value="300000">R300,000</option>
                        <option value="350000">R350,000</option>
                        <option value="400000">R400,000</option>
                        <option value="450000">R450,000</option>
                        <option value="500000">R500,000</option>
                        <option value="550000">R550,000</option>
                        <option value="600000">R600,000</option>
                        <option value="650000">R650,000</option>
                        <option value="700000">R700,000</option>
                        <option value="750000">R750,000</option>
                        <option value="800000">R800,000</option>
                        <option value="850000">R850,000</option>
                        <option value="900000">R900,000</option>
                        <option value="950000">R950,000</option>
                        <option value="1000000">R1,000,000</option>
                        <option value="2000000">R2,000,000</option>
                        <option value="3000000">R3,000,000</option>
                        <option value="4000000">R4,000,000</option>
                        <option value="5000000">R5,000,000</option>
                        <option value="6000000">R6,000,000</option>
                        <option value="7000000">R7,000,000</option>
                        <option value="8000000">R8,000,000</option>
                        <option value="9000000">R9,000,000</option>
                        <option value="10000000">R10,000,000</option>
                    </select>
                </div>
                <!---->
                <div class="input-group">
                    <a class="btn btn-primary" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">More Options</a>
                </div>
                <!---->
                <div class="input-group"><button type="submit" class="w-100 btn" style="background-color:#222;">Search</button></div>
            </div>
            <!---->
            <div class="collapse mt-3" id="collapseExample">
                <div class="d-flex align-items-center ddd justify-content-between">
                    <div class="input-group">
                        <select name="fuel" id="fuel-short_form" class="form-select" title="Fuel - any">
                            <option value="">Fuel - any</option>
                            <option value="Diesel">Diesel (3158)</option>
                            <option value="Hybrid Fuel">Hybrid Fuel (13)</option>
                            <option value="Petrol">Petrol (9658)</option>
                        </select>
                    </div>
                    <!---->
                    <div class="input-group">
                        <select name="start_year" id="start_year-short_form" class="form-select" title="Year - from">
                            <option value="">Year - from</option>
                            <option value="2023">2023 (552)</option>
                            <option value="2022">2022 (2634)</option>
                            <option value="2021">2021 (5611)</option>
                            <option value="2020">2020 (6977)</option>
                            <option value="2019">2019 (8033)</option>
                            <option value="2018">2018 (8885)</option>
                            <option value="2017">2017 (9655)</option>
                            <option value="2016">2016 (10352)</option>
                            <option value="2015">2015 (10906)</option>
                            <option value="2014">2014 (11396)</option>
                            <option value="2013">2013 (11809)</option>
                            <option value="2012">2012 (12134)</option>
                            <option value="2011">2011 (12350)</option>
                            <option value="2010">2010 (12517)</option>
                            <option value="2009">2009 (12617)</option>
                            <option value="2008">2008 (12733)</option>
                            <option value="2007">2007 (12839)</option>
                            <option value="2006">2006 (12929)</option>
                            <option value="2005">2005 (13004)</option>
                            <option value="2004">2004 (13055)</option>
                            <option value="2003">2003 (13078)</option>
                            <option value="2002">2002 (13112)</option>
                            <option value="2001">2001 (13133)</option>
                            <option value="2000">2000 (13164)</option>
                            <option value="1999">1999 (13175)</option>
                            <option value="1998">1998 (13191)</option>
                            <option value="1997">1997 (13198)</option>
                            <option value="1996">1996 (13211)</option>
                            <option value="1995">1995 (13221)</option>
                            <option value="1994">1994 (13224)</option>
                            <option value="1992">1992 (13226)</option>
                            <option value="1990">1990 (13227)</option>
                            <option value="1989">1989 (13228)</option>
                            <option value="1988">1988 (13230)</option>
                            <option value="1987">1987 (13231)</option>
                            <option value="1986">1986 (13233)</option>
                            <option value="1985">1985 (13236)</option>
                            <option value="1984">1984 (13237)</option>
                            <option value="1983">1983 (13238)</option>
                            <option value="1979">1979 (13239)</option>
                            <option value="1978">1978 (13240)</option>
                            <option value="1977">1977 (13241)</option>
                            <option value="1972">1972 (13242)</option>
                            <option value="1961">1961 (13243)</option>
                            <option value="1959">1959 (13244)</option>
                        </select>
                    </div>
                    <!---->
                    <div class="input-group">
                        <select name="end_year" id="end_year-short_form" class="form-select" title="Year - to">
                            <option value="">Year - to</option>
                            <option value="2023">2023 (13246)</option>
                            <option value="2022">2022 (12694)</option>
                            <option value="2021">2021 (10612)</option>
                            <option value="2020">2020 (7635)</option>
                            <option value="2019">2019 (6269)</option>
                            <option value="2018">2018 (5213)</option>
                            <option value="2017">2017 (4361)</option>
                            <option value="2016">2016 (3591)</option>
                            <option value="2015">2015 (2894)</option>
                            <option value="2014">2014 (2340)</option>
                            <option value="2013">2013 (1850)</option>
                            <option value="2012">2012 (1437)</option>
                            <option value="2011">2011 (1112)</option>
                            <option value="2010">2010 (896)</option>
                            <option value="2009">2009 (729)</option>
                            <option value="2008">2008 (629)</option>
                            <option value="2007">2007 (513)</option>
                            <option value="2006">2006 (407)</option>
                            <option value="2005">2005 (317)</option>
                            <option value="2004">2004 (242)</option>
                            <option value="2003">2003 (191)</option>
                            <option value="2002">2002 (168)</option>
                            <option value="2001">2001 (134)</option>
                            <option value="2000">2000 (113)</option>
                            <option value="1999">1999 (82)</option>
                            <option value="1998">1998 (71)</option>
                            <option value="1997">1997 (55)</option>
                            <option value="1996">1996 (48)</option>
                            <option value="1995">1995 (35)</option>
                            <option value="1994">1994 (25)</option>
                            <option value="1992">1992 (22)</option>
                            <option value="1990">1990 (20)</option>
                            <option value="1989">1989 (19)</option>
                            <option value="1988">1988 (18)</option>
                            <option value="1987">1987 (16)</option>
                            <option value="1986">1986 (15)</option>
                            <option value="1985">1985 (13)</option>
                            <option value="1984">1984 (10)</option>
                            <option value="1983">1983 (9)</option>
                            <option value="1979">1979 (8)</option>
                            <option value="1978">1978 (7)</option>
                            <option value="1977">1977 (6)</option>
                            <option value="1972">1972 (5)</option>
                            <option value="1961">1961 (4)</option>
                            <option value="1959">1959 (3)</option>
                        </select>
                    </div>
                    <!---->
                    <div class="input-group">
                        <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
                    </div>
                </div>
            </div>
        </div>
    </form>
    <!---->
    <div class="main-container col1-layout wow bounceInUp animated animated" style="visibility: visible;">     
              
	       <div class="main">                     
           <div class="container">    
           <div class="b-compare-images">
			<div class="row justify-content-end">
				<div class="col-lg-3 col-md-3 col-sm-6 col-6 col-md-offset-3">
			
				</div>
			    @forelse($comparecars as $compare)
				<div class="col-lg-3 col-md-3 col-sm-6 col-6 col-md-offset-3">
					<div class="position-relative">
						<h3>{{ $compare->title }}</h3>
						<div class="position-relative">
						    <img class="img-fluid" src="{{ asset('public/uploads/listings/'.$compare->feature_image) }}" alt="image">
						    <a href="{{ route('compare-car-destroy',$compare->id) }}" class="btn btn_delete"></a>
						</div>
						<div class="b-compare-price p-0 mt-3">
						    <div class="b-compare__images-item-price-vs @if($loop->last) d-none @endif">vs</div>
						    <!--${{ $compare->auto_details->sale_price }}-->
						    <select class="form-select mb-3" aria-label="Default select example">
                              <option selected>Open this select menu</option>
                              <option value="1">One</option>
                              <option value="2">Two</option>
                              <option value="3">Three</option>
                            </select>
                            <!---->
                            <select class="form-select mb-3" aria-label="Default select example">
                              <option selected>Open this select menu</option>
                              <option value="1">One</option>
                              <option value="2">Two</option>
                              <option value="3">Three</option>
                            </select>
                            <!---->
                            <select class="form-select" aria-label="Default select example">
                              <option selected>Open this select menu</option>
                              <option value="1">One</option>
                              <option value="2">Two</option>
                              <option value="3">Three</option>
                            </select>
						</div>
					</div>
				</div>
				@empty
				    <div class="b-compare-images p-0 m-0 border-0 shadow-none">
            			<div class="row justify-content-end">
            				<div class="col-lg-3 col-md-3 col-sm-6 col-6 col-md-offset-3">
            			        <div class="position-relative">
            						<div class="position-relative">
            						    <img class="img-fluid" src="{{ asset('public/uploads/listings/blank_car.png') }}" alt="image">
            						</div>
            						<div class="b-compare-price p-0 mt-3">
            						    <select class="form-select mb-3" aria-label="Default select example">
                                          <option selected>Open this select menu</option>
                                          <option value="1">One</option>
                                          <option value="2">Two</option>
                                          <option value="3">Three</option>
                                        </select>
                                        <!---->
                                        <select class="form-select mb-3" aria-label="Default select example">
                                          <option selected>Open this select menu</option>
                                          <option value="1">One</option>
                                          <option value="2">Two</option>
                                          <option value="3">Three</option>
                                        </select>
                                        <!---->
                                        <select class="form-select" aria-label="Default select example">
                                          <option selected>Open this select menu</option>
                                          <option value="1">One</option>
                                          <option value="2">Two</option>
                                          <option value="3">Three</option>
                                        </select>
            						</div>
            					</div>
            				</div>
            				<!---->
            				<div class="col-lg-3 col-md-3 col-sm-6 col-6 col-md-offset-3">
            					<div class="position-relative">
            						<div class="position-relative">
            						    <img class="img-fluid" src="{{ asset('public/uploads/listings/blank_car.png') }}" alt="image">
            						</div>
            						<div class="b-compare-price p-0 mt-3">
            						    <select class="form-select mb-3" aria-label="Default select example">
                                          <option selected>Open this select menu</option>
                                          <option value="1">One</option>
                                          <option value="2">Two</option>
                                          <option value="3">Three</option>
                                        </select>
                                        <!---->
                                        <select class="form-select mb-3" aria-label="Default select example">
                                          <option selected>Open this select menu</option>
                                          <option value="1">One</option>
                                          <option value="2">Two</option>
                                          <option value="3">Three</option>
                                        </select>
                                        <!---->
                                        <select class="form-select" aria-label="Default select example">
                                          <option selected>Open this select menu</option>
                                          <option value="1">One</option>
                                          <option value="2">Two</option>
                                          <option value="3">Three</option>
                                        </select>
            						</div>
            					</div>
            				</div>
            				<!---->
            				<div class="col-lg-3 col-md-3 col-sm-6 col-6 col-md-offset-3">
            					<div class="position-relative">
            						<div class="position-relative">
            						    <img class="img-fluid" src="{{ asset('public/uploads/listings/blank_car.png') }}" alt="image">
            						</div>
            						<div class="b-compare-price p-0 mt-3">
            						    <select class="form-select mb-3" aria-label="Default select example">
                                          <option selected>Open this select menu</option>
                                          <option value="1">One</option>
                                          <option value="2">Two</option>
                                          <option value="3">Three</option>
                                        </select>
                                        <!---->
                                        <select class="form-select mb-3" aria-label="Default select example">
                                          <option selected>Open this select menu</option>
                                          <option value="1">One</option>
                                          <option value="2">Two</option>
                                          <option value="3">Three</option>
                                        </select>
                                        <!---->
                                        <select class="form-select" aria-label="Default select example">
                                          <option selected>Open this select menu</option>
                                          <option value="1">One</option>
                                          <option value="2">Two</option>
                                          <option value="3">Three</option>
                                        </select>
            						</div>
            					</div>
            				</div>
            			</div>
            		</div>
				@endforelse
			</div>
		</div>
   <div class="b-compare-block">
   <h2 style="background: #50b2fc;">Pricing</h2>
						<div class="row">
							<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
								<div class="b-compare__block-inside-title">
									Make / Year
								</div>
							</div>
							<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
								<div class="b-compare__block-inside-value">
									New 2019 Audi A6 2.0
								</div>
							</div>
							<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
								<div class="b-compare__block-inside-value">
								2019 Porsche Cayenne
								</div>
							</div>
							<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
								<div class="b-compare__block-inside-value">
									Hyundai EON 2019
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
								<div class="b-compare__block-inside-title">
									Front Head Room
								</div>
							</div>
							<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
								<div class="b-compare__block-inside-value">
									39.5 in
								</div>
							</div>
							<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
								<div class="b-compare__block-inside-value">
									38.0 in
								</div>
							</div>
							<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
								<div class="b-compare__block-inside-value">
									37.9 in
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
								<div class="b-compare__block-inside-title">
									Width / Height / Length
								</div>
							</div>
							<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
								<div class="b-compare__block-inside-value">
									74.8 in  /  57.3 in  /  201.9 in
								</div>
							</div>
							<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
								<div class="b-compare__block-inside-value">
									73.0 in  /  57.0 in  /  192.5 in
								</div>
							</div>
							<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
								<div class="b-compare__block-inside-value">
									56.4 in  /  73.8 in  /  205.0 in
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
								<div class="b-compare__block-inside-title">
									Wheel Base
								</div>
							</div>
							<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
								<div class="b-compare__block-inside-value">
									119.0 in
								</div>
							</div>
							<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
								<div class="b-compare__block-inside-value">
									113.5 in
								</div>
							</div>
							<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
								<div class="b-compare__block-inside-value">
									121.6 in
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
								<div class="b-compare__block-inside-title">
									Cargo capacity, all seats in place
								</div>
							</div>
							<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
								<div class="b-compare__block-inside-value">
									15.2 cu.ft.
								</div>
							</div>
							<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
								<div class="b-compare__block-inside-value">
									12.9 cu.ft.
								</div>
							</div>
							<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
								<div class="b-compare__block-inside-value">
									13.0 cu.ft.
								</div>
							</div>
						</div>
					</div>
                    
                    <div class="b-compare-block">
                    <h2>MECHANICAL FEATURES</h2>
						<div class="row">
							<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
								<div class="b-compare__block-inside-title">
									Base Engine / Cylinders
								</div>
							</div>
							<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
								<div class="b-compare__block-inside-value">
									5.0 L / V8
								</div>
							</div>
							<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
								<div class="b-compare__block-inside-value">
									201 L / Inline 4
								</div>
							</div>
							<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
								<div class="b-compare__block-inside-value">
									5.0 L / V8
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
								<div class="b-compare__block-inside-title">
									Fuel Capacity / Type
								</div>
							</div>
							<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
								<div class="b-compare__block-inside-value">
									21.7 gal. / Flex-fuel
								</div>
							</div>
							<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
								<div class="b-compare__block-inside-value">
									21.1 gal. / Diesel fuel
								</div>
							</div>
							<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
								<div class="b-compare__block-inside-value">
									22.2 gal / Premium
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
								<div class="b-compare__block-inside-title">
									Fuel Economy (city / hwy)
								</div>
							</div>
							<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
								<div class="b-compare__block-inside-value">
									15 / 23 mpg
								</div>
							</div>
							<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
								<div class="b-compare__block-inside-value">
									28 / 42 mpg
								</div>
							</div>
							<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
								<div class="b-compare__block-inside-value">
									19 / 23 mpg
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
								<div class="b-compare__block-inside-title">
									Horsepower
								</div>
							</div>
							<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
								<div class="b-compare__block-inside-value">
									470 hp @ 6000 rpm
								</div>
							</div>
							<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
								<div class="b-compare__block-inside-value">
									195 hp @ 3800 rpm
								</div>
							</div>
							<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
								<div class="b-compare__block-inside-value">
									438 hp @ 6400 rpm
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
								<div class="b-compare__block-inside-title">
									Transmission
								</div>
							</div>
							<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
								<div class="b-compare__block-inside-value">
									8-speed shiftable automatic
								</div>
							</div>
							<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
								<div class="b-compare__block-inside-value">
									7-speed shiftable automatic
								</div>
							</div>
							<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
								<div class="b-compare__block-inside-value">
									Variable-speed automatic
								</div>
							</div>
						</div>
					</div>
                    
                    
              
					
					<div class="b-compare-block">
                    <h2 style="background-color: #23292e;">EXTERIOR / INTERIOR FEATURES</h2>
						<div class="row">
							<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
								<div class="b-compare__block-inside-title">
									All Season Tires
								</div>
							</div>
							<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
								<div class="b-compare__block-inside-value">
									Optional
								</div>
							</div>
							<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
								<div class="b-compare__block-inside-value">
									Standard
								</div>
							</div>
							<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
								<div class="b-compare__block-inside-value">
									Standard
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
								<div class="b-compare__block-inside-title">
									Power Glass Sunroof
								</div>
							</div>
							<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
								<div class="b-compare__block-inside-value">
									Standard
								</div>
							</div>
							<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
								<div class="b-compare__block-inside-value">
									Standard
								</div>
							</div>
							<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
								<div class="b-compare__block-inside-value">
									Standard
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
								<div class="b-compare__block-inside-title">
									Tire Size
								</div>
							</div>
							<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
								<div class="b-compare__block-inside-value">
									275/35R20 102Y tires
								</div>
							</div>
							<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
								<div class="b-compare__block-inside-value">
									245/45R17 tires
								</div>
							</div>
							<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
								<div class="b-compare__block-inside-value">
									245/45R V tires
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
								<div class="b-compare__block-inside-title">
									Wheels
								</div>
							</div>
							<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
								<div class="b-compare__block-inside-value">
									Painted alloy wheels
								</div>
							</div>
							<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
								<div class="b-compare__block-inside-value">
									Alloy wheels
								</div>
							</div>
							<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
								<div class="b-compare__block-inside-value">
									Painted alloy wheels
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
								<div class="b-compare__block-inside-title">
									A/C With Climate Control
								</div>
							</div>
							<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
								<div class="b-compare__block-inside-value">
									Standard
								</div>
							</div>
							<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
								<div class="b-compare__block-inside-value">
									Standard
								</div>
							</div>
							<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
								<div class="b-compare__block-inside-value">
									Standard
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
								<div class="b-compare__block-inside-title">
									Built-in Hard Drive
								</div>
							</div>
							<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
								<div class="b-compare__block-inside-value">
									Standard
								</div>
							</div>
							<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
								<div class="b-compare__block-inside-value">
									Optional
								</div>
							</div>
							<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
								<div class="b-compare__block-inside-value">
									N / A
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
								<div class="b-compare__block-inside-title">
									HD Radio
								</div>
							</div>
							<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
								<div class="b-compare__block-inside-value">
									Standard
								</div>
							</div>
							<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
								<div class="b-compare__block-inside-value">
									Standard
								</div>
							</div>
							<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
								<div class="b-compare__block-inside-value">
									Standard
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
								<div class="b-compare__block-inside-title">
									Heated / Cooled Seats
								</div>
							</div>
							<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
								<div class="b-compare__block-inside-value">
									Standard
								</div>
							</div>
							<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
								<div class="b-compare__block-inside-value">
									Optional
								</div>
							</div>
							<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
								<div class="b-compare__block-inside-value">
									Standard
								</div>
							</div>
						</div>
					</div>
				
                    
                    
                    </div>
	       </div><!--main-container-->
          
          </div> <!--col1-layout-->
@endsection