@extends('layouts.master-layout')
@section('title')
    Dashboard
@endsection
@section('extra-styles')
    <link href="/vendor/select2/css/select2.min.css" rel="stylesheet" type="text/css"/>
@endsection
@section('active-page')
     Dashboard
@endsection

@section('main-content')
    <div class="row">
        <div class="col-xl-12 col-xxl-12 col-sm-12">
          <div class="card">
              <div class="card-header">
                  <h4 class="card-title">Dashboard</h4>
              </div>
              <div class="card-body" id="postCard" style="display: none">

              </div>
          </div>
        </div>
    </div>

@endsection

@section('extra-scripts')

@endsection

