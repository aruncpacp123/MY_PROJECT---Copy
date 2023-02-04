<?php 
include("Scripts/connection.php");
include_once "Scripts/session.php";
?>
<!DOCTYPE html>
<html lang="en" style="color-scheme:light !important">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="bootstrap5/css/bootstrap.min.css" rel="stylesheet">
    <!--<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">-->
    <!--<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">-->
    <link href="font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="CSS/main.css" type="text/css">
    <?php 
        if(@$_GET['w']){
            echo'<script>alert("'.@$_GET['w'].'");</script>';
        }
    ?>
    <style>
      @media print {
  body * {
    visibility: hidden;
  }
  #section-to-print, #section-to-print * {
    visibility: visible;
  }
  #section-to-print {
    position: absolute;
    left: 0;
    top: 0;
  }
  #new *{
    visibility: hidden;
  }
}
    </style>
    <script>
      function check() {
        var text = document.getElementById("text");
        var checkBox = document.getElementById("quiz");
        if (checkBox.checked == true){
          text.style.display = "flex";/*block;*/
          getElementById('examcreated'). disabled = false;
        }
        else{
          text.style.display = "none";
        }
      }
      function check2() {
        var text = document.getElementById("text2");
        var checkBox2 = document.getElementById("sub");
        if (checkBox2.checked == true){
          text.style.display = "flex";/*block;*/
        }
        else{
          text.style.display = "none";
        }
      }
      function deleteexambyteacher(str){
        const form = document.getElementById('deleteexamform'+str);
        //alert(form.elements[0].value);
        /*
        var i=document.getElementById('examidform');
        form.addEventListener('submit', (event) => {
          alert(form.elements[0].value);
          event.preventDefault();
          const name = form.elements['examidform'];
          let dname = name.value;
          $c=confirm("Are you sure to Delete this Exam?");//use var c;
          if(!$c)
            return;
          form.submit();
        });
        */
        event.preventDefault();
        $c=confirm("Are you sure to Delete this Exam?");//use var c;
          if(!$c)
            return;
          else
            form.submit();
      }
    </script>
    <?php if(@$_GET['message'])
            {echo'<script>alert("'.@$_GET['message'].'");</script>';}
        ?>
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

<!--Navbar Start -->
<nav class="navbar navbar-expand-lg navbar-light" style="background-color: #e3f2fd;position:sticky;z-index:3;">
  <div class="container-fluid ">
    <a class="navbar-brand mx-2" href="#"><i class="bi bi-amd"></i></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item mx-2 bg-light">
          <a class="nav-link active" aria-current="page" href="Teacher_Home.php?q=0">Home</a>
        </li>
        <li class="nav-item dropdown bg-light me-2">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Exam
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="Teacher_Home.php?q=1">Create</a></li>
            <li><a class="dropdown-item" href="Teacher_Home.php?q=2">Delete</a></li>
          </ul>
        </li>
        <!--
        <li class="nav-item bg-light me-2">
          <a class="nav-link" href="Teacher_Home.php?q=3">Results</a>
        </li>
        -->
        <li class="nav-item bg-light">
          <a class="nav-link" href="Teacher_Home.php?q=4">Students</a>
        </li>
        <li class="nav-item bg-light btn btn-outline-secondary mx-2 me-2 mb-0 p-0" >
          <a class="nav-link" href="Teacher_Home.php?q=5">Profile</a>
        </li>
      </ul>
        <a class="btn btn-outline-success me-3" href="Scripts/logout.php"><i class="bi bi-box-arrow-right me-3"></i>Sign Out</a>
        <!--<button class="btn btn-outline-success me-3" type="submit" href="Scripts/logout.php">Log Out</button>-->
    </div>
  </div>
