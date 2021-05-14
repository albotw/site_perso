<?php

require_once("helpers/db.php");

function getAllProjets()
{
    $results = db::getInstance()->getAll(config::$PROJ_TABLE);
    if (db::getInstance()->hasError())
    {
        echo "Erreur pendant la récupération des données";
    }
    else
    {
        $results = grabTags($results);
        echo json_encode($results);
    }
}

function grabTags($values)
{
    for($i = 0; $i < count($values); $i++)
    {
        $call = "SELECT tagname FROM tags WHERE id IN (SELECT tag FROM taglist WHERE projet = ?)";
        $tags = db::getInstance()->query($call, [$values[$i]["id"]]);
        $values[$i]["tags"] = $tags;
    }

    return $values;
}

function search($text)
{
    $text = "%$text%";
    $call = "SELECT * FROM projets WHERE projets.nom LIKE ? OR projets.id IN (SELECT projet FROM taglist WHERE tag IN (SELECT id FROM tags WHERE tags.tagname LIKE ?)) ";
    $results = db::getInstance()->query($call, [$text, $text]);

    if (db::getInstance()->hasError())
    {
        echo "Aucun résultat correspondant";
    }
    else
    {
        $results = grabTags($results);
        echo json_encode($results);
    }
}