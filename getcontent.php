<!DOCTYPE html>
<html>
    <head></head>
<body>

<?php
$q = intval($_GET['q']);
session_start();
include("Scripts/connection.php");
$iid=$_SESSION['institution'];

if($q!=0){
                $sel="select * from student where Course_Id=$q order by Year_Of_Admission";//and verified='yes' group by Course_Id
                $data=mysqli_query($dbcon,$sel);
}
else{
    $sel="select * from student where Institution_Id=$iid order by Course_Id,Year_Of_Admission";//and verified='yes' group by Course_Id
                $data=mysqli_query($dbcon,$sel);
}
?>
<table class="table tabled-bordered" border=3>
                <tr>
                    <th>S.No</th><th>Name</th><th>EMail</th><th>Date Of Birth</th><th>Age</th><th>Gender</th><th>Course</th><th>Year Of Admission</th><th id="new" style="width:20%;text-align:center;"><button class="btn btn-primary" onClick="window.print()"><i class="bi bi-printer"></i>&nbsp;&nbsp;&nbsp;Print </button></th>
                </tr>
                <?php
                    $c=1;
                    if(mysqli_num_rows($data)>0){
                    while($row=mysqli_fetch_array($data))
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
                        echo' <tr><td>'.$c++.'</td><td>'.$name.'</td><td>'.$email.'</td><td>'.$dob.'</td><td>'.$age.'</td><td>'.$gender.'</td><td>'.$cna.'</td><td>'.$yoa.'</td><td id="txtHint'.$id.'" class="newhide"><i class="bi bi-trash btn btn-outline-danger p-1" onclick="studremove('.$id.')">   Delete</i></td></tr>';
                        //echo' <tr><td>'.$c++.'</td><td>'.$name.'</td><td>'.$email.'</td><td>'.$dob.'</td><td>'.$age.'</td><td>'.$gender.'</td><td>'.$cna.'</td><td>'.$yoa.'</td><td><form action=""><button value=" $studentid">Accept</button></form></td><td>Reject</td></tr>';
                        //here make it a button/span/a href and onclick a function is called to ajax and data is updated and change the last two column to accepted or rejected
                        //if a href then no ajax becuase we cant apply function call when click a link because it will move to next or we can use submit button and formaction attribute to sent it and update database and return by reloading page 
                    }
                }
                else{
                    echo "No records";
                }
                ?>
            </table>

</body>
</html>