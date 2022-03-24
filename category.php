<?php
include('includes/db.php');

if (isset($_REQUEST['id'])) {
    $id = $_REQUEST['id'];
}



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include('doctypes/doc2.php'); ?>
    <title>Categories | FlickSpree</title>
</head>

<body>
    <?php include('includes/header.php'); ?>

    <section class="cat-section container">
        <div class="cat-header">
            <div class="cat-title">
                <?php
                $sql = "SELECT * FROM fs_category WHERE ct_id = '$id'";
                $data = $conn->query($sql);
                $row = $data->fetch_assoc();
                ?>

                <h1>Category: <span id="cat-name">
                        <?php echo $row['ct_name']; ?>
                    </span></h1>
            </div>
            <div class="cat-chooser">
                <select name="category" id="category-dropdown">
                    <option id="all-videos" value="all">Select a category</option>
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
            </div>
        </div>

        <div class="cat-video-cards">
            <div id="cat-list">
                <?php


                $sql = "SELECT * FROM fs_video WHERE ct_id = '$id'  ORDER BY vid_id DESC";

                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while ($rows = $result->fetch_assoc()) { ?>

                        <a href="video.php?id=<?php echo $rows['vid_id']; ?>&title=<?php echo $rows['vid_title']; ?>" class="cat-card">
                            <div class="cat-img">
                                <img src="<?php echo 'assets/img/' . $rows['vid_thumbnail']; ?>" alt="">
                            </div>
                            <div class="cat-desc">
                                <h4><?php echo $rows['vid_title']; ?></h4>
                            </div>
                        </a>
                <?php
                    }
                }

                ?>

            </div>

        </div>
    </section>

    <?php include('includes/footer.php'); ?>
</body>

</html>