@extends('layouts.main')
@section('content')
<div class="container">
    <h4>Create Post</h4>
    <a href="{{route('posts.index')}}">All Posts</a>

    <form action="{{route('posts.store') }}" method="post" enctype="multipart/form-data">
        @csrf

        @include('flash_message.error')
        <div class="mb-3">
            <input type="text" class="form-control" name="title" placeholder="Title" required>
        </div>
        <div class="mb-3">
            <textarea class="form-control" rows="3" name="text" placeholder="Content"></textarea>
        </div>
        <div class="input-group mb-3">
            <input type="file" class="form-control" name="pic">
        </div>
        <div class="mb-3">
            <label class="form-label">Category</label>
            @foreach($categories as $category)
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="{{$category->id}}" id="flexCheckDefault" name="categories[]">
                <label class="form-check-label" for="flexCheckDefault">
                   {{$category->name}}
                </label>
            </div>
            @endforeach
        </div>
        <button type="submit" class="btn btn-primary">Create</button>
    </form>

</div>
@endSection