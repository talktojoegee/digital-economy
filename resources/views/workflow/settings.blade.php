@extends('layouts.master-layout')
@section('title')
    Application Settings
@endsection
@section('extra-styles')
    <link href="/vendor/select2/css/select2.min.css" rel="stylesheet" type="text/css"/>
    <link href="/vendor/datatables/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css"/>
@endsection
@section('active-page')
    Application Settings
@endsection

@section('main-content')
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Application Settings</h4>
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
                    <!-- Nav tabs -->
                    <div class="default-tab">
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#home"><i class="la la-home mr-2"></i> Workflow</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#profile"><i class="ti-briefcase mr-2"></i> Sections</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#contact"><i class="ti-support mr-2"></i> Section Heads</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#marital-status"><i class="ti-user mr-2"></i> Marital Status</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#states"><i class="ti-server mr-2"></i> States</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#lgas"><i class="ti-layout-grid3-alt mr-2"></i> LGAs</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#message"><i class="la la-envelope mr-2"></i> SMS</a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="home" role="tabpanel">
                                <div class="pt-4">
                                    <p><strong class="text-danger">Note:</strong>Quickly set-up the various parameters for your workflow process. You can always come back here to make changes.
                                    </p>
                                    <div class="card">
                                        <div class="card-body">
                                            <form action="{{route('workflow-settings')}}" method="post">
                                                @csrf
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="">Which section/unit should first attend to <strong>New Licence Application</strong>?</label>
                                                            <select name="new_app_section" id="new_app_section" class="form-control js-example-theme-single">
                                                                <option disabled selected>-- Select section/unit --</option>
                                                                @foreach($departments as $department)
                                                                    <option value="{{$department->id}}" {{ !empty($app_licence_setting->new_app_section_handler) ? ($department->id == $app_licence_setting->new_app_section_handler ? "selected" : '')  : 'selected'}}>{{$department->department_name ?? '' }}</option>
                                                                @endforeach
                                                            </select>
                                                            @error('new_app_section')
                                                                <i class="text-danger mt-2">{{$message}}</i>
                                                            @enderror
                                                           <p class="mt-1"> <span class="label label-info">Current Selection: </span> <span>{{ !empty($app_licence_setting) ? $app_licence_setting->getDepartmentById($app_licence_setting->new_app_section_handler)->department_name : '' }}</span></p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="">Which section/unit should attend to <strong>Licence Renewal</strong>?</label>
                                                            <select name="licence_renewal" id="licence_renewal" class="form-control js-example-theme-single">
                                                                <option disabled selected>-- Select section/unit --</option>
                                                                @foreach($departments as $department)
                                                                    <option value="{{$department->id}}" {{ !empty($app_licence_setting->licence_renewal_handler) ? ($department->id == $app_licence_setting->licence_renewal_handler ? "selected" : '')  : 'selected'}} >{{$department->department_name ?? '' }}</option>
                                                                @endforeach
                                                            </select>
                                                            @error('licence_renewal')
                                                                <i class="text-danger mt-2">{{$message}}</i>
                                                            @enderror
                                                           <p class="mt-1"> <span class="label label-info">Current Selection: </span> <span>{{ !empty($app_licence_setting) ?  $app_licence_setting->getDepartmentById($app_licence_setting->licence_renewal_handler)->department_name : '' }}</span></p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="">Which section/unit can engage the <strong>Customer</strong>?</label>
                                                            <select name="engage_customer" id="engage_customer" class="form-control js-example-theme-single">
                                                                <option disabled selected>-- Select section/unit --</option>
                                                                @foreach($departments as $department)
                                                                    <option value="{{$department->id}}" {{ !empty($app_licence_setting->engage_customer) ? ($department->id == $app_licence_setting->engage_customer ? "selected" : '')  : 'selected'}}  >{{$department->department_name ?? '' }}</option>
                                                                @endforeach
                                                            </select>
                                                            @error('engage_customer')
                                                                <i class="text-danger mt-2">{{$message}}</i>
                                                            @enderror
                                                           <p class="mt-1"> <span class="label label-info">Current Selection: </span> <span>{{ !empty($app_licence_setting) ?  $app_licence_setting->getDepartmentById($app_licence_setting->engage_customer)->department_name : '' }}</span></p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="row">
                                                    <div class="col-md-12 d-flex justify-content-center">
                                                        <button type="submit" class="btn btn-primary btn-sm">Submit</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="tab-pane fade" id="profile">
                                <div class="pt-4">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <p>Add a new section/unit</p>
                                                    <form action="{{route('add-new-department')}}" method="post" class="form-inline" autocomplete="off">
                                                        @csrf
                                                        <div class="form-group" style="width: 100%;">
                                                            <input type="text" placeholder="Section Name" value="{{old('department_name')}}" name="department_name" class="col-md-10 form-control">
                                                            <button class="btn btn-primary" type="submit">Submit</button>
                                                        </div>
                                                        <br>
                                                        <div>@error('department_name') <i class="text-danger">{{$message}}</i> @enderror</div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="table-responsive">
                                                <table class="table table-responsive-md">
                                                    <thead>
                                                    <tr>
                                                        <th class="width80"><strong>#</strong></th>
                                                        <th class="text-uppercase"><strong>Department</strong></th>
                                                        <th class="text-uppercase"><strong>Action</strong></th>
                                                        <th class="text-uppercase"></th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @php $serial = 1; @endphp
                                                    @foreach($departments as $department)
                                                        <tr>
                                                            <td><strong>{{$serial++}}</strong></td>
                                                            <td>{{$department->department_name ?? '' }}</td>
                                                            <td>
                                                                <a href="javascript:void(0);" data-toggle="modal" data-target="#departmentModal_{{$department->id}}" class="btn btn-sm btn-info"> <i class="ti-eye mr-2"></i> </a>
                                                                <div class="modal fade" id="departmentModal_{{$department->id}}">
                                                                    <div class="modal-dialog">
                                                                        <form action="{{route('update-department')}}" autocomplete="off" method="post">
                                                                            @csrf
                                                                            <div class="modal-content">
                                                                                <div class="modal-header">
                                                                                    <h5 class="modal-title">Edit {{$department->department_name ?? '' }}</h5>
                                                                                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                                                                                    </button>
                                                                                </div>
                                                                                <div class="modal-body">
                                                                                    <div class="form-group">
                                                                                        <label for="">Department Name</label>
                                                                                        <input type="text" name="department_name" class="form-control" placeholder="Department Name" value="{{$department->department_name ?? '' }}">
                                                                                    </div>
                                                                                    <input type="hidden" name="department" value="{{$department->id}}">

                                                                                </div>
                                                                                <div class="modal-footer">
                                                                                    <button type="button" class="btn btn-danger light" data-dismiss="modal">Close</button>
                                                                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                                                                </div>
                                                                            </div>
                                                                        </form>
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
                            </div>
                            <div class="tab-pane fade" id="contact">
                                <div class="pt-4">
                                    <p>Add new section head</p>
                                    <form action="{{route('assign-section-head')}}" method="post" class="form-inline" autocomplete="off">
                                        @csrf
                                        <div class="row w-100">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="">Section</label>
                                                    <select name="department"  id="department" class="form-control js-example-theme-single">
                                                        <option disabled selected>--Select section--</option>
                                                        @foreach($departments as $depart)
                                                            <option value="{{$depart->id}}">{{$depart->department_name ?? '' }}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('department')
                                                    <i class="text-danger mt-2">{{$message}}</i>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="">Employee</label>
                                                    <select name="supervisor"  id="supervisor" class="form-control js-example-theme-single">
                                                        <option disabled selected>--Select user--</option>
                                                        @foreach($employees as $emp)
                                                            <option value="{{$emp->id}}">{{$emp->first_name ?? '' }} {{$emp->last_name ?? '' }} {{$emp->other_names ?? '' }}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('supervisor')
                                                    <i class="text-danger mt-2">{{$message}}</i>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group mt-3">
                                                    <button class="btn btn-primary btn-sm">Submit</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                    <hr>
                                    <div class="table-responsive">
                                        <table class="table table-responsive-md">
                                            <thead>
                                            <tr>
                                                <th class="width80"><strong>#</strong></th>
                                                <th class="text-uppercase"><strong>Unit Head</strong></th>
                                                <th class="text-uppercase"><strong>Department</strong></th>
                                                <th class="text-uppercase"><strong>Action</strong></th>
                                                <th class="text-uppercase"></th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @php $s = 1; @endphp
                                            @foreach($supervisors as $sup)
                                                <tr>
                                                    <td><strong>{{$s++}}</strong></td>
                                                    <td>{{$sup->getEmployee->first_name ?? '' }} {{$sup->getEmployee->last_name ?? '' }}
                                                        @if($sup->status == 1)
                                                            <label for="" class="label label-success">Active</label>
                                                        @else
                                                            <label for="" class="label label-danger">Inactive</label>
                                                        @endif
                                                    </td>
                                                    <td>{{$sup->getDepartment->department_name ?? '' }}</td>
                                                    <td>
                                                        No Action Required
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="marital-status">
                                <div class="pt-4">
                                    <h4>Marital Status</h4>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-responsive-md">
                                                <thead>
                                                <tr>
                                                    <th class="width80"><strong>#</strong></th>
                                                    <th class="text-uppercase"><strong>Status</strong></th>
                                                    <th class="text-uppercase"><strong>Action</strong></th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @php $m = 1; @endphp
                                                @foreach($marital_statuses as $stat)
                                                    <tr>
                                                        <td><strong>{{$m++}}</strong></td>
                                                        <td>{{$stat->name ?? '' }}</td>
                                                        <td>
                                                            No action
                                                        </td>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="states">
                                <div class="pt-4">
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table id="example" class="display table-responsive-md">
                                                <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th class="text-uppercase">State</th>
                                                    <th class="text-uppercase">Action</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @php $serial = 1; @endphp
                                                @foreach($states as $state)
                                                    <tr>
                                                        <td>{{$serial++}}</td>
                                                        <td>{{$state->state_name ?? '' }}</td>
                                                        <td>No Action</td>
                                                    </tr>
                                                @endforeach

                                                </tbody>
                                                <tfoot>
                                                <tr>
                                                    <th>#</th>
                                                    <th class="text-uppercase">State</th>
                                                    <th class="text-uppercase">Action</th>
                                                </tr>
                                                </tfoot>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="lgas">
                                <div class="pt-4">
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table id="example3" class="display table-responsive-lg">
                                                <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>State</th>
                                                    <th>Local Government</th>
                                                    <th>Action</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @php $l = 1; @endphp
                                                @foreach($lgas as $lga)
                                                    <tr>
                                                        <td>{{$l++}}</td>
                                                        <td>{{$lga->getState->state_name ?? '' }}</td>
                                                        <td>{{$lga->local_name ?? '' }}</td>
                                                        <td>No Action</td>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="message">
                                <div class="pt-4">
                                    <p><strong class="text-danger">Note: </strong> These messages will be sent automatically for the various scheduled operations.</p>
                                    <form action="{{route('app-sms-settings')}}" method="post">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="">SMS for <strong>New Licence Application</strong></label>
                                                    <textarea name="new_licence_sms" id="new_licence_sms" maxlength="160" placeholder="Compose SMS message for new licence application (Acknowledgement)" style="resize: none;" rows="5"
                                                              class="form-control">{{old('new_licence_sms', $app_sms_setting->new_licence_sms ?? '')}}</textarea>
                                                    @error('new_licence_sms')
                                                    <i class="text-danger mt-2">{{$message}}</i>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="">SMS for Licence Renewal <strong>(Reminder)</strong></label>
                                                    <textarea name="licence_renewal_sms" id="licence_renewal_sms" maxlength="160" placeholder="Compose SMS message for licence renewal (Reminder)" style="resize: none;" rows="5"
                                                              class="form-control">{{old('licence_renewal_sms', $app_sms_setting->licence_renewal_reminder_sms ?? '')}}</textarea>
                                                    @error('licence_renewal_sms')
                                                    <i class="text-danger mt-2">{{$message}}</i>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="">SMS for Licence Renewal <strong>(Acknowledgment)</strong></label>
                                                    <textarea name="licence_renewal_sms_ack" id="licence_renewal_sms_ack" maxlength="160" placeholder="Compose SMS message for licence renewal (Acknowledgement)" style="resize: none;" rows="5"
                                                              class="form-control">{{old('licence_renewal_sms_ack', $app_sms_setting->licence_renewal_sms ?? '')}}</textarea>
                                                    @error('licence_renewal_sms_ack')
                                                    <i class="text-danger mt-2">{{$message}}</i>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-md-12 d-flex justify-content-center">
                                                <button class="btn btn-primary btn-sm" type="submit">Submit</button>
                                            </div>
                                        </div>
                                    </form>
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
    <script src="/vendor/select2/js/select2.full.min.js" type="text/javascript"></script>
    <script src="/js/plugins-init/select2-init.js" type="text/javascript"></script>
    <script src="/vendor/datatables/js/jquery.dataTables.min.js" type="text/javascript"></script>
    <script src="/js/plugins-init/datatables.init.js" type="text/javascript"></script>
@endsection

