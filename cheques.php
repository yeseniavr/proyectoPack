<?php
include("session.php");
include("conexion.php");
include_once("includes/header.php");
include_once("includes/sidebar.php");
include_once("includes/footer.php");

//buscador
$where = "";
	
	if (isset($_POST["enviar-nombre"])) {
		$valor = $_POST['campo'];
		if (!empty($valor)) {
			$where = "WHERE nombre LIKE '%$valor%' OR clientes_id LIKE '%$valor%'";
		}
	}

//filtro por vencimiento  
  if (isset($_POST["enviar-vto"])) {
		if($_POST["vto"] == 1){
			$where = "ORDER BY fecha_vto ASC";
		}elseif($_POST['vto'] == 2){ 
			$where = "ORDER BY fecha_vto DESC";
		}
	}


?>
<!--Mostrar msj si existe $_SESSION['message']-->
<?php if(isset($_SESSION['message'])){ ?>
        <div class="alert alert-<?= $_SESSION['message-type']; ?> alert-dismissible fade show" role="alert">
            <?= $_SESSION['message']; ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>

<?php unset($_SESSION['message']);} ?>


<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <div class="col-md-4">
    <h2>Cartera de cheques</h2>
  </div>
  <!--buscador-->
  <div class="col-md-4">
    <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST">
      <div class="input-group">
        <div class="form-outline">
          <input type="search" id="form1" class="form-control-dos" name="campo" />
        </div>
        <button type="submit" class="btn btn-primary" name="enviar-nombre" value="Buscar">
          <i class="bi bi-search"></i>
        </button>
      </div>
    </form>
  </div>
  <!--filtro vencimiento-->
  <div class="col-md-4">
    <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST" id="form-venc" >
		  <div class="form-group">
        <br>
				<b>Vencimiento:</b>
				<select id="vto" name="vto">
					<option selected>...</option>
					<option value="1">Ascendente</option>
					<option value="2">Descendente</option>
				</select>
				<input type="submit" id="enviar" name="enviar-vto" value="Buscar" class="btn btn-primary  btn-sm boton-secundario" />
			</div>
    </form>
  </div>
</div>
  <div class="table-responsive">
    <table class="table table-striped table-sm">
      <thead>
        <tr>
          <th scope="col">Cód. Cliente</th>  
          <th scope="col">N° de cheque</th>
          <th scope="col">Razón Social Librador</th>
          <th scope="col">Cuit Social Librador</th>
          <th scope="col">Vencimiento</th>
          <th scope="col">Importe</th>
          <th scope="col">Propio</th>
          <th scope="col">Echeq</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $query = "SELECT * FROM cheques $where";
        $result = mysqli_query($conexion, $query);

        //recorrer tabla
         while($row = mysqli_fetch_array($result)){ ?>
          <tr>
              <td><?php echo $row['clientes_id']; ?></td>
              <td><?php echo $row['numero_cheque']; ?></td>
              <td><?php echo $row['nombre']; ?></td>
              <td><?php echo $row['cuit_librador']; ?></td>
              <?php $mifecha= $row['fecha_vto'];
                    $date = new DateTime($mifecha);
              ?>
              <td><?php echo $date->format('d-m-Y');?></td>
              <td><?php echo "$".$row['importe']; ?></td>
              <td><?php echo $row['propio']; ?></td>
              <td><?php echo $row['echeq']; ?></td>
              <td><a class="btn btn-secondary" href="editar-cheque.php?id=<?php echo $row['numero_cheque']; ?>"><i class="bi bi-pencil-fill"></i></a>
                  <a class="btn btn-danger" onclick="return  confirm('¿Desea eliminar el registro?')"href="delete-cheque.php?id=<?php echo $row['numero_cheque']; ?>"><i class="bi bi-trash-fill" ></i</a>
              </td>
          </tr>
        <?php } ?>
      </tbody>
    </table>
  </div>
</main>
</div>
</div>
