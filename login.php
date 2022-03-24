<?php

session_start();
include('includes/db.php');

if (isset($_POST['login'])) {
    $email = '';

    if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $email = $_POST['email'];
    }

    $password = md5($_POST['password']);

    $sql = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";

    $data = $conn->query($sql);

    if ($data->num_rows > 0) {
        while ($row = $data->fetch_assoc()) {
            $_SESSION['login'] = 'loggedIn';
            $_SESSION['username'] = $row['username'];
            $_SESSION['user_id'] = $row['id'];
            $_SESSION['role'] = $row['role'];
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                header("location: ../video.php?id=$id");
            } else {
                header("location: index.php?login=success");
            }
        }
    } else {
        echo "<script>alert('Incorrect User Id or Password');</script>";
        unset($_SESSION['login']);
        session_destroy();
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
    <title>Login</title>
</head>

<body>

    <div class="login-form">
        <div class="login-form-wrapper">
            <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                <div class="login-head">
                    <div class="login-back-button">
                        <?php
                        if (isset($_GET['id'])) {
                            $id = $_GET['id'];
                            $arrow = "<a href='video.php?id=$id'><i class='fas fa-long-arrow-alt-left'></i></a>";
                            echo $arrow;
                        } else {
                            $arrow = '<a href="index.php"><i class="fas fa-long-arrow-alt-left"></i></a>';
                            echo $arrow;
                        }
                        ?>
                    </div>
                    <div class="login-head-text">Login</div>
                </div>
                <div class="login-input-field">
                    <p class="login-email">
                        <i class="fas fa-envelope"></i>
                        <input type="text" name="email" placeholder="Enter your email">
                    </p>
                    <p class="login-password">
                        <i class="fas fa-key"></i>
                        <input type="password" name="password" placeholder="Enter your Password">
                    </p>
                </div>
                <p class="login-submit-button">
                    <input type="submit" name="login" value="Login">
                </p>
                <div id="signup-request">
                    <h3>Dont have an account? <a href="register.php">Sign Up Here</a></h3>
                </div>
        </div>
        </form>

    </div>
    </div>

</body>

</html>