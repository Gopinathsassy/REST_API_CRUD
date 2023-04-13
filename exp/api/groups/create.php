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

$data = json_decode(file_get_contents("php://input"));

$item->groupid = $data->groupid;
$item->groupname = $data->groupname;
$item->admin = $data->admin;
$item->add1 = $data->add1;
$item->add2 = $data->add2;
$item->add3 = $data->add3;
$item->add4 = $data->add4;
$item->add5 = $data->add5;
$item->add6 = $data->add6;

if($item->createtest()){
    echo 'Created';
} else{
    echo 'Not Created';
}
?>