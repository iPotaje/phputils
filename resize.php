<?php

$dirSource = "./images/";
$dirOutput = "./thumbs/";

$thumbWidth  = 90;
$thumbHeight = 90;

require __DIR__ . '/vendor/autoload.php';

use abeautifulsite\SimpleImage as SimpleImage;

if (is_dir($dirSource)) {
    if ($dh = opendir($dirSource)) {
        while (($file = readdir($dh)) !== false) {
          if (filetype($dirSource . $file) == 'file'){
            echo "nombre archivo: $file "  . "<br>";
            $img = new SimpleImage($dirSource . $file);
            $img->thumbnail($thumbWidth, $thumbHeight);
            $img->save($dirOutput . $file);
          }
        }
        closedir($dh);
    }
}