</nav>
<!--navbar End -->
<?php
$iid=$_SESSION['institution'];
$tid=$_SESSION['id'];
$did=$_SESSION['department'];
?>
<div class="container-fluid">
  <div class="row">
    <div class="col-md-12">
      <?php if(@$_GET['q']==0) {
        $sql="select * from exam where Institution_Id='$iid' and Teacher_Id='$tid'";
        $result = mysqli_query($dbcon,$sql) or die('Error');
        echo  '<div class="mt-5"><div class="table-responsive"><table class=" table table-striped table-bordered">
        <tr><td><b>S.N.</b></td><td><b>Topic</b></td><td><b>Course</b></td><td><b>Total question in Quiz</b></td><td><b>Total question in Subjective</b></td><td><b> Total Marks</b></td><td><b>Time limit</b></td><td></td><td></td></tr>';
        $c=1;
        if(mysqli_num_rows($result)>0){
          while($row = mysqli_fetch_array($result)) {
	          $title = $row['Exam_Name'];
	          $cid=$row['Course_Id'];
            $time = $row['Duration'];
	          $eid = $row['Exam_Id'];
            //$q12=mysqli_query($con,"SELECT score FROM history WHERE eid='$eid' AND email='$email'" )or die('Error98');
            //$rowcount=mysqli_num_rows($q12);	
            $sql2="select * from course where Course_Id='$cid'";
            $data2=mysqli_query($dbcon,$sql2);
            $course=mysqli_fetch_array($data2);
            $cname=$course['Course_Name'];
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
            
	            echo '<tr><td>'.$c++.'</td><td>'.$title.'</td><td>'.$cname.'</td><td>'.$qtotal.'</td><td>'.$stotal.'</td><td>'.$mark.'</td><td>'.$time.'&nbsp;min</td>
	            <td><b><a href="Teacher_Home.php?q=manageexam&step=1&eid='.$eid.'&qid='.$qid.'&sid='.$sid.'&stotal='.$stotal.'"><span class="btn btn-success"><b>View</b></span></a></b></td><td><b><a href="Teacher_Home.php?q=printresult&eid='.$eid.'&qid='.$qid.'&sid='.$sid.'&stotal='.$stotal.'"><span class="btn btn-success"><b>Result</b></span></a></b></td></tr>';
            
            
            /*if(true){
	            echo '<tr><td>'.$c++.'</td><td>'.$title.'</td><td>'.$total.'</td><td>'.$sahi*$total.'</td><td>'.$time.'&nbsp;min</td>
	            <td><b><a href="Teacher_Home.php?q=manageexam&eid='.$eid.'"><span class=" btn btn-success"><b>View</b></span></a></b></td></tr>';
            } */
           
          }
          $c=0;
        }
        else{
          echo '<tr class="text-center p-3"><td colspan=5><h5>YOU HAVE NO EXAMS TO DISPLAY</h5></td></tr>';
        }
        echo '</table></div></div>';
      }
      ?>
      <!--add exam start-->
      <?php
      if(@$_GET['q']==1 && !(@$_GET['step']) ) {
      ?>
        <div class="row mt-3">
          <span class="title1 text-center"><b>Enter Exam Details</b></span><br/><br/>
          <div class="col-md-3"></div><div class="col-md-6">
            <form class="form-horizontal mt-2" name="examform" action="Scripts/update.php?q=addexam"  method="POST">
              <fieldset>
                <div class="form-floating mb-3">
                  <input type="text" class="form-control" id="examname" name="examname" placeholder="name" required>
                  <label for="examname" >Name of the Exam</label>
                </div>
                <div class="form-floating mb-3">
                  <select class="form-select" id="floatingSelect" name="coursename" required>
                    <?php
                      $sel="select * from course where Institution_Id=$iid and Department_Id=$did";
                      $data=mysqli_query($dbcon,$sel);
                      echo "<option value=''>Select a Course</option>";
                      while($row=mysqli_fetch_array($data)){
                         echo "<option value=".$row['Course_Id'].">".$row['Course_Name']."</option>";
                      }
                    ?>
                  </select>
                  <label for="floatingSelect">Enter Course Name</label>
                </div>
                <div class="form-floating input-group mb-3">
                  <input type="text" class="form-control" name="examduration" placeholder="name" required>
                  <span class="input-group-text col-auto">Minutes</span>
                  <label >Duration Of Exam</label>
                </div>
                <div class="row">
                  <div class=" form-floating mb-3 col-md-6">
                    <input type="date" class="form-control"  name="examdate" required>
                    <label style="margin-left:8px;">Date Of Exam</label>
                  </div>
                  <div class=" form-floating mb-3 col-md-6">
                    <input type="time" class="form-control"  name="examtime">
                    <label style="margin-left:8px;">Time Of Exam</label>
                  </div>
                </div>
                <div class="row">
                  <div class=" form-floating mb-3 col-md-4">
                    <input type="text" class="form-control" name="examiid" value="<?=$iid?>" disabled>
                    <label style="margin-left:8px;">Institution Id</label>
                  </div>
                  <div class=" form-floating mb-3 col-md-4">
                    <input type="text" class="form-control" name="examdid" value="<?=$did?>" disabled>
                    <label style="margin-left:8px;">Department Id</label>
                  </div>
                  <div class=" form-floating mb-3 col-md-4">
                    <input type="text" class="form-control" name= "examtid" value="<?=$tid?>" disabled>
                    <label style="margin-left:8px;">Teacher Id</label>
                  </div>
                </div>
                <div class=" form-floating mb-3">
                  <textarea class="form-control"  name="examdes"></textarea>
                  <label >Exam Description</label>
                </div>
                <!--
                <div class="row ">
                  <div class="input-group mb-3">
                    <span class="input-group-text">Exam Have</span>
                    <div class="input-group-text" style="margin-left:5px;">
                      <input class="form-check-input mt-0" type="checkbox" value="" style="padding:8px;">
                    </div>
                    <input type="text" class="form-control" value="Quiz" disabled>
                    <div class="input-group-text" style="margin-left:5px;">
                      <input class="form-check-input mt-0" type="checkbox" value="" style="padding:8px;">
                    </div>
                    <input type="text" class="form-control" value="Subjective" disabled>
                  </div>
                </div>
                -->
                <div class="row ">
                  <div class="input-group mb-3">
                    <span class="input-group-text col-md-2">Exam Have</span>
                    <div class="input-group-text" style="margin-left:17px;">
                      <input class="form-check-input mt-0 btn-outline-success" type="checkbox" onclick="check()" value="1" id="quiz" name="quiz" style="padding:8px;">
                    </div>
                    <span class="input-group-text col-md-4 btn btn-outline-secondary">Quiz</span>
                    <div class="input-group-text" style="margin-left:17px;">
                      <input class="form-check-input mt-0 btn-outline-success" type="checkbox" onclick="check2()" value="1" id="sub" name="sub" style="padding:8px;">
                    </div>
                    <span class="input-group-text col-md-4 btn btn-outline-secondary">Subjective</span>
                  </div>
                </div>
                <!--
                <div class="row ">
                  <div class="input-group mb-3 col-md-12">
                    <span class="input-group-text col-md-2" style="height: 40px;padding-top: 0px;padding-bottom: 0px;margin:auto;">Quiz</span>
                    <div class="input-group-text col-md-5" style="height: 62px;padding-top: 0px;padding-bottom: 0px;">
                      <div class="form-floating " style="margin-bottom: 0px;width:100%;">
                        <input type="text" class="form-control ml-3" id="examname" name="examname" placeholder="name" required>
                        <label for="examname" >Number Of Questions</label>
                      </div>
                    </div>
                    <div class="input-group-text col-md-5" style="height: 62px;padding-top: 0px;padding-bottom: 0px;">
                      <div class="form-floating" style="width:100%;">
                        <input type="text" class="form-control" id="examname" name="examname" placeholder="name" required>
                        <label for="examname" >Marks of Each Question</label>
                      </div>
                    </div>
                  </div>
                </div>
                -->
                <div class="row">
                  <div class="input-group mb-3" style="display:none;" id="text">
                    <span class="input-group-text" style="width:15%;height:40px;margin:auto;margin-left:0;margin-right:0;">Quiz</span>
                    <div class="form-floating " style="margin-bottom: 0px;width:40%;margin-left:20px;">
                      <input type="text" class="form-control " id="QuesNo" name="QuesNo" placeholder="name" >
                      <label for="examname" >Number Of Questions</label>
                    </div>
                    <div class="form-floating " style="margin-bottom: 0px;width:40%;margin-left:10px;">
                      <input type="text" class="form-control " id="QuesMark" name="QuesMark" placeholder="name" >
                      <label for="examname" >Marks Of Each Question</label>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="input-group mb-3" style="display:none;" id="text2">
                    <span class="input-group-text" style="width:15%;height:40px;margin:auto;margin-left:0;margin-right:0;">Subjective</span>
                    <div class="form-floating " style="width:81%;margin:auto;margin-left:20px;">
                        <input type="text" class="form-control " id="QuesNoSub" name="QuesNoSub" placeholder="name">
                        <label for="examname" >Number Of Questions</label>
                    </div>
                  </div>
                </div>
                <!--
                <div class="row">
                  <div class="input-group">
                    <span class="input-group-text">Quiz</span>
                    <input type="text" aria-label="First name" class="form-control" placeholder="Enter Number of Question">
                    <input type="text" aria-label="Last name" class="form-control" placeholder="Enter Marks of Each Question">
                  </div>
                </div>
                -->
                <!--
                <div class="row">
                  <div class="col-md-2"></div>
                  <div class="col-md-5" style="display:none;" id="text">
                    <span class="text-center" style="margin-left:80px;font-size:16px;color:rgb(32, 175, 109);"><b>Enter Quiz Details</b></span><br/><br/>
                    <div class="form-floating mb-3">
                      <input type="text" class="form-control" id="examname" name="examname" placeholder="name" required>
                      <label for="examname" >Number Of Questions</label>
                    </div>
                    <div class="form-floating mb-3">
                      <input type="text" class="form-control" id="examname" name="examname" placeholder="name" required>
                      <label for="examname" >Marks for Each Correct answer</label>
                    </div>
                  </div>
                  <div class="col-md-5" style="display:none;" id="text2">
                    <span class="text-center" style="margin-left:80px;font-size:16px;color:rgb(32, 175, 109);"><b>Enter Subjective Details</b></span><br/><br/>
                    <div class="form-floating mb-3 mt-4">
                      <input type="text" class="form-control" id="examname" name="examname" placeholder="name" required>
                      <label for="examname" >Number Of Questions</label>
                    </div>
                  </div>
                </div>
                -->
                <div class="mb-3 col-md-6">
                    <input type="submit" class="form-control btn btn-outline-success " style="margin-left:185px;" id="examcreate" value="NEXT">
                </div>
              </fieldset>
            </form>
          </div>
        </div>
      <?php
      }
      ?>
      <?php
      if(@$_GET['q']==1 && (@$_GET['step'])==2 && @$_GET['qid']!=0) {
      ?>
        <div class="row mt-3"> 
            <span class="title1 text-center"><b>Enter Quiz Details</b></span><br/><br/>
            <div class="col-md-3"></div><div class="col-md-6">
              <?php echo '<form class="form-horizontal mt-2" name="examform3" action="Scripts/update.php?q=addquiz&n='.@$_GET['qt'].'&eid='.@$_GET['eid'].'&sid='.@$_GET['sid'].'&qid='.@$_GET['qid'].'&st='.@$_GET['st'].'&ch=4"  method="POST">'?>
                <fieldset>
                  <?php
                  for($i=1;$i<=@$_GET['qt'];$i++)
                  {
                    echo '
                    <span class=" title2"><b>Q.No&nbsp;'.$i.'&nbsp;:</b></span>
                    <div class="form-floating mb-3 mt-3">
                      <textarea class="form-control" placeholder="Enter Question" name="qns'.$i.'" id="floatingTextarea"></textarea>
                      <label for="floatingTextarea">Enter Question</label>
                    </div>
                    <div class="form-floating mb-3">
                      <input type="text" class="form-control" id="'.$i.'1" name="'.$i.'1" placeholder="option1">
                      <label for="floatingInput">option1</label>
                    </div>
                    <div class="form-floating mb-3">
                      <input type="text" class="form-control" id="'.$i.'2" name="'.$i.'2" placeholder="option1">
                      <label for="floatingInput">option2</label>
                    </div>
                    <div class="form-floating mb-3">
                      <input type="text" class="form-control" id="'.$i.'3" name="'.$i.'3" placeholder="option1">
                      <label for="floatingInput">option3</label>
                    </div>
                    <div class="form-floating mb-5">
                      <input type="text" class="form-control" id="'.$i.'4" name="'.$i.'4" placeholder="option1">
                      <label for="floatingInput">option4</label>
                    </div>
                    <div class="form-floating mb-5">
                      <select class="form-select" id="ans'.$i.'" name="ans'.$i.'">
                        <option value="1">OPTION 1</option>
                        <option value="2">OPTION 2</option>
                        <option value="3">OPTION 3</option>
                        <option value="4">OPTION 4</option>
                      </select>
                      <label for="floatingSelect">Answer for Question '.$i.'</label>
                    </div>';
                  }
                  echo '
                  <div class="mb-3 col-md-6">
                    <input type="submit" class="form-control btn btn-outline-success " style="margin-left:185px;" id="examname" value="SUBMIT">
                  </div>';
                  ?>
                </fieldset>
              </form>
            </div>
        </div>
      <?php
      }
      ?>
      <?php
      if(@$_GET['q']==1 && (@$_GET['step'])==3 && @$_GET['sid']!=0) {
      ?>
        <div class="row mt-3"> 
            <span class="title1 text-center"><b>Enter Subjective Details</b></span><br/><br/>
            <div class="col-md-3"></div><div class="col-md-6">
              <?php echo '<form class="form-horizontal mt-2" name="examform4" action="Scripts/update.php?q=addsub&n='.@$_GET['st'].'&eid='.@$_GET['eid'].'&sid='.@$_GET['sid'].'"  method="POST">'?>
                <fieldset>
                  <?php
                  for($i=1;$i<=@$_GET['st'];$i++)
                  {
                    echo '
                    <span class=" title2"><b>Q.No&nbsp;'.$i.'&nbsp;:</b></span>
                    <div class="form-floating mb-3 mt-3">
                      <textarea class="form-control" placeholder="Enter Question" name="qns'.$i.'" id="floatingTextarea"></textarea>
                      <label for="floatingTextarea">Enter Question</label>
                    </div>
                    <div class="form-floating mb-3">
                      <input type="text" class="form-control" id="'.$i.'1" name="'.$i.'1" placeholder="mark">
                      <label for="floatingInput">Enter Mark</label>
                    </div>';
                  }
                  echo '
                  <div class="mb-3 col-md-6">
                    <input type="submit" class="form-control btn btn-outline-success " style="margin-left:185px;" id="examname" value="SUBMIT">
                  </div>';
                  ?>
                </fieldset>
              </form>
            </div>
        </div>
      <?php
      }
      ?>
      <?php
      if(@$_GET['q']==5) {
      ?>
        
        <div class="row pt-3 pb-5" style="background: #1a2980;background: -webkit-linear-gradient(to right, #1a2980, #26d0ce);background: linear-gradient(to right, #1a2980, #26d0ce);">
          <div class="col-md-12 text-center">
              <div style="width:20%;background-color:#0F3D3E;opacity:0.9;margin:auto;padding:5px;border-radius:30px;"><h2>User Profile</h2></div>
          </div>
        </div>
        <?php
          $sql="select * from user where User_Id=".$_SESSION['id']."";
          $data=mysqli_query($dbcon,$sql);
          $row=mysqli_fetch_array($data);
          $sql="select * from department where Department_Id=".$row['Department_Id']." and Institution_Id=".$_SESSION['institution']."";
          $data=mysqli_query($dbcon,$sql);
          $row2=mysqli_fetch_array($data);
          $sql="select * from institution where Institution_Id=".$row['Institution_Id']."";
          $data=mysqli_query($dbcon,$sql);
          $row3=mysqli_fetch_array($data);
        ?>
        <div class="row" style="background: #1a2980;background: -webkit-linear-gradient(to right, #1a2980, #26d0ce);background: linear-gradient(to right, #1a2980, #26d0ce);height:90%;">
          <div class="col-md-4">
            <div class="card " style="width: 23rem;background-color:white!important; margin-left:50px;border-radius:20px;border-color:brown !important;">
              <img src="images/download.png" class="card-img-top mt-3 ml-5" alt="..." style="width:10rem;margin:auto;">
              <h5 class="card-title mt-3"style="color:black !important;margin:auto;font-weight:bolder;"><?=$row['User_Name']?></h5> 
              <div style="margin:auto;width:80%;height:1px;background-color:black !important;margin-top:18px;"></div>
              <div class="card-body" style="color:black !important;margin:auto;">
                <p class="card-text" style="color:black !important;font-weight:bold;">User Id &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;<?=$row['User_Id']?></p>
                <p class="card-text" style="color:black !important;font-weight:bold;">Instituion &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;<?=$row3['Institution_Name']?></p>
                <p class="card-text" style="color:black !important;font-weight:bold;">Department &nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;<?=$row2['Department_Name']?></p>
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
                    <th class="p-3">Address</th>
                    <td >:</td>
                    <td class="p-3"><?=$row['Address']?></td>
                    
                  </tr>
                  <tr>
                    <th class="p-3">E-mail</th>
                    <td >:</td>
                    <td class="p-3"><?=$row['E_Mail']?></td>
                  </tr>
                  <tr>
                    <th class="p-3">Mobile No</th>
                    <td >:</td>
                    <td class="p-3"><?=$row['Mobile_No']?></td>
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
            <form action="Scripts/update.php?q=updateprofile" method="post" id="createdepartment" onclick="">
            <div class="modal-body">
              <div class="form-floating mb-3">
                <input type="text" class="form-control" id="floatingInput" placeholder="department" name="Name" value=<?=$row['User_Name']?>>
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
                <input type="text" class="form-control" id="floatingInput" placeholder="department" name="mob" value=<?=$row['Mobile_No']?>>
                <label for="floatingInput"> Enter Mobile Number</label>
              </div>
              <div class="form-floating mb-3">
                <input type="text" class="form-control" id="floatingInput" placeholder="department" name="Age" value=<?=$row['Age']?>>
                <label for="floatingInput"> Enter Age</label>
              </div>
              <div class="form-floating mb-3">
                <textarea class="form-control" id="floatingInput" placeholder="department" name="Address"><?=$row['Address']?></textarea>
                <label for="floatingInput"> Enter Address</label>
              </div>
              <div class="form-floating mb-3">
                <input type="password" class="form-control" id="floatingInput" placeholder="department" name="password" value=<?=$row['Password']?>>
                <label for="floatingInput"> Enter Password</label>
              </div>
            </div>
            <div class="modal-footer">
              <input type="submit" class="btn btn-primary" value="UPDATE">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <!--Here i can directy submit form using href without pass it to javascript function but page refresh -->
            </div>
            </form>
          </div>
        </div>
      </div>
      <?php 
      }?>
 
      <?php
        if(@$_GET['q']==4){
          ?>
          <div class="row mt-5">
            <div class="col-lg-12">
            <table class=" table table-striped table-bordered">
            <tr><td><b>S.N.</b></td><td><b>Student Id</b></td><td><b>Name</b></td><td><b>email</b></td><td><b> Gender</b></td><td><b>Course</b></td></tr>
            <?php
              $iid=$_SESSION['institution'];
              $did=$_SESSION['department'];
              $sql="select * from course where Department_Id=$did";
              $data=mysqli_query($dbcon,$sql);
              $c=1;
              while($row=mysqli_fetch_array($data)){
                $cid=$row['Course_Id'];
                $sel="select * from student where Institution_Id=$iid and Course_id=$cid";
                $data2=mysqli_query($dbcon,$sel);
                while($row2=mysqli_fetch_array($data2)){
                  echo '<tr><td><b>'.$c++.'</b></td><td><b>'.$row2['Student_Id'].'</b></td><td><b>'.$row2['Name'].'</b></td><td><b>'.$row2['E_Mail'].'</b></td><td><b>'.$row2['Gender'].'</b></td><td><b>'.$row['Course_Name'].'</b></td></tr>'; 
                }
              }
            ?>

        </table>
            </div>
          </div>
        <?php
        }
      ?>
      <?php
      //q=manageexam&eid='.$eid.'&qid='.$qid.'&sid='.$sid.'&stotal='.$stotal.'
      if(@$_GET['q']=='manageexam' && @$_GET['step']==1){
        $eid=@$_GET['eid'];
        $qid=@$_GET['qid'];
        $sid=@$_GET['sid'];
        $stotal=@$_GET['stotal'];
        echo '<table class=" table table-striped table-bordered mt-5">
        <tr><td><b>S.N.</b></td><td><b>Student Id</b></td><td><b>Name</b></td><td><b>Quiz mark</b></td><td><b>Subjective Mark</b></td><td>Total</td><td></td></tr>';
        $sql="SELECT * from student where E_Mail IN(SELECT email from examresult where Exam_Id=$eid)";
        $data=mysqli_query($dbcon,$sql); 
        $c=1;
        if(mysqli_num_rows($data)>0){
          while($row=mysqli_fetch_array($data)){
              $email=$row['E_Mail'];
              $sel="SELECT * from examresult where email='$email' and Exam_Id=$eid";
              $data2=mysqli_query($dbcon,$sel);
              while($row2=mysqli_fetch_array($data2)){
                echo '<tr><td><b>'.$c++.'</b></td><td><b>'.$row['Student_Id'].'</b></td><td><b>'.$row['Name'].'</b></td>';
                //<td><b>Quiz mark</b></td><td><b>Subjective Mark</b></td><td>Total</td><td>Completed</td><td></td></tr>';
                $qmark=$row2['Quiz_Total'];
                $smark=$row2['Subjective_Total'];
                if($qmark==-1)
                {
                    echo '<td>No Quiz</td>';
                    if($smark==-1)
                    {
                      echo '<td>Not Checked</td>';
                      echo '<td>Not Verified</td>';
                    }
                    else
                    {
                      echo '<td>'.$smark.'</td>';
                      echo '<td>'.$smark.'</td>';
                    }

                }
                elseif($sid==0)
                {
                   echo '<td>'.$qmark.'</td>';
                   echo '<td>No Subjective</td>' ;
                   echo '<td>'.$qmark.'</td>';
                }
                else
                {
                    echo '<td>'.$qmark.'</td>';
                    if($smark==-1)
                    {
                      echo '<td>Not Checked</td>';
                      echo '<td>Not Verified</td>';
                    }
                    else
                    {
                      echo '<td>'.$smark.'</td>';
                      echo '<td>'.$smark+$qmark.'</td>';
                    }
                }
                


                echo '';
                if($sid!=0)
                echo '<td><a href="Teacher_Home.php?q=manageexam&step=2&eid='.$eid.'&sid='.$sid.'&stotal='.$stotal.'&email='.$email.'&qid='.$qid.'"><span class="btn btn-success"><b>View Answer</b></span></a></td>';
              }
          }
        }
        else{
          echo '<tr><td colspan=5>No One Attend the Exam</td></tr>';
        }
        /*$s="SELECT * from examresult where Exam_Id=$eid and email NOT IN(SELECT E_Mail from student)";
        $q=mysqli_query($dbcon,$s);
        if(mysqli_num_rows($q)>0){
          while ($r=mysqli_fetch_array($q)) {
            echo '<tr><td><b>'.$c++.'</b></td><td><b>'.$r['email'].'</b></td><td><b>'.$row['Name'].'</b></td>';
          }
        }*/
        echo '</table>';
      }
      //In result page it shows first courses when click on it shows various exams when click on it it shows various students mark who attend it
      ?>
      <?php
      if(@$_GET['q']=='manageexam' && @$_GET['step']==2){
      ?>
      <div class="row">
        <div class="col-lg-12">
          <?php
            $eid=@$_GET['eid'];
            $sid=@$_GET['sid'];
            $stotal=@$_GET['stotal'];
            $email=@$_GET['email'];
            $qid=@$_GET['qid'];
            $sql="select * from squestions where Sid=$sid";
            $data=mysqli_query($dbcon,$sql);
            //$row=mysqli_fetch_array($data);
            //for($i=1;$i<=$stotal;$i++)
            echo '<div class="row mt-3">
            <div class="col-lg-3"></div>
            <div class="col-lg-6">
            ';
            
            echo '<form class="form-horizontal mt-2" name="examform3" action="Scripts/update.php?q=manageexam&eid='.$eid.'&sid='.$sid.'&stotal='.$stotal.'&email='.$email.'&qid='.$qid.'"  method="POST">';
            $i=1;
            echo '<span class=" title2" style="background-color:white !important;padding:15px;color:black !important;"><b>Email&nbsp;'.$email.'&nbsp;:</b></span>';
          echo '<br><br><br>';
            while($row=mysqli_fetch_array($data))
            {
              $qns=$row['Qns'];
              $quesid=$row['Question_Id'];
              $mark=$row['Mark'];
              $sn=$row['sn'];
              $sel="select * from subanswers where Sid=$sid and Question_Id=$quesid and email='$email'";
              $data2=mysqli_query($dbcon,$sel);
              $row2=mysqli_fetch_array($data2);
              $ans=$row2['answer'];
              $m=$row2['mark'];
              echo '<span class=" title2" style="background-color:white !important;padding:15px;color:black !important;"><b>Q.No&nbsp;'.$i.'&nbsp;:</b></span>';
              echo '
              <div class=" mb-3 mt-3" style>
                  <span class="input-group-text " style="min-height:50px;">'.$row['Qns'].'</span>
              </div>
              <div class="input-group mb-3">
                <div class="col-md-6"></div>
                <span class="input-group-text">Max Marks</span>
                <input type="text" aria-label="First name" class="form-control" value='.$row['Mark'].' disabled>
                <span class="input-group-text">Currrent Marks</span>';
                if($m!=-1)
                  echo '<input type="text" aria-label="First name" class="form-control" value='.$m.' disabled>';
                else
                  echo '<input type="text" aria-label="First name" class="form-control" value="0" disabled>';//Here i should close the echo because i start echo inside else statement 
                  //so if i didnt close if there then the below ststement cant see echo if else part not executed .This can be same for if also
                echo '
              </div>
              <div style="height:1px;background-color:white !important;margin-bottom:30px;"></div>
              <div class="input-group mb-3">
                
                <textarea class="form-control" rows=8 >'.$ans.'</textarea>
              </div>
              <div class="input-group mb-3">
                <div class="col-md-5" >
                <input type="text" class="form-control" name="mark'.$i.'" placeholder="Enter Mark Here" >
                <input type="hidden" name="qid'.$i.'" value='.$quesid.'>

                </div>
              </div>         
              ';
              $i++;
      //value='.$m.'put inside 770 line ie,enter mark here column
            }
            echo '
                  <div class="mb-3 col-md-6">
                    <input type="submit" class="form-control btn btn-outline-success " style="margin-left:185px;" id="examname" value="SUBMIT">
                  </div>';
            echo '</div></div>';
            //<span class="input-group-text col-md-12" style="height:50px;">'.$ans.'</span>
          ?>
        </div>
      </div>
      <?php
      }
      ?>
      <?php
        if(@$_GET['q']=="printresult"){
          ?>
          <div class="container">
          <div class="row mt-5">
            <div class="col-lg-12">
            <div id="section-to-print">
  
              <?php
                $eid=@$_GET['eid'];
                $sql="select * from exam where Exam_Id=$eid";
                $data=mysqli_query($dbcon,$sql);
                $row=mysqli_fetch_array($data);
                $cid=$row['Course_Id'];
                $sql2="select * from course where Course_Id=$cid";
                $data2=mysqli_query($dbcon,$sql2);
                $row2=mysqli_fetch_array($data2);
                echo '<table border=4 width=100%>
                  <tr><th style="width:40%;text-align:left;">Exam Name:&nbsp;&nbsp;&nbsp;&nbsp;'.$row["Exam_Name"].'</th><th style="width:40%;text-align:right;">Course:&nbsp;&nbsp;&nbsp;&nbsp;'.$row2["Course_Name"].'</th><th rowspan=2 id="new" style="width:20%;text-align:right;"><button class="btn btn-primary" onClick="window.print()"><i class="bi bi-printer"></i>&nbsp;&nbsp;&nbsp;Print </button></th></tr>
                  <tr><th style="width:40%;text-align:left;">Date of Exam:&nbsp;&nbsp;&nbsp;&nbsp;'.$row["Date"].'</th><th style="width:40%;text-align:right;">Duration:&nbsp;&nbsp;&nbsp;&nbsp;'.$row["Duration"].'&nbsp;&nbsp;Minutes</th></tr>

                </table>';
                $qid=@$_GET['qid'];
        $sid=@$_GET['sid'];
        $stotal=@$_GET['stotal'];
        echo '<table class=" table table-striped table-bordered mt-5">
        <tr><td><b>S.N.</b></td><td><b>Student Id</b></td><td><b>Name</b></td><td><b>Quiz mark</b></td><td><b>Subjective Mark</b></td><td>Total</td></tr>';
        $sql="SELECT * from student where E_Mail IN(SELECT email from examresult where Exam_Id=$eid)";
        $data=mysqli_query($dbcon,$sql); 
        $c=1;
        if(mysqli_num_rows($data)>0){
          while($row=mysqli_fetch_array($data)){
              $email=$row['E_Mail'];
              $sel="SELECT * from examresult where email='$email' and Exam_Id=$eid";
              $data2=mysqli_query($dbcon,$sel);
              while($row2=mysqli_fetch_array($data2)){
                echo '<tr><td><b>'.$c++.'</b></td><td><b>'.$row['Student_Id'].'</b></td><td><b>'.$row['Name'].'</b></td>';
                //<td><b>Quiz mark</b></td><td><b>Subjective Mark</b></td><td>Total</td><td>Completed</td><td></td></tr>';
                $qmark=$row2['Quiz_Total'];
                $smark=$row2['Subjective_Total'];
                if($qmark==-1)
                {
                    echo '<td>No Quiz</td>';
                    if($smark==-1)
                    {
                      echo '<td>Not Checked</td>';
                      echo '<td>Not Verified</td>';
                    }
                    else
                    {
                      echo '<td>'.$smark.'</td>';
                      echo '<td>'.$smark.'</td>';
                    }

                }
                elseif($sid==0)
                {
                   echo '<td>'.$qmark.'</td>';
                   echo '<td>No Subjective</td>' ;
                   echo '<td>'.$qmark.'</td>';
                }
                else
                {
                    echo '<td>'.$qmark.'</td>';
                    if($smark==-1)
                    {
                      echo '<td>Not Checked</td>';
                      echo '<td>Not Verified</td>';
                    }
                    else
                    {
                      echo '<td>'.$smark.'</td>';
                      echo '<td>'.$smark+$qmark.'</td>';
                    }
                }
              
              }
          }
        }
        else{
          echo '<tr><td colspan=5>No One Attend the Exam</td></tr>';
        }
        /*$s="SELECT * from examresult where Exam_Id=$eid and email NOT IN(SELECT E_Mail from student)";
        $q=mysqli_query($dbcon,$s);
        if(mysqli_num_rows($q)>0){
          while ($r=mysqli_fetch_array($q)) {
            echo '<tr><td><b>'.$c++.'</b></td><td><b>'.$r['email'].'</b></td><td><b>'.$row['Name'].'</b></td>';
          }
        }*/
        echo '</table>';
                ?>
                </div>
            </div>
          </div>
        </div>
        <?php
        }
      ?>
            <?php
        if(@$_GET['q']==2){
          ?>
          <div class="container">
          <div class="row mt-5">
            <div class="col-lg-12">
            <table class=" table table-striped table-bordered" border=5>
            <tr><td><b>S.N.</b></td><td><b>Exam Name</b></td><td><b>Course</b></td><td></td></tr>
            <?php
              $iid=$_SESSION['institution'];
              $did=$_SESSION['department'];
              $tid=$_SESSION['id'];
              $sql="select * from exam where Institution_Id='$iid' and Teacher_Id='$tid'";
              $data = mysqli_query($dbcon,$sql) or die('Error');
              $c=1;
              while($row=mysqli_fetch_array($data)){
                $eid=$row['Exam_Id'];
                $ename=$row['Exam_Name'];
                $cid=$row['Course_Id'];
                $sel="SELECT * from course where Course_Id=$cid";
                $data2=mysqli_query($dbcon,$sel);
                $row2=mysqli_fetch_array($data2);
                $cname=$row2['Course_Name'];
                echo '<tr><td>'.$c++.'</td><td>'.$ename.'</td><td>'.$cname.'</td><td style="width:160px;"><form action="Scripts/update.php?q=deleteexam&eid='.$eid.'" method="post" id="deleteexamform'.$eid.'"><button value="'.$eid.'" name="examidform'.$eid.'" id="examidform'.$eid.'" class="btn btn-danger" onclick="deleteexambyteacher('.$eid.')">
                <input type="hidden" name="examid'.$eid.'" value="'.$eid.'"><span class="bi bi-trash p-2"><b>  Delete</b></span></button></form></td></tr>';
                //Here i can implement a mechanism by which submit form from javascript.remove href from form and give onclick on button and when button clciks javscript function calls and the inside there it submit form using form.submit() without using ajax and the javascript function
                //is called to confirm to delete the exam and if yes then javascript submit form\
                //we can remove onclick here 

                //If there is any error while deleting, delete the above hidden input ,remove onclick from button,rename the above button as examid

                //<td><form action="Scripts/update.php?q=deleteexam" method="post"><button value="$eid"><span class="btn btn-danger bi bi-trash"><b>  Delete</b></span></button></form></td>By using this the page refreshes when deleted so we cant show deleted in that exam
                //<td><b><abbr title = "Detete Exam" ><span class="btn btn-danger bi bi-trash" onclick="deleteexam('.$eid.')"><b>  Delete</b></span></b></abbr></td>  This will not Refresh Browser After Deleting .Instead it shows Deleted in The last Column of that row
              }
            ?>

        </table>
            </div>
          </div>
        </div>
        <?php
        }
      ?>
    </div>
  </div>
</div>
</div><!--main container-fluid div-->
<script src="bootstrap5/js/bootstrap.bundle.min.js"></script>
<!--<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>-->
</body>
</html>