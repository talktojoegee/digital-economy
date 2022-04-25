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
              <div class="card-body" id="postCard">
                  <div class="row">
                      <div class="col-xl-4 col-xxl-4 col-lg-4 col-sm-4">
                          <div class="widget-stat card bg-secondary">
                              <div class="card-body  p-4">
                                  <div class="media">
                                    <span class="mr-3">
                                        <i class="flaticon-381-briefcase"></i>
                                    </span>
                                      <div class="media-body text-white text-right">
                                          <p class="mb-1">Customers</p>
                                          <h4 class="text-white">
                                              {{number_format($companies->count())}}
                                          </h4>
                                      </div>
                                  </div>
                                  <div class="mt-2 d-flex justify-content-end">
                                      <a href="{{route('companies')}}" class="text-white">View</a>
                                  </div>
                              </div>
                          </div>
                      </div>
                      <div class="col-xl-4 col-xxl-4 col-lg-4 col-sm-4">
                          <div class="widget-stat card bg-success">
                              <div class="card-body  p-4">
                                  <div class="media">
                                    <span class="mr-3">
                                        <i class="ti-signal"></i>
                                    </span>
                                      <div class="media-body text-white text-right">
                                          <p class="mb-1">Frequencies</p>
                                          <h4 class="text-white">
                                              {{number_format($frequencies->count())}}
                                          </h4>
                                      </div>
                                  </div>
                                  <div class="mt-2 d-flex justify-content-end">
                                      <a href="{{route('assigned-frequencies')}}" class="text-white">View</a>
                                  </div>
                              </div>
                          </div>
                      </div>
                      <div class="col-xl-4 col-xxl-4 col-lg-4 col-sm-4">
                          <div class="widget-stat card bg-danger">
                              <div class="card-body p-4">
                                  <div class="media">
                                    <span class="mr-3">
                                        <i class="ti-signal"></i>
                                    </span>
                                      <div class="media-body text-white text-right">
                                          <p class="mb-1">Expired Freq.</p>
                                          <h4 class="text-white">
                                              {{number_format($frequencies->where('status',2)->count())}}
                                          </h4>
                                      </div>
                                  </div>
                                  <div class="mt-2 d-flex justify-content-end">
                                      <a href="{{route('expired-frequencies')}}" class="text-white">View</a>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title text-uppercase">Recently Registered Customers</h5>
                    <div class="btn-group">
                        <a href="{{ route('companies') }}" class="btn btn-sm btn-light float-right"> <i class="ti-layers mr-2"></i> View All</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-responsive-md">
                            <thead>
                            <tr>
                                <th class="width80"><strong>#</strong></th>
                                <th><strong>DATE</strong></th>
                                <th><strong>COMPANY NAME</strong></th>
                                <th><strong>EMAIL</strong></th>
                                <th><strong>PHONE</strong></th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @php $serial = 1; @endphp
                            @foreach($companies->take(10) as $company)
                            <tr>
                                <td><strong>{{$serial++}}</strong></td>
                                <td>{{date('d M, Y', strtotime($company->created_at))}}</td>
                                <td>{{$company->company_name ?? ''}}</td>
                                <td>{{$company->email ?? '' }}</td>
                                <td>{{$company->mobile_no ?? '' }}</td>
                                <td>
                                    <div class="dropdown">
                                        <button type="button" class="btn btn-success light sharp" data-toggle="dropdown">
                                            <svg width="20px" height="20px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"></rect><circle fill="#000000" cx="5" cy="12" r="2"></circle><circle fill="#000000" cx="12" cy="12" r="2"></circle><circle fill="#000000" cx="19" cy="12" r="2"></circle></g></svg>
                                        </button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="{{route('read-company-profile', $company->slug)}}">View</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title text-uppercase">Recently Assigned Frequencies</h5>
                    <div class="btn-group">
                        <a href="{{ route('assigned-frequencies') }}" class="btn btn-sm btn-light float-right"> <i class="ti-layers mr-2"></i> View All</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-responsive-md">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Date</th>
                                    <th>Company</th>
                                    <th>Device</th>
                                    <th>Frequency</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            @php $serial = 1; @endphp
                            @foreach($frequencies->take(10) as $app)
                                <tr>
                                    <td>{{$serial++}}</td>
                                    <td>{{date('d M, Y h:ia', strtotime($app->created_at))}}</td>
                                    <td>{{$app->getCompany->company_name ?? '' }}</td>
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
                                        <a href="{{route('read-frequencies', $app->id)}}" class="btn btn-primary shadow btn-xs sharp mr-1 "><i class="ti-eye"></i></a>
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

@endsection

