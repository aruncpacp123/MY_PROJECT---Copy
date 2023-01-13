<?php

include("Scripts/session.php");
    if(isset($_SESSION['role'])){
            session_unset();
            session_destroy();
        }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="CSS/main.css" type="text/css">
    <script>
        
    </script>
    <?php if(@$_GET['w'])
        {
            //echo'<script>alert("'.@$_GET['w'].'");</script>';
            echo "<div class='alert alert-success' role='alert' ml-250>";
            echo "<h4 class='alert-heading '>".@$_GET['w']."</h4>";
            echo "<hr>";
            echo "<p class='mb-0'>Try Again</p>";
            echo "</div>";
        }
        ?>
</head>
<body>
  
    <div class="instdiv">
        <div class="instdiv2">
            <form method="post" action="Scripts/Admin_Login.php?q=../AdminLogin.php">
                <div class="instdiv3">
                    <h4 style="letter-spacing:8px;">ADMIN  LOGIN</h4>
                    <div id="line2"></div><br>
                </div>
                <div class="instdiv4">
                    <div class="instdiv5">
                        <label for="inp1" class="label1">Instituion_Id</label>
                        <select name="instid" class="loginselect2">
             
                            <?php
                            include("Scripts/connection.php");
                            $sel="select * from institution";
                            $data=mysqli_query($dbcon,$sel);
                            echo "<option>Select an Institution</option>";
                            while($row=mysqli_fetch_array($data))
                            {
                                
                                echo "<option value=".$row['Institution_Id'].">".$row['Institution_Name']."</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <div class="instdiv5">
                        <label for="inp2" class="label1">Enter Email</label>
                        <input type="email" id="inp2" class="ip" placeholder="Enter Email" name="instemail"></input>
                    </div>
                    <div class="instdiv5">
                        <label for="inp3" class="label1">Password</label>
                        <input type="password" id="inp3" class="ip" placeholder="Enter Password" name="instpasswd"></input>
                    </div>
                    
                    <div class="top1">
                        <div id="line2"></div>
                            <input type="submit" value="Login" name="adminlogin">
                    </div>
                
                </div>       
            </form>
        </div>
        <button style="background-color:inherit;width:200px;align-self:center; "><a href="Index.php" style="text-decoration:none;color:inherit;">back</a></button>
    </div>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>