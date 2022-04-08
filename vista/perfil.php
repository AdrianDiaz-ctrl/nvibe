<?php

if (isset($_POST["ingresar"])) {   //Se activa cuando el usuario da clic en el boton

  $nombre_foto = $_FILES['imagen_producto']['name'];

  $ubicacion_foto = "upload/".$nombre_foto;

  $extension_foto = pathinfo($ubicacion_foto,PATHINFO_EXTENSION);
  $extension_foto = strtolower($extension_foto);

  $validar_extension = array("jpg","png","jpeg");

  if (in_array($extension_foto,$validar_extension))
  {
    move_uploaded_file($_FILES['imagen_producto']['tmp_name'],$ubicacion_foto);
  }

  
  $datos = array(
    $_POST["nombre_producto"],
    $_POST["descripcion_producto"],
    $_POST["precio_producto"],
    $nombre_foto
  

  );

  $insertar = ControladorProductos::contrInsertarProductos($datos);


  if ($insertar == "ok") {
    echo "<script>
        alert('Producto insertado correctamente...');
       </script>";
  }

  if ($insertar == "error") {
    echo "<script>
        alert('ERROR');
       </script>";
  }
}
?>

<html lang="es">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Perfil de Usuario</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    </head>

    <body>

        <!-- Navigation-->
        <!-- <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container px-4 px-lg-5">
                <a class="navbar-brand" href="#!">Start Bootstrap</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                        <li class="nav-item"><a class="nav-link active" aria-current="page" href="#!">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="#!">About</a></li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Shop</a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="#!">All Products</a></li>
                                <li><hr class="dropdown-divider" /></li>
                                <li><a class="dropdown-item" href="#!">Popular Items</a></li>
                                <li><a class="dropdown-item" href="#!">New Arrivals</a></li>
                            </ul>
                        </li>
                    </ul>
                    <form class="d-flex">
                        <button class="btn btn-outline-dark" type="submit">
                            <i class="bi-cart-fill me-1"></i>
                            Cart
                            <span class="badge bg-dark text-white ms-1 rounded-pill">0</span>
                        </button>
                    </form>
                </div>
            </div>
        </nav> -->

        <!-- Product section-->
        <!-- <section class="py-5">
            <div class="container px-4 px-lg-5 my-5">
                <div class="row gx-4 gx-lg-5 align-items-center">
                    <div class="col-md-6"><img class="card-img-top mb-5 mb-md-0" src="https://dummyimage.com/600x700/dee2e6/6c757d.jpg" alt="..." /></div>
                    <div class="col-md-6">
                        <div class="small mb-1">SKU: BST-498</div>
                        <h1 class="display-5 fw-bolder">Shop item template</h1>
                        <div class="fs-5 mb-5">
                            <span class="text-decoration-line-through">$45.00</span>
                            <span>$40.00</span>
                        </div>
                        <p class="lead">Lorem ipsum dolor sit amet consectetur adipisicing elit. Praesentium at dolorem quidem modi. Nam sequi consequatur obcaecati excepturi alias magni, accusamus eius blanditiis delectus ipsam minima ea iste laborum vero?</p>
                        <div class="d-flex">
                            <input class="form-control text-center me-3" id="inputQuantity" type="num" value="1" style="max-width: 3rem" />
                            <button class="btn btn-outline-dark flex-shrink-0" type="button">
                                <i class="bi-cart-fill me-1"></i>
                                Add to cart
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </section> -->
    
  <div class="d-flex justify-content-center text-center">
  
  <form id="frmAgregar" role="form" method="POST" enctype="multipart/form-data">

  <h1 class="bg-info text-center">Actualizar perfil</h1>
    <div class="input-group mb-3">
      <span class="input-group-text" id="inputGroup-sizing-default">NOMBRE</span>
      <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="nombre_producto" placeholder="nombre del producto" autofocus="autofocus" pattern="[A-Za-z ]+" required="required" >

    </div>
    <div class="input-group mb-3">
      <span class="input-group-text" id="inputGroup-sizing-default">DESCRIPCIÓN</span>
      <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="descripcion_producto" placeholder="descripción" pattern="[A-Za-z ]+" required="required">
    </div>
    <div class="input-group mb-3">
      <span class="input-group-text" id="inputGroup-sizing-default">PRECIO</span>
      <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="precio_producto" maxlength="6" pattern="[0-9.,]+" required="required" placeholder="precio" >
    </div>
    <div class="input-group mb-3">
      <span class="input-group-text" id="inputGroup-sizing-default">IMAGEN</span>
      <input type="file" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="imagen_producto" placeholder="imagen" >
    </div>
    

    <button type="submit" name="ingresar" class="btn btn-info">Guardar</button>

  </form>
  </div>


</body>
</html>