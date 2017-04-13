<?php
include "header.php";
?>
 <div class="container">


        <!-- Page Heading -->
        <!--<div class="row">
            <div class="col-lg-12">
                <!-- <h1 class="page-header">Page Heading
                    <small>Secondary Text</small>
                </h1>
                <div class="jumbotron">
                      <h1 class="text-center">LMS Course Booking Portal</h1>
                      <p class="text-center">Enroll your desired course in few clicks and get professional in makeup industry.</p>
                      <!-- <p><a class="btn btn-primary btn-lg">Learn more</a></p> 
                </div>
            </div>
        </div>-->
		   <!-- /.row -->
<!--filter form  -->
        <div class="row">
            <div class="col-lg-12 col-md-12 search-filters">

            <fieldset class="scheduler-border">
            <legend class="scheduler-border"><h3>Search by:</h3></legend>
            <form action = "search.php" name= "filter-form" method="post">
                
            <div class="row">
			
						<!--Course dropdown-->
				 <div class="col-md-3">
                
                <div class="form-group">
                <select name="coursename" class="form-control">
                <option value="">Search by Course</option>
                <?php
					$sql= "SELECT DISTINCT `course_name` FROM courses";
					$course->CourseDropdown($sql);
				?>
				</select>        
                </div>
                

                </div>
				<!--Ends course name-->
	
			
			
                <div class="col-md-3">
                <div class="form-group">
                <select name="month" class="form-control">
                <option value="">Search by Month</option>
                <option value="01">January</option>
                <option value="02">February</option>
                <option value="03">March</option>
                <option value="04">April</option>
                <option value="05">May</option>
                <option value="06">June</option>
                </select>
                </div>
                </div>
				
				
				<div class="col-md-3">
                
                    <div class="form-group">
                <select name="city" class="form-control">
                <option value="">Search by Location</option>
                <option value="London">London</option>
                <option value="Liverpool">Liverpool</option>
                <option value="Manchester">Manchester</option>
                </select>        
                </div>
                

                </div>

				
                <div class="col-md-3">
                <div class="form-group">
                <select name="Session" class="form-control">
                <option value="">Search by Session</option>
                <option value="Morning(9:00AM-12:00PM)">Morning</option>
                <option value="Noon(12:30PM-3:30PM)">Afternoon</option>
                <option value="Evening(4:00PM-7:00PM)">Evening</option>
                </select>        
                </div>
                </div>
                
                 <div class="col-md-3">
                
                    <div class="form-group">
                    <label></label>
                <input type="submit" name="filtercourse" class="btn btn-primary" value="Search">
                <input type="button" name="filtercourse" class="btn btn-primary" value="Reset" onclick="ResetForm()">

                </div>
                

                </div>
            </div>



            </form>


            </fieldset>

            </div>

        </div>
<!--form end -->
<div class="row">
<div class="col-md-6">
<h2> Search Results: </h2>
</div>
</div>
<hr>

<?php
if (isset($_POST['filtercourse'])){

	$coursenam=$_POST['coursename'];
	$date = $_POST['month'];
	$city = $_POST['city'];
	$session = $_POST['Session'];
	
	/*$query = "SELECT * FROM courses WHERE `course_name` ='$coursenam' OR DATE_FORMAT(`course_date` ,'%Y-%m') = DATE_FORMAT(NOW() ,'%Y-$date') OR `city` ='$city' OR `course_session` LIKE '%".$session."%' ORDER BY course_id DESC";*/
$query = "SELECT * FROM courses WHERE `course_name` ='$coursenam' OR DATE_FORMAT(`course_date` ,'%Y-%m') = DATE_FORMAT(NOW() ,'%Y-$date') OR `city` ='$city' OR `course_session` LIKE '%".$session."%' ORDER BY course_id DESC";

	 $course->SeachCourses($query);
	
}



include "footer.php";
?>