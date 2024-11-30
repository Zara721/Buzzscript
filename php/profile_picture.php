<?php
    session_start();

    //grab default from user profile config
    $profile_config = "Jester#Purple#Black";
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
        <div id="options">
            <!-- <img src="../assets/Hats/Baseball Hat Icon.png"> -->
        </div>
        <a href="#" id="update">Update Profile</a>
        <a href="../index.php" id="return">Return</a>
    </article>
</body>
</html>