<?php
// require_once "../controlador/controlador.usuarios.php";
//Método para insertar un usuario en la base de datos
if (isset($_POST["ingresar"])) {   //Se activa cuando el usuario da clic en el boton

  // if(isset($_FILES['imagen_producto']['name'])){
  //   $nombre_foto = $_FILES['imagen_producto']['name'];
  // }else{
  //   echo "<script>
  //       alert('Usuario no valido...');
  //      </script>";
  // }

  $nombre_foto = (isset($_FILES['imagen_producto']['name']))?$_FILES['txtImagen']['name']:"";

  $ubicacion_foto = "upload/".$nombre_foto;
  
  $extension_foto = pathinfo($ubicacion_foto,PATHINFO_EXTENSION);
  $extension_foto = strtolower($extension_foto);

  $validar_extension = array("jpg","png","jpeg");

  if (in_array($extension_foto,$validar_extension))
  {
    move_uploaded_file($_FILES['imagen_producto']['tmp_name'],$ubicacion_foto);
  }

  $datos = array(
    $_POST["nombre"],
    $_POST["edad"],
    $_POST["ocupacion"],
    $_POST["correo"],
    $_POST["contraseña"],
    $nombre_foto
  );

  $insertar = ControladorUsuarios::contrInsertarUsuarios($datos);

  if ($insertar == "ok") {
    $_SESSION["validarIngreso"] = "ok";
    echo "<script>
        alert('Usuario insertado correctamente...');
        window.location = 'index.php?pagina=usuarios';
       </script>";
  }else if($insertar == "error") {
    echo "<script>
        alert('ERROR');
        window.location = 'registro.php';
       </script>";
  }else if($insertar == "error correo") {
    echo "<script>
        alert('ERROR: ESTE CORREO YA EXISTE');
        window.location = 'registro.php';
       </script>";
  }

  
}


?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>

<!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" rel="stylesheet">

<!-- Project CSS -->
    <!-- <link href="css/project.css" rel="stylesheet"> -->

</head>

<body>
  <div class="container">
    <div class="row">
      <div class="col-lg-10 col-xl-9 mx-auto">
        <div class="card card-signin flex-row my-5">
          <div class="card-img-left d-none d-md-flex">
             <!-- Background image for card set in CSS! -->
          </div>
          <div class="card-body">
            <h5 class="card-title text-center">Registrate</h5>
            <form class="form-signin" method="POST">

              <div class="form-label-group">
                <label for="inputUserame">Nombre y Apellido</label>
                <input type="text" id="inputUserame" class="form-control" name="nombre" pattern="[A-Za-z ]+" placeholder="Nombre..." required autofocus>
              </div>
              <br>

              <div class="form-label-group">
                <label for="inputUserame">Edad</label>
                <input type="text" id="edad" class="form-control" name="edad" maxlength="2"  pattern="[0-9]+" placeholder="Edad" required autofocus>
              </div>
              <br>

              <div class="form-label-group">
                <label for="inputUserame">Ocupacion</label>
                <select name="ocupacion" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                  <option value="otro">...</option>
                  <option value="carpintero">Carpintero</option>
                  <option value="cerrajero">Cerrajero</option>
                  <option value="plomero">Plomero</option>
                  <option value="otro">Otro</option>
                </select>
              </div>
              <br>

              <div class="form-label-group">
                <label for="inputEmail">Correo electrónico</label>
                <input type="email" id="inputEmail" class="form-control" name="correo" placeholder="Correo electrónico" required>
              </div>
              <br>

              <div class="form-label-group">
                <label for="inputPassword">Contraseña</label>
                <input type="password" id="inputPassword" class="form-control" name="contraseña" placeholder="Password" required>
              </div>
              <br>
              
              <div class="form-label-group">
                <label for="inputPassword">Foto</label>
                <input type="file" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="imagen_producto" placeholder="imagen" >
              </div>
              <br>

              <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit" name="ingresar">Registrarse</button>
              <a class="d-block text-center mt-2 small" href="index.php?pagina=login">Ya tienes una cuenta? Inicia Secion</a>

            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

    <!-- Bootstrap core JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>

</body>

</html>

