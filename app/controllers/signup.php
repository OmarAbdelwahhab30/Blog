<?php

namespace PHPMVC\CONTROLLERS;
use PHPMVC\LIB\Abstractcontroller;

class signup extends Abstractcontroller {



    public function __construct()
    {
        $this->UserModel = $this->model("UsersModel");
        $this->GoInModel = $this->model("GoInModel");
    }

    public function index()
    {
        $data = [
            "username" => "",
            "Email"    => "",
            "password" => "",
            "confirmpassword" => "",
            "usernameerror" =>"",
            "emailerror" =>"",
            "passworderror"  =>"",
            "confirmpassworderror" => "",
            "registered" =>""
        ];
        if ($_SERVER['REQUEST_METHOD'] == "POST"){

            $username = trim(filter_input(INPUT_POST,"username",FILTER_SANITIZE_STRING)) ;
            $email = trim(filter_input(INPUT_POST,"email",FILTER_SANITIZE_EMAIL)) ;
            $password = trim(filter_input(INPUT_POST,"password",FILTER_SANITIZE_STRING));
            $confirmpassword = trim(filter_input(INPUT_POST,"confirmPassword",FILTER_SANITIZE_STRING)) ;

            $Found = $this->UserModel->select()->where("username = '$username'")->execute();

            if ($Found == true){
                $_SESSION['alert'] = "duplicated entry .. Try another username";
                header("Location:".URLROOT."signup/index");
                exit();
            }


            $hashed_password = md5($password);
            $hashed_confirmed = md5($confirmpassword);
            if ($hashed_password != $hashed_confirmed){
                $_SESSION['alert'] = "Two passwords don't match ..try again" ;
                header("Location:".URLROOT."signup/index");
                exit();
            }

            $UsernamePattern = "/^[a-z\d]+$/i";
            $EmailPattern = "/^(?![_.-])((?![_.-][_.-])[a-zA-Z\d_.-]){0,63}[a-zA-Z\d]@((?!-)((?!--)[a-zA-Z\d-]){0,63}[a-zA-Z\d]\.){1,2}([a-zA-Z]{2,14}\.)?[a-zA-Z]{2,14}$/" ;
            $PasswordPattern = '/(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$/';

            if (!preg_match($UsernamePattern,$username)){
                $_SESSION['alert'] = "'User name must  only contain letters and numbers ";
                header("Location:".URLROOT."signup/index");
                exit();
            }


            if (!preg_match($EmailPattern,$email)){
                $_SESSION['alert'] = "Email must have @ character ";
                header("Location:".URLROOT."signup/index");
                exit();
            }

            if (!preg_match($PasswordPattern,$password)){
                $_SESSION['alert'] = "Password must include one uppercase letter, one lowercase letter, one number, and one special character
                 such as $ or %. ";
                 header("Location:".URLROOT."signup/index");
                exit();
            }

            if (!preg_match($PasswordPattern,$confirmpassword)){
                $_SESSION['alert'] = "Password must at least 8 characters ";
                header("Location:".URLROOT."signup/index");
                exit();
            }

        
            $data = [
                'username' => $username,
                'email'    => $email,
                'password' => $hashed_password,
            ];
            $registered = $this->UserModel->insert($data)->execute();
            $user_id = $this->UserModel->select("id")->where("username='$username'")->execute();
            $user_id = $user_id[0]['id'];
            if ($registered == true){
                $_SESSION['username'] = $username ;
                $_SESSION['userid'] = $user_id;
                header("Location:".URLROOT."Home/index");
                exit();
            }else {
                $_SESSION['alert'] = "SomeThing went Wrong . please try again ";
                header("Location:".URLROOT."signup/index");
                exit();
            }
        }
        $this->Route("signup/index",$data);
    }
}