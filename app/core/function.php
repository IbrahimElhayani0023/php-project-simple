<?php


function old_values($value,$vs='')
{
    if(!empty($_POST[$value])){
        return $_POST[$value] ;
    } 
      return $vs;   
}

function  atunticate($sqlstate)
{
    $_SESSION['user'] = $sqlstate;
}
    
function str_to_url($url)
{

   $url = str_replace("'", "", $url);
   $url = preg_replace('~[^\\pL0-9_]+~u', '-', $url);
   $url = trim($url, "-");
   $url = iconv("utf-8", "us-ascii//TRANSLIT", $url);
   $url = strtolower($url);
   $url = preg_replace('~[^-a-z0-9_]+~', '', $url);
   

}
function get_img($file)
{  
    $file = $file ?? '';
    if (file_exists($file)) {
        return ROOT.$file;
    }
    
    return ROOT.'assets/images/image8.jpg';
}

function creatLink()
{
    if(!empty($_SESSION['user']))
    {
        return "admin";
    }
    return "Login";
}

