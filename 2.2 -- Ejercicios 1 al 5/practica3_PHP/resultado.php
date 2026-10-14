<?php
// Se sale si intentan acceder a resultado sin enviar el formulario.

if (!isset($_POST['enviar'])) {
    header("Location: configuracion.php");
    exit();
}

// Recoger las variables enviadas por el formulario

$color_fondo = $_POST['color_fondo'];
$color_texto = $_POST['color_texto'];
$fuente = $_POST['fuente'];
$tamano = $_POST['tamano'];
$alineacion = $_POST['alineacion'];
$banner = $_POST['banner'];
?>

<!DOCTYPE html>
<html lang = "es">
    <head>
        <meta charset="UTF-8">
        <title> Página con estilos personalizados </title>

        <!-- Que aparezcan los valores de PHP directamente en el CSS -->

        <style>
            body {
                background-color: <?php echo $color_fondo; ?>;
                color: <?php echo $color_texto; ?>;
                font-family: <?php echo $fuente; ?>;
                font-size: <?php echo $fuente; ?>;
                text-align: <?php echo $alineacion; ?>;
                margin: 40px;
            }

            .contenedor {
                max-width: 800px;
                margin: 0 auto;
                border: 2px;
                padding: 20px;
                background-color: (255, 255, 255, 0.4);
            }

            .banner-img {
                width: 100%;
                height: auto;
                border-radius: 8px;
                margin-bottom: 20px;
            }

    </style>
    </head>

    <body>

    <div class="contenedor">

    <!-- La imagen de cabecera elegida se muestra aquí -->
     <img class="banner-img" src="<?php echo $banner; ?> " alt="Banner seleccionado">

     <h1> ¡Bienvenido a tu propia página personalizada! </h1>

     <p>
        Este texto es un texto de ejemplo para comprobar que todos los parámetros seleccionados funcionan correctamente.
     </p>

     <p>
        Puedes volver atrás para cambiar los valores.
     </p>

     <p>
        <a href="configuracion.php"> Volver a configurar estilos </a>
     </p>
    </div>
    </body>
</html>