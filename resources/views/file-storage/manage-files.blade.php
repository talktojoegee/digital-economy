@extends('layouts.master-layout')
@section('title')
    File Storage
@endsection
@section('extra-styles')

@endsection
@section('active-page')
    File Storage
@endsection

@section('main-content')
    <div class="row">
        <div class="col-xl-6 col-xxl-6 col-sm-6">
            <div class="card bg-danger">
                <div class="card-body">
                    <div class="media align-items-center">
                        <span class="p-3 mr-3 border border-white rounded">
                            <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
                                 width="50" height="50"
                                 viewBox="0 0 50 50"
                                 style=" fill:#FFFF;"><path d="M 3 4 C 1.355469 4 0 5.355469 0 7 L 0 43.90625 C -0.0625 44.136719 -0.0390625 44.378906 0.0625 44.59375 C 0.34375 45.957031 1.5625 47 3 47 L 42 47 C 43.492188 47 44.71875 45.875 44.9375 44.4375 C 44.945313 44.375 44.964844 44.3125 44.96875 44.25 C 44.96875 44.230469 44.96875 44.207031 44.96875 44.1875 L 45 44.03125 C 45 44.019531 45 44.011719 45 44 L 49.96875 17.1875 L 50 17.09375 L 50 17 C 50 15.355469 48.644531 14 47 14 L 47 11 C 47 9.355469 45.644531 8 44 8 L 18.03125 8 C 18.035156 8.003906 18.023438 8 18 8 C 17.96875 7.976563 17.878906 7.902344 17.71875 7.71875 C 17.472656 7.4375 17.1875 6.96875 16.875 6.46875 C 16.5625 5.96875 16.226563 5.4375 15.8125 4.96875 C 15.398438 4.5 14.820313 4 14 4 Z M 3 6 L 14 6 C 13.9375 6 14.066406 6 14.3125 6.28125 C 14.558594 6.5625 14.84375 7.03125 15.15625 7.53125 C 15.46875 8.03125 15.8125 8.5625 16.21875 9.03125 C 16.625 9.5 17.179688 10 18 10 L 44 10 C 44.5625 10 45 10.4375 45 11 L 45 14 L 8 14 C 6.425781 14 5.171875 15.265625 5.0625 16.8125 L 5.03125 16.8125 L 5 17 L 2 33.1875 L 2 7 C 2 6.4375 2.4375 6 3 6 Z M 8 16 L 47 16 C 47.5625 16 48 16.4375 48 17 L 43.09375 43.53125 L 43.0625 43.59375 C 43.050781 43.632813 43.039063 43.675781 43.03125 43.71875 C 43.019531 43.757813 43.007813 43.800781 43 43.84375 C 43 43.863281 43 43.886719 43 43.90625 C 43 43.917969 43 43.925781 43 43.9375 C 42.984375 43.988281 42.976563 44.039063 42.96875 44.09375 C 42.964844 44.125 42.972656 44.15625 42.96875 44.1875 C 42.964844 44.230469 42.964844 44.269531 42.96875 44.3125 C 42.84375 44.71875 42.457031 45 42 45 L 3 45 C 2.4375 45 2 44.5625 2 44 L 6.96875 17.1875 L 7 17.09375 L 7 17 C 7 16.4375 7.4375 16 8 16 Z"></path></svg>
                        </span>
                        <div class="media-body text-right">
                            <p class="fs-18 text-white mb-2">Folders</p>
                            <span class="fs-48 text-white font-w600">{{number_format($folders->count())}}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-6 col-xxl-6 col-sm-6">
            <div class="card bg-info">
                <div class="card-body">
                    <div class="media align-items-center">
                        <span class="p-3 mr-3 border border-white rounded">
                            <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
                                 width="50" height="50"
                                 viewBox="0 0 50 50"
                                 style=" fill:#FFFFFF;"><path d="M 7 2 L 7 48 L 43 48 L 43 14.59375 L 42.71875 14.28125 L 30.71875 2.28125 L 30.40625 2 Z M 9 4 L 29 4 L 29 16 L 41 16 L 41 46 L 9 46 Z M 31 5.4375 L 39.5625 14 L 31 14 Z"></path></svg>
                        </span>
                        <div class="media-body text-right">
                            <p class="fs-18 text-white mb-2">Files</p>
                            <span class="fs-48 text-white font-w600">{{ number_format($files->count()) }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-12 col-xxl-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">File Storage</h4>
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
                    <div class="row" >
                        <div class="col-lg-4  col-xl-4 col-md-4">
                            <div class="card">
                                <div class="card-body bg-light">
                                    <h4 class="sub-title p-4">TAKE ACTION </h4>
                                    <!-- Nav tabs -->
                                    <div class="default-tab">
                                        <ul class="nav nav-tabs" role="tablist">
                                            <li class="nav-item">
                                                <a class="nav-link active" data-toggle="tab" href="#home3">
                                                    <i class="las la-file-alt mr-2"></i>  File</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" data-toggle="tab" href="#profile3">
                                                    <i class="las la-folder-open mr-2"></i> Folder</a>
                                            </li>
                                        </ul>
                                        <!-- Tab panes -->
                                        <div class="tab-content card-block">
                                            <div class="tab-pane active" id="home3" role="tabpanel">
                                                <form action="{{route('upload-files')}}" method="post" enctype="multipart/form-data">
                                                    @csrf
                                                    <h4 class="p-3">Upload File(s)</h4>
                                                    <div class="form-group">
                                                        <label for="" class="p-3">File Name</label>
                                                        <input type="text" name="file_name" placeholder="File Name" class="form-control">
                                                        @error('file_name')
                                                        <i class="text-danger mt-2">{{$message}}</i>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">Attachment</label>
                                                        <input type="file" name="attachments[]" class="form-control-file" multiple>
                                                        @error('attachment')
                                                        <i class="text-danger mt-2">{{$message}}</i>
                                                        @enderror
                                                        <input type="hidden" name="folder" value="0">
                                                    </div>
                                                    <hr>
                                                    <div class="form-group d-flex justify-content-center">
                                                        <div class="btn-group">
                                                            <a href="{{url()->previous()}}" class="btn btn-danger btn-mini"><i class="ti-close mr-2"></i> Back</a>
                                                            <button type="submit" class="btn btn-mini btn-primary"><i class="ti-check mr-2"></i> Submit</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="tab-pane" id="profile3" role="tabpanel">
                                                <form action="{{route('create-folder')}}" method="post" enctype="multipart/form-data">
                                                    @csrf
                                                    <h4 class="p-3">Create Folder</h4>
                                                    <div class="form-group">
                                                        <label for="" class="p-3">Folder Name</label>
                                                        <input type="text" name="folder_name" placeholder="Folder Name" class="form-control">
                                                        @error('folder_name')
                                                        <i class="text-danger mt-2">{{$message}}</i>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">Parent Folder</label>
                                                        <select name="parent_folder" id="parent_folder" class="form-control">
                                                            <option value="0" selected>None</option>
                                                            @foreach($folders as $folder)
                                                                <option value="{{$folder->id}}">{{$folder->folder ?? ''}}</option>
                                                            @endforeach
                                                        </select>
                                                        @error('parent_folder')
                                                        <i class="text-danger mt-2">{{$message}}</i>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">Visibility</label>
                                                        <select name="visibility" id="visibility" class="form-control">
                                                            <option disabled selected>--Select visibility--</option>
                                                            <option value="1">Private</option>
                                                            <option value="2">Public</option>
                                                        </select>
                                                        @error('visibility')
                                                        <i class="text-danger mt-2">{{$message}}</i>
                                                        @enderror
                                                    </div>
                                                    <hr>
                                                    <div class="form-group d-flex justify-content-center">
                                                        <div class="btn-group">
                                                            <a href="{{url()->previous()}}" class="btn btn-danger btn-mini"><i class="ti-close mr-2"></i> Back</a>
                                                            <button type="submit" class="btn btn-mini btn-primary"><i class="ti-check mr-2"></i> Submit</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-8  col-xl-8 col-md-8">

                            <div class="card bg-light">
                                <div class="card-block">
                                    @if (session()->has('success'))
                                        <div class="alert alert-success background-success">
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <i class="icofont icofont-close-line-circled text-white"></i>
                                            </button>
                                            {!! session()->get('success') !!}
                                        </div>
                                    @endif
                                    <div class="row p-4">
                                        @foreach($folders as $folder)
                                            @if($folder->parent_id == 0)
                                                <div class="col-md-2">
                                                    <a href="{{route('open-folder', $folder->slug)}}" title="{{$folder->folder ?? 'No name'}}" data-original-title="{{$folder->folder ?? 'No name'}}" style="cursor: pointer;">
                                                        <img src="/assets/formats/folder.png" height="64" width="64" alt="{{$folder->folder ?? 'No name'}}"><br>
                                                        {{strlen($folder->folder ?? 'No name') > 20 ? substr($folder->folder ?? 'No name',0,17).'...' : $folder->folder ?? 'No name'}}
                                                    </a>
                                                    <div class="row">
                                                        <div class="col-md-12 col-lg-12">
                                                            <div class="dropdown-secondary dropdown float-right">
                                                                <button class="btn btn-default dropdown-toggle waves-light b-none text-danger" type="button" id="dropdown6" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="icofont icofont-navigation-menu"></i></button>
                                                                <div class="dropdown-menu" aria-labelledby="dropdown6" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut" x-placement="bottom-start" style="position: absolute; transform: translate3d(0px, 24px, 0px); top: 0px; left: 0px; will-change: transform;">
                                                                    <div class="dropdown-divider"></div>
                                                                    <a class="dropdown-item waves-light waves-effect deleteFolder" data-toggle="modal" data-target="#deleteFolderModal"  data-folder="{{$folder->folder ?? 'File name'}}" data-fid="{{$folder->id}}" href="javascript:void(0);"><i class="ti-trash mr-2 text-danger"></i> Delete</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif
                                        @endforeach

                                        @if($files->count() > 0)
                                            @foreach ($files as $file)
                                                @switch(pathinfo(strtolower($file->filename), PATHINFO_EXTENSION))
                                                    @case('pptx')
                                                    <div class="col-md-2">
                                                        <a href="button" data-toggle="tooltip" data-placement="top" title="{{$file->name ?? 'No name'}}" data-original-title="{{$file->name ?? 'No name'}}" style="cursor: pointer;">
                                                            <img src="/assets/formats/ppt.png" height="64" width="64" alt="{{$file->name ?? 'No name'}}"><br>
                                                            {{strlen($file->name ?? 'No name') > 10 ? substr($file->name ?? 'No name',0,7).'...' : $file->name ?? 'No name'}}
                                                        </a>
                                                        <div class="dropdown-secondary dropdown float-right">
                                                            <button class="btn btn-default btn-mini dropdown-toggle waves-light b-none txt-muted" type="button" id="dropdown6" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="icofont icofont-navigation-menu"></i></button>
                                                            <div class="dropdown-menu" aria-labelledby="dropdown6" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut" x-placement="bottom-start" style="position: absolute; transform: translate3d(0px, 24px, 0px); top: 0px; left: 0px; will-change: transform;">
                                                                <a class="dropdown-item waves-light waves-effect" href="{{route('download-attachment',$file->filename)}}"><i class="ti-download text-success mr-2"></i> Download</a>
                                                                <div class="dropdown-divider"></div>
                                                                <a class="dropdown-item waves-light waves-effect deleteFile"  data-toggle="modal" data-target="#deleteModal" data-directory="{{$file->filename}}" data-file="{{$file->name ?? 'File name'}}" data-unique="{{$file->id}}" href="javascript:void(0);"><i class="ti-trash mr-2 text-danger"></i> Delete</a>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    @break
                                                    @case('pdf')
                                                    <div class="col-md-2 mb-4">
                                                        <a href="javascript:void(0);" data-toggle="tooltip" data-placement="top" title="{{$file->name ?? 'No name'}}" data-original-title="{{$file->name ?? 'No name'}}" style="cursor: pointer;">
                                                            <img src="/assets/formats/pdf.png" height="64" width="64" alt="{{$file->name ?? 'No name'}}"> <br>
                                                            {{strlen($file->name ?? 'No name') > 10 ? substr($file->name ?? 'No name',0,7).'...' : $file->name ?? 'No name'}}
                                                        </a>
                                                        <div class="dropdown-secondary dropdown float-right">
                                                            <button class="btn btn-default btn-mini dropdown-toggle waves-light b-none txt-muted" type="button" id="dropdown6" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="icofont icofont-navigation-menu"></i></button>
                                                            <div class="dropdown-menu" aria-labelledby="dropdown6" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut" x-placement="bottom-start" style="position: absolute; transform: translate3d(0px, 24px, 0px); top: 0px; left: 0px; will-change: transform;">
                                                                <a class="dropdown-item waves-light waves-effect" href="{{route('download-attachment',$file->filename)}}"><i class="ti-download text-success mr-2"></i> Download</a>
                                                                <div class="dropdown-divider"></div>
                                                                <a class="dropdown-item waves-light waves-effect deleteFile"  data-toggle="modal" data-target="#deleteModal" data-directory="{{$file->filename}}" data-file="{{$file->name ?? 'File name'}}" data-unique="{{$file->id}}" href="javascript:void(0);"><i class="ti-trash mr-2 text-danger"></i> Delete</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @break

                                                    @case('csv')
                                                    <div class="col-md-2">
                                                        <a href="button" style="cursor: pointer;"  data-toggle="tooltip" data-placement="top" title="{{$file->name ?? 'No name'}}" data-original-title="{{$file->name ?? 'No name'}}">
                                                            <img src="/assets/formats/csv.png" height="64" width="64" alt="{{$file->name ?? 'No name'}}"><br>
                                                            {{strlen($file->name ?? 'No name') > 10 ? substr($file->name ?? 'No name',0,7).'...' : $file->name ?? 'No name'}}
                                                        </a>
                                                        <div class="dropdown-secondary dropdown float-right">
                                                            <button class="btn btn-default btn-mini dropdown-toggle waves-light b-none txt-muted" type="button" id="dropdown6" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="icofont icofont-navigation-menu"></i></button>
                                                            <div class="dropdown-menu" aria-labelledby="dropdown6" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut" x-placement="bottom-start" style="position: absolute; transform: translate3d(0px, 24px, 0px); top: 0px; left: 0px; will-change: transform;">
                                                                <a class="dropdown-item waves-light waves-effect" href="{{route('download-attachment',$file->filename)}}"><i class="ti-download text-success mr-2"></i> Download</a>
                                                                <div class="dropdown-divider"></div>
                                                                <a class="dropdown-item waves-light waves-effect deleteFile"  data-toggle="modal" data-target="#deleteModal" data-directory="{{$file->filename}}" data-file="{{$file->name ?? 'File name'}}" data-unique="{{$file->id}}" href="javascript:void(0);"><i class="ti-trash mr-2 text-danger"></i> Delete</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @break
                                                    @case('xls')
                                                    <div class="col-md-2">
                                                        <a href="button" style="cursor: pointer;"  data-toggle="tooltip" data-placement="top" title="{{$file->name ?? 'No name'}}" data-original-title="{{$file->name ?? 'No name'}}">
                                                            <img src="/assets/formats/xls.png" height="64" width="64" alt="{{$file->name ?? 'No name'}}"><br>
                                                            {{strlen($file->name ?? 'No name') > 10 ? substr($file->name ?? 'No name',0,7).'...' : $file->name ?? 'No name'}}
                                                        </a>
                                                        <div class="dropdown-secondary dropdown float-right">
                                                            <button class="btn btn-default btn-mini dropdown-toggle waves-light b-none txt-muted" type="button" id="dropdown6" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="icofont icofont-navigation-menu"></i></button>
                                                            <div class="dropdown-menu" aria-labelledby="dropdown6" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut" x-placement="bottom-start" style="position: absolute; transform: translate3d(0px, 24px, 0px); top: 0px; left: 0px; will-change: transform;">
                                                                <a class="dropdown-item waves-light waves-effect" href="{{route('download-attachment',$file->filename)}}"><i class="ti-download text-success mr-2"></i> Download</a>
                                                                <div class="dropdown-divider"></div>
                                                                <a class="dropdown-item waves-light waves-effect deleteFile"  data-toggle="modal" data-target="#deleteModal" data-directory="{{$file->filename}}" data-file="{{$file->name ?? 'File name'}}" data-unique="{{$file->id}}" href="javascript:void(0);"><i class="ti-trash mr-2 text-danger"></i> Delete</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @break
                                                    @case('xlsx')
                                                    <div class="col-md-2">
                                                        <a href="button" style="cursor: pointer;"  data-toggle="tooltip" data-placement="top" title="{{$file->name ?? 'No name'}}" data-original-title="{{$file->name ?? 'No name'}}">
                                                            <img src="/assets/formats/xls.png" height="64" width="64" alt="{{$file->name ?? 'No name'}}"><br>
                                                            {{strlen($file->name ?? 'No name') > 10 ? substr($file->name ?? 'No name',0,7).'...' : $file->name ?? 'No name'}}
                                                        </a>
                                                        <div class="dropdown-secondary dropdown float-right">
                                                            <button class="btn btn-default btn-mini dropdown-toggle waves-light b-none txt-muted" type="button" id="dropdown6" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="icofont icofont-navigation-menu"></i></button>
                                                            <div class="dropdown-menu" aria-labelledby="dropdown6" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut" x-placement="bottom-start" style="position: absolute; transform: translate3d(0px, 24px, 0px); top: 0px; left: 0px; will-change: transform;">
                                                                <a class="dropdown-item waves-light waves-effect" href="{{route('download-attachment',$file->filename)}}"><i class="ti-download text-success mr-2"></i> Download</a>
                                                                <div class="dropdown-divider"></div>
                                                                <a class="dropdown-item waves-light waves-effect deleteFile"  data-toggle="modal" data-target="#deleteModal" data-directory="{{$file->filename}}" data-file="{{$file->name ?? 'File name'}}" data-unique="{{$file->id}}" href="javascript:void(0);"><i class="ti-trash mr-2 text-danger"></i> Delete</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @break
                                                    @case('doc')
                                                    <div class="col-md-2">
                                                        <a href="button" style="cursor: pointer;"  data-toggle="tooltip" data-placement="top" title="{{$file->name ?? 'No name'}}" data-original-title="{{$file->name ?? 'No name'}}">
                                                            <img src="/assets/formats/doc.png" height="64" width="64" alt="{{$file->name ?? 'No name'}}"><br>
                                                            {{strlen($file->name ?? 'No name') > 10 ? substr($file->name ?? 'No name',0,7).'...' : $file->name ?? 'No name'}}
                                                        </a>
                                                        <div class="dropdown-secondary dropdown float-right">
                                                            <button class="btn btn-default btn-mini dropdown-toggle waves-light b-none txt-muted" type="button" id="dropdown6" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="icofont icofont-navigation-menu"></i></button>
                                                            <div class="dropdown-menu" aria-labelledby="dropdown6" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut" x-placement="bottom-start" style="position: absolute; transform: translate3d(0px, 24px, 0px); top: 0px; left: 0px; will-change: transform;">
                                                                <a class="dropdown-item waves-light waves-effect" href="{{route('download-attachment',$file->filename)}}"><i class="ti-download text-success mr-2"></i> Download</a>
                                                                <div class="dropdown-divider"></div>
                                                                <a class="dropdown-item waves-light waves-effect deleteFile"  data-toggle="modal" data-target="#deleteModal" data-directory="{{$file->filename}}" data-file="{{$file->name ?? 'File name'}}" data-unique="{{$file->id}}" href="javascript:void(0);"><i class="ti-trash mr-2 text-danger"></i> Delete</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @break
                                                    @case('doc')
                                                    <div class="col-md-2">
                                                        <a href="button" style="cursor: pointer;" data-toggle="tooltip" data-placement="top" title="{{$file->name ?? 'No name'}}" data-original-title="{{$file->name ?? 'No name'}}">
                                                            <img src="/assets/formats/doc.png" height="64" width="64" alt="{{$file->name ?? 'No name'}}"><br>
                                                            {{strlen($file->name ?? 'No name') > 10 ? substr($file->name ?? 'No name',0,7).'...' : $file->name ?? 'No name'}}
                                                        </a>
                                                        <div class="dropdown-secondary dropdown float-right">
                                                            <button class="btn btn-default btn-mini dropdown-toggle waves-light b-none txt-muted" type="button" id="dropdown6" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="icofont icofont-navigation-menu"></i></button>
                                                            <div class="dropdown-menu" aria-labelledby="dropdown6" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut" x-placement="bottom-start" style="position: absolute; transform: translate3d(0px, 24px, 0px); top: 0px; left: 0px; will-change: transform;">
                                                                <a class="dropdown-item waves-light waves-effect" href="{{route('download-attachment',$file->filename)}}"><i class="ti-download text-success mr-2"></i> Download</a>
                                                                <div class="dropdown-divider"></div>
                                                                <a class="dropdown-item waves-light waves-effect deleteFile"  data-toggle="modal" data-target="#deleteModal" data-directory="{{$file->filename}}" data-file="{{$file->name ?? 'File name'}}" data-unique="{{$file->id}}" href="javascript:void(0);"><i class="ti-trash mr-2 text-danger"></i> Delete</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @break
                                                    @case('docx')
                                                    <div class="col-md-2">
                                                        <a href="button" style="cursor: pointer;" data-toggle="tooltip" data-placement="top" title="{{$file->name ?? 'No name'}}" data-original-title="{{$file->name ?? 'No name'}}">
                                                            <img src="/assets/formats/doc.png" height="64" width="64" alt="{{$file->name ?? 'No name'}}"><br>
                                                            {{strlen($file->name ?? 'No name') > 10 ? substr($file->name ?? 'No name',0,7).'...' : $file->name ?? 'No name'}}
                                                        </a>
                                                        <div class="dropdown-secondary dropdown float-right">
                                                            <button class="btn btn-default btn-mini dropdown-toggle waves-light b-none txt-muted" type="button" id="dropdown6" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="icofont icofont-navigation-menu"></i></button>
                                                            <div class="dropdown-menu" aria-labelledby="dropdown6" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut" x-placement="bottom-start" style="position: absolute; transform: translate3d(0px, 24px, 0px); top: 0px; left: 0px; will-change: transform;">
                                                                <a class="dropdown-item waves-light waves-effect" href="{{route('download-attachment',$file->filename)}}"><i class="ti-download text-success mr-2"></i> Download</a>
                                                                <div class="dropdown-divider"></div>
                                                                <a class="dropdown-item waves-light waves-effect deleteFile"  data-toggle="modal" data-target="#deleteModal" data-directory="{{$file->filename}}" data-file="{{$file->name ?? 'File name'}}" data-unique="{{$file->id}}" href="javascript:void(0);"><i class="ti-trash mr-2 text-danger"></i> Delete</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @break
                                                    @case('jpeg')
                                                    <div class="col-md-2">
                                                        <a href="button" style="cursor: pointer;"  data-toggle="tooltip" data-placement="top" title="{{$file->name ?? 'No name'}}" data-original-title="{{$file->name ?? 'No name'}}">
                                                            <img src="/assets/formats/jpg.png" height="64" width="64" alt="{{$file->name ?? 'No name'}}"><br>
                                                            {{strlen($file->name ?? 'No name') > 10 ? substr($file->name ?? 'No name',0,7).'...' : $file->name ?? 'No name'}}
                                                        </a>
                                                        <div class="dropdown-secondary dropdown float-right">
                                                            <button class="btn btn-default btn-mini dropdown-toggle waves-light b-none txt-muted" type="button" id="dropdown6" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="icofont icofont-navigation-menu"></i></button>
                                                            <div class="dropdown-menu" aria-labelledby="dropdown6" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut" x-placement="bottom-start" style="position: absolute; transform: translate3d(0px, 24px, 0px); top: 0px; left: 0px; will-change: transform;">
                                                                <a class="dropdown-item waves-light waves-effect" href="{{route('download-attachment',$file->filename)}}"><i class="ti-download text-success mr-2"></i> Download</a>
                                                                <div class="dropdown-divider"></div>
                                                                <a class="dropdown-item waves-light waves-effect deleteFile"  data-toggle="modal" data-target="#deleteModal" data-directory="{{$file->filename}}" data-file="{{$file->name ?? 'File name'}}" data-unique="{{$file->id}}" href="javascript:void(0);"><i class="ti-trash mr-2 text-danger"></i> Delete</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @break
                                                    @case('jpg')
                                                    <div class="col-md-2">
                                                        <a href="button" style="cursor: pointer;"  data-toggle="tooltip" data-placement="top" title="{{$file->name ?? 'No name'}}" data-original-title="{{$file->name ?? 'No name'}}">
                                                            <img src="/assets/formats/jpg.png" height="64" width="64" alt="{{$file->name ?? 'No name'}}"><br>
                                                            {{strlen($file->name ?? 'No name') > 10 ? substr($file->name ?? 'No name',0,7).'...' : $file->name ?? 'No name'}}
                                                        </a>
                                                        <div class="dropdown-secondary dropdown float-right">
                                                            <button class="btn btn-default btn-mini dropdown-toggle waves-light b-none txt-muted" type="button" id="dropdown6" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="icofont icofont-navigation-menu"></i></button>
                                                            <div class="dropdown-menu" aria-labelledby="dropdown6" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut" x-placement="bottom-start" style="position: absolute; transform: translate3d(0px, 24px, 0px); top: 0px; left: 0px; will-change: transform;">
                                                                <a class="dropdown-item waves-light waves-effect" href="{{route('download-attachment',$file->filename)}}"><i class="ti-download text-success mr-2"></i> Download</a>
                                                                <div class="dropdown-divider"></div>
                                                                <a class="dropdown-item waves-light waves-effect deleteFile"  data-toggle="modal" data-target="#deleteModal" data-directory="{{$file->filename}}" data-file="{{$file->name ?? 'File name'}}" data-unique="{{$file->id}}" href="javascript:void(0);"><i class="ti-trash mr-2 text-danger"></i> Delete</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @break
                                                    @case('png')
                                                    <div class="col-md-2">
                                                        <a href="button" style="cursor: pointer;"  data-toggle="tooltip" data-placement="top" title="{{$file->name ?? 'No name'}}" data-original-title="{{$file->name ?? 'No name'}}">
                                                            <img src="/assets/formats/png.png" height="64" width="64" alt="{{$file->name ?? 'No name'}}"><br>
                                                            {{strlen($file->name ?? 'No name') > 10 ? substr($file->name ?? 'No name',0,7).'...' : $file->name ?? 'No name'}}
                                                        </a>
                                                        <div class="dropdown-secondary dropdown float-right">
                                                            <button class="btn btn-default btn-mini dropdown-toggle waves-light b-none txt-muted" type="button" id="dropdown6" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="icofont icofont-navigation-menu"></i></button>
                                                            <div class="dropdown-menu" aria-labelledby="dropdown6" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut" x-placement="bottom-start" style="position: absolute; transform: translate3d(0px, 24px, 0px); top: 0px; left: 0px; will-change: transform;">
                                                                <a class="dropdown-item waves-light waves-effect" href="{{route('download-attachment',$file->filename)}}"><i class="ti-download text-success mr-2"></i> Download</a>
                                                                <div class="dropdown-divider"></div>
                                                                <a class="dropdown-item waves-light waves-effect deleteFile"  data-toggle="modal" data-target="#deleteModal" data-directory="{{$file->filename}}" data-file="{{$file->name ?? 'File name'}}" data-unique="{{$file->id}}" href="javascript:void(0);"><i class="ti-trash mr-2 text-danger"></i> Delete</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @break
                                                    @case('gif')
                                                    <div class="col-md-2">
                                                        <a href="button" style="cursor: pointer;" data-toggle="tooltip" data-placement="top" title="{{$file->name ?? 'No name'}}" data-original-title="{{$file->name ?? 'No name'}}">
                                                            <img src="/assets/formats/gif.png" height="64" width="64" alt="{{$file->name ?? 'No name'}}"><br>
                                                            {{strlen($file->name ?? 'No name') > 10 ? substr($file->name ?? 'No name',0,7).'...' : $file->name ?? 'No name'}}
                                                        </a>
                                                        <div class="dropdown-secondary dropdown float-right">
                                                            <button class="btn btn-default btn-mini dropdown-toggle waves-light b-none txt-muted" type="button" id="dropdown6" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="icofont icofont-navigation-menu"></i></button>
                                                            <div class="dropdown-menu" aria-labelledby="dropdown6" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut" x-placement="bottom-start" style="position: absolute; transform: translate3d(0px, 24px, 0px); top: 0px; left: 0px; will-change: transform;">
                                                                <a class="dropdown-item waves-light waves-effect" href="{{route('download-attachment',$file->filename)}}"><i class="ti-download text-success mr-2"></i> Download</a>
                                                                <div class="dropdown-divider"></div>
                                                                <a class="dropdown-item waves-light waves-effect deleteFile"  data-toggle="modal" data-target="#deleteModal" data-directory="{{$file->filename}}" data-file="{{$file->name ?? 'File name'}}" data-unique="{{$file->id}}" href="javascript:void(0);"><i class="ti-trash mr-2 text-danger"></i> Delete</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @break
                                                    @case('ppt')
                                                    <div class="col-md-2">
                                                        <a href="button" style="cursor: pointer;" data-toggle="tooltip" data-placement="top" title="{{$file->name ?? 'No name'}}" data-original-title="{{$file->name ?? 'No name'}}">
                                                            <img src="/assets/formats/ppt.png" height="64" width="64" alt="{{$file->name ?? 'No name'}}"><br>
                                                            {{strlen($file->name ?? 'No name') > 10 ? substr($file->name ?? 'No name',0,7).'...' : $file->name ?? 'No name'}}
                                                        </a>
                                                        <div class="dropdown-secondary dropdown float-right">
                                                            <button class="btn btn-default btn-mini dropdown-toggle waves-light b-none txt-muted" type="button" id="dropdown6" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="icofont icofont-navigation-menu"></i></button>
                                                            <div class="dropdown-menu" aria-labelledby="dropdown6" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut" x-placement="bottom-start" style="position: absolute; transform: translate3d(0px, 24px, 0px); top: 0px; left: 0px; will-change: transform;">
                                                                <a class="dropdown-item waves-light waves-effect" href="{{route('download-attachment',$file->filename)}}"><i class="ti-download text-success mr-2"></i> Download</a>
                                                                <div class="dropdown-divider"></div>
                                                                <a class="dropdown-item waves-light waves-effect deleteFile"  data-toggle="modal" data-target="#deleteModal" data-directory="{{$file->filename}}" data-file="{{$file->name ?? 'File name'}}" data-unique="{{$file->id}}" href="javascript:void(0);"><i class="ti-trash mr-2 text-danger"></i> Delete</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @break
                                                    @case('txt')
                                                    <div class="col-md-2">
                                                        <a href="button" style="cursor: pointer;" data-toggle="tooltip" data-placement="top" title="{{$file->name ?? 'No name'}}" data-original-title="{{$file->name ?? 'No name'}}">
                                                            <img src="/assets/formats/txt.png" height="64" width="64" alt="{{$file->name ?? 'No name'}}"><br>
                                                            {{strlen($file->name ?? 'No name') > 10 ? substr($file->name ?? 'No name',0,7).'...' : $file->name ?? 'No name'}}
                                                        </a>
                                                        <div class="dropdown-secondary dropdown float-right">
                                                            <button class="btn btn-default btn-mini dropdown-toggle waves-light b-none txt-muted" type="button" id="dropdown6" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="icofont icofont-navigation-menu"></i></button>
                                                            <div class="dropdown-menu" aria-labelledby="dropdown6" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut" x-placement="bottom-start" style="position: absolute; transform: translate3d(0px, 24px, 0px); top: 0px; left: 0px; will-change: transform;">
                                                                <a class="dropdown-item waves-light waves-effect" href="{{route('download-attachment',$file->filename)}}"><i class="ti-download text-success mr-2"></i> Download</a>
                                                                <div class="dropdown-divider"></div>
                                                                <a class="dropdown-item waves-light waves-effect deleteFile"  data-toggle="modal" data-target="#deleteModal" data-directory="{{$file->filename}}" data-file="{{$file->name ?? 'File name'}}" data-unique="{{$file->id}}" href="javascript:void(0);"><i class="ti-trash mr-2 text-danger"></i> Delete</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @break
                                                    @case('css')
                                                    <div class="col-md-2">
                                                        <a href="button" style="cursor: pointer;" data-toggle="tooltip" data-placement="top" title="{{$file->name ?? 'No name'}}" data-original-title="{{$file->name ?? 'No name'}}">
                                                            <img src="/assets/formats/css.png" height="64" width="64" alt="{{$file->name ?? 'No name'}}"> <br>
                                                            {{strlen($file->name ?? 'No name') > 10 ? substr($file->name ?? 'No name',0,7).'...' : $file->name ?? 'No name'}}
                                                        </a>
                                                        <div class="dropdown-secondary dropdown float-right">
                                                            <button class="btn btn-default btn-mini dropdown-toggle waves-light b-none txt-muted" type="button" id="dropdown6" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="icofont icofont-navigation-menu"></i></button>
                                                            <div class="dropdown-menu" aria-labelledby="dropdown6" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut" x-placement="bottom-start" style="position: absolute; transform: translate3d(0px, 24px, 0px); top: 0px; left: 0px; will-change: transform;">
                                                                <a class="dropdown-item waves-light waves-effect" href="{{route('download-attachment',$file->filename)}}"><i class="ti-download text-success mr-2"></i> Download</a>
                                                                <div class="dropdown-divider"></div>
                                                                <a class="dropdown-item waves-light waves-effect deleteFile"  data-toggle="modal" data-target="#deleteModal" data-directory="{{$file->filename}}" data-file="{{$file->name ?? 'File name'}}" data-unique="{{$file->id}}" href="javascript:void(0);"><i class="ti-trash mr-2 text-danger"></i> Delete</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @break
                                                    @case('mp3')
                                                    <div class="col-md-2">
                                                        <a href="button" style="cursor: pointer;" data-toggle="tooltip" data-placement="top" title="{{$file->name ?? 'No name'}}" data-original-title="{{$file->name ?? 'No name'}}">
                                                            <img src="/assets/formats/mp3.png" height="64" width="64" alt=""><br>
                                                            {{strlen($file->name ?? 'No name') > 10 ? substr($file->name ?? 'No name',0,7).'...' : $file->name ?? 'No name'}}
                                                        </a>
                                                        <div class="dropdown-secondary dropdown float-right">
                                                            <button class="btn btn-default btn-mini dropdown-toggle waves-light b-none txt-muted" type="button" id="dropdown6" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="icofont icofont-navigation-menu"></i></button>
                                                            <div class="dropdown-menu" aria-labelledby="dropdown6" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut" x-placement="bottom-start" style="position: absolute; transform: translate3d(0px, 24px, 0px); top: 0px; left: 0px; will-change: transform;">
                                                                <a class="dropdown-item waves-light waves-effect" href="{{route('download-attachment',$file->filename)}}"><i class="ti-download text-success mr-2"></i> Download</a>
                                                                <div class="dropdown-divider"></div>
                                                                <a class="dropdown-item waves-light waves-effect deleteFile"  data-toggle="modal" data-target="#deleteModal" data-directory="{{$file->filename}}" data-file="{{$file->name ?? 'File name'}}" data-unique="{{$file->id}}" href="javascript:void(0);"><i class="ti-trash mr-2 text-danger"></i> Delete</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @break
                                                    @case('mp4')
                                                    <div class="col-md-2">
                                                        <a href="button" style="cursor: pointer;" data-toggle="tooltip" data-placement="top" title="{{$file->name ?? 'No name'}}" data-original-title="{{$file->name ?? 'No name'}}">
                                                            <img src="/assets/formats/mp4.png" height="64" width="64" alt="{{$file->name ?? 'No name'}}"><br>
                                                            {{strlen($file->name ?? 'No name') > 10 ? substr($file->name ?? 'No name',0,7).'...' : $file->name ?? 'No name'}}
                                                        </a>
                                                        <div class="dropdown-secondary dropdown float-right">
                                                            <button class="btn btn-default btn-mini dropdown-toggle waves-light b-none txt-muted" type="button" id="dropdown6" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="icofont icofont-navigation-menu"></i></button>
                                                            <div class="dropdown-menu" aria-labelledby="dropdown6" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut" x-placement="bottom-start" style="position: absolute; transform: translate3d(0px, 24px, 0px); top: 0px; left: 0px; will-change: transform;">
                                                                <a class="dropdown-item waves-light waves-effect" href="{{route('download-attachment',$file->filename)}}"><i class="ti-download text-success mr-2"></i> Download</a>
                                                                <div class="dropdown-divider"></div>
                                                                <a class="dropdown-item waves-light waves-effect deleteFile"  data-toggle="modal" data-target="#deleteModal" data-directory="{{$file->filename}}" data-file="{{$file->name ?? 'File name'}}" data-unique="{{$file->id}}" href="javascript:void(0);"><i class="ti-trash mr-2 text-danger"></i> Delete</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @break
                                                    @case('svg')
                                                    <div class="col-md-2">
                                                        <a href="button" style="cursor: pointer;" data-toggle="tooltip" data-placement="top" title="{{$file->name ?? 'No name'}}" data-original-title="{{$file->name ?? 'No name'}}">
                                                            <img src="/assets/formats/svg.png" height="64" width="64" alt="{{$file->name ?? 'No name'}}"><br>
                                                            {{strlen($file->name ?? 'No name') > 10 ? substr($file->name ?? 'No name',0,7).'...' : $file->name ?? 'No name'}}
                                                        </a>
                                                        <div class="dropdown-secondary dropdown float-right">
                                                            <button class="btn btn-default btn-mini dropdown-toggle waves-light b-none txt-muted" type="button" id="dropdown6" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="icofont icofont-navigation-menu"></i></button>
                                                            <div class="dropdown-menu" aria-labelledby="dropdown6" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut" x-placement="bottom-start" style="position: absolute; transform: translate3d(0px, 24px, 0px); top: 0px; left: 0px; will-change: transform;">
                                                                <a class="dropdown-item waves-light waves-effect" href="{{route('download-attachment',$file->filename)}}"><i class="ti-download text-success mr-2"></i> Download</a>
                                                                <div class="dropdown-divider"></div>
                                                                <a class="dropdown-item waves-light waves-effect deleteFile"  data-toggle="modal" data-target="#deleteModal" data-directory="{{$file->filename}}" data-file="{{$file->name ?? 'File name'}}" data-unique="{{$file->id}}" href="javascript:void(0);"><i class="ti-trash mr-2 text-danger"></i> Delete</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @break
                                                    @case('xml')
                                                    <div class="col-md-2">
                                                        <a href="button" style="cursor: pointer;" data-toggle="tooltip" data-placement="top" title="{{$file->name ?? 'No name'}}" data-original-title="{{$file->name ?? 'No name'}}">
                                                            <img src="/assets/formats/xml.png" height="64" width="64" alt="{{$file->name ?? 'No name'}}"><br>
                                                            {{strlen($file->name ?? 'No name') > 10 ? substr($file->name ?? 'No name',0,7).'...' : $file->name ?? 'No name'}}
                                                        </a>
                                                        <div class="dropdown-secondary dropdown float-right">
                                                            <button class="btn btn-default btn-mini dropdown-toggle waves-light b-none txt-muted" type="button" id="dropdown6" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="icofont icofont-navigation-menu"></i></button>
                                                            <div class="dropdown-menu" aria-labelledby="dropdown6" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut" x-placement="bottom-start" style="position: absolute; transform: translate3d(0px, 24px, 0px); top: 0px; left: 0px; will-change: transform;">
                                                                <a class="dropdown-item waves-light waves-effect" href="{{route('download-attachment',$file->filename)}}"><i class="ti-download text-success mr-2"></i> Download</a>
                                                                <div class="dropdown-divider"></div>
                                                                <a class="dropdown-item waves-light waves-effect deleteFile"  data-toggle="modal" data-target="#deleteModal" data-directory="{{$file->filename}}" data-file="{{$file->name ?? 'File name'}}" data-unique="{{$file->id}}" href="javascript:void(0);"><i class="ti-trash mr-2 text-danger"></i> Delete</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @break
                                                    @case('zip')
                                                    <div class="col-md-2">
                                                        <a href="button" style="cursor: pointer;" data-toggle="tooltip" data-placement="top" title="{{$file->name ?? 'No name'}}" data-original-title="{{$file->name ?? 'No name'}}">
                                                            <img src="/assets/formats/zip.png" height="64" width="64" alt="{{$file->name ?? 'No name'}}"><br>
                                                            {{strlen($file->name ?? 'No name') > 10 ? substr($file->name ?? 'No name',0,7).'...' : $file->name ?? 'No name'}}
                                                        </a>
                                                        <div class="dropdown-secondary dropdown float-right">
                                                            <button class="btn btn-default btn-mini dropdown-toggle waves-light b-none txt-muted" type="button" id="dropdown6" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="icofont icofont-navigation-menu"></i></button>
                                                            <div class="dropdown-menu" aria-labelledby="dropdown6" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut" x-placement="bottom-start" style="position: absolute; transform: translate3d(0px, 24px, 0px); top: 0px; left: 0px; will-change: transform;">
                                                                <a class="dropdown-item waves-light waves-effect" href="{{route('download-attachment',$file->filename)}}"><i class="ti-download text-success mr-2"></i> Download</a>
                                                                <div class="dropdown-divider"></div>
                                                                <a class="dropdown-item waves-light waves-effect deleteFile"  data-toggle="modal" data-target="#deleteModal" data-directory="{{$file->filename}}" data-file="{{$file->name ?? 'File name'}}" data-unique="{{$file->id}}" href="javascript:void(0);"><i class="ti-trash mr-2 text-danger"></i> Delete</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @break
                                                @endswitch
                                            @endforeach
                                        @else
                                                <h4 class="text-muted text-center ">There're no files in this directory</h4>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-warning" id="exampleModalLabel">Warning</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{route('delete-file')}}" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">This action cannot be undone. Are you sure you want to delete <strong id="file"></strong>?</label>
                                </div>
                            </div>
                            <input type="hidden" name="directory" id="directory">
                            <input type="hidden" name="key" id="key">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="btn-group">
                            <button data-dismiss="modal" type="button" class="btn btn-danger btn-mini"><i class="ti-close mr-2"></i>Cancel</button>
                            <button type="submit" class="btn btn-primary btn-mini"><i class="ti-check mr-2"></i>Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade" id="deleteFolderModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-warning" id="exampleModalLabel">Warning</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{route('delete-folder')}}" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">This action cannot be undone. Are you sure you want to delete <strong id="folderpop"></strong>?</label>
                                </div>
                            </div>
                            <input type="hidden" name="folder_key" id="folder_key">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="btn-group">
                            <button data-dismiss="modal" type="button" class="btn btn-danger btn-mini"><i class="ti-close mr-2"></i>Cancel</button>
                            <button type="submit" class="btn btn-primary btn-mini"><i class="ti-check mr-2"></i>Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('extra-scripts')
    <script>
        $(document).ready(function(){
            $(document).on('click', '.deleteFile', function(e){
                e.preventDefault();
                var directory = $(this).data('directory');
                var file = $(this).data('file');
                var id = $(this).data('unique');
                $('#file').text(file);
                $('#directory').val(directory);
                $('#key').val(id);
            });

            $(document).on('click', '.deleteFolder', function(e){
                e.preventDefault();
                var folder = $(this).data('folder');
                var id = $(this).data('fid');
                $('#folderpop').text(folder);
                $('#folder_key').val(id);
            });
        });
    </script>
@endsection

