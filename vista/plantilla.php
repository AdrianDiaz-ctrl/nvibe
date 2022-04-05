<?php 
session_start();
?>

<html>

<head>
  <title>Proyecto</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

</head>

<body>
  
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">Proyecto Tercero Bachillerato</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="index.php?pagina=usuarios">Usuarios</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index.php?pagina=registro">Registro</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index.php?pagina=login">Login</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index.php?pagina=salir">Salir</a>
          </li>
          
          <li class="nav-item">
            <a class="nav-link disabled">Disabled</a>
          </li> 
        </ul>
        
      </div>
    </div>
  </nav>



  
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>


  <?php 

				#ISSET: isset() Determina si una variable está definida y no es NULL

				if(isset($_GET["pagina"])){

					if($_GET["pagina"] == "registro" ||
					   $_GET["pagina"] == "login" ||
					   $_GET["pagina"] == "usuarios" ||
					   $_GET["pagina"] == "editar" ||
					   $_GET["pagina"] == "salir" ||
             $_GET["pagina"] == "home")
          {

						include "vista/".$_GET["pagina"].".php";

					} else
                    {
                        include "vista/error404.php";
                    }


				}else{

					include "vista/login.php";

				}

				

			 ?>
</body>

</html>