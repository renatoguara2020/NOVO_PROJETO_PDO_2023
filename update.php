<?php

$id = 5;
$id = $_GET['id'];
$nome = "Novo nome do Ricardo";

try {
  $pdo = new PDO('mysql:host=localhost;dbname=meuBancoDeDados', $username, $password);
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_ASSOC);

  $stmt = $pdo->prepare('UPDATE minhaTabela SET nome = :nome WHERE id = :id');
  $stmt->execute(array(
    ':id'   => $id,
    ':nome' => $nome
  ));

  echo $stmt->rowCount();
} catch(PDOException $e) {
  echo 'Error: ' . $e->getMessage();
}
?>