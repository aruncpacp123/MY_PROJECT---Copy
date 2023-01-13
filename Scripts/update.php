<?php
include_once 'connection.php';
session_start();
//add exam
if(isset($_SESSION['role'])){
    if(@$_GET['q']== 'addexam' && $_SESSION['role']=='teacher') {
        $name = $_POST['examname'];
        $cid=$_POST['coursename'];
        $dur=$_POST['examduration'];
        $dat=$_POST['examdate'];
        $tim=$_POST['examtime'];
        /*$iid=$_POST['examiid'];
        $did=$_POST['examdid'];
        $tid=$_POST['examtid'];*/
        $des=$_POST['examdes'];
        $iid=$_SESSION['institution'];
        $did=$_SESSION['department'];
        $tid=$_SESSION['id'];
        
        $id=uniqid();
        $sql="INSERT INTO exam VALUES('null','$name','$des',$iid,1,$cid,$tid,$dur,'$dat','$id')";
        $data=mysqli_query($dbcon,$sql);
        $sql="SELECT * from exam where uniq='$id'";
        $data=mysqli_query($dbcon,$sql);
        $row=mysqli_fetch_array($data);
        $eid=$row['Exam_Id'];
        if(isset($_POST['quiz'])){
            $QT=$_POST['QuesNo'];
            $QM=$_POST['QuesMark'];
            $sql2="INSERT INTO `quiz` (`Exam_Id`, `Quiz_Id`, `Mark`, `TotalQ`) VALUES ('$eid', NULL, '$QM', '$QT')";
            $data2=mysqli_query($dbcon,$sql2);
            $sql2="SELECT * from quiz where Exam_Id='$eid'";
            $data2=mysqli_query($dbcon,$sql2);
            $row=mysqli_fetch_array($data2);
            $qid=$row['Quiz_Id'];
        }
        else
            $qid=0;
        if(isset($_POST['sub'])){
            $ST=$_POST['QuesNoSub'];
            $sql3="INSERT INTO `subjective` (`Exam_Id`, `Sid`, `SubTotalQ`) VALUES ('$eid', NULL, '$ST')";
            $data3=mysqli_query($dbcon,$sql3);
            $sql3="SELECT * from subjective where Exam_Id='$eid'";
            $data3=mysqli_query($dbcon,$sql3);
            $row=mysqli_fetch_array($data3);
            $sid=$row['Sid'];
        }
        else
            $sid=0;
        if($qid==0){
            header("location:../Teacher_Home.php?q=1&step=3&eid=$eid&sid=$sid&st=$ST");
        }
        else{
            header("location:../Teacher_Home.php?q=1&step=2&eid=$eid&qid=$qid&sid=$sid&qt=$QT&st=$ST");
        }
    }
}  
//add quiz
if(isset($_SESSION['role'])){
    if(@$_GET['q']== 'addquiz' && $_SESSION['role']=='teacher') {
        $n=@$_GET['n'];
        $eid=@$_GET['eid'];
        $qid=@$_GET['qid'];
        $sid=@$_GET['sid'];
        $ch=@$_GET['ch'];
        $st=@$_GET['st'];
        for($i=1;$i<=$n;$i++)
        {
            $qns=$_POST['qns'.$i];
            $op1=$_POST[$i.'1'];
            $op2=$_POST[$i.'2'];
            $op3=$_POST[$i.'3'];
            $op4=$_POST[$i.'4'];
            $ans=$_POST['ans'.$i];
            $q="INSERT into qquestion values($qid,NULL,'$qns',$i,'$op1','$op2','$op3','$op4',$ans)";
            $data=mysqli_query($dbcon,$q);
        }
        if($sid!=0){
            header("location:../Teacher_Home.php?q=1&step=3&eid=$eid&sid=$sid&st=$st");
        }
        else{
            header("location:../Teacher_Home.php?q=0&message= Exam Created");
        }
    }
}
//add subjective
if(isset($_SESSION['role'])){
    if(@$_GET['q']== 'addsub' && $_SESSION['role']=='teacher') {
        $n=@$_GET['n'];
        $eid=@$_GET['eid'];
        $sid=@$_GET['sid'];
        for($i=1;$i<=$n;$i++)
        {
            $qns=$_POST['qns'.$i];
            $mark=$_POST[$i.'1'];
            $q="INSERT into squestions values($sid,NULL,'$qns',$mark,$i)";
            $data=mysqli_query($dbcon,$q);
        }
        header("location:../Teacher_Home.php?q=0&message= Exam Created");
    }
}
if(@$_GET['q']=='deleteexam'){
    $id=@$_GET['eid'];
    //echo '<script>alert("'.@$_GET['eid'].'");</script>';
    //if(isset($_POST['examidform'.$eid])){
        //$id=$_POST['examidform'.$eid];
        $sql="DELETE from examresult where Exam_Id=$id";
        $data=mysqli_query($dbcon,$sql);
        $sql="SELECT * from quiz where Exam_Id=$id";
        $data=mysqli_query($dbcon,$sql);
        $qid=0;
        if(mysqli_num_rows($data)>0){
            $row=mysqli_fetch_array($data);
            $qid=$row['Quiz_Id'];
        }
        $sql="SELECT * from subjective where Exam_Id=$id";
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
        $sql="DELETE from quizresult where Exam_Id=$id";
        $data=mysqli_query($dbcon,$sql);
        $sql="DELETE from subanswers where Sid=$sid";
        $data=mysqli_query($dbcon,$sql);
        $sql="DELETE from exam where Exam_Id=$id";
        $data=mysqli_query($dbcon,$sql);
        $sql="DELETE from quiz where Exam_Id=$id";
        $data=mysqli_query($dbcon,$sql);
        $sql="DELETE from subjective where Exam_Id=$id";
        $data=mysqli_query($dbcon,$sql);
        $sql="DELETE from exam where Exam_Id=$id";
        $data=mysqli_query($dbcon,$sql);
        header("location:../Teacher_Home.php?q=2&message= Exam Deleted");
    //}
}

