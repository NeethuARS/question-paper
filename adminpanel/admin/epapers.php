<!DOCTYPE html>
<html>
<?php session_start() ?>
<?php include("includes/header.php"); ?>      

<?php include("includes/ui-theme.php"); ?>

<div class="app-main">

<?php include("includes/sidebar.php"); ?>

<div class="app-main__outer">
        <div class="app-main__inner">
            <div class="app-page-title">
                <div class="page-title-wrapper">
                     <div class="page-title-heading">
                        <div> SELECT UNIT
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
            <div id="refreshData">
            <div class="row">
                  <div class="col-md-10">
                      <div class="main-card mb-3 card">
                          <div class="card-header">
                            <i class="header-icon lnr-license icon-gradient bg-plum-plate"> </i>Exam Information
                          </div>
                          <div class="card-body">
                          	<div class="form-group">
                          		<form action="epaperss.php" method="post">
<label>Select Course</label>
            <select class="form-control" name="select">
              <option value="0">Select Unit</option>
              <?php 
                $selCourse = $conn->query("SELECT * FROM course_tbl ORDER BY cou_id DESC");
                if($selCourse->rowCount() > 0)
                {
                  while ($selCourseRow = $selCourse->fetch(PDO::FETCH_ASSOC)) { ?>
                     <option name=select id=course value="<?php echo $selCourseRow['cou_id']; ?>"><?php echo $selCourseRow['cou_name']; ?></option>
                  <?php } $_SESSION['select']=$select;
                }
                else
                { ?>
                  <option value="0">No Units Found</option>
                <?php }
               ?>
            </select>
        </div>
            <div>
             <button name="submit" class="btn btn-primary" style="width: 100%" class="btn btn-primary">Create</button>
             </div>
         </form>
