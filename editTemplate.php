<?php

include_once   './connection.php';
if(isset($_POST['submit'])){
     
    $id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_INT);
    $first_name = filter_input(INPUT_POST, 'first_name', FILTER_SANITIZE_SPECIAL_CHARS);
    $last_name = filter_input(INPUT_POST, 'last_name', FILTER_SANITIZE_SPECIAL_CHARS);
    $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_SPECIAL_CHARS);


    $stmt = $conn->prepare("UPDATE usuarios SET first_name = :first_name, last_name = :last_name WHERE id = :id");

    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->bindParam(':first_name', $first_name, PDO::PARAM_STR);
    $stmt->bindParam(':last_name', $last_name,PDO::PARAM_STR);
    $stmt->bindParam(':uername', $username, PDO::PARAM_STR);


}


?>



<?php


$id = $_GET['id'];

$stmt = $conn->prepare("SELECT  * FROM usuarios WHERE id = :id ");
$stmt->execute([':id' => $id]);

while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
   
    $id = $row['id'];
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
        <title>Document</title>
    </head>
    <body>
     <div class="container"> 
        <form action="editTemplate.php" method="post" class="form-control">

        <label class="form-label">Nome:</label>
        <input type="text" class="form-control" name="first_name" value="<?php echo $first_name; ?>"  />
        <label class="form-label">Sobrenome:</label>
        <input type="text" class="form-control" name="last_name" value="<?php echo $last_name; ?>"   />
        <label class="form-label">Username:</label>
        <input type="text" class="form-control" name="username" value="<?php echo $username; ?>" />
        <input type="hidden" name="id" value="<?php echo $id ?>"/>
        <input type="submit" name="submit" value="Cadastrar" />
        </form>
   </div>  
    </body>
    </html>