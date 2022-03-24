<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include('doctypes/doc1.php'); ?>
    <title>FlickSpree | Home</title>
</head>

<body>

    <?php include('includes/header.php'); ?>

    <section class="showcase">
        <div class="video-stuff">
            <?php
            $sql = "SELECT * FROM fs_video ORDER BY vid_id DESC LIMIT 1";
            $data = $conn->query($sql);
            $rows = $data->fetch_assoc();
            $pos = strpos($rows['vid_description'], ' ', 100);
            $content = substr($rows['vid_description'], 0, $pos) . '...';
            ?>
            <div class="video-container">
                <video autoplay muted>
                    <source src="<?php echo 'assets/videos/' . $rows['vid_name']; ?>">
                </video>
            </div>
            <div class="video-desc">
                <h1><?php echo $rows['vid_title']; ?></h1>
                <h3><?php echo $content; ?></h3>
                <div class="video-buttons">
                    <a href="video.php?id=<?php echo $rows['vid_id']; ?>&title=<?php echo $rows['vid_title']; ?>"><i class="fas fa fa-play-circle"></i> Watch Now</a>
                </div>
            </div>
        </div>

    </section>

    <section class="category">
        <div class="category-header">
            <h1>Recently Added</h1>
            <!-- <a href="category.php">See all <i class="fas fa-arrow-circle-right"></i> </a> -->
        </div>
        <div class="category-list">

            <?php
            $sql = "SELECT * FROM fs_video ORDER BY vid_id DESC";

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
            }

            ?>
        </div>

    </section>


    <section class="category">

        <?php

        $sql = "SELECT * FROM fs_category";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($rows = $result->fetch_assoc()) {
                $id = $rows['ct_id'];
        ?>

                <div class="category-header">
                    <h1><?php echo $rows['ct_name']; ?></h1>
                    <a href="category.php?id=<?php echo $rows['ct_id']; ?>">See all <i class="fas fa-arrow-circle-right"></i> </a>
                </div>
                <div class="category-list">

                    <?php
                    $sql = "SELECT * FROM fs_video WHERE ct_id = '$id'";

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
                    }

                    ?>
                </div>
        <?php

            }
        }
        ?>

    </section>



    <?php include('includes/footer.php'); ?>
</body>

</html>