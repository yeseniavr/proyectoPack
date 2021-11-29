<?php
include("session.php");
include("conexion.php");

if (isset($_GET['id'])){
    $id = $_GET['id'];
    $query = "DELETE FROM clientes WHERE id_clientes = $id";
    $resultado = mysqli_query($conexion, $query);
    if (!$resultado){
        $_SESSION['message'] = "No se puede eliminar el cliente, cheques registrados a su nombre";
        $_SESSION['message-type'] = 'warning';

        header("Location: gestion.php");
    }else{
        $_SESSION['message'] = 'Registro eliminado con exito';
        $_SESSION['message-type'] = 'success';

        header("Location: gestion.php");


    }

    
}

    

?>