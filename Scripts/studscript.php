<?php
include_once 'connection.php';
session_start();
if(@$_GET['q']=='updateprofile'){
    $id=$_SESSION['id'];
    $name=$_POST['Name'];
    $dob=$_POST['DOB'];
    $email=$_POST['Email'];
    $age=$_POST['Age'];
    $pswd=$_POST['password'];
    $sql="select * from student where student_Id=$id";
    $data=mysqli_query($dbcon,$sql);
    $row=mysqli_fetch_array($data);
    $oldemail=$row['E_Mail'];
    $sql="UPDATE student SET Name='$name',Date_Of_Birth='$dob',E_Mail='$email',Age=$age,password='$pswd' where Student_Id=$id";
    $data=mysqli_query($dbcon,$sql);
    if($email!=$oldemail)
    {
        $sql="UPDATE examresult set email='$email' where email='$oldemail'";
        $data=mysqli_query($dbcon,$sql);
        $sql="UPDATE quizresult set email='$email' where email='$oldemail'";
        $data=mysqli_query($dbcon,$sql);
        $sql="UPDATE subanswers set email='$email' where email='$oldemail'";
        $data=mysqli_query($dbcon,$sql);
    }
    $_SESSION['name']=$name;
    $_SESSION['e_mail']=$email;
    header("location:../Student_Home.php?q=9");
}