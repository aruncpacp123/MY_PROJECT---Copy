<?php

include("Scripts/session.php");
    if(isset($_SESSION['role'])){
            session_unset();
            session_destroy();
        }
    echo '<div class="position:fixed;z-index:2";>';        
    include ("navbar.php");
        echo "</div>"
?>
<html >
    <head>
        <link rel="stylesheet" type="text/css" href="CSS/main.css">
        <link href="images/download.png" rel="icon">
        <?php if(@$_GET['w'])
            {echo'<script>alert("'.@$_GET['w'].'");</script>';}
        ?>

    </head>
    <body style="overflow:auto;">
        

        <div class="logindiv">
            <div class="loginleft">
                <div class="head">
                    <h2 class="loginh2">Online Examination </h2>
                </div>
                <div class="head2">
                    <h2 class="loginh2">System</h2>
                </div>
            </div>
            <div class="loginright">
                <form method="post" action="Scripts/login.php?q=../index.php" class="form1">
                    <div class="top1">
                    <div class="loginh1">
                            <div class="letter">L</div>
                            <div class="letter">O</div>
                            <div class="letter">G</div>
                            <div class="letter">I</div>
                            <div class="letter">N</div>

                        </div>
                        <div id="line"></div>
                    </div>
                    
                    <div class="top2">
                        <input type="text" name="login_email" placeholder="Enter Email.."></input>
                    </div>
                    <div class="top2">
                        <input type="password" name="login_password" placeholder="Enter Password.."></input>
                    </div>
                    <div class="top2">
                        <select class="loginselect" name="user">
                            <option selected>User Type</option>
                            <option value=1>Student</option>
                            <option value=2>Teacher</option>
                        </select>
                    </div>
                    
                    <div class="top1">
                        <div id="line"></div><br>
                        <input type="submit" value="Login" name="login">
                    </div>
                </form>
                <div class="login_bottom">
                    <!--<div class="login_bottom_text">
                        <a href="sign_up.php"><h5>Sign Up</h5></a>
                    </div>-->
                    <div class="login_bottom_text">
                        <!--<a href="Scripts/forgot_password.php"><h5>Forgot Password?</h5></a>-->
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
