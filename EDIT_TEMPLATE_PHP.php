<?php

//error_reporting(0);

include_once 'connection.php';

if (isset($_POST['Update'])) {
    $id = $_POST['id'];
    $first_name = filter_input(INPUT_POST, 'first_name', FILTER_SANITIZE_SPECIAL_CHARS);
    $last_name = $_POST['last_name'];
    $username = $_POST['username'];
    $cidade = $_POST['cidade'];
    $cep = $_POST['cep'];

    if (empty($first_name) || empty($last_name) || empty($username) || empty($cidade) || empty($cep)){

        if (!isset($first_name)):
            echo '<div class="alert alert-danger"> Digite seu nome </div>';
        endif;
        if (!isset($last_name)):
            echo '<div class="alert alert-danger"> Digite seu sobrenome</div>';
        endif;

        if (!isset($username)):
            echo '<div class="alert alert-danger">Digite a seu username</div>';
        endif;

        if (!isset($cidade)):
            echo '<div class="alert alert-danger"> Digite sua Cidade</div>';
        endif;

        if (!isset($cep)):
            echo '<div class="alert alert-danger"> Digite seu  Cep</div>';
        endif;
    } else {

        $stmt = $conn->prepare("UPDATE usuarios SET first_name =:first_name, last_name =:last_name, username=:username, cidade=:cidade, cep=:cep WHERE id= :id");

        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':first_name', $first_name, PDO::PARAM_STR);
        $stmt->bindParam(':last_name', $last_name, PDO::PARAM_STR);
        $stmt->bindParam(':username', $username, PDO::PARAM_STR);
        $stmt->bindParam(':cidade', $cidade);
        $stmt->bindParam(':cep', $cep);
        $stmt->execute();

        header('Location: listar.php');
    }
}
?>


<?php
$id = $_GET['id'];

$stmt = $conn->prepare("SELECT  * FROM usuarios WHERE id=:id");

$stmt->execute(array('id' => $id));

while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    //$id = $row['id'];
    $first_name = $row['first_name'];
    $last_name = $row['last_name'];
    $username = $row['username'];
    $cidade = $row['cidade'];
    $cep = $row['cep'];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<title>Document</title>
</head>

<body style="padding-left: 15px;">

    <form action="edit.php" method="post">
        <input type="text" name="id" value="<?php echo $id; ?>" disabled>
        <label class="form-label">Nome:</label>
        <input type="text" name="first_name" class="form-control" value="<?php echo $first_name; ?>"  />
        <label class="form-label">Sobrenome:</label>
        <input type="text" name="last_name" class="form-control" value="<?php echo $last_name; ?>"  />
        <label class="form-label">Username</label>
        <input type="text" name="username" class="form-control" value="<?php echo $username; ?>"  />
        <label class="form-label">Cidade</label>
        <input type="text" name="cidade" class="form-control" value="<?php echo $cidade; ?>" />

        <label class="form-label">Cep</label>
        <input type="text" name="cep" class="form-control" value="<?php echo $cep; ?>"  /><br>

        

        <input type="hidden" name='id' value="<?php echo $id; ?>" />

        <input type="submit" name="Update" value="Adicionar" class="btn btn-warning" /><br>
    </form>
</body>

</html>