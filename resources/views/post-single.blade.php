@extends('layouts.main')
@section('content')
<div class="container">
<div class="card">
              @isset($post->thumbnail_path)
                <img src="{{asset($post->thumbnail_path)}}" class="img-fluid">
              @endisset
              <div class="card-body">
                  <h1>{{$post->title}}</h1>

                  <p>{{$post->text}}</p>
              </div>
          </div>
</div>
@endSection