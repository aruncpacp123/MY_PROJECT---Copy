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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
    <link rel="stylesheet" href="CSS/main.css" type="text/css">
    <?php 
        if(@$_GET['w']){
            echo'<script>alert("'.@$_GET['w'].'");</script>';
        }
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
        <li class="nav-item bg-light me-2">
          <a class="nav-link" href="Teacher_Home.php?q=3">Results</a>
        </li>
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
        echo  '<div class="mt-5"><div class="table-responsive"><table class=" table table-striped">
        <tr><td><b>S.N.</b></td><td><b>Topic</b></td><td><b>Total question</b></td><td><b>Marks</b></td><td><b>Time limit</b></td><td></td></tr>';
        $c=1;
        if(mysqli_num_rows($result)>0){
          while($row = mysqli_fetch_array($result)) {
	          $title = $row['Exam_Name'];
	          $total = 5;
	          $sahi =2;
            $time = $row['Duration'];
	          $eid = $row['Exam_Id'];
            //$q12=mysqli_query($con,"SELECT score FROM history WHERE eid='$eid' AND email='$email'" )or die('Error98');
            //$rowcount=mysqli_num_rows($q12);	
            if(true){
	            echo '<tr><td>'.$c++.'</td><td>'.$title.'</td><td>'.$total.'</td><td>'.$sahi*$total.'</td><td>'.$time.'&nbsp;min</td>
	            <td><b><a href="account.php?q=quiz&step=2&eid='.$eid.'&n=1&t='.$total.'" class="pull-right btn sub1" style="margin:0px;background:#99cc32"><span class="glyphicon glyphicon-new-window" aria-hidden="true"></span>&nbsp;<span class="title1"><b>Start</b></span></a></b></td></tr>';
            } 
            else
            {
              echo '<tr style="color:#99cc32"><td>'.$c++.'</td><td>'.$title.'&nbsp;<span title="This quiz is already solve by you" class="glyphicon glyphicon-ok" aria-hidden="true"></span></td><td>'.$total.'</td><td>'.$sahi*$total.'</td><td>'.$time.'&nbsp;min</td>
	            <td><b><a href="update.php?q=quizre&step=25&eid='.$eid.'&n=1&t='.$total.'" class="pull-right btn sub1" style="margin:0px;background:red"><span class="glyphicon glyphicon-repeat" aria-hidden="true"></span>&nbsp;<span class="title1"><b>Restart</b></span></a></b></td></tr>';
            }
          }
          $c=0;
        }
        else{
          echo '<tr class="text-center p-3"><td colspan=5><h5>YOU HAVE NO EXAMS TO DISPLAY</h5></td></tr>';
        }
        echo '</table></div></div>';
      }
      ?>
      <!--add quiz start-->
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
                      <input class="form-check-input mt-0 btn-outline-success" type="checkbox" value="1" name="quiz" style="padding:8px;" checked>
                    </div>
                    <span class="input-group-text col-md-4 btn btn-outline-secondary">Quiz</span>
                    <div class="input-group-text" style="margin-left:17px;">
                      <input class="form-check-input mt-0 btn-outline-success" type="checkbox" value="1" name="sub" style="padding:8px;">
                    </div>
                    <span class="input-group-text col-md-4 btn btn-outline-secondary">Subjective</span>
                  </div>
                </div>
                <div class="mb-3 col-md-6">
                    <input type="submit" class="form-control btn btn-outline-success " style="margin-left:185px;" id="examname" value="NEXT">
                </div>
              </fieldset>
            </form>
          </div>
        </div>
      <?php
      }
      ?>
      <?php
      if(@$_GET['q']==1 && (@$_GET['step'])==2 ) {
      ?>
        <div class="row mt-3">
          <?php if(@$_GET['qui']==1 && (@$_GET['sub'])==1){?>
          <div class="col-md-6">
          <span class="title1 text-center" style="margin-left: 200px;"><b>Enter Quiz Details</b></span><br/><br/>
            <?php }?>
          <?php if(@$_GET['qui']==1 && (@$_GET['sub'])==0){?>
            <span class="title1 text-center"><b>Enter Quiz Details</b></span><br/><br/>
            <div class="col-md-3"></div><div class="col-md-6"><?php }?>
            <?php
            echo '<form class="form-horizontal" name="examform" action="update.php?q=addquiz&eid='.@$_GET['eid'].'method="POST">';
            ?>
              <fieldset>
                <div class="form-floating mb-3">
                  <input type="text" class="form-control" id="examname" name="examname" placeholder="name">
                  <label for="examname" >Name of the Exam</label>
                </div>
                <div class="form-floating mb-3">
                  <select class="form-select" id="floatingSelect" name="coursename" >
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
                  <input type="text" class="form-control" name="examduration" placeholder="name">
                  <span class="input-group-text col-auto">Minutes</span>
                  <label >Duration Of Exam</label>
                </div>
                <div class="row">
                  <div class=" form-floating mb-3 col-md-6">
                    <input type="date" class="form-control"  name="examdate">
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
                      <input class="form-check-input mt-0" type="checkbox" value="1" name="quiz" style="padding:8px;">
                    </div>
                    <span class="input-group-text col-md-4">Quiz</span>
                    <div class="input-group-text" style="margin-left:17px;">
                      <input class="form-check-input mt-0" type="checkbox" value="1" name="sub" style="padding:8px;">
                    </div>
                    <span class="input-group-text col-md-4">Subjective</span>
                  </div>
                </div>
                <?php if(@$_GET['qui']==1 && (@$_GET['sub'])==0){?>
                <div class="mb-3 col-md-6">
                    <input type="submit" class="form-control btn btn-outline-success " style="margin-left:185px;" id="examname" value="NEXT">
                </div>
                <?php }?>
              </fieldset>
          </div>
          <?php if(@$_GET['qui']==1 && (@$_GET['sub'])==1){?>
          <div class="col-md-6">
          <span class="title1 text-center" style="margin-left: 200px;"><b>Enter Subjective Details</b></span><br/><br/>
              <fieldset>
                <div class="form-floating mb-3">
                  <input type="text" class="form-control" id="examname" name="examname" placeholder="name">
                  <label for="examname" >Name of the Exam</label>
                </div>
                <div class="form-floating mb-3">
                  <select class="form-select" id="floatingSelect" name="coursename" >
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
                  <input type="text" class="form-control" name="examduration" placeholder="name">
                  <span class="input-group-text col-auto">Minutes</span>
                  <label >Duration Of Exam</label>
                </div>
                <div class="row">
                  <div class=" form-floating mb-3 col-md-6">
                    <input type="date" class="form-control"  name="examdate">
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
                      <input class="form-check-input mt-0" type="checkbox" value="1" name="quiz" style="padding:8px;">
                    </div>
                    <span class="input-group-text col-md-4">Quiz</span>
                    <div class="input-group-text" style="margin-left:17px;">
                      <input class="form-check-input mt-0" type="checkbox" value="1" name="sub" style="padding:8px;">
                    </div>
                    <span class="input-group-text col-md-4">Subjective</span>
                  </div>
                </div>
                <!--
                <div class="mb-3 col-md-6">
                    <input type="submit" class="form-control btn btn-outline-success " style="margin-left:185px;" id="examname" value="NEXT">
                </div>
                -->
              </fieldset>
            </form>
          </div>
          <div class="mb-3 col-md-6">
            <input type="submit" class="form-control btn btn-outline-success " style="margin-left:365px;" id="examname" value="NEXT">
          </div>
        <?php }?>       
        </div>
        
      <?php
      }
      ?>
    </div>
  </div>
</div>
</div><!--main container-fluid div-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>