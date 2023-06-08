@extends('layouts.backendapp')
@section('content')
    <div class="l-main">
        <div class="content-wrapper">
            <div class="content-wrapper-content px-3">
                <div class="d-md-flex align-items-center mb-3">
                    <div class="main_heading"><h5>Personal Site Leads</h5></div>
                </div>
                <div class="card card-body mb-3 mt-3">
                    <div class="d-lg-flex archiveStyle align-items-center justify-content-lg-start justify-content-center">
                        <div class="mb-3 mb-lg-0">
                            <div class="input-group d-md-flex d-block mb-0 align-items-center justify-content-lg-start justify-content-center">
                                <label style="font-weight:600; font-size:14px" class="mb-2 mb-md-0 m-0 mr-3"><img class="img-fluid" src="{{ asset('public/backend/images/pdf.gif') }}" alt="icon"/> Export:</label>
                                <select class="form-control mb-2 mb-md-0" id="exampleFormControlSelect1">
                                  <option> 03-2023 (3) </option>
                                  <option>2</option>
                                  <option>3</option>
                                  <option>4</option>
                                  <option>5</option>
                                </select>
                              <button type="button" class="input-group-text ml-2" id="basic-addon1">PDF</button>
                              <button type="button" class="input-group-text ml-2" id="basic-addon1">CSV</button>
                            </div>
                        </div>
                        <div class="ml-auto">
                            <div class="input-group d-md-flex d-block mb-0 align-items-center justify-content-lg-start justify-content-center">
                                <label style=" font-weight:600; font-size:14px" class="mb-2 mb-md-0 m-0 mr-3"><img class="img-fluid" src="{{ asset('public/backend/images/arrow_green.png') }}" alt="icon"/> Lead archive:</label>
                                <select class="form-control mb-2 mb-md-0" id="exampleFormControlSelect1">
                                  <option> 03-2023 (3) </option>
                                  <option>2</option>
                                  <option>3</option>
                                  <option>4</option>
                                  <option>5</option>
                                </select>
                              <button type="button" class="input-group-text ml-2" id="basic-addon1">Go</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!---->
                <div class="row">
                    <div class="col-xl-12 col-lg-12 mb-3">
                        <div class="card card-body">
                            <h5>Body types Graph</h5>
                            <div id="chartContainer3" class="mt-4" style="height: 370px; width: 100%;"></div>
                        </div>
                    </div>
                </div>
                <!---->
                <div class="card">
                    <div class="table-responsive-sm">
                        <table class="mb-0 table table-striped datatable">
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
            </div>
        </div>
    </div>
@endsection