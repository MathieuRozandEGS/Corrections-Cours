<?php 
function generateHead($title)
{
    return '<!DOCTYPE html>
            <html lang="fr">

                <head>
                    <meta charset="UTF-8">
                    <meta http-equiv="X-UA-Compatible" content="IE=edge">
                    <meta name="viewport" content="width=device-width, initial-scale=1.0">
                    <link rel="stylesheet" href="./assets/css/style.css" />
                    <title> ' . $title . '</title>
                </head>

            <body>';
}

function generateUl($pages)
{
    $ul = "<ul>";
    for ($i = 0; $i < count($pages); $i++) {
        $li = '<li>
                    <a href="page_' . ($i + 1) . '.php">' . $pages[$i] . '</a>
                </li>';
        $ul = $ul . $li;
    }
    $ul = $ul . '</ul>';
    return $ul;
}

?>