@extends('layouts.backendapp')
@section('content')
          <div class="l-main">
                <div class="content-wrapper">
                    <div class="container-fluid">
                        <div class="content-wrapper-content">
                            <div class="d-md-flex align-items-center mb-3">
                                <div class="main_heading"><h5>Ads Subscriptions</h5></div>
                                <a href="{{ route('create-adssubscription') }}" class="btn ml-auto btn-next"><i class="fa mr-2 fa-plus"></i> Add Ad Subscription</a>
                            </div>
                            <div class="card card-body mt-4">
                                    @if(session()->has('success'))
                                        <div class="alert alert-success">
                                            {{ session()->get('success') }}
                                        </div>
                                    @endif
                                <div class="table-responsive-sm">
                                    <table class="table mt-4 table-striped datatable">
                                        <thead class="thead-dark">
                                          <tr>
                                            <th scope="col">Title</th>
                                            <th scope="col">Seven Days Price</th>
                                            <th scope="col">Fifteen Days Price</th>
                                            <th scope="col">Thirty Days Price</th>
                                            <th scope="col">Action</th>
                                          </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($ads as $ad)
                                                <tr>
                                                    <td>{{ $ad->name }}</td>
                                                    <td>{{ $ad->seven_days_price }}</td>
                                                    <td>{{ $ad->fifteen_days_price }}</td>
                                                    <td>{{ $ad->thirty_days_price }}</td>
                                                    <td>
                                                        <div class="d-flex align-items-center">
                                                            <a href="/adssubscription/edit/{{ $ad->id }}" class="btn btn-sm mr-1 edit">Edit</a>
                                                            <a href="/adssubscription/delete/{{ $ad->id }}" class="btn btn-sm dell delete-confirm">Delete</a>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
<script>
    $(document).ready(function() {
        $('.datatable').DataTable({});
    });
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
  
</script>
@endsection