@extends('layouts.app')

@section('title',__('Edit article'))

@section('content')

<h2>{{__('Edit article')}} : {{$article->title}}</h2>

<form  action="{{route('articles.update', $article)}}" method="post">
  @method('PATCH')
  @include('articles._form',['submitText'=>__('Edit')])
</form>

@endsection
