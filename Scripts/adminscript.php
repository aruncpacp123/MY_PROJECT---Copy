<?php
include_once 'connection.php';
session_start();
if(@$_GET['q']=='deletestudent'){
    $id=intval($_GET['id']);
    //Deleting student data from subanswers,quizresult,examresult
    $sql="select * from student where Student_Id=$id";
    $data=mysqli_query($dbcon,$sql);
    $res=mysqli_fetch_array($data);
    $email=$res['E_Mail'];
    $sql="DELETE from subanswers where email='$email'";
    $data=mysqli_query($dbcon,$sql);
    $sql="DELETE from quizresult where email='$email'";
    $data=mysqli_query($dbcon,$sql);
    $sql="DELETE from examresult where email='$email'";
    $data=mysqli_query($dbcon,$sql);
    //Deleting Student
    $sql="DELETE from student where Student_Id=$id";
    $data=mysqli_query($dbcon,$sql);
    if($data){
      echo '<i class="p-1" style="color:red;"> Deleted</i>';
    }
    /*
    Here we can also delete the exam details of this student if needed
    When we delete a student we can
    Delete student from student table and all other table which stores this student inforamtion like student,subanswers,quizresult,examresult
    Delete student from student table only so teacher still can see marks of deleted student but only email of student is shown and teacher can delete that student from thses tables on view exam page which shows students result
    Delete student from student,quizresult,subanswers table but we maintain student in examresult tabe so teacher can see this
    TO possible the above 3 we should make a radio /check boxes to press when we delete a student details and according to the checkbox value we delete it
    */
}
if(@$_GET['q']=='deletecourse'){
    $id=intval($_GET['id']);
    $sql="DELETE from student where Course_Id=$id";
    $data=mysqli_query($dbcon,$sql);
    
    /*$sql="UPDATE exam SET Course_Id=NULL where Course_Id=$id";
    $data=mysqli_query($dbcon,$sql);*/
    //or delete that exam from database
    $sel="SELECT * from exam where Course_Id=$id";
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
    $sql="DELETE from course where Course_Id=$id";
    $data=mysqli_query($dbcon,$sql);
    if($data){
      //echo '<i class="btn btn-outline-success p-1" > Deleted</i>';
      echo '<i class="p-1" style="color:red;"> Deleted</i>';
    }
}
if(@$_GET['q']=='deleteexam'){
    $id=intval($_GET['id']);
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
    if($data){
      //echo '<i class="btn btn-outline-success p-1" > Deleted</i>';
      echo '<i class="p-1" style="color:red;"> Deleted</i>';
    }
}
if(@$_GET['q']=='deleteteacher'){
    $id=intval($_GET['id']);
    ////////////make teacherrempve function alert box to confirm box to execute below
    //now this won't execute because if there is atleast one exam is controlled by this teacher it will not proceed to deltete.ewe should change control before deltion
    $sql2="select * from exam where Teacher_Id=$id";
    $data2=mysqli_query($dbcon,$sql2);
    while($row=mysqli_fetch_array($data2)){
        $eid=$row['Exam_Id'];
        $sql="UPDATE exam SET Teacher_Id='0' where Exam_Id=$eid";
        $data=mysqli_query($dbcon,$sql);
    }
    ////////////
    $sql="DELETE from user where User_Id=$id";
    $data=mysqli_query($dbcon,$sql);
    
    if($data){
      //echo '<i class="btn btn-outline-success p-1" > Deleted</i>';
      echo '<i class="p-1" style="color:red;"> Deleted</i>';
    }
}
if(@$_GET['q']=='changeteacher'){
    $id=intval($_GET['id']);
    $tid=intval($_GET['tid']);
    $sql="UPDATE exam SET Teacher_Id=$tid where Exam_Id=$id";
    $data=mysqli_query($dbcon,$sql);
    if($data){
      $sql2="select * from user where User_Id=$tid";
      $data2=mysqli_query($dbcon,$sql2);
      $row=mysqli_fetch_array($data2);
      $tname=$row['User_Name'];
      echo '<i class="p-1" >'.$tname.'</i>';
      //header("location:../Admin_Home.php?q=0");
    }
}
/*if(@$_GET['q']=='changedepartment'){
    $id=intval($_GET['id']);
    $did=intval($_GET['did']);
    $sql="UPDATE course SET Department_Id=$did where Course_Id=$id";
    $data=mysqli_query($dbcon,$sql);
    if($data){
      $sql2="select * from Department where Department_Id=$did";
      $data2=mysqli_query($dbcon,$sql2);
      $row=mysqli_fetch_array($data2);
      $dname=$row['Department_Name'];
      echo '<i class="p-1" >'.$dname.'</i>';
      //header("location:../Admin_Home.php?q=0");
    }
}*/
if(@$_GET['q']=='changedepartment'){
    echo'<script>alert("hi");</script>';
    $id=intval($_GET['id']);
    $did=intval($_GET['did']);
    $tid=intval($_GET['tid']);
    $eid=intval($_GET['eid']);
    
    if($eid ==1){//delete exams
        $sql="UPDATE course SET Department_Id=$did where Course_Id=$id";//press ctrl+alt and press z and downarroykey at same time to copy this line to just below line
        $data=mysqli_query($dbcon,$sql);
        $sel="SELECT * from exam where Course_Id=$id";
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
    elseif($eid==0){//change exam control to another teacher
        $sql="UPDATE course SET Department_Id=$did where Course_Id=$id";//press ctrl+alt and press z and downarroykey at same time to copy this line to just below line
        $data=mysqli_query($dbcon,$sql);
        if($tid!=0){
            $sql="UPDATE exam set Teacher_Id=$tid where Course_Id=$id";
            $data=mysqli_query($dbcon,$sql);
        }
        else{
            $sel="SELECT * from exam where Course_Id=$id";
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
}
function deleteexambycourse($id){
    include "connection.php";//Here May be a error thrown
    $sel="SELECT * from exam where Course_Id=$id";
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
if(@$_GET['q']=='changedepartmentteach'){
    //this will delete all exams created by this teacher
    $id=intval($_GET['id']);
    $did=intval($_GET['did']);
    $sql="UPDATE user SET Department_Id=$did where User_Id=$id";
    $data=mysqli_query($dbcon,$sql);
    if($data){
      $sql2="select * from exam where Teacher_Id=$id";
      $data2=mysqli_query($dbcon,$sql2);
      while($row=mysqli_fetch_array($data2)){
        $eid=$row['Exam_Id'];
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
if(@$_GET['q']=='viewteachers'){
    $id=intval($_GET['id']);
    echo'<script>alert("'.$id.'");</script>';
    $sql2="SELECT * FROM user WHERE Department_Id = $id and Institution_Id=".$_SESSION['institution']."";
    $result2 = mysqli_query($dbcon,$sql2);
    echo '<small style="color:red;">Select a Teacher from below List to Change controller of all exams under this course to that teacher</small><br><br>';
    echo '<div class="form-floating mb-3">
        <select class="form-select" id="floatingSelect" name="teachername" required  onchange="changesteacher(this.value)" id="teachername">';                              
        echo "<option value='0' selected>Select One</option>";
            if(mysqli_num_rows($result2)>0){
              
              while($row10=mysqli_fetch_array($result2)){                          
                echo "<option value=".$row10['User_Id'].">".$row10['User_Name']."</option>";
              }
            }
            echo '                                
        </select>
        <label for="floatingSelect">Select Teacher Name</label>
    </div>';
?>
<?php
}
if(@$_GET['q']=='removedepartment'){
    $id=intval($_GET['id']);
    $sql="select * from course where Department_Id=$id";
    $data=mysqli_query($dbcon,$sql);
    if(mysqli_num_rows($data)>0){
        while($row=mysqli_fetch_array($data)){
            $cid=$row['Course_Id'];
            $sql2="DELETE from student where Course_Id=$cid";//Deleting Students Under Each Course
            $data2=mysqli_query($dbcon,$sql2);
            deleteexambycourse($cid);//Deleting Exams under Each Course
        }
    }
    $sql="DELETE from user where Department_Id=$id";//Deleting Teacher
    $data=mysqli_query($dbcon,$sql);
    $sql="DELETE from course where Department_Id=$id";//Deleting Course
    $data=mysqli_query($dbcon,$sql);
    $sql="DELETE from department where Department_Id=$id";//Deleting Department
    $data=mysqli_query($dbcon,$sql);
    if($data){
      //echo '<i class="btn btn-outline-success p-1" > Deleted</i>';
      echo '<i class="p-1" style="color:red;"> Deleted</i>';
    }
}
if(@$_GET['q']=='adddepartment'){
    $dname=$_GET['id'];
    $iid=$_SESSION['institution'];
    $sql="select * from department where Institution_Id=$iid and Department_Name='$dname'";
    $data=mysqli_query($dbcon,$sql);
    if(mysqli_num_rows($data)>0){
        echo 'Department Already Exists';
    }
    else{
        $sql="insert into department values('null','$dname',$iid)";
        $data=mysqli_query($dbcon,$sql);
        echo 'Department Added';
    }
}
if(@$_GET['q']=='addcourse'){
    $cname=$_POST['CourseName'];
    $did=$_POST['Departid'];
    $dur=$_POST['CourseSem'];
    $iid=$_SESSION['institution'];
    $sql="select * from course where Institution_Id=$iid and Course_Name='$cname'";
    $data=mysqli_query($dbcon,$sql);
    if(mysqli_num_rows($data)>0){
       header("location:../Admin_Home.php?q=10&w=Course Already Exists");
    }
    else{
        $sql="insert into course values('null','$cname',$iid,$did,$dur)";
        $data=mysqli_query($dbcon,$sql);
        header("location:../Admin_Home.php?q=10&w=Course Added");
    }
}

/*
we have delete data on another table related to course,department,institution becuase these all are parent table
when we delete course we should delete students and exam first and last delete course otherwise foriegn key constraint fails
if we use foreign key then we should aware when deleting parent table's data
for example if in student table the course id references course id in course table .ie,course id in course table is a parent .so when delete data in parent table 
forign key constraints may fail beacuse the deleted row in parent table may be referred by a row in child table .so if we delete then when child table refer to parent table it falls error

when we delete department we should delete course and teachers coming under that department first .when deleting course we should delete students and exam under that course

when we delete institution first we should delete departments.when we delete department we should delete teachers and courses under all department first,when we dlete course under all department we should delete courses and exam and at last we delete institution
*/
?>
                                          