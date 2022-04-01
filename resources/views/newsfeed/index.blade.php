@extends('layouts.master-layout')
@section('title')
    Newsfeed
@endsection
@section('extra-styles')
    <link href="/vendor/select2/css/select2.min.css" rel="stylesheet" type="text/css"/>
@endsection
@section('active-page')
    News feed
@endsection

@section('main-content')
    <div class="row">
        <div class="col-xl-12 col-xxl-12 col-sm-12">
          <div class="card">
              <div class="card-header">
                  <h4 class="card-title">New Post</h4>
                  <a href="#" id="postCardToggler" class="btn btn-sm btn-primary float-right"> <i class="ti-plus mr-2"></i> New Post</a>
              </div>
              <div class="card-body" id="postCard" style="display: none">
                  <form action="" autocomplete="off">
                      @csrf
                      <div class="form-group">
                          <label for="">Subject</label>
                          <input type="text" class="form-control" placeholder="Subject..." name="subject" value="{{old('subject')}}">
                          @error('subject')
                            <i class="text-danger mt-2">{{$message}}</i>
                          @enderror
                      </div>
                      <div class="form-group">
                          <label for="">Audience</label>
                          <select name="audience" id="audience" class="form-control col-md-3">
                              <option selected disabled>--Select audience--</option>
                              <option value="1">Everyone</option>
                              <option value="2">Section/Unit</option>
                          </select>
                          @error('audience')
                            <i class="text-danger mt-2">{{$message}}</i>
                          @enderror
                      </div>
                      <div class="form-group">
                          <label for="">Sections/Units</label>
                          <select name="section" id="section" class="form-control" multiple="multiple">
                              <option selected disabled>--Select section/unit--</option>
                              @foreach($sections as $section)
                                <option value="1">Everyone</option>
                              @endforeach
                          </select>
                          @error('section')
                            <i class="text-danger mt-2">{{$message}}</i>
                          @enderror
                      </div>
                      <div class="form-group">
                          <label for="">Content</label>
                          <textarea name="content" id="content" placeholder="Type your content here..." style="resize: none;" class="form-control content">{{old('content')}}</textarea>
                          @error('content')
                            <i class="text-danger mt-2">{{$message}}</i>
                          @enderror
                      </div>
                      <hr>
                      <div class="form-group d-flex justify-content-center">
                          <button class="btn btn-primary btn-sm">Submit</button>
                      </div>
                  </form>
              </div>
          </div>
        </div>
    </div>

@endsection

@section('extra-scripts')
    <script type="text/javascript" src="/bower_components/tinymce/tinymce.min.js"></script>
    <script type="text/javascript" src="/bower_components/tinymce.js"></script>
    <script src="/vendor/select2/js/select2.full.min.js" type="text/javascript"></script>
    <script src="/js/plugins-init/select2-init.js" type="text/javascript"></script>
    <script>
        $(document).ready(function(){
            $('#postCardToggler').click(function(){
                $('#postCard').toggle("slide", { direction: "right" }, 1000);
            });
        });

    </script>
@endsection

