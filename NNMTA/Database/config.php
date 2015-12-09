/*
File: config.php
Created by: Wesley Kepke
Purpose: This file contains information about the MySQL database that users
will utilize to login.

This is not a WordPress plugin.
*/

<?php
class Config {
    public function __construct() {
        $this->ConnectDB();
    }

    public function __destruct() {
        $this->DisconnectDB();
    }

    private function ConnectDB() {
        define('DB_SERVER', '127.0.0.1'); // might have to be modified
        define('DB_USERNAME', 'root');
        define('DB_PASSWORD', 'password');
        define('DB_DATABASE', 'aria_user_database');
        $db = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);

        $this->database_link = $db;

        // check if unable to connect to database
        echo '<script> alert("here") </script>';

        if (! $db) {
            echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
            echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
            //die('Could not connect: ' . mysqli_error($db));
        }
        else {
            echo 'successfully connected to database';
        }

    }

    public function GetDatabaseLink() {
        return $this->database_link;
    }

    private function DisconnectDB() {
        mysqli_close($this->database_link);
    }

    private $database_link;
}

?>