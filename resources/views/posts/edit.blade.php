@extends('layouts.main')
@section('content')
<div class="container">
<h4>Create Category</h4>
  <a href="{{route('category.index')}}">All Categories</a>

<form action="{{route('category.update',$category->id) }}" method="post">
@csrf
@method('PUT')

@if(session()->has('success'))
<div class="alert alert-success">
  {{ session()->get('success')}}
</div>
@endif

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
    <input type="text" class="form-control" name="name" value="{{$category->name}}">
 </div>
  <button type="submit" class="btn btn-primary">Update</button>
</form>

</div>
@endSection