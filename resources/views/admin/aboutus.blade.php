@extends('admin.layouts.app')
@section('custom_head')
<!-- <link rel="stylesheet" href="{{ asset('backend/plugins/summernote/summernote-bs4.min.css') }}"> -->
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
            <form name="page" id="page-form" action="{{ route('store.aboutus') }}" method="POST">
                <input name="_token" type="hidden" value="{{ csrf_token() }}"/>
                <input name="type" type="hidden" value="{{ $type }}"/>
                <input name="post_id" type="hidden" value="{{ $activeId }}"/>
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
                                        <input type="text" class="form-control" name="meta[about_us_title]" id="about_us_title" placeholder="Top Title" value="{{ old('meta.about_us_title',@$meta['about_us_title']) }}">
                                        @if ($errors->has('meta.about_us_title'))
                                            <span class="is-invalid">{{ $errors->first('meta.about_us_title') }}</span>
                                        @endif
                                    </div>

                                    <div class="form-group">
                                        <label for="title">Sub Title</label>
                                        <textarea class="form-control textarea" name="meta[sub_title]" id="sub_title">{{ old('meta.sub_title',@$meta['sub_title']) }}</textarea>
                                        @if ($errors->has('meta.sub_title'))
                                            <span class="is-invalid">{{ $errors->first('meta.sub_title') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <!-- Meta Info -->
                            <div class="card card-info">
                                <div class="card-header">
                                    <h3 class="card-title">Media Manage</h3>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-12" style="padding: 10px 0;">
                                            <label for="title">Image</label>
                                            <input type="text" class="form-control" name="meta[image]" placeholder="Image" value="{{ old('meta.box1',@$meta['image']) }}">
                                        </div>

                                        <div class="col-12" style="padding: 10px 0;">
                                            <label for="title">Video link</label>
                                            <input type="text" class="form-control" name="meta[video_link]" placeholder="Video Link" value="{{ old('meta.box4',@$meta['video_link']) }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br/>                    
                    <div class="col-md-4">
                    <br/>
                        <div class="card card-info">
                            <div class="card-header">
                            <h3 class="card-title">Published</h3>
                                <div class="card-tools">
                                <a href="{{URL('admin/sections/list')}}" class="btn btn-danger btn-sm"><i class="fa fa-arrow-left"></i> &nbsp; Back to list</a>
                                </div>
                            </div>
                            <div class="card-body">
                                <button type="submit" class="btn btn-primary btn-sm float-left"><i class="fa fa-save"></i> &nbsp; Publish </button>
                            </div>
                        </div>
                        <div class="card card-info">
                            <div class="card-header">
                                <h3 class="card-title">Preview Image</h3>
                                <span id="featured_sppiner"></span>
                            </div>
                            <div class="card-body">
                                <div class="box-body box-profile" id="featuredimage-box">
                                    <div class="feauret-img-show" id="feauret-img" ></div>
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

<!-- <script src="{{ asset('backend/plugins/summernote/summernote-bs4.min.js') }}"></script>
<script>
  $(function () {
    $('.textarea').summernote({
      height: 250,   //set editable area's height
    });
  })
</script> -->

@endsection