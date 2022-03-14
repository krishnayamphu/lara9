<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{csrf_token()}}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Upload Media</title>
</head>
<body>

<div class="container">
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
<div class="mb-3">
    <label class="form-label">upload file</label>
    <input type="file" class="form-control" name="myfile">
 </div>  
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>
    
</body>
</html>