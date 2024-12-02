<?php
    session_start();
    $_SESSION["userStatus"] = "loggedOut";

    if(isset($_SESSION["username"])) {
        $_SESSION["userStatus"] = "loggedIn";
        $profile_config = $_SESSION["profile_config"]; //Hat#Body#Ring
        $profile_config_names = explode("#", $profile_config);
    }

    $newTitle = "none";
    if (isset($_GET["newTitle"])) {
        $newTitle = $_GET["newTitle"];
    }

    $newAch = "none";
    if (isset($_GET["newAch"])) {
        $newAch = $_GET["newAch"];
    }

    $darkMode = "off";
    // check if darkMode is passed in
    if (isset($_GET['darkMode'])) {
        $darkMode = $_GET['darkMode'];
    } elseif (isset($_SESSION['darkMode'])) {
        $darkMode = $_SESSION['darkMode'];
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>BuzzScript</title>
    <link rel="icon" type="image/png" href="assets/Miscellaneous/logo.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/variables.css">
    <link rel="stylesheet" href="css/homepage.css">
    <script>
        let darkMode = '<?php echo $darkMode ?>';
        let newTitle = '<?php echo $newTitle ?>'
        let newAch = '<?php echo $newAch ?>'
    </script>
    <script src="js/main.js"></script>
</head>
<body>
    <div id="overlay"></div>
    <nav id="side-nav">
        <button type="button" class="close-btn">&times;</button>
        <ul>
          <?php if ($_SESSION["userStatus"] == "loggedIn") : ?>
            <li><a href="php/profile.php" id="profile-link">Profile</a></li>
            <li><a href="php/logout.php" id="logout">Logout</a></li>
          <?php else : ?>
            <li><a href="php/login.php">Log in</a></li>
            <li><a href="php/register.php">Register</a></li>
          <?php endif; ?>
          <!-- <li><a href="#">Achievement List</a></li>
          <li><a href="#">Title List</a></li> -->
        </ul>
        <button id="dark-mode-btn">Toggle Dark Mode</button>
    </nav>
    <button type="button" id="menu-btn"><i class="fas fa-bars"></i></button>
    <main>
        <h1>BuzzScript</h1>

            <?php if ($_SESSION["userStatus"] == "loggedIn") : ?>
                    <div id="profile-pic-container">
                        <img src="assets/Body/<?php echo $profile_config_names [1] ?> Body.png" alt="profile picture body" id="profile-body">
                        <img src="assets/Ring/<?php echo $profile_config_names [2] ?> Ring.png" alt="profile picture body" id="profile-ring">
                        <a href="php/profile_picture.php" id="profile-pic-link">
                            <img src="assets/Hats/<?php echo $profile_config_names [0] ?> Hat.png" title="Change Profile Picture" alt="profile picture body" id="profile-hat">
                        </a>
                    </div>
            <?php else : ?>
                <div id="profile-pic-container">
                    <img src="assets/Body/Orange Body.png" alt="profile picture body" id="profile-body">
                    <img src="assets/Ring/Orange Ring.png" alt="profile picture body" id="profile-ring">
                    <img src="assets/Hats/Top Hat.png" alt="profile picture body" id="profile-hat">
                </div>
            <?php endif; ?>

        <!-- use form for submitting quiz -->
        <form id="user-info">

            
            <?php if ($_SESSION["userStatus"] == "loggedIn") : ?>
                <p class="username"><?php echo $_SESSION["username"] ?></p>
            <?php else : ?>
                <p class="username" id="anon-username"></p>
            <?php endif; ?>

            <div id="quiz-play-section">
                <select name="quizzess" id="quiz-select">
                    <option value="horror_character" data-timed="false">If you entered a horror movie, what role would you play?</option>
                    <option value="pigeon" data-timed="false">What pigeon are you based on the bread you like?</option>
                    <option value="murder" data-timed="false">Can you get away with murder?</option>
                    <option value="witch" data-timed="false">If you were a witch, what ability would you have?</option>
                    <option value="vacation" data-timed="false">What would be your dream vacation?</option>
                    <option value="country" data-timed="true">How many countries can you name in a minute?</option>
                </select>
                <button type="button" id="play-btn">PLAY</button>
            </div>
        </form>
        <?php if ($_SESSION["userStatus"] == "loggedOut") : ?>
            <img src="assets/Miscellaneous/Die.png" alt="die" id="die">
        <?php endif; ?>
    </main>
</body>
</html>