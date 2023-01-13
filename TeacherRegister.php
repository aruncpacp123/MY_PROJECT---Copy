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
    <?php if(@$_GET['w'])
            {echo'<script>alert("'.@$_GET['w'].'");</script>';}
        ?>
        <?php
            $q =@$_GET['m'];
        ?>
    <script>
        /*function department(){
            var number=document.getElementById("iid").value; 
            alert(number) ;
        }*/
  function department(str) {
  if (str == "") {
    //var data="<input type='text id='inp9' placeholder='Enter Department Id..' name='teachdid'></input>";
    //document.getElementById("txtHint").innerHTML = data;
    return;
  } else {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("txtHint").innerHTML = this.responseText;
      }
    };
    xmlhttp.open("GET","getdepartment.php?q="+str,true);
    xmlhttp.send();
  }
}
function department4(){
            var number=document.getElementById("teachdid").value; 
            document.getElementById("inp12").value=number;
        }
    </script>
    </head>
    <body>

    <div class="div1">
        <form action="Scripts/Teacher_Register.php" method="post" name="studentsignupform" >
        <div class="top1">
            <h1><strong>Sign Up</strong></h1>
            
            <div id="line"></div>
        </div>
        <div class="top2">
            <label for="inp1"><h5>Name</h5></label>
            <input type="text" id="inp1" placeholder="Enter Name.." name="teachname" class="text"></input>
        </div>
        <div class="top2">
            <label for="inp2"><h5>Age</h5></label>
            <input type="text" id="inp2" placeholder="Enter Age.." name="teachage"></input>
        </div>
        <div class="top2">
            <label for="inp3"><h5>Gender</h5></label>
            <input type="text" id="inp3" placeholder="Enter Gender.." name="teachgender"></input>
        </div>
        <div class="top2">
            <label for="inp4"><h5>Address</h5></label>
            <textarea name="teachaddress" id="inp4" placeholder="Enter Address"></textarea>
        </div>
        <div class="top2">
            <label for="inp5"><h5>Date of Birth</h5></label>
            <input type="date" id="inp5" name="teachbirth"></input>
        </div>
        <div class="top2">
            <label for="inp6"><h5>Email</h5></label>
            <input type="email" id="inp6" placeholder="Enter Email" name="teachemail"></input>
        </div>
        <div class="top2">
            <label for="inp7"><h5>Mobile Number</h5></label>
            <input type="tel" id="inp7" placeholder="Enter Mobile Number" name="teachmobile"></input>
        </div>
        <div class="top2">
            <label for="inp8"><h5>Institution Id</h5></label>
            <!--<input type="text" id="inp8" placeholder="Enter Institution Id.." name="teachiid"></input>-->
            <select name="teachiid" class="loginselect" onchange="department(this.value)" id="iid">
             
                            <?php
                            include("Scripts/connection.php");
                            $sel="select * from institution";
                            $data=mysqli_query($dbcon,$sel);
                            echo "<option value=''>Select an Institution</option>";
                            while($row=mysqli_fetch_array($data))
                            {                              
                                echo "<option value=".$row['Institution_Id'].">".$row['Institution_Name']."</option>";
                            }
                            ?>
            </select>
        </div>
        <!--<div class="top2">
            <label for="inp9"><h5>Department Id</h5></label>
            <input type="text" id="inp9" placeholder="Enter Department Id.." name="teachdid"></input>
        </div>-->
         <div class="top2">
            <label for="inp9"><h5>Department Id</h5></label>
            <div id="txtHint"><input type="text" id="inp9" placeholder="Enter Department Id.." name="teachdid"></input></div>
            <input type="hidden" id="inp12" name="teachdid" >
        </div>
        <div class="top2">
            <label for="inp10"><h5>Password</h5></label>
            <input type="password" id="inp10" placeholder="Enter Password" name="teachpasswd"></input>
        </div>
        <div class="top1">
            <div id="line"></div><br>
            <input type="submit" value="Register" name="teachsignup">
        </div>

    </form>
    <button style="background-color:inherit;margin-left: 10px;margin-top: 5px;margin-bottom: 5px;"><a href="Index.php" style="text-decoration:none;color:inherit;">back</a></button>
    </div>

</body>
</html>