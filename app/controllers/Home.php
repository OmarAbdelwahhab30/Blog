<?php

namespace PHPMVC\CONTROLLERS;

if (!isset($_SESSION['username'])){
    header("Location".URLROOT."home/index");
}

class Home extends \PHPMVC\LIB\Abstractcontroller
{

    private $model;

    public function __construct()
    {
        $this->UserModel = $this->model("UsersModel");
        $this->PostModel = $this->model("PostsModel");
    }

    public function notfound()
    {
        $this->Route("home/index");
    }
    public function index()
    {
         $JoinInfo = [
            "Join"      => false,
            "TablesNum" => 2,
            "table1"    => "posts",
            "table2"    => "users",
            "table3"    => "",
            "cond1"     => "posts.user_id=users.id",
            "cond2"     => "",
            "ColsName"  => "posts.user_id , posts.body,posts.id as postid , posts.created_at ,
            users.username,users.id,users.email",
            "where"     => 1,
        ];
        $posts = $this->PostModel->join($JoinInfo)->orderBy("users.id "," ASC ")->execute();
        $_SESSION['posts'] = $posts;
        $this->Route("home/index");
    }

    public function add()
    {
       
        if ($_SERVER['REQUEST_METHOD'] == "POST"){

            $username = $_SESSION['username'];
            $post = trim(filter_input(INPUT_POST,"postarea",FILTER_SANITIZE_STRING));


            $id    = $this->UserModel->select("id")->where("username='$username'")->execute();
            var_dump($id[0]['id']);
            $data = [
                'user_id' => $id[0]['id'],
                'body' => $post,
            ];
            $added = $this->PostModel->insert($data)->execute();
            if ($added){
                header("Location:http://blogg/home/index");
                exit();
            }else {
                header("Location:http://blogg/home/index");
                exit();
            }
        }
    }
    public function delete($postid)
    {
        $deleted = $this->PostModel->delete()->where(" id = '$postid'")->execute();
        if($deleted){
            header("Location:http://blogg/home/index");
            exit();
        }else {
            die("something went wrong .. try again later");
        }
    }

    public function update($postid)
    {

        $user_id = $this->PostModel->select("user_id")->where("id = '$postid'")->execute() ;
        
        if ($_SESSION['userid'] != $user_id[0]['user_id']){
            header("Location:http://blogg/home/index");
            exit();
        }


        if (isset($_POST['submit'])) {
            $body = trim(filter_input(INPUT_POST, "postarea", FILTER_SANITIZE_STRING));
            $update = "body = '$body'";
            $updated = $this->PostModel->update($update)->where("id = '$postid'")->execute();
            if ($updated) {
                header("Location:http://blogg/home/index");
                exit();
            }
        }

        $post_body = $this->PostModel->select("body")->where("id = '$postid'")->execute();
        $this->Route("home/update",$post_body[0]['body'],$postid);
    }

}