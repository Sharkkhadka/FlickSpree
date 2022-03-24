<?php
session_start();
include('includes/db.php');

if (isset($_SESSION['username']) && isset($_SESSION['user_id']) && $_SESSION['login'] == 'loggedIn') {
    $profile = '<a href="#" id="user-option"><i class="fas fa-user-circle" style="font-size: 1.2rem"></i> ' . $_SESSION['username'] . '</a>';
    // $logout = '<a href="../index.php" id="login">Login</a>';
} else {
    $profile = '<a href="login.php" id="login"><i class="fas fa-user"></i> Login</a>';
}
?>
<div class="admin-head-bar">
    <div class="ad_head_wrapper">
        <div class="ad_head_logo">
            <p>FlickSpree</p>
        </div>

        <div class="ad_head_log">
            <?php echo $profile; ?>
            <div id="user-option-drop">
                <ul>
                    <li><a href="index.php"><i class="fas fa-home"></i> Go to home</a></li>
                    <li><a href="logout.php"><i class="fas fa-sign-in-alt"></i> Sign Out</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
<div class="side_main">
    <div class="side_bar_wrapper">
        <a href="ad_home.php"><i class="fas fa-list"></i> Details</a>
        <a href="ad_upload.php"><i class="fas fa-upload"></i> Upload</a>
        <!-- <a href="#"><i class="fas fa-pen"></i> Update</a>
        <a href="#"><i class="fas fa-trash-alt"></i> Delete</a> -->
    </div>
    <div class="main_content">