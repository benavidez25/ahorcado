

<?php  
session_start();
include_once("../class/class-conexion.php"); 
$conexion = new Conexion();
$conexion->establecerConexion();
$resp = array();
    
    $sql2 = sprintf("SELECT *
                        FROM users 
                        WHERE USER_USERNAME='%s'", 
                    $conexion->getLink()->real_escape_string(stripslashes($_POST["user"]))
            );
        $resultadoUsuario = $conexion->ejecutarInstruccion($sql2);
        $file = $conexion->obtenerFila($resultadoUsuario);
        // print_r($file);
        if ($file['USER_PASSWORD'] == sha1($_POST["password"]) ){
            $_SESSION['usuario']=$file;
            $resultado["code"]=1;
            $resultado["mensaje"]='Registro encontrado';
        }else{
            $resultado["code"]=0;
            $resultado["mensaje"]='Registro no encontrado';
        }
                    
        
    echo json_encode($resultado);
    $conexion->cerrarConexion();

?>