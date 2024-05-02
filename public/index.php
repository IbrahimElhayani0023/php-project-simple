<?php
 session_start();
require '../app/core/init.php';
$url = $_GET['url'] ?? 'home';
$url = strtolower($url);
$url = explode('/',$url);
$pageName = trim($url[0]);
$section = $url[1] ?? "dashbord";
$action = $url[2] ?? "view";
$id = $url[3] ?? 0;
$show = $url[1] ?? '';
$fileName = "../app/pages/".$pageName.".php";
if(file_exists($fileName))
{
    require_once $fileName;
}else
{
   require_once "../app/pages/404.php";
}