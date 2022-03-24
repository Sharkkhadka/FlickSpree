<?php

session_start();
include('../includes/db.php');

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

    $sql_check = "SELECT * FROM users WHERE email = '$email'";
    $data = $conn->query($sql_check);
    if ($data->num_rows > 0) {
        echo "Email already exists";
    } else {
        $sql_INSERT = "INSERT INTO users (username, email, password, role) VALUES ('$username', '$email', '$password', 'user')";
        $data = $conn->query($sql_INSERT);
        if ($data) {
            header('location: ../login.php');
        }
    }
}
