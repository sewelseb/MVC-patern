<?php
//FrontControler

//session_start();
//session_cache_limiter('private_no_expire, must-revalidate');
//setlocale (LC_TIME, 'fr_FR');
//date_default_timezone_set('Europe/Berlin');
//initialisation of cash =>  html code will pop when calling ob_end_flush()
ob_start();
//error display (comment in prod)
error_reporting(E_ALL);
ini_set("display_errors", 1);
//if GET param
if (!empty($_GET['page']) && is_file('Controller/'.$_GET['page'].'.php'))
{
    $tabSecurity= explode("..", $_GET['page']);
    if (substr($_GET['page'], 0)=="." || count($tabSecurity)>1)
    {
        header ('location: index.php?page=home');
    }
    else
    {
        include_once ('./Model/connexionDB.php');
        include ('Controller/'.$_GET['page'].'.php');
    }
}
else
{
    include ('Controller/home.php');
}
ob_end_flush();
//closing data base connexion
if (isset($bdd))
{
    $bdd = null;
}
?>