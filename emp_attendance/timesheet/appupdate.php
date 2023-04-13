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

$item->id = $data->id;

// employee values
$item->id = $data->id;


$item->task_name = $data->task_name;
$item->hours = $data->hours;
$item->today_date = $data->today_date;
$item->description = $data->description;
$item->image = $data->image;


if($item->appupdate()){
    echo json_encode("Updated.");
} else{
    echo json_encode("Not updated");
}
?>