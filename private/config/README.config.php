<?php

//// Initialisation des erraurs
error_reporting(E_ALL);
ini_set("display_errors", TRUE); //// Mettre à FALSE en prod.
ini_set('log_errors', TRUE);
ini_set('error_log', '../private/errors.log');

//// Initialisation des paramètres SMTP pour l'utilisation avec PHPMailer
$smtp_host = '';    // SMTP server name
$smtp_id   = '';    // SMTP server username
$smtp_pw   = '';    // SMTP server password
$smtp_port = 587;   // SMTP server TCP port
$smtp_from = '';    // From email address
$smtp_name = '';    // From email name
$smtp_to   = '';    // Email address where you want to receive the message posted on the site
$smtp_subject = ''; // Email subject
