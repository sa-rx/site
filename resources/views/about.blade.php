@extends('layouts.app')

@section('title',__('About me'))

@section('content')

  @include('_partials._closed_alert')

    <h2>{{trans('interface.welcome_to_my_website')}} , {{$userName}} </h2>
    <a href="clear-my-name">{{trans('interface.Clear_My_Name')}}</a>

@endsection
