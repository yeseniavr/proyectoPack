<?php
include("session.php");
include("conexion.php");
include_once("includes/header.php");
include_once("includes/sidebar.php");
include_once("includes/footer.php");

?>

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <div class="col-md-12">
    <h2>Cheques por cliente</h2>
  </div>
</div>
  

  <div class="table-responsive">
    <table class="table table-striped table-sm">
      <thead>
        <tr>
          <th scope="col">Cód. Cliente</th>
          <th scope="col">Razón Social</th>
          <th scope="col">N° de Cheque</th>
          <th scope="col">Vencimiento</th>
          <th scope="col">Importe</th>
        </tr>
      </thead>
      <tbody>
        <?php
        
        $query = "SELECT clientes.id_clientes, clientes.nombre, cheques.numero_cheque, cheques.fecha_vto, cheques.importe FROM clientes INNER JOIN cheques ON clientes.id_clientes = cheques.clientes_id";
        $result = mysqli_query($conexion, $query);

        //recorrer tabla
         while($row = mysqli_fetch_array($result)){ ?>
          <tr>
              <td><?php echo $row['id_clientes']; ?></td>
              <td><?php echo $row['nombre']; ?></td>
              <td><?php echo $row['numero_cheque']; ?></td>
              <td><?php echo $row['fecha_vto']; ?></td>
              <td><?php echo "$".$row['importe']; ?></td>
          </tr>
        <?php } ?>
      </tbody>
    </table>
  </div>
</main>
</div>
</div>
