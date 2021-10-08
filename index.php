<?php
require ('model\database.php');
require ('model\userDB.php');
require ('model\user.php');
session_start();

$action = filter_input(INPUT_POST, 'action');
if ($action === NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action === NULL) {
        $action = 'main';
    }
}

switch ($action) {
    case 'main':
        
    include('registration\main.php');
    break;
    die;
case 'user_register':
        if (!isset($firstName)) {
            $firstName = '';
        }
        if (!isset($lastName)) {
            $lastName = '';
        }
        if (!isset($userName)) {
            $userName = '';
        }
        if (!isset($email)) {
            $email = '';
        }
        if (!isset($password)) {
            $password = '';
        }
        include('Registration\user_register.php');
        break;
        die;
}