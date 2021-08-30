@extends('layouts.app')

@section('title',__('Contact'))

@section('content')

@include('_partials._closed_alert')

@if($errors->any())
<ul>
    @foreach($errors->all() as $error)
    <li>{{$error}}</li>
    @endforeach
</ul>
@endif


<p>today: {{date('Y-m-d | H:m')}}</p>

<h3>{{$message}}</h3>


@auth
<p>wellcome {{$user->name}}</p>
@else
<p>welcome</p>
@endauth


@if(date('D') != 'Tue')
<h6>{!! $info !!}</h6>
@else
<h6>im ready to get your message</h6>
@endif

<form class="" action="" method="post">
  @csrf
  <div class="form-group">
    <input class="form-control" type="text" name="sender_name" value="" placeholder="your name">
  </div>

  <div class="form-group">
    <select class="form-control" name="option" id="option">
      @forelse($options as $key=> $option)
      <option value="{{$key}}">{{$option}}</option>
      @empty
      <option value="null">not select</option>
      @endforelse

    </select>
  </div>

  <div class="form-group">
    <textarea class="form-control" name="message" rows="10" cols="30" placeholder="your message" ></textarea>
  </div>
  <div class="form-group">
    <button class="btn btn-primary btn-block" type="submit" name="button">send</button>
  </div>

</form>



@endsection
