<?php

class User{
    public $id;
    public $email;
    public $password;
    public $name;
    public $birthdate;
    public $city;
    public $wrok;
    public $avatar;
    public $cover;
    public $token;
}

interface UserDAO{
    public function findByToken($token);
}