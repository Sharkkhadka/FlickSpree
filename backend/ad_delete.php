<?php

include('../includes/db.php');

if (isset($_POST['id'])) {
    $id = $_POST['id'];

    $sql = "DELETE FROM fs_video WHERE vid_id = '$id'";

    $result = $conn->query($sql);
    if ($result) {
        echo 'success';
    }
}
