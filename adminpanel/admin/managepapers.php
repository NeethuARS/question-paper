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

<link rel="stylesheet" type="text/css" href="css/mycss.css">
<div class="app-main__outer">
        <div class="app-main__inner">
            <div class="app-page-title">
                <div class="page-title-wrapper">
                    <div class="page-title-heading">
                        <div>VIEW PAPERS</div>
                    </div>
                </div>
            </div>        
             
            <div class="col-md-12">
                <div class="main-card mb-3 card">
                    <div class="card-header">DETAILS
                    </div>
                    <div class="table-responsive">
                        <table class="align-middle mb-0 table table-borderless table-striped table-hover" id="tableList">
                            <thead>
                                <th>Name</th>
                                <th>1 Marks</th>
                                <th>2 Marks</th>
                                <th>3 Marks</th>
                                <th>5 Marks</th>
                                <th>Total</th>
                            </tr>
                            </thead>
                            <tbody>
                              <?php 
                                $selQue = $conn->query("SELECT * FROM epaper ORDER BY PID ASC");
                                if($selQue->rowCount() > 0)
                                {
                                    while ($selQueRow = $selQue->fetch(PDO::FETCH_ASSOC)) { 
                                       ?>
                                        <tr>
                                           <td>
                                             <?php echo $selQueRow['PNAME']; ?>
                                           </td>
                                           <td>
                                              <?php echo $selQueRow['MARK1']; ?>
                                           </td>
                                           <td>
                                              <?php echo $selQueRow['MARK2']; ?>
                                           </td>
                                            <td>
                                              <?php echo $selQueRow['MARK3']; ?>
                                           </td>
                                           <td>
                                              <?php echo $selQueRow['MARK5']; ?>
                                           </td>
                                           <td>
                                              <?php echo $selQueRow['TOTAL']; ?>
                                           </td>
                                        </tr>
                                     <?php } }?>
                            </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                  
<?php include("includes/footer.php"); ?>