@extends('admin.layout.layout')
@section('title')
    <title>
        Edit Contact | Admin
    </title>
@endsection
@section('content')
    <div class="card card-custom">
        <div class="card-header">
            <h3 class="card-title">
                Edit Contact
            </h3>
        </div>
        <!--begin::Form-->
        <form id="form" action="" method="">
            @csrf
            @if ($errors->any())
				<div class="alert alert-danger" role="alert">
					@foreach ($errors->all() as $error)
						<div class="d-block kt-font-bolder">{{$error}}</div>
					@endforeach
				</div>
			@endif
            <div class="card-body">
                <div class="form-group row">
                    <label class="col-xl-3 col-lg-3 col-form-label">Email</label>
                    <div class="col-lg-9 col-xl-6">
                        <input class="form-control" name="email" disabled type="text" value="{{ $detail['email'] }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-xl-3 col-lg-3 col-form-label">User name</label>
                    <div class="col-lg-9 col-xl-6">
                        <input class="form-control" name="name" disabled type="text" value="{{ $detail['name'] }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-xl-3 col-lg-3 col-form-label">Phone</label>
                    <div class="col-lg-9 col-xl-6">
                        <input class="form-control" name="phone" disabled type="text" value="{{ $detail['phone'] }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-xl-3 col-lg-3 col-form-label">Date created</label>
                    <div class="col-lg-9 col-xl-6">
                        <input class="form-control" name="created_at" disabled type="text" value="{{ \Carbon\Carbon::parse($detail['created_at']) }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-3 col-form-label">Status</label>
                    <div class="col-9 col-form-label">
                        <div class="radio-inline">
                            <label class="radio">
                                <input type="radio" name="status" value="1" disabled {{ $detail['status'] == 1 ? 'checked' : ''}}/>
                                <span></span>Yes Feedback
                            </label>
                            <label class="radio">
                                <input type="radio" name="status" value="0" disabled {{ $detail['status'] == 0 ? 'checked' : ''}}/>
                                <span></span>No Feedback
                            </label>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-3 col-form-label">Title</label>
                    <div class="col-lg-9 col-xl-6">
                        <textarea class="form-control" name="title" rows="3">{{ $detail['title'] }}</textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-3 col-form-label">Content</label>
                    <div class="col-lg-9 col-xl-6">
                        <textarea class="form-control" name="content" rows="3">{{ $detail['content'] }}</textarea>
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

@section('js')

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

        @if(Session::has('error_message'))
            Swal.fire({
                position: "center",
                icon: "error",
                title: "Error! An error occurred. Please try again later !",
                showConfirmButton: false,
                timer: 1500,
            })
        @endif 
    </script>
@endsection