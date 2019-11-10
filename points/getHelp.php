<?php  
session_start();
include_once("../class/class-conexion.php"); 
$conexion = new Conexion();
$conexion->establecerConexion();

$gameID = $_SESSION['game']['GAME_ID'];

    $answer = array();
    $data = array();

    $sql = "SELECT B.USER_NAME, A.MESSAGE, A.MESSAGES_DATE FROM `messages` A
    INNER JOIN users B
    ON A.USER_ID = B.USER_ID
    WHERE A.GAME_ID =".$gameID;

    $resultGames = $conexion->ejecutarInstruccion($sql);

	while($row = $conexion->obtenerFila($resultGames)){
        $data['USER_NAME'] =  $row['USER_NAME'];
        $data['MESSAGE'] = $row['MESSAGE'];
        $data['MESSAGES_DATE']= $row['MESSAGES_DATE'];
        array_push($answer, $data);
    }

        // print_r($answer);
        echo json_encode($answer);

        // $conexion->cerrarConexion();

?>