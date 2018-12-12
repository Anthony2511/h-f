@extends('layout')

@section('header')
    @include('partials.header-home')
@endsection

@section('class', 'home')

@section('content')
    @include('partials.home.athletes-home')
    @include('partials.home.competitions-home')
    @include('partials.home.trainee-home')
    @include('partials.home.news-home')
@endsection