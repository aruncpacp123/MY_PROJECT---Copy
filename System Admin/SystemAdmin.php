<?php 
include("../Scripts/connection.php");
include_once("../Scripts/session.php");
?>
<!DOCTYPE html>
<html lang="en" style="background: #8e9eab;  /* fallback for old browsers */
background: -webkit-linear-gradient(to right, #eef2f3, #8e9eab);  /* Chrome 10-25, Safari 5.1-6 */
background: linear-gradient(to right, #eef2f3, #8e9eab); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="../bootstrap5/css/bootstrap.min.css" rel="stylesheet">
    <link href="../font/bootstrap-icons.css" rel="stylesheet">
    <link href="../bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="../CSS/main.css" type="text/css">
    <?php 
        if(@$_GET['w']){
            echo'<script>alert("'.@$_GET['w'].'");</script>';
        }
    ?>

    <script>
      function institutionremove(str){
        var data="WARNING!!!\n Are you Sure?\n This will delete all datas in that institution";
        var c=confirm(data);
        if(!c)
          return;
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) {
            document.getElementById("txtHint29"+str).innerHTML = this.responseText;
          }
        };
        xmlhttp.open("GET","../Scripts/SystemAdmin.php?q=removeinstitution&id="+str,true);
        xmlhttp.send();
      }

    </script>
</head>
<body style="background: #8e9eab;background: -webkit-linear-gradient(to right, #eef2f3, #8e9eab);background: linear-gradient(to right, #eef2f3, #8e9eab);">
<?php
if(!isset($_SESSION['name'])){
    if(isset($_SESSION['role'])){
        session_unset();
        session_destroy();
    }
    ?>
    
<div class="container-fluid"><!--main container-fluid div-->
<div class="header mt-2 mb-2">
    <div class="row mt-3 " >
        <div class="col-lg-3"></div>
        <div class="col-lg-9 pl-5">
            <span class="logo" style="margin-left:200px;">Online Examination System</span>
        </div>
    </div>
</div>
<div class="container">
    <div class="row mt-5">
        <div class="col-lg-3"></div>
        <div class="col-lg-6 bg-dark m-4" style="border-radius:30px;">
            <div class="row">
                <div class="col-lg-10 mt-4 m-auto" style="background-color: !important;border-radius:20px;box-shadow: 0px 0px 30px 1px rgba(25, 200, 0.8, 0.2);padding-top:10px;">
                    <h1 class="logo">SYSTEM ADMIN LOGIN</h1>
                </div>
            </div>
            <div class="row mt-5">
                <div class="col-lg-12" style="display:flex;flex-direction:column;">
                  <form method="post" action="../Scripts/SystemAdmin.php?q=login&ref=../System Admin/SystemAdmin.php">
                    <div class="mb-3 form-floating col-md-12" >
                      <input type="text" class="form-control" name="saname" placeholder="name@example.com" style=" justify-content:left;border-radius:10px;">
                      <label for="exampleFormControlInput1" class="form-label">Username</label>
                    </div>
                    <div class="mb-3 form-floating col-md-12">
                      <input type="email" class="form-control" name="saemail" placeholder="name@example.com" style="border-radius:10px;">
                      <label for="exampleFormControlInput1" class="form-label">Email address</label>
                    </div>
                    <div class="mb-3 form-floating">
                      <input type="password" class="form-control" name="sapassword" placeholder="name@example.com" style="border-radius:10px;">
                      <label for="exampleFormControlInput1" class="form-label">Password</label>
                    </div>
                    <div class="mb-3 col-md-12 text-center">
                        <button class="btn btn-outline-success col-md-6">LOGIN</button>
                    </div>
                  </form>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3"></div>
            <div class="col-lg-6" style="margin:auto;">
                <!--<button class="btn btn-success col-lg-7 "><a href="../" style="text-decoration:none;color:black;">GOTO USER PAGE</a></button>-->
                <a href="../" style="text-decoration:none;color:black;"><button class="btn btn-success col-lg-7 ">GOTO USER PAGE</button></a>
            </div>
        </div>
    </div>
</div>
<?php }
//if i press back withou signout then when i take the page again it still seems that i signedin without going to login page
//if i press signout and get back then i cant goto that page which i reach after login
//in this page to go back we must press signout and we cant goto login page without signout and we cant go to after login page without signin
// in all other pages even if i press back or goto login page without signout or by pressing signout when reach login page iam signout but still i can go to the page which i go after login but cant set sessions
//i can increase security by giving loginpage to another file so i can take login page without signout but when reach login page it automatically signout and dont remove isset session in this page
?>

<?php

if(isset($_SESSION['name'])){
    ?>
    <div class="container-fluid"><!--main container-fluid div-->
<div class="header mt-2 mb-2">
    <div class="row" >
        <div class="col-lg-6">
            <span class="logo">Online Examination System</span>
        </div>
        <div class="col-lg-6">
            <?php
                
                $name=$_SESSION['name'];
            ?>
            <span class="rightfull "><span class="bi bi-person-fill"></span>&nbsp;&nbsp;Hello  <?=$name?> &nbsp;&nbsp;|</span>
        </div>
    </div>
</div>

    <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #e3f2fd;position:sticky;z-index:3;"> 
      <div class="container-fluid ">    
        <a class="navbar-brand mx-2" href="."><i class="bi bi-amd"></i></a> 
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedCont ent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span> 
        </button>   
        <div class="collapse navbar-collapse" id="navbarSupportedContent">  
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">  
            <li class="nav-item mx-2 bg-light"> 
              <a class="nav-link active" aria-current="page" href="SystemAdmin.php?q=0">Home</a> 
            </li>
            <!--
            <li class="nav-item dropdown bg-light me-2">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
           Institution
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="SystemAdmin.php?q=1">View</a></li>
            <li><a class="dropdown-item" href="SystemAdmin.php?q=2">Delete</a></li>
          </ul>
        </li>
            <li class="nav-item bg-light btn btn-outline-secondary mx-2 me-2 mb-0 p-0" >    
              <a class="nav-link" href="SystemAdmin.php?q=15">Profile</a>    
            </li>  
        --> 
          </ul> 
            <a class="btn btn-outline-success me-3" href="../Scripts/SystemAdmin.php?q=logout&ref=../System Admin/SystemAdmin.php"><i class="bi bi-box-arrow-right me-3" ></i>Sign Out</a>
        </div>  
      </div>    
    </nav>  
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <?php if(@$_GET['q']==0) {
                    ?>
                    <div class="container">
        <div class="row mt-5">
            <div class="col-lg-12">
                <?php 
                    $sel="select * from institution";
                    //$sel="select * from department where Institution_Id=$iid and Department_Name='office'";here we are feteching two query from same table so can join it together like this /if we are writhing not in another table then above query can be executed
                    $data=mysqli_query($dbcon,$sel);
                    $c=1;
                    echo '<table class=" table table-striped table-bordered"><tr><td>SNO</td><td>Institution Name</td><td></td></tr>';
                    if(mysqli_num_rows($data)>0){
                        while($row=mysqli_fetch_array($data)){ 
                            echo '<tr><td>'.$c++.'</td><td>'.$row['Institution_Name'].'</td><td style="min-width:130px;text-align:center" id="txtHint29'.$row['Institution_Id'].'"><i class="bi bi-trash btn btn-outline-danger p-1" onclick="institutionremove('.$row['Institution_Id'].')">   Delete</i></td></tr>';   
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

    <?php }?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>
</html>