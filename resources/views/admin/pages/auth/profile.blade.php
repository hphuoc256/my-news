@extends('admin.layout.layout')
@section('title')
    <title>
        Profile | Admin
    </title>
@endsection
@section('content')
    <div class="card card-custom">
        <div class="card-header">
            <h3 class="card-title">
                Profile
            </h3>
        </div>
        <!--begin::Form-->
        <form id="form" action="{{ route('updateProfile') }}" method="post">
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
                    <label class="col-xl-3 col-lg-3 col-form-label">Email</label>
                    <div class="col-lg-9 col-xl-6">
                        <input class="form-control" name="email" disabled type="text" value="{{ Auth::user()->email }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-xl-3 col-lg-3 col-form-label">User name</label>
                    <div class="col-lg-9 col-xl-6">
                        <input class="form-control" name="username" type="text" value="{{ Auth::user()->username }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-xl-3 col-lg-3 col-form-label">Phone</label>
                    <div class="col-lg-9 col-xl-6">
                        <input class="form-control" name="phone" type="text" value="{{ Auth::user()->phone }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-xl-3 col-lg-3 col-form-label">Birthday</label>
                    <div class="col-lg-9 col-xl-6">
                        <input class="form-control" name="birthday" type="date" value="{{ Auth::user()->birthday }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-xl-3 col-lg-3 col-form-label">Address</label>
                    <div class="col-lg-9 col-xl-6">
                        <input class="form-control" name="address" type="text" value="{{ Auth::user()->address }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-xl-3 col-lg-3 col-form-label">Gender</label>
                    <div class="col-lg-9 col-xl-6">
                        <div class="radio-inline">
                            <label class="radio">
                                <input type="radio" name="gender" value="1" {{ Auth::user()->gender  == 1 ? 'checked' : ''}}/>
                                <span></span>Male
                            </label>
                            <label class="radio">
                                <input type="radio" name="gender" value="0" {{ Auth::user()->gender == 0 ? 'checked' : ''}}/>
                                <span></span>Female
                            </label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn-add btn btn-primary mr-2">Update</button>
                <a href="{{ route('changePassword') }}" class="btn-add btn btn-primary mr-2">Change Password</a>
            </div>
        </form>
        <!--end::Formm-->
    </div>
@endsection

@section('js')
    
@endsection