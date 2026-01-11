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
                        <div> Add Questions 
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
                            <i class="header-icon lnr-license icon-gradient bg-plum-plate"> </i>Fill In The Blanks
                          </div>
                          <div class="card-body">
                           <form method="post" action="qaddfcon.php">
                             <div class="form-group">
                            <label>Unit Name: </label>

                            <select style="width: 50%" name="cou_id">
                              <option value="0">Select Unit</option>
                              <?php 
                              $selCourse = $conn->query("SELECT * FROM course_tbl ORDER BY cou_id DESC");
                              if($selCourse->rowCount() > 0)
                              {
                                  while ($selCourseRow = $selCourse->fetch(PDO::FETCH_ASSOC)) { ?>
                                     <option name=select id=course value="<?php echo $selCourseRow['cou_id']; ?>"><?php echo $selCourseRow['cou_name']; ?></option>
                                 <?php }
                             }
                             else
                                { ?>
                                  <option value="0">No Units Found</option>
                              <?php }
                              ?>
                          </select>
           </div>
                                 <div class="form-group">
            <label>Input Marks&emsp; &emsp; &emsp; &emsp; &emsp;&emsp; &emsp;&emsp; &emsp;&emsp; &emsp;&emsp; &emsp;&emsp; &emsp;&emsp;&emsp;&emsp;&emsp; Difficulty Level:</label>
            
            <select style="width: 40%" class="dropdown" placeholder="L-1" name="marks" style="border-color: #27fe00;">
                                  <option value="1">1 Mark </option> 
                                  <option value="2">2 Mark</option> 
                                  <option value="3">3 Mark</option> 
                                  <option value="4">4 Mark</option> 
                                  <option value="5">5 Mark</option> 
                                </select>&emsp;&emsp; &emsp;&emsp; &emsp;&emsp;
                                <select style="width: 40%" class="dropdown" name="dlevel" placeholder="L-1" style="border-color: #27fe00;">
                                  <option value="1">L-1 </option> 
                                  <option value="2">L-2 </option> 
                                  <option value="3">L-3 </option> 
                                  <option value="4">L-4 </option> 
                                  <option value="5">L-5 </option> 
                                </select>
          </div><div class="form-group">
            <input type="hidden" name="examId">
            <input type="" name="question" id="fill" class="form-control" placeholder="write question" autocomplete="off">
          </div><div class="form-group">
           <label>correct answer</label>
            <input type="hidden" name="examId">
            <input type="" name="answer" id="fill1" class="form-control" placeholder="write answer" autocomplete="off">
          </div>
          <div>
                                <button name="submit" class="btn btn-primary" style="width: 100%" class="btn btn-primary">Add Now</button>
                              </div>
                            </form>
                            <?php include("includes/footer.php"); ?>