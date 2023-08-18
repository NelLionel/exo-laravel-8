<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Document</title>
</head>
<body>
    <br><br>
<table class="table">
  <thead>
    <tr>
      <th scope="col">Emails</th>
      <th scope="col">Messages</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    @foreach($contact as $listcontact=>$contacts)
    <tr>
     
      <td>{{$contacts->email}}  </td>
      <td> {{$contacts->message}} </td>
    <td>
      <form action="{{url('/lescontacts/'.$contacts->id.'')}}" method="POST">
      @csrf
      @method("delete")
        <a  class="btn btn-info" href="{{ url('/details/'.$contacts->id.'')}}">Voir</a>
        <a  class="btn btn-primary" href="{{url('/lescontacts/{idc}'.$contacts->id.'')}}">Modifier</a>
        <button type="submit" class="btn btn-danger">Supprimer</button>
   
    </form>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
<a  class="btn btn-info" href="{{ url('/contact') }}">Ajouter</a>
</body>
</html>