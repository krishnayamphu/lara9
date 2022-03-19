@extends('layouts.main')
@section('content')
<div class="container">
  <h3> All Posts </h3>
  <a href="{{route('posts.create')}}">Create new Post</a>
  @include('flash_message.success')
  <table class="table">
    <tr>
      <th>ID</th>
      <th>Title</th>
      <th>Category</th>
      <th>Thumbnail</th>
      <th>Create Date</th>
      <th>Action</th>
    </tr>

    @foreach($posts as $post)
    <tr>
      <td>{{$post->id}}</td>
      <td>{{$post->title}}</td>
      <td>
        @foreach($post->categories as $category)
        <span>{{$category->name}}</span>,
        @endforeach
      </td>
      <td>
        @isset($post->thumbnail_path)
        <img src="{{asset($post->thumbnail_path)}}" class="img-thumbnail" width="100px">
        @endisset
      </td>
      <td>{{$post->created_at}}</td>
      <td>
        <div class="d-flex">
          <a class="btn btn-info" href="{{route('posts.show',$post->id)}}">view</a>
          <a class="btn btn-success mx-1" href="{{route('posts.edit',$post->id)}}">edit</a>
          <form action="{{route('posts.destroy',$post->id)}}" method="post">
            @csrf
            @method('DELETE')
            <button class="btn btn-danger" type="submit">delete</button>
          </form>
        </div>
      </td>
    </tr>
    @endforeach
  </table>
</div>
@endSection