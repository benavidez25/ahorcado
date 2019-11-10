<?php  
session_start();
include_once("../class/class-conexion.php"); 
$conexion = new Conexion();
$conexion->establecerConexion();
// print_r($_POST['user']);
$answer = array();
$gameID = $_POST['gameId'];
$help = $_POST['help'];
$user  = $_POST['user'];

    $sql ="INSERT INTO `messages`(GAME_ID, MESSAGE, USER_ID, MESSAGES_DATE) VALUES ($gameID, '$help', $user, curdate())";
    $resultInsert = $conexion->ejecutarInstruccion($sql);

    if ($resultInsert === TRUE) {
        $answer["code"]=1;
        $answer["message"]="Exito, el  registro fue almacenado";
                
    } else {
        $answer["code"]=0;
        $answer["message"]="Error: " . $sql . "<br>" . $conexion->getLink()->error;
    }
    echo json_encode($answer);
    $conexion->cerrarConexion();

?>