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
                    <div> Set Sections of Exam  
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
                         <form method="post" action="qaddsconn.php">
                            <div class="form-group">
                                <label>Select Course</label>
                                <select class="form-control" name="select">
                                  <option value="0">Select Course</option>
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
                          <label>Paper Name</label>
                          <input type="" name="pname" id="pname" class="form-control" placeholder="Input Paper Name" required="" autocomplete="off">
                      </div>
                      <label>Questions in Section 1</label>&emsp; 
                      <div class="dropdown d-inline-block">
                          <select type="button" aria-haspopup="true" aria-expanded="false" data-toggle="dropdown" class="mb-2 mr-2 dropdown-toggle btn btn-success" name="mark1" class="form-control" name="timeLimit" required="">
                              <option value="0">1 Mark Questions </option> 
                              <option value="1">1 </option> 
                              <option value="2">2 </option> 
                              <option value="3">3 </option> 
                              <option value="4">4 </option> 
                              <option value="5">5 </option> 
                              <option value="6">6 </option> 
                              <option value="7">7 </option> 
                              <option value="8">8 </option> 
                              <option value="9">9 </option> 
                              <option value="10">10 </option>
                          </select></button>
                      </div><br> <div class="dropdown d-inline-block">
                         <label>Questions in Section 2</label>&emsp; 
                         
                         <select type="button" aria-haspopup="true" aria-expanded="false" data-toggle="dropdown" class="mb-2 mr-2 dropdown-toggle btn btn-success" name="mark2" class="form-control" name="timeLimit" required="">
                          <option value="0">2 Mark Questions </option> 
                          <option value="1">1 </option> 
                          <option value="2">2 </option> 
                          <option value="3">3 </option> 
                          <option value="4">4 </option> 
                          <option value="5">5 </option> 
                          <option value="6">6 </option> 
                          <option value="7">7 </option> 
                          <option value="8">8 </option> 
                          <option value="9">9 </option> 
                          <option value="10">10 </option>
                      </select></button>
                  </div><br>
                  <label>Questions in Section 3</label>&emsp; 
                  <div class="dropdown d-inline-block">
                    <select type="button" aria-haspopup="true" aria-expanded="false" data-toggle="dropdown" class="mb-2 mr-2 dropdown-toggle btn btn-success" name="mark3" class="form-control" name="timeLimit" required="">
                      <option value="0">3 Mark Questions </option> 
                      <option value="1">1 </option> 
                      <option value="2">2 </option> 
                      <option value="3">3 </option> 
                      <option value="4">4 </option> 
                      <option value="5">5 </option> 
                      <option value="6">6 </option> 
                      <option value="7">7 </option> 
                      <option value="8">8 </option> 
                      <option value="9">9 </option> 
                      <option value="10">10 </option>
                  </select></button>
              </div><br>
              <label>Questions in Section 5</label>&emsp; 
              <div class="dropdown d-inline-block">
                <select type="button" aria-haspopup="true" aria-expanded="false" data-toggle="dropdown" class="mb-2 mr-2 dropdown-toggle btn btn-success" name="mark5" class="form-control" name="timeLimit" required="">
                  <option value="0">5 Mark Questions </option> 
                  <option value="1">1 </option> 
                  <option value="2">2 </option> 
                  <option value="3">3 </option> 
                  <option value="4">4 </option> 
                  <option value="5">5 </option> 
                  <option value="6">6 </option> 
                  <option value="7">7 </option> 
                  <option value="8">8 </option> 
                  <option value="9">9 </option> 
                  <option value="10">10 </option>
              </select></button>
          </div><br><br>
          <div>
            <button name="submit" class="btn btn-primary" style="width: 100%" class="btn btn-primary">Create</button>
        </div>
    </form>

    <?php include("includes/footer.php"); ?>