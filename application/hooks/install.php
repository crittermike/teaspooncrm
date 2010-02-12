<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

function check_install($params) {

 /**
  * Redirect to the /install page if it hasn't already been installed.
  * We can check for that by asking the database.php file if its hostname is empty.
  */
  if ($params[0] == "") {

    $redir = ((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == "on") ? "https" : "http");
    $redir .= "://".$_SERVER['HTTP_HOST'];
    $redir .= str_replace(basename($_SERVER['SCRIPT_NAME']),"",$_SERVER['SCRIPT_NAME']);
    $redir .= 'install';

    header('Location: ' . $redir);

    die;

  }

}
