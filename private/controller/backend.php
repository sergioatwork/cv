<?php
    error_reporting(E_ALL);
    ini_set("display_errors", TRUE);
    ini_set('log_errors', TRUE);
    ini_set('error_log', '../private/errors.log');

    error_log( '***' );
    error_log( '*' );
    error_log( '*    ██╗      ██████╗  ██████╗    '.$_SERVER['HTTP_USER_AGENT'] );
    error_log( '*    ██║     ██╔═══██╗██╔════╝    '.$_SERVER['REMOTE_ADDR'] );
    error_log( '*    ██║     ██║   ██║██║  ███╗   '.$_SERVER['REMOTE_PORT'] );
    error_log( '*    ██║     ██║   ██║██║   ██║   '.$_SERVER['REQUEST_METHOD'] );
    error_log( '*    ███████╗╚██████╔╝╚██████╔╝   '.$_SERVER['REQUEST_URI'] );
    error_log( '*    ╚══════╝ ╚═════╝  ╚═════╝    '.date('l jS \of F Y h:i:s A') );
    error_log( '*                                 ' );
    error_log( '***' );

//// Autoloader
    function autoloadClass($nomClasse){
        $nomFichier = str_replace("\\", "/", $nomClasse);
        if (is_file("../private/controller/$nomFichier.php")){require_once("../private/controller/$nomFichier.php");}
        elseif (is_file("../private/model/$nomFichier.php")){require_once("../private/model/$nomFichier.php");}
        elseif (is_file("../private/plugin/$nomFichier.php")){require_once("../private/plugin/$nomFichier.php");}
    }
    spl_autoload_register("autoloadClass");

    require_once("../private/config/config.php");
    $form = $_REQUEST["form"] ?? '';

    require_once("../private/controller/sendMail.php");
