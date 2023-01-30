<?php

include_once 'connection.php';

$id = $_GET['id'];

// try {
//     $conn = new PDO('mysql:host=localhost; dbname=login', 'root', '');
//     $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//     $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
// } catch (PDOException $e) {
//     echo 'Error: ' . $e->getMessage();
// }

$stmt = $conn->prepare('DELETE FROM usuarios WHERE id = :id');

$stmt->execute([':id' => $id]);

header('Location: listar.php');