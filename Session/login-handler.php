<?php
/**
 * Created by PhpStorm.
 * User: ernestlandrito
 * Date: 12/7/15
 * Time: 10:14 PM
 */

/**
 * Class LoginHandler
 * This login handler  will store login information in a session.
 * When logout is called, the session is destroyed and the session id is regenerated.
 */
class LoginSessionHandler {
    function Login($email, $password_hash) {
        $_SESSION['login']
            = array('email' => $email, 'password_hash' => $password_hash);
  }

    function IsLoggedIn() {
        return isset($_SESSION['login']);
    }

    function GetLoginInfo() {
        return $_SESSION['login'];
    }

    function Logout() {
        session_destroy();  // Destroy all values associated with the session.
        session_regenerate_id(true); // Regenerate session id for security and remove prior from the server.
    }
}

?>