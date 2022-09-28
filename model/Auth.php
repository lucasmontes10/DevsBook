<?php
require_once "dao/UserDaoMysql.php";

class Auth{
    private $pdo;
    private $url;
    public function __construct(PDO $pdo, $baseUrl)
    {
        $this->pdo = $pdo;
        $this->url = $baseUrl;
    }

    public function checkToken(){
        //se o usuario tiver um token na sessao va para o banco de dados e verifique
        if (!empty($_SESSION['token'])){
            $token = $_SESSION['token'];
            $dao = new UserDaoMysql($this->pdo);
            $user = $dao->findByToken($token);
            if ($user){
                return $user;
            }
        }
        //se ele não achar no banco de dados o token vinculado ao user
        //ele coloca direto para a page de login
        header("Location: ".$this->url."/_MODELO/login.html");
        exit;
    }
}