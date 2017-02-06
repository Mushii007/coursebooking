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
                           Bookings
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-table"></i> Bookings
                            </li>
                        </ol>
                    </div>


<div class="col-md-12 ">
                
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover table-striped">
                                <thead>
                                    <tr>
                                        <th>Serial #</th>
                                        <th>Reference #</th>
                                        <th>Course Name</th>
                                        <th>Username</th>
                                        <th>Customer Name</th>
                                        <th>Email</th>
                                        <th>Address</th>
                                        <th>Phone</th>
                                        <th>Voucher Code</th>
                                        <th>Quantity</th>
                                        <th>Session</th>
                                        <th>Prirce</th>
                                        <th>Date</th>
                                        <th>Status</th>
                                        <th colspan="2" align="center">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                   <?php

                                    //$query= "SELECT * FROM bookings";

                                   $query = "SELECT bookings.booking_id,bookings.ref_no,courses.course_name,users.username, bookings.customer_name, bookings.email, bookings.address, bookings.phone,bookings.voucher_code,bookings.quantity,bookings.session,bookings.price,bookings.booking_date,bookings.status from bookings RIGHT JOIN courses ON courses.course_id=bookings.course_id RIGHT JOIN  users ON users.user_id=bookings.user_id  
ORDER BY `bookings`.`booking_id`  DESC";
                                    $booking->AdminBookingList($query);

                                   ?>
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>


                </div>

               </div>
         </div>       
<?php        include '../partials/footer.php';?>