<?php


if (! function_exists('dd')) {
    function dd(mixed $data = ""): void
    {
        echo "<pre><h1>";
        var_dump($data);
        echo "</h1></pre>";
        die();
    }
}

if (! function_exists('h1')) {
    function h1(string|int|float|bool $data, bool $is_error = false): void
    {
        if ($is_error) {
            echo "<h1 style='color:red;'>$data</h1>";
        } else {
            echo "<h1>$data</h1>";
        }
    }
}

if (! function_exists('need')) {
    function need(string $path): void
    {
        if(! defined("ROOT")){
            dd("Root is NOT defined");
        }
        require ROOT . $path;
    }
}

if (! function_exists('view')) {
    function view(string $view_name, $data = [])
    {
        extract($data);
        
        require ROOT . "resources/views/$view_name.view.php";
        
    }
}


