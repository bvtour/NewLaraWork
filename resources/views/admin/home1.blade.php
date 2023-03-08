@extends('admin.layouts.app')
@section('custom_head')
<link rel="stylesheet" href="{{ asset('backend/plugins/summernote/summernote-bs4.min.css') }}">
@endsection
@section('content')
    <!-- <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Dashboard</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ url('admin') }}">Pincode</a></li>
                    <li class="breadcrumb-item active">Create Pincode</li>
                    </ol>
                </div>
            </div>
        </div>
    </div> -->
    <br/>
    <!-- /.content-header -->
     <!-- Main content -->
   <section class="content">
        <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
            <form name="page" id="page-form" action="#" method="POST">
                <input name="_token" type="hidden" value="{{ csrf_token() }}"/>
                <div class="row">
                    <div class="col-md-8">
                        <div class="card-body">
                            <div class="card card-info">
                                <div class="card-header">
                                    <h3 class="card-title">General</h3>
                                </div>
                                <div class="card-body">
                                    <!-- Title -->
                                    <div class="form-group">
                                        <label for="title">Title</label>
                                        <input type="text" class="form-control" name="title" id="title" placeholder="Title" value="{{ old('title') }}">
                                        @if ($errors->has('title'))
                                            <span class="is-invalid">{{ $errors->first('title') }}</span>
                                        @endif
                                    </div>
                                    
                                    <!-- Slug -->
                                    <div class="form-group">
                                        <label for="title">Slug</label>
                                        <input type="text" class="form-control" name="slugss" readonly id="slug" placeholder="slug" value="{{ old('slug') }}">
                                        @if ($errors->has('slug'))
                                            <span class="is-invalid">{{ $errors->first('slug') }}</span>
                                        @endif
                                    </div>
                                                        
                                    <!-- Tag -->
                                    <div class="form-group">
                                        <label for="title">Tag</label>
                                        <input type="text" class="form-control" name="tag" id="tag" placeholder="tag" value="{{ old('tag') }}">
                                        @if ($errors->has('tag'))
                                            <span class="is-invalid">{{ $errors->first('tag') }}</span>
                                        @endif
                                    </div>
                                                                            
                                    <!-- Circle Name -->
                                    <div class="form-group">
                                    <label for="title">Circle Name</label>
                                    <input type="text" class="form-control" name="circle_name"  id="circle_name" placeholder="circle_name" value="{{ old('circle_name') }}">
                                    @if ($errors->has('circle_name'))
                                        <span class="is-invalid">{{ $errors->first('circle_name') }}</span>
                                    @endif
                                    </div>

                                    <!-- Region Name -->
                                    <div class="form-group">
                                    <label for="title">Region Name</label>
                                    <input type="text" class="form-control" name="region_name" id="region_name" placeholder="region_name" value="{{ old('region_name') }}">
                                    @if ($errors->has('region_name'))
                                        <span class="is-invalid">{{ $errors->first('region_name') }}</span>
                                    @endif
                                    </div>

                                    <!-- Division Name -->
                                    <div class="form-group">
                                    <label for="title">Division Name</label>
                                    <input type="text" class="form-control" name="division_name" id="division_name" placeholder="Division Name" value="{{ old('division_name') }}">
                                    @if ($errors->has('division_name'))
                                        <span class="is-invalid">{{ $errors->first('division_name') }}</span>
                                    @endif
                                    </div>

                                    <!-- Office Name -->
                                    <div class="form-group">
                                    <label for="title">Office Name</label>
                                    <input type="text" class="form-control" name="office_name" id="office_name" placeholder="Office Name" value="{{ old('office_name') }}">
                                    @if ($errors->has('office_name'))
                                        <span class="is-invalid">{{ $errors->first('office_name') }}</span>
                                    @endif
                                    </div>
                                    
                                    <!-- pincode -->
                                    <div class="form-group">
                                    <label for="title">Pincode</label>
                                    <input type="text" class="form-control" name="pincodes" id="pincode" placeholder="Pincode" value="{{ old('pincodes') }}">
                                    @if ($errors->has('pincodes'))
                                        <span class="is-invalid">{{ $errors->first('pincodes') }}</span>
                                    @endif
                                    </div>

                                    <!-- Office Type -->
                                    <div class="form-group">
                                    <label for="title">Office Type</label>
                                    <input type="text" class="form-control" name="office_type" id="office_type" placeholder="Odffice Type" value="{{ old('office_type') }}">
                                    @if ($errors->has('office_type'))
                                        <span class="is-invalid">{{ $errors->first('office_type') }}</span>
                                    @endif
                                    </div>
                                    
                                    <!-- Delivery -->
                                    <div class="form-group">
                                    <label for="title">Delivery</label>
                                    <input type="text" class="form-control" name="delivery" id="delivery" placeholder="delivery" value="{{ old('delivery') }}">
                                    @if ($errors->has('delivery'))
                                        <span class="is-invalid">{{ $errors->first('delivery') }}</span>
                                    @endif
                                    </div>
                                    
                                    <!-- District -->
                                    <div class="form-group">
                                    <label for="title">District</label>
                                    <input type="text" class="form-control" name="district" id="district" placeholder="district" value="{{ old('district') }}">
                                    @if ($errors->has('district'))
                                        <span class="is-invalid">{{ $errors->first('district') }}</span>
                                    @endif
                                    </div>
                                    
                                    <!-- State Name -->
                                    <div class="form-group">
                                    <label for="title">State Name</label>
                                    <input type="text" class="form-control" name="state_name" id="state_name" placeholder="State Name" value="{{ old('state_name') }}">
                                    @if ($errors->has('state_name'))
                                        <span class="is-invalid">{{ $errors->first('state_name') }}</span>
                                    @endif
                                    </div>

                                    <!-- Services -->
                                    <div class="form-group">
                                    <label for="title">Services</label>
                                    <textarea class="form-control textarea" name="services" id="services">{{ old('services') }}</textarea>
                                    </div>
                                    
                                    <!-- Location -->
                                    <div class="form-group">
                                    <label for="title">Location</label>
                                    <input type="text" class="form-control" name="location" id="location" placeholder="location" value="{{ old('location') }}">
                                    @if ($errors->has('location'))
                                        <span class="is-invalid">{{ $errors->first('location') }}</span>
                                    @endif
                                    </div>
                                    
                                    <!-- Telephone -->
                                    <div class="form-group">
                                    <label for="title">Telephone</label>
                                    <input type="text" class="form-control" name="telephone" id="telephone" placeholder="telephone" value="{{ old('telephone') }}">
                                    @if ($errors->has('telephone'))
                                        <span class="is-invalid">{{ $errors->first('telephone') }}</span>
                                    @endif
                                    </div>

                                    <!-- Departmental Information -->
                                    <div class="form-group">
                                    <label for="title">Departmental Information</label>
                                    <textarea class="form-control textarea" name="departmental_information" id="Departmental Information">{{ old('departmental_information') }}</textarea>
                                    </div>

                                    <!-- Description -->
                                    <div class="form-group">
                                    <label for="description">Description</label>
                                    <textarea class="form-control textarea" name="description" id="description">{{ old('description') }}</textarea>
                                    </div>
                                </div>
                            </div>

                            <!-- Meta Info -->
                            <div class="card card-info">
                                <div class="card-header">
                                    <h3 class="card-title">Meta Information</h3>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                    <div class="col-12" style="padding: 10px 0;">
                                        <input type="text" class="form-control" name="meta_title" placeholder="Meta Title" value="{{ old('meta_title') }}">
                                    </div>
                                    <div class="col-12" style="padding: 10px 0;">
                                        <input type="text" class="form-control" name="meta_description" placeholder="Meta Description" value="{{ old('meta_description') }}">
                                    </div>
                                    <div class="col-12" style="padding: 10px 0;">
                                        <input type="text" class="form-control" name="meta_keyword" placeholder="Meta Keyword" value="{{ old('meta_keyword') }}">
                                    </div><br/>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br/>
                        <div class="col-md-4">
                            <div class="card card-info">
                                <div class="card-header">
                                <h3 class="card-title">Published</h3>
                                    <div class="card-tools">
                                    <a href="{{URL('admin/pincodes')}}" class="btn btn-danger btn-sm"><i class="fa fa-arrow-left"></i> &nbsp; Back to list</a>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <button type="submit" class="btn btn-primary btn-sm float-left"><i class="fa fa-save"></i> &nbsp; Publish </button>
                                </div>
                            </div>
                            <div class="card card-info">
                                <div class="card-header">
                                    <h3 class="card-title">pincode Image</h3>
                                    <span id="featured_sppiner"></span>
                                </div>
                                <div class="card-body">
                                    <div class="box-body box-profile" id="featuredimage-box">
                                        <div class="feauret-img-show" id="feauret-img" ></div>
                                        <input type="text" id="featured_image" name="pincode[featured_image]" class="hide" value="">
                                        <span class="featured-image-btn" onclick="openFeatureImage(this, 'pincode', 'feauret-img-show')" id="set-featured-img">Set Image</span>
                                        <span class="featured-image-btn hide" onclick="removeFeatureImage(this, 'featured_image', 'feauret-img-show')"  id="remove-set-featured-img">Remove Image</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div><!-- /.container-fluid -->
</section>

@endsection
@section('custom_js')
<script src="{{ asset('backend/plugins/summernote/summernote-bs4.min.js') }}"></script>
<script>
  $(function () {
    $('.textarea').summernote({
      height: 250,   //set editable area's height
    });
  })
</script>
@endsection