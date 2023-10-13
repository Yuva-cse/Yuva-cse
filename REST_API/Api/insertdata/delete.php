<?php
    // error_reporting(0);
    header('Access-control-Allow-Orgin:*');
    header('Content-Type: application/json');
    header('Access-control-Allow-Method: DELETE');
    header('Access-control-Allow-Header:Content-Type, Access-Control-Allow-Header,Authorization, X-Request-With');
    include('../fetchdata/function.php');
    $requestMethod = $_SERVER["REQUEST_METHOD"];
    if($requestMethod=="DELETE"){
        $deleteproffessional=deletedata($_GET);
        echo $deleteproffessional;
    }
    else{
        $data=[
            'status'=>405,
            'message'=>$requestMethod.'Method not allowed'
        ];
        header("HTTP/1.0 405 Method Not Allowed");
        echo json_encode($data);
    }
?>