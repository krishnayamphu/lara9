@extends('layouts.main')
@section('content')
<div class="container">
  <h4>Post Details</h4>
  <a href="{{route('posts.index')}}">All Posts</a>
  <div class="card">
  @isset($post->thumbnail_path)
        <img src="{{asset($post->thumbnail_path)}}" class="img-fluid">
        @endisset
    <div class="card-body">
      <h3>{{$post->title}}</h3>
      <p>Create Date: {{$post->created_at}} | Update Date: {{$post->updated_at}} </p>

      <p>{{$post->text}}</p>
    </div>
  </div>
</div>
@endSection