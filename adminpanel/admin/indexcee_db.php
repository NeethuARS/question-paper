<?php include 'connection.php'; ?>
 <!DOCTYPE html>
<html lang="en" dir="ltr">
	<head> 
		<meta charset="utf-8">
		<title>Import Excel To MySQL</title>
	</head>
	<body>
		<form class="" action="" method="post" enctype="multipart/form-data">
			<input type="file" name="excel" required value="">
			<button type="submit" name="import">Import</button>
		</form>
		<hr>
		<table border = 1>
			<tr>
				<td>1</td>
				<td>2</td>
				<td>3</td>
				<td>4</td>
<td>5</td>
<td>6</td>
<td>7</td>
<td>8</td>
<td>9</td>
<td>10</td>
			</tr>
			<?php
			
			$rows = mysqli_query($conn, "SELECT * FROM examinee_tbl");
			foreach($rows as $row) :
			?>
			<tr>
				<td> <?php echo $row["exmne_id"]; ?> </td>
				<td> <?php echo $row["exmne_fullname"]; ?> </td>
				<td> <?php echo $row["course_id"]; ?> </td>
<td> <?php echo $row["exmne_course"]; ?> </td>
<td> <?php echo $row["exmne_gender"]; ?> </td>
<td> <?php echo $row["exmne_year_level"]; ?> </td>
<td> <?php echo $row["exmne_email"]; ?> </td>
<td> <?php echo $row["exmne_password"]; ?> </td>
<td> <?php echo $row["exmne_status"]; ?> </td>
<td> <?php echo $row["status"]; ?> </td>
			</tr>
			<?php endforeach; ?>
		</table>
		<?php
		if(isset($_POST["import"])){
			$fileName = $_FILES["excel"]["name"];
			$fileExtension = explode('.', $fileName);
      $fileExtension = strtolower(end($fileExtension));
			$newFileName = date("Y.m.d") . " - " . date("h.i.sa") . "." . $fileExtension;

			$targetDirectory = "uploads/" . $newFileName;
			move_uploaded_file($_FILES['excel']['tmp_name'], $targetDirectory);

			error_reporting(0);
			ini_set('display_errors', 0);

			require 'excelReader/excel_reader2.php';
			require 'excelReader/SpreadsheetReader.php';

			$reader = new SpreadsheetReader($targetDirectory);
			foreach($reader as $key => $row){
				$exmne_id = $row[0];
				$exmne_fullname = $row[1];
				$course_id = $row[2];
$exmne_course = $row[3];
$exmne_gender = $row[4];
$exmne_year_level = $row[5];
$exmne_email = $row[6];
$exmne_password = $row[7];
$exmne_status = $row[8];
			$status = $row[9];	mysqli_query($conn, "INSERT INTO examinee_tbl VALUES( '$exmne_id', '$exmne_fullname', '$course_id','$exmne_course','$exmne_gender','$exmne_year_level','$exmne_email','$exmne_password','$exmne_status','$status')");
			}

			echo
			"
			<script>
			alert('Succesfully Imported');
			document.location.href = '';
			</script>
			";
		}
		?>
	</body>
</html>