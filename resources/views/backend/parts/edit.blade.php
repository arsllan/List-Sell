@extends('layouts.backendapp')
@section('content')
            <div class="l-main">
                <div class="content-wrapper">
                    <div class="container-fluid">
                        <div class="content-wrapper-content">
                            <div class="main_heading d-md-flex align-items-center">
                                <h5>Update Parts</h5>
                                <a href="{{ route('autoparts') }}" class="ml-auto nav-link px-0">Back To Auto Parts</a>
                            </div>
                            <form action="{{ route('submit-updatepart', $part->id) }}" method="post" enctype='multipart/form-data'>
                            @csrf
                            <div class="card card-body mt-4">
                                @if(session()->has('success'))
                                    <div class="alert alert-success">
                                        {{ session()->get('success') }}
                                    </div>
                                @endif
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group m-t-20">
                                                <label><strong>Part Name</strong></label>
                                                <input type="text" class="form-control rounded-border2" required="" name="name" value="{{ $part->name }}">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group m-t-20">
                                                <label><strong>Price</strong></label>
                                                <input type="text" class="form-control rounded-border2" required="" name="price" value="{{ $part->price }}">
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
                                                        <option value="{{ $brand->id }}" @if($brand->id == $part->brand_id) selected @endif>{{ $brand->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group m-t-20">
                                                <label><strong>Model</strong></label>
                                                <select class="form-control rounded-border2" id="model" name="model_id" required>
                                                    <option value="">-- Please Select --</option>
                                                    @if($models)
                                                    <option value="{{ $models->id }}" selected>{{ $models->name }}</option>
                                                    @endif
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="form-group m-t-20">
                                                <label><strong>Description</strong></label>
                                                <input type="text" class="form-control rounded-border2" name="desc" value="{{ $part->description }}" >
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group m-t-20">
                                                <label><strong>Old Image</strong></label>
                                                <img src="{{ asset('public/uploads/parts/'.$part->image) }}" width="200px" />
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group m-t-20">
                                                <label><strong>Image</strong></label>
                                                <input type="file" class="form-control rounded-border2" name="image" placeholder="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="w-100 text-right mt-3">
                                    <button type="submit" class="btn btn-next d-inline-flex">Update</button>
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