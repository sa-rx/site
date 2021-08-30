@csrf
<div class="form-group">
  <label for="title">{{__('Title')}}</label>
  <input type="text" name="title" class="form-control" @isset($article) value="{{$article->title}}" @endisset>
</div>

<div class="form-group">
  @foreach ($categories as $id => $title)
  <label for="category__{{$id}}">{{$title}}</label>
  <input id="category__{{$id}}" type="checkbox" name="categories[]" value="{{$id}}"
          @if(isset($article) && in_array($id , $articleCategorise)) checked @endif
  >
  @endforeach
</div>

<div class="form-group">
  <label for="content">{{__('Content')}}</label>
  <textarea class="form-control" name="content" id="content" rows="8" cols="80">@isset($article){{$article->content}}@endisset</textarea>
</div>

<div class="form-group">
    <button class="btn btn-success">{{$submitText}}</button>
</div>
