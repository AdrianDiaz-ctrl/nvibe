
<?php 
require_once "../controlador/controlador.usuarios.php";
//Método para insertar un usuario en la base de datos
if(isset($_POST["ingresar"])){   //Se activa cuando el usuario da clic en el boton

  $datos = array
        (
           $_POST["cedula"],
           $_POST["nombre"],
           $_POST["apellido"],
           $_POST["usuario"],
           $_POST["clave"],
           $_POST["id_tusuario"]
          
        );
  
    $insertar = ControladorUsuarios::contrInsertarUsuarios($datos);
  
  
  if($insertar=="ok"){
    echo "<script>
        alert('Usuario insertado correctamente...');
       </script>";
        
  }

  if($insertar=="error"){
    echo "<script>
        alert('ERROR');
       </script>";
  }
  
}

?>

<html>
  <head>
    <title>Registro de Usuarios</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

  </head>
  <body>
  
  
  <h1><span class="badge bg-info text-dark">REGISTRO DE USUARIOS</span></h1>

<form id="frmAgregar" role="form" method="POST" enctype="multipart/form-data">
        
    
    <div class="input-group mb-3">
    <span class="input-group-text" id="inputGroup-sizing-default">CÉDULA</span>
      <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="cedula" required>
      
    </div>
    <div class="input-group mb-3">
    <span class="input-group-text" id="inputGroup-sizing-default">NOMBRE</span>
      <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="nombre" required>
    </div>
    <div class="input-group mb-3">
    <span class="input-group-text" id="inputGroup-sizing-default">APELLIDO</span>
      <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="apellido" required>
    </div>
    <div class="input-group mb-3">
    <span class="input-group-text" id="inputGroup-sizing-default">USUARIO</span>
      <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="usuario" required>
    </div>
    <div class="input-group mb-3">
    <span class="input-group-text" id="inputGroup-sizing-default">CONTRASEÑA</span>
      <input type="password" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="clave" required>
    </div>
    <div class="input-group mb-3">
    <span class="input-group-text" id="inputGroup-sizing-default">TIPO DE USUARIO</span>
      <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="id_tusuario" required>
    </div>
    
    <button type="submit" name="ingresar" class="btn btn-info">Guardar</button>

</form>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

  </body>
</html>               

<?php
//lista de usuarios
?>

<?php
require_once "../controlador/controlador.usuarios.php";
?>
<html>
<head>
    <title>Usuarios</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

</head>
<body>
    <h1>Lista de Usuarios</h1>
    
    <table>

        <tr>
            <th>ID</th>
            <th>Cédula</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Usuario</th>
           
        </tr>
    </table>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

        </body>
</html>
           
            <?php
             
            //Proceso para llenar la tabla con datos de los usuario de la BDD
            $usuario = ControladorUsuarios::contrConsultaUsuarios();
            
            if(empty($usuario)){
                echo "No hay registro de usuario</td>";
            }else{
                foreach($usuario as $fila => $columna){
                    echo '<table>';
                    echo "<tr>";
                    echo "<td>".$columna["id_usuario"]."</td>";
                    echo "<td>".$columna["cedula"]."</td>";
                    echo "<td>".$columna["nombre"]."</td>";
                    echo "<td>".$columna["apellido"]."</td>";
                    echo "<td>".$columna["usuario"]."</td>";
                    echo "</tr>";
                    
                    
                }
              
            }
            ?>
            
        
        
    
