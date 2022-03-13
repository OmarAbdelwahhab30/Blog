<?php

namespace PHPMVC\CONTROLLERS;

use PHPMVC\LIB\Abstractcontroller;

class signin extends Abstractcontroller
{

    private $model;

    public function __construct()
    {
        $this->model = $this->model("GoInModel");
    }

    public function index(){
        $data = [
            "username" => "",
            "password" => "",
            "usernameerror" =>"",
            "passworderror"  =>"",
            "logged" =>""
        ];
        if ($_SERVER['REQUEST_METHOD'] == "POST"){

            $username = trim(filter_input(INPUT_POST,"username",FILTER_SANITIZE_STRING)) ;
            $password = trim(filter_input(INPUT_POST,"password",FILTER_SANITIZE_STRING));

            $hashed_password = md5($password);


            //method chaining
            $Found = $this->model->select()->where("username = '$username' AND password = '$hashed_password'")->execute();

            if ($Found != true){
                $_SESSION['alert'] = "Wrong username or password .. try again ";
            }else{
                $data = [
                    "username" => $username,
                    "password" => $hashed_password
                ];
                $_SESSION['username'] = $username ;
                $_SESSION['userid'] = $Found[0]['id'];
                header("location:../home/index");
                exit();
            }
        }
        $this->Route("signin\index",$data);
    }


    public function logout()
    {
        session_unset();
        session_destroy();
        $this->Route("signin/index");
    }
}