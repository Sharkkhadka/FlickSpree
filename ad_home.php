<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include('doctypes/doc3.php'); ?>
    <title>FlickSpree | Admin</title>
</head>

<body>
    <?php include('includes/ad_header.php'); ?>

    <div class="container">
        <div class="wrapper">
            <h1>List of all data:</h1><br>
            <div class="head_search">
                <div class="head_search_bar">
                    <i class="fas fa-search"></i>
                    <input type="text" id="search-admin" name="search">
                </div>
            </div>
        </div>
        <div class="data">
            <table id="table">
                <tr>
                    <th>id</th>
                    <th>img</th>
                    <th>title</th>
                    <th>Description</th>
                    <th>released</th>
                    <th>action</th>
                </tr>
                <?php

                $sql = "SELECT * FROM fs_video ORDER BY vid_id DESC";
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

            </table>
        </div>
    </div>

    <?php include('includes/ad_footer.php'); ?>
</body>

</html>