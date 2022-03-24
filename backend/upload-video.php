<?php

if ($_FILES['video']['name'] != '') {
    $videoName = $_FILES['video']['name'];
    $ext = pathinfo($videoName, PATHINFO_EXTENSION);
    $valid_ext = ['mp4', 'webm', 'mkv'];
    if (in_array($ext, $valid_ext)) {
        $random_vid_name = uniqid() . '.' . $ext;
        $path = '../assets/videos/' . $random_vid_name;
        $path_video = 'assets/videos/' . $random_vid_name;
        if (move_uploaded_file($_FILES['video']['tmp_name'], $path)) { ?>
            <video width="500px" height="400px" id="video" data-video-name="<?php echo $random_vid_name; ?>" controls>
                <source src="<?php echo $path_video; ?>">
            </video>
            <button data-path="<?php echo $path_video; ?>" id="remove-video">Remove</button>
<?php
        }
    } else {
        echo '<script>alert("The file extension is not supported"); </script>';
    }
}
?>