<?php

function getFolderProyect()
{
if (strpos(__DIR__, '/') !== false){
 $root = str_replace('/opt/lampp/htdocs/', '/', __DIR__);
} else {
    $root = str_replace('C:\\xampp\\htdocs\\', '/', __DIR__);
}
$root = str_replace('config', '', $root);
return $root;
}

function saveImage($file)
{
    $imageName = str_replace(' ', ' ', $file['image']['name']);
    $imgTmp = $file['image']['tmp_name'];

    move_uploaded_file($imgTmp, $_SERVER['DOCUMENT_ROOT'].getFolderProyect().'/images/'.$imageName);
    return $imageName;
}
?>