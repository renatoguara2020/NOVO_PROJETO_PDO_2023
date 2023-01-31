<?php

try {
    $conn = @new PDO('mysql:host=localhost; dbname=login', 'root', '');
    //$conn->setAttribute(PDO::ATTR_ERRMODE_EXCEPTION, PDO::ERRMODE_EXCEPTION);
   // $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_MODE_ASSOC);
    echo 'Connected Successfully!!!!!';
} catch (PDOException $e) {
    echo 'Error: ' . $e->getMessage();
}