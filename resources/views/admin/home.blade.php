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
            <form name="page" id="page-form" action="{{ route('store.home') }}" method="POST">
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
                                        <label for="title">Banner top title</label>
                                        <input type="text" class="form-control" name="meta[banner_top_title]" id="banner_top_title" placeholder="Banner Main Title" value="{{ old('meta.banner_top_title',@$meta['banner_top_title']) }}">
                                        @if ($errors->has('meta.banner_top_title'))
                                            <span class="is-invalid">{{ $errors->first('meta.banner_top_title') }}</span>
                                        @endif
                                    </div>

                                    <div class="form-group">
                                        <label for="title">Banner sub text</label>
                                        <input type="text" class="form-control" name="meta[banner_sub_text]" id="banner_sub_text" placeholder="Banner Main Title" value="{{ old('meta.banner_sub_text',@$meta['banner_sub_text']) }}">
                                        @if ($errors->has('meta.banner_sub_text'))
                                            <span class="is-invalid">{{ $errors->first('meta.banner_sub_text') }}</span>
                                        @endif
                                    </div>

                                    <!-- Description -->
                                    <div class="form-group">
                                        <label for="description">Banner description</label>
                                        <textarea class="form-control textarea" name="meta[banner_description]" id="banner_description">{{ old('meta.banner_description',@$meta['banner_description']) }}</textarea>
                                    </div>

                                    <div class="form-group">
                                        <label for="title">Google play link</label>
                                        <input type="link" class="form-control" name="meta["google_play_link": ]" id=""google_play_link": " placeholder="Google Play Link" value="{{ old('meta.banner_main_title',@$meta['banner_main_title']) }}">
                                        @if ($errors->has('meta."google_play_link": '))
                                            <span class="is-invalid">{{ $errors->first('meta."google_play_link": ') }}</span>
                                        @endif
                                    </div>

                                    <div class="form-group">
                                        <label for="title">App Store link</label>
                                        <input type="link" class="form-control" name="meta[app_store_link]" id="app_store_link" placeholder="App Store Link" value="{{ old('meta.app_store_link',@$meta['app_store_link']) }}">
                                        @if ($errors->has('meta.app_store_link'))
                                            <span class="is-invalid">{{ $errors->first('meta.app_store_link') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <!-- Meta Info -->
                            <div class="card card-info">
                                <div class="card-header">
                                    <h3 class="card-title">Banner Bottom Information</h3>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-12" style="padding: 10px 0;">
                                            <label for="title">Box 1</label>
                                            <input type="text" class="form-control" name="meta[box1]" placeholder="Box 1" value="{{ old('meta.box1',@$meta['box1']) }}">
                                            <br/>
                                            <input type="text" class="form-control" name="meta[box1_sub_text]" placeholder="Small text" value="{{ old('meta.box1_sub_text',@$meta['box1_sub_text']) }}">
                                        </div>

                                        <div class="col-12" style="padding: 10px 0;">
                                            <label for="title">Box 2</label>
                                            <input type="text" class="form-control" name="meta[box2]" placeholder="Box 2" value="{{ old('meta.box2',@$meta['box2']) }}">
                                            <br/>
                                            <input type="text" class="form-control" name="meta[box2_sub_text]" placeholder="Small text" value="{{ old('meta.box2_sub_text',@$meta['box2_sub_text']) }}">
                                        </div>

                                        <div class="col-12" style="padding: 10px 0;">
                                            <label for="title">Box 3</label>
                                            <input type="text" class="form-control" name="meta[box3]" placeholder="Box 3" value="{{ old('meta.box3',@$meta['box3']) }}">
                                            <br/>
                                            <input type="text" class="form-control" name="meta[box3_sub_text]" placeholder="Small text" value="{{ old('meta.box3_sub_text',@$meta['box3_sub_text']) }}">
                                        </div>

                                        <div class="col-12" style="padding: 10px 0;">
                                            <label for="title">Box 4</label>
                                            <input type="text" class="form-control" name="meta[box4]" placeholder="Box 4" value="{{ old('meta.box4',@$meta['box4']) }}">
                                            <br/>
                                            <input type="text" class="form-control" name="meta[box4_sub_text]" placeholder="Small text" value="{{ old('meta.box4_sub_text',@$meta['box4_sub_text']) }}">
                                        </div>
                                    <br/>
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
                                <h3 class="card-title">Manage Image</h3>
                            </div>
                            <div class="card-body">
                                <div class="btn btn-default btn-file">
                                    <i class="fas fa-paperclip"></i> Attachment
                                    <input type="file" name="attachment">
                                </div>
                                <p class="help-block">Max. 32MB</p>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div><!-- /.container-fluid -->
    </section>

@endsection
@section('custom_js')
<!-- 
<script src="{{ asset('backend/plugins/summernote/summernote-bs4.min.js') }}"></script>
<script>
  $(function () {
    $('.textarea').summernote({
      height: 250,   //set editable area's height
    });
  })
</script>
 -->
@endsection