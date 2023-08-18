<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <br><br><br>
<form action="{{ url('/blog/contact')}}" method="POST">
    @csrf
<div class="form-group mb-3">
    <label for="title">E-mail</label>
    <input type="text" name="email" class="form-control" id="title">
    </div><br>

    <div class="form-group mb-3">
    <label for="description">Message</label>
    <input type="text" name="message" class="form-control" id="description">
    </div>
    <div class="form-group mb-3">
        <button type="sybmit" class="form-control" value="Enregistrer">Enregistrer</button>
    </div>
    </form>

    <a class="btn btn-info" href="{{ url ('/lescontacts')}}">Liste des contacts</a>
</body>
</html>