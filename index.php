<!doctype html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <link rel="stylesheet" src="CSS/base.css" type="text/css"/>
    <title>Site perso</title>
</head>

<body>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/vue@2/dist/vue.js"></script>
    <?php
        require_once("backend/helpers/Input.php");
        require_once("backend/helpers/token.php");
        session_start();
        token::generate();

        include_once("frontend/include/header.php");
        if (Input::exists())
        {
            switch(Input::get("page"))
            {
                case "CV":
                    include_once("frontend/pages/CV.php");
                    break;

                case "contact":
                    include_once("frontend/pages/contact.php");
                    break;

                case "portfolio":
                    include_once("frontend/pages/portfolio.php");
                    break;

                default:
                    include_once("frontend/pages/home.php");
                    break;
            }
        }
        else
        {
            include_once("frontend/pages/home.php");
        }
    ?>
    <div id="csrf"><?= token::get();?></div>
</body>
</html>