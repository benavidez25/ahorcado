<?php  
session_start();
include_once("../class/class-conexion.php"); 
$conexion = new Conexion();
$conexion->establecerConexion();
$resp = array();

switch ($_POST["action"]) {
    case "signin":

    $sql = sprintf(
        "INSERT INTO users(
        USER_NAME, 
        USER_EMAIL, 
        USER_USERNAME,  
        USER_PASSWORD, 
        USER_SIGNIN_DATE) 
        VALUES ('%s','%s','%s',sha1('%s'),curdate())",
            $conexion->getLink()->real_escape_string(stripslashes($_POST["signin-name"])),
            $conexion->getLink()->real_escape_string(stripslashes($_POST["signin-email"])),
            $conexion->getLink()->real_escape_string(stripslashes($_POST["signin-user"])),
            $conexion->getLink()->real_escape_string(stripslashes($_POST["signin-password"])))
        ; 
        $resultadoInsert = $conexion->ejecutarInstruccion($sql);

        if ($resultadoInsert === TRUE) {
            $resultado["code"]=1;
            $resultado["message"]="Exito, el  registro fue almacenado";
            
            $sql2 = sprintf("SELECT USER_ID, USER_NAME, USER_EMAIL, USER_USERNAME
                             FROM users 
                             WHERE USER_EMAIL='%s'",
                            $conexion->getLink()->real_escape_string(stripslashes($_POST["signin-email"]))
                    );
             $resultadoUsuario = $conexion->ejecutarInstruccion($sql2);
             $file = $conexion->obtenerFila($resultadoUsuario);

             $_SESSION['usuario']=$file;
                    
        } else {
            $resultado["code"]=0;
            $resultado["message"]="Error: " . $sql . "<br>" . $conexion->getLink()->error;
        }
        echo json_encode($resultado);
        $conexion->cerrarConexion();
    break;
   
}

?>