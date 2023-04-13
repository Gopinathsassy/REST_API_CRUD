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
        "username" => $item->username,
        "emp_id" => $item->emp_id,
        "reason" => $item->reason,
        "leave_days" => $item->leave_days,
        "start_date" => $item->start_date,
        "end_date" => $item->end_date,
        "leave_apply_time" => $item->leave_apply_time,
        "status" => $item->status,
        "rejected_reason" => $item->rejected_reason
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