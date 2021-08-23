@extends('admin.layout.layout')
@section('title')
    <title>
        Edit User | Admin
    </title>
@endsection
@section('content')
    <div class="card card-custom">
        <div class="card-header">
            <h3 class="card-title">
                Edit User
            </h3>
        </div>
        @if ( Auth::user()->level == 2)
            <!--begin::Form-->
            <form id="form" action="{{ route('postDetailUser', ['id' => $detail['id']]) }}" method="POST" enctype="multipart/form-data">
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
                        <label class="col-xl-3 col-lg-3 col-form-label">Role</label>
                        <div class="ol-lg-9 col-xl-6 col-form-label">
                            <div class="radio-inline">
                                @if ($detail['level'] == 2)
                                    <label class="radio">
                                        <input type="radio" name="level" disabled value="1" {{ $detail['level'] == 2 ? 'checked' : ''}}/>
                                        <span></span>Super Admin
                                    </label>
                                @else
                                    <label class="radio">
                                        <input type="radio" name="level" value="1" {{ $detail['level'] == 1 ? 'checked' : ''}}/>
                                        <span></span>Admin
                                    </label>
                                    <label class="radio">
                                        <input type="radio" name="level" value="0" {{ $detail['level'] == 0 ? 'checked' : ''}}/>
                                        <span></span>User
                                    </label>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-xl-3 col-lg-3 col-form-label">Status</label>
                        <div class="ol-lg-9 col-xl-6 col-form-label">
                            <div class="radio-inline">
                                @if ($detail['level'] == 2)
                                    <label class="radio">
                                        <input type="radio" name="status" disabled value="1" {{ $detail['status'] == 1 ? 'checked' : ''}}/>
                                        <span></span>Active
                                    </label>
                                @else
                                    <label class="radio">
                                        <input type="radio" name="status" value="1" {{ $detail['status'] == 1 ? 'checked' : ''}}/>
                                        <span></span>Active
                                    </label>
                                    <label class="radio">
                                        <input type="radio" name="status" value="0" {{ $detail['status'] == 0 ? 'checked' : ''}}/>
                                        <span></span>Block
                                    </label>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        @if ($detail['level'] == 2)
                            <label class="col-xl-3 col-lg-3 col-form-label">Change Password</label>
                            <div class="col-lg-9 col-xl-6 mt-3">
                                <span></span>Can not change password this account!
                            </div>
                        @else
                            <label class="col-xl-3 col-lg-3 col-form-label">Change Password</label>
                            <div class="col-lg-9 col-xl-6">
                                <input class="form-control" name="password" type="text" placeholder="Enter new password">
                            </div>
                        @endif
                    </div>
                </div>
                @if ($detail['level'] != 2)
                    <div class="card-footer">
                        <button type="submit" class="btn-add btn btn-primary mr-2">Update</button>
                    </div>
                @endif
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