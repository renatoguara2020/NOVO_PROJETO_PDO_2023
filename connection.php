<?php

try {
    $conn = new PDO('mysql:host=localhost; dbname=login', 'root', '');
    $conn->setAttribute(PDO::ATTR_ERRMODE_WARNING, PDO::ERRMODE_WARNING);
    echo 'Connected Successfully!!!!!';
} catch (PDOException $e) {
    echo 'Error: ' . $e->getMessage();
}