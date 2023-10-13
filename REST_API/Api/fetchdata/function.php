<?php
    require 'dbcon.php';
    function getproffessional(){
        global $conn;
        $query="SELECT * FROM proffession";
        $query_run=mysqli_query($conn,$query);
        if($query_run){
            if(mysqli_num_rows($query_run)>0){
                $res=mysqli_fetch_all($query_run,MYSQLI_ASSOC);
                $data=[
                    'status'=>200,
                    'message'=>'List fetched successfelly',
                    'data'=>$res
                ];
                header("HTTP/1.0 200 List fetched successfelly");
                return json_encode($data);
            }
            else{
                $data=[
                'status'=>404,
                'message'=>'No data found'
            ];
            header("HTTP/1.0 404 No data found");
            return json_encode($data);
            }

        }
        else{
            $data=[
                'status'=>500,
                'message'=>'Internal Server Error'
            ];
            header("HTTP/1.0 500 Internal Server Error");
            return json_encode($data);
        }
    }
    function error422($message){
        $data=[
            'status'=>422,
            'message'=>$message
        ];
        header("HTTP/1.0 405 Unprocessable entry");
        echo json_encode($data);
        exit();
    }

    function storeproffessional($storeproffessional){
        global $conn;
        $name=mysqli_real_escape_string($conn,$storeproffessional['name']);
        $email=mysqli_real_escape_string($conn,$storeproffessional['email']);
        $proffession=mysqli_real_escape_string($conn,$storeproffessional['proffession']);
        if(empty(trim($name))){
            return error422('Enter your Name');
        }
        elseif(empty(trim($email))){
            return error422('Enter your Email');
        }
        elseif(empty(trim($proffession))){
            return error422('Enter your Proffesional');
        }
        else{
            $query="INSERT INTO proffession (name,email,proffession) values('$name','$email','$proffession')";
            $result=mysqli_query($conn,$query);
            if($result){
                $data=[
                    'status'=>201,
                    'message'=>'created successfully'
                ];
                header("HTTP/1.0 201 data created");
                return json_encode($data);
            }
            else{
                $data=[
                    'status'=>500,
                    'message'=>'Internal Server Error'
                ];
                header("HTTP/1.0 500 Internal Server Error");
                return json_encode($data);
            }
        }
    }
    function getdata($id){
        if($id['id']==null){
            return error422("Enter your ID");
        }
        $ID=$id['id'];
        global $conn;
        $id=mysqli_real_escape_string($conn,$ID);
        $query="SELECT * FROM proffession WHERE id='$id'";
        $result=mysqli_query($conn,$query);
        if($result){
            if(mysqli_num_rows($result)==1){
                $res=mysqli_fetch_all($result,MYSQLI_ASSOC);
                $data=[
                    'status'=>200,
                    'message'=>'List fetched successfelly',
                    'data'=>$res
                ];
                header("HTTP/1.0 200 List fetched successfelly");
                return json_encode($data);
            }
            else{
                $data=[
                'status'=>404,
                'message'=>'No data found'
            ];
            header("HTTP/1.0 404 No data found");
            return json_encode($data);
            }

        }
        else{
            $data=[
                'status'=>500,
                'message'=>'Internal Server Error'
            ];
            header("HTTP/1.0 500 Internal Server Error");
            return json_encode($data);
        }
    }
    function updateproffessional($storeproffessional,$parameter){
        global $conn;
        if(!isset($parameter['id'])){
            return error422("ID not found in your request");
        }
        elseif($parameter['id']==null){
            return error422("Enter your ID");
        }
        $id=mysqli_real_escape_string($conn,$parameter['id']);
        $name=mysqli_real_escape_string($conn,$storeproffessional['name']);
        $email=mysqli_real_escape_string($conn,$storeproffessional['email']);
        $proffession=mysqli_real_escape_string($conn,$storeproffessional['proffession']);
        if(empty(trim($name))){
            return error422('Enter your Name');
        }
        elseif(empty(trim($email))){
            return error422('Enter your Email');
        }
        elseif(empty(trim($proffession))){
            return error422('Enter your Proffesional');
        }
        else{
            $query="UPDATE proffession SET name='$name',email='$email',proffession='$proffession' WHERE id='$id'";
            $result=mysqli_query($conn,$query);
            if($result){
                $data=[
                    'status'=>201,
                    'message'=>'Updated successfully'
                ];
                header("HTTP/1.0 200 data Updated");
                return json_encode($data);
            }
            else{
                $data=[
                    'status'=>500,
                    'message'=>'Internal Server Error'
                ];
                header("HTTP/1.0 500 Internal Server Error");
                return json_encode($data);
            }
        }
    }
    function deletedata($parameter){
        global $conn;
        if(!isset($parameter['id'])){
            return error422("ID not found in your request");
        }
        elseif($parameter['id']==null){
            return error422("Enter your ID");
        }
        $id=mysqli_real_escape_string($conn,$parameter['id']);
        $query="DELETE FROM proffession WHERE id='$id' LIMIT 1";
        $result=mysqli_query($conn,$query);
        if($result){
            $data=[
                'status'=>200,
                'message'=>'Proffession deleted sucessfully'
            ];
            header("HTTP/1.0 200 Proffession deleted sucessfully");
            return json_encode($data);
        }
        else{
            $data=[
                'status'=>404,
                'message'=>'No proffession Found'
            ];
            header("HTTP/1.0 404 No proffession Found");
            return json_encode($data);
        }

    }
?>