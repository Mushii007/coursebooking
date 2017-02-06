<?php
include_once '../partials/header.php'; 
include_once '../partials/sidebar.php'; 

if(isset($_GET['edit_id']))
{
 $id = $_GET['edit_id'];
 extract($course->get_courses_ids($id)); 
}



if (isset($_POST['course_button'])){

    $cid = $_GET['edit_id'];
	$course_name = $_POST['c_name'];

	$course_desc = $_POST['c_desc'];

	$location  = $_POST['c_loc'];
	$city  = $_POST['city'];

	$course_date = $_POST['c_date'];
/*
	$start_time = $_POST['start_time'];

	$end_time = $_POST['end_time'];
*/
   $price = $_POST['c_price'];

	$course_type = $_POST['c-type'];

	$loc_lat    = $_POST['lat'];

	$loc_long    = $_POST['lon'];

	$seats= $_POST['c_seats'];

// sending  edit data to the class function


if($course->editCourse($cid,$course_name,$course_desc,$location,$city,$course_date, $start_time,$end_time, $price, $course_type, $loc_lat, $loc_long, $seats))
{

	echo $message= '<div class="alert alert-success">Course Successfully Updated</div>';
}

else{
echo 	$message= '<div class="alert alert-danger">Something Went wrong</div>';
}




}
else{


	echo "Wrong";
}



?>
<div id="page-wrapper">

            <div class="container-fluid">
<div class="col-lg-12">
                        <h1 class="page-header">
                           Edit Courses
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-plus"></i> &nbsp; Edit Course
                            </li>
                        </ol>
                    </div>
 <div class="row">

<!-- <div class="alert alert-success"><?php echo $message;?></div>
<div class="alert alert-danger"><?php echo $message;?></div> -->

                    <div class="col-lg-12">


                        <form role="form" action="" method="post" id="course_form">


<div class="row">
<div class="col-md-6">
                            <div class="form-group">
                                <label>Course Name</label>
                                <input type="text" class="form-control" name="c_name" id="course_name" value="<?php echo $course_name; ?>">
                                
                            </div>
                            </div>
		<div class="col-md-6">
                            <div class="form-group">
                                <label>Course Description</label>
                                <textarea class="form-control" name="c_desc" id="course_desc" placeholder="Enter text" value=""><?php echo $course_description; ?></textarea>
     					 </div>
      	</div>
</div>

<div class="row">
<div class="col-md-6">
                            <div class="form-group">
                                <label>Course Location</label>
                                <input type="text" class="form-control" name="c_loc" id="course_location" value="<?php echo $location;?>">
                               
                            </div>
                            </div>
<div class="col-md-6">
                        <div class="form-group">
                                <label>City</label>
                                <input type="text" class="form-control" name="city" id="course_city" value="<?php echo $city;?>">
      </div>    
      </div>
</div>

<div class="row">
<div class="col-md-6">
<div class="form-group">
                                <label>Date</label>
                                <input type="date" class="form-control" name="c_date" id="course_date" value="<?php echo $course_date;?>">
      </div>
						
                            <!--<div class="form-group">
                                <label>Start time</label>
                                <input type="text" class="form-control" name="start_time" id="start-time" value="<?php echo $start_time;?>">
                              
                            </div>-->
                            </div>
<div class="col-md-6">
								<div class="dbvalues"><ul><li><?php echo $row['course_session'];?></li></ul></div>
                             <div class="">
                                <label>Select Session:</label>
								<div class="checkbox checkbox-inline">
                                <input type="checkbox" name="session[]" id="morning_sess" value="Morning(9:00AM-12:00PM)">
								<label for="morning_sess">Morning</label>
                                <input type="checkbox"  name="session[]" id="noon_sess" value="Noon(12:30PM-3:30PM)">
								<label>Afternoon</label>
                                <input type="checkbox" name="session[]" id="even_sess" value="Evening(4:00PM-7:00PM)">
								<label>Evening</label>
								</div>
	  </div>
      </div>
</div>


<div class="row">
<div class="col-md-6">
                            <div class="form-group">
                                <label>Price</label>
                                <input type="text" class="form-control" name="c_price" id="c-price" value="<?php echo $price; ?>">
                               <!--  <p class="help-block">Example block-level help text here.</p> -->
                            </div>
                            </div>
<div class="col-md-6">
                            <div class="form-group">
                                <label>Course Type</label>
                                <input  type="text" class="form-control" placeholder="Enter text" name="c-type" id="course-type" value="<?php echo $course_type;?>">
      </div>
      </div>
</div>

<div class="row">
<div class="col-md-6">
                            <div class="form-group">
                                <label>Latitute</label>
                                <input type="text" class="form-control" name="lat" id="latitute" value="<?php echo $loc_lat;?>">
                               
                            </div>
                            </div>
<div class="col-md-6">
                            <div class="form-group">
                                <label>Longitute</label>
                                <input type="text" class="form-control" placeholder="Enter text" name="lon" id="longitute" value="<?php echo $loc_lang;?>">
      </div>
      </div>
</div>

							<div class="row">
							<div class="col-md-6">
                            <div class="form-group">
                                <label>Seats</label>
                                <input type="text" class="form-control" name="c_seats" id="seats" value="<?php echo $seats; ?>">
                               
                            </div>
                            </div>
                            </div>
                            

                            <input type="submit" class="btn btn-primary" name="course_button" value="Submit Button">
                            <button type="reset" class="btn btn-primary">Reset Button</button>

                        </form>

                    </div>

                    </div>

                    </div>












 <?php        include '../partials/footer.php';?>