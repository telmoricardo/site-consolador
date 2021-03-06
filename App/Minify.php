<?php

/*
 * CSS
 */
$minCss = new \MatthiasMullie\Minify\CSS();
$minCss->add(dirname(__DIR__, 1). "/views/assets/css/style.css");
$minCss->add(dirname(__DIR__, 1). "/views/assets/css/form.css");
$minCss->add(dirname(__DIR__, 1). "/views/assets/css/button.css");
$minCss->add(dirname(__DIR__, 1). "/views/assets/css/message.css");
$minCss->add(dirname(__DIR__, 1). "/views/assets/css/load.css");
$minCss->minify(dirname(__DIR__, 1). "/views/assets/style.min.css");

/*
 * JS
 */
$minJS= new \MatthiasMullie\Minify\JS();
$minJS->add(dirname(__DIR__, 1). "/views/assets/js/jquery.js");
$minJS->add(dirname(__DIR__, 1). "/views/assets/js/jquery-ui.js");
$minJS->minify(dirname(__DIR__, 1). "/views/assets/script.min.js");
