
<?php   
session_start();

if (isset($_SESSION['usuario'])) {
    $userName = $_SESSION['usuario']['USER_NAME'];
    $userID =  $_SESSION['usuario']['USER_ID'];
    // $gameID =  $_SESSION['game']['GAME_ID'];

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
    <title>Help Hangman</title>
</head>
<body>
    <h5 class="p-2">Bienvenido <?php echo $userName ?> </h5>
    <div class="container mt-5">
        <div class="row">
            <div class="col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                <h4>Juegos activos</h4>
                <ul id="game-list" class="list-group">
            
                </ul>
            </div>
            <div id="details-div" style="display:none" class="col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                <h4>Detalles</h4>
                <p>Progreso del Juego</p>
                <div id="hide-word" class="row">
                    
                </div>
                <p>Enviar Sugerencia:</p>
                <textarea id="text-help" class="form-control" name=""cols="30" rows="5"></textarea>
                <div id="help-error" style="display:none" class="bg-danger  text-white mb-2 mt-3 p-1"></div>
                <div id="help-success" style="display:none" class="bg-success  text-white mb-2 mt-3 p-1"></div>

                <button onclick="sendHelp( <?php echo $userID ?>)" class="btn btn-success mt-3">Enviar</button>
            </div>
        </div>
    </div>

    <script src="js/help.js"></script>
    <script src="sweetAlert/sweetalert.min.js"></script>
    <script src="js/jquery-3.4.1.min.js"></script>
    <script src="js/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>