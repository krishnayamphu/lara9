<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{csrf_token()}}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Contact Details</title>
</head>
<body>

<div class="container">
  <h3>
    Contact Details
    </h3>
    <a href="{{route('contact.all')}}">All Contact Messages</a>

    <div class="card mt-5">
      <div class="card-body">
        <h4>{{$contact->name}}</h4>
        <h6 class="text-muted">{{$contact->mobile}}, {{$contact->email}}</h6>

        <p>{{$contact->subject}}</p>
        <p>{{$contact->message}}</p>
      </div>
    </div>
    
</div>
    
</body>
</html>