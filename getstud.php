
<?php
$userData = array();
if(!empty($_GET['id'])){
    // Include the database configuration file
    require_once 'Scripts/connection.php';
    
    // Get the user's ID from the URL
    $userID = $_GET['id'];
    
    // Fetch the user data based on the ID
    $query = $dbcon->query("SELECT * FROM student WHERE Student_Id = ".$userID);
    
    if($query->num_rows > 0){
        $userData = $query->fetch_assoc();
    }
}
?>
<html>
    <head>
<style>
     @media print {
  body * {
    visibility: hidden;
  }
  #section-to-print, #section-to-print * {
    visibility: visible;
  }
  #section-to-print {
    position: absolute;
    left: 0;
    top: 0;
  }
  
}
</style>
</head>
<body>
<!-- Render the user details -->
<div class="container">
    <button onclick="window.print()">Print</button>
    <div id="section-to-print">
    <h2>User Details</h2>
    <?php if(!empty($userData)){ ?>
        <p><b>Name:</b> <?php echo $userData['Name']; ?></p>
        <p><b>Email:</b> <?php echo $userData['E_Mail']; ?></p>
        
        <p><b>Gender:</b> <?php echo $userData['Gender']; ?></p>
        <p><b>Age:</b> <?php echo $userData['Age']; ?></p>
        <p><b>Date Of Birth</b><?php echo $userData['Date_Of_Birth']; ?></p>
        <p><b>Year of Admission</b><?php echo $userData['Year_Of_Admission']; ?></p>
    <?php }else{ ?>
        <p>User not found...</p>
    <?php } ?>
    </div>
</div>
    </body>
    </html>