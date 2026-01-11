<?php 

$conn_type = 'mysqli';
include '../../conn.php';

if(isset($_POST['submit'])){
$pid = $_POST['pname'];
$m1l1 =  $_POST['m1l1'];
$m1l2 =  $_POST['m1l2'];
$m1l3 =  $_POST['m1l3'];
$m1l4 =  $_POST['m1l4'];
$m1l5 =  $_POST['m1l5'];
$m2l1 =  $_POST['m2l1'];
$m2l2 =  $_POST['m2l2'];
$m2l3 =  $_POST['m2l3'];
$m2l4 =  $_POST['m2l4'];
$m2l5 =  $_POST['m2l5'];
$m3l1 =  $_POST['m3l1'];
$m3l2 =  $_POST['m3l2'];
$m3l3 =  $_POST['m3l3'];
$m3l4 =  $_POST['m3l4'];
$m3l5 =  $_POST['m3l5'];
$m5l1 =  $_POST['m5l1'];
$m5l2 =  $_POST['m5l2'];
$m5l3 =  $_POST['m5l3'];
$m5l4 =  $_POST['m5l4'];
$m5l5 =  $_POST['m5l5'];
$total = $_POST['total'];
$totalq = $_POST['totalq'];
$time = $_POST['time'];

$sqll = "UPDATE epaper SET M1L1='$m1l1', M1L2='$m1l2', M1L3='$m1l3', M1L4='$m1l4', M1L5='$m1l5', M2L1='$m2l1', M2L2='$m2l2', M2L3='$m2l3', M2L4='$m2l4', M2L5='$m2l5', M3L1='$m3l1', M3L2='$m3l2', M3L3='$m3l3', M3L4='$m3l4', M3L5='$m3l5', M5L1='$m5l1', M5L2='$m5l2', M5L3='$m5l3', M5L4='$m5l4', M5L5='$m5l5', TOTAL='$total', TOTALQ='$totalq', TIMEL='$time' WHERE PID='$pid'";

if (mysqli_query($conn, $sqll)) {
  echo "<script>alert('Paper creation successfull');
      window.location.href='managepaper.php';</script>";
} else {
  echo "<script>alert('Unable to create paper');
          window.location.href='qadds.php';</script>"; 
}}
?>