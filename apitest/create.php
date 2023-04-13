<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include_once 'db.php';
include_once 'operations.php';

$database = new Database();
$db = $database->getConnection();

$item = new testclass($db);

$data = json_decode(file_get_contents("php://input"));

$item->test1 = $data->test1;
$item->test2 = $data->test2;
$item->test3 = $data->test3;
$item->test4 = $data->test4;
$item->test5 = $data->test5;
$item->test6 = $data->test6;
$item->test7 = $data->test7;
$item->test8 = $data->test8;
$item->test9 = $data->test9;


if($item->createtest()){
    echo 'Created';
} else{
    echo 'Not Created';
}
?>