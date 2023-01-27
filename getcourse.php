<!DOCTYPE html>
<html>
    <head></head>
<body>

<?php
$q = intval($_GET['q']);

include("Scripts/connection.php");
$sql2="SELECT * FROM course WHERE Institution_Id = '".$q."'";
$result2 = mysqli_query($dbcon,$sql2);
?>
                            <!--<select class="loginselect" name="studcid" id="studcid" onchange=course4()>-->
                            <?php  
                               echo "<option value='' selected disabled>Select a Course</option>"; 
                            while($row=mysqli_fetch_array($result2))
                            {
                                
                                echo "<option value=".$row['Course_Id'].">".$row['Course_Name']."</option>";
                            }
                            ?>
</select>


</body>
</html>