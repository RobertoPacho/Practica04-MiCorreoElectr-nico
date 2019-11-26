<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Crear Nuevo Usuario</title>
    <style type="text/css" rel="stylesheet">
        .error{
            color: red;
        }
    </style>
</head>
<body>
    <?php
        include '../../config/conexionBD.php';

        $cedula=isset($_POST["cedula"])?trim($_POST["cedula"]):null;
        $nombres=isset($_POST["nombres"])?trim($_POST["nombres"]):null;
        $apellidos=isset($_POST["apellidos"])?trim($_POST["apellidos"]):null;
        $direccion=isset($_POST["direccion"])?trim($_POST["direccion"]):null;
        $telefono=isset($_POST["telefono"])?trim($_POST["telefono"]):null;
        $correo=isset($_POST["correo"])?trim($_POST["correo"]):null;
        $fechaNacimiento=isset($_POST["fechaNacimiento"])?trim($_POST["fechaNacimiento"]):null;
        $contrasena=isset($_POST["contrasena"])?trim($_POST["contrasena"]):null;
    
        //
        $busqueda="SELECT usu_cedula FROM usuario where usu_cedula='$cedula'";
        $result = $conn->query($busqueda);
        if($result->num_rows > 0){
            while($row = $result->fetch_assoc()){
                if($row["usu_cedula"] = $cedula){
                    echo "<p class='error'>La persona con la cedula $cedula ya esta registrada en el sistema </p>";
                }else{
                    $sql="INSERT INTO usuario VALUES(0,'$cedula','$nombres','$apellidos','$direccion','$telefono','$correo',MD5('$contrasena'),'$fechaNacimiento','N',null,null)";
                    $conn->query($sql);
                }
            }
        }else{
            $sql="INSERT INTO usuario VALUES(0,'$cedula','$nombres','$apellidos','$direccion','$telefono','$correo',MD5('$contrasena'),'$fechaNacimiento','N',null,null)";
            $conn->query($sql);
        }
        /*if($conn->query($busqueda)=TRUE){
            echo "<p class='error'>La persona con la cedula $cedula ya esta registrada en el sistema </p>";
        }else{
            echo "<p class='error'>Error. ". mysqli_error($conn). "</p>";
        }*/

        //cerrar la base de datos 

        $conn->close();
        echo "<a href='../vista/crear_usuario.html'>Regresar</a>"
    ?>
</body>
</html>
