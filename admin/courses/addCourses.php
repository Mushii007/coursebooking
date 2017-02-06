<?php include_once '../partials/header.php'; 
include_once '../partials/sidebar.php'; 

if (isset($_POST['course_button'])){

	$course_name = $_POST['c_name'];

	$course_descr = $_POST['c_desc'];

	$location  = $_POST['c_loc'];
	 
	$city  = $_POST['city'];

	$course_date = $_POST['c_date'];

/*$start_time = $_POST['start_time'];

  $end_time = $_POST['end_time'];
*/
	//$session =$_POST['session'][0].",".$_POST['session'][1].",".$_POST['session'][2];
	$session = $_POST['session'];
    $session_final = implode('<br/>',$session);
	$price = $_POST['c_price'];

	$course_type = $_POST['c-type'];

	/*$loc_lat    = $_POST['lat'];

	$loc_long    = $_POST['lon'];
*/
	$seats= $_POST['c_seats'];
 
// sending to data to the class function


if($course->addCourse($course_name,$course_descr,$location,$city,$course_date,$session_final,$price,$course_type,$seats))
{

	echo $message= '<div class="alert alert-success">Course Successfully Added</div>';
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
                           Add Courses
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-plus"></i> &nbsp; Add Courses
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
                                <input type="text" class="form-control" name="c_name" id="course_name">
                                
                            </div>
                            </div>
		<div class="col-md-6">
                            <div class="form-group">
                                <label>Course Description</label>
                                <textarea class="form-control" name="c_desc" id="course_desc" placeholder="Enter text"></textarea>
     					 </div>
      	</div>
</div>

<div class="row">
<div class="col-md-6">
                            <div class="form-group">
                                <label>Course Location</label>
                                <input type="text" class="form-control" name="c_loc" id="course_location">
                               
                            </div>
                            </div>
<div class="col-md-6">
                           <div class="form-group">
                                <label>City</label>
                                <input type="text" class="form-control" name="city" id="city">
                               
                            </div>
      </div>
</div>

<div class="row">
<div class="col-md-6">
                             <div class="form-group">
                                <label>Date</label>
                                <input type="date" class="form-control" data-date-format="YYYY/MM/DD" name="c_date" id="course_date">
      </div>
							
							
		<!--					<div class="form-group">
                                <label>Start time</label>
                                <input type="text" class="form-control" name="start_time" id="start-time">
                              
                            </div>-->
                            </div>
<div class="col-md-6">
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
                                <input type="text" class="form-control" name="c_price" id="c-price">
                               <!--  <p class="help-block">Example block-level help text here.</p> -->
                            </div>
                            </div>
<div class="col-md-6">
                            <div class="form-group">
                                <label>Course Type</label>
                                <input  type="text" class="form-control" placeholder="Enter text" name="c-type" id="course-type">
      </div>
      </div>
</div>

<div class="row">
<div class="col-md-6">
                            <div class="form-group">
                                <label>Latitute</label>
                                <input type="text" class="form-control" name="lat" id="latitute">
                               
                            </div>
                            </div>
<div class="col-md-6">
                            <div class="form-group">
                                <label>Longitute</label>
                                <input type="text" class="form-control" placeholder="Enter text" name="lon" id="longitute">
      </div>
      </div>
</div>

							<div class="row">
							<div class="col-md-6">
                            <div class="form-group">
                                <label>Seats</label>
                                <input type="text" class="form-control" name="c_seats" id="seats">
                               
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