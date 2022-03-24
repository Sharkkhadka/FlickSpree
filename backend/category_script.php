<?php
include('../includes/db.php');

if (isset($_POST['category_val'])) {
    $category = $_POST['category_val'];

    // echo $category;
    // die();
    if ($category == 0) {
        $sql = "SELECT * FROM fs_video ORDER BY vid_id DESC";

        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($rows = $result->fetch_assoc()) { ?>
                <a href="video.php?id=<?php echo $rows['vid_id']; ?>" class="cat-card">
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
    } else {
        $sql = "SELECT * FROM fs_video WHERE ct_id = '$category'  ORDER BY vid_id DESC";

        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($rows = $result->fetch_assoc()) { ?>

                <a href="video.php?id=<?php echo $rows['vid_id']; ?>" class="cat-card">
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
    }
}
?>