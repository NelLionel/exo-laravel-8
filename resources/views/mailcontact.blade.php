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
<form action="" method="POST">
    @csrf
<div class="form-group mb-3">
    <label for="title">Nom</label>
    <input type="text" name="nom" class="form-control" id="title">
    </div><br><br>

    <label for="title">Prenom</label>
    <input type="text" name="prenom" class="form-control" id="title">
    </div><br><br>

    <label for="title">E-mail</label>
    <input type="text" name="email" class="form-control" id="title">
    </div><br><br>

    <div>
    <label for="title">Message</label>
    <textarea name="" id="" cols="30" rows="10"></textarea>
    </div><br><br>

    <div class="form-group mb-3">
        <button type="sybmit" class="form-control" value="Enregistrer">Envoyer</button>
    </div>
    </form>
</body>
</html>