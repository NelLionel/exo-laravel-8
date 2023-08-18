<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
    <br><br><br>
<form action="{{ url('/inscription/saveinscription') }}" method="POST">
    @csrf
<div class="form-group mb-3">
    <label for="title">Nom</label>
    <input type="text" name="nom" class="form-control" id="title">
    </div><br><br>

    <label for="title">Prénom</label>
    <input type="text" name="prenom" class="form-control" id="title">
    </div><br><br>

    <label for="title">E-mail</label>
    <input type="eamil" name="email" class="form-control" id="title">
    @error('email')
    <div>{{ $message }}</div>
    @enderror
    </div><br><br>

    <div class="form-group mb-3">
    <label for="description">Mot de passe</label>
    <input type="password" name="password" class="form-control" id="description">
    </div>

    <div class="form-group mb-3">
    <label for="description">Confirmer mot de passe</label>
    <input type="password" name="password1" class="form-control" id="description">
    </div>
    <div class="form-group mb-3">
        <button type="sybmit" class="form-control" value="Enregistrer">S'inscrire</button>
    </div>
    </form>

    <a class="btn btn-info" href="{{ url('/connexion') }}">Connexion</a>
</body>
</html>