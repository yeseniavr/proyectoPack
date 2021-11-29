<?php
include("session.php");
include("conexion.php");
include_once("includes/header.php");
include_once("includes/sidebar.php");
include_once("includes/footer.php");

?>

    
<br>
    <h2>Nuevo Cliente</h2>
    <div class="container">
        <form class="form-horizontal" method="POST" action="guardar-cliente.php" autocomplete="off">
            <div class="form-group">
                <div class="row">
                    <div class="col-md-6 div-nuevo">
                        <label>Razon Social</label>
                        <input type="text" name="razon_social" id="razon_social" class='form-control' maxlength="50" required ></input>
                    </div>
                    <div class="col-md-6 div-nuevo">
                        <label>CUIT</label>
                        <input type="text" name="cuit" id="cuit" class='form-control' maxlength="13" required ></input>
                    </div>
                </div>
            </div>
                    
            <div class="form-group">
                <div class="row">
                    <div class="col-md-6 div-nuevo">
                        <label for="telefono" class="col-sm-2 control-label">Teléfono</label>
                        <input type="tel" class="form-control" id="telefono" name="telefono">
                    </div>
                    <div class="col-md-6 div-nuevo">
                        <label for="email" class="col-sm-2 control-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                </div>
            </div>
            <br>

            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                        <button type="button" class="btn btn-dark boton-secundario"><a href="gestion.php">Regresar</a></button>
                        <button type="submit" name= "guardar_cliente" class="btn btn-primary">Guardar</button>
                </div>
            </div>
        </form>
    </div>
</main>
