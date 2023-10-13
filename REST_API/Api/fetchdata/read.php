<?php
    header('Access-control-Allow-Orgin:*');
    header('Content-Type: application/json');
    header('Access-control-Allow-Method: GET');
    header('Access-control-Allow-Header:Content-Type, Access-Control-Allow-Header,Authorization, X-Request-With');
    include('function.php');
    $requestMethod = $_SERVER["REQUEST_METHOD"];
    if($requestMethod=="GET"){
        if(isset($_GET['id'])){
            $proffessional=getdata($_GET);
            print_r($proffessional);
        }
        else{
            $proffessional=getproffessional();
            print_r($proffessional);
        }
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