@extends('layouts.backendapp')
@section('content')
<div class="l-main">
    <div class="content-wrapper">
        <div class="container-fluid">
            <div class="content-wrapper-content">
                <div class="d-md-flex align-items-center mb-3">
                    <div class="main_heading"><h5>Manage Ads</h5></div>
                </div>
                <div class="card card-body">
                    <div class="table-responsive">
                        <table class="table mt-4 table-striped datatable">
                            <thead class="thead-dark">
                              <tr>
                                <th scope="col">Ref No</th>
                                <th scope="col">MM Code/Color</th>
                                <th scope="col">Title</th>
                                <th scope="col">Site Click</th>
                                <th scope="col">Leads</th>
                                <th scope="col">Created</th>
                                <th scope="col">Price</th>
                                <th scope="col">Documents</th>
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
            ajax: '/ads/datatables/',
            columns: [
                {data: 'refno', name: 'refno'},
                {data: 'mmcode', name: 'mmcode'},
                {data: 'title', name: 'title'},
                {data: 'siteclick', name: 'siteclick'},
                {data: 'leads', name: 'leads'},
                {data: 'created', name: 'created'},
                {data: 'price', name: 'price'},
                {data: 'document', name: 'document'},
                {data: 'action', name: 'action', orderable: false, searchable: false},
            ]
        });
    });
    
    var oriVal;
    $(document).on('dblclick', '.price', function () {
        oriVal = $(this).text();
        $(this).text("");
        $("<input type='text' id='pricechange' value='"+oriVal+"'>").appendTo(this).focus();
    });
    $(document).on('focusout', '.price', function () {
        var $this = $(this);
        alert($this.parent().val());
        $this.parent().html("<span class='price'>"+oriVal+"</span>"); // Use current or original val.
        $this.remove();                      // Don't just hide, remove the element.
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