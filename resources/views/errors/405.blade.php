@extends('errors::illustrated-layout')

@section('code', '405')
@section('title', 'Method Not Allowed')

@section('image')
    <div style="background-image: url({{ asset('/svg/404.svg') }});" class="absolute pin bg-cover bg-no-repeat md:bg-left lg:bg-center">
    </div>
@endsection

@section('message', 'Method Not Allowed')
