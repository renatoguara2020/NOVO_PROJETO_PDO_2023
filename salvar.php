<?php

//$conn = new PDO('mysql:host=localhost; dbname=login', 'root', '');
require_once 'connection.php';

if (isset($_POST['cadastrar'])) {

    if (isset($_POST['first_name'])):

        $firstName = filter_input(INPUT_POST, "first_name", FILTER_SANITIZE_SPECIAL_CHARS);
    endif;

    if (isset($_POST['last_name'])):
        $lastName = filter_input(INPUT_POST, "last_name", FILTER_SANITIZE_SPECIAL_CHARS);
    endif;

    if (isset($_POST['username'])):
        $username = $_POST['username'];
    endif;

    if (isset($_POST['estado'])):
        $estado = $_POST['estado'];
    endif;

    if (isset($_POST['cidade'])):
        $cidade = $_POST['cidade'];
    endif;

    if (isset($_POST['cep'])):
        $cep = $_POST['cep'];
    endif;
    if (isset($_POST['estado'])):
        $estado = $_POST['estado'];
    endif;    

    $stmt = $conn->prepare("INSERT INTO usuarios (first_name, last_name, username, cidade, cep, estado)
    VALUES(:first_name, :last_name, :username, :cidade, :cep, :estado)");

    // $stmt->bindValue(':first_name', $firstName, PDO::PARAM_STR);
    // $stmt->bindValue(':last_name', $lastName, PDO::PARAM_STR);
    // $stmt->bindValue(':username', $username, PDO::PARAM_STR);
    // // $stmt->bindValue(':estado', $estado, PDO::PARAM_STR);
    // $stmt->bindValue(':cidade', $cidade, PDO::PARAM_STR);
    // $stmt->bindValue(':cep', $cep, PDO::PARAM_STR);


    // $stmt->execute();

    $stmt->execute([
        ':first_name' => $firstName,
        ':last_name' => $lastName,
        ':username' => $username,
        ':cidade' => $cidade,
        ':cep' => $cep,
        ':estado' => $estado,
    ]);

    if ($stmt->rowCount() > 0) {
        echo 'Usuário Cadastrado com Sucesso';
        header('Location:listar.php');
    } else {
        echo 'Usuário  não foi cadastrado ';
    }
}