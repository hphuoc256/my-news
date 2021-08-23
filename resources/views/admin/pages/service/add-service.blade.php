@extends('admin.layout.layout')
@section('title')
    <title>
        Add Service | Admin
    </title>
@endsection
@section('content')
    <div class="card card-custom">
        <div class="card-header">
            <h3 class="card-title">
                Add Service
            </h3>
        </div>
        <!--begin::Form-->
        <form id="form" action="{{ route('postAddService') }}" method="POST" enctype="multipart/form-data">
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
                        <input class="form-control" name="name" type="text" value="{{ old('name') }}" placeholder="Enter name category">
                        @if($errors->has('name'))
                            <span class="form-text text-danger">{{$errors->first('name')}}</span>
                        @endif
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-xl-3 col-lg-3 col-form-label">Slug</label>
                    <div class="col-lg-9 col-xl-6">
                        <input class="form-control" name="slug" type="text" value="{{ old('slug') }}" placeholder="Enter slug">
                        @if($errors->has('slug'))
                            <span class="form-text text-danger">{{$errors->first('slug')}}</span>
                        @endif
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-xl-3 col-lg-3 col-form-label">Service</label>
                    <div class="col-lg-9 col-xl-6">
                        <select class="form-control" id="exampleSelectd" name="parent_id">
                            <option value="0">Main service</option>
                            @foreach($services as $service)
                                <option value="{{ $service['id'] }}">{{ $service['name'] }}</option>
                                @if ($service->children)
                                    @foreach($service->children as $children)
                                        <option value="{{ $children['id'] }}">--- {{ $children['name'] }}
                                        </option>
                                    @endforeach
                                @endif
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-xl-3 col-lg-3 col-form-label">Price</label>
                    <div class="col-lg-9 col-xl-6">
                        <input class="form-control" name="price" type="number" value="{{ old('price') }}" placeholder="Enter price">
                        @if($errors->has('price'))
                            <span class="form-text text-danger">{{$errors->first('price')}}</span>
                        @endif
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-xl-3 col-lg-3 col-form-label">Sell</label>
                    <div class="col-lg-9 col-xl-6">
                        <input class="form-control" name="sell" type="number" value="{{ old('sell') }}" placeholder="Enter sell">
                        @if($errors->has('sell'))
                            <span class="form-text text-danger">{{$errors->first('sell')}}</span>
                        @endif
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-xl-3 col-lg-3 col-form-label">Image</label>
                    <div class="col-lg-9 col-xl-6">
                        <input name="image" type="file" value="{{ old('image') }}">
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
                    <label class="col-xl-3 col-lg-3 col-form-label">Title<span class="text-danger">*</span></label>
                    <div class="col-lg-9 col-form-label">
                        <div class="card card-custom">
                            <textarea name="title" id="title" cols="30" rows="10"></textarea>
                        </div> 
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
                        <input class="form-control" name="meta_keyword" type="text" value="{{ old('meta_keyword') }}" placeholder="Enter meta keyword">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-xl-3 col-lg-3 col-form-label">Meta Description</label>
                    <div class="col-lg-9 col-xl-6">
                        <input class="form-control" name="meta_description" type="text" value="{{ old('meta_description') }}" placeholder="Enter meta description">
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
        CKEDITOR.replace( 'title' );
    </script>
@endsection
