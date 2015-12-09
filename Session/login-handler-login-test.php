<?php
/**
 * Created by PhpStorm.
 * User: ernestlandrito
 * Date: 12/7/15
 * Time: 10:16 PM
 */

session_start();
include 'login-session-handler.php';

$login_handler = new LoginSessionHandler();
$login_handler->Login('ernest@unr.edu', 'password hash');

