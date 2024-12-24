<?php

header("Access-Control-Allow-Method: GET");
header("Content-Type: application/json");
include("config.php");
$c1 = new Config();

if ($_SERVER['REQUEST_METHOD'] == 'GET') {

    $res = $c1->fetch();

    $students = [];

    if ($res) 
    {
        while ($data = mysqli_fetch_assoc($res)) 
        {
            array_push($students, $data);
            $arr['data'] = $students;
        }
    } 
    else 
    {
        $arr['err'] = "Order Not Found";
    }
} 
else 
{
    $arr['err'] = "Only GET Type Is Allowed";
}

echo json_encode($arr);

