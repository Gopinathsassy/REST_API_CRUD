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
        "emp_id" => $item->emp_id,
        "username" => $item->username,
        "user_clockin_time" => $item->user_clockin_time,
        "user_clockout_time" => $item->user_clockout_time,
        "user_current_date" => $item->user_current_date,
        "user_total_hours" => $item->user_total_hours,
        "attendance_form" => $item->attendance_form,
       
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