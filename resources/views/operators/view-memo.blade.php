@extends('layouts.operator-layout')
@section('title')
    Ministerial Memo
@endsection
@section('extra-styles')

@endsection
@section('active-page')
    Ministerial Memo
@endsection

@section('main-content')
    <div class="row">
        <div class="col-xl-12 col-xxl-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Ministerial Memo</h4>

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
                    <div class="row">
                        <div class="col-lg-12">

                            <div class="card">
                                <div class="card-body">
                                    <div class="row mb-5">
                                        <div class="col-sm-9">
                                            <div class="mb-3">
                                                <img class="logo-abbr mr-2" src="/assets/drive/logos/{{Auth::user()->logo ?? 'logo.png'}}" alt="">
                                            </div>
                                            <span><strong class="d-block">RC No. <small>{{Auth::user()->rc_number ?? '' }}</small></strong>
                                            </span>
                                        </div>
                                        <div class="mt-4 col-xl-3 col-lg-3 col-md-6 col-sm-6">
                                            <div> <i class="ti-map-alt text-primary mr-2"></i> <strong>Address</strong><br>
                                                {{Auth::user()->office_address ?? ''}}</div>
                                            <div><i class="ti-email text-primary mr-2"></i> <strong>Email</strong> <br>
                                                {{Auth::user()->email ?? '' }}
                                            </div>
                                            <div><i class="ti-mobile text-primary mr-2"></i> <strong>Phone</strong> <br>
                                                {{Auth::user()->mobile_no ?? ''}}</div>
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            {!! $app->content ?? '' !!}
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row mt-4">
                                        <div class="col-md-12">
                                            <h4>Trail</h4>
                                            <div class="table-responsive">
                                                <table class="table table-striped table-responsive-sm">
                                                    <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Name</th>
                                                        <th>Office</th>
                                                        <th>Status</th>
                                                        <th>Comment</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @php $index = 1; @endphp
                                                    @foreach($app->getWorkflowProcess as $process)
                                                    <tr>
                                                        <th>{{$index}}</th>
                                                        <td>{{$process->getOfficer->first_name ?? ''}} {{$process->getOfficer->last_name ?? ''}}</td>
                                                        <td>{{$process->getOfficer->getDepartment->department_name ?? '' }}</td>
                                                        <td>
                                                            @switch($process->status)
                                                                @case(0)
                                                                <span class="text-warning">Pending</span>
                                                                @break
                                                                @case(1)
                                                                <span class="text-success">Approved</span>
                                                                @break
                                                                @case(2)
                                                                <span class="text-danger">Declined</span>
                                                                @break
                                                            @endswitch
                                                        </td>
                                                        <td class="color-primary">$21.56</td>
                                                    </tr>
                                                    @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('extra-scripts')

@endsection

