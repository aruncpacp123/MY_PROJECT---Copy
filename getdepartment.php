<!DOCTYPE html>
<html>
<head>
</head>
<body>

<?php
$q = intval($_GET['q']);

include("Scripts/connection.php");
$sql="SELECT * FROM department WHERE Institution_Id = $q and  Department_Id NOT IN(SELECT Department_Id from department where Institution_Id=$q and Department_Name='office')";
$result = mysqli_query($dbcon,$sql);
?>
<select class="loginselect" name="teachdid" id="teachdid" onchange=department4()>
             
                            <?php
                            
                            echo "<option value=''>Select a Department</option>";
                            while($row=mysqli_fetch_array($result))
                            {   
                                echo "<option value=".$row['Department_Id'].">".$row['Department_Name']."</option>";
                            }
                            ?>
                            <div id="txtHint"></div>
</select>

</body>
</html>