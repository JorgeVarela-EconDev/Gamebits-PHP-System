<?php
session_start(); 
include 'conexion_be.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $correo = mysqli_real_escape_string($conexion, $_POST['email']);
    $contrasena = $_POST['password'];

    
    $query = "SELECT * FROM usuarios WHERE email = '$correo'";
    $resultado = mysqli_query($conexion, $query);

    if (mysqli_num_rows($resultado) == 1) {
        $usuario = mysqli_fetch_assoc($resultado);

        
        if (password_verify($contrasena, $usuario['contrasena'])) {
            
            $_SESSION['usuario'] = $usuario['nombre']; 
            header('Location: principal.php'); 
            exit;
        } else {
            echo '
                <script>
                    alert("Contraseña incorrecta.");
                    window.location = "../index.php";
                </script>
            ';
        }
    } else {
        echo '
            <script>
                alert("Correo no registrado.");
                window.location = "../index.php";
            </script>
        ';
    }
}

mysqli_close($conexion);
?>