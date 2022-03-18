@extends('layouts.main')
@section('content')
<div class="container">
    <h4>Create Post</h4>
    <a href="{{route('posts.index')}}">All Posts</a>

    <form action="{{route('posts.store') }}" method="post" enctype="multipart/form-data">
        @csrf

        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <div class="mb-3">
            <label class="form-label">Title</label>
            <input type="text" class="form-control" name="title" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Content</label>
            <textarea class="form-control" rows="3" name="text"></textarea>
        </div>
        <div class="mb-3">
            <label class="form-label">Category</label>
            <select class="form-select" name="category_id">
                <option selected>Select Category</option>
                @foreach($categories as $category)
                <option value="{{$category->id}}">{{$category->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="input-group mb-3">
            <input type="file" class="form-control" name="pic">
        </div>
        <button type="submit" class="btn btn-primary">Create</button>
    </form>

</div>
@endSection