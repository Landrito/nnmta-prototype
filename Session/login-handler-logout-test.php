<?php
/**
 * Created by PhpStorm.
 * User: ernestlandrito
 * Date: 12/7/15
 * Time: 10:25 PM
 */

session_start();
include 'login-session-handler.php';

// Make an handler and logout.
$login_handler = new LoginSessionHandler();
$login_handler->Logout();
