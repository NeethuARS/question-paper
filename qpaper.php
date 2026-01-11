<!DOCTYPE html>
<html>
<?php 
session_start();

if(!isset($_SESSION['examineeSession']['examineenakalogin']) == true) header("location:index.php");


 ?>
<?php include("conn.php"); ?>
<!-- MAO NI ANG HEADER -->
<?php include("includes/header.php"); ?>      

<!-- UI THEME DIRI -->
<?php include("includes/ui-theme.php"); ?>

<div class="app-main">
<!-- sidebar diri  -->
<?php include("includes/sidebar.php"); ?>

 <?php  $sel = $conn->query("SELECT * FROM examinee_tbl");
 $selQ = $sel->fetch(PDO::FETCH_ASSOC);
  $c = $selQ['exmne_course']; ?> 

<div class="app-main__outer">
        <div class="app-main__inner">
            <div class="app-page-title">
                <div class="page-title-wrapper">
                     <div class="page-title-heading">
                        <div>AVAILABLE PAPERS 
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
            <form method="post" action="takepaper1.php">
            <select class="form-control" name="pid">
              <option value="0">Select Paper</option>
              <?php 
                $selCourse = $conn->query("SELECT * FROM epaper WHERE cou_id=$c");
                if($selCourse->rowCount() > 0)
                {
                  while ($selCourseRow = $selCourse->fetch(PDO::FETCH_ASSOC)) { ?>
                     <option name=select id=course value="<?php echo $selCourseRow['PID']; ?>"><?php echo $selCourseRow['PNAME']; ?></option>
                  <?php } 
                }
                else
                { ?>
                  <option value="0">No Papers Found</option>
                <?php }
               ?>
            </select>
        </div>
            <div>
             <button name="submit" class="btn btn-primary" style="width: 100%" class="btn btn-primary">Select</button>
             </div>
         </form>
</div>
</div>
<?php include("includes/footer.php"); ?>
</div>
</div>
</html>
         
