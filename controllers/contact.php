<?php
function sendMessage($nom, $email, $sujet, $texte)
{
    if (mail("yann.trou@gmail.com", $sujet, $nom . "\n" . $texte, "From: $email"))
    {
        echo "email envoyé avec succès";
    }
    else
    {
        echo "Il y a eu une erreur lors de l'envoi";
    }
}