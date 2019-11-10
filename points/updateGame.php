<?php  
session_start();
include_once("../class/class-conexion.php"); 
$conexion = new Conexion();
$conexion->establecerConexion();


$gameID = $_SESSION['game']['GAME_ID'];

    $sql ="UPDATE `games` SET GAME_PROGRESS='".$_POST['progress']. "' WHERE GAME_ID=".$gameID;
    $resultUpdate = $conexion->ejecutarInstruccion($sql);

	
    // echo json_encode($answer);
    $conexion->cerrarConexion();

?>