<?php
require __DIR__ . "/../../vendor/autoload.php";

use GuzzleHttp\Client;
use Illuminate\Http\JsonResponse;

if(isset($_GET["start"])){
    $start = $_GET["start"];
}else{
    $start = 0;
}

if( isset($_GET["keyword"]) ){
    $keyword = $_GET["keyword"];
}else{
    $keyword = "iphone";
}

if( isset($_GET["count"]) ){
    $count = $_GET["count"];
}else{
    $count = 10;
}

$url = "http://connpass.com/api/v1/event/";

$client = new Client();
$res = $client->get($url,[
    "query" => [
        "keyword" => $keyword,
        "start" => $start,
        "count" => $count
    ]
]);

$data = json_decode($res->getBody(),true);

$response = JsonResponse::create($data,200,[]);
$response->send();


