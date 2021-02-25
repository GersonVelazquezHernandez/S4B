<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style>
        body{
            background-color: lightgray;
        }
        .contenido{
            position: absolute;
            right: 30%;
            top: 10%;
            background-color: white;
            border-radius: 24px 24px 24px 24px;
            padding: 2rem;
        }
    </style>
</head>
<body>
    <div class="contenido">
    <h1>Iniciar Sesión</h1>
    <form action="user" method="POST" style=" width:400px;">
        @csrf
        <div class="form-group">
          <label for="exampleInputEmail1">Correo:</label>
          <input type="email" name="user" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Escribe el correo del admin">
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Contraseña</label>
          <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Escribe la contraseña">
        </div>
        <button type="submit" class="btn btn-primary">Iniciar Sesión</button>
      </form>
    </div>
</body>
</html>