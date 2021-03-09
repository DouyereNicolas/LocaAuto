<!doctype html>
<html lang="fr">

<head>
    <title>Locauto</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="/assets/css/style.css">
</head>

<body>
    <div class="header">

        <div class="nav">

            <a href="<?php echo base_url(); ?>Accueil">Accueil</a>


            <a href="<?php echo base_url(); ?>Location">Location</a>


            <?php if (!isset($_SESSION["login"]) && !isset($_SESSION["password"])) { ?>
                <a href="<?php echo base_url(); ?>Inscription">Inscription</a>
            <?php } ?>

            <a href="<?php echo base_url(); ?>History">Notre Histoire</a>

            
            <?php if (isset($_SESSION["login"]) && isset($_SESSION["password"])) { ?>
                <a href="<?php echo base_url(); ?>Administration">Adminitration</a>
            <?php } ?>

        </div>
        <div class="deco">
            <?php if (isset($_SESSION["login"]) && isset($_SESSION["password"])) { ?>
                <a href="<?= base_url(); ?>Deco">Deco</a>
            <?php } ?>
        </div>
        <div class="connexion">
            <?php if (!isset($_SESSION["login"]) && !isset($_SESSION["password"])) { ?>
                <form action="connexion" method="post">
                    <label for="login">Login</label>
                    <input type="text" name="login" id="login" value="<?php if(isset($_SESSION['valueLog'])){echo $_SESSION['valueLog'];} ?>" size="20" />
                    <p><?php if(isset($_SESSION['errorLogin'])){ echo $_SESSION['errorLogin']; } ?></p>
                    <label for="pass">Mot de passe</label>
                    <input type="text" name="pass" id="pass" value="<?= set_value('pass'); ?>" size="20" />
                    <p><?php if(isset($_SESSION['errorPass'])){ echo $_SESSION['errorPass'];} ?></p>
                    <input type="submit" value="Submit" />
                </form>
            <?php } ?>
        </div>
        <div class="container">