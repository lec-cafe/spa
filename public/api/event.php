<?php
require __DIR__ . "/../../vendor/autoload.php";

use GuzzleHttp\Client;
use Illuminate\Http\JsonResponse;

if(isset($_GET["start"])){
    $start = $_GET["start"];
}else{
    $start = 0;
}


$url = "http://connpass.com/api/v1/event/";

$client = new Client();
$res = $client->get($url,[
    "query" => [
        "keyword" => "leccafe",
        "start" => $start
    ]
]);

$data = json_decode($res->getBody(),true);

$response = JsonResponse::create($data,200,[]);
$response->send();


