<?php
if($_SERVER['SERVER_NAME'] == 'localhost')
{
    define('DBUSER', "root");
    define('DBNAME', "myblog_db");
    define('DBPASS', "");
    define('DBHOST', "localhost");    
}else{

define('DBUSER', "root");
define('DBNAME', "myblog_db");
define('DBPASS', "");
define('DBHOST', "localhost");
}