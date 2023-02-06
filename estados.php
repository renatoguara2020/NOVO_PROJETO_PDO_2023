<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Estados</h1>
</body>
</html>


<?php



 $estados = array("AC"=>"Acre", "AL"=>"Alagoas", "AM"=>"Amazonas", "AP"=>"AmapÃ¡","BA"=>"Bahia","CE"=>"CearÃ¡","DF"=>"Distrito Federal","ES"=>"EspÃ­rito Santo","GO"=>"GoiÃ¡s","MA"=>"MaranhÃ£o","MT"=>"Mato Grosso","MS"=>"Mato Grosso do Sul","MG"=>"Minas Gerais","PA"=>"ParÃ¡","PB"=>"ParaÃ­ba","PR"=>"ParanÃ¡","PE"=>"Pernambuco","PI"=>"PiauÃ­","RJ"=>"Rio de Janeiro","RN"=>"Rio Grande do Norte","RO"=>"RondÃ´nia","RS"=>"Rio Grande do Sul","RR"=>"Roraima","SC"=>"Santa Catarina","SE"=>"Sergipe","SP"=>"SÃ£o Paulo","TO"=>"Tocantins");

 foreach($estados as $key => $value) {
    echo $key . "-" . $value . "<br/>";
}