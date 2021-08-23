@extends('admin.layout.layout')
@section('title')
    <title>
        Edit Product | Admin
    </title>
@endsection
@section('content')
    <div class="card card-custom">
        <div class="card-header">
            <h3 class="card-title">
                Edit Product
            </h3>
        </div>
        <!--begin::Form-->
        <form id="form" action="{{ route('postDetailProduct', ['id' => $detail['id']]) }}" method="POST" enctype="multipart/form-data">
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
                    <label class="col-xl-3 col-lg-3 col-form-label">Name product<span class="text-danger">*</span></label>
                    <div class="col-lg-9 col-xl-6">
                        <input class="form-control" name="name" type="text" value="{{ $detail['name'] }}" placeholder="Enter name category">
                        @if($errors->has('name'))
                            <span class="form-text text-danger">{{$errors->first('name')}}</span>
                        @endif
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-xl-3 col-lg-3 col-form-label">Slug</label>
                    <div class="col-lg-9 col-xl-6">
                        <input class="form-control" name="slug" type="text" value="{{ $detail['slug'] }}" placeholder="Enter slug">
                        @if($errors->has('slug'))
                            <span class="form-text text-danger">{{$errors->first('slug')}}</span>
                        @endif
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-xl-3 col-lg-3 col-form-label">Category</label>
                    <div class="col-lg-9 col-xl-6">
                        <select class="form-control" id="exampleSelectd" name="category_id">
                            <option value="">No category</option>
                            @foreach($categories as $category)
                                <option value="{{ $category['id'] }}" @if($category['id'] == $detail['category_id']){{ "selected" }} @endif>
                                    {{ $category['name'] }}
                                </option>
                                @if ($category->child)
                                    @foreach($category->child as $child)
                                        <option value="{{ $child['id'] }}"  @if($child['id'] == $detail['category_id']){{ "selected" }} @endif>
                                            --- {{ $child['name'] }}
                                        </option>
                                    @endforeach
                                @endif
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-xl-3 col-lg-3 col-form-label">Service</label>
                    <div class="col-lg-9 col-xl-6">
                        <select class="form-control" id="exampleSelectd" name="service_id">
                            <option value="">No service</option>
                            @foreach($services as $service)
                                <option value="{{ $service['id'] }}" @if($service['id'] == $detail['service_id']){{ "selected" }} @endif>
                                    {{ $service['name'] }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-xl-3 col-lg-3 col-form-label">Image</label>
                    <div class="col-lg-9 col-xl-6">
                        <input name="image" type="file" accept=".jpg, .jpeg, .png">
                        @if ($detail['image'])
                            <div class="mt-2">
                                <img style="width:100%; height:300px;" src="{{ $detail['image'] }}"/>
                            </div>
                        @endif
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
                <div class="form-group row">
                    <label class="col-3 col-form-label">Hot</label>
                    <div class="col-9 col-form-label">
                        <div class="radio-inline">
                            <label class="checkbox">
                                <input type="checkbox" name="hot" value="1" {{ $detail['hot'] == 1 ? 'checked' : ''}}/>
                                <span></span>
                            </label>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-3 col-form-label">Title<span class="text-danger">*</span></label>
                    <div class="col-lg-9 col-xl-6">
                        <textarea class="form-control" name="title" rows="3">{{ $detail['title'] }}</textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-xl-3 col-lg-3 col-form-label">Description<span class="text-danger">*</span></label>
                    <div class="col-lg-9 col-form-label">
                        <div class="card card-custom">
                            <textarea name="description" id="description" cols="30" rows="10">{{ $detail['description'] }}</textarea>
                        </div> 
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-xl-3 col-lg-3 col-form-label">Meta Keyword</label>
                    <div class="col-lg-9 col-xl-6">
                        <input class="form-control" name="meta_keyword" type="text" value="{{ $detail['meta_keyword'] }}" placeholder="Enter meta keyword">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-xl-3 col-lg-3 col-form-label">Meta Description</label>
                    <div class="col-lg-9 col-xl-6">
                        <input class="form-control" name="meta_description" type="text" value="{{ $detail['meta_description'] }}" placeholder="Enter meta description">
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
    CKEDITOR.replace( 'description' );
</script>
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