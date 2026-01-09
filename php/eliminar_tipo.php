<?php
include 'conexion_be.php';

if (isset($_GET['id'])) {
    $id = mysqli_real_escape_string($conexion, $_GET['id']);
    $query = "DELETE FROM tipos WHERE id = $id";

    if (mysqli_query($conexion, $query)) {
        header("Location: ../tipos.php?exito=3");
        exit;
    } else {
        header("Location: ../tipos.php?error=" . urlencode(mysqli_error($conexion)));
        exit;
    }
} else {
    header("Location: ../tipos.php");
    exit;
}
?>