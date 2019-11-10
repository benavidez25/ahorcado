<?php  
session_start();
include_once("../class/class-conexion.php"); 
$conexion = new Conexion();
$conexion->establecerConexion();


if (isset($_SESSION['usuario']))
    $userID = $_SESSION['usuario']['USER_ID'];

    $index = 0;
    $answer = array();
    $sql = "SELECT WORD FROM words";
    $resultWords = $conexion->ejecutarInstruccion($sql);
    $rowNumber = $conexion->cantidadRegistros($resultWords);
    $indexSelected = rand(0,  $rowNumber);
    $wordSelected;
	while($row = $conexion->obtenerFila($resultWords)){
        if ($index == $indexSelected){
            $answer['word'] = $row['WORD'];
            $wordSelected = $row['WORD'];
            $sql ="INSERT INTO `games`(GAME_USER, GAME_WORD, GAME_PROGRESS, GAME_DATE, GAME_ONLINE) VALUES ('$userID', '$wordSelected', '', curdate(), TRUE)";
            $resultInsert = $conexion->ejecutarInstruccion($sql);

            //get ID 
            $sql = 'SELECT * FROM games ORDER BY GAME_ID desc limit 1';
            $resultGame = $conexion->ejecutarInstruccion($sql);
            $game = $conexion->obtenerFila($resultGame);
            $_SESSION['game']=$game;
    
        }
        $index = $index +1;
	}
        echo json_encode($answer);
        $conexion->cerrarConexion();

?>