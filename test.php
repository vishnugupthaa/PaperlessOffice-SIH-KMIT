<?php


    $file = fopen("sample.txt","r");
    $signature = fgets($file);
    echo $signature;
    fclose($file);

?>