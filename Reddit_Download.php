<?php


class Reddit_Download
{
    private string $post_url;
    private string $video_link;
    private array $data;

    public function getVideoLink(string $post_url): string
    {
      

        $this->post_url = $post_url;
           // Incluye la biblioteca Simple HTML DOM Parser
           ini_set('user_agent', 'My-Application/2.5');
           include('simplehtmldom/simple_html_dom.php');

           $url = $post_url;
           $src = "";

           $html = file_get_html($url);

           $sourceTags = $html->find('source');

           foreach ($sourceTags as $sourceTag) {
               $src = $sourceTag->src;
           }
           $html->clear();
             $this->video_link = $src;
           return $src;
    }

    public function download(string $save_as, string $preset = 'fast', int $crf = 20): bool
    {
     
        // 
        //      echo "$this->video_link";
        $try_ffmpeg = trim(shell_exec('type -P ffmpeg'));
        if (empty($try_ffmpeg)) {
            throw new Exception("FFmpeg not found on your system");
        }

        $command = "ffmpeg -i $this->video_link -c:v libx264 -preset {$preset} -crf {$crf} -o $save_as.mp4";
        system($command);

        return true;
    }

}