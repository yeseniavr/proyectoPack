<?php
include("session.php");
include("conexion.php");
include_once("includes/header.php");
include_once("includes/sidebar.php");
include_once("includes/footer.php");

$where = "";
	
	if (isset($_POST["enviar-nombre"])) {
		$valor = $_POST['campo'];
		if (!empty($valor)) {
			$where = "WHERE nombre LIKE '%$valor%' OR id_clientes LIKE '%$valor%'";
		}
	}

?>

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <div class="col-md-4">
    <h2>Importe total por cliente</h2>
  </div>
</div>
<div class="col-md-6">
    <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST">
      <label class="mb-3">Ingrese código o nombre del cliente</label>
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
<br>
<div class="row">
    <div class="col-md-6">
        <div class="table-responsive">
            <table class="table table-striped table-sm">
            <thead>
                <tr>
                <th scope="col">Cód. Cliente</th>  
                <th scope="col">Razon Social</th>
                </tr>
            </thead>
            <tbody>
                <?php
                
                $query = "SELECT clientes.id_clientes, clientes.nombre FROM clientes $where";
                $result = mysqli_query($conexion, $query);

                //recorrer tabla
                while($row = mysqli_fetch_array($result)){ ?>
                <tr>
                    <td><?php echo $row['id_clientes']; ?></td>
                    <td><?php echo $row['nombre']; ?></td>
                    <td><a class="btn btn-secondary" href="contador.php?id=<?php echo $row['id_clientes']; ?>">Calcular</td>
                </tr>
                <?php } ?>
            </tbody>
            </table>
        </div>
        <?php
        if(isset($_GET['id'])){
            $id = $_GET['id'];
            $suma = "SELECT SUM(importe) as total FROM cheques where clientes_id = $id";
            $resultadoTotal = mysqli_query($conexion, $suma);
            $fila=$resultadoTotal->fetch_assoc();
        }
        ?>
        <br>
    </div>
    <div class="col-md-6 div-total">
        <h3>Total de importe por cliente</h3>
        <br>
        <h5><?php  if(isset($suma)){
            echo "Cód. Cliente : ".$id. "<br>". "Importe total: $". $total=$fila['total'];
        }else{
            echo "No hay cliente seleccionado";
        }
         ?>
        </h5>
    </div>
</div>
</main>
</div>
</div>











