<?php

    require('Reddit_Download.php');

    $url = "https://www.reddit.com/r/argentina/comments/u16yij/cocodrilo_con_reflujo/";


    $Reddit_download = new Reddit_Download();
 
    $Reddit_download->getVideoLink($url);

    $save_as = "videos/cocodrilos";

   if( $Reddit_download->download($save_as)){

    echo $save_as;


   }





?>