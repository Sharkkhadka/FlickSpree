<?php

if ($_FILES['photo']['name'] != '') {
    $imgName = $_FILES['photo']['name'];
    $ext = pathinfo($imgName, PATHINFO_EXTENSION);
    $valid_ext = ['jpg', 'jpeg', 'png'];
    if (in_array($ext, $valid_ext)) {
        $random_vid_name = uniqid() . '.' . $ext;
        $path = '../assets/img/' . $random_vid_name;
        $path_photo = 'assets/img/' . $random_vid_name;
        if (move_uploaded_file($_FILES['photo']['tmp_name'], $path)) { ?>
            <img src="<?php echo $path_photo; ?>" id="photo" data-photo-name="<?php echo $random_vid_name; ?>">
            <button data-path="<?php echo $path_photo; ?>" id="remove-img">Remove</button>
<?php
        }
    } else {
        echo '<script>alert("The file extension is not supported"); </script>';
    }
}
