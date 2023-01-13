<?php
include("connection.php");
include("session.php");
if(isset($_SESSION["e_mail"])){
    session_destroy();
}
if(isset($_POST['adminlogin']))
{
    $ref=@$_GET['q'];
    $_SESSION['institution']=$row['Institution_Id'];
    $email=$_POST['instemail'];
    $passwd=$_POST['instpasswd'];
    $iid=$_POST['instid'];
        $sel="select * from user where E_Mail='$email' and password='$passwd' and Institution_Id=$iid";
        $data=mysqli_query($dbcon,$sel);
        if(mysqli_num_rows($data)>0)
        {
            $row=mysqli_fetch_array($data);
            $_SESSION['e_mail']=$row['E_Mail'];
            $_SESSION['name']=$row['User_Name'];
            $_SESSION['role']="admin";
            $_SESSION['instid']=$iid;
            $_SESSION['institution']=$iid;
            $_SESSION['id']=$row['User_Id'];
            $_SESSION['department']=$row['Department_Id'];
            header("location:../Admin_Home.php");
        }
        else{
            /*?><script>alert("Invalid credentials");</script><?php
            header("location:../index.php?msg='s'");*/
            /*header("location:../index.php?msg=Invalid Credentals");*/
            header("location:$ref?w=Wrong Username or Password");
        }
    }
    ?>