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

  Bienvenu Monsieur/Mm {{$user->nom}}

  <br><br><br>
    <a class="btn btn-info" href="{{ url('/deconnexion') }}">Déconnecter</a>
    <a class="btn btn-info" href="{{ url('/inscription') }}">Inscription</a>
</body>
</html>