<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include('doctypes/doc3.php'); ?>
    <title>Details</title>
</head>

<body>
    <?php include('includes/ad_header.php'); ?>

    <div class="details container">
        <h1>Details:</h1>
        <div class="detail-wrapper">
            <?php

            $id = $_GET['id'];

            $sql = "SELECT * FROM fs_video WHERE vid_id = '$id'";

            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while ($rows = $result->fetch_assoc()) { ?>
                    <div class="graphic-section">

                        <form id="form-video-upload">
                            <div class="video-section">
                                <p>
                                    <label>Choose a video: </label>
                                    <input type="file" name="video" value="<?php echo 'assets/videos/' . $rows['vid_name']; ?>">
                                </p>
                                <input type="submit" name="upload-video" id="upload-video">
                            </div>

                            <div id="video-container">
                                <video id="video" width="500px" height="400px" data-video-name="<?php echo $rows['vid_name']; ?>" controls>
                                    <source src="<?php echo 'assets/videos/' . $rows['vid_name']; ?>" data-video-id="<?php echo $rows['vid_id']; ?>">
                                </video>
                            </div>
                        </form>

                        <form id="form-photo-upload">
                            <div class="thumbnail-section">
                                <p>
                                    <label for="#">Choose a thumbnail: </label>
                                    <input type="file" name="photo" value="<?php echo 'assets/img/' . $rows['vid_thumbnail']; ?>">
                                </p>
                                <input type="submit" name="upload-img" id="upload-img">
                                <div id="thumbnail-container">
                                    <img id="photo" src="<?php echo 'assets/img/' . $rows['vid_thumbnail']; ?>" data-photo-name="<?php echo $rows['vid_thumbnail']; ?>">
                                </div>

                            </div>
                        </form>
                    </div>
                    <div class="detail-section">
                        <input type="hidden" id="update-id" value="<?php echo $_GET['id']; ?>">
                        <p>
                            <label for="#">Title: </label>
                            <input type="text" id="title" name="text" placeholder="Enter the title" value="<?php echo $rows['vid_title']; ?>">
                        </p>
                        <p>
                            <label for="#">Description: </label>
                            <textarea name="desc" id="desc" cols="30" rows="10"><?php echo $rows['vid_description']; ?></textarea>
                        </p>
                        <p>
                            <label for="#">Released on: </label>
                            <input type="date" id="date" name="rel_date" value="<?php echo $rows['vid_rel_date']; ?>">
                        </p>
                        <p>
                            <label for="#">Select a category: </label>
                            <select id="cat_select">
                                <option value="#">Select a category</option>
                                <?php
                                $sql = "SELECT * FROM fs_category";
                                $data = $conn->query($sql);
                                if ($data->num_rows > 0) {
                                    while ($row = $data->fetch_assoc()) { ?>
                                        <option id="cat_val" value="<?php echo $row['ct_id']; ?>"><?php echo $row['ct_name'] ?></option>
                                <?php }
                                }

                                ?>
                            </select>
                        </p>
                        <p>
                            <input type="submit" id="update_data" name="update" value="Update">
                        </p>
                    </div>
            <?php
                }
            }
            ?>

        </div>

    </div>



    <?php include('includes/ad_footer.php'); ?>
</body>

</html>