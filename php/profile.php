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
        $_SESSION["darkMode"] =  $darkMode;
    }

    if(isset($_SESSION["id"])) {
        $userId = $_SESSION["id"]; //Hat#Body#Ring
    }

    $darkMode = "off";
    // check if darkMode is on
    if (isset($_GET['darkMode'])) {
        $darkMode = $_GET['darkMode'];
        $_SESSION["darkMode"] =  $darkMode;
    }

    try{
        require_once "../includes/dbh.inc.php";

        require_once "../includes/getUserInfo.inc.php";

        $result = getUserInfo($userId, $pdo);

        //echo $result["title"];

    } catch (PDOException $e){
        die("Failed to retrive user info: " . $e->getMessage());
    }

    function formatStrings($stringArray) {
        $stringOutput = "";
        foreach ($stringArray as $string) {
            $stringOutput = $stringOutput . " " . htmlspecialchars($string) . " |";
        }
        return $stringOutput;
    }

    $ach_list = formatStrings(explode("#", $result["ach_config"]));
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" href="../css/reset.css">
    <link rel="stylesheet" href="../css/variables.css">
    <link rel="stylesheet" href="../css/profile_picture.css">
    <script>
        let userProfileConfig = '<?php echo $profile_config ?>';
        const darkMode = '<?php echo $darkMode ?>';
        console.log('<?php echo $ach_list ?>')
    </script>
    <script src="../js/profile.js"></script>
</head>
<body>
    <article>
        <header id="profile-header">
            <div id="profile-pic-container"></div>
            <div id="profile=info">
                <h2 id="username"><?php echo $_SESSION["username"] ?></h2>
                <p id="selected-title">| <span id="title"><?php echo $result["title"] ?></span> |</p>
            </div>
        </header>
        <section>
            <h1>Achievements</h1>
            <p id="ach-list"><?php echo $ach_list ?></p>
        </section>
        <hr>
        <section>
            <h1>Titles</h1>
            <h2>-- Click on a title below to change display title --</h2>
            <div id="title-list">
                <?php foreach (explode("#", $result["title_list"]) as $title) { ?>
                    <button class="title"> <span><?php echo $title ?></span> |</button>
                <?php } ?>
            </div>
        </section>

        <section id="links">
            <a href="../index.php?darkMode=<?php echo $darkMode?>" id="return">Return</a>
        </section>
    </article>
</body>
</html>