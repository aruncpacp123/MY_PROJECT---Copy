<?php
$dbcon=mysqli_connect("localhost","root","","online_exam_main");
if($dbcon===false){
    die("ERROR:Could not connect.".mysqli_connect_error());
}
?>