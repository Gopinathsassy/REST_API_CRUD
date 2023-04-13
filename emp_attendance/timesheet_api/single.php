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

$item->id = isset($_GET['id']) ? $_GET['id'] : die();

$item->getSingletest();
$prefix = '{
  "body": [';

$suffix = ']}';
if ($item->id != null) {
    // create array
    $Profile_arr = array(

            "id" => $item->id,
            "emp_id" =>$item->emp_id, 
            "username" =>$item->username,
            "project_name" =>$item->project_name, 
            "project_code" =>$item->project_code, 
            "work_status" =>$item->work_status, 
            "work_time" =>$item->work_time, 
            "today_date" =>$item->today_date, 
            "description" =>$item->description, 
            "status" =>$item->status,
            "image" =>$item->image,
            "posting_date" =>$item->posting_date,
            "rejected_reason" =>$item->rejected_reason,
            "job_name" =>$item->job_name,
            "task_name" =>$item->task_name,
    );

    http_response_code(200);

    echo $prefix;
    echo json_encode($Profile_arr);
    echo $suffix;
} else {
    http_response_code(404);
    echo $prefix;
    echo json_encode("Not found.");
    echo $suffix;
}
?>