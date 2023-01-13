<?php
include_once "Scripts/session.php";

if (isset($_SESSION['role'])) {
    //$_SESSION['role'] = null;
    session_unset();
    session_destroy();
}

header("location:../Index.php");
?>