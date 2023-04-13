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
                              "first_name" => $first_name,
                              "last_name" => $last_name,
                              "emp_id" => $emp_id,
                              "user_password" => $user_password,
                              "dob" => $dob,
                              "date_of_join" => $date_of_join,
                              "mobile_no" => $mobile_no,
                              "official_email_id" => $official_email_id,
                              "module" => $module,
                              "job_role" => $job_role,
                              "user_image" => $user_image,
                              "address" => $address,
                              "gender" => $gender
                       
       
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
