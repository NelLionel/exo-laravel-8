<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Détails articles</title>
</head>
<body>
<table class="table">
  <thead>
    <tr>
   
      <th scope="col">Titre</th>
      <th scope="col">Description</th>
      <th scope="col">Date</th>
      <th scope="col">image</th>
    </tr>
  </thead>
  <tbody>
     <tr>
     
      <td>{{ $detailsblog->titre }}</td>
      <td>{{ $detailsblog->description }}</td>
      <td>{{ $detailsblog->created_at }}</td>
      <td><img style="margin:100" src="{{ Storage::url($detailsblog->image->path) }}"></td>
    </tr>
     </tbody>
</table>
<hr>
      @forelse($detailsblog->comments as $comment)
        <span>{{ $comment->content }} | Créé le {{ $comment->created_at->format('D M Y') }}</span><br>
      @empty
      <span>Aucun commentaire pour ce poste !</span>
      @endforelse

      <hr>
      <span>Commentaire le plus recent : {{ $detailsblog->latestComment ? $detailsblog->latestComment->content : "Pas de commentaire recent" }}</span>
      <hr>
      <span>Commentaire le plus ancien : {{ $detailsblog->oldestComment ? $detailsblog->oldestComment->contant : "Pas de commentaire ancien"  }}</span>

      <hr>
      <span>Nom de l'artist de l'image : {{ $detailsblog->imageArtist ? $detailsblog->imageArtist->name : "Pas d'artiste" }}</span>
      
      <br>
      <hr>
      MES TAGS :
    
      @forelse($detailsblog->tags as $tag)
        <span>{{ $tag->name }}</span>
      @empty
      <span>Aucun tag pour ce poste !</span>
      @endforelse
      <hr>
      <form action="{{ url('/blog/addcomment/'.$detailsblog->id.'')}}" method="POST" enctype="multipart/form-data">
        @csrf

    <div class="form-group mb-3">
    <input type="text" name="commentaire" placeholder="Ajouter un commentaire" class="form-control" id="description">
    </div><br>
    <div class="form-group mb-3">
        <button type="sybmit" class="form-control" value="Enregistrer">Commenter</button>
    </div>
    </form>
</body>
</html>