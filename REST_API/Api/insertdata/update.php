<?php
error_reporting(0);
header('Access-control-Allow-Orgin:*');
header('Content-Type: application/json');
header('Access-control-Allow-Method: PUT');
header('Access-control-Allow-Header:Content-Type, Access-Control-Allow-Header,Authorization, X-Request-With');
include('../fetchdata/function.php');
$requestMethod=$_SERVER["REQUEST_METHOD"];
if($requestMethod=="PUT"){
    $inputData=json_decode(file_get_contents('php://input'),true);
    if(empty($inputData)){
        // print_r ($_GET);
        $updateproffessional=updateproffessional($_POST,$_GET);
    }
    else{
        $updateproffessional=updateproffessional($inputData,$_GET);
    }
    echo $updateproffessional;
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