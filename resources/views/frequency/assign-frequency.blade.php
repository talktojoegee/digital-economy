@extends('layouts.master-layout')
@section('title')
    Assign Frequency
@endsection
@section('extra-styles')

@endsection
@section('active-page')
    Assign Frequency
@endsection

@section('main-content')
    <div class="row">
        <div class="col-md-12 mb-3">
            <a href="{{url()->previous()}}" class="btn btn-sm btn-light float-right"> <i class="ti-control-backward mr-2"></i> Go Back</a>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-12 col-xxl-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Assign Radio Frequency</h4>
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
                        <div class="col-md-12">
                            @if(session()->has('success'))
                                <div class="alert alert-success alert-dismissible fade show">
                                    <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="mr-2"><path d="M10.29 3.86L1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0z"></path><line x1="12" y1="9" x2="12" y2="13"></line><line x1="12" y1="17" x2="12.01" y2="17"></line></svg>
                                    {!! session()->get('success') !!}
                                    <button type="button" class="close h-100" data-dismiss="alert" aria-label="Close"><span><i class="mdi mdi-close"></i></span>
                                    </button>
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <form action="{{route('process-frequency-assignment')}}" method="post">
                                @csrf
                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <label class="col-sm-4 col-form-label">License Start Date</label>
                                        <div class="col-sm-8">
                                            <input type="date"  name="start_date" class="form-control" placeholder="Start Date" value="{{ date('Y-m-d')}}">
                                            <input type="hidden" name="application" value="{{$applicationId}}">
                                            @error('start_date')
                                            <i class="text-danger mt-2">{{$message}}</i>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    @if(!is_null($handheld))
                                        @if($handheld->no_of_devices > 0)

                                                <h5>Handheld Devices({{ $handheld->no_of_devices }})</h5>
                                            @for($i = 0; $i < $handheld->no_of_devices; $i++)
                                                    <div class="form-group row">
                                                        <label class="col-sm-4 col-form-label">Handheld Device (#{{$i+1}})</label>
                                                        <label class="col-sm-4 col-form-label">Operation Mode <span>{{ $handheld->operation_mode == 1 ? 'Simplex' : 'Duplex'  }}</span></label>
                                                        <div class="col-sm-8">
                                                            <input type="text" name="assign_frequency[]" class="form-control" placeholder="Assign Frequency" value="{{old('assign_frequency[0]')}}">
                                                            <input type="hidden" name="type_of_device[]" value="1">
                                                            @error('assign_frequency')
                                                            <i class="text-danger mt-2">{{$message}}</i>
                                                            @enderror
                                                        </div>
                                                    </div>
                                            @endfor
                                        @endif
                                    @endif
                                @if(!is_null($base))
                                    @if($base > 0)

                                            <h5>Base({{$base}})</h5>
                                        @for($b = 0; $b < $base; $b++)
                                                <div class="form-group row">
                                                    <label class="col-sm-4 col-form-label">Base Station (#{{$b+1}})</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" name="assign_frequency[]" class="form-control" placeholder="Assign Frequency" value="{{old('assign_frequency[0]')}}">
                                                        <input type="hidden" name="type_of_device[]" value="2">
                                                        @error('assign_frequency')
                                                        <i class="text-danger mt-2">{{$message}}</i>
                                                        @enderror
                                                    </div>
                                                </div>
                                        @endfor
                                    @endif
                                    @endif
                                @if(!is_null($repeaters))
                                    @if($repeaters > 0)

                                        <h5>Repeaters({{$repeaters}})</h5>
                                        @for($r = 0; $r < $repeaters; $r++)
                                            <div class="form-group row">
                                                <label class="col-sm-4 col-form-label">Repeaters Station (#{{$r+1}})</label>
                                                <div class="col-sm-8">
                                                    <input type="text" name="assign_frequency[]" class="form-control" placeholder="Assign Frequency" value="{{old('assign_frequency[0]')}}">
                                                    <input type="hidden" name="type_of_device[]" value="3">
                                                    @error('assign_frequency')
                                                    <i class="text-danger mt-2">{{$message}}</i>
                                                    @enderror
                                                </div>
                                            </div>
                                        @endfor
                                    @endif
                                @endif
                                @if(!is_null($vehicular))
                                    @if($vehicular > 0)
                                        <h5>Vehicular({{$vehicular}})</h5>
                                        @for($v = 0; $v < $vehicular; $v++)
                                            <div class="form-group row">
                                                <label class="col-sm-4 col-form-label">Vehicular Station (#{{$v+1}})</label>
                                                <div class="col-sm-8">
                                                    <input type="text" name="assign_frequency[]" class="form-control" placeholder="Assign Frequency" value="{{old('assign_frequency[0]')}}">
                                                    <input type="hidden" name="type_of_device[]" value="4">
                                                    @error('assign_frequency')
                                                        <i class="text-danger mt-2">{{$message}}</i>
                                                    @enderror
                                                </div>
                                            </div>
                                        @endfor
                                    @endif
                                @endif
                                </div>
                                <hr>
                                <div class="col-md-12 d-flex justify-content-center">
                                    <div class="btn-group">
                                        <input type="hidden" value="{{$invoice_slug}}" name="slug">
                                        <a href="{{url()->previous()}}" class="btn-light btn-sm btn">Cancel</a>
                                        <button class="btn btn-primary btn-sm">Submit</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('extra-scripts')

@endsection

