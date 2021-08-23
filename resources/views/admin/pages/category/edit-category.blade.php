@extends('admin.layout.layout')
@section('title')
    <title>
        Edit Category | Admin
    </title>
@endsection
@section('content')
    <div class="card card-custom">
        <div class="card-header">
            <h3 class="card-title">
                Edit Category
            </h3>
        </div>
        <!--begin::Form-->
        <form id="form" action="{{ route('postDetailCategory', ['id' => $detail['id']]) }}" method="POST" enctype="multipart/form-data">
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
                    <label class="col-xl-3 col-lg-3 col-form-label">Name category<span class="text-danger">*</span></label>
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
                        <input name="image" type="file" value="{{ $detail['image'] }}" accept=".jpg, .jpeg, .png">
                        @if ($detail['image'])
                            <div class="mt-2">
                                <img style="width:100%; height:300px;" src="{{ $detail['image'] }}"/>
                            </div>
                        @endif
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-xl-3 col-lg-3 col-form-label">Slug<span class="text-danger">*</span></label>
                    <div class="col-lg-9 col-xl-6">
                        <input class="form-control" name="slug" type="text" value="{{ $detail['slug'] }}" placeholder="Enter slug">
                        @if($errors->has('slug'))
                            <span class="form-text text-danger">{{$errors->first('slug')}}</span>
                        @endif
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-xl-3 col-lg-3 col-form-label">Link</label>
                    <div class="col-lg-9 col-xl-6">
                        <input class="form-control" name="link" value="{{ $detail['link'] }}" type="text" placeholder="Enter link">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-xl-3 col-lg-3 col-form-label">Parent Category</label>
                    <div class="col-lg-9 col-xl-6">
                        <select class="form-control" id="exampleSelectd" name="parent_id">
                            <option value="0">Main Parent Category</option>
                            @foreach($parent_id as $category)
                                <option value="{{ $category['id'] }}" @if($detail['parent_id'] == $category['id']){{ "selected" }} @endif >
                                    {{ $category['name'] }}
                                </option>
                                @if ($category->child)
                                    @foreach($category->child as $child)
                                        <option @if($detail['parent_id'] == $child['id']){{ "selected" }} @endif 
                                            value="{{ $child['id'] }}">--- {{ $child['name'] }}
                                        </option>
                                    @endforeach
                                @endif
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-3 col-form-label">Status</label>
                    <div class="col-9 col-form-label">
                        <div class="radio-inline">
                            <label class="radio">
                                <input type="radio" name="status" value="1" {{ $detail['status'] == 1 ? 'checked' : ''}}/>
                                <span></span>Show
                            </label>
                            <label class="radio">
                                <input type="radio" name="status" value="0" {{ $detail['status'] == 0 ? 'checked' : ''}}/>
                                <span></span>Hidden
                            </label>
                        </div>
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
</script>
@endsection