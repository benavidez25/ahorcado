<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Practica</title>
</head>
<body>
   <div class="container mt-5 text-center align-middle">          
        <h4>Bienvenido</h4>
        <input type="text" class="form-control mt-3" placeholder="Ingrese su usuario" id="user">
        <input type="password" class="form-control mt-3"  placeholder="Ingrese su contraseña"  id="password">
        <input class="form-control btn btn-success mt-3"  onclick="login()" value="Ingresar">
        <div id="login-error" style="display:none" class="bg-secondary  text-white mb-2 mt-3 p-1"></div>
        <div class="mt-3"><a data-toggle="modal" data-target="#exampleModal">¿Aún no estás resgistrado?, Registrate</a></div>
   </div>



<!-- Modal signin -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Registro de Usuarios</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <form>
                <input type="text" class="form-control mt-3" placeholder="Ingrese su nombre" name="signin-name"  id="signin-name">  
                <input type="email" class="form-control mt-3" placeholder="Ingrese su correo"  name="signin-email"  id="signin-email">
                <input type="text" class="form-control mt-3" placeholder="Ingrese su nombre de usuario" name="signin-user"  id="signin-user">
                <input type="password" class="form-control mt-3" placeholder="Ingrese su contraseña"  name="signin-password"  id="signin-password">
                <input type="password" class="form-control mt-3" placeholder="Confirme su contraseña"  name="signin-confirm-password"  id="signin-confirm-password">
                <div style="display:none" class="bg-danger text-white my-3 p-2" id="signin-error"></div>
                <input type="submit" class="btn btn-success form-control mt-3" value="Registrarse">
          </form>
      </div>
    </div>
  </div>
</div>

    <script src="js/jquery-3.4.1.min.js"></script>
    <script src="js/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="js/main.js"></script>
</body>
</html>