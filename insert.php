<?php

$id = $_GET['id'];
try {
  $conn = new PDO('mysql:host=localhost;dbname=meuBancoDeDados', $username, $password);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

  $stmt = $conn->prepare("INSERT INTO minhaTabela (id) VALUES(:id)");
  $stmt->execute([
    ':id' => $id
  ]);

  echo $stmt->rowCount();
} catch(PDOException $e) {
  echo 'Error: ' . $e->getMessage();

}
?>