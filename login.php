<?php
include("conexion.php");

$usuarioCorrecto = $_POST['usuario'];
$passwordCorrecto = $_POST['password'];
  
    if(empty($usuarioCorrecto) || empty($passwordCorrecto)){
        header("Location: index.php?err");
    } else {
        $baseUsuarios = mysqli_query($conexion, "SELECT * FROM users WHERE usuario = '$usuarioCorrecto' AND pass = '$passwordCorrecto'");
        
        if (mysqli_num_rows($baseUsuarios)==1) {
            if($row = mysqli_fetch_array($baseUsuarios)){ 
                session_start();
                $_SESSION['id'] = $row['id_user'];
                $_SESSION['usuario'] = $usuarioCorrecto;
                $_SESSION['imagen']= $row['imagen'];
                $_SESSION['pass'] = $passwordCorrecto;
                //ingreso exitoso
                header("Location: gestion.php");
            }

        } else {

            //error de ingreso
            header("Location: index.php?err");
        }

    }


?>

