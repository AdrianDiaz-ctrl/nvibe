<?php
require_once "../controlador/controlador.usuarios.php";
//Método para insertar un usuario en la base de datos
if (isset($_POST["ingresar"])) {   //Se activa cuando el usuario da clic en el boton

  $datos = array(
    $_POST["usuario"],
    $_POST["clave"]
  );

  //$insertar = ControladorUsuarios::contrInsertarUsuarios($datos);
  $ingresar = new ControladorUsuarios();
  $ingresar -> contrIngresarUsuarios($datos);

  
}

?>

<html>

<head>
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>

<body>
    <h1 class="text-center">Ingreso</h1>
    <div class="d-flex justify-content-center text-center">


        <form id="frmLogin" role="form" method="POST" enctype="multipart/form-data">

            <div class="mb-3">
                <div id="emailHelp" class="form-text">Nunca compartas tu información de inicio de sesión.</div>
                <label for="exampleInputEmail1" class="form-label">Usuario</label>
                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="usuario" placeholder="Correo" required>

            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Contraseña</label>
                <input type="password" class="form-control" id="exampleInputPassword1" name="clave" placeholder="Contraseña" required>
            </div>

            
      
   

            
            <button type="submit" name="ingresar" class="btn btn-primary">Ingresar</button>
            
        </form>
    </div>







    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>


</body>

</html>