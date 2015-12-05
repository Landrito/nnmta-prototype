/*
File: register.php
Created by: Wesley Kepke
Purpose: This file contains code that will allow a user to register with the
NNMTA.

This is not a WordPress plugin.
*/

<?php
    include('config.php');
    session_start();

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // obtain information from the user
        $firstName = mysqli_real_escape_string($db, $_POST['firstname']);
        $lastName = mysqli_real_escape_string($db, $_POST['lastname']);
        $email = mysqli_real_escape_string($db, $_POST['email']);
        $password = mysqli_real_escape_string($db, $_POST['password']);
        $passwordConfirm = mysqli_real_escape_string($db, $_POST['password_confirm']);

        // check to see if passwords match
        if ($password != $passwordConfirm) {
            // do something - passwords do not match
        }

        // generate sql query
        $sql = 'INSERT INTO USER (userName, firstName, lastName, email, password)'.
            'VALUES ($firstName, $lastName, $email, $password)';

        // attempt to add to database
        mysqli_select_db($db);
        $retval = mysql_query($sql, $db);

        // check to see if data was added to database
        if (! $retval) {
            die('Could not enter data: ' . mysql_error());
        }

        // close database
        closeDatabase($db);
    }
?>