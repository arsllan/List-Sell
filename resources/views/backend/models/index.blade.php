@extends('layouts.backendapp')
@section('content')
          <div class="l-main">
            <div class="content-wrapper">
                <div class="container-fluid">
                    <div class="content-wrapper-content">
                        <div class="d-md-flex align-items-center mb-3">
                            <div class="main_heading"><h5 class="">Models</h5></div>
                            <a href="{{ route('create-model') }}" class="btn ml-auto btn-next"><i class="fa mr-2 fa-plus"></i> Add Model</a>
                        </div>
                        <div class="card card-body">
                            @if(session()->has('success'))
                                <div class="alert alert-success">
                                    {{ session()->get('success') }}
                                </div>
                            @endif
                           <div class="table-responsive-sm">
                                <table class="table mt-4 table-striped datatable">
                                    <thead class="thead-dark">
                                      <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">Image</th>
                                        <th scope="col">Brand</th>
                                        <th scope="col">Model</th>
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
            ajax: '{{ route('models-datatables') }}',
            columns: [
                {data: 'id', name: 'id'},
                {data: 'image', name: 'image'},
                {data: 'brand', name: 'brand'},
                {data: 'name', name: 'name'},
                
                {data: 'action', name: 'action', orderable: false, searchable: false},
            ]
        });
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