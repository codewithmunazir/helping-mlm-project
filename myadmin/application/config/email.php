<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$config['protocol'] = 'smtp';
$config['smtp_host'] = 'smtp.hostinger.com';  // SMTP server for Hostinger
$config['smtp_port'] = 465;  // SMTP port (587 for TLS, 465 for SSL)
$config['smtp_user'] = '';  // Your email address (webmail)
$config['smtp_pass'] = '';  // Your email password
$config['smtp_crypto'] = 'ssl';  // Use 'tls' for encryption (change to 'ssl' if using SSL)
$config['mailtype'] = 'html';  // Use 'text' for plain text emails or 'html' for HTML emails
$config['charset'] = 'utf-8';
$config['wordwrap'] = TRUE;
$config['newline'] = "\r\n";  // Important for proper email formatting