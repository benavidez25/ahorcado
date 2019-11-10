<?php  
session_start();
include_once("../class/class-conexion.php"); 
$conexion = new Conexion();
$conexion->establecerConexion();

    $answer = array();
    $data = array();

    $sql = "SELECT B.USER_NAME, A.GAME_ID, A.GAME_PROGRESS, B.USER_ID FROM games A
            INNER JOIN users B
            ON A.GAME_USER = B.USER_ID
            WHERE A.GAME_ONLINE= 1 ";
    $resultGames = $conexion->ejecutarInstruccion($sql);

	while($row = $conexion->obtenerFila($resultGames)){
        $data['GAME_ID'] = $row['GAME_ID']; 
        $data['USER_NAME'] =  $row['USER_NAME'];
        $data['USER_ID'] = $row['USER_ID'];
        $data['GAME_PROGRESS']= $row['GAME_PROGRESS'];
        array_push($answer, $data);
    }

        // print_r($answer);
        echo json_encode($answer);

        // $conexion->cerrarConexion();

?>