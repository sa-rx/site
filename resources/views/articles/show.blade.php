@extends('layouts.app')

@section('title',$article->title)

@section('content')

  <div class="card">
    <h4 class="card-header">{{$article->title}}</h4>
    <div class="card-body">
      {!!nl2br($article->content)!!}
    </div>
    <div class="card-footer">
      <span><b>{{__('Author')}} :</b> {{$article->user->name}}</span>
      <span><b>{{__('Created at')}} :</b> {{$article->created_at}}</span>
      <span><b>{{__('Updated at')}} :</b> {{$article->updated_at}}</span>
    </div>
    </div>

<h3 class="mt-2">{{__('Commenets')}}</h3>
<div id="comments" class="mt-3">
    @forelse($article->comments as $comment)
        <div class="card p-3 mt-1">
            {{$comment->content}}
            <span>{{__('Author')}} | {{$comment->user->name}}</span>
        </div>
    @empty
  {{__('no comments yet')}}
    @endforelse
</div>

@auth
  <div id="commentForm" class="mt-5">
    <div class="card">
      <h4 class="card-header">{{__('tybe your comment here')}}</h4>
      <div class="card-body">
        <form class="" action="{{route('comments.store',$article->id)}}" method="post">
          @csrf
          <div class="form-group">
            <label for="contact">{{__('Content')}}</label>
            <textarea class="form-control" placeholder="{{__('tybe your comment here')}}" name="content" id="content" rows="8" cols="80"></textarea>
          </div>
          <div class="form-group">
              <button type="submit" class="btn btn-success">{{__('Save')}}</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  @else
    <p>{{__('Login to comment')}}</p>
  @endauth
@endsection
