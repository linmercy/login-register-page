<?php
    if (isset($_POST["submit"])) {
        $username = $_POST["username"];
        $email = $_POST["email"];
        $password = $_POST["password"];

        $passwordash = password_hash($password, PASSWORD_DEFAULT);

        $errors = array();

        

        if (empty($username) OR empty($email) OR empty($password)) {
            array_push($errors,"all fields required");
        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            array_push($errors, "enter valid email");
        }

        if (strlen($password)<8) {
            array_push($errors, "password must be at least 8 characters long");
        }

        require_once "database.php";
        $sql = "select * from registration where email='$email'";
        $result = mysqli_query($conn, $sql);
        $rowCount = mysqli_num_rows($result);

        if ($rowCount>0) {
            array_push($errors, "email already exist");
        }

        if (count($errors)>0) {
            foreach($errors as $error) {
                echo "<div class='alert alert-danger'>$error</div>";
            }
        }
        else{
            //insert data
            $stmt = $conn->prepare("insert into registration(username, email, password) values(?, ?, ?)");
            $stmt->bind_param("sss", $username, $email, $passwordash);
            $stmt->execute();
            echo "sign up successful!";
            $stmt->close();
            $conn->close();
        }
    }
    


