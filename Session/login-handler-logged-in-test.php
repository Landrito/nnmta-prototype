<?php
/**
 * Created by PhpStorm.
 * User: ernestlandrito
 * Date: 12/7/15
 * Time: 10:21 PM
 */

session_start();

echo $_SESSION['login']['email']." is logged in.";