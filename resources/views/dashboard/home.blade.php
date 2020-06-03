@extends('layouts.dashboard.app')

@section('content')
    <section class="content home">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-5 col-md-5 col-sm-12">
                    <h2>Dashboard
                        <small>Welcome to Films</small>
                    </h2>
                </div>
                <div class="col-lg-7 col-md-7 col-sm-12 text-right">
                    <ul class="breadcrumb float-md-right">
                        <li class="breadcrumb-item"><a href=""><i class="zmdi zmdi-home"></i> Films</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-lg-12">
                    <div class="card">
                        <ul class="row profile_state list-unstyled">
                            <li class="col-lg-3 col-md-3 col-6">
                                <div class="body">
                                    <i class="zmdi zmdi-account col-green"></i>
                                    <h4>{{$admins}}</h4>
                                    <span>Admins</span>
                                </div>
                            </li>
                            <li class="col-lg-3 col-md-3 col-6">
                                <div class="body">
                                    <i class="zmdi zmdi-account-circle col-blue"></i>
                                    <h4>{{$clients}}</h4>
                                    <span>Clients</span>
                                </div>
                            </li>
                            <li class="col-lg-3 col-md-3 col-6">
                                <div class="body">
                                    <i class="zmdi zmdi-comment-text col-red"></i>
                                    <h4>65</h4>
                                    <span>Comments</span>
                                </div>
                            </li>
                            <li class="col-lg-3 col-md-3 col-6">
                                <div class="body">
                                    <i class="zmdi zmdi-account text-success"></i>
                                    <h4>2,055</h4>
                                    <span>Profile Views</span>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            awdawd
        </div>
    </section>
@endsection