<?php
session_start();
$temp = session_destroy();
if($temp)
    echo "<script>alert('You are logged out')</script>";
echo "<script>location='../login.php'</script>";
?>