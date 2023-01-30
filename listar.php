<?php

include_once 'connection.php';

//$conn = new PDO('mysql:host=localhost; dbname=login', 'root', '');

$result = $conn->query('SELECT * FROM usuarios ORDER BY id ASC');
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
$conn->exec("SET NAMES 'UTF8' ");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500&display=swap" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css?family=Source+Serif+Pro:400,600&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="fonts/icomoon/style.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    
    <!-- Style CSS -->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <title>Document</title>
</head>

<body style="padding-left: 15px; padding-right: 15px;"><br><br>
  
    <!-- <a href="cadastrar.html">Cadastrar Usuário</a> -->
    <a href="cadastrar.html" class="btn btn-success btn-lg"><i class="bi bi-check2-circle"></i>&nbsp;Cadastrar</a><br><br>
    
    <table class="table table-striped table-hover">

        <thead class="table-dark">
            <th scope="col">ID</th>
            <th scope="col">Nome</th>
            <th scope="col">Sobrenome</th>
            <th scope="col">Username</th>
            <th scope="col">Cidade</th>
            <th scope="col">CEP</th>
            <th scope="col">Estado</th>
            <th scope="col">Update || Delete</th>
        </thead>
        <?php
        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            echo '<tbody>';
            echo '<tr>';
            echo '<td>' . $row['id'] . '</td>';
            echo '<td>' . $row['first_name'] . '</td>';
            echo '<td>' . $row['last_name'] . '</td>';
            echo '<td>' . $row['username'] . '</td>';
            echo '<td>' . $row['cidade'] . '</td>';
            echo '<td>' . $row['cep'] . '</td>';
            echo '<td>' . $row['estado'] . '</td>';
            //echo "<td><a href=\"edit.php?id=$row[id]\">Update</a> | <a href=\"delete.php?id=$row[id]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";
            echo "<td><a href=\"edit.php?id=$row[id]\" class=\"btn btn-warning btn-sm\"><i class=\"bi bi-pencil-fill\"></i>&nbsp;Update</a> || <a href=\"delete.php?id=$row[id]\"  onClick=\"return confirm('Are you sure you want to delete?')\" class=\"btn btn-danger btn-sm\"><i class=\"bi bi-trash-fill\"></i>&nbsp;Delete</a></td>";

        }   

        echo '</tr>';
        ?>
     </tbody>
    </table>
    <div class="content d-flex align-items-center bg-light">
      <h2 class="w-100 text-center">Footer #7</h2>
    </div>
    
    <footer class="footer-48201">
      
      <div class="container">
        <div class="row">
          <div class="col-md-4 pr-md-5">
            <a href="#" class="footer-site-logo d-block mb-4">Colorlib</a>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eligendi quasi perferendis ratione perspiciatis accusantium.</p>
          </div>
          <div class="col-md">
            <ul class="list-unstyled nav-links">
              <li><a href="#">Home</a></li>
              <li><a href="#">About Us</a></li>
              <li><a href="#">Portfolio</a></li>
              <li><a href="#">Services</a></li>
              <li><a href="#">Contact</a></li>
            </ul>
          </div>
          <div class="col-md">
            <ul class="list-unstyled nav-links">
              <li><a href="#">Clients</a></li>
              <li><a href="#">Team</a></li>
              <li><a href="#">Career</a></li>
              <li><a href="#">Testimonials</a></li>
              <li><a href="#">Journal</a></li>
            </ul>
          </div>
          <div class="col-md">
            <ul class="list-unstyled nav-links">
              <li><a href="#">Privacy Policy</a></li>
              <li><a href="#">Terms &amp; Conditions</a></li>
              <li><a href="#">Partners</a></li>
            </ul>
          </div>
          <div class="col-md text-md-center">
            <ul class="social list-unstyled">
              <li><a href="#"><span class="icon-instagram"></span></a></li>
              <li><a href="#"><span class="icon-twitter"></span></a></li>
              <li><a href="https://www.facebook.com/renatoalves.soares.56"><span class="icon-facebook"></span></a></li>
              <li><a href="#"><span class="icon-pinterest"></span></a></li>
              <li><a href="#"><span class="icon-dribbble"></span></a></li>
            </ul>
            <p class=""><a href="#" class="btn btn-tertiary">Contact Us</a></p>
          </div>
        </div> 

        <div class="row ">
          <div class="col-12 text-center">
            <div class="copyright mt-5 pt-5">
              <p><small>&copy; 2019-2022 All Rights Reserved.</small></p>
            </div>
          </div>
        </div> 
      </div>
      
    </footer>

    
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
      
</body>

</html>