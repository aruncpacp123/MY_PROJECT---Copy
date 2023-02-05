<?php 
include("Scripts/connection.php");
include_once("Scripts/session.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Home</title>
    <!--<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">-->
    <link href="bootstrap5/css/bootstrap.min.css" rel="stylesheet">
    <!--<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">-->
    <link href="font/bootstrap-icons.css" rel="stylesheet">
    <link href="bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="CSS/main.css" type="text/css">
    <?php 
        if(@$_GET['w']){
          echo'<script>alert("'.@$_GET['w'].'");</script>';
          //echo '<div class="alert alert-warning alert-dismissible fade show" role="alert"><strong>'.@$_GET['w'].'</strong><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
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
  td.newhide *{
    visibility: hidden;
  }
  
}
    </style>
    <script>

      function setCookie(cname,cvalue,exdays) {
        const d = new Date();
        d.setTime(d.getTime() + (exdays*24*60*60*1000));
        let expires = "expires=" + d.toUTCString();
        document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
      }

      function getCookie(cname) {
        let name = cname + "=";
        let decodedCookie = decodeURIComponent(document.cookie);
        let ca = decodedCookie.split(';');
        for(let i = 0; i < ca.length; i++) {
          let c = ca[i];
          while (c.charAt(0) == ' ') {
            c = c.substring(1);
          }
          if (c.indexOf(name) == 0) {
            return c.substring(name.length, c.length);
          }
        }
        return "";
      }

      function studremove(str) {
        $c=confirm("Are you sure to Delete this Student?");//use var c;
        if(!$c)
          return;
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) {
            document.getElementById("txtHint"+str).innerHTML = this.responseText;
          }
        };
        xmlhttp.open("GET","Scripts/adminscript.php?q=deletestudent&id="+str,true);
        xmlhttp.send();
      }

      function courseremove(str) {
        var data="WARNING!!!\n Are you Sure?\n This will delete all the students who choose this course from database\n And Exams Under This Course";
        var c=confirm(data);
        if(!c)
          return;
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) {
            document.getElementById("txtHint16"+str).innerHTML = this.responseText;
          }
        };
        xmlhttp.open("GET","Scripts/adminscript.php?q=deletecourse&id="+str,true);
        xmlhttp.send();
      }

      function teacherremove(str,n) {
          if(n>0){
            alert("This Teacher Controls "+n+" exam\n Change or delete its ownership to delete teacher");
            return;
          }
          $c=confirm("Are you sure to Delete this Teacher?");
          if(!$c)
            return;

          var xmlhttp = new XMLHttpRequest();
          xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
              document.getElementById("txtHint3"+str).innerHTML = this.responseText;
            }
          };
          xmlhttp.open("GET","Scripts/adminscript.php?q=deleteteacher&id="+str,true);
          xmlhttp.send();
      }

      function changeteach(str) {
          let id=getCookie("teacheridchanged");
          var data="WARNING!!!\n Are you Sure?\n This will change the controller of exam ";
          var c=confirm(data);       
          if(!c)
            return;
          var xmlhttp = new XMLHttpRequest();
          xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
              //document.getElementById("txtHint9"+str).innerHTML = this.responseText;
              location.reload();
            }
          };
          xmlhttp.open("GET","Scripts/adminscript.php?q=changeteacher&id="+str+"&tid="+id,true);
          xmlhttp.send();
      }

      function changes(str){
          document.getElementById("teachid").value=str;
          setCookie("teacheridchanged",str, 30);
          let c=getCookie("teacheridchanged");
      }

      function changesdep(str,id){   
          setCookie("departmentidchanged",str, 30);
          setCookie("teacheridchangedofcourse",0, 30);
          let c=getCookie("departmentidchanged");
          var xmlhttp = new XMLHttpRequest();
          xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
              document.getElementById("txtHint28"+id).innerHTML = this.responseText;           
            }
          };
          xmlhttp.open("GET","Scripts/adminscript.php?q=viewteachers&id="+str,true);
          xmlhttp.send();
      }

      function changedepartment(str) {
          let id=getCookie("departmentidchanged");
          let id2=getCookie("teacheridchangedofcourse");
          //let id3=getCookie("teacheridchangeddeleteexam");
          var checkBox = document.getElementById("examdeletecheck"+str);
          if (checkBox.checked == true){
            var id3=1;
          }
          else{
            var id3=0;
          }
          var data="WARNING!!!\n Are you Sure?\n This will move this course to another department ";
          var c=confirm(data);
          //alert(str);//Which Course to change
          //alert(id);//to which department
          //alert(id2);//to which teacher
          //alert(id3);//whether to delete exam or not
          if(!c)
            return;
          var xmlhttp = new XMLHttpRequest();
          xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
              //document.getElementById("txtHint15"+str).innerHTML = this.responseText;
              location.reload();
            }
          };
          xmlhttp.open("GET","Scripts/adminscript.php?q=changedepartment&id="+str+"&did="+id+"&tid="+id2+"&eid="+id3,true);
          xmlhttp.send();
      }
      /*
      function changedepdeleteexam(str){
        var checkBox = document.getElementById("examdeletecheck"+str);
        if (checkBox.checked == true){
           setCookie("teacheridchangeddeleteexam",1, 30);
          //if we declare javascriot variables inside javascript if then use var variable name otherwise we can use directly $variablename
          //I can call javascipt function inside php and viceversa
        }
        else{
        setCookie("teacheridchangeddeleteexam",0, 30);No need of this function becuause there is no need to set this cookie variable 
        instead we check whether the checkbox is checked in just above function
        }The below function is used only for setting cache so you have a thought that we can directly write thebelow functions code in the function we use that cookie
        but problem is both are different .one function is called when the select box value changes and set that slected value in cookie and second is to call when
        button is pressed
      }
      */
      function changesteacher(str){
        document.getElementById("inp12").value=str;
        setCookie("teacheridchangedofcourse",str, 30);
        let c=getCookie("teacheridchangedofcourse");
      }
        
      function changesdepteach(str){ 
          document.getElementById("departid2").value=str;
          setCookie("departmentidchangedteach",str, 30);
          let c=getCookie("departmentidchangedteach");
      }

      function changedepartmentteach(str) {
        let id=getCookie("departmentidchangedteach");
        var data="WARNING!!!\n Are you Sure?\n This will move this this to another department and \n Delete all exams created by this Teacher\n To Avoid That press cancel and change controller of exams";
        var c=confirm(data);
        if(!c)
          return;
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) {
            //document.getElementById("txtHint15"+str).innerHTML = this.responseText;
            location.reload();
          }
        };
        xmlhttp.open("GET","Scripts/adminscript.php?q=changedepartmentteach&id="+str+"&did="+id,true);
        xmlhttp.send();
      }
      
      function deleteexam(str) {
        var data="WARNING!!!\n Are you Sure?\n This will delete this exam from all students";
        var c=confirm(data);
        if(!c)
          return;
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) {
            document.getElementById("txtHint8"+str).innerHTML = this.responseText;
          }
        };
        xmlhttp.open("GET","Scripts/adminscript.php?q=deleteexam&id="+str,true);
        xmlhttp.send();
      }

      function departmentremove(str){
        var data="WARNING!!!\n Are you Sure?\n This will delete all students,teachers,courses and exams under this department\nTO Avoid that Move Courses and Teachers to Another Department";
        var c=confirm(data);
        if(!c)
          return;
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) {
            document.getElementById("txtHint29"+str).innerHTML = this.responseText;
          }
        };
        xmlhttp.open("GET","Scripts/adminscript.php?q=removedepartment&id="+str,true);
        xmlhttp.send();
      }

      function adddepartment(){
        const form = document.getElementById('createdepartment');
        form.addEventListener('submit', (event) => {
          event.preventDefault();//TO stop submitting
          //form.submit();To submit form
          const name = form.elements['DepartName'];
          let dname = name.value;
          var xmlhttp = new XMLHttpRequest();
          xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
              document.getElementById("departmentinner").innerHTML = this.responseText;
              //location.reload();
              setTimeout(function(){//This function reload page after 2 secs

                window.location.reload();
                  }, 2000);
            }
          };
          xmlhttp.open("GET","Scripts/adminscript.php?q=adddepartment&id="+dname,true);
          xmlhttp.send();
        });
      }
      function content(str) {

if (str == "") {
  //var data="<input type='text id='inp9' placeholder='Enter Department Id..' name='teachdid'></input>";
  //document.getElementById("txtHint").innerHTML = data;
  return;
} else {
  var xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("section-to-print").innerHTML = this.responseText;
    }
  };
  xmlhttp.open("GET","getcontent.php?q="+str,true);
  xmlhttp.send();
  
}
    </script>
