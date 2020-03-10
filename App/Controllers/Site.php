<?php


namespace App\Controllers;


class Site extends BaseController
{
    public function __construct($router)
    {
        parent::__construct($router);

        if(!empty($_SESSION["user"])){
            $this->router->redirect("dashboard.home");
        }
    }

    public function home():void
    {
        echo "Página home";
    }

    public function login():void
    {
        $head = $this->seo->optimize(
            "Faça seu login | " .site("name"),
            site("desc"),
            $this->router->route("site.login"),
            routeImage("Login")
        )->render();

        echo $this->view->render("theme/login", [
            "head" => $head
        ]);
    }

    public function register(): void
    {
        $head = $this->seo->optimize(
            "Cadastrar sua conta | " .site("name"),
            site("desc"),
            $this->router->route("site.register"),
            routeImage("Register")
        )->render();

        $form_user = new \stdClass();
        $form_user->first_name = null;
        $form_user->last_name = null;
        $form_user->email = null;


        echo $this->view->render("theme/register", [
            "head" => $head,
            "user" => $form_user
        ]);
    }

    public function forget(): void
    {
        $head = $this->seo->optimize(
            "Recupere sua senha |  " .site("name"),
            site("desc"),
            $this->router->route("site.forget"),
            routeImage("Forget")
        )->render();

        echo $this->view->render("theme/forget", [
            "head" => $head
        ]);
    }

    public function error($data): void
    {
        $error = filter_var($data["errcode"], FILTER_VALIDATE_INT);
        $head = $this->seo->optimize(
            "Oooppss {$error} | " .site("name"),
            site("desc"),
            $this->router->route("site.error", [
                "errcode" => $error]),
            routeImage($error)
        )->render();
        echo $this->view->render("theme/error", [
            "head" => $head,
            "error" => $error
        ]);
    }


}