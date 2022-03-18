@extends('layouts.main')
@section('content')
<div class="container">
  <h3> All Posts </h3>
  <a href="{{route('posts.create')}}">Create new Post</a>

  @if(session()->has('success'))
  <div class="alert alert-success">
    {{ session()->get('success')}}
  </div>
  @endif

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
        <span>{{$category->name}}</span>
        @endforeach
      </td>
      <td></td>
      <td>{{$post->created_at}}</td>
      <td class="d-flex">
        <a class="btn btn-info" href="{{route('posts.show',$post->id)}}">view</a>
        <a class="btn btn-success mx-1" href="{{route('posts.edit',$post->id)}}">edit</a>
        <form action="{{route('posts.destroy',$post->id)}}" method="post">
          @csrf
          @method('DELETE')
          <button class="btn btn-danger" type="submit">delete</button>
        </form>
      </td>
    </tr>
    @endforeach
  </table>
</div>
@endSection