</head>
<body>
<div class="container-fluid"><!--main container-fluid div-->
  <div class="header mt-2 mb-2">
    <div class="row" >
        <div class="col-lg-6">
            <span class="logo">Online Examination System</span>
        </div>
        <?php if(isset($_SESSION['role'])){ ?>
        <div class="col-lg-6">
            <?php
                $name=$_SESSION['name'];
            ?>
            
            <span class="rightfull "><span class="bi bi-person-fill"></span>&nbsp;&nbsp;Hello  <?=$name?> &nbsp;&nbsp;|<i class="fa-sharp fa-solid fa-check"></i></span>
        </div>
        <?php } ?>
    </div>
  </div>

<!--Navbar Start In System Admin Navbar ,when press navbar amd icon then it go to phpmyadmin /For that make href="/" or "\" 
AND to go to index.php through href just use href="."
when # is used then it go to that section with that id eg:#main it go to section with id main in the same page.to go to id of another page give it link also like
href="hello.php#main"
use href="*" nd you see you have no permission to access this and it shoes forbidden  <  and > also shows forbidden no permission
href="&"$ % this all shows object not found
use ^ shows the foledername/%5E in address bar and shows not found eg:localhost/MY_PROJECT/%5E and it is the page index.php which shows with localhost/MY_PROJECT/ but since theres is /%5E browser shows not found localhost/MY_PROJECT/ is home directory or the directory which we stay so a file is always search in this location if i don't specify folder names but i specify only file name 
that is a file is search in the folder which we stay now if we give only filename without the path of folder to file.so if that file not in current links folder then shows object not found
use % and shows bad request .browser dowsn't know what it is
href="?" just refresh page like href=""
give command that hack browser in href like cd flushdns
href="/ok" means it search file ok in root drectory that is in localhost/ok / means root  when we just give href="/" it go to root directory when we give just href="/ok" it go to root directory and go to file ok
href="../" means move to one folder back from current
if we want to move to a file which need to move back to so many folders that is if file is located in the current folders ancestor folder that is maybe grand parent folder 
first move to root directory to / and specify each folder like href="/home/bin/My_pro_ad/ad.php?q=hi&n=why#section"
href="../" take me to home page of localhost ie,welcome to xampp so it ma be go oto root
href="." list curren directory files but if there is index.php in that directory it loads it
href="/" take me to home page of localhost ie,welcome to xampp so it ma be go oto root
href="../" take me to home page of localhost ie,welcome to xampp so it ma be go oto root
that is it interpret href="../" as single and execute /
href="../<h2>hi</h2>"
make href of amd icon to . / \ # $ % @ ! * 


Add semester to student and exam add a coulumn to student table to know whetehr the profile is accepted by admin ie,admin permit to enter to institution
//Add a column or an object with every examid so that to specify whether the exam is currently available.Teacher can specify whether the exam an submit answers
and that coulumn in exam table teacher can change it to 1 or 0 if it is 1 the student can attend that exam even if date is ove r.So we have to check a system automatically change 1 to 0 
when its date is over that is when taken the home page before loading the header we should run javascript file to check whether the data is less than current date /if so make it to 0
like the website i download shows countdown it shows remainging days even correctly everytime i open it.ie,it is always running
--> 



