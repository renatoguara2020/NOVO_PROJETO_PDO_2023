<?php

include_once 'connection.php';

$stmt = $conn->prepare("SELECT nome, usuario FROM login;");


while ($linha = $stmt->fetch(PDO::FETCH_ASSOC)) {
    echo "Nome: {$linha['nome']} - Usuário: {$linha['usuario']}<br />";
}
?>