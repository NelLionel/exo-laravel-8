<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Liste des blogs</title>
</head>
<body>
    @if($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{$message}}</p>
    </div>
    @endif

    @if($message = Session::get('fail'))
    <div class="alert alert-danger">
        <p>{{$message}}</p>
    </div>
    @endif
<table class="table">
  <thead>
    <tr>
   
      <th scope="col">Titre</th>
      <th scope="col">Description</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    @foreach($article as $articles)
    <tr>
     
      <td>{{$articles->titre}}</td>
      <td>{{$articles->description}}</td>
      <td>

      <form action="{{ url('/blog/'.$articles->id.'')}}" id="delete-form" method="POST">
        @csrf
        @method("delete")
        <a  class="btn btn-info" href="{{ url('/detailsblog/'.$articles->id.'')}}">Voir</a>
        <a  class="btn btn-primary" href="{{ url('/blog/'.$articles->id.'/update')}}">Modifier</a>
        <button type="submit" onclick="confirmDelete(event)" class="btn btn-danger">Supprimer</button>
   
    </form>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
<div> {{ $article->links() }}</div>


<a  class="btn btn-info" href="{{ url('blog/store')}}">Ajouter un article</a>
<script>
        function confirmDelete(event){
            event.preventDefault();
            if(confirm("Etes-vous sûr de vouloir supprimer cet article ?")){
                document.getElementById('delete-form').submit();
            }
        }
    </script>
</body>
</html>