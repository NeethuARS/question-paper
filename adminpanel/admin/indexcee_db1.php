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
				<td>Instructor ID</td>
				<td>Course ID</td>
				<td>E-Mail</td>
				<td>Password</td>
<td>Status</td>

			</tr>
			<?php
			
			$rows = mysqli_query($conn, "SELECT * FROM admin_acc");
			foreach($rows as $row) :
			?>
			<tr>
				<td> <?php echo $row["admin_id"]; ?> </td>
				<td> <?php echo $row["course_id"]; ?> </td>
<td> <?php echo $row["admin_user"]; ?> </td>
<td> <?php echo $row["admin_pass"]; ?> </td>
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
				$admin_id = $row[0];
				$course_id = $row[1];
				$admin_user = $row[2];
$admin_pass = $row[3];
$status = $row[4];
	mysqli_query($conn, "INSERT INTO admin_acc VALUES( '$admin_id', '$course_id', '$admin_user','$admin_pass','$status')");
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