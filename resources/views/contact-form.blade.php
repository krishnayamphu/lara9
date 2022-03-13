<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{csrf_token()}}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Contact</title>
</head>
<body>

<div class="container">
<form action="{{route('contact.store') }}" method="post">
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
    <label class="form-label">Fullname</label>
    <input type="text" class="form-control" name="name">
 </div>
  <div class="mb-3">
    <label class="form-label">Email address</label>
    <input type="email" class="form-control" name="email">
  </div>
  <div class="mb-3">
    <label class="form-label">Mobile</label>
    <input type="number" class="form-control" name="mobile">
  </div>
  <div class="mb-3">
    <label class="form-label">Subject</label>
    <input type="text" class="form-control" name="subject">
 </div>
 <div class="mb-3">
    <label class="form-label">Message</label>
    <textarea class="form-control" rows="3" name="message"></textarea>
 </div>
  
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>
    
</body>
</html>