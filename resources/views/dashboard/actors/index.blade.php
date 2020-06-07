@extends('layouts.dashboard.app')

@section('content')

    @push('styles')
        <link rel="stylesheet" href="{{asset('dashboard_files/assets/plugins/sweetalert/sweetalert.css')}}"/>
    @endpush

    <section class="content">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-5 col-sm-12">
                    <h2>All Actors
                        <small class="text-muted">Welcome to Films</small>
                    </h2>
                </div>
                <div class="col-lg-5 col-md-7 col-sm-12">
                    @if(auth()->guard('admin')->user()->hasPermission('create_actors'))
                        <a href="{{route('dashboard.actors.create')}}">
                            <button class="btn btn-primary btn-icon btn-round d-none d-md-inline-block float-right m-l-10"
                                    type="button">
                                <i class="zmdi zmdi-plus"></i>
                            </button>
                        </a>
                    @else
                        <button class="btn btn-primary btn-icon btn-round d-none d-md-inline-block float-right m-l-10 disabled"
                                style="cursor: no-drop"
                                type="button">
                            <i class="zmdi zmdi-plus"></i>
                        </button>
                    @endif
                    <ul class="breadcrumb float-md-right">
                        <li class="breadcrumb-item"><a href="{{url('dashboard')}}"><i class="zmdi zmdi-home"></i> Films</a>
                        </li>
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Actors</a></li>
                        <li class="breadcrumb-item active">All Actors</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-md-12">
                    <div class="card patients-list">
                        <div class="header">
                            <h2><strong>Actors </strong><span>({{$actors->total()}})</span></h2>
                        </div>
                        <div class="body">

                            <div class="col-5" style="padding-left: 0px">
                                <form action="{{ route('dashboard.admins.index') }}" method="GET">
                                    <div class="input-group" style="margin-bottom: 0px">
                                        <input type="text" class="form-control" placeholder="Search..."
                                               name="search" value="{{ request()->search }}">
                                        <button class="input-group-addon" type="submit">
                                            <i class="zmdi zmdi-search"></i>
                                        </button>
                                    </div>
                                </form>
                            </div>

                            <div class="tab-content m-t-10">
                                <div class="tab-pane table-responsive active">
                                    <table class="table m-b-0 table-hover">
                                        <thead>
                                        <tr>
                                            <th>Avatar</th>
                                            <th>Name</th>
                                            <th>DateOfBirth</th>
                                            <th>Overview</th>
                                            <th>Biography</th>
                                            <th>Relations</th>
                                            <th>Actions</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @forelse($actors as $actor)
                                            <tr>
                                                <td>
                                                    <span class="list-icon">
                                                        <img src="{{$actor->avatar}}"
                                                             alt=""
                                                             style="width: 50px; height: 50px;">
                                                    </span>
                                                </td>
                                                <td><span class="list-name">{{$actor->name}}</span></td>
                                                <td>{{date('F d, Y',strtotime($actor->dob))}}</td>
                                                <td>
                                                    <button title="show overview"
                                                            value="{{$actor->overview}}"
                                                            class="btn btn-icon btn-neutral btn-icon-mini show_overview">
                                                        <i class="zmdi zmdi-reader"></i>
                                                    </button>
                                                </td>
                                                <td>
                                                    <button title="show overview"
                                                            value="{{$actor->biography}}"
                                                            class="btn btn-icon btn-neutral btn-icon-mini show_biography">
                                                        <i class="zmdi zmdi-reader"></i>
                                                    </button>
                                                </td>
                                                <td>
                                                    @if(auth()->guard('admin')->user()->hasPermission('read_films'))
                                                        <a href="{{ route('dashboard.films.index', ['actor' => $actor->name]) }}"
                                                           class="btn btn-info btn-sm">Films</a>
                                                    @else
                                                        <button class="btn btn-info btn-sm disabled" style="cursor: no-drop">Films</button>
                                                    @endif
                                                </td>
                                                <td>
                                                    @if(auth()->guard('admin')->user()->hasPermission('update_actors'))
                                                        <a href="{{route('dashboard.actors.edit', $actor)}}">
                                                            <button class="btn btn-icon btn-neutral btn-icon-mini"
                                                                    title="Edit">
                                                                <i class="zmdi zmdi-edit"></i>
                                                            </button>
                                                        </a>
                                                    @else
                                                        <button class="btn btn-icon btn-neutral btn-icon-mini disabled"
                                                                style="cursor: no-drop"
                                                                title="Edit">
                                                            <i class="zmdi zmdi-edit"></i>
                                                        </button>
                                                    @endif

                                                    @if(auth()->guard('admin')->user()->hasPermission('delete_actors'))
                                                        <form action="{{ route('dashboard.actors.destroy', $actor) }}"
                                                              method="POST" style="display: inline-block">
                                                            @csrf
                                                            @method('DELETE')

                                                            <button type="submit"
                                                                    class="btn btn-icon btn-neutral btn-icon-mini remove_actor"
                                                                    title="Delete" value="{{$actor->id}}">
                                                                <i class="zmdi zmdi-delete"></i>
                                                            </button>
                                                        </form>
                                                    @else
                                                        <button class="btn btn-icon btn-neutral btn-icon-mini remove_admin disabled"
                                                                style="cursor: no-drop"
                                                                title="Delete">
                                                            <i class="zmdi zmdi-delete"></i>
                                                        </button>
                                                    @endif
                                                </td>
                                            </tr>
                                        @empty
                                            <tr class="text-center">
                                                <td colspan="6">There Is No Data...</td>
                                            </tr>
                                        @endforelse
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{$actors->appends(request()->query())->links()}}
            </div>
        </div>
    </section>

    @push('scripts')
        <script src="{{asset('dashboard_files/assets/plugins/sweetalert/sweetalert.min.js')}}"></script>

        <script type="text/javascript">
            $(document).ready(function () {
                $(".remove_actor").click(function (e) {
                    var that = $(this);
                    e.preventDefault();

                    var id = $(this).val();
                    swal({
                        title: "Are you sure?",
                        text: "You will not be able to recover this Actor!",
                        type: "warning",
                        showCancelButton: true,
                        confirmButtonColor: "#DD6B55",
                        confirmButtonText: "Yes, delete it!",
                        closeOnConfirm: false
                    }, function () {
                        that.closest('form').submit();
                    });
                });

                $(".show_overview").click(function () {
                    var overview = $(this).val();
                    swal({
                        title: "<spna style='color: #8CD4F5'>Overview</span>",
                        text: "<textarea rows='15' class='form-control no-resize' style='background-color: white!important; cursor: auto!important;' readonly>" + overview + "</textarea>",
                        html: true
                    });
                });

                $(".show_biography").click(function () {
                    var biography = $(this).val();
                    swal({
                        title: "<spna style='color: #8CD4F5'>Biography</span>",
                        text: "<textarea rows='15' class='form-control no-resize' style='background-color: white!important; cursor: auto!important;' readonly>" + biography + "</textarea>",
                        html: true
                    });
                });
            });
        </script>
    @endpush

@endsection