<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include('doctypes/doc2.php'); ?>
    <title>Video</title>
</head>

<body>

    <?php include('includes/header.php'); ?>

    <!-- flick spree -->
    <section class="flick">
        <div class="left-section">
            <?php
            if (isset($_REQUEST['id'])) {
                $id = $_REQUEST['id'];
                $sql = "SELECT * FROM fs_video INNER JOIN fs_category ON fs_video.ct_id = fs_category.ct_id WHERE fs_video.vid_id = '$id'";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    while ($rows = $result->fetch_assoc()) { ?>

                        <div class="flick-container">
                            <video controls>
                                <source src="<?php echo 'assets/videos/' . $rows['vid_name']; ?>">
                            </video>
                        </div>
                        <div class="flick-desc">
                            <!-- <div class="desc-head">
                                <h1></h1>
                                <div class="ratings">
                                    <h1>5</h1>
                                </div>
                            </div>
                            <div class="desc-content">
                                <h3></h3>
                            </div> -->
                            <div class="flick-thumbnail">
                                <img src="<?php echo 'assets/img/' . $rows['vid_thumbnail'] ?>" alt="">
                            </div>
                            <div class="flick-content">
                                <div class="flick-content-title">
                                    <h1><?php echo $rows['vid_title']; ?> </h1>
                                    <h4><?php echo $rows['vid_description']; ?></h4>
                                    <div class="flick-content-list">
                                        <h4>Category: <span><a href="category.php?id=<?php echo $rows['ct_id']; ?>"><?php echo $rows['ct_name']; ?></a></span></h4>

                                        <h4>Release Date: <span><?php echo $rows['vid_rel_date']; ?></span></h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="comment-section">
                            <h1>Comments: </h1>
                            <div class="comment-input">
                                <textarea id="comment" cols="30" rows="5" placeholder="Add a public comment"></textarea>
                                <button id="submit-comment">Submit</button>
                                <p id="hidden-video-id" style="visibility: hidden;"><?php echo $id; ?></p>
                            </div>
                            <div class="comment-desc">
                                <?php
                                $vid_id = $_REQUEST['id'];
                                $sql = "SELECT * FROM fs_comment INNER JOIN fs_video ON fs_comment.vid_id = fs_video.vid_id INNER JOIN users ON fs_comment.user_id = users.id WHERE fs_comment.vid_id = '$vid_id' ORDER BY fs_comment.id DESC";
                                $retrive_cmt = $conn->query($sql);
                                if ($retrive_cmt->num_rows > 0) {
                                    while ($rows = $retrive_cmt->fetch_assoc()) { ?>
                                        <h4> <?php echo $rows['username']; ?></h4>
                                        <h5><?php echo $rows['comment']; ?></h5>
                                <?php
                                    }
                                }
                                ?>
                            </div>
                        </div>


            <?php

                    }
                }
            }

            ?>

        </div>
        <div class="right-section">
            <h1>Recommended: </h1>
            <div class="category-list">

                <?php
                $sql = "SELECT * FROM fs_video ORDER BY vid_id DESC LIMIT 6";

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
                <div id="new-videos">

                </div>
                <button id="load-videos"><i class="fas fa-chevron-down"></i> Load More videos</button>
            </div>
        </div>

    </section>

    <?php include('includes/footer.php'); ?>

</body>

</html>