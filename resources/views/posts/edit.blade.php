@extends('layouts.main')
@section('content')
<div class="container">
  <h4>Post Details</h4>
  <a href="{{route('posts.index')}}">All Posts</a>

  <form action="{{route('posts.update',$post->id) }}" method="post" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    @include('flash_message.success')
    @include('flash_message.error')

    <div class="mb-3">
      <input type="text" class="form-control" name="title" value="{{$post->title}}" placeholder="Title" required>
    </div>
    <div class="mb-3">
      <textarea class="form-control" rows="3" name="text" placeholder="Content">{{$post->text}}</textarea>
    </div>
    <div class="row">
      <div class="col-lg-9">
        <div class="row">
          <div class="col-lg-8">
            <div class="input-group mb-3">
              <input type="text" class="form-control" name="thumb" value="{{$post->thumbnail_path}}" readonly>
            </div>
            <div class="input-group mb-3">
              <input type="file" class="form-control" name="pic">
            </div>
          </div>
          <div class="col-lg-4">
          <div class="input-group mb-3">
          @isset($post->thumbnail_path)
          <img src="{{asset($post->thumbnail_path)}}" class="img-thumbnail" style="max-height:150px">
          @endisset
        </div>
          </div>
        </div>
      </div>
      <div class="col-lg-3">
      <div class="mb-3">
      <label class="form-label">Category</label>
      @foreach($categories as $category)
      <div class="form-check">
        <input class="form-check-input" type="checkbox" value="{{$category->id}}" id="flexCheckDefault" name="categories[]" @foreach($post->categories as $cat)
        {{ $cat->id === $category->id ? 'checked' : '' }}
        @endforeach
        >
        <label class="form-check-label" for="flexCheckDefault">
          {{$category->name}}
        </label>
      </div>
      @endforeach
    </div>
      </div>
    </div>
    <button type="submit" class="btn btn-primary">Update</button>
  </form>
</div>
@endSection