@extends('layouts.master-layout')
@section('title')
    Human Resource Settings
@endsection
@section('extra-styles')
    <link href="/vendor/select2/css/select2.min.css" rel="stylesheet" type="text/css"/>
    <link href="/vendor/datatables/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css"/>
@endsection
@section('active-page')
    HR Settings
@endsection

@section('main-content')
<div class="row">
    <div class="col-xl-12 col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Human Resource Settings</h4>
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
                <div class="row">
                    <div class="col-xl-3 col-xxl-3 col-sm-3">
                        <div class="nav flex-column nav-pills mb-3">
                            <a href="#v-pills-department" data-toggle="pill" class="nav-link active show"> <i class="ti-briefcase ml-2"></i> Sections</a>
                            <a href="#v-pills-messages" data-toggle="pill" class="nav-link"> <i class="ti-support ml-2"></i> Section Heads</a>
                            <!--<a href="#v-pills-job-role" data-toggle="pill" class="nav-link"> <i class="ti-book ml-2"></i> Job Roles</a>
                            <a href="#v-pills-settings" data-toggle="pill" class="nav-link"> <i class="ti-shield ml-2"></i> Grade Level</a>
                            <a href="#v-pills-emp-status" data-toggle="pill" class="nav-link"> <i class="ti-crown ml-2"></i> Employment Status</a>-->
                            <a href="#v-pills-marital" data-toggle="pill" class="nav-link"> <i class="ti-gift ml-2"></i> Marital Status</a>
                            <a href="#v-pills-states" data-toggle="pill" class="nav-link"> <i class="ti-server ml-2"></i> States</a>
                            <a href="#v-pills-lgas" data-toggle="pill" class="nav-link"> <i class="ti-package ml-2"></i> Local Governments</a>
                        </div>
                    </div>
                    <div class="col-xl-9 col-xxl-9 col-sm-9">
                        <div class="tab-content">
                            <div id="v-pills-department" class="tab-pane fade active show">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title">List of Sections/Units</h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-12">
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
                            <div id="v-pills-job-role" class="tab-pane fade">
                                <div class="row">
                                    <div class="col-md-12">
                                        <button class="btn btn-primary btn-sm float-right" data-toggle="modal" data-target="#job-role-modal">Add New Job Role</button>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="card">
                                            <div class="card-header">
                                                <h4 class="card-title">Job Roles</h4>
                                            </div>
                                            <div class="card-body">
                                                <div class="table-responsive">
                                                    <table class="table table-striped table-responsive-sm">
                                                        <thead>
                                                        <tr>
                                                            <th>#</th>
                                                            <th>Job Role</th>
                                                            <th>Department</th>
                                                            <th>Action</th>
                                                        </tr>
                                                        </thead>
                                                        @php $serial = 1; @endphp
                                                        <tbody>
                                                        @foreach($job_roles as $role)
                                                            <tr>
                                                                <th>{{$serial++}}</th>
                                                                <td>{{$role->role_name ?? ''}}</td>
                                                                <td>{{$role->getDepartment->department_name ?? ''}}
                                                                </td>
                                                                <td class="">
                                                                    <a href="javascript:void(0);" data-toggle="modal" data-target="#roleModal_{{$role->id}}" class="btn btn-sm btn-info"> <i class="ti-eye mr-2"></i> </a>
                                                                    <div class="modal fade" id="roleModal_{{$role->id}}">
                                                                        <div class="modal-dialog">
                                                                            <form action="{{route('update-job-role')}}" autocomplete="off" method="post">
                                                                                @csrf
                                                                                <div class="modal-content">
                                                                                    <div class="modal-header">
                                                                                        <h5 class="modal-title">Edit {{$role->role_name ?? '' }}</h5>
                                                                                        <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                                                                                        </button>
                                                                                    </div>
                                                                                    <div class="modal-body">
                                                                                        <div class="form-group">
                                                                                            <label for="">Job Role</label>
                                                                                            <input type="text" name="role_name" class="form-control" placeholder="Job Role" value="{{$role->role_name ?? '' }}">
                                                                                            @error('role_name') <i class="text-danger">{{$message}}</i> @enderror
                                                                                        </div>
                                                                                        <div class="form-group">
                                                                                            <label for="">Department</label>
                                                                                            <select name="department"
                                                                                                    class="form-control">
                                                                                                @foreach($departments as $dept)
                                                                                                    <option
                                                                                                        value="{{$dept->id}}" {{$dept->id == $role->department_id ? 'selected' : '' }}>{{$dept->department_name ?? '' }}</option>
                                                                                                @endforeach
                                                                                            </select>
                                                                                            @error('department') <i class="text-danger">{{$message}}</i> @enderror
                                                                                        </div>
                                                                                        <div class="form-group">
                                                                                            <label for="">Description</label>
                                                                                            <textarea name="description"
                                                                                                      class="form-control" style="resize: none;">{{$role->description ?? '' }}</textarea>
                                                                                            @error('description') <i class="text-danger">{{$message}}</i> @enderror
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="modal-footer">
                                                                                        <input type="hidden" name="role" value="{{$role->id}}">
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

                                <div class="modal fade" id="job-role-modal">
                                    <div class="modal-dialog">
                                        <form action="{{route('add-new-job-role')}}" autocomplete="off" method="post">
                                            @csrf
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Add New Job Role</h5>
                                                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        <label for="">Job Role</label>
                                                        <input type="text" name="role_name" class="form-control" placeholder="Job Role" value="{{old('role_name')}}">
                                                        @error('role_name') <i class="text-danger mt-2">{{$message}}</i> @enderror
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">Department</label>
                                                        <select name="department" id="department" class="form-control">
                                                            <option disabled selected>--Select department--</option>
                                                            @foreach($departments as $depart)
                                                                <option value="{{$depart->id}}">{{$depart->department_name ?? '' }}</option>
                                                            @endforeach
                                                        </select>
                                                        @error('department') <i class="text-danger mt-2">{{$message}}</i> @enderror
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">Description</label>
                                                        <textarea name="description" placeholder="Type description..." id="description" style="resize: none;"
                                                                  class="form-control">{{old('description')}}</textarea>
                                                        @error('description') <i class="text-danger mt-2">{{$message}}</i> @enderror
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-danger light" data-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary">Submit</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div id="v-pills-messages" class="tab-pane fade">
                                <div class="col-md-12">
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
                                </div>
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
                            <div id="v-pills-settings" class="tab-pane fade">
                                <p>Eu dolore ea ullamco dolore Lorem id cupidatat excepteur reprehenderit consectetur elit id dolor proident in cupidatat officia. Voluptate excepteur commodo labore nisi cillum duis aliqua do. Aliqua amet
                                    qui mollit consectetur nulla mollit velit aliqua veniam nisi id do Lorem deserunt amet. Culpa ullamco sit adipisicing labore officia magna elit nisi in aute tempor commodo eiusmod.</p>
                            </div>
                            <div id="v-pills-emp-status" class="tab-pane fade">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title">Employment Status</h4>
                                    </div>
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
                                                @php $i = 1; @endphp
                                                @foreach($employment_statuses as $st)
                                                    <tr>
                                                        <td><strong>{{$i++}}</strong></td>
                                                        <td>{{$st->status ?? '' }}</td>
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
                            <div id="v-pills-marital" class="tab-pane fade">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title">Marital Status</h4>
                                    </div>
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
                            <div id="v-pills-states" class="tab-pane fade">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="card">
                                            <div class="card-header">
                                                <h4 class="card-title">States</h4>
                                            </div>
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
                                </div>
                            </div>
                            <div id="v-pills-lgas" class="tab-pane fade">
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h4 class="card-title">Local Governments</h4>
                                            <p>List of local governments with their respective states.</p>
                                        </div>
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
    <script src="/js/parsley.min.js"></script>
    <script src="/vendor/select2/js/select2.full.min.js" type="text/javascript"></script>
    <script src="/js/plugins-init/select2-init.js" type="text/javascript"></script>
    <script src="/vendor/datatables/js/jquery.dataTables.min.js" type="text/javascript"></script>
    <script src="/js/plugins-init/datatables.init.js" type="text/javascript"></script>
    <script src="/js/axios.min.js"></script>
    <script type="text/javascript">
        $(function () {
            $('#state').on('change', function(e){
                e.preventDefault();
                axios.post('/load-local-governments', {state:$(this).val()})
                    .then(response=>{
                        $('#local-wrapper').html(response.data);
                        $('#local').select2();
                    });
            });

        });
    </script>
@endsection

