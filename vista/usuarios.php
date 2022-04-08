<?php
// require_once "../controlador/controlador.usuarios.php";


// Permitir solo si es con inicio de secion
// if (!isset($_SESSION["validarIngreso"])) {

//     echo '<script>window.location = "index.php?pagina=login";</script>';
//     return;
// } else {

//     if ($_SESSION["validarIngreso"] != "ok") {

//         echo '<script>window.location = "index.php?pagina=login";</script>';

//         return;
//     }
// }

//Proceso para llenar la tabla con datos de los usuario de la BDD
$usuarios = ControladorUsuarios::contrConsultaUsuarios();
if (empty($usuarios)) {
    echo "No hay registro de usuarios</td>";
}

// $usuario = ControladorUsuarios::contrConsultaUsuario();
// if (empty($usuario)) {
//     echo " Algo salio mal </td>";
// }


if (isset($_POST["llamar_ocupaciones"])) {   //Se activa cuando el usuario da clic en el boton

    $datos = array(
      $_POST["usuario"],
      $_POST["clave"]
    );
  
    //$insertar = ControladorUsuarios::contrInsertarUsuarios($datos);
    $ingresar = new ControladorUsuarios();
    $ingresar -> contrIngresarUsuarios($datos);
    
}


// $carpinteros = ControladorUsuarios::crtTraercarpintero($datos);

?>


<html>

<!-- <head>
    <title>Usuarios</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/64999b8509.js" crossorigin="anonymous"></script>

</head> -->

<nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container px-4 px-lg-5">
                <a class="navbar-brand" href="#!">LOGO</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                        <button name="llamar_ocupaciones" value="carpintero">Carpintero</button>
                        <li class="nav-item"><a class="nav-link" href="#!">Carpinteros</a></li>
                        <li class="nav-item"><a class="nav-link" href="#!">Plomeros</a></li>
                        <li class="nav-item"><a class="nav-link" href="#!">Cerrajero</a></li>
                        <li class="nav-item"><a class="nav-link" href="#!">Otros</a></li>

                        <!-- <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Cerrajeros</a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="#!">All Products</a></li>
                                <li><hr class="dropdown-divider" /></li>
                                <li><a class="dropdown-item" href="#!">Popular Items</a></li>
                                <li><a class="dropdown-item" href="#!">New Arrivals</a></li>
                            </ul>
                        </li> -->

                    </ul>
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                        <li class="nav-item">
                        <a class="nav-link" href="index.php?pagina=salir">Salir</a>
                        </li>
                    </ul>

                    <!-- <form class="d-flex">
                        <button class="btn btn-outline-dark" type="submit">
                            <i class="bi-cart-fill me-1"></i>
                            Cart
                            <span class="badge bg-dark text-white ms-1 rounded-pill">0</span>
                        </button>
                    </form> -->

                </div>
            </div>
        </nav>

<header class="bg-dark py-5">
    <div class="container px-4 px-lg-5 my-5">
        <div class="text-center text-white">
            <h1 class="display-4 fw-bolder">Nvibe</h1>
            <p class="lead fw-normal text-white-50 mb-0">Contrata a los mejores de Quito</p>
        </div>
    </div>
</header>

<body>

<br/>
    
    <h1 class="text-center">Lista de Usuarios</h1>
    
    <section class="py-5">
    <div class="container px-4 px-lg-5 mt-5">
    <div class="row gx-4 gx-lg-5 row-col-3 row-cols-md-3 row-cols-x1-4 justify-content-center"  >
            <?php foreach ($usuarios as $fila => $columna) : ?>

                    <div class="col mb-5">
                        <div class="card h-100">
                            <!-- Product image-->
                            <img class="card-img-top" src="https://dummyimage.com/450x300/dee2e6/6c757d.jpg" alt="..." />
                            <!-- Product details-->
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <!-- Product name-->
                                    <h5 class="fw-bolder"><?php echo $columna["nombre"] ?></h5>
                                    <p class="fw-bolder">EDAD <?php echo $columna["edad"] ?></p>
                                    <h5 class="fw-bolder"><?php echo $columna["ocupacion"] ?></h5>
                                    <p class="fw-bolder"><?php echo $columna["correo"] ?></p>
                                    <!-- Product price-->
                                    <?php echo $columna["id"] ?>
                                </div>
                            </div>
                            <!-- Product actions-->
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="text-center">
                                    <button type="submit" name="consulta_u" class="btn btn-dark"
                                        data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@fat"
                                    >
                                        Contratar
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

            <?php endforeach ?>

<!-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@fat">Open modal for @fat</button> -->

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Contacto</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      
      <div class="modal-body">
        <form>
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Recipient:</label>
            <input type="text" class="form-control" id="recipient-name">
          </div>
          <div class="mb-3">
            <label for="message-text" class="col-form-label">Message:</label>
            <textarea class="form-control" id="message-text"></textarea>
          </div>
        </form>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary">Enviar</button>
      </div>

    </div>
  </div>
</div>

    </div>
    </div>
    </section>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>
</html>