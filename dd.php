<?php
function dd($var)
{
    echo '<pre>';
    print_r($var);
    echo '</pre><br>';
}
function dd2(...$var)
{
    echo '<pre>';
    var_dump($var);
    echo '</pre><br>';
}
?>