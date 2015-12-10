<?php
require "config.php";

class LoginSessionHandler {
    public function __construct() {
        // Make a new config to connect to database.
        $this->config = new Config();
    }

    function __destruct() {
    }

    public function Login($email, $password) {
        // Get the database link.
        $db = $this->config->GetDatabaseLink();

        // Get user data input.
        $email = mysqli_real_escape_string($db, $email);
        $password = mysqli_real_escape_string($db, $password);

        // Generate sql Query.
        $colToSearchFor = 'userID';
        $query = "SELECT $colToSearchFor FROM users WHERE email = '$email' and password = '$password';";

        // attempt to query from database
        $result = mysqli_query($db, $query);

        // there should only be one user in the database with the credentials entered
        $count = mysqli_num_rows($result);
        if ($count == 1) {
            // Create login information in the session
            $_SESSION['login'] = array('email' => $email, 'password' => $password);
            return true;
        }
        else {
           return false;
        }
  }

    public function IsLoggedIn() {
        // Check if there is login information in the session.
        return isset($_SESSION['login']);
    }

    public function GetLoginInfo() {
        // Get the login information array from the session.
        return $_SESSION['login'];
    }

    public function Logout() {
        session_destroy();  // Destroy all values associated with the session.
        session_regenerate_id(true); // Regenerate session id for security and remove prior from the server.
    }

    private $config; // Config object for the database link.
}
