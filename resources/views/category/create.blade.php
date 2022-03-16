@extends('layouts.main')
@section('content')
<div class="container">
<h4>Create Category</h4>
  <a href="{{route('category.index')}}">All Categories</a>

<form action="{{route('category.store') }}" method="post">
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
    <label class="form-label">Name</label>
    <input type="text" class="form-control" name="name">
 </div>
  <button type="submit" class="btn btn-primary">Create</button>
</form>

</div>
@endSection