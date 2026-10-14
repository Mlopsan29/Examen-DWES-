<!DOCTYPE html>
<hmtl lang="es">

<head>

<meta charset="UTF-8">
<title> Ejercicio 3. Configuración de estilos </title>
</head>

<body>

<h2> Personaliza el aspecto de la página </h2>

<!-- Enviamos los datos a resultado.php mediante POST -->

<form action="resultado.php" method="post">

    <!-- 1. El color de fondo -->
     <p>
        <label> Color de fondo: </label><br>
        <input type="color" name="color_fondo" value="#ffffff"> <!-- Empieza en color blanco --> 
     </p>

<!--2. Color de texto -->
<p>
    <label> Color de texto: </label><br>
    <input type="color" name="color_texto" value="#000000">
</p>

<!--3. Tipo de letra (la fuente) -->
<select name="fuente">
    <option value="Arial, sans-serif">Arial</option>
    <option value=" 'Courier New', monospace"> Courier New </option>
    <option value=" 'Times New Roman', serif"> Times New Roman </option>
    <option value="Verdana, sans-serif"> Verdana </option>
</select>

<!-- 4. Tamaño de la fuente -->
 <p>
    <label> Tamaño de letra (px):</label><br>
    <input type="number" name="tamano" min="12" max="32" value="16">
 </p>

 <!--5. Alineación del texto  "checked" es el que aparece por defecto ya marcado --> 
 <p>
    <label> Alineación del texto:</label><br>
    <input type="radio" name="alineacion" value="left" checked> Izquierda
    <input type="radio" name="alineacion" value="center"> Centro
    <input type="radio" name="alineacion" value="right"> Derecha
 </p>

 <!--6. Imagen del banner (3 opciones) -->

 <p>
    <label> Elige el banner: </label><br>
    <input type="radio" name="banner" value="https://picsum.photos/id/1015/800/200" checked> Montaña <br>
    <input type="radio" name="banner" value="https://picsum.photos/id/1018/800/200"> Naturaleza<br>
    <input type="radio" name="banner" value="https://picsum.photos/id/1067/800/200"> Ciudad
 </p>

 <br>
 <input type="submit" name="enviar" value="Aplicar y ver resultado">
</form>
</body>
</hmtl>