<?php
require_once 'model/User.php';
class UserDaoMysql implements UserDAO{
    private $pdo;

    public function __construct(PDO $driver)
    {
        $this->pdo = $driver;
    }

    private function createUser($array){
        $u = new User();
        $u->id = $array['id'] ?? 0;
        $u->email = $array['email'] ?? '';
        $u->name = $array['name'] ?? '';
        $u->password = $array['password'] ?? '';
        $u->birthdate = $array['birthdate'] ?? '';
        $u->city = $array['city'] ?? '';
        $u->work = $array['work'] ?? '';
        $u->avatar = $array['avatar'] ?? '';
        $u->cover = $array['cover'] ?? '';
        $u->token = $array['token'] ?? '';
        return $u;
    }

    public function findByToken($token)
    {
        if(!empty($token)){
            $sql = $this->pdo->prepare("SELECT * FROM user WHERE token = :token");
            $sql->bindValue(":token", $token);
            $sql->execute();

            if($sql->rowCount() > 0){
                $dados = $sql->fetch(PDO::FETCH_ASSOC);
                $user = $this->createUser($dados);
                return $user;
            }
        }
        return false;
    }
}