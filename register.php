<?php

session_start();
include('includes/db.php');

// if (isset($_SESSION['loggedIn'])) {
//     header('location: ../index.php');
// }


if (isset($_POST['Register'])) {
    $username = strip_tags(trim($_POST['username']));
    $password = md5($_POST['password']);
    $email = '';

    if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $email = $_POST['email'];
    }


    if ($username == '' || $password == '' || $email == '') {
        echo '<script>alert("Fields cannot be empty"); </script>';
        header('location: register.php');
    } else {
        $sql_check = "SELECT * FROM users WHERE email = '$email'";
        $data = $conn->query($sql_check);
        if ($data->num_rows > 0) {
            echo '<script>alert("Email already taken"); </script>';
        } else {
            $sql_INSERT = "INSERT INTO users (username, email, password, role) VALUES ('$username', '$email', '$password', 'user')";
            $data = $conn->query($sql_INSERT);
            if ($data) {
                header('location: ../login.php');
            }
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include('doctypes/doc2.php'); ?>
    <title>Register</title>
</head>

<body>

    <div class="register-form">
        <div class="register-form-wrapper">
            <form method="post" action="backend/register_script.php">
                <div class="register-head">
                    <div class="register-back-button">
                        <a href="login.php"><i class="fas fa-long-arrow-alt-left"></i></a>
                    </div>
                    <div class="register-head-text">Register</div>
                </div>
                <div class="register-input-field">
                    <p class="register-username">
                        <i class="fas fa-user"></i>
                        <input type="text" name="username" placeholder="Enter your username">
                    </p>
                    <p class="register-email">
                        <i class="fas fa-envelope"></i>
                        <input type="text" name="email" placeholder="Enter your email">
                        <!-- <p id="error"></p> -->
                    </p>
                    <p class="register-password">
                        <i class="fas fa-key"></i>
                        <input type="password" name="password" placeholder="Enter your Password">
                    </p>
                </div>
                <p class="register-submit-button">
                    <input type="submit" name="Register" value="Register">
                </p>
                <div id="signup-request">
                    <h3>Already have an account? <a href="login.php">Login Here</a></h3>
                </div>
        </div>
        </form>

    </div>
    </div>

</body>

</html>