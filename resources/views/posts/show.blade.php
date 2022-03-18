@extends('layouts.main')
@section('content')
<div class="container">
  <h4>Post Details</h4>
  <a href="{{route('category.index')}}">All Posts</a>
  <div class="card">
    <div class="card-body">
      <h3>{{$post->title}}</h3>
      <p>Create Date: {{$post->careated_at}} </p>
      <p>Update Date: {{$post->updated_at}} </p>
    </div>
  </div>
</div>
@endSection