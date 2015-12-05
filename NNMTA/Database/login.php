/*
File: login.php
Created by: Wesley Kepke
Purpose: This file contains code that will allow a user to login to ARIA
if they enter appropriate credentials in the database.

This is not a WordPress plugin.
*/

<?php
    include('config.php');
    session_start();

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // username and password are acquired from the html form
        $username = mysqli_real_escape_string($db, $_POST['username']);
        $password = mysqli_real_escape_string($db, $_POST['password']);

        // query the database
        $colToSearchFor = 'userID';
        $sql = "SELECT $colToSearchFor FROM DB_DATABASE WHERE userName = '$username' and password = '$password'";
        $result = mysqli_query($db, $sql);
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
        $active = $row['active'];

        // there should only be one user in the database with the credentials entered
        $count = mysqli_num_rows($result);
        if ($count == 1) {
            session_register($username); // deprecated?
            $_SESSION['login_user'] = $username;
            header("location: ../Login_successful.html");
        }
        else {
            $error = "Your username or password was invalid.";
        }
    }
?>