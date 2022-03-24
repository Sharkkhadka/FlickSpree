<?php

session_start();

if (isset($_SESSION['username']) && isset($_SESSION['user_id']) && $_SESSION['login'] == 'loggedIn') {

    if (isset($_POST['comment']) && isset($_POST['video_id'])) {

        include('../includes/db.php');

        $comment = mysqli_real_escape_string($conn, $_POST['comment']);
        $vid_id = $_POST['video_id'];

        $user_id = $_SESSION['user_id'];

        $sql = "INSERT INTO fs_comment (vid_id, user_id, comment) VALUES ('$vid_id', '$user_id', '$comment' )";
        $insert_result = $conn->query($sql);
        if ($insert_result) {
            $sql = "SELECT * FROM fs_comment INNER JOIN fs_video ON fs_comment.vid_id = fs_video.vid_id INNER JOIN users ON fs_comment.user_id = users.id WHERE fs_comment.vid_id = '$vid_id' ORDER BY fs_comment.id DESC";
            $retrive_cmt = $conn->query($sql);
            if ($retrive_cmt->num_rows > 0) {
                while ($rows = $retrive_cmt->fetch_assoc()) { ?>
                    <h4><?php echo $rows['username']; ?></h4>
                    <h5><?php echo $rows['comment']; ?></h5>
<?php
                }
            }
        } else {
            echo 'insertion_unsuccessful';
        }
    }
} else {
    echo 'Login_error';
}
