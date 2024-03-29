<?php
    session_start();
    if(!isset($_SESSION['isLogged']) || $_SESSION['isLogged'] === FALSE){
    header("Location: /SistemaDeGestion/public/vista/login.html");
 }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Gestion de usuarios</title>
</head>
<body>
    
    <table style="width:100%"> 
        <tr>
            <th>Cedula</th>
            <th>Nombres</th>
            <th>Apellidos</th>
            <th>Direccion</th>
            <th>Telefono</th>
            <th>Correo</th>
            <th>Fecha Nacimiento</th>
        </tr>

        <?php
            include '../../../config/conexionBD.php';
            $sql="SELECT * FROM usuario";
            $result=$conn->query($sql);

            if($result->num_rows > 0){

                while($row = $result->fetch_assoc()){
                    echo "<tr>";
                    echo "<td>".$row['usu_cedula']."</td>";
                    echo "<td>".$row['usu_nombres']."</td>";
                    echo "<td>".$row['usu_apellidos']."</td>";
                    echo "<td>".$row['usu_direccion']."</td>";
                    echo "<td>".$row['usu_telefono']."</td>";
                    echo "<td>".$row['usu_correo']."</td>";
                    echo "<td>".$row['usu_fecha_nacimiento']."</td>";
                    echo "<td><a href='eliminar.php?codigo=".$row['usu_codigo']."'>Eliminar </a></td>";
                    echo "<td><a href='modificar.php?codigo=".$row['usu_codigo']."'>Modificar </a></td>";
                    echo "<td><a href='cambiar_contrasena.php?codigo=".$row['usu_codigo']."'>Cambiar Contraseña </a></td>";
                    echo "</tr>";
                }

            }else{
                echo "<tr>";
                echo "<td colspan='7'>No existen registrados en el sistema</td>";
                echo "</tr>";
            }
            $conn->close();
        ?>

    </table>
</body>
</html>