<?php
include "session.php";
include "conexion.php";
include_once "includes/header.php";
include_once "includes/sidebar.php";
include_once "includes/footer.php";

?>
<br>
<h2>Generador de presupuestos</h2>
<div class="container">
    <form class="form-horizontal" method="POST" action="enviar-presupuesto.php" autocomplete="off">
        <div class="row">
            <div class="col-md-6">
                <h4>Seleccione un Destinatario</h4>
                <br>
                <select name="destinatario" id="">
                    <option value="0">Seleccione:</option>
                    <?php
$query = "SELECT * FROM personas";
$result = mysqli_query($conexion, $query);
while ($row = mysqli_fetch_array($result)) {
    echo '<option value="' . $row[id] . '">' . $row[nombre] . ' ' . $row[apellidos] . '</option>';
}
?>
                </select>
            </div>

            <div class="col-md-6">
                <h4>Seleccione un Remitente</h4>
                <br>
                <select name="remitente" id="">
                    <option value="0">Seleccione:</option>
                    <?php
$query = "SELECT * FROM personas";
$result = mysqli_query($conexion, $query);
while ($row = mysqli_fetch_array($result)) {
    echo '<option value="' . $row[id] . '">' . $row[nombre] . ' ' . $row[apellidos] . '</option>';
}
?>
                </select>
            </div>
        </div>
    </form>

</div>