<?php
defined('BASEPATH') OR exit('No direct script access allowed');


$active_group = 'default';
$query_builder = TRUE;

if($_SERVER['SERVER_NAME']!='localhost') {

    $db['default']['hostname'] = '10.1.30.18';
    $db['default']['username'] = 'db_itpu';
    $db['default']['password'] = 'Uap)(*&^%';
    $db['default']['database'] = 'db_academic';
    $db['default']['dbdriver'] = 'mysqli';// support with MYSQl,POSTGRE SQL, ORACLE,SQL SERVER
    $db['default']['dbprefix'] = '';
    $db['default']['pconnect'] = TRUE;
    $db['default']['db_debug'] = FALSE;
    $db['default']['cache_on'] = FALSE;
    $db['default']['cachedir'] = '';
    $db['default']['char_set'] = 'utf8';
    $db['default']['dbcollat'] = 'utf8_general_ci';
    $db['default']['swap_pre'] = '';
    $db['default']['autoinit'] = TRUE;
    $db['default']['stricton'] = FALSE;

} else {
    $db['default'] = array(
        'dsn'	=> '',
        'hostname' => 'localhost',
        'username' => 'root',
        'password' => '',
        'database' => 'db_academic',
        'dbdriver' => 'mysqli',
        'dbprefix' => '',
        'pconnect' => FALSE,
        'db_debug' => (ENVIRONMENT !== 'production'),
        'cache_on' => FALSE,
        'cachedir' => '',
        'char_set' => 'utf8',
        'dbcollat' => 'utf8_general_ci',
        'swap_pre' => '',
        'encrypt' => FALSE,
        'compress' => FALSE,
        'stricton' => FALSE,
        'failover' => array(),
        'save_queries' => TRUE
    );
}


