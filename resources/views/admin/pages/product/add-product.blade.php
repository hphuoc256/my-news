@extends('admin.layout.layout')
@section('title')
    <title>
        Add Product | Admin
    </title>
@endsection
@section('content')
    <div class="card card-custom">
        <div class="card-header">
            <h3 class="card-title">
                Add Product
            </h3>
        </div>
        <!--begin::Form-->
        <form id="form" action="{{ route('postAddProduct') }}" method="POST" enctype="multipart/form-data">
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
                        <input class="form-control" name="name" type="text" value="" placeholder="Enter name category">
                        @if($errors->has('name'))
                            <span class="form-text text-danger">{{$errors->first('name')}}</span>
                        @endif
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-xl-3 col-lg-3 col-form-label">Slug</label>
                    <div class="col-lg-9 col-xl-6">
                        <input class="form-control" name="slug" type="text" placeholder="Enter slug">
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
                                <option value="{{ $category['id'] }}">{{ $category['name'] }}</option>
                                @if ($category->child)
                                    @foreach($category->child as $child)
                                        <option value="{{ $child['id'] }}">--- {{ $child['name'] }}
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
                                <option value="{{ $service['id'] }}">{{ $service['name'] }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-xl-3 col-lg-3 col-form-label">Image</label>
                    <div class="col-lg-9 col-xl-6">
                        <input name="image" type="file">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-3 col-form-label">Status</label>
                    <div class="col-9 col-form-label">
                        <div class="radio-inline">
                            <label class="radio">
                                <input type="radio" checked="checked" name="status" value="1" />
                                <span></span>Show
                            </label>
                            <label class="radio">
                                <input type="radio" name="status" value="0" />
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
                                <input type="checkbox" name="hot" checked value="1" />
                                <span></span>
                            </label>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-3 col-form-label">Title<span class="text-danger">*</span></label>
                    <div class="col-lg-9 col-xl-6">
                        <textarea class="form-control" name="title" rows="3"></textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-xl-3 col-lg-3 col-form-label">Description<span class="text-danger">*</span></label>
                    <div class="col-lg-9 col-form-label">
                        <div class="card card-custom">
                            <textarea name="description" id="description" cols="30" rows="10"></textarea>
                        </div> 
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-xl-3 col-lg-3 col-form-label">Meta Keyword</label>
                    <div class="col-lg-9 col-xl-6">
                        <input class="form-control" name="meta_keyword" type="text" placeholder="Enter meta keyword">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-xl-3 col-lg-3 col-form-label">Meta Description</label>
                    <div class="col-lg-9 col-xl-6">
                        <input class="form-control" name="meta_description" type="text" placeholder="Enter meta description">
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn-add btn btn-primary mr-2">Create</button>
            </div>
        </form>
        <!--end::Formm-->
    </div>
@endsection

@section('js')
    <script>
        CKEDITOR.replace( 'description' );
    </script>
@endsection
