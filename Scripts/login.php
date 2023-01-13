<?php
include("connection.php");
include("session.php");
if(isset($_SESSION["e_mail"])){
    session_destroy();
}
if(isset($_POST['login']))
{
    $ref=@$_GET['q'];
    $email=$_POST['login_email'];
    $passwd=$_POST['login_password'];
    $user=$_POST['user'];
    if($user==1)
    {
        $sel="select * from student where E_Mail='$email' and password='$passwd'";
        $data=mysqli_query($dbcon,$sel);
        if(mysqli_num_rows($data)>0)
        {
            $row=mysqli_fetch_array($data);
            $_SESSION['institution']=$row['Institution_Id'];
            $_SESSION['id']=$row['Student_Id'];
            $_SESSION['course']=$row['Course_Id'];
            $_SESSION['e_mail']=$row['E_Mail'];
            $_SESSION['name']=$row['Name'];
            $_SESSION['role']="student";
            header("location:../Student_Home.php");
        }
        else{
            /*?><script>alert("Invalid credentials");</script><?php
            header("location:../index.php?msg='s'");*/
            /*header("location:../index.php?msg=Invalid Credentals");*/
            header("location:$ref?w=Wrong Username or Password");
        }
    }
    if($user==2)
    {
        $sel="select * from user where E_Mail='$email' and Password='$passwd'";
        $data=mysqli_query($dbcon,$sel);
        if(mysqli_num_rows($data)>0)
        {
            $row=mysqli_fetch_array($data);
            $_SESSION['institution']=$row['Institution_Id'];
            $_SESSION['id']=$row['User_Id'];
            $_SESSION['department']=$row['Department_Id'];
            $_SESSION['e_mail']=$row['E_Mail'];
            $_SESSION['name']=$row['User_Name'];
            $_SESSION['role']="teacher";
            header("location:../Teacher_Home.php");
        }
        else{
            header("location:$ref?w=Wrong Username or Password");
        }
    }
}
?>