<?php
include("connection.php");
include("session.php");
if(isset($_POST['adminsignup']))
{
    $iid=$_GET['t'];
    $dide=$_GET['r'];
    //$did=$_POST['admindid'];
    $name=$_POST['adminname'];
    $age=$_POST['adminage'];
    $gender=$_POST['admingender'];
    $addr=$_POST['adminaddress'];
    $dob=$_POST['adminbirth'];
    $mob=$_POST['adminmobile'];
    $email=$_POST['adminemail'];
    //$did=$_POST['admindid'];
    $passwd=$_POST['adminpasswd'];
    $sql3="insert into department values('null','Office',$iid)";
    $data3=mysqli_query($dbcon,$sql3);
    $ins="select * from user where E_Mail='$email' and Institution_Id=$iid";
    $data=mysqli_query($dbcon,$ins);
    if(mysqli_num_rows($data)>0){
        header("location:../AdminRegister.php?w=Email Already Exists");
    }
    else{
    $sql="SELECT * from department where Department_Name='office' and Institution_Id=$iid";
    $data=mysqli_query($dbcon,$sql);
    $row=mysqli_fetch_array($data);
    $did=$row['Department_Id'];
   // $sql="INSERT INTO `user` (`User_Name`, `Date_Of_Birth`, `Age`, `Gender`, `Address`, `E_Mail`, `Mobile_No`, `Institution_Id`, `Department_Id`, `User_Type`, `Password`) VALUES ('$name','$dob',$age,'$gender','$addr','$email','$mob','$iid','$did','admin','$passwd')";
    $sql="insert into user values('null','$name','$dob',$age,'$gender','$addr','$email','$mob',$iid,$did,'admin','$passwd')";
    $data=mysqli_query($dbcon,$sql);
    if($data){
        ?>
    <script>
        alert("Admin Added");
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
    $_SESSION['role']="admin";
    $_SESSION['name']=$row['User_Name'];
    $_SESSION['instid']=$iid;
    $_SESSION['institution']=$iid;
    $_SESSION['id']=$row['User_Id'];
    $_SESSION['department']=$did;
    header("location:../Admin_Home.php?w=Admin is created");
    }
    else{
        ?>
    <script>
        alert("Some Error Occured");
    </script>
    <?php
              $ins="delete from institution where Institution_Id=$iid";
              $data3=mysqli_query($ins);
      header("location:../AdminRegister.php");
    }
    }
}
?>
