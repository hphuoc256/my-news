@extends('admin.layout.layout')
@section('title')
    <title>
        Change Password | Admin
    </title>
@endsection
@section('content')
    <div class="card card-custom">
        <div class="card-header">
            <h3 class="card-title">
                Change Password
            </h3>
        </div>
        <!--begin::Form-->
        <form id="form" action="{{ route('postChangePassword') }}" method="post">
            @csrf
            @if ($errors->any())
				<div class="alert alert-danger" role="alert">
					@foreach ($errors->all() as $error)
						<div class="d-block kt-font-bolder">{{$error}}</div>
					@endforeach
				</div>
			@endif
            @if(session()->has('message'))
                <p class="alert alert-class alert-success alert-bold rounded-0 kt-font-bolder">{{ session()->get('message') }}</p>
            @endif
            <div class="card-body">
                <div class="form-group row">
                    <label class="col-xl-3 col-lg-3 col-form-label">Old Password</label>
                    <div class="col-lg-9 col-xl-6">
                        <input class="form-control" name="old_password" type="password" placeholder="Enter old password">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-xl-3 col-lg-3 col-form-label">New Password</label>
                    <div class="col-lg-9 col-xl-6">
                        <input class="form-control" name="password" type="password" placeholder="Enter new password">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-xl-3 col-lg-3 col-form-label">Confirm Password</label>
                    <div class="col-lg-9 col-xl-6">
                        <input class="form-control" name="re_password" type="password" placeholder="Confirm password">
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
    
@endsection