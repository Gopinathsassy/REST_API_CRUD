<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include_once '../../db.php';
include_once 'operations.php';

$database = new Database();
$db = $database->getConnection();

$item = new testclass($db);

$data = json_decode(file_get_contents("php://input"));

$item->name = $data->name;
$item->phone_num = $data->phone_num;
$item->password = $data->password;
$item->mail_id = $data->mail_id;
$item->image = $data->image;
$item->add1 = $data->add1;
$item->add2 = $data->add2;
$item->add3 = $data->add3;
$item->add4 = $data->add4;

if($item->createtest()){
    echo 'Created';
} else{
    echo 'Not Created';
}
?>