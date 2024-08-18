<?php
include 'conectionBD.php';



//declarar variables para almacenar resultados
$isbn='';
$libro='';
$nombre='';
$telefono='';
$correo='';
$tarjeta='';


//indicamos el metodo de conexion
//para enviar los datos
if($_SERVER['REQUEST_METHOD'] == "POST"){
    $id = $_POST['id'];

//consultar los datos
if(isset($_POST['consultar'])){
    $query = "SELECT isbn, libro, nombre, telefono, correo, tarjeta FROM compra WHERE id = ?";

    //ejecutamos la consulta 
    if($stmt = $conexion->prepare($query)){
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        if($result->num_rows > 0){
            while($row = $result -> fetch_assoc()){
                $isbn = $row['isbn'];
                $libro = $row['libro'];
                $nombre = $row['nombre'];
                $telefono = $row['telefono'];
                $correo = $row['correo'];
                $tarjeta = $row['tarjeta'];
            }
        } else{
            echo "No hay datos disponibles.";
        }
        //cerrar la declaracion 
        $stmt->close();
    } else{
        echo "Error: " . $conexion->error;
    }
}
}


//actualizar datos
if(isset($_POST['actualizar'])){
    $isbn = $_POST['isbn'];
    $libro =$_POST['libro'];
    $nombre = $_POST['nombre'];
    $telefono = $_POST['telefono'];
    $correo = $_POST['correo'];
    $tarjeta = $_POST['tarjeta'];

    $query = "UPDATE compra SET isbn =?, libro =?, nombre =?, telefono =?, correo =?, tarjeta =? WHERE id =?";

    //vinculamos parametros
    if($stmt = $conexion->prepare($query)){
        $stmt -> bind_param("ssssssi",$isbn, $libro, $nombre, $telefono, $correo, $tarjeta, $id);

        //ejecutamos la declaracion 
        if($stmt->execute()){


        }
        else{
            echo "Error al actualizar los datos: ".$conexion->error;
        }
        $stmt->close(); //cerrar la declaracion preparada 
    }
    else{
        echo "Error preparando la consulta: " .$conexion->error;
    }
}

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
            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" 
            class="formulario" method="post">
            <fieldset>
                <legend>¡Tu libro está a un paso! Completa este formulario para hacerlo suyo</legend>
                <div class="contenedor-campos">
    

                    <div class="campo">
                        <label>ID del Pedido</label>
                        <input type="id" class="input-text" placeholder="ID" class="input-text" name="id"
                        value="<?php echo htmlspecialchars($id);?>">
                    </div>
                            <div class="campo">
                                <label>Libro</label>
                                <input type="libro" class="input-text" placeholder="Título del libro" class="input-text" name="libro"
                                value="<?php echo htmlspecialchars($libro);?>">
                            </div>

                                        <div class="campo">
                                            <label>ISBN</label>
                                            <input type="isbn" class="input-text" placeholder="ISBN del libro"class="input-text" name="isbn"
                                            value="<?php echo htmlspecialchars($isbn);?>">
                                        </div>

                                                <div class="campo">
                                                    <label>Nombre completo</label>
                                                    <input type="nombre" placeholder="Tu nombre completo" class="input-text" name="nombre"
                                                    value="<?php echo htmlspecialchars($nombre);?>">
                                                </div>
                                
                                                        <div class="campo">
                                                            <label>Teléfono</label>
                                                            <input type="tel" class="input-text" placeholder="Tu teléfono" class="input-text" name="telefono"
                                                            value="<?php echo htmlspecialchars($telefono);?>">
                                                        </div>
                                
                                                                <div class="campo">
                                                                    <label>Correo</label>
                                                                    <input type="email" class="input-text" placeholder="Tu email" class="input-text" name="correo"
                                                                    value="<?php echo htmlspecialchars($correo);?>">
                                                                </div>
                                
                                                                        <div class="campo">
                                                                            <label>Número de tarjeta de crédito</label>
                                                                            <input type="tarjeta" class="input-text" placeholder="Tu número de tarjeta de crédito" class="input-text" name="tarjeta"
                                                                            value="<?php echo htmlspecialchars($tarjeta);?>">
                                                                        </div>

                                                                                    <div class="campo">
                                                                                        <label>Mensaje</label>
                                                                                        <textarea class="input-text"></textarea>
                                                                                    </div>    
                    <div><input type="submit" class="boton" value="Comprar">
                    
                        <input type="submit" class="boton" value="Actualizar compra"
                        name="actualizar">
                    </div>
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