if(isset($_SESSION['role'])){
    if(@$_GET['q']== 'manageexam' && $_SESSION['role']=='teacher') {
        $n=@$_GET['stotal'];
        $eid=@$_GET['eid'];
        $sid=@$_GET['sid'];
        $email=@$_GET['email'];
        $quizid=@$_GET['qid'];
        for($i=1;$i<=$n;$i++)
        {
            $mark=$_POST['mark'.$i];
            $qid=$_POST['qid'.$i];
            $q="UPDATE subanswers SET mark=$mark where Question_Id=$qid and email='$email' and Sid=$sid";
            $data=mysqli_query($dbcon,$q);
        }
        $sql="SELECT * from subanswers where Sid='$sid' and email='$email'";
        $data=mysqli_query($dbcon,$sql);
        $total=0;
        while($row=mysqli_fetch_array($data))
        {
            if($row['mark']!=-1)
                $total=$total+$row['mark'];
        }
        $sql="UPDATE examresult SET Subjective_Total=$total where Exam_Id=$eid and email='$email'";
        $data=mysqli_query($dbcon,$sql);
        header("location:../Teacher_Home.php?q=manageexam&step=1&eid=$eid&qid=$quizid&sid=$sid&stotal=$n");
    }
}
if(@$_GET['q']=='updateprofile'){
    $id=$_SESSION['id'];
    $name=$_POST['Name'];
    $dob=$_POST['DOB'];
    $email=$_POST['Email'];
    $age=$_POST['Age'];
    $pswd=$_POST['password'];
    $address=$_POST['Address'];
    $mob=$_POST['mob'];
    $sql="select * from user where User_Id=$id";
    $data=mysqli_query($dbcon,$sql);
    $row=mysqli_fetch_array($data);
    $oldemail=$row['E_Mail'];
    $sql="UPDATE user SET User_Name='$name',Date_Of_Birth='$dob',E_Mail='$email',Age=$age,password='$pswd',Address='$address',Mobile_No='$mob' where User_Id=$id";
    $data=mysqli_query($dbcon,$sql);
    $_SESSION['name']=$name;
    $_SESSION['e_mail']=$email;
    header("location:../Teacher_Home.php?q=5");
}
?>