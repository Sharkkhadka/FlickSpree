<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include('doctypes/doc3.php'); ?>
    <title>Upload Video</title>
</head>

<body>
    <?php include('includes/ad_header.php'); ?>

    <!-- upload -->
    <div class="upload container">
        <h1>upload video</h1>
        <div class="graphic-section">
            <form id="form-video-upload">
                <div class="video-section">
                    <p>
                        <label>Choose a video: </label>
                        <input type="file" name="video">
                    </p>
                    <input type="submit" name="upload-video" id="upload-video">
                </div>

                <div id="video-container">

                </div>
            </form>

            <form id="form-photo-upload">
                <div class="thumbnail-section">
                    <p>
                        <label for="#">Choose a thumbnail: </label>
                        <input type="file" name="photo">
                    </p>
                    <input type="submit" name="upload-img" id="upload-img">
                    <div id="thumbnail-container">
                    </div>

                </div>
            </form>
        </div>
        <div class="detail-section">
            <p>
                <label for="#">Title: </label>
                <input type="text" id="title" name="text" placeholder="Enter the title">
            </p>
            <p>
                <label for="#">Description: </label>
                <textarea name="desc" id="desc" cols="30" rows="10"></textarea>
            </p>
            <p>
                <label for="#">Released on: </label>
                <input type="date" id="date" name="rel_date">
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
                <input type="submit" id="upload-data" name="submit" value="submit">
            </p>
        </div>
    </div>

    <?php include('includes/ad_footer.php'); ?>

</body>

</html>