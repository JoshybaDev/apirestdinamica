<?php


$routesArray=explode("/",$_SERVER['REQUEST_URI']);
$routesArray=array_filter($routesArray);
//dd();
if(count($routesArray)==0)
{
    Response::tojson('No Found',404);
}
else if(count($routesArray)>0 && isset($_SERVER['REQUEST_METHOD']))
{
    if($_SERVER['REQUEST_METHOD']=='GET')
    {
        include("services/Get.php");
    }
}

return;