@extends('layouts.main')
@section('content')
<div class="container">
  <h3>
    All Contacts
    </h3>
    <p>{{ Auth::user()->name }}</p>
    <p>{{ Auth::user()->email }}</p>
    <a href="{{route('contact.index')}}">Add Contact Message</a>

    @if(session()->has('success'))
    <div class="alert alert-success">
      {{ session()->get('success')}}
    </div>
    @endif
    <table class="table ">
      <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Mobile</th>
        <th>Email</th>
        <th>Date</th>
        <th>Action</th>
      </tr>
      @foreach($contacts as $contact)
      <tr>
        <td>{{$contact->id}}</td>
        <td>{{$contact->name}}</td>
        <td>{{$contact->mobile}}</td>
        <td>{{$contact->email}}</td>
        <td>{{$contact->created_at}}</td>
        <td class="d-flex">
            <a class="btn btn-info" href="{{route('contact.show',$contact->id)}}">view</a>
            <a  class="btn btn-success mx-1" href="{{route('contact.edit',$contact->id)}}">edit</a>
            <form action="{{route('contact.destroy',$contact->id)}}" method="post">
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