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
            "emp_id" => $emp_id, 
            "username" => $username,
            "dates" => $dates, 
            "hours" => $hours, 
            "location" => $location, 
            "note2" => $note2, 
            "note3" => $note3, 
           
       
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