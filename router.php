<?php
require_once("helpers/Input.php");
require_once("helpers/token.php");

require_once("controllers/projets.php");
session_start();
if (Input::exists())
{
    if (token::check(Input::get("csrf_token")))
    {
        switch(Input::get("action"))
        {
            case "getAllProjets":
                getAllProjets();
                break;

            case "searchProjets":
                $text = Input::get("text");
                if (!empty($text))
                    search($text);
                else
                    echo "Aucun résultat trouvé";
                break;
            default:
                echo "Paramètres invalides";
                break;
        }
    }
    else
    {
        echo "Vérification csrf invalide";
    }
}
else
{
    echo "Paramètres manquants";
}