<?php

include('../includes/db.php');

$search_term = $_POST['search'];

$sql = "SELECT * FROM fs_video WHERE vid_title LIKE '%{$search_term}%' LIMIT 5";

$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while ($rows = $result->fetch_assoc()) { ?>
        <a href="video.php?id=<?php echo $rows['vid_id']; ?>">
            <div id="result-list">
                <div class="result-thumb">
                    <img src="<?php echo 'assets/img/' . $rows['vid_thumbnail']; ?>" alt="">
                </div>
                <div class="result-name">
                    <h3><?php echo $rows['vid_title']; ?></h3>
                </div>
                <h3>2020</h3>
            </div>
        </a>

<?php
    }
}
?>