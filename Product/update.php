<?php

header("Access-Control-Allow-Method: PUT");
header("Content-Type: application/json");
include("config.php");
$c1 = new Config();

if ($_SERVER['REQUEST_METHOD'] == 'PUT') {


    $data = file_get_contents("php://input");

    parse_str($data, $result);

    $id = $result['id'];
    $productname = $result['productname'];
    $price = $result['price'];

    $res = $c1->update($id,$productname,$price);

    if ($res) 
    {
        $arr['msg'] = "Product Updated ";
    } 
    else 
    {
        $arr['msg'] = "Product Not Updated";
    }
} 
else 
{
    $arr['err'] = "Only UPDATE Type Is Allowed";
}

echo json_encode($arr);

