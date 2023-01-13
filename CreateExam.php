<!--
<!DOCTYPE html>
<html>
<head>
</head>
<body>

<?php
/*$qid = intval($_GET['q']);

include("Scripts/connection.php");
$counter= $_COOKIE['counter'];
$sql="SELECT * from qquestion where Quiz_Id=$qid and sn=$counter";
$data=mysqli_query($dbcon,$sql);
$row=mysqli_fetch_array($data);
echo '
  <label for="qns'.$counter.'">'.$row['Qns'].'</label>';*/
?>
</body>
</html>
-->
<?php
include_once 'Scripts/connection.php';
session_start();
//add exam
if(isset($_SESSION['role'])){
    if(@$_GET['q']== 'startquiz' && $_SESSION['role']=='student') {
        $eid=@$_GET['eid'];
                $qid=@$_GET['qid'];
                $qtotal=@$_GET['qtotal'];
            
                $sid=@$_GET['sid'];
                $stotal=@$_GET['stotal'];
            $sahi=0;
            $wrong=0;
        for($i=1;$i<=$qtotal;$i++)
        {
            $email=$_SESSION['e_mail'];
            $selected=$_POST[$i];
            $sel="SELECT * from qquestion where Quiz_Id=$qid and sn=$i";
            $data=mysqli_query($dbcon,$sel);
            $row=mysqli_fetch_array($data);
            $ans=$row['Answer'];
            if($selected==$ans){
                $sahi++;
            }
            else{
                $wrong++;
            }

        }
        $email=$_SESSION['e_mail'];
        $sql2="select * from quiz where Exam_Id='$eid'";
        $data2=mysqli_query($dbcon,$sql2);
        $row2=mysqli_fetch_array($data2);
        $qmark=$row2['Mark'];
        $total=$qmark*$sahi;
        $sel="SELECT * from quizresult where email='$email' and Exam_Id=$eid";
        $dat=mysqli_query($dbcon,$sel);
        if(mysqli_num_rows($dat)>0){
            $sql="UPDATE `quizresult` SET `CorrectQNo` = '$sahi', `WrongQNo` = '$wrong', `Total` = '$total' WHERE `quizresult`.`email` = '$email' AND `quizresult`.`Exam_Id` = $eid";
            $data=mysqli_query($dbcon,$sql);
        }
        else{
        $sql="INSERT into quizresult values('$email','$eid',$sahi,$wrong,$total)";
        $data=mysqli_query($dbcon,$sql);
        }
        $sql="INSERT into examresult values('$email',$eid,$total,-1)";
        $data=mysqli_query($dbcon,$sql);
        if($sid!=0){
            header("location:exampage.php?q=exam&step=2&eid=$eid&sid=$sid&stotal=$stotal&i=1");
        }
        else{
            header("location:Student_Home.php?q=0");
        }
    }   
    if(@$_GET['q']== 'startsub' && $_SESSION['role']=='student') {

        $eid=@$_GET['eid'];
        $sid=@$_GET['sid'];
        $stotal=@$_GET['stotal'];
        $i=@$_GET['i'];
        $quesid=@$_GET['quesid'];
        $email=$_SESSION['e_mail'];
        $ans=$_POST[$i];
        $sql="INSERT into subanswers values($sid,$quesid,'$email','$ans',-1)";
        $data=mysqli_query($dbcon,$sql);

        $sql="SELECT * from examresult where Exam_Id=$eid and email='$email'";
        $data=mysqli_query($dbcon,$sql);
        if(mysqli_num_rows($data)==0){
            $sql="INSERT into examresult values('$email',$eid,-1,-1)";
            $data=mysqli_query($dbcon,$sql);
        }
        if($i != $stotal)
        {
        $i++;
        header("location:exampage.php?q=exam&step=2&eid=$eid&sid=$sid&stotal=$stotal&i=$i");
        }
        else{
            header("location:Student_Home.php?q=0");
        }
        $data=mysqli_query($dbcon,$sql);
    }
}
?>