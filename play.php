
<?php   
session_start();

if (isset($_SESSION['usuario'])) {
    $userName = $_SESSION['usuario']['USER_NAME'];
    
$gameID =  $_SESSION['game']['GAME_ID'];
}else{
    header('Location: index.php');
}

include_once("class/class-conexion.php");
$conexion = new Conexion();

$conexion->cerrarConexion();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="css/play.css">
    <!-- <link rel="stylesheet" href="sweetAlert/sweetalert.css"> -->
    <link rel="stylesheet" href="css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Play Hangman</title>
</head>
<body>
    <h2 class="container mt-5 text-center align-middle">El ahorcado</h2>
    <h5 class="p-2">Bienvenido <?php echo $userName ?> </h5>
    <div><h6 class="p-2">Intentos: <span id="attempts">0/5</span></h6></div>
    <div class="container mt-5">
        <div class="row">
            <div class="col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                <h4>Seleccione las letras</h4>
                <div id="alphabet" class="row">

                </div>
            </div>
            <div class="col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6 pl-5">
                <h4>Progreso del juego</h4>
                <div id="hide-word" class="row pl-2">
                   
                </div>
            </div>
        </div>
    </div>

    <div class="container mt-5">
        <h4>Ayuda de otros usuarios</h4>
        <div id="help">

        </div>
    </div>

    <script src="js/play.js"></script>
    <script src="sweetAlert/sweetalert.min.js"></script>
    <script src="js/jquery-3.4.1.min.js"></script>
    <script src="js/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>