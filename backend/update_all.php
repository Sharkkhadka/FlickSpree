<?php
session_start();

include('../includes/db.php');


$videoId = $_POST['Id'];
$title = mysqli_real_escape_string($conn, $_POST['title']);
$desc = mysqli_real_escape_string($conn, $_POST['desc']);
$date = $_POST['date'];
$category = $_POST['category'];
$videoName = mysqli_real_escape_string($conn, $_POST['videoName']);
$photoName = mysqli_real_escape_string($conn, $_POST['photoName']);

if (isset($title) && isset($desc) && isset($date) && isset($category) && isset($videoName) && isset($photoName)) {
    $sql = "UPDATE fs_video SET vid_title = '$title', vid_description = '$desc', vid_thumbnail = '$photoName', vid_name = '$videoName', vid_rel_date = '$date', ct_id = '$category' WHERE vid_id = '$videoId'";

    $result = $conn->query($sql);
    if ($result) {
        echo 'inserted successfully';
    } else {
        echo 'unsuccess';
    }
} else {
    echo 'fields missing';
}
