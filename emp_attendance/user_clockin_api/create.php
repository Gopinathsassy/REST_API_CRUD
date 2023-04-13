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

$item->curr_date = $data->curr_date;
$item->curr_time = $data->curr_time;
$item->username = $data->username;
$item->emp_id = $data->emp_id;
$item->button_color = $data->button_color;
$item->button_id = $data->button_id;
$item->button_name = $data->button_name;
$item->location = $data->location;
$item->status = $data->status;

if($item->createtest()){
    echo 'Created';
} else{
    echo 'Not Created';
}
?>