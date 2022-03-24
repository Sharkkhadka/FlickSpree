<?php
session_start();
include('db.php');

if (isset($_SESSION['username']) && isset($_SESSION['user_id']) && $_SESSION['login'] == 'loggedIn') {
    $profile = '<a href="#" id="user-option"><i class="fas fa-user-circle" style="font-size: 1.2rem"></i> ' . $_SESSION['username'] . '</a>';
    // $logout = '<a href="../index.php" id="login">Login</a>';
} else {
    $profile = '<a href="login.php" id="login"><i class="fas fa-user"></i> Login</a>';
}
?>


<div class="main">

    <section class="header">
        <div class="header-logo">
            <h1>FlickSpree</h1>
        </div>
        <div class="header-nav">
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="#" id="drop">Categories <i class="fas fa-caret-down"></i></a>
                    <div class="drop-down-menu">
                        <ul class="drop-down">
                            <?php
                            $result = $conn->query("SELECT * FROM fs_category");
                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) { ?>
                                    <li><a href="category.php?id=<?php echo $row['ct_id']; ?>"><?php echo $row['ct_name']; ?></a></li>
                            <?php
                                }
                            }

                            ?>
                        </ul>
                    </div>
                </li>
            </ul>

        </div>
        <div class="header-search-bar">
            <div class="bar">
                <i class="fas fa-search"></i>
                <input type="text" id="search" name="search">
            </div>
            <div id="search-result">

            </div>
        </div>
        <div class="login">
            <?php echo $profile; ?>
            <!-- <a href="#" id="user-option">jfdkal</a> -->
            <div id="user-option-drop">
                <ul>
                    <?php
                    if ($_SESSION['role'] == 'admin') {
                        $option = '<li><a href="ad_home.php"><i class="fas fa-list"></i> Admin Page</a></li>
                        <li><a href="logout.php"><i class="fas fa-sign-in-alt"></i> Sign Out</a></li>';
                        echo $option;
                    } else {
                        $option = '<li><a href="logout.php"><i class="fas fa-sign-in-alt"></i> Sign Out</a></li>';
                        echo $option;
                    }
                    ?>
                    <!-- <li><a href="profile.php"><i class="fas fa-list"></i> My Profile</a></li>
                    <li><a href="logout.php"><i class="fas fa-sign-in-alt"></i> Sign Out</a></li> -->
                </ul>
            </div>
        </div>
    </section>