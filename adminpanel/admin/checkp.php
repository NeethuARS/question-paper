<?php 
session_start();

if(!isset($_SESSION['admin']['adminnakalogin']) == true) header("location:index.php");

 ?>
<?php include("../../conn.php"); ?>
<!-- MAO NI ANG HEADER -->
<?php include("includes/header.php"); ?>      

<!-- UI THEME DIRI -->
<?php include("includes/ui-theme.php"); ?>

<div class="app-main">
<!-- sidebar diri  -->
<?php include("includes/sidebar.php"); ?>
     
<div class="app-main__outer">
        <div class="app-main__inner">
            <div class="app-page-title">
                <div class="page-title-wrapper">
                     <div class="page-title-heading">
                        <div> Evaluate 
                        </div>
                    </div>
                </div>
            </div>        
            
            <div class="col-md-8">
            <div id="refreshData">
            <div class="row">
                  <div class="col-md-12">
                      <div class="main-card mb-3 card">
                          <div class="card-header">
                            <i class="header-icon lnr-license icon-gradient bg-plum-plate"> </i>Students
                          </div>
                          <form action="evpaper.php" method="post">
                         <div class="form-group">
                          <br>
                            &emsp;&emsp;&emsp;<select style="width: 70%" name=stu class="dropdown">
              <option value="0">Select Student</option>
              <?php 
                $selCourse = $conn->query("SELECT * FROM examinee_tbl INNER JOIN admin_acc ON examinee_tbl.course_id = admin_acc.course_id");
                $selCourse->rowCount();
                  while ($selCourseRow = $selCourse->fetch(PDO::FETCH_ASSOC)) { ?>
                     <option name=stu value="<?php echo $selCourseRow['exmne_id']; ?>"><?php echo $selCourseRow['exmne_fullname']; ?></option>
                  <?php } 
               ?>
             </select>
            </div>
        <button style="width: 100%" name="submit" class="btn btn-primary">Select</button>
      </div>
         </form>
    </main>
   
  </div>
</body>
  <?php include("includes/footer.php"); ?>