<?php
include("session.php");
include("conexion.php");

if (isset($_GET['id'])){
    $id = $_GET['id'];
    $query = "DELETE cheques FROM cheques JOIN clientes ON cheques.clientes_id = clientes.id_clientes WHERE numero_cheque = $id ";
    $resultado = mysqli_query($conexion, $query);
    if (!$resultado){
        die("Query Faild");
    }else{
        $_SESSION['message'] = 'Registro eliminado con exito';
        $_SESSION['message-type'] = 'success';
        header("Location: cheques.php");
    }

    
}

    

?>