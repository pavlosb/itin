<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$smtpass = getenv("SMTPPASS"); 
$config['protocol'] = 'smtp';
$config['wordwrap'] = TRUE;
$config['mailtype'] = 'html';
$config['charset'] = 'utf-8';
$config['crlf'] = '\r\n';
$config['newline'] = '\r\n';
$config['smtp_host'] = 'smtp.sendgrid.net';
$config['smtp_user'] = 'apikey';
$config['smtp_pass'] = $smtpass;
$config['smtp_crypto'] = 'TLS';
$config['smtp_port'] = '587';
$config['smtp_timeout'] = '15'; 

