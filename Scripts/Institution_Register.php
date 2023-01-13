<?php
include("connection.php");
include("session.php");
if(isset($_POST['instsubmit']))
{
    session_unset();
    session_destroy();
    $name=$_POST['instname'];
    $addr=$_POST['instaddr'];
    $mob=$_POST['instmobile'];
    $email=$_POST['instemail'];
    $ins="select * from institution where E_Mail='$email'";
    $data=mysqli_query($dbcon,$ins);
    if(mysqli_num_rows($data)>0){
        header("location:../InstitutionRegister.php?w=Email Already Exists");
    }
    else{
        $sql="insert into institution values('null','$name','$addr','$mob','$email')";
        $data=mysqli_query($dbcon,$sql);
        if($data){
            header("location:../AdminRegister.php?w=Instituion Added Create admin to Complete Registration&email=$email&type=1");
        }
        else{
            ?>
            <script>alert("Some Error Occured");</script>
            <?php
            header("location:../InstitutionRegister.php");
        }
    }
}
?>