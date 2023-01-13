<?php
include("navbar.php");

include("Scripts/connection.php");
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    
    <title>Exam!</title>
    <style>
    </style>
  </head>
  <body>
  <div class="row mt-5">
        <h1>Welcome Admin!</h1>
    </div>
    <div class="container">
    <div class="row">
        <?php
        $email=$_SESSION['e_mail'];
        $sql="select * from user where E_Mail='$email'";
        $data=mysqli_query($dbcon,$sql);
        $row=mysqli_fetch_array($data);
        ?>
        <div class="col-sm-12">
        <table class="table table-bordered">
            <tr>
                <td>User Id</td>
                <td><?=$row['User_Id']?></td>
            </tr>
            <tr>
                <td>Name</td>
                <td><?=$row['User_Name']?></td>
            </tr>
            <tr>
                <td>Date OF Birth</td>
                <td><?=$row['Date_Of_Birth']?></td>
            </tr>
            <tr>
                <td>Gender</td>
                <td><?=$row['Gender']?></td>
            </tr>
            <tr>
                <td>Age</td>
                <td><?=$row['Age']?></td>
            </tr>
            <tr>
                <td>Address</td>
                <td><?=$row['Address']?></td>
            </tr>
            <tr>
                <td>EMail</td>
                <td><?=$row['E_Mail']?></td>
            </tr>
            <tr>
                <td>Mobile Number</td>
                <td><?=$row['Mobile_No']?></td>
            </tr>
        </table>
        </div>
    </div>
    <div class="col text-center">
        <button type="button" class="btn btn-outline-primary"><a href="" style="text-decoration:none;">Edit</a></button>
        <button type="button" class="btn btn-outline-secondary">Go Back</button>
</div>
</div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
  </body>
</html>