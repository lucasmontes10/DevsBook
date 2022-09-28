<?php
require "config.php";

require_once "model/Auth.php";

$autenticar = new Auth($pdo, $base);
$userInfo = $autenticar->checkToken();

?>

<h1>Bem vindo a page inicial do nosso DevsBook</h1> 