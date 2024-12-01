<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log In</title>
    <link rel="stylesheet" href="../css/reset.css">
    <link rel="stylesheet" href="../css/variables.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../css/forms.css">
    <script src="../js/forms.js"></script>
</head>
<body>
    <main>
        <form action="../includes/formhandler.login.inc.php" method="post" id="register-form">
            <div class="form-group">
            <input type="hidden" id="concat-username" name="concat-username">
                <p>Username:  
                    <span id="display-username">
                        <span id="display-adj"></span>
                        <span id="display-noun"></span>
                    </span>
                </p>
                <div id="username-selects">
                    <select multiple class="form-control" name="username-adj" id="username-adj">
                        <option>Slimy</option>
                        <option>Dreamy</option>
                        <option selected>Depressed</option>
                        <option>Existential</option>
                        <option>Happy</option>
                        <option>Grumpy</option>
                        <option>Nihilistic</option>
                        <option>Mystical</option>
                        <option>Flamboyant</option>
                        <option>Elegant</option>
                        <option>Ugly</option>
                        <option>Fluffy</option>
                        <option>Ashy</option>
                        <option>Mysterious</option>
                        <option>Acoustic</option>
                        <option>Quirky</option>
                        <option>Prideful</option>
                        <option>Dusty</option>
                        <option>Dusty</option>
                        <option>Imaginary</option>
                        <option>Noble</option>
                        <option>Oblivious</option>
                        <option>Peculiar</option>
                        <option>Questionable</option>
                        <option>Tactial</option>
                        <option>Witty</option>
                        <option>Violent</option>
                        <option>Eccentric</option>
                    </select>
                    <select multiple class="form-control" name="username-noun" id="username-noun">
                        <option>Turtle</option>
                        <option selected>Dolphin</option>
                        <option>Fox</option>
                        <option>Cow</option>
                        <option>Raven</option>
                        <option>Panther</option>
                        <option>Axolotl</option>
                        <option>Shark</option>
                        <option>Swan</option>
                        <option>Mermaid</option>
                        <option>Unicorn</option>
                        <option>Narwhal</option>
                        <option>Goblin</option>
                        <option>Butterfly</option>
                        <option>Beaver</option>
                        <option>Wolf</option>
                        <option>Gater</option>
                        <option>Panda</option>
                        <option>Bear</option>
                        <option>Owl</option>
                        <option>Siren</option>
                        <option>Hedgehog</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" class="form-control" name="passwd" id="password" placeholder="Password">
            </div>
            <button type="submit" id="submit-btn" class="btn btn-primary">Log In</button>
            <a href="../index.php" id="return">Return</a>
        </form>
    </main>
</body>
</html>