<?php
$txtId = (isset($_POST['txtID']))?$_POST['txtID']:"";
$txtNombre = (isset($_POST['txtNombre']))?$_POST['txtNombre']:"";
$txtApellidop = (isset($_POST['txtApellidop']))?$_POST['txtApellidop']:"";
$txtApellidom = (isset($_POST['txtApellidom']))?$_POST['txtApellidom']:"";
$txtEdad = (isset($_POST['txtEdad']))?$_POST['txtEdad']:"";
$txtGenero = (isset($_POST['txtGenero']))?$_POST['txtGenero']:"";
$txtSucursal = (isset($_POST['txtSucursal']))?$_POST['txtSucursal']:"";

$accion = (isset($_POST['accion']))?$_POST['accion']:"";

include("conexion/conexion.php");

switch($accion){
    case "btnAgregar":
      $sentencia= $conn->prepare("INSERT INTO clientes(nombre, apellidoP, apellidoM, edad, genero, sucursal) 
      VALUES (:nombre, :apellidoP, :apellidoM, :edad, :genero, :sucursal)");
      $sentencia->bindParam(':nombre', $txtNombre);
      $sentencia->bindParam(':apellidoP', $txtApellidop);
      $sentencia->bindParam(':apellidoM', $txtApellidom);
      $sentencia->bindParam(':edad', $txtEdad);
      $sentencia->bindParam(':genero', $txtGenero);
      $sentencia->bindParam(':sucursal', $txtSucursal);
      $sentencia->execute();
        break;
    case "btnModificar":
      $sentencia= $conn->prepare("UPDATE clientes SET nombre=:nombre, apellidoP=:apellidoP, apellidoM=:apellidoM, edad=:edad, genero=:genero, sucursal=:sucursal WHERE id=:id");
      $sentencia->bindParam(':nombre', $txtNombre);
      $sentencia->bindParam(':apellidoP', $txtApellidop);
      $sentencia->bindParam(':apellidoM', $txtApellidom);
      $sentencia->bindParam(':edad', $txtEdad);
      $sentencia->bindParam(':genero', $txtGenero);
      $sentencia->bindParam(':sucursal', $txtSucursal);
      $sentencia->bindParam(':id', $txtId);
      $sentencia->execute();    

        header('Location: capturaD.php');
        break;
      case "btnEliminar":
        $sentencia= $conn->prepare("DELETE FROM clientes WHERE id = :id");
        $sentencia->bindParam(':id', $txtId);
        $sentencia->execute();   
        
        header('Location: capturaD.php');
        break;
    case "btnCancelar":
        break;
}
    $sentencia = $conn->prepare("SELECT * FROM `clientes` WHERE 1");
    $sentencia->execute();
    $listaClientes=$sentencia->fetchAll(PDO::FETCH_ASSOC);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Captura de datos</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="https://unpkg.com/vanilla-datatables@latest/dist/vanilla-dataTables.min.css" rel="stylesheet" type="text/css">
<script src="https://unpkg.com/vanilla-datatables@latest/dist/vanilla-dataTables.min.js" type="text/javascript"></script>
</head>
<body>
   <div class="container">
    <form action="" method="post">

        <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
    Agregar cliente
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Cliente</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-row">
            <input type="hidden" required name="txtID" value="<?php echo $txtId;?>" placeholder="" id="txtID" require="">

            <label for="">Nombre:</label>
            <input type="text" class="form-control" name="txtNombre" required value="<?php echo $txtNombre;?>" placeholder="" id="txtNombre" require="">
            <br>
            <label for="">Apellidop:</label>
            <input type="text" class="form-control" name="txtApellidop" required value="<?php echo $txtApellidop;?>" placeholder="" id="txtApellidop" require="">
            <br>
            <label for="">Apellidom:</label>
            <input type="text" class="form-control" name="txtApellidom" required value="<?php echo $txtApellidom;?>" placeholder="" id="txtApellidom" require="">
            <br>
            <label for="">Edad:</label>
            <input type="number" class="form-control" name="txtEdad" required value="<?php echo $txtEdad;?>" placeholder="" id="txtEdad" require="">
            <br>
            <label for="">Genero:</label>
            <!--input type="text" name="txtGenero" required value="<?php echo $txtGenero;?>" placeholder="" id="txtGenero" require=""-->
            <select name="txtGenero" class="custom-select" id="txtGenero">
                <option value="Hombre">Hombre</option>
                <option value="Mujer">Mujer</option>
                <option value="Otro">Otro</option>
            </select>
            <br>
            <label for="">Sucursal:</label>
            <!--input type="text" name="txtSucursal" required value="<?php echo $txtSucursal;?>" placeholder="" id="txtSucursal" require=""-->
            <select name="txtSucursal" class="custom-select" id="txtSucursal">
                <option value="Sucursal 1">Sucursal 1</option>
                <option value="Sucursal 2">Sucursal 2</option>
                <option value="Sucursal 3">Sucursal 3</option>
                <option value="Sucursal 4">Sucursal 4</option>
            </select>
        </div>
      </div>
      <div class="modal-footer">
        <button value="btnAgregar" class="btn btn-primary" type="submit" name="accion">Agregar</button>
        <button value="btnModificar" class="btn btn-primary" type="submit" name="accion">Modificar</button>
        <button value="btnEliminar" class="btn btn-primary" type="submit" name="accion">Eliminar</button>
        <button value="btnCancelar" class="btn btn-primary" data-toggle="modal" type="submit" name="accion">Cancelar</button>
      </div>
    </div>
  </div>
</div>
    </form>
    <table class="table table-bordered" id="tabla">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th>Nombre completo</th>
      <th>Edad</th>
      <th>Genero</th>
      <th>Sucursal</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach($listaClientes as $clientes){?>
        <tr>
            <td><?php echo $clientes['nombre']; ?> <?php echo $clientes['apellidoP']; ?> <?php echo $clientes['apellidoM']; ?></td>
            <td><?php echo $clientes['edad']; ?></td>
            <td><?php echo $clientes['genero']; ?></td>
            <td><?php echo $clientes['sucursal']; ?></td>
            <td>
                <form action="" method="post">
                <input type="hidden" name="txtID" value="<?php echo $clientes['id']; ?>">
                <input type="hidden" name="txtNombre" value="<?php echo $clientes['nombre']; ?>">
                <input type="hidden" name="txtApellidop" value="<?php echo $clientes['apellidoP']; ?>">
                <input type="hidden" name="txtApellidom" value="<?php echo $clientes['apellidoM']; ?>">
                <input type="hidden" name="txtEdad" value="<?php echo $clientes['edad']; ?>">
                <input type="hidden" name="txtGenero" value="<?php echo $clientes['genero']; ?>">
                <input type="hidden" name="txtSucursal" value="<?php echo $clientes['sucursal']; ?>">

                <input type="submit" class="btn btn-primary" value="Seleccionar" name="accion">
                <button value="btnEliminar" class="btn btn-primary" type="submit" name="accion">Eliminar</button>
                </form>
            </td>
        </tr>
    <?php } ?>
  </tbody>
</table>
    </div>
   </div> 
    <script>
        var tabla = document.querySelector("#tabla")
        var datatable = new DataTable(tabla,{
            perPageSelect:[1,2,3,4,5,10,20],
            labels: {
            placeholder: "Buscar:",
            perPage: "{select} Registros por pagina",
            noRows: "Registro no Encontrado",
            info: "Mostrando registros del {start} al {end} de {rows} Registros",
        }});
    </script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>