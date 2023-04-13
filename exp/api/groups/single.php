<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include_once '../../db.php';
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
        "groupid" => $item->groupid,
        "groupname" => $item->groupname,
        "admin" => $item->admin,
        "add1" => $item->add1,
        "add2" => $item->add2,
        "add3" => $item->add3,
        "add4" => $item->add4,
        "add5" => $item->add5,
        "add6" => $item->add6
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