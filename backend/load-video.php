<?php

include('../includes/db.php');

$load = $_POST['load'];
$sql = "SELECT * FROM fs_video LIMIT $load";


$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($rows = $result->fetch_assoc()) { ?>


        <a href="video.php?id=<?php echo $rows['vid_id']; ?>&title=<?php echo $rows['vid_title']; ?>" class="category-card">
            <div class="category-img">
                <img src="<?php echo 'assets/img/' . $rows['vid_thumbnail']; ?>" alt="">
            </div>
            <div class="category-desc">
                <h3><?php echo $rows['vid_title']; ?></h3>
            </div>
            <div class="category-overlay"></div>
        </a>

<?php

    }
} ?>