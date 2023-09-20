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

           // URL de la página que deseas analizar
           $url = $post_url;
           $src = "";

           // Crea una instancia de Simple HTML DOM Parser
           $html = file_get_html($url);

           // Encuentra todas las etiquetas <source> en la página
           $sourceTags = $html->find('source');

           // Recorre todas las etiquetas <source> y captura el atributo src
           foreach ($sourceTags as $sourceTag) {
               $src = $sourceTag->src;
           }
           // Libera la memoria
           $html->clear();
             $this->video_link = $src;
           return $src;
    }

    public function download(string $save_as, string $preset = 'fast', int $crf = 20): bool
    {
        $try_ffmpeg = trim(shell_exec('type -P ffmpeg'));
        if (empty($try_ffmpeg)) {
            throw new Exception("FFmpeg not found on your system");
        }
        $command = "ffmpeg -i '$this->video_link}' -c:v libx264 -preset {$preset} -crf {$crf} {$save_as}.mp4";
        shell_exec($command);
        return true;
    }

}