<?php 
if(isset($_SESSION['role']))
{
  ?>
<nav class="navbar navbar-expand-lg navbar-light" style="background-color: #e3f2fd;position:sticky;z-index:3;">
  <div class="container-fluid ">
    <a class="navbar-brand mx-2" href="#"><i class="bi bi-amd"></i></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item mx-2 bg-light">
          <a class="nav-link active" aria-current="page" href="Admin_Home.php?q=0">Home</a>
        </li>
        <!--
        <li class="nav-item dropdown bg-light me-2">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Exam
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="Admin_Home.php?q=1">Create(public)</a></li>
            <li><a class="dropdown-item" href="Admin_Home.php?q=2">Delete</a></li>
          </ul>
        </li>
          -->
          <li class="nav-item mx-2 bg-light">
          <a class="nav-link active" aria-current="page" href="Admin_Home.php?q=1">History</a>
        </li>
        <!--
        <li class="nav-item dropdown bg-light me-2">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Students
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="Admin_Home.php?q=3">Add</a></li>
            <li><a class="dropdown-item" href="Admin_Home.php?q=4">Manage</a></li>
          </ul>
        </li>
        -->
        <li class="nav-item mx-2 bg-light">
          <a class="nav-link active" aria-current="page" href="Admin_Home.php?q=3">Students</a>
        </li>
        <!--
        <li class="nav-item dropdown bg-light me-2">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Teachers
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="Admin_Home.php?q=5">Add</a></li>
            <li><a class="dropdown-item" href="Admin_Home.php?q=6">Manage</a></li>
          </ul>
        </li>
        -->
        <li class="nav-item mx-2 bg-light">
          <a class="nav-link active" aria-current="page" href="Admin_Home.php?q=5">Teacher</a>
        </li>
        <li class="nav-item dropdown bg-light me-2">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Department
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#exampleModal3">Add</a></li><!--href="Admin_Home.php?q=7"-->
            <li><a class="dropdown-item" href="Admin_Home.php?q=8">Manage</a></li>
          </ul>
        </li>
        <li class="nav-item dropdown bg-light me-2">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Courses
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#exampleModal4">Add</a></li><!--href="Admin_Home.php?q=9"-->
            <li><a class="dropdown-item" href="Admin_Home.php?q=10">Manage</a></li>
          </ul>
        </li>
        <!--
        <li class="nav-item dropdown bg-light me-2">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Approve
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="Admin_Home.php?q=11">Students</a></li>
            <li><a class="dropdown-item" href="Admin_Home.php?q=12">Teachers</a></li>
          </ul>
        </li>
        -->
        <li class="nav-item bg-light btn btn-outline-secondary mx-2 me-2 mb-0 p-0" >
          <a class="nav-link" href="Admin_Home.php?q=15">Profile</a>
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
$uid=$_SESSION['id'];
$did=$_SESSION['department'];
?>

<div class="container-fluid">
  <div class="row mt-5">
    <div class="col-md-12">
      <?php if(@$_GET['q']==0) {
        echo '<h5 style="color:green;">Upcoming and Ongoing Exams</h5>';
        $sql="select * from exam where Institution_Id='$iid' and Date >='".Date('y.m.d')."'";//and Date>='date(y,m,d)'
        $result = mysqli_query($dbcon,$sql) or die('Error');
        echo  '<div class="mt-4"><div class="table-responsive "><table class=" table table-bordered table striped bg-light" border=3>
        <tr style="text-align:center;"><th><b>S.N.</b></th><th><b>Topic</b></th><th><b>Department</b></th><th><b>Course</b></th><th><b>Teacher</b></th><th><b>Date</b></th></tr>';
        $c=1;
        if(mysqli_num_rows($result)>0){
          while($row = mysqli_fetch_array($result)) {
	          $title = $row['Exam_Name'];
	          $eid = $row['Exam_Id'];
            $cid=$row['Course_Id'];
            $tid=$row['Teacher_Id'];
            $date=$row['Date'];
            $sql2="select * from course where Course_Id='$cid'";
            $result2 = mysqli_query($dbcon,$sql2) or die('Error');
            $row2 = mysqli_fetch_array($result2);
            $cname=$row2['Course_Name'];
            $did=$row2['Department_Id'];
            $sql3="select * from user where User_Id='$tid'";
            $result3 = mysqli_query($dbcon,$sql3) or die('Error');
            if(mysqli_num_rows($result3)>0){
              $row3 = mysqli_fetch_array($result3);
              $tname=$row3['User_Name'];
            }
            else{
              $tname="Not Controlled";
            }
            $sql4="select * from department where Department_Id='$did' and Institution_Id=".$_SESSION['institution']."";
            $result4 = mysqli_query($dbcon,$sql4) or die('Error');
            $row4 = mysqli_fetch_array($result4);
            $dname=$row4['Department_Name'];
            /*
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
              $mark=$qmark+$smark;*/
            //$q12=mysqli_query($con,"SELECT score FROM history WHERE eid='$eid' AND email='$email'" )or die('Error98');
            //$rowcount=mysqli_num_rows($q12);	
            //<span class="btn btn-success btn-outline-info" onclick="changeteach('.$eid.')"><b>Change</b></span>
	            echo '<tr style="text-align:center;"><td>'.$c++.'</td><td>'.$title.'</td><td>'.$dname.'</td><td>'.$cname.'</td><td id="txtHint9'.$eid.'">'.$tname.'</td><td>'.$date.'&nbsp;</td>
	            <td style="width: 218px; !important;" id="txtHint8'.$eid.'"><b><abbr title = "Change Teacher"><button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal'.$eid.'">Change</button></b></abbr>&nbsp;&nbsp;&nbsp;&nbsp;
              <b><abbr title = "Detete Exam" ><span class="btn btn-danger bi bi-trash" onclick="deleteexam('.$eid.')"><b>  Delete</b></span></b></abbr></td></tr>';
              //<!-- Modal -->
              echo '<div class="modal fade" id="exampleModal'.$eid.'" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">';?>
                <div class="modal-dialog modal-dialog-centered">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Change Teacher</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <div class="form-floating mb-3">
                        <select class="form-select" id="floatingSelect" name="teachername" required  onchange="changes(this.value)" id="teachername">
                        <?php
                          $sel10="select * from user where Department_Id=$did and User_Id!=$tid";
                          $data10=mysqli_query($dbcon,$sel10);
                          if(mysqli_num_rows($data10)>0){
                            echo "<option value='0'>Select One</option>";
                            while($row10=mysqli_fetch_array($data10)){                          
                              echo "<option value=".$row10['User_Id'].">".$row10['User_Name']."</option>";
                            }
                          }
                          echo "<option value='0'>NULL</option>";
                        ?>
                        </select>
                        <input type="hidden" id="teachid" name="teachid">
                        <label for="floatingSelect">Select Teacher Name</label>
                      </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                      <?php
                      echo '<button type="button" class="btn btn-primary" onclick="changeteach('.$eid.')">Save changes</button>';
                      //here i update teacher using ajax call and sent teacher id to function using cookie so there is no reload
                      //or i can give the modal box in a form and submit it using post and action=Scripts/adminscript.php so in that script make 
                      //header location to home page so it refreshes
                      //if you choose null that is value 0 then no teacher have control over it but the result of that will still access to students 
                      //if you delete exam then the tacher and student and even admin cant see it and control it it will delete from database


                      //in student home page make the changes that only the upcoming exam will show all other attended and not attended within date exam will be in history
                      //and also move the exam which is date over to history even he dont attend it by setting mark=-1 in exam result and shows you dont attend it


                      //make the view student page of this page to first ony course name is shown when we press it students under that course will display
                      ?>
                    </div>
                  </div>
                </div>
              </div>
              <?php
            
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
      <?php
      if(@$_GET['q']==1){
        //displaying history-----------------------------------------------------------

        echo '<h5 style="color:green;">Completed Exams</h5>';
        $sql="select * from exam where Institution_Id='$iid' and Date <'".Date('y.m.d')."'";//and Date>='date(y,m,d)'
        $result = mysqli_query($dbcon,$sql) or die('Error');
        echo  '<div class="mt-4"><div class="table-responsive "><table class=" table table-bordered table striped bg-light" border=3>
        <tr style="text-align:center;"><th><b>S.N.</b></th><th><b>Topic</b></th><th><b>Department</b></th><th><b>Course</b></th><th><b>Teacher</b></th><th><b>Date</b></th></tr>';
        $c=1;
        if(mysqli_num_rows($result)>0){
          while($row = mysqli_fetch_array($result)) {
	          $title = $row['Exam_Name'];
	          $eid = $row['Exam_Id'];
            $cid=$row['Course_Id'];
            $tid=$row['Teacher_Id'];
            $date=$row['Date'];
            $sql2="select * from course where Course_Id='$cid'";
            $result2 = mysqli_query($dbcon,$sql2) or die('Error');
            $row2 = mysqli_fetch_array($result2);
            $cname=$row2['Course_Name'];
            $did=$row2['Department_Id'];
            $sql3="select * from user where User_Id='$tid'";
            $result3 = mysqli_query($dbcon,$sql3) or die('Error');
            if(mysqli_num_rows($result3)>0){
              $row3 = mysqli_fetch_array($result3);
              $tname=$row3['User_Name'];
            }
            else{
              $tname="Not Controlled";
            }
            $sql4="select * from department where Department_Id='$did' and Institution_Id=".$_SESSION['institution']."";
            $result4 = mysqli_query($dbcon,$sql4) or die('Error');
            $row4 = mysqli_fetch_array($result4);
            $dname=$row4['Department_Name'];
	            echo '<tr style="text-align:center;"><td>'.$c++.'</td><td>'.$title.'</td><td>'.$dname.'</td><td>'.$cname.'</td><td id="txtHint9'.$eid.'">'.$tname.'</td><td>'.$date.'&nbsp;</td>
	            <td style="width: 218px; !important;" id="txtHint8'.$eid.'"><b><abbr title = "Change Teacher"><button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal'.$eid.'">Change</button></b></abbr>&nbsp;&nbsp;&nbsp;&nbsp;
              <b><abbr title = "Detete Exam" ><span class="btn btn-danger bi bi-trash" onclick="deleteexam('.$eid.')"><b>  Delete</b></span></b></abbr></td></tr>';
              //<!-- Modal -->
              echo '<div class="modal fade" id="exampleModal'.$eid.'" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">';?>
                <div class="modal-dialog modal-dialog-centered">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Change Teacher</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <div class="form-floating mb-3">
                        <select class="form-select" id="floatingSelect" name="teachername" required  onchange="changes(this.value)" id="teachername">
                        <?php
                          $sel10="select * from user where Department_Id=$did and User_Id!=$tid";
                          $data10=mysqli_query($dbcon,$sel10);
                          if(mysqli_num_rows($data10)>0){
                            echo "<option value='0'>Select One</option>";
                            while($row10=mysqli_fetch_array($data10)){                          
                              echo "<option value=".$row10['User_Id'].">".$row10['User_Name']."</option>";
                            }
                          }
                          echo "<option value='0'>NULL</option>";
                        ?>
                        </select>
                        <input type="hidden" id="teachid" name="teachid">
                        <label for="floatingSelect">Select Teacher Name</label>
                      </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                      <?php
                      echo '<button type="button" class="btn btn-primary" onclick="changeteach('.$eid.')">Save changes</button>';
                      ?>
                    </div>
                  </div>
                </div>
              </div>
              <?php
          }
          $c=0;
        }
        else{
          echo '<tr class="text-center p-3"><td colspan=5><h5>YOU HAVE NO EXAMS TO DISPLAY</h5></td></tr>';
        }
        echo '</table></div></div>';
        //-----------------------------------------------------------------------------------
      }

      ?>
      <?php
      if(@$_GET['q']==15) {
      ?>
        
        <div class="row pt-3 pb-5"  style="background: #1a2980;background: -webkit-linear-gradient(to right, #1a2980, #26d0ce);background: linear-gradient(to right, #1a2980, #26d0ce);">
          <div class="col-md-12 text-center">
              <div style="width:20%;background-color:#0F3D3E;opacity:0.9;margin:auto;padding:5px;border-radius:30px;"><h2>User Profile</h2></div>
          </div>
        </div>
        <?php
          $sql="select * from user where User_Id=".$_SESSION['id'];
          $data=mysqli_query($dbcon,$sql);
          $row=mysqli_fetch_array($data);
          $sql="select * from department where Department_Id=".$row['Department_Id']." and Institution_Id=".$_SESSION['institution']."";
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
              <!--
              <div class="card-header bg-success">
                <button>Edit</button>
                <button>Back</button>
              </div>
              -->
            </div>
          </div>
        </div>
      <?php 
      }?>
      <!--Not calling-->
      <?php
        if(@$_GET['q']==7) {
      ?>
        <div class="row">
            <div class="col-lg-12">
                <?php 
                    include("AddDepartment.php");
                ?>
            </div>
        </div>
      <?php
        }
      ?>
      <!--end-->
      <!-- For Adding Department using modal and department id not entered by admin-->
      <div class="modal fade" id="exampleModal3" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog ">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Add Department</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="" method="post" id="createdepartment">
            <div class="modal-body" id="departmentinner">
              <div class="form-floating mb-3">
                <input type="text" class="form-control" id="floatingInput" placeholder="department" name="DepartName" id="DepartName">
                <label for="floatingInput"> Enter Department Name</label>
              </div>
            </div>
            <div class="modal-footer">
              <input type="submit" class="btn btn-primary" value="ADD" onclick="adddepartment()">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <!--Here i can directy submit form using href without pass it to javascript function but page refresh -->
            </div>
            </form>
          </div>
        </div>
      </div>
      <?php
        if(@$_GET['q']==8) {
      ?>
      <div class="container">
        <div class="row mt-5">
            <div class="col-lg-12">
                <?php 
                    $iid=$_SESSION['institution'];
                    $sel="select * from department where Institution_Id=$iid and Department_Id NOT IN(SELECT Department_Id from department where Institution_Id=$iid and Department_Name='office')";
                    //$sel="select * from department where Institution_Id=$iid and Department_Name='office'";here we are feteching two query from same table so can join it together like this /if we are writhing not in another table then above query can be executed
                    $data=mysqli_query($dbcon,$sel);
                    $c=1;
                    echo '<table class=" table table-striped table-bordered"><tr><td>SNO</td><td>Department Name</td><td>No.of Courses</td><td></td></tr>';
                    if(mysqli_num_rows($data)>0){
                        while($row=mysqli_fetch_array($data)){
                            $sql="select * from course where Department_Id=".$row['Department_Id']." and Institution_Id=".$_SESSION['institution']."";
                            $data2=mysqli_query($dbcon,$sql);
                            $cou=0;
                            while($row2=mysqli_fetch_array($data2)){
                              $cou++;
                            }
                            echo '<tr><td>'.$c++.'</td><td>'.$row['Department_Name'].'</td><td>'.$cou.'</td><td id="txtHint29'.$row['Department_Id'].'" style="min-width:130px;text-align:center"><i class="bi bi-trash btn btn-outline-danger p-1" onclick="departmentremove('.$row['Department_Id'].')">   Delete</i></td></tr>';
                
                        }
                    }
                    echo '</table>';
                ?>
            </div>
        </div>
      </div>
      <?php
        }
      ?>
      <!--Don't display-->
      <?php
        if(@$_GET['q']==9) {
      ?>
        <div class="row">
            <div class="col-lg-12">
                <?php 
                    include("AddCourse.php");
                ?>
            </div>
        </div>
      <?php
        }
      ?>
      <!--end-->
      <div class="modal fade" id="exampleModal4" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog ">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Add Course</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="Scripts/adminscript.php?q=addcourse" method="post" id="createcourse">
            <div class="modal-body" id="courseinner">
              <div class="form-floating mb-3">
                <input type="text" class="form-control" id="floatingInput" placeholder="department" name="CourseName" id="CourseName">
                <label for="floatingInput"> Enter Course Name</label>
              </div>
              <div class="form-floating mb-3">
                <select class="form-select" id="floatingSelect" name="Departid" id="Departid">
                  <?php
                    $sql="SELECT * from department where Institution_Id=".$_SESSION['institution']." and Department_Name!='office'";
                    $data=mysqli_query($dbcon,$sql);
                    echo '<option value="" disabled selected>SELECT ONE</option>';
                    while($row=mysqli_fetch_array($data)){
                      echo '<option value="'.$row['Department_Id'].'">'.$row['Department_Name'].'</option>';
                    }
                  ?>
                </select>
                <label for="floatingSelect">Select Department</label>
              </div>
              <div class="form-floating mb-3">
                <input type="number" class="form-control" id="floatingInput" placeholder="department" name="CourseSem" id="CourseSem">
                <label for="floatingInput"> Enter Number of Semesters</label>
              </div>
            </div>
            <div class="modal-footer">
              <input type="submit" class="btn btn-primary" value="ADD">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <!--Here i can directy submit form using href without pass it to javascript function but page refresh -->
              <!--Or i can sent it to javascript function and submit the form from there usinf form .submit() and return here by refreshing-->
            </div>
            </form>
          </div>
        </div>
      </div>


      <?php
        if(@$_GET['q']==10) {
      ?>
      <div class="container">
        <div class="row mt-4">
            <div class="col-lg-12">
                <?php 
                    $iid=$_SESSION['institution'];
                    $sel="select * from department where Institution_Id=$iid and Department_Id NOT IN(SELECT Department_Id from department where Institution_Id=$iid and Department_Name='office')";
                    $data=mysqli_query($dbcon,$sel);
                    $c=1;
                    echo '<table class=" table table-striped table-bordered border=2"><tr><td>SNO</td><td>Course Name</td><td>Department Name</td><td></td></tr>';
                    if(mysqli_num_rows($data)>0){
                        while($row=mysqli_fetch_array($data)){
                            $did=$row['Department_Id'];
                            $sel2="select * from course where Institution_Id=$iid and Department_Id=$did and Department_Id NOT IN(SELECT Department_Id from department where Institution_Id=$iid and Department_Name='office')";
                            $data2=mysqli_query($dbcon,$sel2);
                            while($row2=mysqli_fetch_array($data2)){
                                echo '<tr><td>'.$c++.'</td><td>'.$row2['Course_Name'].'</td>
                                <td id="txtHint15'.$row2['Course_Id'].'">'.$row['Department_Name'].'</td>
                                <td id="txtHint16'.$row2['Course_Id'].'" style="min-width:130px;text-align:center"><b><abbr title = "Move to Another Department"><button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal'.$row2['Course_Id'].'">Move</button></abbr></b>&nbsp;&nbsp;&nbsp;&nbsp;
                                <i class="bi bi-trash btn btn-outline-danger p-1" onclick="courseremove('.$row2['Course_Id'].')">   Delete</i></td></tr>';

                                echo '<div class="modal fade" id="exampleModal'.$row2['Course_Id'].'" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">';?>
                                  <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Change Department</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                      </div>
                                      <div class="modal-body">
                                        <div class="form-floating mb-3">
                                          <?php
                                          echo '<select class="form-select" id="floatingSelect" name="departname" required  onchange="changesdep(this.value,'.$row2['Course_Id'].')" id="departname">';
                                          
                                            $sel10="select * from department where Institution_Id=".$_SESSION['institution']." and Department_Id!=$did and Department_Id NOT IN(SELECT Department_Id from department where Institution_Id=$iid and Department_Name='office')";
                                            $data10=mysqli_query($dbcon,$sel10);
                                            if(mysqli_num_rows($data10)>0){
                                              echo "<option value=''>Select One</option>";
                                              while($row10=mysqli_fetch_array($data10)){                          
                                                echo "<option value=".$row10['Department_Id'].">".$row10['Department_Name']."</option>";
                                              }
                                            }
                                            //Here we can delete all exam under this course or change the controller of all exams under this course to the selected department's one teacher or set teacher field of exams under that course to null
                                          ?>
                                          </select>                                    
                                          <label for="floatingSelect">Select Department Name</label>
                                        </div>
                         
                                          <?php echo '  <div id="txtHint28'.$row2['Course_Id'].'"><input type="hidden"></div>';?>
                                        
                                        <input type="hidden" id="inp12" name="teachersid">
                                        <div class="input-group mb-3">
                                          <div class="input-group-text">
                                          <?php echo '  <input class="form-check-input mt-0" type="checkbox" value="1" id="examdeletecheck'.$row2['Course_Id'].'" >';//onclick="changedepdeleteexam('.$row2['Course_Id'].')"?>
                                          </div>
                                          <span class="input-group-text">Delete All Exams Under This Course</span>
                                          <small style="color:red;">If you check this then Above Teacher Selection will not Reflect</small>
                                        </div>
                                      </div>
                                      <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <?php
                                        echo '<button type="button" class="btn btn-primary" onclick="changedepartment('.$row2['Course_Id'].')">Save changes</button>';                                     
                                        ?>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                                <?php
                            }
                        }
                    }
                    echo '</table>';  
                    ?>
            </div>
        </div>
      </div>
      <?php
        }
      ?>
      <?php
        if(@$_GET['q']==11) {
        ?>
        <div class="row mt-4">
            <div class="col-lg-12">
                <?php
                    $iid=$_SESSION['institution'];
                    $sel="select * from student where Institution_Id=$iid ";//and verified='yes'
                    $data=mysqli_query($dbcon,$sel);
                ?>
                <table class="table tabled-bordered">
                    <tr>
                        <th>S.No</th><th>Name</th><th>EMail</th><th>Date Of Birth</th><th>Age</th><th>Gender</th><th>Course</th><th>Year Of Admission</th><th></th><th></th>
                    </tr>
                    <?php
                        $c=1;
                        while($row=mysqli_fetch_array($data))
                        {
                            $name=$row['Name'];
                            $email=$row['E_Mail'];
                            $gender=$row['Gender'];
                            $age=$row['Age'];
                            $dob=$row['Date_Of_Birth'];
                            $yoa=$row['Year_Of_Admission'];
                            $cid=$row['Course_Id'];
                            $sql="select * from course where Course_Id=$cid";
                            $d=mysqli_query($dbcon,$sql);
                            $row2=mysqli_fetch_array($d);
                            $cna=$row2['Course_Name'];
                            echo' <tr><td>'.$c++.'</td><td>'.$name.'</td><td>'.$email.'</td><td>'.$dob.'</td><td>'.$age.'</td><td>'.$gender.'</td><td>'.$cna.'</td><td>'.$yoa.'</td><td>Accept</td><td>Reject</td></tr>';
                            //echo' <tr><td>'.$c++.'</td><td>'.$name.'</td><td>'.$email.'</td><td>'.$dob.'</td><td>'.$age.'</td><td>'.$gender.'</td><td>'.$cna.'</td><td>'.$yoa.'</td><td><form action=""><button value=" $studentid">Accept</button></form></td><td>Reject</td></tr>';
                            //here make it a button/span/a href and onclick a function is called to ajax and data is updated and change the last two column to accepted or rejected
                            //if a href then no ajax becuase we cant apply function call when click a link because it will move to next or we can use submit button and formaction attribute to sent it and update database and return by reloading page
                        }
                    ?>
                </table>
                <!--Use accordition here to diaply student under each department separately-->
            </div>
        </div>
        <?php
        }
      ?>
      <?php 
      if(@$_GET['q']==3){
        ?>
        <div class="row mt-">
        <div class="col-lg-12">
            <?php
                $iid=$_SESSION['institution'];
                $sel="select * from student where Institution_Id=$iid order by Course_Id,Year_Of_Admission";//and verified='yes' group by Course_Id
                $data=mysqli_query($dbcon,$sel);
            ?>
            <div class="row">
              <div class="col-lg-8" style="text-align:left;">
                <?php
                $result = $dbcon->query("SELECT * FROM course");
                 ?>
                 <div class="row">
                  <div class="col-lg-4">
                <select id="userSelect" class="form-control" >
                  <option value="">Select Course</option>
                    <?php while($row = $result->fetch_assoc()){ ?>
                          <option value="<?php echo $row['Course_Id']; ?>"><?php echo $row['Course_Name']; ?></option>
                    <?php } ?>
                </select>
                    </div>
                    <div class="col-lg-3">
                <!-- Print button -->
                <button id="getUser" class="btn btn-secondary">Print Details</button>
                    </div>
                    </div>
                <!-- Hidden div to load the dynamic content -->
                <div id="userInfo" style="display: none;"></div>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-8" style="text-align:left;">
                <?php
                $result = $dbcon->query("SELECT * FROM course");
                 ?>
                 <div class="row">
                  <div class="col-lg-4">
                <select id="userSelect" class="form-control" onchange="content(this.value)">
                  <option value="">Select Course</option>
                    <?php while($row = $result->fetch_assoc()){ ?>
                          <option value="<?php echo $row['Course_Id']; ?>"><?php echo $row['Course_Name']; ?></option>
                    <?php } ?>
                </select>
                    </div>
                    <div class="col-lg-3">
                <!-- Print button -->
                <button id="getUser" class="btn btn-secondary">Print Details</button>
                    </div>
                    </div>
                <!-- Hidden div to load the dynamic content -->
                <div id="userInfo" style="display: none;"></div>
              </div>
            </div>
            <div class="row mt-3">
              <div class="col-lg-12">
              <div id="section-to-print">
            <table class="table tabled-bordered" border=3>
                <tr>
                    <th>S.No</th><th>Name</th><th>EMail</th><th>Date Of Birth</th><th>Age</th><th>Gender</th><th>Course</th><th>Year Of Admission</th><th id="new" style="width:20%;text-align:center;"><button class="btn btn-primary" onClick="window.print()"><i class="bi bi-printer"></i>&nbsp;&nbsp;&nbsp;Print </button></th>
                </tr>
                <?php
                    $c=1;
                    while($row=mysqli_fetch_array($data))
                    {
                        $id=$row['Student_Id'];
                        $name=$row['Name'];
                        $email=$row['E_Mail'];
                        $gender=$row['Gender'];
                        $age=$row['Age'];
                        $dob=$row['Date_Of_Birth'];
                        $yoa=$row['Year_Of_Admission'];
                        $cid=$row['Course_Id'];
                        $sql="select * from course where Course_Id=$cid";
                        $d=mysqli_query($dbcon,$sql);
                        $row2=mysqli_fetch_array($d);
                        $cna=$row2['Course_Name'];
                        echo' <tr><td>'.$c++.'</td><td>'.$name.'</td><td>'.$email.'</td><td>'.$dob.'</td><td>'.$age.'</td><td>'.$gender.'</td><td>'.$cna.'</td><td>'.$yoa.'</td><td id="txtHint'.$id.'" class="newhide"><i class="bi bi-trash btn btn-outline-danger p-1" onclick="studremove('.$id.')">   Delete</i></td></tr>';
                        //echo' <tr><td>'.$c++.'</td><td>'.$name.'</td><td>'.$email.'</td><td>'.$dob.'</td><td>'.$age.'</td><td>'.$gender.'</td><td>'.$cna.'</td><td>'.$yoa.'</td><td><form action=""><button value=" $studentid">Accept</button></form></td><td>Reject</td></tr>';
                        //here make it a button/span/a href and onclick a function is called to ajax and data is updated and change the last two column to accepted or rejected
                        //if a href then no ajax becuase we cant apply function call when click a link because it will move to next or we can use submit button and formaction attribute to sent it and update database and return by reloading page 
                    }
                ?>
            </table>
                  </div>
                  </div>
                  </div>
        </div>
    </div>


      <?php
      }
      ?>
      <?php 
      if(@$_GET['q']==5){
        ?>
        <div class="row mt-4">
        <div class="col-lg-12">
            <?php
                $iid=$_SESSION['institution'];
                $sel="select * from user where Institution_Id=$iid and User_Type='teacher'";//and verified='yes'change this as when press each department teachers under it will be displayed
                $data=mysqli_query($dbcon,$sel);
            ?>
            <table class="table tabled-bordered table-striped" border="3">
                <tr>
                    <th>S.No</th><th>Name</th><th>EMail</th><th>Date Of Birth</th><th>Age</th><th>Gender</th><th>Department</th><th>Mobile No</th><th>Address</th><th></th>
                </tr>
                <?php
                    $c=1;
                    while($row=mysqli_fetch_array($data))
                    {
                        $id=$row['User_Id'];
                        $name=$row['User_Name'];
                        $email=$row['E_Mail'];
                        $gender=$row['Gender'];
                        $age=$row['Age'];
                        $dob=$row['Date_Of_Birth'];
                        $mob=$row['Mobile_No'];
                        $did=$row['Department_Id'];
                        $add=$row['Address'];
                        $sql="select * from department where Department_Id=$did and Institution_Id=".$_SESSION['institution']."";
                        $d=mysqli_query($dbcon,$sql);
                        $row2=mysqli_fetch_array($d);
                        $dna=$row2['Department_Name'];
                        $sql="select * from exam where Teacher_Id=$id";
                        $data4=mysqli_query($dbcon,$sql);
                        $n=mysqli_num_rows($data4);
                        echo' <tr><td>'.$c++.'</td><td>'.$name.'</td><td>'.$email.'</td><td>'.$dob.'</td><td>'.$age.'</td><td>'.$gender.'</td><td>'.$dna.'</td><td>'.$mob.'</td><td>'.$add.'</td>
  
                                <td id="txtHint21'.$id.'" style="min-width:130px;text-align:center"><b><abbr title = "Move to Another Department"><button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal'.$id.'">Move</button></abbr></b>&nbsp;&nbsp;&nbsp;&nbsp;
                                <i class="bi bi-trash btn btn-outline-danger p-1" onclick="teacherremove('.$id.','.$n.')">   Delete</i></td></tr>';

                        echo '<div class="modal fade" id="exampleModal'.$id.'" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">';?>
                                  <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Change Department</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                      </div>
                                      <div class="modal-body">
                                        <div class="form-floating mb-3">
                                          <select class="form-select" id="floatingSelect" name="departname" required  onchange="changesdepteach(this.value)" id="departname">
                                          <?php
                                            $sel10="select * from department where Institution_Id=".$_SESSION['institution']." and Department_Name!='office' and Department_Id!=$did";
                                            $data10=mysqli_query($dbcon,$sel10);
                                            if(mysqli_num_rows($data10)>0){
                                              echo "<option value=''>Select One</option>";
                                              while($row10=mysqli_fetch_array($data10)){                          
                                                echo "<option value=".$row10['Department_Id'].">".$row10['Department_Name']."</option>";
                                              }
                                            }
                                            
                                          ?>
                                          </select>
                                          <input type="hidden" id="departid2" name="departid2">
                                          <label for="floatingSelect">Select Department Name</label>
                                        </div>
                                      </div>
                                      <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <?php
                                        echo '<button type="button" class="btn btn-primary" onclick="changedepartmentteach('.$id.')">Save changes</button>';
                                        
                                        ?>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                                <?php
                        //change ownrship of exam or delete exam to delete this teacher it can be done through home page                      
                        //echo' <tr><td>'.$c++.'</td><td>'.$name.'</td><td>'.$email.'</td><td>'.$dob.'</td><td>'.$age.'</td><td>'.$gender.'</td><td>'.$cna.'</td><td>'.$yoa.'</td><td><form action=""><button value=" $studentid">Accept</button></form></td><td>Reject</td></tr>';
                        //here make it a button/span/a href and onclick a function is called to ajax and data is updated and change the last two column to accepted or rejected
                        //if a href then no ajax becuase we cant apply function call when click a link because it will move to next or we can use submit button and formaction attribute to sent it and update database and return by reloading page 
                    }
                ?>
            </table>
       
        </div>
    </div>


      <?php
      }
      ?>
    </div><!--closing of main colo-lg-12-->
    </div><!--closing of main row-->
    </div><!--closing of main container fluid which is opened after navbar-->
    </div><!--closing of main container fluid which is opened before navbar and before header-->
    <!--
    <section id="main" class="mt-5">
        hello
    </section>
    -->
    <script src="bootstrap5/js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script>
$(document).ready(function(){
    $('#getUser').on('click',function(){
        var userID = $('#userSelect').val();
        $('#userInfo').load('getdata.php?id='+userID,function(){
            var printContent = document.getElementById('userInfo');
            var WinPrint = window.open('', '', 'width=900,height=650');
            WinPrint.document.write(printContent.innerHTML);
            WinPrint.document.close();
            WinPrint.focus();
            WinPrint.print();
            WinPrint.close();
        });
    });
});
</script>
    <?php
    }//closing of isset($_SESSION['role'];
    ?>
    <footer>
      <div class="row">
        <div class="col-lg-4"></div>
        <div class="col-lg-8">
          <!--
          <div class="spinner-grow text-primary" style="margin-left:200px;" role="status">
            <span class="visually-hidden">Loading...</span>
          </div>
          
          <div class="spinner-border text-primary" style="margin-left:200px;" role="status">
            <span class="visually-hidden">Loading...</span>
          </div>
          
          <div class="spinner-grow text-secondary" role="status">
            <span class="visually-hidden">Loading...</span>
          </div>
          <div class="spinner-border text-success" role="status">
            <span class="visually-hidden">Loading...</span>
          </div>
          <div class="spinner-grow text-danger" role="status">
            <span class="visually-hidden">Loading...</span>
          </div>
          <div class="spinner-border text-warning" role="status">
            <span class="visually-hidden">Loading...</span>
          </div>
          <div class="spinner-grow text-info" role="status">
            <span class="visually-hidden">Loading...</span>
          </div>
          <div class="spinner-border text-light" role="status">
            <span class="visually-hidden">Loading...</span>
          </div>
          <div class="spinner-grow text-dark" role="status">
            <span class="visually-hidden">Loading...</span>
          </div>        

          <div class="spinner-border text-secondary" role="status">
            <span class="visually-hidden">Loading...</span>
          </div>
          <div class="spinner-grow text-primary" role="status">
            <span class="visually-hidden">Loading...</span>
          </div>
          <div class="spinner-border text-danger" role="status">
            <span class="visually-hidden">Loading...</span>
          </div>
          <div class="spinner-grow text-success" role="status">
            <span class="visually-hidden">Loading...</span>
          </div>
          <div class="spinner-border text-info" role="status">
            <span class="visually-hidden">Loading...</span>
          </div>
          <div class="spinner-grow text-warning" role="status">
            <span class="visually-hidden">Loading...</span>
          </div>
          <div class="spinner-border text-dark" role="status">
            <span class="visually-hidden">Loading...</span>
          </div>
          <div class="spinner-grow text-light" role="status">
            <span class="visually-hidden">Loading...</span>
          </div>
          -->
        </div>
      </div>
    </footer>
    <!--<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>-->
</body>
</html>