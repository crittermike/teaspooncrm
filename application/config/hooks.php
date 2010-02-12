<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
| -------------------------------------------------------------------------
| Hooks
| -------------------------------------------------------------------------
| This file lets you define "hooks" to extend CI without hacking the core
| files.  Please see the user guide for info:
|
|	http://codeigniter.com/user_guide/general/hooks.html
|
*/
require_once BASEPATH."../application/config/database.php";

$hook['pre_controller'] = array(
  'function' => 'check_install',
  'filename' => 'install.php',
  'filepath' => 'hooks',
  'params'   => array(
    $db['default']['hostname'],
    $db['default']['username'],
    $db['default']['password'],
    $db['default']['database'],
    $db['default']['dbprefix']
  )

);


/* End of file hooks.php */
/* Location: ./system/application/config/hooks.php */
