<?php 
session_start();
$course_id = $_SESSION['course_id'];

$conn_type = 'mysqli';
include '../../conn.php';

$co_id =  $_POST['cou_id'];
$marks =  $_POST['marks'];
$diff = $_POST['dlevel'];
$q = $_POST['question'];
$a = $_POST['options'];
// Create connection

$sql = "INSERT INTO questionanswers ( cou_id, course_id, QID, MARKS, QUESTION_DESC, DIFFICULTY, ANSWERS)
VALUES ('$co_id', '$course_id', '3', '$marks', '$q', '$diff', '$a')";
$result=mysqli_query($conn, $sql);

if($result) 
	  {
           echo "<script>alert('Question added Successfully');
          window.location.href='addq.php';</script>";
      }
      else
      {
               echo "<script>alert('Question was not added!');
          window.location.href='qaddp.php';</script>";
      }
?>
