<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIGN UP CSS15</title>
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
 input[type=submit]{
   width: 100%;
   padding: 15px;
   border: solid white;
   background-color: rgb(49,49,49);
   color: white;
 }

    </style>
    <?php if(@$_GET['w'])
            {echo'<script>alert("'.@$_GET['w'].'");</script>';}
        ?>
    </head>
    <body>
    
    <div class="div1">
        <form action="Scripts/Student_Register.php" method="post" name="studentsignupform">
        <div class="top1">
            <h1><strong>Sign Up</strong></h1>
            
            <div id="line"></div>
        </div>
        <div class="top2">
            <label for="inp1"><h5>Name</h5></label>
            <input type="text" id="inp1" placeholder="Enter Name.." name="studname" class="text"></input>
        </div>
        <div class="top2">
            <label for="inp2"><h5>Age</h5></label>
            <input type="text" id="inp2" placeholder="Enter Age.." name="studage"></input>
        </div>
        <div class="top2">
            <label for="inp2"><h5>Gender</h5></label>
            <input type="text" id="inp2" placeholder="Enter Gender.." name="studgender"></input>
        </div>
        <div class="top2">
            <label for="inp2"><h5>Year_Of_Admission</h5></label>
            <input type="text" id="inp2" placeholder="Enter Year of Admission.." name="studyear"></input>
        </div>
        <div class="top2">
            <label for="inp3"><h5>Date of Birth</h5></label>
            <input type="date" id="inp3" name="studbirth"></input>
        </div>
        <div class="top2">
            <label for="inp4"><h5>Email</h5></label>
            <input type="email" id="inp4" placeholder="Enter Email" name="studemail"></input>
        </div>
        <div class="top2">
            <label for="inp2"><h5>Institution Id</h5></label>
            <input type="text" id="inp2" placeholder="Enter Institution Id.." name="studiid"></input>
        </div>
        <div class="top2">
            <label for="inp2"><h5>Course Id</h5></label>
            <input type="text" id="inp2" placeholder="Enter Course Id.." name="studcid"></input>
        </div>
        <div class="top2">
            <label for="inp5"><h5>Password</h5></label>
            <input type="password" id="inp5" placeholder="Enter Password" name="studpasswd"></input>
        </div>
        <div class="top1">
            <div id="line"></div><br>
            <input type="submit" value="Register" name="studsignup">
        </div>
    </form>
    <button style="background-color:inherit;margin-left: 10px;margin-top: 5px;margin-bottom: 5px;"><a href="Index.php" style="text-decoration:none;color:inherit;">back</a></button>

    </div>
</body>
</html>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIGN UP CSS15</title>
  
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
 input[type=submit]{
   width: 100%;
   padding: 15px;
   border: solid white;
   background-color: rgb(49,49,49);
   color: white;
 }
 select{
    width: 100%;
   padding: 10px 20px;
   border: 0px;
   border-radius:50px;
   box-sizing: border-box;
   background-color: rgb(231, 229, 229);
   margin-top:18px;
 }


    </style>
    <script language='JavaScript'>
function myFunction() {
  var x = document.getElementById("instid").value;

  <?php
    $x="<script>x</script>";
    include "connection.php";
    
  ?>
  
}
</script>
    <?php if(@$_GET['w'])
            {echo'<script>alert("'.@$_GET['w'].'");</script>';}
        ?>
    </head>
    <body>
    
    <div class="div1">
        <form action="Scripts/Student_Register.php" method="post" name="studentsignupform">
        <div class="top1">
            <h1><strong>Sign Up</strong></h1>
            
            <div id="line"></div>
        </div>
        <div class="top2">
            <label for="inp1"><h5>Name</h5></label>
            <input type="text" id="inp1" placeholder="Enter Name.." name="studname" class="text"></input>
        </div>
        <div class="top2">
            <label for="inp2"><h5>Age</h5></label>
            <input type="text" id="inp2" placeholder="Enter Age.." name="studage"></input>
        </div>
        <div class="top2">
            <label for="inp2"><h5>Gender</h5></label>
            <input type="text" id="inp2" placeholder="Enter Gender.." name="studgender"></input>
        </div>
        <div class="top2">
            <label for="inp2"><h5>Year_Of_Admission</h5></label>
            <input type="text" id="inp2" placeholder="Enter Year of Admission.." name="studyear"></input>
        </div>
        <div class="top2">
            <label for="inp3"><h5>Date of Birth</h5></label>
            <input type="date" id="inp3" name="studbirth"></input>
        </div>
        <div class="top2">
            <label for="inp4"><h5>Email</h5></label>
            <input type="email" id="inp4" placeholder="Enter Email" name="studemail"></input>
        </div>
        <div class="top2">
         <select name="studiid" class="ip" id="instid" onChange="myfunction()">
             
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
        
        <div class="top2">
         <select name="studcid" class="ip" id="courid">
             <option>Select an Option</option>
             <option value=120>hi</option>
         </select>
        </div>
        <div class="top2">
            <label for="inp5"><h5>Password</h5></label>
            <input type="password" id="inp5" placeholder="Enter Password" name="studpasswd"></input>
        </div>
        <div class="top1">
            <div id="line"></div><br>
            <input type="submit" value="Register" name="studsignup">
        </div>
    </form>
    <button style="background-color:inherit;margin-left: 10px;margin-top: 5px;margin-bottom: 5px;"><a href="Index.php" style="text-decoration:none;color:inherit;">back</a></button>

    </div>
    
</body>
</html>