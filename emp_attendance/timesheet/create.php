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

$item->username = $data->username;
$item->emp_id = $data->emp_id;
$item->project_name = $data->project_name;
$item->project_code = $data->project_code;
$item->status = $data->status;
$item->work_status = $data->work_status;
$item->posting_date = $data->posting_date;
$item->task_name = $data->task_name;
$item->hours = $data->hours;
$item->today_date = $data->today_date;
$item->description = $data->description;
$item->image = $data->image;
$item->rejected_reason = $data->rejected_reason;
$item->leadname = $data->leadname;

if($item->createtest()){
    echo 'Created';
} else{
    echo 'Not Created';
}
?>