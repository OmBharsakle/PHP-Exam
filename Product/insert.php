
<?php
header("Access-Control-Allow-Method: POST");
header("Content-Type: application/json");
include("config.php");
$c1 = new Config();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $name = $_POST['name'];
    $productname = $_POST['productname'];
    $price = $_POST['price'];

    if(!empty($name&&$productname&&$price))
    {
        $res = $c1->insert($name,$productname,$price);
    }
    else
    {
        $arr['error'] = "All Fild Reqwrird";
    }
    

    if ($res) 
    {
        $arr['msg'] = "Product Inserted";
    } 
    else 
    {
        $arr['msg'] = "Product Not Inserted";
    }
} else {
    $arr['error'] =  "Only POST Type Is Allowed";
}

echo json_encode($arr);
