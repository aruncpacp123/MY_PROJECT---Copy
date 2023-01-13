<?php
include("connection.php");
include("session.php");
if(isset($_POST['teachsignup']))
{
    $name=$_POST['teachname'];
    $age=$_POST['teachage'];
    $gender=$_POST['teachgender'];
    $addr=$_POST['teachaddress'];
    $dob=$_POST['teachbirth'];
    $mob=$_POST['teachmobile'];
    $email=$_POST['teachemail'];
    $iid=$_POST['teachiid'];
    $did=$_POST['teachdid'];
    $passwd=$_POST['teachpasswd'];
    $ins="select * from user where E_Mail='$email' and Institution_Id=$iid";
    $data=mysqli_query($dbcon,$ins);
    if(mysqli_num_rows($data)>0){
        header("location:../TeacherRegister.php?w=Email Already Exists");
    }
    else{
    $sql="INSERT INTO `user` (`User_Name`, `Date_Of_Birth`, `Age`, `Gender`, `Address`, `E_Mail`, `Mobile_No`, `Institution_Id`, `Department_Id`, `User_Type`, `Password`) VALUES ('$name','$dob',$age,'$gender','$addr','$email',$mob,$iid,$did,'teacher','$passwd')";
    //$sql="insert into user values('null','$name','$dob',$age,'$gender','$addr','$email','$mob',$iid,$did,'teacher','$passwd')";
    $data=mysqli_query($dbcon,$sql);
    if($data){
        ?>
    <script>
        alert("User Added");
    </script>
    <?php
    if(isset($_SESSION['e_mail'])){
        session_unset();
        session_destroy();
    }
    $sel="select * from user where E_Mail='$email' and Institution_Id=$iid";
    $data=mysqli_query($dbcon,$sel);
    $row=mysqli_fetch_array($data);
    $_SESSION['e_mail']=$email;
    $_SESSION['role']="teacher";
    $_SESSION['institution']=$iid;
    $_SESSION['id']=$row['User_Id'];
    $_SESSION['department']=$did;
    $_SESSION['name']=$name;
    header("location:../Teacher_Home.php?w=user Added");
    }
    else{
        ?>
    <script>
        alert("Some Error Occured");
    </script>
    <?php
      header("location:../TeacherRegister.php");
    }
    }
}
?>