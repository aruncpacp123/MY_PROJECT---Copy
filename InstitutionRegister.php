<!DOCTYPE html>
<html lang="en" style="color-scheme:light !important">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIGN UP CSS15</title>
   
    <style>
   body,html{
   margin: 0;
   /* The image used */
   background-image: url(images/s7.jpg);
   /* Full height */
   height: 100%; 
   width:100%;
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
    margin-left:460px;
    background-color:white;
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
    </head>
    <body>
    <div class="div1">
        <form method="post" action="Scripts/Institution_Register.php">
        <div class="top1">
            <h1><strong>Sign Up</strong></h1>
            <div id="line"></div>
        </div>
        <div class="top2">
            <label for="inp1"><h5> Name of the Institution</h5></label>
            <input type="text" id="inp1" placeholder="Enter Name.." name="instname"></input>
        </div>
        <div class="top2">
            <label for="inp4"><h5>Address</h5></label>
            <textarea id="inp4" placeholder="Enter Address" name="instaddr"></textarea>
        </div>
        <div class="top2">
            <label for="inp5"><h5>Email</h5></label>
            <input type="email" id="inp5" placeholder="Enter Email" name="instemail"></input>
        </div>
        <div class="top2">
            <label for="inp7"><h5>Mobile Number</h5></label>
            <input type="tel" id="inp7" placeholder="Enter Mobile Number" name="instmobile"></input>
        </div>
        <div class="top1">
            <div id="line"></div><br>
            <input type="submit" value="Register" name="instsubmit">
        </div>
    </form>
    <button style="background-color:inherit;margin-left: 10px;margin-top: 5px;margin-bottom: 5px;"><a href="Index.php" style="text-decoration:none;color:inherit;">back</a></button>

    </div>
</body>
</html>
