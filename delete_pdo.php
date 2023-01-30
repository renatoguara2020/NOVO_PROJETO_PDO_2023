<?php
$id = 5;

$id = $_GET['id'];

try {
  $conn = new PDO('mysql:host=localhost;dbname=meuBancoDeDados', $username, $password);
  $pdo->setAttribute(PDO::ATTR_ERRMODE_EXCEPTION, PDO::ERRMODE_EXCEPTION );
  $pdo->setAttribute(PDO::ATTR_ERRMODE_WARNING, PDO::ERRMODE_WARNING);
  $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);

  $stmt = $conn->prepare('DELETE FROM minhaTabela WHERE id = :id');
  $stmt->bindParam(':id', $id);
  $stmt->execute([':id' => $id]); 
   $stmt->execute(array(':id' => $id));

  if($stmt->rowCount() > 0):

    echo 'Usuário deletado com sucesso';

  endif;

} catch(PDOException $e) {

  echo 'Error Throwable: ' . $e->getMessage(). ' '. $e->getTraceAsString();
}
?>