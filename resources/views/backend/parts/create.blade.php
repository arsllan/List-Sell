@extends('layouts.backendapp')
@section('content')
            <div class="l-main">
                <div class="content-wrapper">
                    <div class="container-fluid">
                        <div class="content-wrapper-content">
                            <div class="main_heading d-md-flex align-items-center">
                                <h5>Add New Parts</h5>
                                <a href="{{ route('autoparts') }}" class="ml-auto nav-link px-0">Back To Auto Parts</a>
                            </div>
                            <form action="{{ route('submit-addpart') }}" method="post" enctype='multipart/form-data'>
                            @csrf
                            <div class="card card-body mt-4">
                                @if(session()->has('success'))
                                    <div class="alert alert-success">
                                        {{ session()->get('success') }}
                                    </div>
                                @endif
                                    <div class="card v-label v-pills-content-tabs">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group m-t-20">
                                                <label><strong>Part Name</strong></label>
                                                <input type="text" class="form-control rounded-border2" required="" name="name" placeholder="">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group m-t-20">
                                                <label><strong>Price</strong></label>
                                                <input type="text" class="form-control rounded-border2" required="" name="price" placeholder="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group m-t-20">
                                                <label><strong>Brand</strong></label>
                                                <select class="form-control rounded-border2" id="brand" name="brand_id" required>
                                                    <option value="">-- Please Select --</option>
                                                    @foreach($brands as $brand)
                                                        <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group m-t-20">
                                                <label><strong>Model</strong></label>
                                                <select class="form-control rounded-border2" id="model" name="model_id" required>
                                                    <option value="">-- Please Select --</option>
                                    
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group m-t-20">
                                                <label><strong>Manufacture</strong></label>
                                                <input type="text" class="form-control rounded-border2"  name="manufacture" placeholder="">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group m-t-20">
                                                <label><strong>Description</strong></label>
                                                <input type="text" class="form-control rounded-border2"  name="desc" placeholder="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group m-t-20">
                                                <label><strong>Image</strong></label>
                                                <input type="file" class="form-control rounded-border2" required="" name="image" placeholder="">
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="w-100 text-right mt-3">
                                    <button type="submit" class="btn btn-next d-inline-flex">Save</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
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
                $('#model').html('<option value="">Select Model</option>'); 
                $.each(result.models,function(key,value){
                $("#model").append('<option value="'+value.id+'">'+value.name+'</option>');
                });
            }
        });
    });
});
</script>
@endsection