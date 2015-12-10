<?php
class Config {
    public function __construct() {
        // On creation connect to the database.
        $this->ConnectDB();
    }

    public function __destruct() {
        // On destruction disconnect from the database.
        $this->DisconnectDB();
    }

    private function ConnectDB() {
        // Define server information.
        define('DB_SERVER', '127.0.0.1');
        define('DB_USERNAME', 'root');
        define('DB_PASSWORD', 'password');
        define('DB_DATABASE', 'aria_user_database');

        // Create database link.
        $db = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);

        // Set datamember
        $this->database_link = $db;
    }

    public function GetDatabaseLink() {
        return $this->database_link;
    }

    private function DisconnectDB() {
        // Close database link.
        mysqli_close($this->database_link);
    }

    private $database_link;
}

?>