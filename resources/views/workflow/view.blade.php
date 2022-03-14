@extends('layouts.master-layout')
@section('title')
    Workflow
@endsection
@section('extra-styles')
    <link href="/vendor/datatables/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css"/>
@endsection
@section('active-page')
    Workflow
@endsection

@section('main-content')
    <div class="row">
        <div class="col-xl-8">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Workflow</h4>
                </div>
                <div class="card-body">
                    @if(session()->has('success'))
                        <div class="alert alert-success alert-dismissible fade show">
                            <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="mr-2"><polyline points="9 11 12 14 22 4"></polyline><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path></svg>
                            {!! session()->get('success') !!}
                            <button type="button" class="close h-100" data-dismiss="alert" aria-label="Close">
                                <span><i class="mdi mdi-close"></i></span>
                            </button>
                        </div>
                    @endif
                    @if(session()->has('error'))
                        <div class="alert alert-warning alert-dismissible fade show">
                            <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="mr-2"><path d="M10.29 3.86L1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0z"></path><line x1="12" y1="9" x2="12" y2="13"></line><line x1="12" y1="17" x2="12.01" y2="17"></line></svg>
                            {!! session()->get('error') !!}
                            <button type="button" class="close h-100" data-dismiss="alert" aria-label="Close">
                                <span><i class="mdi mdi-close"></i></span>
                            </button>
                        </div>
                    @endif
                    @if($errors->any())
                        <div class="alert alert-warning alert-dismissible fade show">
                            <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="mr-2"><path d="M10.29 3.86L1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0z"></path><line x1="12" y1="9" x2="12" y2="13"></line><line x1="12" y1="17" x2="12.01" y2="17"></line></svg>
                            @foreach ($errors->all() as $error)
                                <div>{{ $error }}</div>
                            @endforeach
                            <button type="button" class="close h-100" data-dismiss="alert" aria-label="Close">
                                <span><i class="mdi mdi-close"></i></span>
                            </button>
                        </div>
                    @endif
                    {!! $memo->content ?? '' !!}
                </div>
            </div>
        </div>
        <div class="col-xl-4">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Trail</h4>
                </div>
                <div class="card-body">
                    <div id="DZ_W_TimeLine1" class="widget-timeline dz-scroll style-1 height370 ps ps--active-y">
                        <ul class="timeline">
                            <li>
                                <div class="timeline-badge primary"></div>
                                <a class="timeline-panel text-muted" href="#">
                                    <span>10 minutes ago</span>
                                    <h6 class="mb-0">Youtube, a video-sharing website, goes live <strong class="text-primary">$500</strong>.</h6>
                                </a>
                            </li>
                            <li>
                                <div class="timeline-badge info">
                                </div>
                                <a class="timeline-panel text-muted" href="#">
                                    <span>20 minutes ago</span>
                                    <h6 class="mb-0">New order placed <strong class="text-info">#XF-2356.</strong></h6>
                                    <p class="mb-0">Quisque a consequat ante Sit amet magna at volutapt...</p>
                                </a>
                            </li>
                            <li>
                                <div class="timeline-badge danger">
                                </div>
                                <a class="timeline-panel text-muted" href="#">
                                    <span>30 minutes ago</span>
                                    <h6 class="mb-0">john just buy your product <strong class="text-warning">Sell $250</strong></h6>
                                </a>
                            </li>
                            <li>
                                <div class="timeline-badge success">
                                </div>
                                <a class="timeline-panel text-muted" href="#">
                                    <span>15 minutes ago</span>
                                    <h6 class="mb-0">StumbleUpon is acquired by eBay. </h6>
                                </a>
                            </li>
                            <li>
                                <div class="timeline-badge warning">
                                </div>
                                <a class="timeline-panel text-muted" href="#">
                                    <span>20 minutes ago</span>
                                    <h6 class="mb-0">Mashable, a news website and blog, goes live.</h6>
                                </a>
                            </li>
                            <li>
                                <div class="timeline-badge dark">
                                </div>
                                <a class="timeline-panel text-muted" href="#">
                                    <span>20 minutes ago</span>
                                    <h6 class="mb-0">Mashable, a news website and blog, goes live.</h6>
                                </a>
                            </li>
                        </ul>
                        <div class="ps__rail-x" style="left: 0px; bottom: 0px;"><div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div></div><div class="ps__rail-y" style="top: 0px; height: 370px; right: 0px;"><div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 325px;"></div></div></div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header  border-0 pb-0">
                    <h4 class="card-title">Conversations</h4>
                </div>
                <div class="card-body">
                    <div id="DZ_W_Todo1" class="widget-media dz-scroll height370 ps ps--active-y">
                       <div class=" mb-4">
                           <div class="form-group">
                               <label for="">Comment</label>
                               <textarea name="comment" id="comment" style="resize: none;" placeholder="Type comment here..." class="form-control"></textarea>
                           </div>
                           <div class="form-group">
                               <button class="btn btn-sm btn-primary float-right">Submit</button>
                           </div>
                       </div>
                        <ul class="timeline" style="margin-top:70px;">
                            <li>
                                <div class="timeline-panel">
                                    <div class="media mr-2">
                                        <img alt="image" width="50" src="/images/avatar/1.jpg">
                                    </div>
                                    <div class="media-body">
                                        <h5 class="mb-1">Dr sultads Send you Photo <small class="d-block">29 July 2020 - 02:26 PM</small></h5>
                                        <p>Dr sultads Send you Photo Dr sultads Send you Photo Dr sultads Send you Photo Dr sultads Send you Photo Dr sultads Send you Photo Dr sultads Send you Photo Dr sultads Send you Photo</p>
                                    </div>
                                </div>
                            </li>

                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection

@section('extra-scripts')

    <script src="/vendor/datatables/js/jquery.dataTables.min.js" type="text/javascript"></script>
    <script src="/js/plugins-init/datatables.init.js" type="text/javascript"></script>
@endsection

