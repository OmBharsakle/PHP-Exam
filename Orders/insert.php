
<?php
header("Access-Control-Allow-Method: POST");
header("Content-Type: application/json");
include("config.php");
$c1 = new Config();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $orderdate = $_POST['orderdate'];
    $status = $_POST['status'];

    $res = $c1->insert($orderdate,$status);

    if ($res) 
    {
        $arr['msg'] = "Order Inserted";
    } 
    else 
    {
        $arr['msg'] = "Order not Inserted";
    }
} 
else 
{
    $arr['error'] =  "Only POST type is allowed";
}

echo json_encode($arr);
