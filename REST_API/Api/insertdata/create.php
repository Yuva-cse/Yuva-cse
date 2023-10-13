<?php
error_reporting(0);
header('Access-control-Allow-Orgin:*');
header('Content-Type: application/json');
header('Access-control-Allow-Method: POST');
header('Access-control-Allow-Header:Content-Type, Access-Control-Allow-Header,Authorization, X-Request-With');
include('../fetchdata/function.php');
$requestMethod=$_SERVER["REQUEST_METHOD"];
if($requestMethod=="POST"){
    $inputData=json_decode(file_get_contents('php://input'),true);
    if(empty($inputData)){
        $storeproffessional=storeproffessional($_POST);
    }
    else{
        $storeproffessional=storeproffessional($inputData);
    }
    echo $storeproffessional;
}
else{
    $data=[
        'status'=>405,
        'message'=>$requestMethod.' Method not allowed'
    ];
    header("HTTP/1.0 405 Method Not Allowed");
    echo json_encode($data);
}
?>