# reddit_download

<h2>Reddit download</h2>

<strong>
  Remember install FFMPEG in your PC o Server
  
</strong>

<p>
  Reddit download is a simple library, to be able to download videos from reddit you only have to send the video to the object using the method getLinkVideo and then the method download
  of this class.
</p>

<h3>Example</h3>
 <strong>Get Link video and downaloding</strong>
<code>

<?php

    require('Reddit_Download.php');

    $url = "https://www.reddit.com/r/argentina/comments/u16yij/cocodrilo_con_reflujo/";


    $Reddit_download = new Reddit_Download();
 
    $Reddit_download->getVideoLink($url);

    
      $save_as = "videos/cocodrilos.mp4";
  
     if( $Reddit_download->download($save_as)){
  
      echo $save_as;
  
  
     }



    ?>

</code>

<p>File exmaple example.php</p>





