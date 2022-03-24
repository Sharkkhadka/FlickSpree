<?php

include('../includes/db.php');

$search_term = $_POST['search'];

$sql = "SELECT * FROM fs_video WHERE vid_title LIKE '%{$search_term}%'";

$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while ($rows = $result->fetch_assoc()) {
        $pos = strpos($rows['vid_description'], ' ', 70);
        $content = substr($rows['vid_description'], 0, $pos) . '...';
?>
        <tr>
            <td><?php echo $rows['vid_id']; ?></td>
            <td><img src="<?php echo 'assets/img/' . $rows['vid_thumbnail']; ?>" alt=""></td>
            <td><?php echo $rows['vid_title']; ?></td>
            <td><?php echo $content; ?></td>
            <td><?php echo $rows['vid_rel_date']; ?></td>
            <td><a href="ad_more.php?id=<?php echo $rows['vid_id']; ?>" class="green"><i class="fas fa-list"></i> More</a> <a id="delete-record" data-id="<?php echo $rows['vid_id']; ?>" class="danger"><i class="fas fa-trash-alt"></i> Delete</a> </td>
        </tr>

<?php
    }
}
?>