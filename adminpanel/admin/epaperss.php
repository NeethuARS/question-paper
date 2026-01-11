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
                        <div> MANAGE PAPERS 
                        </div>
                    </div>
                </div>
            </div>        
            
            <div class="col-md-12">
            <div id="refreshData">
            <div class="row">
                  <div class="col-md-10">
                      <div class="main-card mb-3 card">
                          <div class="card-header"> CHOOSE PAPER
                            <i class="header-icon lnr-license icon-gradient bg-plum-plate"> </i>
                          </div>
 <div class="col-md-12">
  <div class="card-body">
          <div class="form-group">
            <form method="post" action="epaper.php">
            <label>Select Paper</label>
            <select class="form-control" name="select">
              <option value="0">Select Course</option>
              <?php 
                $selCourse = $conn->query("SELECT * FROM epaper ORDER BY PID DESC");
                if($selCourse->rowCount() > 0)
                {
                  while ($selCourseRow = $selCourse->fetch(PDO::FETCH_ASSOC)) { ?>
                     <option name=select id=course value="<?php echo $selCourseRow['PID']; ?>"><?php echo $selCourseRow['PNAME']; ?></option>
                  <?php } 
                }
                else
                { ?>
                  <option value="0">No Units Found</option>
                <?php }
               ?>
            </select>
            <br>
            <button name="submit" class="btn btn-primary" style="width: 100%" class="btn btn-primary">Select</button></a>
          </div>
        </form>
          <?php include("includes/footer.php"); ?>