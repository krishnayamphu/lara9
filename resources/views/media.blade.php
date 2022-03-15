@extends('layouts.main')
@section('content')
<div class="container py-4">
  <form action="{{route('media.store') }}" enctype="multipart/form-data" method="post">
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

    @if(session()->has('success'))
    <div class="alert alert-success">
      {{ session()->get('success')}}
    </div>
    @endif


    <div class="input-group mb-3">
      <input type="file" class="form-control" name="myfile">
      <button type="submit" class="input-group-text" for="inputGroupFile02">Upload</button>
    </div>
  </form>

  <div class="row row-cols-2 row-cols-lg-6">
    @foreach($files as $file)


    <div class="col">
      <div class="card">
        <img src="{{asset( $file )}}" class="card-img-top" alt="">
        <div class="card-body">
          <a href="{{$file}}" class="btn btn-primary" target="_new">View</a>
          <!-- Button trigger modal -->
          <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#model_{{$name = pathinfo($file, PATHINFO_FILENAME)}}">
            Trash
          </button>

          <!-- Modal -->
          <div class="modal fade" id="model_{{$name = pathinfo($file, PATHINFO_FILENAME)}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Detele File</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <p>Are you sure delete this item?</p>
                  <p>id:model_{{$name = pathinfo($file, PATHINFO_FILENAME)}}</p>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                  <form action="{{ route('media.destroy')}}" method="post">
                    @csrf
                    <input type="hidden" name="pic" value="{{ $file }}">
                    <button type="submit" class="btn btn-danger">Confirmed</button>
                  </form>

                </div>
              </div>
            </div>
          </div>



        </div>
      </div>
    </div>
    @endforeach
  </div>


</div>

@endsection