<?php

header("Access-Control-Allow-Method: DELETE");
header("Content-Type: application/json");
include("config.php");
$c1 = new Config();

if ($_SERVER['REQUEST_METHOD'] == 'DELETE') {

    $data = file_get_contents("php://input");

    parse_str($data, $result);

    $id = $result['id'];

    $res = $c1->delete($id);

    if ($res) 
    {
        $arr['msg'] = "Order Deleted ";
    } 
    else 
    {
        $arr['msg'] = "Order Not Deleted";
    }
} 
else 
{
    $arr['err'] = "Only DELETE Type Is Allowed";
}

echo json_encode($arr);
