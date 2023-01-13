<?php
include "connection.php";
include_once "Session.php";
if(@$_GET['q']=='depart'){
    $did=$_POST['departid'];
    $dname=$_POST['departname'];
    $iid=$_SESSION['institution'];
    $sql="select * from department where Institution_Id=$iid and Department_Id=$did";
    $data=mysqli_query($dbcon,$sql);
    if(mysqli_num_rows($data)>0){
        header("location:../Admin_Home.php?q=7&w=Department id Already exists");
    }
    $sql="insert into department values($did,'$dname',$iid)";
    $data=mysqli_query($dbcon,$sql);
    header("location:../Admin_Home.php?q=8&w=Department Added");
}
if(@$_GET['q']=='course'){
    $did=$_POST['departid'];
    $cid=$_POST['courseid'];
    $cname=$_POST['coursename'];
    $sem=$_POST['duration'];
    $iid=$_SESSION['institution'];
    $sql="select * from course where Institution_Id=$iid and Course_id=$cid";
    $data=mysqli_query($dbcon,$sql);
    if(mysqli_num_rows($data)>0){
        header("location:../Admin_Home.php?q=9&w=Course id Already exists");
    }
    $sql="insert into course values($cid,'$cname',$iid,$did,$sem)";
    $data=mysqli_query($dbcon,$sql);
    header("location:../Admin_Home.php?q=10&w=Course Added");
}
?>