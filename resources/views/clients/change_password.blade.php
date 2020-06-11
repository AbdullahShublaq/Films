@extends('layouts.web.app')
@section('content')

    <div class="hero common-hero">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="hero-ct">
                        <h1>{{$user->first_name . ' ' . $user->last_name}}  profile</h1>
                        <ul class="breadcumb">
                            <li class="active"><a href="#">Home</a></li>
                            <li><span class="ion-ios-arrow-right"></span>Profile</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
<div class="page-single">
    <div class="container">
        <div class="row ipad-width">
            <div class="col-md-3 col-sm-12 col-xs-12">
                <div class="user-information">
                    <div style="margin: 0" class="user-img">
                        <a href="#"><img alt="" src="{{$user->avatar}}" style="width: 150px; height: 150px; border-radius: 50%"><br></a>
                    </div>
                    <div class="user-fav">
                        <p>Account Details</p>
                        <ul>
                            <li><a href="{{url('user/profile')}}">Profile</a></li>
                            <li><a href="{{url('user/favorites')}}">Favorite movies</a></li>
                            <li><a href="{{url('user/ratings')}}">Rated movies</a></li>
                            <li><a href="{{url('user/reviews')}}">Reviewed movies</a></li>
                        </ul>
                    </div>
                    <div class="user-fav">
                        <p>Others</p>
                        <ul>
                            <li class="active"><a href="{{url('user/change_password/')}}">Change password</a></li>
                            <li><a href="{{route('logout')}}">Log out</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-9 col-sm-12 col-xs-12">
                <div action="#" class="form-style-1 user-pro">
                    <form action="{{url('user/change_password/' . $user->id)}}" method="POST" class="password">
                        @csrf
                        @method('PUT')
                        <h4>Change password</h4>
                        <div class="row">
                            <div class="col-md-12 form-it">
                                <label>New Password</label>
                                <input name="password" min="6" placeholder="New Password" type="password" required>
                                @error('password')
                                <span class="invalid-feedback" style="color: red; font-size: 12px" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 form-it">
                                <label>Confirm New Password</label>
                                <input name="password_confirmation" min="6" placeholder="Confirm New Password" type="password" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-2">
                                <input class="submit" type="submit" value="change">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection