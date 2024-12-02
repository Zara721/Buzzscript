<?php
    session_start();

    //grab default from user profile config
    if(isset($_SESSION["profile_config"])) {
        $profile_config = $_SESSION["profile_config"]; //Hat#Body#Ring
    }

    $darkMode = "off";
    // check if darkMode is on
    if (isset($_GET['darkMode'])) {
        $darkMode = $_GET['darkMode'];
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Picture</title>
    <link rel="stylesheet" href="../css/reset.css">
    <link rel="stylesheet" href="../css/variables.css">
    <link rel="stylesheet" href="../css/profile_picture.css">
    <script>
        let userProfileConfig = '<?php echo $profile_config ?>';
        const darkMode = '<?php echo $darkMode ?>';
    </script>
    <script src="../js/profile_picture.js"></script>
</head>
<body>
    <article>
        <header>
            <div id="profile-pic-container"></div>
        </header>
        <div id="selectors">
            <button type="button" id="hats">Hats</button>
            <button type="button" id="body">Body</button>
            <button type="button" id="ring">Ring</button>
        </div>
        <div id="options"> </div>
        <form action="../includes/formhandler.profilepic.inc.php" method="post">
            <input type="hidden" id="profile-config" name="profile-config">
            <input type="hidden" name="darkMode" value="<?php echo $darkMode ?>">
            <button type="submit" id="update">Update Profile</button>
        </form>
        <a href="../index.php?darkMode=<?php echo $darkMode?>" id="return">Return</a>
    </article>
</body>
</html>