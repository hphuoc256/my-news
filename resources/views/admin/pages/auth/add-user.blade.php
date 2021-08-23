@extends('admin.layout.layout')
@section('title')
    <title>
        Add User | Admin
    </title>
@endsection
@section('content')
    <div class="card card-custom">
        <div class="card-header">
            <h3 class="card-title">
                Add User
            </h3>
        </div>
        @if ( Auth::user()->level == 2 )
            <!--begin::Form-->
            <form id="form" action="{{ route('postAddUser') }}" method="POST" enctype="multipart/form-data">
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
                        <label class="col-xl-3 col-lg-3 col-form-label">Email<span class="text-danger">*</span></label>
                        <div class="col-lg-9 col-xl-6">
                            <input class="form-control" name="email" type="text" value="{{ old('email') }}" placeholder="Enter email">
                            @if($errors->has('email'))
                                <span class="form-text text-danger">{{$errors->first('email')}}</span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-xl-3 col-lg-3 col-form-label">Password<span class="text-danger">*</span></label>
                        <div class="col-lg-9 col-xl-6">
                            <input class="form-control" name="password" type="password" value="{{ old('password') }}" placeholder="Enter password">
                            @if($errors->has('password'))
                                <span class="form-text text-danger">{{$errors->first('password')}}</span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-xl-3 col-lg-3 col-form-label">Confirm Password<span class="text-danger">*</span></label>
                        <div class="col-lg-9 col-xl-6">
                            <input class="form-control" name="re_password" type="password" value="{{ old('re_password') }}" placeholder="Confirm password">
                            @if($errors->has('re_password'))
                                <span class="form-text text-danger">{{$errors->first('re_password')}}</span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-xl-3 col-lg-3 col-form-label">Role</label>
                        <div class="col-lg-9 col-xl-6">
                            <select class="form-control" id="exampleSelectd" name="level">
                                <option value="1">Admin</option>
                                <option value="0">User</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn-add btn btn-primary mr-2">Create</button>
                </div>
            </form>
            <!--end::Formm-->
        @else
            <div class="card-body">
                <div class="form-group mb-8">
                    <div class="alert alert-custom alert-default" role="alert">
                        <div class="alert-icon"><i class="flaticon-warning text-primary"></i></div>
                            <div class="alert-text">
                                Sorry. You do not have permission to use this feature !!!
                            </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
@endsection

@section('js')
    <script>
        
    </script>
@endsection
