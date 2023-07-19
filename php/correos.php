<?php
$destinatario = 'lucasemorgante@gmail.com';
$nombre = $_POST['nombre'];
$email = $_POST['email'];
$mensaje = $_POST['mensaje'];
$header = 'Enviado desde la web';
$mensajeCompleto = $mensaje . "\nAtentamente:" . $nombre;

mail($destinatario, $email, $mensajeCompleto, $header);
header ("Location:gracias.html");
echo "<script> setTimeout (\"location.href='gracias.html'\",100)</script>";

?>