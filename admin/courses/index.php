<?php include_once '../partials/header.php'; 
include_once '../partials/sidebar.php'; 
//include($_SERVER['DOCUMENT_ROOT'].'/coursebooking/admin/header.php');
?>

<div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Course List
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-table"></i> Courses
                            </li>
                        </ol>
                    </div>


<div class="col-md-12 ">
                
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover table-striped">
                                <thead>
                                    <tr>
                                        <th>Serial #</th>
                                        <th>Course name</th>
                                        <th>Description</th>
                                        <th>Location</th>
                                        <th>City</th>
                                        <th>Date</th>
                                        <th>Start Time</th>
                                        <th>End Time</th>
                                        <th>Price</th>
                                        <th>Course Type</th>
                                        <th>Latitute</th>
                                        <th>Longitute</th>
                                        <th>Seats</th>
                                        <th colspan="2" align="center">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                   <?php

                                    $query= "SELECT * FROM courses";
                                    $course->AdminCourseList($query);

                                   ?>
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>


                </div>

               </div>
         </div>       
<?php        include '../partials/footer.php';?>