@extends('layouts.main')
@section('content')
<div class="container">
<h4>Category Details</h4>
  <a href="{{route('category.index')}}">All Categories</a>

  <div class="card">
    <div class="card-body">
        <h3>Category Name: {{$category->name}}</h3>
    <p>Create Date: {{$category->careated_at}} </p>
    <p>Update Date: {{$category->updated_at}} </p>
    </div>

</div>



</div>
@endSection