<?php
include("connection.php");
include("session.php");
if(!isset($_SESSION['role']))
{
    if(@$_GET['q']== 'login') 
    {
        if(isset($_SESSION["e_mail"]))
        {
            session_destroy();
        }
        $ref=@$_GET['ref'];
        $email=$_POST['saemail'];
        $passwd=$_POST['sapassword'];
        $name=$_POST['saname'];
        $sel="select * from admin where E_Mail='$email' and Password='$passwd' and Admin_Name='$name'";
        $data=mysqli_query($dbcon,$sel);
        if(mysqli_num_rows($data)>0)
        {
            $row=mysqli_fetch_array($data);
            $_SESSION['e_mail']=$row['E_Mail'];
            $_SESSION['name']=$row['Admin_Name'];
            $_SESSION['role']="System Admin";
            header("location:$ref");
        }
        else{
            /*?><script>alert("Invalid credentials");</script><?php
            header("location:../index.php?msg='s'");*/
            /*header("location:../index.php?msg=Invalid Credentals");*/
            header("location:$ref?w=Wrong credentials");
        }
    }
}
if(@$_GET['q']== 'removeinstitution')
{
    $id=intval($_GET['id']);
    $ins="select * from department where Institution_Id=$id";
    $exe=mysqli_query($dbcon,$ins);
    if(mysqli_num_rows($exe)>0){
        while($coun=mysqli_fetch_array($exe)){
            $did=$row['Department_Id'];
            $sql="select * from course where Department_Id=$did";
            $data=mysqli_query($dbcon,$sql);
            if(mysqli_num_rows($data)>0){
                while($row=mysqli_fetch_array($data)){
                    $cid=$row['Course_Id'];
                    $sql2="DELETE from student where Course_Id=$cid";//Deleting Students Under Each Course
                    $data2=mysqli_query($dbcon,$sql2);
                    $sel="SELECT * from exam where Course_Id=$cid";
                    $res=mysqli_query($dbcon,$sel);
                    if(mysqli_num_rows($res)>0){
                        while($result=mysqli_fetch_array($res)){
                            $eid=$result['Exam_Id'];
                            $sql="DELETE from examresult where Exam_Id=$eid";
                            $data=mysqli_query($dbcon,$sql);
                            $sql="SELECT * from quiz where Exam_Id=$eid";
                            $data=mysqli_query($dbcon,$sql);
                            $qid=0;
                            if(mysqli_num_rows($data)>0){
                                $row=mysqli_fetch_array($data);
                                $qid=$row['Quiz_Id'];
                            }
                            $sql="SELECT * from subjective where Exam_Id=$eid";
                            $data=mysqli_query($dbcon,$sql);
                            $sid=0;
                            if(mysqli_num_rows($data)>0){
                                $row=mysqli_fetch_array($data);
                                $sid=$row['Sid'];
                            }
                            $sql="DELETE from qquestion where Quiz_Id=$qid";
                            $data=mysqli_query($dbcon,$sql);
                            $sql="DELETE from squestions where Sid=$sid";
                            $data=mysqli_query($dbcon,$sql);
                            $sql="DELETE from quizresult where Exam_Id=$eid";
                            $data=mysqli_query($dbcon,$sql);
                            $sql="DELETE from subanswers where Sid=$sid";
                            $data=mysqli_query($dbcon,$sql);
                            $sql="DELETE from exam where Exam_Id=$eid";
                            $data=mysqli_query($dbcon,$sql);
                            $sql="DELETE from quiz where Exam_Id=$eid";
                            $data=mysqli_query($dbcon,$sql);
                            $sql="DELETE from subjective where Exam_Id=$eid";
                            $data=mysqli_query($dbcon,$sql);
                            $sql="DELETE from exam where Exam_Id=$eid";
                            $data=mysqli_query($dbcon,$sql);
                        }
                    }
                }
            }
            $sql="DELETE from user where Department_Id=$did";//Deleting Teacher
            $data=mysqli_query($dbcon,$sql);
            $sql="DELETE from course where Department_Id=$did";//Deleting Course
            $data=mysqli_query($dbcon,$sql);
            $sql="DELETE from department where Department_Id=$did";//Deleting Department
            $data=mysqli_query($dbcon,$sql);
        }
    }
    $sql="DELETE from institution where Institution_Id=$id";//Deleting Institution
    $data=mysqli_query($dbcon,$sql);
    if($data){
      //echo '<i class="btn btn-outline-success p-1" > Deleted</i>';
      echo '<i class="p-1" style="color:red;"> Deleted</i>';
    }
}

if(@$_GET['q']== 'logout') 
{
    $ref=@$_GET['ref'];
    if (isset($_SESSION['role'])) {
        session_unset();
        session_destroy();
    }
    
    header("location:$ref");
}
?>
