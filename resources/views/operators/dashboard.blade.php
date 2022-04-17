@extends('layouts.operator-layout')
@section('title')
    Dashboard
@endsection
@section('extra-styles')

@endsection
@section('active-page')
    Dashboard
@endsection

@section('main-content')
    <div class="row">
        <div class="col-xl-4 col-xxl-4 col-lg-4 col-sm-4">
            <div class="widget-stat card bg-warning">
                <div class="card-body  p-4">
                    <div class="media">
                        <span class="mr-3">
                            <i class="flaticon-381-stopwatch"></i>
                        </span>
                        <div class="media-body text-white text-right">
                            <p class="mb-1">Inactive</p>
                            <h4 class="text-white">
                                {{number_format(Auth::user()->getAssignedFrequencies()->where('status',0)->count())}}
                            </h4>
                        </div>
                    </div>
                    <div class="mt-2 d-flex justify-content-end">
                        <a href="{{route('filter-my-assigned-frequencies',0)}}" class="text-white">View</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-xxl-4 col-lg-4 col-sm-4">
            <div class="widget-stat card bg-danger">
                <div class="card-body  p-4">
                    <div class="media">
                        <span class="mr-3">
                            <i class="flaticon-381-close"></i>
                        </span>
                        <div class="media-body text-white text-right">
                            <p class="mb-1">Expired</p>
                            <h4 class="text-white">
                                {{number_format(Auth::user()->getAssignedFrequencies()->where('status',2)->count())}}
                            </h4>
                        </div>
                    </div>
                    <div class="mt-2 d-flex justify-content-end">
                        <a href="{{route('filter-my-assigned-frequencies',2)}}" class="text-white">View</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-xxl-4 col-lg-4 col-sm-4">
            <div class="widget-stat card bg-success">
                <div class="card-body p-4">
                    <div class="media">
                        <span class="mr-3">
                            <i class="flaticon-381-hourglass"></i>
                        </span>
                        <div class="media-body text-white text-right">
                            <p class="mb-1">Active</p>
                            <h4 class="text-white">
                                {{number_format(Auth::user()->getAssignedFrequencies()->where('status',1)->count())}}
                            </h4>
                        </div>
                    </div>
                    <div class="mt-2 d-flex justify-content-end">
                        <a href="{{route('filter-my-assigned-frequencies',1)}}" class="text-white">View</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-12 col-xxl-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Recent Radio Licenses</h4>
                </div>
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-md-12">
                            @if(session()->has('error'))
                                <div class="alert alert-warning alert-dismissible fade show">
                                    <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="mr-2"><path d="M10.29 3.86L1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0z"></path><line x1="12" y1="9" x2="12" y2="13"></line><line x1="12" y1="17" x2="12.01" y2="17"></line></svg>
                                    {!! session()->get('error') !!}
                                    <button type="button" class="close h-100" data-dismiss="alert" aria-label="Close"><span><i class="mdi mdi-close"></i></span>
                                    </button>
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table id="example3" class="display table-responsive-lg table-striped">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Device</th>
                                <th>Valid From</th>
                                <th>Expires</th>
                                <th>Frequency</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php $serial = 1; @endphp
                            @foreach(Auth::user()->getAssignedFrequencies->take(5) as $app)
                                <tr>
                                    <td>{{$serial++}}</td>
                                    <td>
                                        @switch($app->type_of_device)
                                            @case(1)
                                            Handheld
                                            @break
                                            @case(2)
                                            Base
                                            @break
                                            @case(3)
                                            Repeaters
                                            @break
                                            @case(1)
                                            Vehicular
                                            @break
                                        @endswitch
                                    </td>
                                    <td>{{ date('d M, Y', strtotime($app->valid_from))}}</td>
                                    <td class="text-danger">{{ date('d M, Y', strtotime($app->valid_to))}}</td>
                                    <td>{{$app->assigned_frequency ?? '' }}</td>
                                    <td>
                                        @switch($app->status)
                                            @case(0)
                                            <label for="" class="badge badge-warning text-white">Inactive</label>
                                            @break
                                            @case(1)
                                            <label for="" class="badge text-white badge-success text-white">Active</label>
                                            @break
                                            @case(2)
                                            <label for="" class="badge badge-warning text-white">Expired</label>
                                            @break
                                            @case(3)
                                            <label for="" class="badge badge-danger text-white">Withdrawn</label>
                                            @break
                                        @endswitch
                                    </td>
                                    <td>
                                        <a href="{{route('view-frequencies', $app->id)}}" title="View" class="btn btn-primary shadow btn-xs sharp mr-1 "><i class="ti-eye"></i></a>
                                        @if($app->status == 2)
                                            <a href="{{route('read-frequencies', $app->id)}}" title="Renew License" class="btn btn-warning text-white shadow btn-xs sharp mr-1 "><i class="ti-loop"></i></a>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
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

