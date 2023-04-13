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
            "delnum" => $delnum, 
            "matcode" => $matcode,
            "matdesc" => $matdesc, 
            "quantity" => $quantity, 
            "scan_date" => $scan_date, 
            "scan_time" => $scan_time, 
            "serial_num" => $serial_num, 
         "uom" => $uom, 
           
       
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