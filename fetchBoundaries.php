<?php
    $url1 = $_GET['url1'];
    $url2 = $_GET['url2'];
    $command1 = 'Resources/PhantomJS/bin/phantomjs scheduler.js ' . $url1;
    $command2 = 'Resources/PhantomJS/bin/phantomjs scheduler.js ' . $url2;
    $response1 = exec($command1);
    $response2 = exec($command2);
    echo $response1 . ' ' . $response2;
?>