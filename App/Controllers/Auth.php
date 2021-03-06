<?php


namespace App\Controllers;


use App\Models\User;

class Auth extends BaseController
{
    public function __construct($router)
    {
        parent::__construct($router);
    }

    public function login($data): void{
        $email = filter_var($data['email'], FILTER_VALIDATE_EMAIL);
        $passwd = filter_var($data['passwd'], FILTER_DEFAULT);

        if(!$email || !$passwd){
            echo $this->ajaxResponse("message", [
                "type" => "alert",
                "message" => "Informe o seu email e sua senha para logar"
            ]);
            return;
        }

        $user = (new User())->find("email = :e", "e={$email}")->fetch();
        if(!$user || !password_verify($passwd, $user->passwd)){
            echo $this->ajaxResponse("message", [
                "type" => "error",
                "message" => "E-mail ou senha não conferem"
            ]);
            return;
        }

        $_SESSION["user"] = $user->id;
        echo $this->ajaxResponse("redirect", [
            "url" => $this->router->route("dashboard.home")
        ]);
    }

    public function register($data): void
    {
        $data = filter_var_array($data, FILTER_SANITIZE_STRIPPED);

        if(in_array("", $data)){
            echo $this->ajaxResponse("message", [
                "type" => "error",
                "message" => "Preencha todos os campos para cadastrar-se"
            ]);
            return;
        }

        $user = new User();
        $user->first_name = $data["first_name"];
        $user->last_name = $data["last_name"];
        $user->email = $data["email"];
        $user->passwd = $data["passwd"];


        if(!$user->save()){
            echo $this->ajaxResponse("message", [
                "type" => "error",
                "message" => $user->fail()->getMessage()
            ]);
            return;
        }

        $_SESSION["user"] = $user->id;
        echo $this->ajaxResponse("redirect", [
            "url" => $this->router->route("dashboard.home")
        ]);


    }

}