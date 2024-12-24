<?php

header("Access-Control-Allow-Method: PUT");
header("Content-Type: application/json");
include("config.php");
$c1 = new Config();

if ($_SERVER['REQUEST_METHOD'] == 'PUT') {


    $data = file_get_contents("php://input");

    parse_str($data, $result);

    $id = $result['id'];
    $name = $result['name'];
    $email = $result['email'];
    $phone = $result['phone'];

    $res = $c1->update($id, $name, $email,$phone);

    if ($res) 
    {
        $arr['msg'] = "User Updated";
    } 
    else 
    {
        $arr['msg'] = "User Not Updated";
    }
} 
else 
{
    $arr['err'] = "Only UPDATE Type Is Allowed";
}

echo json_encode($arr);

