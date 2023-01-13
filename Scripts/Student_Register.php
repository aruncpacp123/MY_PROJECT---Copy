<?php
include("connection.php");
include "session.php";
if(isset($_POST['studsignup']))
{
    $name=$_POST['studname'];
    $age=$_POST['studage'];
    $gender=$_POST['studgender'];
    $year=$_POST['studyear'];
    $dob=$_POST['studbirth'];
    $email=$_POST['studemail'];
    $iid=$_POST['studiid'];
    $cid=$_POST['studcid'];
    $passwd=$_POST['studpasswd'];
    $ins="select * from student where E_Mail='$email' and Institution_Id=$iid";
    $dat=mysqli_query($dbcon,$ins);
    if(mysqli_num_rows($dat)>0){
     
        header("location:../StudentRegister.php?w=Email Already Exists");
    }
    else{
    $sql="insert into student values('null','$name','$gender',$age,'$email','$dob',$iid,$cid,$year,'$passwd')";
    $data=mysqli_query($dbcon,$sql);
    $sql="SELECT * from student where E_Mail='$email' and Institution_Id=$iid";
    $data=mysqli_query($dbcon,$sql);
    $row=mysqli_fetch_array($data);
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
    
    $_SESSION['e_mail']=$email;
    $_SESSION['role']="student";
    $_SESSION['institution']=$iid;
    $_SESSION['id']=$row['Student_Id'];
    $_SESSION['course']=$cid;
    $_SESSION['name']=$name;
    header("location:../Student_Home.php?w=User Added");
    }
    else{
        ?>
    <script>
        alert("Some Error Occured");
    </script>
    <?php
      header("location:../StudentRegister.php");
    }
}
}
?>