<?php

$correo = isset($_POST['correo']) ? $_POST['correo'] : '';
$contraseña = isset($_POST['contraseña']) ? $_POST['contraseña'] : '';

$conn = new mysqli('localhost', 'root', '', 'proyectito');
if ($conn->connect_error) {
	die('Connection failed: ' . $conn->connect_error);
}

// Use prepared statement to avoid SQL injection
$stmt = $conn->prepare("INSERT INTO usuarios (correo, contraseña) VALUES (?, ?)");
if ($stmt) {
	$stmt->bind_param('ss', $correo, $contraseña);
	$stmt->execute();
	$stmt->close();
}

$conn->close();