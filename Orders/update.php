<?php

header("Access-Control-Allow-Method: PUT");
header("Content-Type: application/json");
include("config.php");
$c1 = new Config();

if ($_SERVER['REQUEST_METHOD'] == 'PUT') {


    $data = file_get_contents("php://input");

    parse_str($data, $result);

    $id = $result['id'];
    $orderdate = $result['orderdate'];
    $status = $result['status'];

    $res = $c1->update($id,$orderdate,$status);

    if ($res) 
    {
        $arr['msg'] = "Order Updated";
    } 
    else 
    {
        $arr['msg'] = "Order not Updated";
    }
} else {
    $arr['err'] = "Only UPDATE Type Is Allowed";
}

echo json_encode($arr);

