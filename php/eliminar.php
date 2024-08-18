<?php
// Incluye el archivo de conexión a la base de datos
include 'conectionBD.php';

// Verifica si el formulario fue enviado mediante POST
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    // Obtener el ID del formulario
    $id = $_POST['id'];

    // Preparar la consulta DELETE
    $eliminar = "DELETE FROM compra WHERE id = ?";

    // Preparar la declaración
    if ($stm = $conexion->prepare($eliminar)) {
        // Enlazar el parámetro ID a la declaración preparada
        $stm->bind_param("i", $id);

        // Ejecutar la consulta
        if ($stm->execute()) {

        } else {
            echo "Error al eliminar el registro: " . $conexion->error;
        }

        // Cerrar la declaración
        $stm->close();
    } else {
        echo "Error al preparar la consulta: " . $conexion->error;
    }

    // Cerrar la conexión
    $conexion->close();
}
?>


<!DOCTYPE html>
<html lang="es">
    <head>
        <title>Libros & Sueños</title>
        <link rel="stylesheet" href="../estilos/principal.css">
        <link rel="stylesheet" href="../estilos/menu.css">
        <link rel="stylesheet" href="../estilos/banner.css">
        <link rel="stylesheet" href="../estilos/blog.css">
        <link rel="stylesheet" href="../estilos/info.css">
        <link rel="stylesheet" href="../estilos/footer.css">
        <link rel="stylesheet" href="../estilos/eliminar.css">
        <link rel="stylesheet" href="../estilos/fontello.css">
        <meta charset="utf-8">
    </head>

    <body>
        <!-- Encabezado -->
        <header>
            <div class="contenedor">
                <h1 class="icon-efecto2">Eliminar Compra</h1>
                <input type="checkbox" id="menu-icn">
                <label class="icon-menu" for="menu-icn"></label>

                <nav class="menu">
                    <a href="index.html">Inicio</a>
                    <a href="catalogo.html">Catálogo</a>
                    <a href="galeria.html">Galería</a>
                    <a href="contacto.html">Compra</a>
                </nav>
            </div>
        </header>

        <!-- Contenido Principal -->
        <main>
            <section id="banner">
                <img src="../imagenes/banner6.jpg" width="800">
                <div class="contenedor">
                    <h2>Tu mundo literario en un solo lugar.</h2>
                    <h3>Encuentra los mejores libros a los mejores precios. Lee, disfruta y aprende.</h3>
                    <a href="catalogo.html">Comprar Ahora</a>
                </div>
            </section>

            <section class="eliminar">
                <div class="contenedor">
                    <h2>Elimina un registro</h2>
                    <form action="php/eliminar.php" method="post">
                        <div class="campo">
                            <label>ID de la compra:</label>
                            <input type="text" id="id" name="id" class="input-text" required />
                        </div>
                        <input type="submit" value="Eliminar" class="boton" />
                    </form>
                </div>
            </section>
        </main>

        <!-- Pie de página -->
        <footer>
            <div class="contenedor">
                <p class="pie">CopyRight &copy; Denisse Guadalupe Monroy Angeles</p>
                <div class="sociales">
                    <a href="https://www.instagram.com/" class="icon-instagram"></a>
                    <a href="https://www.facebook.com/?locale=es_LA" class="icon-facebook"></a>
                    <a href="https://x.com/" class="icon-twitter"></a>
                </div>
            </div>
        </footer>
    </body>
</html>
