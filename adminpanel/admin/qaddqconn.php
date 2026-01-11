<?php 

session_start();
$course_id = $_SESSION['course_id'];

$conn_type = 'mysqli';
include '../../conn.php';

$cou_id =  $_POST['cou_id'];
$marks =  $_POST['marks'];
$diff = $_POST['dlevel'];
$q = $_POST['question'];
$cha = $_POST['choice_A'];
$chb = $_POST['choice_B'];
$chc = $_POST['choice_C'];
$chd = $_POST['choice_D'];
$a = $_POST['answer'];

$sql = "INSERT INTO questionanswers (cou_id, course_id, QID, MARKS, QUESTION_DESC, DIFFICULTY, CHOICE_1, CHOICE_2, CHOICE_3, CHOICE_4, ANSWERS)
VALUES ('$cou_id', '$course_id', '1', '$marks', '$q', '$diff', '$cha', '$chb', '$chc', '$chd', '$a')";
$result=mysqli_query($conn, $sql);

if ($result) 
{
 echo "<script>alert('Question added Successfully');
 window.location.href='addq.php';</script>";
}
else
{
 echo "<script>alert('Question was not added!');
 window.location.href='qaddq.php';</script>";
}
?>
