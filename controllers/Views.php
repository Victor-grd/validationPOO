<?php
class View
{
    public $count;
    // public $path;
    public $head = "./views/layouts/head.html";
    public $foot = "./views/layouts/foot.html";

    // public function makeMenu()
    // {
    //     foreach ($variable as $key => $value) {
    //         # code...
    //     }
    // }
    public function contentFiles($count, $order)
    {
        $count = ltrim($count, '/');
        $dir = scandir("./views");
        $listeMenu = array_diff($dir,[
            '.',
            '..',
            'layouts',
            '_404.html',
        ]);
        if($order == "asort"){
            asort($listeMenu);
        }elseif($order == "arsort" || $order == ""){
            arsort($listeMenu);
        }
            
        $arrayCount = array_slice($listeMenu, 0, $count, true);
        $content = "<div id='content'>";
        foreach ($arrayCount as $key => $value) {
            $id = substr($value,0,strpos($value, "."));
            $content .= "<section id='$id'>" . file_get_contents('./views/'.$value) . "</section>";
        }
        $content .= "</div>";

        $menu = "<ul>";
        $i=0;
        foreach ($listeMenu as $key => $value) {
            $i++;
            $id = substr($value,0,strpos($value, "."));
            $menu .= "<li><a href='$i'>".$id."</a></li>";
        }
        $menu .= "</ul>";

        echo file_get_contents($this->head) . $menu . $content . file_get_contents($this->foot);
    }

}
