<?php
 session_start(); 
 include("conn.php");
 extract($_POST);

 $exmne_id = $_SESSION['examineeSession']['exmne_id'];

$pid = $_POST['pid'];

$selExAttempt = $conn->query("SELECT * FROM paper_attempt WHERE exmne_id='$exmne_id' AND PID='$pid'  ");

$selAns = $conn->query("SELECT * FROM takenpaper WHERE exmne_id='$exmne_id' AND PID='$pid' ");


if($selExAttempt->rowCount() > 0)
{
	echo "<script>alert('Paper Already TAKEN');
      window.location.href='qpaper.php';</script>";
}
else if($selAns->rowCount() > 0)
{
	$updLastAns = $conn->query("UPDATE takenpaper SET exans_status='old' WHERE exmne_id='$exmne_id' AND PID='$pid'  ");
	if($updLastAns)
	{
		foreach ($_REQUEST['answer'] as $key => $value) {
			 $value = $value['correct'];
		  	 $insAns = $conn->query("INSERT INTO takenpaper(exmne_id,PID,quest_id,ans) VALUES('$exmne_id','$pid','$key','$value')");
		}
		if($insAns)
		{
			 $insAttempt = $conn->query("INSERT INTO paper_attempt(exmne_id,PID)  VALUES('$exmne_id','$pid') ");
			 if($insAttempt)
			 {
				 echo "<script>alert('Paper submitted successfull');
      window.location.href='home.php';</script>";
			 }
			 else
			 {
				 echo "<script>alert('Unable to submit paper');
      window.location.href='home.php';</script>";
			 }
		}
		else
		{
			 echo "<script>alert('Failed');
      window.location.href='home.php';</script>";
		}
	}
}
else
{

		foreach ($_REQUEST['answer'] as $key => $value) {
			 $value = $value['correct'];
		  	 $insAns = $conn->query("INSERT INTO takenpaper(exmne_id,PID,quest_id,ans) VALUES('$exmne_id','$pid','$key','$value')");
		}
		if($insAns)
		{
			 $insAttempt = $conn->query("INSERT INTO paper_attempt(exmne_id,PID)  VALUES('$exmne_id','$pid') ");
			 if($insAttempt)
			 {
				 echo "<script>alert('Paper submitted successfully');
      window.location.href='home.php';</script>";
			 }
			 else
			 {
				 echo "<script>alert('Unable to submit paper');
      window.location.href='home.php';</script>";
			 }
		}
		else
		{
			 echo "<script>alert('Error occured');
      window.location.href='home.php';</script>";
		}


}
 ?>
