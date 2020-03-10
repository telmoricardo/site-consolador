<?php
ob_start();
session_start();

require __DIR__ . "/vendor/autoload.php";

use CoffeeCode\Router\Router;

$router = new Router(site());
$router->namespace("App\Controllers");

/*
 * Site
 */
$router->group(null);
$router->get("/", "Site:home", "site.home");
$router->get("/login", "Site:login", "site.login");
$router->get("/cadastrar", "Site:register", "site.register");
$router->get("/recuperar", "Site:forget", "site.forget");
$router->get("/senha/{email}/{forget}", "Site:reset", "site.reset");

/*
 * Dashboard
 */
$router->group("/me");
$router->get("/home", "Dashboard:home", "dashboard.home");
$router->get("/sair", "Dashboard:logoff", "dashboard.logoff");

/*
 * AUTH
 */
$router->group(null);
$router->post("/login", "Auth:login", "auth.login");
$router->post("/register", "Auth:register", "auth.register");
$router->post("/forget", "Auth:forget", "auth.forget");
$router->post("/reset", "Auth:reset", "auth.reset");

/*
 * ERRORS
 */
$router->group("ops");
$router->get("/{errcode}", "Site:error", "site.error");

$router->dispatch();

/*
 * ERROR PROCESS
 */
if($router->error()){
    $router->redirect("site.error", ["errcode"=> $router->error()]);
}

ob_end_flush();
