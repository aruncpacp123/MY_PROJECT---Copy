<?php
$userData = array();
if(!empty($_GET['id'])){
    // Include the database configuration file
    require_once 'Scripts/connection.php';
    
    // Get the user's ID from the URL
    $userID = $_GET['id'];
    
    // Fetch the user data based on the ID
    $query = $dbcon->query("SELECT * FROM student WHERE Course_Id = ".$userID);
    
    if($query->num_rows > 0){
        $userData = $query->fetch_assoc();
    }
}
?>

<!-- Render the user details -->
<div class="container">
    <h2>STUDENT DETAILS</h2>
            <table class="table tabled-bordered" border=3>
                <tr>
                    <th>S.No</th><th>Name</th><th>EMail</th><th>Date Of Birth</th><th>Age</th><th>Gender</th><th>Course</th><th>Year Of Admission</th>
                </tr>
                <?php
                    $c=1;
                    while($row = mysqli_fetch_array($query))
                    
                    {
                        $id=$row['Student_Id'];
                        $name=$row['Name'];
                        $email=$row['E_Mail'];
                        $gender=$row['Gender'];
                        $age=$row['Age'];
                        $dob=$row['Date_Of_Birth'];
                        $yoa=$row['Year_Of_Admission'];
                        $cid=$row['Course_Id'];
                        $sql="select * from course where Course_Id=$cid";
                        $d=mysqli_query($dbcon,$sql);
                        $row2=mysqli_fetch_array($d);
                        $cna=$row2['Course_Name'];
                        echo' <tr><td>'.$c++.'</td><td>'.$name.'</td><td>'.$email.'</td><td>'.$dob.'</td><td>'.$age.'</td><td>'.$gender.'</td><td>'.$cna.'</td><td>'.$yoa.'</td></tr>';
                        //echo' <tr><td>'.$c++.'</td><td>'.$name.'</td><td>'.$email.'</td><td>'.$dob.'</td><td>'.$age.'</td><td>'.$gender.'</td><td>'.$cna.'</td><td>'.$yoa.'</td><td><form action=""><button value=" $studentid">Accept</button></form></td><td>Reject</td></tr>';
                        //here make it a button/span/a href and onclick a function is called to ajax and data is updated and change the last two column to accepted or rejected
                        //if a href then no ajax becuase we cant apply function call when click a link because it will move to next or we can use submit button and formaction attribute to sent it and update database and return by reloading page 
                    }
                ?>
            </table>
                    
</div>