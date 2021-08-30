@extends('layouts.app')

@section('title', __('Home'))

@section('content')
<div class="container">
  <a href="{{route('articles.create')}}" class="btn btn-lg btn-primary mb-4">{{__('new article')}}</a>
</div>

@forelse($articles as $article)

<div class="mb-2">
  <a href="{{route('articles.edit',$article)}}" class="btn btn-warning">{{__('Edit')}}</a>
  <form method="post" action="{{route('articles.destroy',$article)}}" style="Display: inline-block">
      @method('DELETE')
      @csrf
      <button  class="btn btn-danger">{{__('Delete')}}</button>
  </form>
  <a href="{{route('articles.show',$article)}}">{{$article->title}}</a>
</div>

@empty
    <p>{{__('you dont have any articles yet')}}</p>
@endforelse

@endsection
