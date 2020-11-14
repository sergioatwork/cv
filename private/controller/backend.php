<?php

require_once("../private/config/config.php");

//// Log le début de paragraphe ci-dessous à chaque appel du backend
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

$form = $_REQUEST["form"] ?? '';

switch ($form) {
    case 'form_send_msg':
        require_once("../private/controller/sendMail.php");
        break;
    
    default:
        echo("Le traitement du formulaire demandé n'existe pas !!!");
        break;
}
