<?php
// Configuración de la conexión a la base de datos
$servername = "localhost"; // Cambia si tu servidor es diferente
$username = "root";   // Cambia por tu usuario
$password = ""; // Cambia por tu contraseña
$dbname = "proyecto_web_pereira";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Comprobar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Procesar el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $telefono = $_POST['telefono'];
    $mensaje = $_POST['mensaje'];

    // Preparar y vincular
    $stmt = $conn->prepare("INSERT INTO contacto (nombre, email, telefono, mensaje) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $nombre, $email, $telefono, $mensaje);

    // Ejecutar la consulta
    if ($stmt->execute()) {
        //echo "Nuevo registro creado exitosamente";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Cerrar la declaración
    $stmt->close();
}

// Cerrar la conexión
$conn->close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario Enviado</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
            text-align: center;
        }
        h1 {
            color: #28a745; /* Verde */
            margin-bottom: 20px;
            margin-top: -10px
             
        }
        p {
            font-size: 18px;
            margin-bottom: 30px;
            color: #555; /* Gris oscuro */
        }
        a {
            text-decoration: none;
            color: #007bff; /* Azul */
            font-weight: bold;
            padding: 10px 15px;
            border: 2px solid #007bff;
            border-radius: 5px;
            transition: background-color 0.3s, color 0.3s;
        }
        a:hover {
            background-color: #007bff;
            color: white;
        }
    </style>
</head>
<body>
    <h1>Gracias por contactarnos</h1>
    <p>Tu mensaje ha sido enviado exitosamente.</p>
    <a href="../paginas/index.html">Volver a la página de inicio</a>
</body>
</html>