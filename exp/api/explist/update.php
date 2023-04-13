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

$item->id = $data->id;

// employee values
$item->id = $data->id;
$item->name = $data->name;
$item->exp_not = $data->exp_not;
$item->amount = $data->amount;
$item->exp_date = $data->exp_date;
$item->date = $data->date;
$item->time = $data->time;
$item->groupid = $data->groupid;
$item->add1 = $data->add1;
$item->add2 = $data->add2;


if($item->updatetest()){
    echo json_encode("Updated.");
} else{
    echo json_encode("Not updated");
}
?>