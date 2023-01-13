<?php 
include("Scripts/connection.php");
include_once "Scripts/session.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="bootstrap5/css/bootstrap.min.css" rel="stylesheet">
   <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">-->
    <!--<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">-->
    <link href="font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="CSS/main.css" type="text/css">
    <?php 
        if(@$_GET['w']){
            echo'<script>alert("'.@$_GET['w'].'");</script>';
        }
    ?>
    <script>

    </script>
</head>
<body>
<div class="container-fluid"><!--main container-fluid div-->
    <div class="header mt-2 mb-2">
        <div class="row" >
            <div class="col-lg-6">
                <span class="logo">Online Examination System</span>
            </div>
            <div class="col-lg-6">
                <?php 
                    $name=$_SESSION['name'];
                ?>
                <span class="rightfull "><span class="bi bi-person-fill"></span>&nbsp;&nbsp;Hello  <?=$name?> &nbsp;&nbsp;|</span>
            </div>
        </div>
    </div>
    <nav>
        <div class="row" id="new" style="display:flex;">
            <?php
                include("navbar.php");
            ?>
        </div>
    </nav>
</div>
<?php
$iid=$_SESSION['institution'];
$sid=$_SESSION['id'];
$cid=$_SESSION['course'];
$email=$_SESSION['e_mail'];
?>
<div class="container-fluid">
  <div class="row">
    <div class="col-md-12">
      <?php if(@$_GET['q']==0) {

        $sql="SELECT * from `exam` where `Institution_Id`='$iid' and `Course_Id`='$cid' and `Date` >='".Date('y.m.d')."' and `Exam_Id`NOT IN (SELECT `Exam_Id` from `examresult` where `email`='$email');";//and Date >='".Date('y.m.d')."'
        $result = mysqli_query($dbcon,$sql) or die('Error');
        echo  '<div class="mt-5"><div class="table-responsive"><table class=" table table-striped table-bordered">
        <tr><td><b>S.N.</b></td><td><b>Topic</b></td><td><b>Total question in Quiz</b></td><td><b>Total question in Subjective</b></td><td><b> Total Marks</b></td><td><b>Time limit</b></td><td></td></tr>';
        $c=1;
        if(mysqli_num_rows($result)>0){
          while($row = mysqli_fetch_array($result)) {
	          $title = $row['Exam_Name'];
              $time = $row['Duration'];
	          $eid = $row['Exam_Id'];

              $sql2="select * from quiz where Exam_Id='$eid'";
              $data2=mysqli_query($dbcon,$sql2);
              if(mysqli_num_rows($data2)>0){
                $row2=mysqli_fetch_array($data2);
                $qid=$row2['Quiz_Id'];
                $qtotal=$row2['TotalQ'];
                $qmark=$row2['Mark']*$qtotal;
              }
              else{
                $qtotal=0;
                $qmark=0;
                $qid=0;
              }
              $sql3="select * from subjective where Exam_Id='$eid'";
              $data3=mysqli_query($dbcon,$sql3);
              if(mysqli_num_rows($data3)>0){
                $row3=mysqli_fetch_array($data3);
                $stotal=$row3['SubTotalQ'];
                $sid=$row3['Sid'];
                $sql4="select * from squestions where Sid='$sid'";
                $data4=mysqli_query($dbcon,$sql4);
                $smark=0;
                while($row4 = mysqli_fetch_array($data4)) {
                    $smark=$smark+$row4['Mark'];
                }
              }
              else{
                $stotal=0;
                $smark=0;
                $sid=0;
              }
              $mark=$qmark+$smark;
            //$q12=mysqli_query($con,"SELECT score FROM history WHERE eid='$eid' AND email='$email'" )or die('Error98');
            //$rowcount=mysqli_num_rows($q12);	
            if($qid!=0){
	            echo '<tr><td>'.$c++.'</td><td>'.$title.'</td><td>'.$qtotal.'</td><td>'.$stotal.'</td><td>'.$mark.'</td><td>'.$time.'&nbsp;min</td>
	            <td><b><a href="exampage.php?q=exam&step=1&eid='.$eid.'&qid='.$qid.'&sid='.$sid.'&qtotal='.$qtotal.'&stotal='.$stotal.'&i=1"><span class="btn btn-success"><b>Start</b></span></a></b></td></tr>';
            } 
            else
            {
                echo '<tr><td>'.$c++.'</td><td>'.$title.'</td><td>'.$qtotal.'</td><td>'.$stotal.'</td><td>'.$mark.'</td><td>'.$time.'&nbsp;min</td>
	            <td><b><a href="exampage.php?q=exam&step=2&eid='.$eid.'&sid='.$sid.'&stotal='.$stotal.'&i=1"><span class="btn btn-success"><b>Start</b></span></a></b></td></tr>';
            }
          }
          $c=0;
        }
        else{
          echo '<tr class="text-center p-3"><td colspan=7><h5>YOU HAVE NO EXAMS TO DISPLAY</h5></td></tr>';
        }
        echo '</table></div></div>';
      }
      ?>
      <?php
        /*if(@$_GET['q']=='exam' && @$_GET['step']==1)
        {
            echo '<script>var text=document.getElementById("new");
            text.style.display="none";
            
            </script>';
            include("exampage.php");
        }*/
        if(@$_GET['q']==7) {
          $check=0;
            echo '
            <div class="row">
                <div class="col-lg-12">
                <div class="mt-5"><div class="table-responsive"><table class=" table table-striped table-bordered">
                <tr><td><b>S.N.</b></td><td><b>Topic</b></td><td><b> Quiz Max Mark</b></td><td><b>Quiz Scored</b></td><td><b> Subjective Max Marks</b></td><td><b>Subjective Scored</b></td><td>Total</td></tr>';
           
            $sql="SELECT * from `exam` where `Institution_Id`='$iid' and `Course_Id`='$cid' and `Exam_Id` IN (SELECT `Exam_Id` from `examresult` where `email`='$email');";
            $result = mysqli_query($dbcon,$sql) or die('Error');
            $c=1;
            if(mysqli_num_rows($result)>0){
              while($row = mysqli_fetch_array($result)) {
	            $title = $row['Exam_Name'];
	            $eid = $row['Exam_Id'];
                $sql2="select * from quiz where Exam_Id='$eid'";
                $data2=mysqli_query($dbcon,$sql2);
                if(mysqli_num_rows($data2)>0){
                  $row2=mysqli_fetch_array($data2);
                  $qid=$row2['Quiz_Id'];
                  $qtotal=$row2['TotalQ'];
                  $qmark=$row2['Mark']*$qtotal;
                }
                else{
                  $qtotal=0;
                  $qmark=0;
                  $qid=0;
                }
                $sql3="select * from subjective where Exam_Id='$eid'";
                $data3=mysqli_query($dbcon,$sql3);
                if(mysqli_num_rows($data3)>0){
                  $row3=mysqli_fetch_array($data3);
                  $stotal=$row3['SubTotalQ'];
                  $sid=$row3['Sid'];
                  $sql4="select * from squestions where Sid='$sid'";
                  $data4=mysqli_query($dbcon,$sql4);
                  $smark=0;
                  while($row4 = mysqli_fetch_array($data4)) {
                      $smark=$smark+$row4['Mark'];
                  }
                }
                else{
                  $stotal=0;
                  $smark=0;
                  $sid=0;
                }
                $email=$_SESSION['e_mail'];
                $sel="SELECT * from examresult where email='$email' and Exam_Id=$eid";
                $data=mysqli_query($dbcon,$sel);
                $row=mysqli_fetch_array($data);
                $qmarkscored=$row['Quiz_Total'];
                $smarkscored=$row['Subjective_Total'];
              
            //$q12=mysqli_query($con,"SELECT score FROM history WHERE eid='$eid' AND email='$email'" )or die('Error98');
            //$rowcount=mysqli_num_rows($q12);	
           
	            echo '<tr><td>'.$c++.'</td><td>'.$title.'</td><td>'.$qmark.'</td>';
                if($qtotal!=0){
                    echo '<td>'.$qmarkscored.'</td>';
                }
                else{
                    echo '<td>0</td>';
                }
                echo '<td>'.$smark.'</td>';
                if($stotal!=0){
                    if($smarkscored==-1){
                        echo '<td>Not Verified</td>';
                    }
                    else{
                        echo '<td>'.$smarkscored.'</td>';
                    }
                }
                else{
                    echo '<td>0</td>';
                }
                if($qtotal==0 && $smarkscored==-1){
                    echo '<td>Not Pulished</td>';
                }
	            elseif ($qtotal==0 && $smarkscored!=-1) {
                    echo '<td>'.$smarkscored.'</td>';
                }
                elseif($qtotal!=0 && $stotal==0){
                    echo '<td>'.$qmarkscored.'</td>';
                }
                elseif($qtotal!=0 && $stotal!=0 && $smarkscored !=-1){
                    $mark=$qmarkscored+$smarkscored;
                    echo '<td>'.$mark.'</td>';
                }
                else{
                    echo '<td>Not Pulished</td>';
                }
                echo '</tr>';
            
          }
          $check=1;
          
        }
        //In quiz result table emailid and examid is primary key .so make necessary step that a student don't attend quiz twice
        //----------FOR EXAMS NOT ATTENDED------------------------------------------

        $w="SELECT * from `exam` where `Institution_Id`='$iid' and `Course_Id`='$cid' and `Date` <'".Date('y.m.d')."' and `Exam_Id` NOT IN (SELECT `Exam_Id` from `examresult` where `email`='$email');";
        $r = mysqli_query($dbcon,$w) or die('Error');
        
      //----------------------------------------------
        if(mysqli_num_rows($r)>0){
          while($row2 = mysqli_fetch_array($r)) {
          $title = $row2['Exam_Name'];
          echo '<tr><td>'.$c++.'</td><td>'.$title.'</td><td colspan=5 style="text-align:center;">NOT ATTENDED WITHIN DATE</td>';
          }
          $check=2;
        }
        //if it dont works then copy the marking system from tacher home
       if($check==0){
          echo '<tr class="text-center p-3"><td colspan=8><h5>YOU HAVE NO EXAMS TO DISPLAY</h5></td></tr>';
        }

        echo '</table></div></div>';
        
        echo '</div></div>';
        }
        if(@$_GET['q']==9) {
        ?>
        <div class="row pt-3 pb-5" style="background: #1a2980;background: -webkit-linear-gradient(to right, #1a2980, #26d0ce);background: linear-gradient(to right, #1a2980, #26d0ce);">
          <div class="col-md-12 text-center">
              <div style="width:20%;background-color:#0F3D3E;opacity:0.9;margin:auto;padding:5px;border-radius:30px;"><h2>User Profile</h2></div>
          </div>
        </div>
        <?php
          $sql="select * from student where Student_Id=".$_SESSION['id'];
          $data=mysqli_query($dbcon,$sql);
          $row=mysqli_fetch_array($data);
          $sql="select * from course where Course_Id=".$row['Course_Id'];
          $data=mysqli_query($dbcon,$sql);
          $row2=mysqli_fetch_array($data);
          $sql="select * from institution where Institution_Id=".$row['Institution_Id'];
          $data=mysqli_query($dbcon,$sql);
          $row3=mysqli_fetch_array($data);
        ?>
        <div class="row" style="background: #1a2980;background: -webkit-linear-gradient(to right, #1a2980, #26d0ce);background: linear-gradient(to right, #1a2980, #26d0ce);height:90%;">
          <div class="col-md-4">
            <div class="card " style="width: 23rem;background-color:white!important; margin-left:50px;border-radius:20px;border-color:brown !important;">
              <img src="images/download.png" class="card-img-top mt-3 ml-5" alt="..." style="width:10rem;margin:auto;">
              <h5 class="card-title mt-3"style="color:black !important;margin:auto;font-weight:bolder;"><?=$row['Name']?></h5> 
              <div style="margin:auto;width:80%;height:1px;background-color:black !important;margin-top:18px;"></div>
              <div class="card-body" style="color:black !important;margin:auto;">
                <p class="card-text" style="color:black !important;font-weight:bold;">User Id &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;<?=$row['Student_Id']?></p>
                <p class="card-text" style="color:black !important;font-weight:bold;">Instituion &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;<?=$row3['Institution_Name']?></p>
                <p class="card-text" style="color:black !important;font-weight:bold;">Course &nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;<?=$row2['Course_Name']?></p>
                <p class="card-text" style="color:black !important;font-weight:bold;">Date Of Birth &nbsp;:&nbsp;&nbsp;<?=$row['Date_Of_Birth']?></p>
              </div>
            </div>
          </div>
          <div class="col-md-8">
            <div class="card " style="background-color:white!important;border-radius:20px;border-color:brown !important;margin-right:30px;">
              <h5 class="card-title mt-3"style="color:black !important;margin:auto;font-weight:bolder;">Information</h5> 
              <div class="card-body" style="color:black !important;margin:auto;">
                    <?php
                      //$dob=$row['Date_Of_Birth'];
                      //$today=date("Y/m/d");
                      //$age=(int)$today-(int)$dob;
                      $bday = new DateTime($row['Date_Of_Birth']); // Your date of birth
                      $today = new Datetime(date('m.d.y'));
                      $diff = $today->diff($bday);
                      //echo $diff->y;
                    ?>
                <table style="width:800px;">
                  <tr>
                    <th class="p-3">Year Of Admission</th>
                    <td >:</td>
                    <td class="p-3"><?=$row['Year_Of_Admission']?></td>
                    
                  </tr>
                  <tr>
                    <th class="p-3">E-mail</th>
                    <td >:</td>
                    <td class="p-3"><?=$row['E_Mail']?></td>
                  </tr>
            
                  <tr >
                    <th class="p-3">Gender</th>
                    <td >:</td>
                    <td class="p-3"><?=$row['Gender']?></td>
                  </tr>
                  <tr>
                    <th class="p-3">Age</th>
                    <td >:</td>
                    <td class="p-3"> <?=$row['Age']?></td>
                  </tr>
                </table> 
              </div>
            </div>
            <div style="height: 26px"></div>
            <div class="card  col-lg-5 text-center m-auto">
              <div class="card-header bg-success">
                <button data-bs-toggle="modal" data-bs-target="#updateprofile" class="btn btn-primary col-md-6">Edit</button>
                
              </div>
            </div>
          </div>
        </div>
        <!--modal for update profile-->
        <div class="modal fade" id="updateprofile" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Update Profle</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="Scripts/studscript.php?q=updateprofile" method="post" id="createdepartment" onclick="">
            <div class="modal-body">
              <div class="form-floating mb-3">
                <input type="text" class="form-control" id="floatingInput" placeholder="department" name="Name" value=<?=$row['Name']?>>
                <label for="floatingInput"> Enter Name</label>
              </div>
              <div class="form-floating mb-3">
                <input type="date" class="form-control" id="floatingInput" placeholder="department" name="DOB" value=<?=$row['Date_Of_Birth']?>>
                <label for="floatingInput"> Enter Date Of Birth</label>
              </div>
              <div class="form-floating mb-3">
                <input type="text" class="form-control" id="floatingInput" placeholder="department" name="Email" value=<?=$row['E_Mail']?>>
                <label for="floatingInput"> Enter email</label>
              </div>
              <div class="form-floating mb-3">
                <input type="text" class="form-control" id="floatingInput" placeholder="department" name="Age" value=<?=$row['Age']?>>
                <label for="floatingInput"> Enter Age</label>
              </div>
              <div class="form-floating mb-3">
                <input type="password" class="form-control" id="floatingInput" placeholder="department" name="password" value=<?=$row['password']?>>
                <label for="floatingInput"> Enter Password</label>
              </div>
            </div>
            <div class="modal-footer">
              <input type="submit" class="btn btn-primary" value="UPDATE" >
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <!--Here i can directy submit form using href without pass it to javascript function but page refresh -->
            </div>
            </form>
          </div>
        </div>
      </div>
      
      <!--end-->
        <?php
        }
      ?>
    </div>
  </div>
</div>

</div><!--main div-->
<?php
//include("updateprofile.php");
?>
<script src="bootstrap5/js/bootstrap.bundle.min.js"></script>
</body>
</html>