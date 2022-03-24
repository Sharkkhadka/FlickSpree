<?php
session_start();

include('../includes/db.php');

$title = mysqli_real_escape_string($conn, $_POST['title']);
$desc = mysqli_real_escape_string($conn, $_POST['desc']);
$date = $_POST['date'];
$category = $_POST['category'];
$videoName = mysqli_real_escape_string($conn, $_POST['videoName']);
$photoName = mysqli_real_escape_string($conn, $_POST['photoName']);

$sql = "INSERT INTO fs_video (vid_title, vid_description, vid_thumbnail, vid_name, vid_rel_date, ct_id) VALUES ('$title', '$desc', '$photoName', '$videoName', '$date', '$category')";

$result = $conn->query($sql);
if ($result) {
    echo 'inserted successfully';
} else {
    echo 'unsuccess';
}
