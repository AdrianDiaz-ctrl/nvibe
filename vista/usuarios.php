<?php
// require_once "../controlador/controlador.usuarios.php";

if (!isset($_SESSION["validarIngreso"])) {

    echo '<script>window.location = "index.php?pagina=login";</script>';

    return;
} else {

    if ($_SESSION["validarIngreso"] != "ok") {

        echo '<script>window.location = "index.php?pagina=login";</script>';

        return;
    }
}

//Proceso para llenar la tabla con datos de los usuario de la BDD
$usuario = ControladorUsuarios::contrConsultaUsuarios();
if (empty($usuario)) {
    echo "No hay registro de usuario</td>";
}
?>
<html>

<head>
    <title>Usuarios</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/64999b8509.js" crossorigin="anonymous"></script>

</head>

<body>
    <h1 class="text-center">Lista de Usuarios</h1>

    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Nombre</th>
                <th scope="col">Edad</th>
                <th scope="col">ocupacion</th>
                <th scope="col">correo</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($usuario as $fila => $columna) : ?>
                <tr>

                    <td><?php echo $columna["id"] ?></td>
                    <td><?php echo $columna["nombre"] ?></td>
                    <td><?php echo $columna["edad"] ?></td>
                    <td><?php echo $columna["ocupacion"] ?></td>
                    <td><?php echo $columna["correo"] ?></td>
                    <td>
                        <div class="btn-group">
                            <div class="px-1">
                                <!-- da error jeje -->
                                <!-- <a href="index.php?pagina=editar&id=<?php echo $value['id']; ?>" class="btn btn-warning"><em class="fas fa-pencil-alt"></em></a> -->

                            </div>

                            <form method="post">

                                <input type="hidden" value="<?php echo $columna["id"]; ?>" name="eliminarUsuario">

                                <button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>

                                <?php

                                $eliminar = new ControladorUsuarios();
                                $eliminar -> crtEliminarUsuarios();

                                ?>

                            </form>
                        </div>
                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>
</html>