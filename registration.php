<?php
    if (isset($_POST["submit"])) {
        $username = $_POST["username"];
        $email = $_POST["email"];
        $password = $_POST["password"];

        $passwordash = password_hash($password, PASSWORD_DEFAULT);

        $errors = array();

        

        if (empty($username) OR empty($email) OR empty($password)) {
            array_push($errors,"required");
        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            array_push($errors, "enter valid email");
        }
        if (strlen($password)<8) {
            array_push($errors, "password must be at least 8 characters long");
        }
        if (count($errors)>0) {
            foreach($errors as $error) {
                echo "<div class='alert alert-danger'>$error</div>";
            }
        }
        else{
            require_once "database.php";
        }
    }


