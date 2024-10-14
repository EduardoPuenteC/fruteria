<?php
include '../conexion.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];
    
    // Consulta para obtener el usuario con ese email
    $query = "SELECT * FROM usuarios WHERE email = '$email'";
    $result = $conexion->query($query);

    if ($result->num_rows > 0) {
        $usuario = $result->fetch_assoc();
        
        // Verificar si la contraseña es correcta
        if (password_verify($password, $usuario['password'])) {
            echo "Inicio de sesión exitoso. Bienvenido, " . $usuario['nombre'];
            // Aquí puedes redirigir o hacer otras acciones
        } else {
            echo "Contraseña incorrecta.";
        }
    } else {
        echo "No existe ningún usuario con ese email.";
    }
}
?>
