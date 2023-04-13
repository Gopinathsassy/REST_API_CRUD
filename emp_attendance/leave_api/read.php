<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include_once '../db.php';
include_once 'operations.php';

$database = new Database();
$db = $database->getConnection();

$items = new testclass($db);

$stmt = $items->gettest();
$itemCount = $stmt->rowCount();

if($itemCount > 0){

    $POArr = array();
    $POArr["body"] = array();
    $POArr["itemCount"] = $itemCount;

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        extract($row);
        $e = array(
            "id" => $id,
            "username" => $username, 
            "emp_id" => $emp_id,
            "reason" => $reason, 
            "leave_days" => $leave_days, 
            "start_date" => $start_date, 
            "end_date" => $end_date, 
            "leave_apply_time" => $leave_apply_time, 
            "status" => $status, 
            "rejected_reason" => $rejected_reason, 
            "lead_name" => $lead_name, 
           
       
        );

        array_push($POArr["body"], $e);
    }
    echo json_encode($POArr);
}

else{
    http_response_code(404);
    echo json_encode(
        array("message" => "No record found.")
    );
}
?>