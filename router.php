<?php
require_once("helpers/Input.php");
require_once("helpers/token.php");

require_once("controllers/projets.php");
require_once("controllers/contact.php");
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

            case "sendMessage":
                $nom = htmlspecialchars(Input::get("nom"), ENT_QUOTES | ENT_SUBSTITUTE);
                $email = filter_var(Input::get("email"), FILTER_SANITIZE_EMAIL);
                $sujet = htmlspecialchars(Input::get("sujet"), ENT_QUOTES | ENT_SUBSTITUTE);
                $texte = htmlspecialchars(Input::get("texte"), ENT_QUOTES | ENT_SUBSTITUTE);

                if (!empty($nom) && !empty($email) && !empty($sujet) && !empty($texte))
                    sendMessage($nom, $email, $sujet, $texte);
                else
                    echo "Erreur, paramètres invalides\n";
                break;

            default:
                echo "Paramètres invalides\n";
                break;
        }
    }
    else
    {
        echo "Vérification csrf invalide\n";
    }
}
else
{
    echo "Paramètres manquants\n";
}