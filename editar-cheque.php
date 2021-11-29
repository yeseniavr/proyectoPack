<?php
include("session.php");
include("conexion.php");

//trae los datos de la base
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $query = "SELECT * FROM cheques WHERE numero_cheque = $id";
    $resultado = mysqli_query($conexion, $query);

    if(mysqli_num_rows($resultado) == 1){
        $row = mysqli_fetch_array($resultado);
        $clientes_id = $row['clientes_id'];
        $numero_cheque = $row['numero_cheque'];
        $razon_social = $row['nombre'];
        $cuit_librador = $row['cuit_librador'];
        $vencimiento = $row['fecha_vto'];
        $importe = $row['importe'];
        $propio = $row['propio'];
        $echeq =$row['echeq'];

   }
 
}
//actualizar datos
if(isset($_POST['update-cheque'])){
    $id = $_GET['id'];
    $clientes_id = $_POST['clientes_id'];
    $numero_cheque = $_POST['cheque'];
    $razon_social = $_POST['razon_social'];
    $cuit_librador = $_POST['cuit_librador'];
    $vencimiento = $_POST['vto'];
    $importe = $_POST['importe'];
    $propio = $_POST['propio'];
    $echeq = $_POST['echeq'];

    $query = "UPDATE cheques set clientes_id = '$clientes_id', numero_cheque = '$numero_cheque', nombre = '$razon_social', cuit_librador = '$cuit_librador', fecha_vto = '$vencimiento', importe = '$importe', propio = '$propio', echeq = '$echeq' WHERE numero_cheque = $id";
    mysqli_query($conexion, $query);


    $_SESSION['message'] = "Registro modificado con exito";
    $_SESSION['message-type'] = 'success';
    header('Location: cheques.php');

}

?>

<?php   
include_once("includes/header.php");
include_once("includes/sidebar.php");
?>
<br>
<h2>Modificar Cheque</h2>
    <div class="container">
        <form class="form-horizontal" method="POST" action="editar-cheque.php?id=<?php echo $_GET['id']; ?>" autocomplete="off">
            <div class="form-group">
                <div class="row">
                    <div class="col-md-6 div-nuevo">
					    <label for="numero" class="col-sm-2 control-label">Cód. Cliente</label>
					    <input type="text" class="form-control" id="clientes_id" name="clientes_id" value="<?php echo $clientes_id; ?>">
					</div>
                    <div class="col-md-6 div-nuevo">
					    <label for="numero" class="col-sm-2 control-label">N° de Cheque</label>
					    <input type="text" class="form-control" id="cheque" name="cheque" value="<?php echo $numero_cheque; ?>">
					</div>
                </div>
            </div>

            <div class="form-group">
                <div class="row">
                    <div class="col-md-6 div-nuevo">
                        <label>Razon Social Librador</label>
                        <input type="text" name="razon_social" id="razon_social" class='form-control' maxlength="50" value="<?php echo $razon_social; ?>" ></input>
                    </div>
                    <div class="col-md-6 div-nuevo">
                        <label>Cuit Librador</label>
                        <input type="text" name="cuit_librador" id="cuit_librador "class='form-control' maxlength="50" value="<?php echo $cuit_librador; ?>" ></input>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="row">
                    <div class="col-md-6 div-nuevo">
					    <label for="vto" class="col-sm-2 control-label">Vencimiento</label>
					    <input type="text" class="form-control" id="vto" name="vto" value="<?php echo $vencimiento; ?>">
					</div>
                    <div class="col-md-6 div-nuevo">
                        <label for="importe" class="col-sm-2 control-label">Importe</label>
					    <input type="text" class="form-control" id="importe" name="importe" value="<?php echo $importe; ?>">
					</div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-6 div-nuevo">
                        <label for="propio" class="col-sm-2 control-label">Cheque Propio</label>
                        <label class="radio-inline">
                            <input type="radio" id="propio" name="propio" value="Si" <?php if($propio=='Si') {echo 'checked';} ?> > SI
                        </label>    
                        <label class="radio-inline">
                            <input type="radio" id="propio" name="propio" value="No" <?php if($propio=='No') {echo 'checked';} ?> > NO
                        </label>
                    </div>
                    <br>
                    <div class="col-md-6 div-nuevo">
                        <label for="echeq" class="col-sm-2 control-label">Echeq</label>
                        <label class="radio-inline">
                            <input type="radio" id="echeq" name="echeq" value="Si" <?php if($echeq=='Si'){echo 'checked';} ?> > SI
                        </label>    
                        <label class="radio-inline">
                            <input type="radio" id="echeq" name="echeq" value="No" <?php if($echeq=='No'){echo 'checked';} ?> > NO
                        </label>
                    </div>
                </div>
            </div>
            <br>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                        <button type="button" class="btn btn-dark boton-secundario"><a href="cheques.php">Regresar</a></button>
                        <button type="submit" name= "update-cheque" class="btn btn-primary">Guardar</button>
                </div>
            </div>
        </form>
    </div>
</main>


<?php include_once("includes/footer.php"); ?>





