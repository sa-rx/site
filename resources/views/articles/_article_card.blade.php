<div class="col-md-4 pb-3">
  <div class="card">
    <h4 class="card-header"><a href="{{route('articles.show', $article->id)}}">{{$article->title}}</a></h4>
    <div class="card-body">
      {{$article->content}}
    </div>
    <div class="card-footer">
      {{__('Author')}} : {{$article->user->name}}
    </div>

  </div>

</div>
