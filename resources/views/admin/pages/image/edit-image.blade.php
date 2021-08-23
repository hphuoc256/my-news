@extends('admin.layout.layout')
@section('title')
    <title>
        Edit Image | Admin
    </title>
@endsection
@section('content')
    <div class="card card-custom">
        <div class="card-header">
            <h3 class="card-title">
                Edit Image
            </h3>
        </div>
        <!--begin::Form-->
        <form id="form" action="{{ route('postDetailImage', ['id' => $detail['id']]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @if ($errors->any())
				<div class="alert alert-danger" role="alert">
					@foreach ($errors->all() as $error)
						<div class="d-block kt-font-bolder">{{$error}}</div>
					@endforeach
				</div>
			@endif
            <div class="card-body">
                <div class="form-group mb-8">
                    <div class="alert alert-custom alert-default" role="alert">
                        <div class="alert-icon"><i class="flaticon-warning text-primary"></i></div>
                            <div class="alert-text">
                                Enter information !!!
                            </div>
                    </div>
                </div>  
                <div class="form-group row">
                    <label class="col-xl-3 col-lg-3 col-form-label">Name<span class="text-danger">*</span></label>
                    <div class="col-lg-9 col-xl-6">
                        <input class="form-control" name="name" type="text" value="{{ $detail['name'] }}" placeholder="Enter name category">
                        @if($errors->has('name'))
                            <span class="form-text text-danger">{{$errors->first('name')}}</span>
                        @endif
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-xl-3 col-lg-3 col-form-label">Image</label>
                    <div class="col-lg-9 col-xl-6">
                        <input name="image" type="file">
                        @if ($detail['url'])
                            <div class="mt-2">
                                <img style="width:100%; height:300px;" src="{{ $detail['url'] }}"/>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn-add btn btn-primary mr-2">Update</button>
            </div>
        </form>
        <!--end::Formm-->
    </div>
@endsection

<script>
    @if(Session::has('message'))
        Swal.fire({
            position: "center",
            icon: "success",
            title: "Successfully !",
            showConfirmButton: false,
            timer: 1500,
        })
    @endif
</script>
