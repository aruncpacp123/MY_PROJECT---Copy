
<link rel="stylesheet" type="text/css" href="CSS/main.css">

<?php require_once "Scripts/session.php"; ?>
<div class="navbar1">

<?php if (!isset($_SESSION['role'])): ?>
<ul>
  <li><div class="dropdown">
    <button class="dropbtn">Login</button>
    <div class="dropdown-content">
      <a href="Index.php">Student/Teacher</a>
      <a href="AdminLogin.php">Admin</a>
    </div>
  </div> </li>
  <li>
    <div class="dropdown">
    <button class="dropbtn">Sign Up</button>
    <div class="dropdown-content">
      <a href="StudentRegister.php">Student</a>
      <a href="TeacherRegister.php">Teacher</a>
    </div>
  </div> 
  </li>
  <li><a href="InstitutionRegister.php">Register</a></li>
  <li><a href="AboutUs.php">About US</a></li>
</ul>

<?php elseif ($_SESSION['role'] == 'student'): ?>
<ul>
  <li style="margin-right:860px;"><a href="Student_Home.php?q=0">HOME</a></li>
  <!--
  <li><div class="dropdown">
    <button class="dropbtn">Exams</button>
    <div class="dropdown-content">
      <a href="Student_Home.php?q=5">Register</a>
      <a href="Student_Home.php?q=6">Public Exam</a>
    </div>
  </div> </li>-->
  <li><a href="Student_Home.php?q=7">Result</a></li>
  <!--<li><a href="Student_Home.php?q=8">Upcoming Exam</a></li>-->
  <li><a href="Student_Home.php?q=9">Profile</a></li>
  <li><a href="Scripts/logout.php">Log Out</a></li>
</ul>

<?php elseif ($_SESSION['role'] == 'teacher'): ?>
  <li><div class="dropdown">
    <button class="dropbtn">Exam</button>
    <div class="dropdown-content">
      <a href="#">Create</a>
      <a href="#">View</a>
    </div>
  </div> </li>
  <li><a href="#contact">Result</a></li>
  <li><a href="#contact">Students</a></li>
  <li><a href="#contact">Profile</a></li>
  <li><a href="Scripts/logout.php">Log Out</a></li>
</ul>

<?php elseif ($_SESSION['role'] == 'admin'): ?>
  <ul>
  <li><div class="dropdown">
    <button class="dropbtn">Teachers</button>
    <div class="dropdown-content">
      <a href="#">Add</a>
      <a href="#">Manage</a>
    </div>
  </div> </li>
  <li><div class="dropdown">
    <button class="dropbtn">Student</button>
    <div class="dropdown-content">
      <a href="#">Add</a>
      <a href="#">Manage</a>
    </div>
  </div> </li>
  <li><div class="dropdown">
    <button class="dropbtn">Courses</button>
    <div class="dropdown-content">
      <a href="AddCourse.php">Add</a>
      <a href="#">Manage</a>
    </div>
  </div> </li>
  <li><div class="dropdown">
    <button class="dropbtn">Department</button>
    <div class="dropdown-content">
      <a href="AddDepartment.php">Add</a>
      <a href="#">Manage</a>
    </div>
  </div> </li>
  <li><div class="dropdown">
    <button class="dropbtn">Approve</button>
    <div class="dropdown-content">
      <a href="#">Student</a>
      <a href="#">Teacher</a>
    </div>
  </div> </li>
  <li><a href="AdminProfile.php" style="text-decoration:none;color:white;">Profile</a></li>
  <li><a href="Scripts/logout.php" style="text-decoration:none;color:white;">Log Out</a></li>
</ul>

<?php endif; ?>
</div>