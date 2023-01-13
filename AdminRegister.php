
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIGN UP CSS15</title>
    <link rel="stylesheet" type="text/css" herf="CSS/main.css">
    <style>
   body,html{

   /* The image used */
   background-image: url(images/banner.jpg);
   /* Full height */
   
   /* Center and scale the image nicely */
   background-position: center;
   background-repeat: no-repeat;
   background-size: cover;
   display:flex;
   flex-direction: row;
   width:100%;
 }
 .div1{
   width: 450px;
   height:fit-content;
   background-color: #ffffff;
   align-self: center;
   justify-content:center;
   display: inline-block;
   /* position: ;*/
    top: 0;
    bottom: 0;
    left: 0;
    right: 0;
    /*margin: ;*/
    margin-left:430px;
    background-color:#ffffff     rgba(58, 159, 120, 0.716);
    overflow-x:hidden;
    overflow-y:auto;
    /*overflow:scroll;*/
}
h1{
   padding:15px;
   text-align: center;
   font: 1em sans-serif;
   transform: scale(2);
   color: black;
}
hr{
   width: 425px;
}
#line{
   width: 425px;
   height: 2px;
   background-color: rgb(238, 235, 238);
   align-self: center;
}
.top1{
   margin: 5px;
   display: flex;
   flex-direction: column;
}
input[type=date]{
   background-color: rgb(243, 239, 239);
   width: 300px;
   height: 25px;
   border-radius: 50px;
}
.top2{
   margin-left: 10px;
   margin-right: 20px;
}
label{
   font-family: sans-serif;
   height: 0;
   margin: 0;
   padding: 0;
}
h5{
   height: 1px;
}
input[type=text]{
   width: 100%;
   padding: 10px 20px;
   border: 0px;
   border-radius:50px;
   box-sizing: border-box;
   background-color: rgb(231, 229, 229);
 }
 input[type=date]{
   width: 100%;
   padding: 18px 20px;
   border: 0px;
   border-radius:50px;
   box-sizing: border-box;
   background-color: rgb(231, 229, 229);
 }
 input[type=email]{
   width: 100%;
   padding: 10px 20px;
   border: 0px;
   border-radius:50px;
   box-sizing: border-box;
   background-color: rgb(231, 229, 229);
 }
 input[type=password]{
   width: 100%;
   padding: 10px 20px;
   border: 0px;
   border-radius:50px;
   box-sizing: border-box;
   background-color: rgb(231, 229, 229);
 }
 input[type=tel]{
   width: 100%;
   padding: 10px 20px;
   border: 0px;
   border-radius:50px;
   box-sizing: border-box;
   background-color: rgb(231, 229, 229);
 }
 input[type=submit]{
   width: 100%;
   padding: 15px;
   border: solid white;
   background-color: rgb(49,49,49);
   color: white;
 }
 textarea{
    width: 100%;
   padding: 10px 20px;
   border: 0px;
   border-radius:50px;
   box-sizing: border-box;
   background-color: rgb(231, 229, 229);
 }
select{
    width: 100%;
   padding: 10px 20px;
   border: 0px;
   border-radius:50px;
   box-sizing: border-box;
   background-color: rgb(231, 229, 229);
}
    </style>
    <?php 
            if(@$_GET['w'])
            {
                $email=@$_GET['email'];
                echo'<script>alert("'.@$_GET['w'].'");</script>';
            }
    ?>
    </head>
    <body onload="document.FormName.reset();">
    
    <div class="div1">
        
        <?php
        include("Scripts/session.php");
        if(@$_GET['type']==1){
            include("Scripts/connection.php");
            $email=@$_GET['email'];     
            $sql2="select * from institution where E_Mail='$email'";
            $data2=mysqli_query($dbcon,$sql2);
            $row=mysqli_fetch_array($data2);
            if(mysqli_num_rows($data2)>0)
                $iid=$row['Institution_Id'];
            $_SESSION['instid']=$iid;
           
        }
        ?>
        <?php 
        $iidin=$_SESSION['instid'];
        echo "<form action='Scripts/Admin_Register.php?t=$iidin&r=000' method='post' name='studentsignupform'>";
        ?>
        <div class="top1">
            <h1><strong>Sign Up</strong></h1>
            
            <div id="line"></div>
        </div>
        <div class="top2">
            <label for="inp1"><h5>Name</h5></label>
            <input type="text" id="inp1" placeholder="Enter Name.." name="adminname" class="text"></input>
        </div>
        <div class="top2">
            <label for="inp2"><h5>Age</h5></label>
            <input type="text" id="inp2" placeholder="Enter Age.." name="adminage"></input>
        </div>
        <div class="top2">
            <label for="inp3"><h5>Gender</h5></label>
            <input type="text" id="inp3" placeholder="Enter Gender.." name="admingender"></input>
        </div>
        <div class="top2">
            <label for="inp4"><h5>Address</h5></label>
            <textarea name="adminaddress" id="inp4" placeholder="Enter Address"></textarea>
        </div>
        <div class="top2">
            <label for="inp5"><h5>Date of Birth</h5></label>
            <input type="date" id="inp5" name="adminbirth"></input>
        </div>
        <div class="top2">
            <label for="inp6"><h5>Email</h5></label>
            <input type="email" id="inp6" placeholder="Enter Email" name="adminemail"></input>
        </div>
        <div class="top2">
            <label for="inp7"><h5>Mobile Number</h5></label>
            <input type="tel" id="inp7" placeholder="Enter Mobile Number" name="adminmobile"></input>
        </div>
        <div class="top2">
            <label for="inp8"><h5>Institution id</h5></label>
            <?php
                include("Scripts/connection.php");
                
                //$email=@$_GET['email'];
                //$sql="select Institution_Id from institution where E_Mail='$email'";
                // $data=mysqli_query($dbcon,$sql);
                //$row=mysqli_fetch_array($data);
                //$iide=$row['Institution_Id'];
            ?>
            <input type="text" id="inp8" value=<?= $_SESSION['instid']; ?> name="adminiid" disabled></input>
        </div>
        <!--
        <div class="top2">
            <label for="inp9"><h5>Department Id (Office)</h5></label>
            <input type="text" id="inp9"  name="admindid" ></input>
        </div>
        -->
        
        <div class="top2">
            <label for="inp10"><h5>Password</h5></label>
            <input type="password" id="inp10" placeholder="Enter Password" name="adminpasswd"></input>
        </div>
        <div class="top1">
            <div id="line"></div>
            <input type="submit" value="Register" name="adminsignup">
        </div>

    </form>
    <button style="background-color:inherit;margin-left: 10px;margin-top: 5px;margin-bottom: 5px;" onClick="dismiss()">Dismiss</button>
    </div>
   <!-- <Script>
            function dismiss(){
                <?php/*
                 $ins="delete from institution where Institution_Id=$iid";
                 $data3=mysqli_query($ins);
                header("location:../InstitutionRegister.php");*//
                ?>
            }
        </Script>-->
</body>
</html>