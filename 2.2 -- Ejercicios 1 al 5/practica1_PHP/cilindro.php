
<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <title>Ejercicio 1. Volumen de un cilindro</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
  
        <?php
        if (isset($_POST['diametro']) && isset($_POST['altura'])) {

        $diametro = $_POST['diametro'];
        $altura = $_POST['altura'];

        $radio = $diametro / 2;
        $volumen = M_PI * ($radio * $radio) * $altura;
        $volumen_redondeo = round($volumen, 2);
        
        } else {
            $diametro = 0;
            $altura = 0;
            $radio = 0;
            $volumen_redondeo = 0;
        }
        ?>
        
   <div class="resultado-card">
    <h1> Cálculo del volumen de un cilindro </h1>

    <div class = "contenido">

    <img src="images/cilindro.png" alt ="Foto del cilindro">
    <div class = "datos">
        <p> <strong> Diámetro introducido: </strong> <?php echo $diametro; ?> </p>
        <p> <strong> Radio calculado: </strong> <?php echo $radio; ?> </p>
        <p> <strong> Altura introducida: </strong> <?php echo $altura; ?> </p>
        <p class="valor-final"> Volumen = <?php echo $volumen_redondeo; ?> </p>
    </div>
    </div>
    <a class="enlace-volver" href="index.html">&laquo; Calcular de nuevo </a>
   </div>

</body>
</html>