<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include_once '../../db.php';
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
            "name" => $name, 
            "phone_num" => $phone_num, 
            "password" => $password, 
            "mail_id" => $mail_id, 
            "image" => $image, 
            "add1" => $add1, 
            "add2" => $add2, 
            "add3" => $add3, 
            "add4" => $add4
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