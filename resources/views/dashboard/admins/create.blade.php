@extends('layouts.dashboard.app')

@section('content')

    @push('styles')
        <link rel="stylesheet" href="{{asset('web_files/css/bootstrap-fileinput.css')}}">
    @endpush

    <section class="content">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-5 col-sm-12">
                    <h2>Add Admins
                        <small>Welcome to Films</small>
                    </h2>
                </div>
                <div class="col-lg-5 col-md-7 col-sm-12">
                    <ul class="breadcrumb float-md-right">
                        <li class="breadcrumb-item"><a href="{{ url('dashboard') }}"><i class="zmdi zmdi-home"></i>
                                Films</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Admins</a></li>
                        <li class="breadcrumb-item active">Add</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-md-12">
                    <div class="card">
                        <div class="header">
                            <h2><strong>Add</strong> Admins</h2>
                        </div>

                        <div class="body">
                            <form action="{{route('dashboard.admins.store')}}" method="POST"
                                  enctype="multipart/form-data">
                                @csrf

                                <div class="header col-lg-12 col-md-12 col-sm-12">
                                    <h2>Main Information</h2>
                                </div>

                                <div class="row clearfix">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <input type="text" name="name" class="form-control"
                                                   placeholder="Name" value="{{ old('name', '') }}">
                                            <span style="color: red; margin-left: 10px">{{ $errors->first('name') }}</span>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <input type="email" name="email" class="form-control"
                                                   placeholder="Email" value="{{ old('email', '') }}">
                                            <span style="color: red;margin-left: 10px">{{ $errors->first('email') }}</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group last">
                                    <div class="fileinput fileinput-new" data-provides="fileinput">
                                        <div class="fileinput-new thumbnail"
                                             style="width: 200px; height: 150px;">
                                            <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image"
                                                 alt=""/>
                                        </div>
                                        <div class="fileinput-preview fileinput-exists thumbnail"
                                             style="max-width: 200px; max-height: 150px;">
                                        </div>
                                        <div>
                                                <span class="btn btn-dark btn-file">
                                                    <span class="fileinput-new"> Select Admin Avatar </span>
                                                    <span class="fileinput-exists"> Change </span>
                                                    <input type="file" name="avatar"
                                                           value="{{ old('avatar', '') }}">
                                                </span>
                                            <a href="" class="btn btn-danger fileinput-exists"
                                               data-dismiss="fileinput">
                                                Remove </a>
                                        </div>
                                        <span style="color: red; margin-left: 10px">{{ $errors->first('avatar') }}</span>
                                    </div>
                                </div>

                                <hr>
                                <div class="header col-lg-12 col-md-12 col-sm-12">
                                    <h2>Login Information</h2>
                                </div>

                                <div class="row clearfix">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <input type="password" name="password" class="form-control"
                                                   placeholder="Password">
                                            <span style="color: red; margin-left: 10px">{{ $errors->first('password') }}</span>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <input type="password" name="password_confirmation" class="form-control"
                                                   placeholder="Password Confirmation">
                                        </div>
                                    </div>
                                </div>

                                <hr>
                                <div class="header col-lg-12 col-md-12 col-sm-12">
                                    <h2>Permission Information</h2>
                                </div>

                                @php
                                    $models = ['admins', 'clients', 'categories', 'films', 'actors'];
                                    $models2 = ['ratings', 'reviews', 'messages'];
                                    $cruds = ['create', 'read', 'update', 'delete'];
                                    $cruds2 = ['read', 'delete'];
                                @endphp

                                <div class="row clearfix">
                                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                                        @foreach($models as $index=>$model)
                                            <li class="nav-item">
                                                <a class="nav-link {{$index==0 ? 'active' : ''}}" data-toggle="tab"
                                                   href="#{{$model}}"
                                                   role="tab" aria-controls="home" aria-selected="true">{{$model}}</a>
                                            </li>
                                        @endforeach
                                        @foreach($models2 as $index=>$model2)
                                            <li class="nav-item">
                                                <a class="nav-link" data-toggle="tab"
                                                   href="#{{$model2}}"
                                                   role="tab" aria-controls="home" aria-selected="true">{{$model2}}</a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                                <div class="row clearfix" style="margin-left: 10px">
                                    <div class="tab-content">
                                        @foreach($models as $index=>$model)
                                            <div class="tab-pane fade show {{ $index==0 ? 'active' : '' }}"
                                                 id="{{ $model }}">
                                                <div class="checkbox">
                                                    @foreach($cruds as $crud)
                                                        <input id="{{$crud . '_' . $model }}" type="checkbox"
                                                               name="permissions[]" value="{{$crud . '_' . $model }}">
                                                        <label style="margin-left: 10px"
                                                               for="{{$crud . '_' . $model }}">
                                                            {{$crud}}
                                                        </label>
                                                    @endforeach
                                                </div>
                                            </div>
                                        @endforeach
                                            @foreach($models2 as $index=>$model2)
                                                <div class="tab-pane fade show"
                                                     id="{{ $model2 }}">
                                                    <div class="checkbox">
                                                        @foreach($cruds2 as $crud2)
                                                            <input id="{{$crud2 . '_' . $model2 }}" type="checkbox"
                                                                   name="permissions[]" value="{{$crud2 . '_' . $model2 }}">
                                                            <label style="margin-left: 10px"
                                                                   for="{{$crud2 . '_' . $model2 }}">
                                                                {{$crud2}}
                                                            </label>
                                                        @endforeach
                                                    </div>
                                                </div>
                                            @endforeach
                                    </div>
                                </div>

                                <br>
                                <br>

                                <div class="row clearfix">
                                    <div class="col-sm-12">
                                        <button type="submit" class="btn btn-primary btn-round">Add</button>
                                        <button type="reset" class="btn btn-default btn-round btn-simple">Cancel
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @push('scripts')
        <script src="{{asset('web_files/js/bootstrap-fileinput.js')}}"></script>
    @endpush

@endsection