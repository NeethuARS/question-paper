<!DOCTYPE html>
<html>
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
<body>
<div class="app-main__outer" >
        <div class="app-main__inner">
            <div class="app-page-title">
                <div class="page-title-wrapper">
                     <div class="page-title-heading">
                        <div> QUESTION TYPE
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
                            <i class="header-icon lnr-license icon-gradient bg-plum-plate"> </i>Choose Type of Question
                          </div>
                          <div class="card-body" align="center">   
            <div class="col-md-8">
            	<div class="font-icon-wrapper">
				<button><a href="qaddq.php"><h4><i class="pe-7s-menu">Multiple Choice Questions</i></h4></a></button></div></div>
              <div class="col-md-6">
              <div class="font-icon-wrapper">
              	<button><a href="qaddp.php"><h4><i class="pe-7s-switch">True or False</i></h4></a></button></div></div>
              <div class="col-md-6">
              <div class="font-icon-wrapper"><button><a href="qaddf.php"><h4><i class="pe-7s-note2">Fill in The Blanks</i></h4></a></button></div></div>
          </div>
      </div>
  </div>
</body>
<?php include("includes/footer.php"); ?>
