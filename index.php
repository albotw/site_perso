<!doctype html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <link rel="stylesheet" src="CSS/base.css" type="text/css"/>
    <title>Site perso</title>
</head>

<body>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <?php
        require_once ("helpers/Input.php");
        require_once ("helpers/token.php");
        session_start();
        token::generate();

        if (Input::exists())
        {
            switch(Input::get("page"))
            {
                case "CV":
                    include_once("pages/CV.php");
                    break;

                case "contact":
                    include_once("pages/contact.php");
                    break;

                case "portfolio":
                    include_once("pages/portfolio.php");
                    break;

                default:
                    include_once("pages/home.php");
                    break;
            }
        }
        else
        {
            include_once("pages/home.php");
        }
    ?>
    <div id="csrf"><?= token::get();?></div>
</body>
</html>