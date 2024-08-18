<?php
//incluir conexión 
include 'php/conectionBD.php';

//Consultar totdos los registros de la tabla datos

$query = "SELECT * FROM compra";
$result = mysqli_query($conexion, $query);

//recoger los registros y mostrarlos
if($result->num_rows>0){

    //formato a la tabla, encabezado
    echo "<table border='1'>
    <tr>
    <th>ID</th>
    <th>Libro</th>
    <th>ISBN</th>
    <th>Nombre</th>
    <th>Teléfono</th>
    <th>Email</th>
    <th>Numero de tarjeta</th>
    </tr>";
    while($row = $result-> fetch_assoc()){

        echo "<tr>
       <td> " . $row["id"].  " </td>
       <th> " . $row["libro"]. " </th>
       <th> " . $row["isbn"]. " </th>
       <td> " . $row["nombre"]. " </td>
       <td> " . $row["telefono"].  " </td>
       <td> ". $row["correo"]. " </td>
       <td> ". $row["tarjeta"]. " </td>
        </tr>";
    }
}
?>