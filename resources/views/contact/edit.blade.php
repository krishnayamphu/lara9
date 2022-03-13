<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{csrf_token()}}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Edit Contact</title>
</head>
<body>

<div class="container">
  <h4>Contact Details</h4>
  <a href="{{route('contact.all')}}">All Contact Messages</a>
<form action="{{route('contact.update',$contact->id) }}" method="post">
@csrf
@method('PUT')
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
    <input type="text" class="form-control" name="name" value="{{$contact->name}}">
 </div>
  <div class="mb-3">
    <label class="form-label">Email address</label>
    <input type="email" class="form-control" name="email" value="{{$contact->email}}">
  </div>
  <div class="mb-3">
    <label class="form-label">Mobile</label>
    <input type="number" class="form-control" name="mobile" value="{{$contact->mobile}}">
  </div>
  <div class="mb-3">
    <label class="form-label">Subject</label>
    <input type="text" class="form-control" name="subject" value="{{$contact->subject}}">
 </div>
 <div class="mb-3">
    <label class="form-label">Message</label>
    <textarea class="form-control" rows="3" name="message">{{$contact->message}}</textarea>
 </div>
  
  <button type="submit" class="btn btn-primary">Update</button>
</form>
</div>
    
</body>
</html>