<?php
    $conn=mysqli_connect('localhost','root','','internship');
    if(!$conn){
        die("connection failed: ".mysqli_connect_error());
    }
?>