<?php
/**
 * Created by PhpStorm.
 * User: ernestlandrito
 * Date: 12/7/15
 * Time: 10:21 PM
 */

session_start();
include 'login-session-handler.php';

$login_handler = new LoginSessionHandler();

echo $login_handler->IsLoggedIn()
    ? $login_handler->GetLoginInfo()['email']." is logged in with a password hash of "
      .$login_handler->GetLoginInfo()['password']
    : "Not logged in.";