<?php


namespace App\Controllers;


use App\Models\User;

class Dashboard extends BaseController
{
    /**
     * @var User
     */
    protected $user;

    public function __construct($router)
    {
        parent::__construct($router);

        if(empty($_SESSION['user']) || !$this->user = (new User())->findById($_SESSION['user'])){
            unset($_SESSION['user']);
            flash("error", "Acesso negado. Favor logar-se");
            $this->router->redirect("dashboard.login");
        }

    }

    public function home(): void{

        $head = $this->seo->optimize(
            "Bem vindo(a)  {$this->user->first_name} | " .site("name"),
            site("desc"),
            $this->router->route("dashboard.home"),
            routeImage("Conta de {$this->user->first_name}")
        )->render();

        echo $this->view->render("theme_admin/dashboard", [
            "head" => $head,
            "user" => $this->user
        ]);
        // var_dump($_SESSION['user']);
    }

    public function logoff(): void
    {
        unset($_SESSION['user']);
        flash("info", "Você saiu com sucesso, volte logo {$this->user->first_name}");
        $this->router->redirect("site.login");
    }
}