<?php
    $conn=mysqli_connect('localhost','root','','internship');
    if(!$conn){
        die("connection failed: ".mysqli_connect_error());
    }
    $name=mysqli_real_escape_string($conn,'  Yuva@_/.=  -9  5 7  ;raj');
    echo $name;
    
    
?>