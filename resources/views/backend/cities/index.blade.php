@extends('layouts.backendapp')
@section('content')
          <div class="l-main">
                <div class="content-wrapper">
                    <div class="container-fluid">
                        <div class="content-wrapper-content">
                            <div class="d-md-flex align-items-center mb-3">
                                <div class="main_heading"><h5 class="">Cities</h5></div>
                                <a href="{{ route('create-city') }}" class="btn ml-auto btn-next"><i class="fa mr-2 fa-plus"></i> Add Cities</a>
                            </div>
                            <div class="card card-body">
                                @if(session()->has('success'))
                                    <div class="alert alert-success">
                                        {{ session()->get('success') }}
                                    </div>
                                @endif                                
                                <div class="table-responsive-sm">
                                    <table class="table mt-4 table-striped not-border datatable">
                                        <thead class="thead-dark">
                                          <tr>
                                            <th scope="col">ID</th>
                                            <th scope="col">State</th>
                                            <th scope="col">City Name</th>
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
<script>
    $(document).ready(function() {
        $('.datatable').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{{ route('city-datatables') }}',
            columns: [
                {data: 'id', name: 'id'},
                {data: 'state', name: 'state'},
                {data: 'name', name: 'name'},
                {data: 'action', name: 'action', orderable: false, searchable: false},
            ]
        });
    });
</script>
@endsection