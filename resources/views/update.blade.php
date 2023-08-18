<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="{{ url('/blog/'.$detailsdonnes->id.'')}}" method="POST">
        @method("patch")
        @csrf
    <div class="form-group mb-3">
    <label for="title">Titre</label>
    <input type="text" value="{{$detailsdonnes->titre}}" name="titre" class="form-control" id="title">
    </div>

    <div class="form-group mb-3">
    <label for="description">Description</label>
    <input type="text" value="{{$detailsdonnes->description}}" name="description" class="form-control" id="description">
    </div>
    <div class="form-group mb-3">
        <button type="sybmit" class="form-control" value="Enregistrer">Enregistrer</button>
    </div>
    </form>
</body>
</html>