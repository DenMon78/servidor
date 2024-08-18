<?php
//*Conexion a la base de datos
include 'conectionBD.php';



//crear 4 variables 
//para insertar datos a la base de datos 
//desde php
//$id = 1;

if($_SERVER["REQUEST_METHOD"]=="POST"){
$isbn = $_POST["isbn"];
$libro = $_POST["libro"];
$nombre = $_POST["nombre"];
$telefono = $_POST["telefono"];
$correo = $_POST["correo"];
$tarjeta = $_POST["tarjeta"];

//sentencia SQL para insertar 
$sql = "INSERT INTO compra (isbn, libro, nombre, telefono, correo, tarjeta)
VALUES ('$isbn', '$libro', '$nombre', '$telefono', '$correo', '$tarjeta')";

//EJECUTAR LA CONSULTA
if($conexion->query($sql) ==TRUE){


}
else{
    echo "datos NO insertados correctamente" .$conexion->error; 
}

}//CERRANDO EL IF DEL POST

//cerrar conexion
$conexion->close(); //cerrar conexion con la BD

?>



<!DOCTYPE html>
<html lang="es">
    <head>
        <title>Libros</title>
        <link rel="stylesheet" href="../estilos/principal.css">
        <link rel="stylesheet" href="../estilos/menu.css">
        <link rel="stylesheet" href="../estilos/banner.css">
        <link rel="stylesheet" href="../estilos/blog.css">
        <link rel="stylesheet" href="../estilos/info.css">
        <link rel="stylesheet" href="../estilos/catalogo.css">
        <link rel="stylesheet" href="../estilos/formulario.css">
        <link rel="stylesheet" href="../estilos/footer.css">
        <link rel="stylesheet" href="../estilos/fontello.css">
        <meta charset="utf-8">
    </head>

    <body>
        <header>
            <div class="contenedor">
                <h1 class="icon-efecto2">Libros & Sueños</h1>
                <input type="checkbox" id="menu-icn">
                <label class="icon-menu" for="menu-icn"></label>

                <nav class="menu">
                    <a href="index.html">Inicio</a>
                    <a href="catalogo.html">Catálogo</a>
                    <a href="galeria.html">Galería</a>
                    <a href="contacto.html">Contacto</a>
                </nav>
            </div>
        </header>

        <main>
            <!-- Sección del banner ya existente -->
            <section id="banner">
                <img src="../imagenes/banner6.jpg" width="800">
                <div class="contenedor">
                    <h2>Tu mundo literario en un solo lugar.</h2>
                    <h3>Encuentra los mejores libros a los mejores precios. Lee, disfruta y aprende.</h3>
                    <a href="catalogo.html">Comprar Ahora</a>
                </div>
            </section>


        <section>
            <form action="php/conexion.php" class="formulario" method="post">
            <fieldset>
                <legend>¡Tu libro está a un paso! Completa este formulario para hacerlo suyo</legend>
                <div class="contenedor-campos">
    

                    <div class="campo">
                        <label>ID del Pedido</label>
                        <input type="id" class="input-text" placeholder="ID" name="id">
                    </div>
                            <div class="campo">
                                <label>Libro</label>
                                <input type="libro" class="input-text" placeholder="Título del libro" name="libro">
                            </div>

                                        <div class="campo">
                                            <label>ISBN</label>
                                            <input type="isbn" class="input-text" placeholder="ISBN del libro" name="isbn">
                                        </div>

                                                <div class="campo">
                                                    <label>Nombre completo</label>
                                                    <input type="nombre" placeholder="Tu nombre completo" class="input-text" name="nombre">
                                                </div>
                                
                                                        <div class="campo">
                                                            <label>Teléfono</label>
                                                            <input type="tel" class="input-text" placeholder="Tu teléfono" name="telefono">
                                                        </div>
                                
                                                                <div class="campo">
                                                                    <label>Correo</label>
                                                                    <input type="email" class="input-text" placeholder="Tu email" name="correo">
                                                                </div>
                                
                                                                        <div class="campo">
                                                                            <label>Número de tarjeta de crédito</label>
                                                                            <input type="tarjeta" class="input-text" placeholder="Tu número de tarjeta de crédito" name="tarjeta">
                                                                        </div>

                                                                                    <div class="campo">
                                                                                        <label>Mensaje</label>
                                                                                        <textarea class="input-text"></textarea>
                                                                                    </div>
                                                                        
    
                    <div><input type="submit" class="boton" value="Comprar"></div>
                </div>
    
          
            </fieldset>
        </form>
    
        </section>  

    
        
</main>

<footer>
    <div class="contenedor">
        <p class="pie">CopyRight &copy; Denisse Gpe. Monroy Angeles</p>

            <div class="sociales">
                <a href="https://www.instagram.com/" class="icon-instagram"></a>
                <a href="https://www.facebook.com/?locale=es_LA" class="icon-facebook"></a>
                <a href="https://x.com/" class="icon-twitter"></a>
            </div>
    </div>
</footer>


    </body>
</html>





