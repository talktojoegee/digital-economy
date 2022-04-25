@extends('layouts.master-layout')
@section('title')
    Employee Profile
@endsection
@section('extra-styles')

@endsection
@section('active-page')
    Employee Profile
@endsection

@section('main-content')
    <div class="row">
        <div class="col-xl-9 col-xxl-8 col-lg-12">
            <div class="row">
                <div class="col-xl-12">
                    <div class="card profile-card">
                        <div class="card-header flex-wrap border-0 pb-0">
                            <h3 class="fs-24 text-black font-w600 mr-auto mb-2 pr-3">{{$employee->first_name ?? '' }}'s Profile</h3>
                            @if($employee->id == Auth::user()->id)
                                <a href="#change-password" class="btn btn-info btn-rounded mr-3 mb-2">Change Password</a>
                                <a class="btn btn-primary btn-rounded mb-2" href="javascript:void(0);" data-toggle="modal" data-target="#updateProfileModal">Settings</a>
                            @endif
                        </div>
                        <div class="card-body">
                                @if(session()->has('success'))
                                    <div class="alert alert-success alert-dismissible fade show">
                                        <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="mr-2"><polyline points="9 11 12 14 22 4"></polyline><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path></svg>
                                        {!! session()->get('success') !!}
                                        <button type="button" class="close h-100" data-dismiss="alert" aria-label="Close"><span><i class="mdi mdi-close"></i></span>
                                        </button>
                                    </div>
                                @endif
                                @if(session()->has('error'))
                                    <div class="alert alert-warning alert-dismissible fade show">
                                        <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="mr-2"><polyline points="9 11 12 14 22 4"></polyline><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path></svg>
                                        {!! session()->get('error') !!}
                                        <button type="button" class="close h-100" data-dismiss="alert" aria-label="Close"><span><i class="mdi mdi-close"></i></span>
                                        </button>
                                    </div>
                                @endif
                            <form action="">
                                <div class="mb-5">
                                    <div class="title mb-4"><span class="fs-18 text-black font-w600">Personal Information</span></div>
                                    <div class="row">
                                        <div class="col-xl-4 col-sm-6">
                                            <div class="form-group">
                                                <label>First Name</label>
                                                <input style="height: 20px;" type="text" disabled value="{{$employee->first_name ?? '' }}" class="form-control" placeholder="Enter name">
                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-sm-6">
                                            <div class="form-group">
                                                <label>Surname</label>
                                                <input style="height: 20px;" type="text" disabled value="{{$employee->last_name ?? '' }}" class="form-control" placeholder="Enter name">
                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-sm-6">
                                            <div class="form-group">
                                                <label>Other Names</label>
                                                <input style="height: 20px;" type="text" disabled value="{{$employee->other_names ?? '' }}" class="form-control" placeholder="Enter name">
                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-sm-6">
                                            <div class="form-group">
                                                <label>Email</label>
                                                <input style="height: 20px;" type="text" disabled value="{{$employee->email ?? '' }}" class="form-control" placeholder="Enter name">
                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-sm-6">
                                            <div class="form-group">
                                                <label>Mobile No.</label>
                                                <input style="height: 20px;" type="text" disabled value="{{$employee->mobile_no ?? '' }}" class="form-control" placeholder="Enter name">
                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-sm-6">
                                            <div class="form-group">
                                                <label>Birth Date</label>
                                                <input style="height: 20px;" type="text" disabled value="{{date('d M, Y', strtotime($employee->birth_date)) ?? '' }}" class="form-control" placeholder="Enter name">
                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-sm-6">
                                            <div class="form-group">
                                                <label>Gender</label>
                                                <input style="height: 20px;" type="text" disabled value="{{$employee->gender == 1 ? 'Male' : 'Female' }}" class="form-control" placeholder="Enter name">
                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-sm-6">
                                            <div class="form-group">
                                                <label>Marital Status</label>
                                                <input style="height: 20px;" type="text" disabled value="{{$employee->getMaritalStatus->name ?? '' }}" class="form-control" placeholder="Enter name">
                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-sm-6">
                                            <div class="form-group">
                                                <label>State of Origin</label>
                                                <input style="height: 20px;" type="text" disabled value="{{$employee->getState->state_name ?? '' }}" class="form-control" placeholder="Enter name">
                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-sm-6">
                                            <div class="form-group">
                                                <label>Local Government Area</label>
                                                <input style="height: 20px;" type="text" disabled value="{{$employee->getLocalGovernment->local_name ?? '' }}" class="form-control" placeholder="Enter name">
                                            </div>
                                        </div>
                                        <div class="col-xl-12 col-sm-12">
                                            <div class="form-group">
                                                <label>Address</label>
                                                <textarea name="address" disabled
                                                          class="form-control" style="resize: none;">{{$employee->address}}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </form>
                           @if(Auth::user()->id == $employee->id)
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="title mb-4"><span class="fs-18 text-black font-w600">Emergency Contacts</span></div>
                                    <button class="btn btn-sm btn-primary float-right" data-toggle="modal" data-target="#emergencyContactModal">Add New Contact</button>
                                    <div class="table-responsive">
                                        <table class="table table-responsive-md">
                                            <thead>
                                            <tr>
                                                <th class="width80"><strong>#</strong></th>
                                                <th><strong>FULL NAME</strong></th>
                                                <th><strong>MOBILE NO.</strong></th>
                                                <th><strong>EMAIL</strong></th>
                                                <th><strong>RELATIONSHIP</strong></th>
                                                <th></th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @php $serial = 1; @endphp
                                            @foreach($employee->getUserEmergencyContacts as $contact)
                                            <tr>
                                                <td><strong>{{$serial++}}</strong></td>
                                                <td>{{$contact->full_name ?? '' }}</td>
                                                <td>{{$contact->mobile_no ?? '' }}</td>
                                                <td>{{$contact->email  ?? '' }}</td>
                                                <td>{{$contact->relationship ?? '' }}</td>
                                                <td>
                                                    <div class="dropdown">
                                                        <button type="button" class="btn btn-warning light sharp" data-toggle="dropdown">
                                                            <svg width="20px" height="20px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"></rect><circle fill="#000000" cx="5" cy="12" r="2"></circle><circle fill="#000000" cx="12" cy="12" r="2"></circle><circle fill="#000000" cx="19" cy="12" r="2"></circle></g></svg>
                                                        </button>
                                                        <div class="dropdown-menu">
                                                            <a class="dropdown-item" href="#">View</a>
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
                           @endif
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <div class="col-xl-3 col-xxl-4 col-lg-12">
            <div class="row">
                <div class="col-xl-12 col-lg-6">
                    <div class="card  flex-lg-column flex-md-row ">
                        <div class="card-body card-body  text-center border-bottom profile-bx">
                            <div class="profile-image mb-4">
                                <img  src="/images/avatar/1.jpg" class="rounded-circle" alt="" id="avatar-preview">
                            </div>
                            <h4 class="fs-22 text-black mb-1">{{$employee->title ?? '' }} {{$employee->first_name ?? '' }} {{$employee->last_name ?? '' }}</h4>
                            <p class="mb-4"> <span class="text-primary">{{$employee->getJobRole->role_name ?? '' }}</span> <br> {{$employee->getDepartment->department_name ?? '' }}</p>
                            @if(Auth::user()->id == $employee->id)
                            <form id="avatarForm" enctype="multipart/form-data">
                                <button class="btn btn-outline-primary btn-sm mt-3" id="uploadAvatarBtn">
                                    <i class="ti-camera mr-2"></i>  Change Picture
                                </button>
                                <input type="file" id="avatarFile" hidden>
                            </form>
                            @endif
                        </div>
                        <div class="card-body  border-left">
                            <div class="d-flex mb-3 align-items-center">
                                <a class="contact-icon mr-3" href="tel:{{$employee->mobile_no ?? '' }}">
                                    <i class="fa fa-phone" aria-hidden="true"></i></a>
                                <span class="text-black">{{$employee->mobile_no ?? '' }}</span>
                            </div>
                            <div class="d-flex mb-3 align-items-center">
                                <a class="contact-icon mr-3" href="mailto:{{$employee->email ?? '' }}"><i class="las la-envelope"></i></a>
                                <span class="text-black">{{$employee->email ?? '' }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row" id="change-password">
                <div class="col-xl-12 col-lg-6">
                    <div class="card  flex-lg-column flex-md-row ">
                        <div class="card-body  border-left">
                            <h4>Change Password</h4>
                            <form action="{{route('change-password')}}" method="post" autocomplete="off">
                                @csrf
                                <div class="form-group">
                                    <label for="">Current Password</label>
                                    <input type="password" name="current_password" placeholder="Current Password" class="form-control">
                                    @error('current_password') <i class="text-danger mt-2">{{$message}}</i> @endif
                                </div>
                                <div class="form-group">
                                    <label for="">New Password</label>
                                    <input type="password" name="password" placeholder="New Password" class="form-control">
                                    @error('password') <i class="text-danger mt-2">{{$message}}</i> @endif
                                </div>
                                <div class="form-group">
                                    <label for="">Re-type Password</label>
                                    <input type="password" name="password_confirmation" placeholder="Re-type Password" class="form-control">
                                </div>
                                <div class="form-group d-flex justify-content-center">
                                    <button class="btn btn-primary btn-sm" type="submit">Change Password</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @if($employee->id == Auth::user()->id)
    <div class="modal fade" id="updateProfileModal">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-uppercase">Update Profile</h5>
                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="default-tab">
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#profile"><i class="la la-user mr-2"></i> Profile</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#home"><i class="la la-home mr-2"></i> Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#contact"><i class="la la-phone mr-2"></i> Contact</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#message"><i class="la la-envelope mr-2"></i> Message</a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane fade active show" id="profile">
                                <div class="pt-4">
                                    <h4>Personal Information</h4>
                                    <p> <strong class="text-danger">Note:</strong> You can only edit the fields ticked with ( <i class="ti-check text-success"></i> )</p>
                                    <form action="">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="">First Name</label>
                                                    <input type="text" value="{{$employee->first_name ?? '' }}" readonly class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="">Surname</label>
                                                    <input type="text" value="{{$employee->last_name ?? '' }}" readonly class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="">Other Names</label>
                                                    <input type="text" value="{{$employee->other_names ?? '' }}" readonly class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="">Email</label>
                                                    <input type="text" value="{{$employee->email ?? '' }}" readonly class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="">Mobile No. <sup><i class="ti-check text-success"></i></sup> </label>
                                                    <input type="text" value="{{ old('mobile_no',$employee->mobile_no) }}" name="mobile_no" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="">Birth Date</label>
                                                    <input type="text" value="{{ date('d M, Y', strtotime($employee->birth_date)) ?? '' }}" readonly class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="">Gender</label>
                                                    <input type="text" value="{{$employee->gender == 1 ? 'Male' : 'Female' }}" readonly class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="">Marital Status</label>
                                                    <input type="text" value="{{$employee->getMaritalStatus->name ?? '' }}" readonly class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="">State of Origin</label>
                                                    <input type="text" value="{{$employee->getState->state_name ?? '' }}" readonly class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="">Local Government</label>
                                                    <input type="text" value="{{$employee->getLocalGovernment->local_name ?? '' }}" readonly class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="">Address <sup><i class="ti-check text-success"></i></sup> </label>
                                                    <textarea name="address" style="resize:none;"
                                                              class="form-control">{{old('address', $employee->address)}}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group d-flex justify-content-center">
                                                    <div class="btn-group">
                                                        <button class="btn btn-secondary btn-sm text-white" data-dismiss="modal" type="button">Cancel</button>
                                                        <button class="btn btn-primary btn-sm" type="submit">Save changes</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>

                                </div>
                            </div>
                            <div class="tab-pane fade" id="home" role="tabpanel">
                                <div class="pt-4">
                                    <h4>This is home title</h4>
                                    <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove.
                                    </p>
                                    <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove.
                                    </p>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="contact">
                                <div class="pt-4">
                                    <h4>This is contact title</h4>
                                    <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove.
                                    </p>
                                    <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove.
                                    </p>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="message">
                                <div class="pt-4">
                                    <h4>This is message title</h4>
                                    <p>Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua, retro synth master cleanse. Mustache cliche tempor.
                                    </p>
                                    <p>Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua, retro synth master cleanse. Mustache cliche tempor.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="emergencyContactModal">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-uppercase">Add New Emergency Contact</h5>
                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h4>Emergency Contact</h4>
                    <form action="{{route('add-emergency-contact')}}" method="post" autocomplete="off">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Full Name</label>
                                    <input type="text" value="{{old('full_name')}}" placeholder="Full Name" name="full_name" class="form-control">
                                    @error('full_name') <i class="text-danger">{{$message}}</i> @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Mobile No.</label>
                                    <input type="text" value="{{old('emergency_mobile_no')}}" name="emergency_mobile_no" placeholder="Mobile No." class="form-control">
                                    @error('emergency_mobile_no') <i class="text-danger">{{$message}}</i>@enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Email Address</label>
                                    <input type="text" value="{{ old('email')  }}" name="email" placeholder="Email Address" class="form-control">
                                    @error('email') <i class="text-danger">{{$message}}</i>@enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Relationship</label>
                                    <input type="text" value="{{ old('relationship')}}" name="relationship" placeholder="Relationship" class="form-control">
                                    @error('relationship') <i class="text-danger">{{$message}}</i>@enderror
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row mt-3">
                            <div class="col-md-12">
                                <div class="form-group d-flex justify-content-center">
                                    <div class="btn-group">
                                        <button class="btn btn-secondary btn-sm text-white" data-dismiss="modal" type="button">Cancel</button>
                                        <button class="btn btn-primary btn-sm" type="submit">Submit</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endif
@endsection

@section('extra-scripts')
    <script src="/js/dashboard/profile.js" type="text/javascript"></script>
    <script>
        $(document).on('click', '#uploadAvatarBtn', function(event){
            event.preventDefault();
            $('#avatarFile').click();
            $('#avatarFile').change(function(e){
                let file = e.target.files[0];
                let reader = new FileReader();
                var avatar='';
                reader.onloadend = (file) =>{
                    avatar = reader.result;
                    //alert(avatar);
                    //$('#avatar-preview').attr('src', avatar);
                    /*axios.post('/upload/avatar',{avatar:avatar})
                        .then(response=>{
                            $.notify(response.data.message, 'success');
                        })
                        .catch(error=>{
                            $.notify("Error! Couldn't upload profile try again.");
                        });*/
                }
                //reader.readAsDataURL(file);

            });
        });
    </script>
@endsection

