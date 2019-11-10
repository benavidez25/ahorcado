<?php  
session_start();
include_once("../class/class-conexion.php"); 
$conexion = new Conexion();
$conexion->establecerConexion();


$gameID = $_SESSION['game']['GAME_ID'];

    $sql ="UPDATE `games` SET GAME_ONLINE=FALSE WHERE GAME_ID=".$gameID;
    $resultUpdate = $conexion->ejecutarInstruccion($sql);

    $conexion->cerrarConexion();

?>