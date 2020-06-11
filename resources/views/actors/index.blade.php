@extends('layouts.web.app')
@section('content')
    @push('style')
        <style rel="stylesheet">
            li.active{
                color: yellow;
            }
        </style>
    @endpush

    <div class="hero common-hero">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="hero-ct">
                        <h1>actor <span> {{request()->search ? ' : " ' . request()->search . ' "' : ''}}</span></h1>
                        <ul class="breadcumb">
                            <li class="active"><a href="/">Home</a></li>
                            <li> <span class="ion-ios-arrow-right"></span> actor listing</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- celebrity grid v1 section-->
    <div class="page-single">
        <div class="container">
            <div class="row ipad-width2">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="topbar-filter">
                        <p>Found <span>{{$actors->count()}} actors</span> in total</p>
                    </div>
                    <div class="celebrity-items">
                        @foreach($actors as $actor)
                            <div class="ceb-item">
                                <a href="{{url('actors/' . $actor->name)}}"><img src="{{$actor->avatar}}" style="height: 250px;" alt=""></a>
                                <div class="ceb-infor">
                                    <h2><a href="{{url('actors/' . $actor->name)}}">{{$actor->name}}</a></h2>
                                    <span>actor</span>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    {{$actors->appends(request()->query())->links()}}
                </div>
            </div>
        </div>
    </div>
    <!--end of celebrity grid v1 section-->

@endsection