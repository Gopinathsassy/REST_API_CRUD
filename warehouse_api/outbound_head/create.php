<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include_once '../db.php';
include_once 'operations.php';

$database = new Database();
$db = $database->getConnection();

$item = new testclass($db);

$data = json_decode(file_get_contents("php://input"));

$item->delnum = $data->delnum;
$item->date = $data->date;
$item->no_of_item = $data->no_of_item;
$item->customer = $data->customer;
$item->note1 = $data->note1;
$item->note2 = $data->note2;




if($item->createtest()){
    echo 'Created';
} else{
    echo 'Not Created';
}
?>