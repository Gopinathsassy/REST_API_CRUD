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
$item->user_clockin_time = $data->user_clockin_time;
$item->user_clockout_time = $data->user_clockout_time;
$item->user_current_date = $data->user_current_date;
$item->user_total_hours = $data->user_total_hours;
$item->attendance_form = $data->attendance_form;



if($item->createtest()){
    echo 'Created';
} else{
    echo 'Not Created';
}
?>