<?php
$table=explode("?",$routesArray[1])[0];
$select=$_GET['select'] ?? ($_GET['SELECT'] ?? "*");
$orderBy=$_GET['orderBy'] ?? null;
$orderMode=$_GET['orderMode'] ?? null;
$limitToEnd=$_GET['limitToEnd'] ?? null;
// dd2($_GET,$limitToEnd);

if(isset($_GET["linkTo"]) && isset($_GET["operatorX"]) && isset($_GET["equalTo"]))
{
    $res = GetController::getDataFilter($table,$select,$_GET["linkTo"],$_GET["operatorX"],$_GET["equalTo"],$orderBy,$orderMode,$limitToEnd);
}
else
{
    $res = GetController::getData($table,$select,$orderBy,$orderMode,$limitToEnd);
}
//dd($res);
echo Response::tojson("success",$res);

