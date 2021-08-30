@extends('layouts.app')

@section('title',__('Home page'))

@section('content')


<h3 class="text-primary">{{__('Lates articles')}}</h3>
  <div class="row">
    @forelse($articles as $article)

    @include('articles._article_card')

    @empty
      {{__('No articles yet')}}
    @endforelse
  </div>
      <a href="{{route('articles.index')}}" class="btn btn-link">      {{__('Browse all articles')}}</a>
@endsection
