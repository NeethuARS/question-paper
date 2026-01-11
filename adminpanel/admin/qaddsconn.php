<?php 

$conn_type = "mysqli";
include("../../conn.php");
session_start();

$course_id = $_SESSION['course_id'];
$cou_id =  $_POST['select'];
$pname =  $_POST['pname'];
$mark1 =  $_POST['mark1'];
$mark2 =  $_POST['mark2'];
$mark3 =  $_POST['mark3'];
$mark5 =  $_POST['mark5'];
$error = [];


$sql = "select MARKS as marks, count(QUEST_ID) as questions from questionanswers where cou_id = $cou_id group by MARKS";
$result=$conn->query($sql);
$result = array_column($result->fetch_all(MYSQLI_ASSOC), 'questions', 'marks');
echo $result; 

if (!empty($mark1) && $mark1 > $result[1]){
  $error[] = 'Max of '.($result[1] ? $result[1] : '0').' questions under 1MARK';
}

if (!empty($mark2) && $mark2 > $result[2]){
  $error[] = 'Max of '.($result[2] ? $result[2] : '0').' questions under 2MARK';
}

if (!empty($mark3) && $mark3 > $result[3]){
  $error[] = 'Max of '.($result[3] ? $result[3] : '0').' questions under 3MARK';
}

if (!empty($mark5) && $mark5 > $result[5]){
  $error[] = 'Max of '.($result[5] ? $result[5] : '0').' questions under 5MARK';
}

if (!empty($error)) {
  echo "<script>alert('".implode('\n', $error)."');history.go(-1);</script>";
}

if(empty($error)) {
	$sql = "INSERT INTO epaper (course_id, cou_id, PNAME, MARK1, MARK2, MARK3, MARK5)
VALUES ('$course_id', '$cou_id', '$pname', '$mark1', '$mark2', '$mark3', '$mark5' )";
$result=mysqli_query($conn, $sql);

if($result) 
{
 echo "<script>alert('Paper creation in process');</script>";
header('location:epaper.php?pid='.$conn->insert_id);
}
else
{
echo "<script>alert('Unable to create paper');history.go(-1);</script>";
}}
?>
