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
$item->username = $data->username;
$item->emp_id = $data->emp_id;
$item->reason = $data->reason;
$item->leave_days = $data->leave_days;
$item->start_date = $data->start_date;
$item->end_date = $data->end_date;
$item->leave_apply_time = $data->leave_apply_time;
$item->status = $data->status;
$item->rejected_reason = $data->rejected_reason;


if($item->updatetest()){
    echo json_encode("Updated.");
} else{
    echo json_encode("Not updated");
}
?>