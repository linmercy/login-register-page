<?php
    if (isset($_POST["login"])) {
        $email = $_POST["email"];
        $password = $_POST["password"];
        $passwordash = password_hash($password, PASSWORD_DEFAULT);


        require_once "database.php";
        $sql = "SELECT * FROM registration WHERE email=?";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "s", $email);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $registration = mysqli_fetch_array($result, MYSQLI_ASSOC);

        if ($registration) {
            if (password_verify($password, $passwordash)) {
                header("Location: index.php");
                die();
            } else {
                echo "<div class='alert'>Password mismatch</div>";
            }
        } else {
            echo "<div class='alert'>Email does not exist</div>";
        }
    }
?>
