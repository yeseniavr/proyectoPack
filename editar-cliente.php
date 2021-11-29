<?php
include("session.php");
include("conexion.php");

//trae los datos de la base
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $query = "SELECT * FROM clientes WHERE id_clientes = $id";
    $resultado = mysqli_query($conexion, $query);

    if(mysqli_num_rows($resultado) == 1){
        $row = mysqli_fetch_array($resultado);
        $razon_social = $row['nombre'];
        $cuit = $row['cuit'];
        $telefono = $row['telefono'];
        $email = $row['email'];
   }
 
}
//actualizar datos
if(isset($_POST['update'])){
   $id = $_GET['id'];
    $razon_social = $_POST['razon_social'];
    $cuit = $_POST['cuit'];
    $telefono = $_POST['telefono'];
    $email= $_POST['email'];

    $query = "UPDATE clientes set nombre = '$razon_social', cuit = '$cuit', telefono = '$telefono', email = '$email' WHERE id_clientes = $id";
    mysqli_query($conexion, $query);

    $_SESSION['message'] = "Registro modificado con exito";
    $_SESSION['message-type'] = 'success';
    header('Location: gestion.php');

}

?>

<?php   
include_once("includes/header.php");
include_once("includes/sidebar.php");
?>
<br>
<h2>Modificar Cliente</h2>
    <div class="container">
        <form class="form-horizontal" method="POST" action="editar-cliente.php?id=<?php echo $_GET['id']; ?>" autocomplete="off">
            <div class="form-group">
                <div class="row">
                    <div class="col-md-6 div-nuevo">
                        <label>Razon Social</label>
                        <input type="text" name="razon_social" id="razon_social" class='form-control' maxlength="50" required value="<?php echo $razon_social; ?>"></input>
                    </div>
                    <div class="col-md-6 div-nuevo">
                        <label>CUIT</label>
                        <input type="text" name="cuit" id="cuit" class='form-control' maxlength="13" required value= "<?php echo $cuit; ?>"></input>
                    </div>
                </div>
            </div>
                    
            <div class="form-group">
                <div class="row">
                    <div class="col-md-6 div-nuevo">
                        <label for="telefono" class="col-sm-2 control-label">Teléfono</label>
                        <input type="tel" class="form-control" id="telefono" name="telefono" value= "<?php echo $telefono; ?>" required>
                    </div>
                    <div class="col-md-6 div-nuevo">
                        <label for="email" class="col-sm-2 control-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" required value= "<?php echo $email; ?>">
                    </div>
                </div>
            </div>
            <br>

            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                        <button type="button"  class="btn btn-dark boton-secundario"><a href="gestion.php">Regresar</a></button>
                        <button type="submit" name="update" class="btn btn-primary">Modificar</button>
                </div>
            </div>
        </form>
    </div>
</main>

<?php include_once("includes/footer.php"); ?>





