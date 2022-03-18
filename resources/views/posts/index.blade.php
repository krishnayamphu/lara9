@extends('layouts.main')
@section('content')
<div class="container">
  <h3>    All Categories    </h3>
    <a href="{{route('category.create')}}">Create new Category</a>

    @if(session()->has('success'))
    <div class="alert alert-success">
      {{ session()->get('success')}}
    </div>
    @endif

    <table class="table">
      <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Create Date</th>
        <th>Action</th>
      </tr>

      @foreach($categories as $category)
      <tr>
        <td>{{$category->id}}</td>
        <td>{{$category->name}}</td>
        <td>{{$category->created_at}}</td>
        <td class="d-flex">
            <a class="btn btn-info" href="{{route('category.show',$category->id)}}">view</a>
            <a  class="btn btn-success mx-1" href="{{route('category.edit',$category->id)}}">edit</a>
            <form action="{{route('category.destroy',$category->id)}}" method="post">
              @csrf
            {{method_field('DELETE')}}
              <button class="btn btn-danger" type="submit">delete</button>
            </form>
        </td>
      </tr>
    @endforeach
    </table>
</div>
@endSection