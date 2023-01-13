<?php
//include "navbar.php";
?>
<!doctype html>
<html lang="en" style="color-scheme:light !important">  
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
        <link rel="stylesheet" type="text/css" herf="CSS/main.css">
    <title>Exam</title>
  </head>
  <body >
    <div class="plane1">
        <form action="Scripts/Add_Some.php?q=course" method="post">
          <div class="plane">
            <h4 style="letter-spacing:8px;">ADD COURSE</h4>
            <div id=line3></div>
          </div>
          <div class="plane2">
            <label for="inp1" class="label3">Course ID</label>
            <input type="text" name="courseid" class="depart5" id="inp1">
          </div>
          <div class="plane2">
            <label for="inp2" class="label3">Course Name</label>
            <input type="text" name="coursename" class="depart5" id="inp2">
          </div>
          <div class="plane2" style="margin-bottom:10px;">
            <label for="inp2" class="label3">Department Name</label>
            <select name="departid" class="loginselect">
             
                            <?php
                            include("Scripts/connection.php");
                            include("Scripts/session.php");                        
                            $iid=$_SESSION['instid'];
                            $sel="SELECT * from department where Institution_Id=$iid and Department_Id NOT IN(SELECT Department_Id from department where Institution_Id=$iid and Department_Name='office')";
                            $data=mysqli_query($dbcon,$sel);
                            echo "<option value=''>Select a Department</option>";
                            while($row=mysqli_fetch_array($data))
                            {
                               echo "<option value=".$row['Department_Id'].">".$row['Department_Name']."</option>";
                            }
                            ?>
                        </select>
        </div>
        <div class="plane2">
            <label for="inp2" class="label3">Number of Semesters</label>
            <input type="text" name="duration" class="depart5" id="inp2">
          </div>
          <div class="plane">
          <input type="submit" value="Submit">
          </div>
          
        </form>
    </div>


    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>