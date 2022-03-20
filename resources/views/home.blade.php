@extends('layouts.main')
@section('content')
<div class="container">
  <h1>Welcome to Homepage</h1>


  <div class="row row-cols-1 row-cols-lg-4">
      @foreach($posts as $post)
      <div class="col">
          <div class="card">
              @isset($post->thumbnail_path)
                <img src="{{asset($post->thumbnail_path)}}" class="img-fluid">
              @endisset
              <div class="card-body">
                  <h4><a href="{{route('single.show',$post->id)}}">{{$post->title}}</a></h4>
              </div>
          </div>
      </div>
      @endforeach
  </div>
</div>
@endSection