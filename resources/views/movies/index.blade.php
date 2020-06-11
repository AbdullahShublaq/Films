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
                        <h1> movies <span> {{request()->search ? ' : " ' . request()->search . ' "' : ''}} {{request()->category ? ' : " ' . request()->category . ' "' : ''}}</span></h1>
                        <ul class="breadcumb">
                            <li class="active"><a href="/">Home</a></li>
                            <li><span class="ion-ios-arrow-right"></span> movie listing</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="page-single">
        <div class="container">
            <div class="row ipad-width">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="topbar-filter">
                        <p>Found <span>{{$films->count()}} movies</span> in total</p>
                    </div>
                    <div class="flex-wrap-movielist">
                        @foreach($films as $film)
                            <div class="movie-item-style-2 movie-item-style-1">
                                <img src="{{$film->poster}}" style="height: 260px" alt="">
                                <div class="hvr-inner">
                                    <a href="{{url('movies/'.$film->id)}}"> SHOW <i class="ion-android-arrow-dropright"></i> </a>
                                </div>
                                <div class="mv-item-infor">
                                    <h6><a href="#">{{$film->name}}</a></h6>
                                    <p class="rate"><i class="ion-android-star"></i><span>{{$film->ratings->avg('rating') ?? 0}}</span> /10</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    {{$films->appends(request()->query())->links()}}
                </div>
            </div>
        </div>
    </div>

@endsection